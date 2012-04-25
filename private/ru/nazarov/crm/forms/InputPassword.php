<?php
	namespace ru\nazarov\crm\forms;

	class InputPassword extends Input {
		protected function createInput(\DOMDocument $dom) {
			$input = parent::createInput($dom);
			$input->setAttribute('type', 'password');

			return $input;
		}
	}
?>
