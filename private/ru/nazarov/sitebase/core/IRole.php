<?php
	namespace ru\nazarov\sitebase\core;

	interface IRole {
		function allow($act);
		function allowMultiple(array $acts);
		function deny($act);
		function denyMultiple(array $acts);
		function isAllowed(IAction $act);
		function setDefaultAction($act);
		function getDefaultAction();
		function inherit(IRole $role);
		function getAllowed();
		function getDenied();
	}
?>
