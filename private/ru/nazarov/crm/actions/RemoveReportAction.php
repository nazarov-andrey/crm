<?php
    namespace ru\nazarov\crm\actions;

    class RemoveReportAction extends AbstractRemoveAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Report', 'Invalid report id', '/?action=reports_list');
        }
    }
?>