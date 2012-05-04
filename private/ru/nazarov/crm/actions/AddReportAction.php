<?php
	namespace ru\nazarov\crm\actions;

	class AddReportAction extends UserAction {
		protected function prepareData() {
			parent::prepareData();

			$em = $this->em();
			$orgsSrc = $em->getRepository('\ru\nazarov\crm\entities\Organization')->findAll();
			$orgs = array();
			$personsSrc = $em->getRepository('\ru\nazarov\crm\entities\Person')->findAll();
			$persons = array();
			$contactsSrc = $em->getRepository('\ru\nazarov\crm\entities\Contact')->findAll();
			$contacts = array();

			foreach ($orgsSrc as $org) {
				$type = $org->getType()->getId();

				if (!array_key_exists($type, $orgs)) {
					$orgs[$type] = array();
				}

				$orgs[$type][] = (object) array('label' => $org->getName(), 'val' => $org->getId());
			}

			foreach ($personsSrc as $person) {
				$org = $person->getOrganization()->getId();

				if (!array_key_exists($org, $persons)) {
					$persons[$org] = array();
				}

				$persons[$org][] = (object) array('label' => $person->getName(), 'val' => $person->getId());
			}

			foreach ($contactsSrc as $contact) {
				$person = $contact->getPerson()->getId();

				if (!array_key_exists($person, $contacts)) {
					$contacts[$person] = array();
				}

				$contacts[$person][] = (object) array('label' => $contact->getType()->getCode() . '(' . $contact->getValue() . ')', 'val' => $contact->getId());
			}

			$this->view()->set('content', 'report_form.tpl')
				->set('orgs', $orgs)
				->set('persons', $persons)
				->set('contacts', $contacts);
		}

		public function execute() {
			$em = $this->em();
			$form = $this->prepareForm(new \ru\nazarov\crm\forms\ReportForm('report-form', 'Add report', '/?action=add_report', \ru\nazarov\crm\forms\Form::METHOD_POST));

			if (!$form->isEmpty() && $form->validate()) {
				$r = new \ru\nazarov\crm\entities\Report();
				$r->setComment($form->get('comment'));
				$r->setContact($em->find('\ru\nazarov\crm\entities\Contact', $form->get('contact')));
				$r->setDate(new \DateTime($form->get('date')));
                $r->setLegalEntity($_SESSION['le']);

				$em->persist($r);
				$em->flush();

				$form->clean();
			}

			$types = array_map(
				function($type) { return (object) array('label' => $type->getCode(), 'val' => $type->getId()); },
				$em->getRepository('\ru\nazarov\crm\entities\OrganizationType')->findAll()
			);
			$form->setFieldVals('type', $types);
			$this->view()->set('form', $form)
				->set('types', $types);

			parent::execute();
		}
	}
?>