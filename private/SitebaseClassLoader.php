<?php
	require_once "ClassLoaderBase.php";

	class SitebaseClassLoader extends ClassLoaderBase {
		protected $_dir;
		protected $_clsExt;
		protected $_namespaces;

		protected function __construct($dir, $clsExt) {
			$this->_dir = $dir;
			$this->_clsExt = $clsExt;
			//$this->_namespaces = array_merge($namespaces, array('\\'));
		}

		public function loadClass($class) {
			$filename = $this->_dir . str_replace('\\', '/', $class) . $this->_clsExt;

			if (file_exists($filename)) {
				//echo 'ok: ' . $filename . '<br />';
				require_once $filename;
				return true;
			}

			//echo 'fail: ' . $filename . '<br />';
			return false;
		}

		public static function create($dir, $clsExt = '.php') {
			return new self($dir, $clsExt);
		}
	}
?>
