<?php
    namespace ru\nazarov\crm\actions;

    use \ru\nazarov\sitebase\core\Application;
    use \ru\nazarov\crm\forms\StoreItemForm;

    class EditStoreAction extends UserAction {
        protected $_item = null;

        protected function prepareData() {
            parent::prepareData();

            $form = $form = $this->prepareForm(new \ru\nazarov\crm\forms\StoreItemForm('store-item-form', 'Edit store item', '/?action=edit_store&id=' . $this->_item->getId(), \ru\nazarov\crm\forms\Form::METHOD_POST));
            $form->set('code', $this->_item->getCode());
            $form->set('desc', $this->_item->getDescription());
            $form->set('mancode', $this->_item->getManufacturerCode());
            $form->set('supcode', $this->_item->getSupplierCode());
            $form->set('amount', $this->_item->getAmount());
            $form->set('minamount', $this->_item->getMinAmount());
            $form->set('comment', $this->_item->getComment());

            $this->view()->set('content', 'form.tpl')
                ->set('form', $form);
        }

        public function execute() {
            $req = $this->request();
            $id = $req->get('id');

            if ($id === null || (($this->_item = $this->em()->find('\ru\nazarov\crm\entities\StoreItem', $id)) == null)) {
                $this->error('Invalid store item id', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null);
                return;
            }

            if ($req->get('submit') !== null) {
                $form = $form = $this->prepareForm(new \ru\nazarov\crm\forms\StoreItemForm('', '', '', \ru\nazarov\crm\forms\Form::METHOD_POST));
                $em = $this->em();

                $this->_item = $em->find('\ru\nazarov\crm\entities\StoreItem', $id);
                $this->_item->setCode($form->get('code'));
                $this->_item->setDescription($form->get('desc'));
                $this->_item->setManufacturerCode($form->get('mancode'));
                $this->_item->setSupplierCode($form->get('supcode'));
                $this->_item->setAmount($form->get('amount'));
                $this->_item->setMinAmount($form->get('minamount'));
                $this->_item->setComment($form->get('comment'));

                $em->flush();
                Application::instance()->redirect('/?action=store');

                return;
            }

            parent::execute();
        }
    }
?>
