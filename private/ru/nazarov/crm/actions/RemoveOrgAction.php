<?php
    namespace ru\nazarov\crm\actions;

    class RemoveOrgAction extends AbstractRemoveAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Organization', 'Invalid organization id', '/?action=orgs_list');
        }
    }
?>