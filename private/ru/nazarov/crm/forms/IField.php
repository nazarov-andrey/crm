<?php
	namespace ru\nazarov\crm\forms;

	interface IField {
		function render(\DOMDocument $dom);
	}
?>
