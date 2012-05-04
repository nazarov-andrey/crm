<?php
	namespace ru\nazarov\sitebase\core;

	class Request implements IRequest {
		protected static $_instance;
		protected $_data;

		protected function __construct() {
			$this->_data = array_change_key_case(array_merge($_GET, $_POST, $_SERVER, $_FILES));
		}

		public function get($key) {
			$key = strtolower($key);
			return array_key_exists($key, $this->_data) ? $this->_data[$key] : null;
		}

        public function set($key, $val) {
            $this->_data[$key] = $val;
            return $this;
        }

		public static function instance() {
			if (self::$_instance == null) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
	}
?>
