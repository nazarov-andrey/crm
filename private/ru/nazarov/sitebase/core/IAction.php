<?php
	namespace ru\nazarov\sitebase\core;

	interface IAction extends IDependent {
		function execute();
		function getInjections();
	}
?>
