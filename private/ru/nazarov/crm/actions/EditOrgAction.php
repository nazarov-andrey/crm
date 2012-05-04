<?php
    namespace ru\nazarov\crm\actions;

    class EditOrgAction extends AbstractEditAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Organization', 'Invalid organization id', '/?action=orgs_list', '\ru\nazarov\crm\forms\OrgForm', 'org-form', 'Edit organization', '/?action=edit_org', \ru\nazarov\crm\forms\Form::METHOD_POST);
        }

        protected function setItemFields() {
            $form = $this->_form;
            $item = $this->_item;

            $item->setName($form->get('name'));
            $item->setType($this->em()->find('\ru\nazarov\crm\entities\OrganizationType', $form->get('type')));
            $item->setPhone($form->get('phone'));
            $item->setSite($form->get('site'));
            $item->setAddress($form->get('address'));
            $item->setCountry($form->get('country'));
        }

        protected function fillSelects() {
            $this->_form->setFieldVals('type', array_map(
                function ($t) { return (object) array('label' => $t->getCode(), 'val' => $t->getId()); },
                $this->em()->getRepository('\ru\nazarov\crm\entities\OrganizationType')->findAll()
            ));
        }

        protected function setFormFields() {
            $form = $this->_form;
            $item = $this->_item;

            $form->set('name', $item->getName());
            $form->set('type', $item->getType()->getId());
            $form->set('phone', $item->getPhone());
            $form->set('site', $item->getSite());
            $form->set('address', $item->getAddress());
            $form->set('country', $item->getCountry());
        }
    }
?>
