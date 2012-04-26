<?php
	namespace ru\nazarov\crm\actions;

	class PrintAction extends \ru\nazarov\crm\actions\BaseAction {
		protected function prepareData() {
			$this->view()->setLayout('print_layout.tpl');
		}
	}
?>
