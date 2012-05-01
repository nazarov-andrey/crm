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

                $item->setAmount($form->getVal('amount'));
                $item->setCode($form->getVal('code'));
                $item->setComment($form->getVal('comment'));
                $item->setDescription($form->getVal('desc'));
                $item->setManufacturerCode($form->getVal('mancode'));
                $item->setMinAmount($form->getVal('minamount'));
                $item->setSupplierCode($form->getVal('supcode'));

                $em->persist($item);
                $em->flush();
                $form->clean();

                /*$app = new \ru\nazarov\crm\entities\Application();
                $app->setClient($em->find('\ru\nazarov\crm\entities\Organization', $form->getVal('client')));
                $app->setSupplier($em->find('\ru\nazarov\crm\entities\Organization', $form->getVal('supplier')));
                $app->setDate(new \DateTime($form->getVal('date')));
                $app->setComment($form->getVal('comment'));
                $app->setLegalEntity($_SESSION['le']);
                $em->persist($app);
                $em->flush($app);

                $attachments = $form->getVal(self::ATTACHMENT_KEY);

                if ($attachments != null) {
                    $type = $em->getRepository('\ru\nazarov\crm\entities\AttachmentType')->findOneBy(array('code' => 'application'));
                    $uploader = $this->uploader();

                    foreach ($attachments['name'] as $i => $name) {
                        if (empty($name)) {
                            continue;
                        }

                        $a = new \ru\nazarov\crm\entities\Attachment();
                        $a->setMimeType($attachments['type'][$i]);
                        $a->setName($name);
                        $a->setPath($uploader->upload($attachments['tmp_name'][$i]));
                        $a->setType($type);
                        $a->setOwner($app->getId());

                        $em->persist($a);
                    }

                    $em->flush();
                }

                $form->clean();*/
            }

            $this->view()->set('form', $form);
            parent::execute();
        }
    }
?>
