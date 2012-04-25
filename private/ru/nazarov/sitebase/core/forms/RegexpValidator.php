<?php
	namespace ru\nazarov\sitebase\core\forms;

    class RegexpValidator implements IValidator {
        protected  $_regexp = '';
        
        public function __construct($regexp) {
            $this->_regexp = $regexp;
        }
        
        public function isValid($val) {
            return mb_ereg_match($this->_regexp, $val);
        }
    }
?>