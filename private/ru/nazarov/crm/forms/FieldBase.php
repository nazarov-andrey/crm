<?php
	namespace ru\nazarov\crm\forms;

	abstract class FieldBase extends Field {
		abstract protected function createInput(\DOMDocument $dom);

		public function render(\DOMDocument $dom) {
			$field = $dom->createElement('div');
			$field->setAttribute('class', 'form-field');

			$label = $dom->createElement('div', $this->_field->label);
			$label->setAttribute('class', 'form-field-label');
			$field->appendChild($label);

			$input = $dom->createElement('div');
			$input->setAttribute('class', 'form-field-input');
			$input->appendChild($this->createInput($dom));
			$field->appendChild($input);

			if ($this->_field->error != null) {
				$error = $dom->createElement('span', $this->_field->error);
				$error->setAttribute('class', 'form-field-error');
				$input->appendChild($error);
			}

			return $field;
		}
	}
?>
