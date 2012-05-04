<?php
	namespace ru\nazarov\crm\actions;

	class AddOrgAction extends UserAction {
		protected function prepareData() {
			parent::prepareData();
			$this->view()->set('content', 'form.tpl');
		}

		public function execute() {
			$em = $this->em();
			$form = $this->prepareForm(new \ru\nazarov\crm\forms\OrgForm('org-form', 'Add organization', '/?action=add_org', \ru\nazarov\crm\forms\Form::METHOD_POST));

			if (!$form->isEmpty() && $form->validate()) {
				$org = new \ru\nazarov\crm\entities\Organization();
				$org->setName($form->get('name'));
				$org->setType($em->find('\ru\nazarov\crm\entities\OrganizationType', $form->get('type')));
				$org->setAddress($form->get('address'));
				$org->setCountry($form->get('country'));
				$org->setPhone($form->get('phone'));
				$org->setSite($form->get('site'));
                $org->setLegalEntity($_SESSION['le']);

				$em->persist($org);
				$em->flush();
				$form->clean();
			}

			$types = array_map(
				function ($t) { return (object) array('label' => $t->getCode(), 'val' => $t->getId()); },
				$em->getRepository('\ru\nazarov\crm\entities\OrganizationType')->findAll()
			);

			$form->setFieldVals('type', $types);
			$this->view()->set('form', $form);
			parent::execute();
		}
	}
?>
