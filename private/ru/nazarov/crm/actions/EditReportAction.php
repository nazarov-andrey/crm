<?php
    namespace ru\nazarov\crm\actions;

    class EditReportAction extends AbstractEditAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Report', 'Invalid report id', '/?action=reports_list', '\ru\nazarov\crm\forms\ReportForm', 'report-form', 'Edit report', '/?action=edit_report', \ru\nazarov\crm\forms\Form::METHOD_POST, 'report_form.tpl');
        }

        protected function setItemFields() {
            $form = $this->_form;
            $item = $this->_item;

            //$item->setName($form->get('name'));
            //$item->setType($this->em()->find('\ru\nazarov\crm\entities\OrganizationType', $form->get('type')));
            //$item->setPhone($form->get('phone'));
            //$item->setSite($form->get('site'));
            //$item->setAddress($form->get('address'));
            //$item->setCountry($form->get('country'));
        }

        protected function fillSelects() {}

        protected function prepareData() {
            parent::prepareData();

            $selectsDp = \ru\nazarov\sitebase\Facade::getReportSelectsDps();
            $this->view()->set('content', 'report_form.tpl')
                ->set('orgs', $selectsDp->orgs)
                ->set('persons', $selectsDp->persons)
                ->set('contacts', $selectsDp->contacts);
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
            //$form->set('name', $item->getName());
            //$form->set('type', $item->getType()->getId());
            //$form->set('phone', $item->getPhone());
            //$form->set('site', $item->getSite());
            //$form->set('address', $item->getAddress());
            //$form->set('country', $item->getCountry());
        }
    }
?>