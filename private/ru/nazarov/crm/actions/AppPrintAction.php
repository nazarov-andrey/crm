<?php
	namespace ru\nazarov\crm\actions;

	class AppPrintAction extends \ru\nazarov\crm\actions\PrintAction {
		public function prepareData() {
			parent::prepareData();

			if (($id = $this->request()->getValue('id')) === null) {
				throw new \ru\nazarov\sitebase\core\exceptions\SitebaseException('Wrong request id');
			}

			if (($app = $this->em()->find('\ru\nazarov\crm\entities\Application', $id)) === null) {
				throw new \ru\nazarov\sitebase\core\exceptions\SitebaseException('Wrong request id');
			}

			$this->view()->set('content', 'app_print.tpl')
				->set('app', $app);
		}
	}
?>
