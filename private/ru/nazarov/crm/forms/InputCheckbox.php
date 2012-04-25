<?php
	namespace ru\nazarov\crm\forms;

	class InputCheckbox extends Input {
		protected function createInput(\DOMDocument $dom) {
			$input = parent::createInput($dom);
			$input->setAttribute('type', 'checkbox');

			if ($this->_field->value !== null) {
				$input->setAttribute('checked', 'checked');
			}

			return $input;
		}
	}
?>
