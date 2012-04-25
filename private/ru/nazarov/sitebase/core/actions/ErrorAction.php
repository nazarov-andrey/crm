<?php
	namespace ru\nazarov\sitebase\core\actions;

	use \ru\nazarov\sitebase\core\IAction;
	use \ru\nazarov\sitebase\core\IDependent;
	use \ru\nazarov\sitebase\core\Dependent;

	class ErrorAction extends Dependent implements IDependent,IAction {
		protected $_mes;

		public function __construct($mes) {
			$this->_mes = $mes;
		}

		public function execute() {
			echo 'Error: ' . $this->_mes;
		}

		public function getInjections() {
			return array();
		}
	}
?>
