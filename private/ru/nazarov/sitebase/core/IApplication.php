<?php
	namespace ru\nazarov\sitebase\core;

	interface IApplication {
		function init(array $conf);
		function run(IRequest $req);
		function redirect($url);
	}
?>
