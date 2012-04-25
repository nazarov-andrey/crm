<?php
	namespace ru\nazarov\sitebase\core;

	class Application extends Dependent implements IDependent, IApplication {
		const INJECTION_ACTS_FACTORY = 'application_injection_acts_factory';
		const INJECTION_AUTH = 'application_injection_auth';
		const INJECTION_BEAN_CONTAINER = 'application_injection_bean_container';

		protected static $_instance;

		protected function __construct() {}

		protected function actFactory() {
			return $this->getInjection(self::INJECTION_ACTS_FACTORY);
		}

		protected function auth() {
			return $this->getInjection(self::INJECTION_AUTH);
		}

		protected function beanContainer() {
			return $this->getInjection(self::INJECTION_BEAN_CONTAINER);
		}

		public function init(array $conf) {
			return $this;
		}

		public function run(IRequest $req) {
			$auth = $this->auth();
			$auth->check();
			$class = $this->actFactory()->createAction($req);

			if (($class == null) || !$auth->isAllowed($action = new $class())) {
				unset($action);

				$class = $auth->getDefaultAction();
				$action = new $class();
			}

			$bc = $this->beanContainer();

			foreach ($action->getInjections() as $injBeanPair) {
				$bc->addDependency($action, $injBeanPair->injection, $injBeanPair->bean);
			}

			$bc->inject($action);
			$action->execute();
		}

		public function redirect($url) {
			header('location: '. $url);
		}

		public static function instance() {
			if (self::$_instance == null) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
	}
?>
