<?php
	namespace ru\nazarov\crm\actions;

	use \ru\nazarov\sitebase\Facade;

	class LogoutAction extends UserAction {
		const INJECTION_AUTH = 'login_action_auth';
		const INJECTION_APP = 'login_action_app';

		public function execute() {
			$this->getInjection(self::INJECTION_AUTH)->reset();
			$this->getInjection(self::INJECTION_APP)->redirect('/');
		}

		public function getInjections() {
			return array_merge(
				parent::getInjections(),

				array(
					(object) array(
						'bean' => Facade::BEAN_AUTH,
						'injection' => self::INJECTION_AUTH,
					),

					(object) array(
						'bean' => Facade::BEAN_APP,
						'injection' => self::INJECTION_APP,
					),
				)
			);
		}
	}
?>
