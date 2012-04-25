<?php
	namespace ru\nazarov\crm\actions;

	class AddAppAction extends UserAction {
		const ATTACHMENT_KEY = 'attachment';
		const INJECTION_BEAN_UPLOADER = 'add_app_action_bean_uploader';

		protected function prepareData() {
			parent::prepareData();

			$this->view()->set('content', 'app_form.tpl')
				->set('attachment_key', self::ATTACHMENT_KEY);
		}

		protected function uploader() {
			return $this->getInjection(self::INJECTION_BEAN_UPLOADER);
		}

		public function execute() {
			$em = $this->em();
			$form = $this->prepareForm(new \ru\nazarov\crm\forms\AppForm('app-form', 'Add request', '/?action=add_app', \ru\nazarov\crm\forms\Form::METHOD_POST, 'multipart/form-data'));

			if (!$form->isEmpty() && $form->validate()) {
				$app = new \ru\nazarov\crm\entities\Application();
				$app->setClient($em->find('\ru\nazarov\crm\entities\Organization', $form->getVal('client')));
				$app->setSupplier($em->find('\ru\nazarov\crm\entities\Organization', $form->getVal('supplier')));
				$app->setDate(new \DateTime($form->getVal('date')));
				$app->setComment($form->getVal('comment'));
				$em->persist($app);
				$em->flush($app);

				$attachments = $form->getVal(self::ATTACHMENT_KEY);

				if ($attachments != null) {
					$type = $em->getRepository('\ru\nazarov\crm\entities\AttachmentType')->findOneBy(array('code' => 'application'));
					$uploader = $this->uploader();

					foreach ($attachments['name'] as $i => $name) {
						if (empty($name)) {
							continue;
						}

						$a = new \ru\nazarov\crm\entities\Attachment();
						$a->setMimeType($attachments['type'][$i]);
						$a->setName($name);
						$a->setPath($uploader->upload($attachments['tmp_name'][$i]));
						$a->setType($type);
						$a->setOwner($app->getId());

						$em->persist($a);
					}

					$em->flush();
				}

				$form->clean();
			}

			$form->setFieldVals('supplier', array_map(
				    function($org) { return (object) array('label' => $org->getName(), 'val' => $org->getId()); },
					$em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array('type' => 1))
				))
				->setFieldVals('client', array_map(
					function($org) { return (object) array('label' => $org->getName(), 'val' => $org->getId()); },
					$em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array('type' => 2))
				));

			$view = $this->view();
			$view->set('form', $form);

			parent::execute();
		}

		public function getInjections() {
			return array_merge(
				parent::getInjections(),

				array(
					(object) array(
						'bean' => \ru\nazarov\sitebase\Facade::BEAN_UPLOADER,
						'injection' => self::INJECTION_BEAN_UPLOADER,
					),
				)
			);
		}
	}
?>