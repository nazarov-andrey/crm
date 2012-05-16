<?php
	namespace ru\nazarov\crm\forms;

	class Textarea extends FieldBase {
		protected function createInput(\DOMDocument $dom) {
			$input = $dom->createElement('textarea', htmlspecialchars($this->_field->value));
			$input->setAttribute('name', $this->_field->name);

			return $input;
		}
	}
?>
