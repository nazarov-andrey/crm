<?php
    namespace ru\nazarov\crm\actions;

    class RemoveStoreAction extends AbstractRemoveAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\StoreItem', 'Invalid store item id', '/?action=store');
        }
    }
?>