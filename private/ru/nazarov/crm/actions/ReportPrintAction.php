<?php
	namespace ru\nazarov\crm\actions;

	class ReportPrintAction extends \ru\nazarov\crm\actions\PrintAction {
		public function prepareData() {
			parent::prepareData();

			if (($id = $this->request()->get('id')) === null) {
				throw new \ru\nazarov\sitebase\core\exceptions\SitebaseException('Wrong report id');
			}

			if (($report = $this->em()->find('\ru\nazarov\crm\entities\Report', $id)) === null) {
				throw new \ru\nazarov\sitebase\core\exceptions\SitebaseException('Wrong report id');
			}

			$this->view()->set('content', 'report_print.tpl')
				->set('report', $report);
		}
	}
?>
