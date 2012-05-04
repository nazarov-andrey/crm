<?php
	namespace ru\nazarov\sitebase\core;

	class BeanContainer implements IBeanContainer {
		protected static $_instance;
		protected $_beans = array();
		protected $_deps = array();

		public function addBean($beanStr, $bean) {
			$this->_beans[$beanStr] = $bean;
			return $this;
		}

		public function addDependency(IDependent $dep, $injectionStr, $beanStr) {
			if (!array_key_exists($beanStr, $this->_beans)) {
				return $this;
			}

			if (!array_key_exists($beanStr, $this->_deps)) {
				$this->_deps[$beanStr] = array();
			}

			$this->_deps[$beanStr][$injectionStr] = $dep;

			return $this;
		}

		public function inject(IDependent $into) {
			foreach ($this->_beans as $beanStr => $bean) {
				if (!array_key_exists($beanStr, $this->_deps)) {
					continue;
				}

				foreach ($this->_deps[$beanStr] as $injectionStr => $dep) {
					if ($dep === $into) {
						$into->inject($injectionStr, $bean);
						break;
					}
				}
			}
		}

		public function injectAll() {
			foreach ($this->_beans as $beanStr => $bean) {
				if (!array_key_exists($beanStr, $this->_deps)) {
					continue;
				}

				foreach ($this->_deps[$beanStr] as $injectionStr => $dep) {
					$dep->inject($injectionStr, $bean);
				}
			}
		}

        public function getBean($beanStr) {
            return isset($this->_beans[$beanStr]) ? $this->_beans[$beanStr] : null;
        }

		public static function instance() {
			if (self::$_instance == null) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
	}
?>
