<?php
	namespace ru\nazarov\crm\actions;

	class DefaultUserAction extends UserAction {
		protected function prepareData() {
			parent::prepareData();

			$this->em()->find('\ru\nazarov\crm\entities\Organization', 1);
			$this->view()->set('content', 'welcome.tpl');
		}
	}
?>
