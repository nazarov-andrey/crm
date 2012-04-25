<?php
	namespace ru\nazarov\sitebase\core;

	interface ICoreFactory extends IDependent {
		function createRole();
		function createFunctionValidator(\Closure $fun);
		function createMethodValidator($obj, $method);
		function createRegexpValidator($regex);
	}
?>
