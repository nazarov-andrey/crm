<?php
	namespace ru\nazarov\sitebase\core;

	interface IRequest {
		function get($key);
        function set($key, $val);
	}
?>
