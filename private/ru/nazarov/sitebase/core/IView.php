<?php
	namespace ru\nazarov\sitebase\core;

	interface IView {
		function set($key, $val);
		function render();
	}
?>
