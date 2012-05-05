<?php
	namespace ru\nazarov\crm\actions;

    use \ru\nazarov\sitebase\core\Application;

	class UserAction extends \ru\nazarov\crm\actions\BaseAction {
        protected function error($mes, $back = null) {
            $this->request()->set('mes', $mes)
                ->set('action', 'error')
                ->set('back', isset($back) ? $back : (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null));
            Application::instance()->run($this->request());
        }

		protected function prepareData() {
			parent::prepareData();
			$this->view()->set('top_menu', 'top_menu.tpl')
				->set('left_menu', 'left_menu.tpl');
		}
	}
?>
