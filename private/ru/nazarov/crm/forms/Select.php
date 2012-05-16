<?php
	namespace ru\nazarov\crm\forms;

	class Select extends FieldBase {
		protected function createInput(\DOMDocument $dom) {
			$input = $dom->createElement('select');
			$input->setAttribute('name', $this->_field->name);

			if (property_exists($this->_field, 'values')) {
				foreach ($this->_field->values as $fieldInfo) {
					$opt = $dom->createElement('option', htmlspecialchars($fieldInfo->label));
					$opt->setAttribute('value', $fieldInfo->val);

					if ($this->_field->value === $fieldInfo->val) {
						$opt->setAttribute('selected', 'setected');
					}

					if (property_exists($fieldInfo, 'disabled')) {
						$opt->setAttribute('disabled', 'disabled');
					}

					$input->appendChild($opt);
				}
			}

			return $input;
		}
	}
?>
