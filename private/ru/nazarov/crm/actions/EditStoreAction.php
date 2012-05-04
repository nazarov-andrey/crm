<?php
    namespace ru\nazarov\crm\actions;

    class EditStoreAction extends AbstractEditAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\StoreItem', 'Invalid store item id', '/?action=store', '\ru\nazarov\crm\forms\StoreItemForm', 'store-item-form', 'Edit store item', '/?action=edit_store', \ru\nazarov\crm\forms\Form::METHOD_POST);
        }

        protected function fillSelects() {}

        protected function setItemFields() {
            $form = $this->_form;
            $item = $this->_item;

            $item->setCode($form->get('code'));
            $item->setDescription($form->get('desc'));
            $item->setManufacturerCode($form->get('mancode'));
            $item->setSupplierCode($form->get('supcode'));
            $item->setAmount($form->get('amount'));
            $item->setMinAmount($form->get('minamount'));
            $item->setComment($form->get('comment'));
        }

        protected function setFormFields() {
            $form = $this->_form;
            $item = $this->_item;

            $form->set('code', $item->getCode());
            $form->set('desc', $item->getDescription());
            $form->set('mancode', $item->getManufacturerCode());
            $form->set('supcode', $item->getSupplierCode());
            $form->set('amount', $item->getAmount());
            $form->set('minamount', $item->getMinAmount());
            $form->set('comment', $item->getComment());
        }
    }
?>
