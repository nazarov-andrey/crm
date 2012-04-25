<?php
	abstract class ClassLoaderBase {
		abstract public function loadClass($class);

		public function register() {
			spl_autoload_register(array($this, 'loadClass'));
		}
	}
?>
