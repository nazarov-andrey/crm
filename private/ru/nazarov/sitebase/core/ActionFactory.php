<?php
	namespace ru\nazarov\sitebase\core;

	class ActionFactory extends Dependent implements IDependent,IActionFactory {
		const INJECTION_CORE_FACTORY = 'actionsfactory_injection_core_factory';

		protected static $_instance;
		protected $_actsNs;

		protected function __construct() {
			$this->_actsNs  = __NAMESPACE__ . '\\actions\\';
		}

		public function createAction(IRequest $req) {
			$act = $req->getValue('action');

			if ($act == null) {
				return null;
			}

			return $this->_actsNs . implode('', array_map(function ($chunk) { return ucfirst($chunk); }, explode('_', $act))) . 'Action';
		}

		public function createErrorAction($mes) {
			return new \ru\nazarov\sitebase\core\actions\ErrorAction($mes);
		}

		public static function instance() {
			if (self::$_instance == null) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		public function setActionsNamespace($ns) {
			$this->_actsNs = $ns;
			return $this;
		}
	}
?>
