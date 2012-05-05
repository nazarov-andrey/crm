<?php
	namespace ru\nazarov\crm\actions;

	class AddReportAction extends UserAction {
		protected function prepareData() {
			parent::prepareData();

            $selectsDp = \ru\nazarov\sitebase\Facade::getReportSelectsDps();
			$this->view()->set('content', 'report_form.tpl')
				->set('orgs', $selectsDp->orgs)
				->set('persons', $selectsDp->persons)
				->set('contacts', $selectsDp->contacts);
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
			//$form->setFieldVals('type', $types);
			$this->view()->set('form', $form)
				->set('types', $types);

			parent::execute();
		}
	}
?>