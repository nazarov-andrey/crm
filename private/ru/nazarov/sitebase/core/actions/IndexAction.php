<?php
	namespace ru\nazarov\sitebase\core\actions;

	use \ru\nazarov\sitebase\core\IAction;
	use \ru\nazarov\sitebase\core\IDependent;
	use \ru\nazarov\sitebase\core\Dependent;
	use \ru\nazarov\sitebase\Facade;

	class IndexAction extends Dependent implements IDependent,IAction {
		const INJECTION_ENTITY_MANAGER = 'index_action_injection_entity_manager';

		public function setRequest() {}
		public function setAuth() {}

		public function execute() {
			echo 'index action';
		}

		public function getInjections() {
			return array(
				(object) array(
					'bean' => Facade::BEAN_ENTITY_MANAGER,
					'injection' => self::INJECTION_ENTITY_MANAGER,
				),
			);
		}
	}
?>
