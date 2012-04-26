<?php
	namespace ru\nazarov\crm\forms;

	class InputHidden extends FieldBase {
		protected function createInput(\DOMDocument $dom) {}

		public function render(\DOMDocument $dom) {
			$input = $dom->createElement('input');
			$input->setAttribute('name', $this->_field->name);
			$input->setAttribute('value', $this->_field->value);
			$input->setAttribute('type', 'hidden');

			return $input;
		}
	}
?>
