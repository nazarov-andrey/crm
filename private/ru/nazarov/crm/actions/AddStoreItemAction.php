<?php
    namespace ru\nazarov\crm\actions;

    class AddStoreItemAction extends UserAction {
        protected function prepareData() {
            parent::prepareData();

            $this->view()->set('content', 'store_item_form.tpl');
        }

        public function execute() {
            $em = $this->em();
            $form = $form = $this->prepareForm(new \ru\nazarov\crm\forms\StoreItemForm('store-item-form', 'Add store item', '/?action=add_store_item', \ru\nazarov\crm\forms\Form::METHOD_POST));

            if (!$form->isEmpty() && $form->validate()) {
                $item = new \ru\nazarov\crm\entities\StoreItem();

                $item->setAmount($form->get('amount'));
                $item->setCode($form->get('code'));
                $item->setComment($form->get('comment'));
                $item->setDescription($form->get('desc'));
                $item->setManufacturerCode($form->get('mancode'));
                $item->setMinAmount($form->get('minamount'));
                $item->setSupplierCode($form->get('supcode'));

                $em->persist($item);
                $em->flush();
                $form->clean();
            }

            $this->view()->set('form', $form);
            parent::execute();
        }
    }
?>
