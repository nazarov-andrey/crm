<?php
	namespace ru\nazarov\sitebase\core\forms;

	interface IForm extends \ru\nazarov\sitebase\core\IDependent {
		function addField($name, $required = false);
		function get($name);
		function set($name, $val);
		function forField($name);
		function addValidator(IValidator $validator, $error);
		function validate();
		function isEmpty();
		function clean();
		function init();
	}
?>
