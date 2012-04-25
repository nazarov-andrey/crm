<?php
	namespace ru\nazarov\sitebase\core\forms;

    class MethodValidator implements IValidator {
        private $_obj;
        private $_method;
        
        public function __construct($obj, $method) {
			$this->_obj = $obj;
			$this->_method = $method;
        }
        
        public function isValid($value) {
            return call_user_func(array($this->_obj, $this->_method), $value);
        }
    }
?>