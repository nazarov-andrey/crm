<?php
	namespace ru\nazarov\sitebase\core;

	use \ru\nazarov\sitebase\core\exceptions\SitebaseException;

	abstract class Dependent implements IDependent {
		const INJECTION_BEAN_CONTAINER = 'dependent_bean_container';

		protected $_injections = array();

		public function inject($injStr, $inj) {
			$this->_injections[$injStr] = $inj;
		}

		public function getInjection($injStr) {
			if (!array_key_exists($injStr, $this->_injections)) {
				throw new SitebaseException('Injection \'' . $injStr . '\' is not initialized.');
			}

			return $this->_injections[$injStr];
		}
	}
?>
