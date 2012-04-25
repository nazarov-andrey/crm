<?php
	namespace ru\nazarov\sitebase\core;

	interface IAuth {
		function addRole($roleStr, IRole $role);
		function getRole();
		function isAllowed(IAction $act);
		function getDefaultAction();
		function check();
		function reset();
		function authenticate($login, $pass);
	}
?>
