<?php
	namespace ru\nazarov\crm\forms;

	class InputSubmit extends Input {
		protected function createInput(\DOMDocument $dom) {
			$input = parent::createInput($dom);
			$input->setAttribute('type', 'submit');

			return $input;
		}
	}
?>
