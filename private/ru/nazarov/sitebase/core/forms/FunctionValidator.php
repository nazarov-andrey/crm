<?php
	namespace ru\nazarov\sitebase\core\forms;

	class FunctionValidator implements IValidator {
		private $_fun;

		public function __construct(\Closure $fun) {
			$this->_fun = $fun;
		}

		public function isValid($value) {
			return call_user_func($this->_fun, $value);
		}
	}
?>