<?php
	namespace ru\nazarov\sitebase\core;

	use ru\nazarov\sitebase\core\forms\Form;

	class CoreFactory extends Dependent implements IDependent, ICoreFactory {
		const INJECTION_BEAN_CONTAINER = 'core_factory_bean_container';

		protected static $_instance;

		protected function bc() {
			$this->getInjection(self::INJECTION_BEAN_CONTAINER);
		}

		public function createRole() {
			return new Role();
		}

		public static function instance() {
			if (self::$_instance == null) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		public function createFunctionValidator(\Closure $fun) {
			return new \ru\nazarov\sitebase\core\forms\FunctionValidator($fun);
		}

		public function createMethodValidator($obj, $method) {
			return new \ru\nazarov\sitebase\core\forms\MethodValidator($obj, $method);
		}

		public function createRegexpValidator($regex) {
			return new \ru\nazarov\sitebase\core\forms\RegexpValidator($regex);
		}
	}
?>
