<?php
	namespace ru\nazarov\sitebase\custom;

	define('BASE_DIR', __DIR__ . '/../../../../');
	define('TPL_DIR', BASE_DIR . 'tpl/');

	require_once BASE_DIR . 'smarty/Smarty.class.php';

	class SmartyView extends \Smarty implements \ru\nazarov\sitebase\core\IView {
		protected $_layout;

		public function __construct() {
			parent::__construct();

			$this->template_dir = TPL_DIR . 'templates/';
			$this->compile_dir = TPL_DIR . 'templates_c/';
			$this->config_dir = TPL_DIR . 'configs/';
			$this->cache_dir = TPL_DIR . 'cache/';
		}

		protected  function setLayout($layout) {
			$this->_layout = $layout;
		}

		public function set($key, $val) {
			$this->assign($key, $val);
			return $this;
		}

		public function render() {
			$this->display($this->_layout);
		}
	}
?>
