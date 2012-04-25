<?php
	namespace ru\nazarov\crm\forms;

	class InputText extends Input {
		protected function createInput(\DOMDocument $dom) {
			$input = parent::createInput($dom);
			$input->setAttribute('type', 'text');

			return $input;
		}
	}
?>
