<?php
    namespace ru\nazarov\crm\actions;

    class EditPersonAction extends AbstractEditAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Person', 'Invalid person id', '/?action=persons_list', '\ru\nazarov\crm\forms\PersonForm', 'person-form', 'Edit person', '/?action=edit_person', \ru\nazarov\crm\forms\Form::METHOD_POST, 'person_form.tpl');
        }

        protected function setItemFields() {
            $form = $this->_form;
            $item = $this->_item;

            $em = $this->em();

            $item->setName($form->get('name'));
            $item->setOrganization($em->find('\ru\nazarov\crm\entities\Organization', $form->get('org')));
            $item->setPosition($form->get('pos'));
            $item->setComment($form->get('comment'));
        }

        protected function fillSelects() {
            $this->_form->setFieldVals('org', \ru\nazarov\sitebase\Facade::getPersonFormOrgsSelectDp());
        }

        //protected function prepareData() {
        //    parent::prepareData();
        //
        //    $selectsDp = \ru\nazarov\sitebase\Facade::getReportSelectsDps();
        //    $this->view()->set('content', 'report_form.tpl')
        //        ->set('orgs', $selectsDp->orgs)
        //        ->set('persons', $selectsDp->persons)
        //        ->set('contacts', $selectsDp->contacts)
        //        ->set('date', $this->_item->getDate());
        //}

        protected function setFormFields() {
            $form = $this->_form;
            $item = $this->_item;

            $form->set('name', $item->getName());
            $form->set('org', $item->getOrganization()->getId());
            $form->set('pos', $item->getPosition());
            $form->set('comment', $item->getComment());
        }
    }
?>