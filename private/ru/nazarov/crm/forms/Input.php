<?php
	namespace ru\nazarov\crm\forms;

	class Input extends FieldBase {
		protected function createInput(\DOMDocument $dom) {
			$input = $dom->createElement('input');
			$input->setAttribute('name', $this->_field->name);
			$input->setAttribute('value', $this->_field->value);

			return $input;
		}
	}
?>
