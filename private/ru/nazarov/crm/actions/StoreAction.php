<?php
    namespace ru\nazarov\crm\actions;

    class StoreAction extends UserAction {
        protected function prepareData() {
            parent::prepareData();

            $em = $this->em();

            $storeItem = new \ru\nazarov\crm\entities\StoreItem();
            $storeItem->setCode('code' . rand(0, 100));
            $storeItem->setDescription(md5(rand(0, 1000)));
            $storeItem->setAmount(rand(100, 10000));
            $storeItem->setComment(md5(rand(100, 2355)));
            $storeItem->setMinAmount(rand(10, 100));
            $storeItem->setManufacturerCode(substr(md5(rand(0, 1000)), 10, 5));
            $storeItem->setSupplierCode(substr(md5(rand(0, 1000)), 10, 5));

            //$em->persist($storeItem);
            //$em->flush();

            $items = array_map(function ($item) { return $item->getJsonable(); }, $em->getRepository('ru\nazarov\crm\entities\StoreItem')->findAll());
            $this->view()->set('content', 'store.tpl')
                ->set('items', $items);
        }
    }
?>
