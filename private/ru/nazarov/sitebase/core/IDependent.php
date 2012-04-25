<?php
	namespace ru\nazarov\sitebase\core;

	interface IDependent {
		function inject($injStr, $inj);
		function getInjection($injStr);
	}
?>
