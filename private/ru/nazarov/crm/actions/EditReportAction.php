<?php
    namespace ru\nazarov\crm\actions;

    class EditReportAction extends AbstractEditAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Report', 'Invalid report id', '/?action=reports_list', '\ru\nazarov\crm\forms\ReportForm', 'report-form', 'Edit report', '/?action=edit_report', \ru\nazarov\crm\forms\Form::METHOD_POST, null, 'report_form.tpl');
        }

        protected function setItemFields() {
            $form = $this->_form;
            $item = $this->_item;

            $em = $this->em();

            $item->setContact($em->find('\ru\nazarov\crm\entities\Contact', $form->get('contact')));
            $item->setDate(new \DateTime($form->get('date')));
            $item->setComment($form->get('comment'));
            $item->setApp($em->find('\ru\nazarov\crm\entities\Application', $form->get('app')));
        }

        protected function fillSelects() {
            $selectsDp = \ru\nazarov\sitebase\Facade::getReportSelectsDps();

            $types = array_map(
                function($type) { return (object) array('label' => $type->getCode(), 'val' => $type->getId()); },
                $this->em()->getRepository('\ru\nazarov\crm\entities\OrganizationType')->findAll()
            );

            $this->view()->set('orgs', $selectsDp->orgs)
                ->set('persons', $selectsDp->persons)
                ->set('contacts', $selectsDp->contacts)
                ->set('types', $types);
        }

        protected function prepareData() {
            parent::prepareData();

            $selectsDp = \ru\nazarov\sitebase\Facade::getReportSelectsDps();
            $this->view()->set('content', 'report_form.tpl')
                ->set('orgs', $selectsDp->orgs)
                ->set('persons', $selectsDp->persons)
                ->set('contacts', $selectsDp->contacts)
                ->set('apps', $selectsDp->apps)
                ->set('date', $this->_item->getDate());
        }

        protected function setFormFields() {
            $form = $this->_form;
            $item = $this->_item;

            $contact = $item->getContact();
            $person = $contact->getPerson();
            $org = $person->getOrganization();

            $form->set('type', $org->getType()->getId());
            $form->set('org', $org->getId());
            $form->set('person', $person->getId());
            $form->set('contact', $contact->getId());
            $form->set('date', $item->getDate()->format('d/m/Y'));
            $form->set('comment', $item->getComment());
            $form->set('app', $item->getApp()->getId());
        }
    }
?>