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
				$org->setName($form->getVal('name'));
				$org->setType($em->find('\ru\nazarov\crm\entities\OrganizationType', $form->getVal('type')));
				$org->setAddress($form->getVal('address'));
				$org->setCountry($form->getVal('country'));
				$org->setPhone($form->getVal('phone'));
				$org->setSite($form->getVal('site'));

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
