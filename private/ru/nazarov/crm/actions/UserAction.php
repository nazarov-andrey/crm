<?php
	namespace ru\nazarov\crm\actions;

	class UserAction extends \ru\nazarov\crm\actions\BaseAction {
		protected function prepareData() {
			parent::prepareData();
			$this->view()->set('top_menu', 'top_menu.tpl')
				->set('left_menu', 'left_menu.tpl');
		}
	}
?>
