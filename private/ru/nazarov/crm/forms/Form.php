<?php
	namespace ru\nazarov\crm\forms;

	class Form extends \ru\nazarov\sitebase\core\forms\Form {
		const METHOD_POST = 'post';
		const METHOD_GET = 'get';

		const FIELD_INPUT_TEXT = 'form_field_input_text';
		const FIELD_INPUT_PASSWORD = 'form_field_input_password';
		const FIELD_INPUT_CHECKBOX = 'form_field_input_checkbox';
		const FIELD_INPUT_SUBMIT = 'form_field_input_submit';
		const FIELD_INPUT_HIDDEN = 'form_field_input_hidden';
		const FIELD_SELECT = 'form_field_select';
		const FIELD_TEXTAREA = 'form_field_textarea';
		const FIELD_NOT_RENDER = 'form_field_not_render';

		protected $_id;
		protected $_name;
		protected $_method;
		protected $_enctype;
		protected $_action;
        protected $_submitVal;

		public function __construct($id, $name, $action, $method, $enctype = null, $submitVal = 'add') {
			$this->_id = $id;
			$this->_name = $name;
			$this->_method = $method;
			$this->_enctype = $enctype;
			$this->_action = $action;
            $this->_submitVal = $submitVal;
		}

		protected function createField($name) {
			$field = $this->_fields[$name];

			switch ($field->type) {
				case self::FIELD_INPUT_SUBMIT:
					return new InputSubmit($field);

				case self::FIELD_INPUT_PASSWORD:
					return new InputPassword($field);

				case self::FIELD_SELECT:
					return new Select($field);

				case self::FIELD_TEXTAREA:
					return new Textarea($field);

				case self::FIELD_INPUT_HIDDEN:
					return new InputHidden($field);

				case self::FIELD_NOT_RENDER:
					return new NotRender($field);

				case self::FIELD_INPUT_CHECKBOX:
					return new InputCheckbox($field);

				default:
					return new InputText($field);
			}
		}

		public function addFieldExt($name, $label, $type = null, $required = false) {
			$this->addField($name, $required);

			$field = $this->_fields[$name];
			$field->label = $label;
			$field->type = $type == null ? self::FIELD_INPUT_TEXT : $type;

			return $this;
		}

		public function setFieldVals($name, $values) {
			if (!array_key_exists($name, $this->_fields)) {
				return $this;
			}

			$this->_fields[$name]->values = $values;
			return $this;
		}

		public function render() {
			$dom = $dom = new \DOMDocument('1.0');

			$header = $dom->createElement('h1', $this->_name);
			$dom->appendChild($header);

			$form = $dom->createElement('form');
			$form->setAttribute('action', $this->_action);
			$form->setAttribute('method', $this->_method);
			$form->setAttribute('id', $this->_id);

			if ($this->_enctype != null) {
				$form->setAttribute('enctype', $this->_enctype);
			}

			$dom->appendChild($form);

			foreach ($this->_fields as $name => $field) {
				if ((($field->type == self::FIELD_INPUT_HIDDEN) || ($field->type == self::FIELD_NOT_RENDER)) && ($field->error != null)) {
					$err = $dom->createElement('div', $field->error);
					$err->setAttribute('class', 'form-field-error');
					$dom->insertBefore($err, $form);
				}

				if (($rendered = $this->createField($name)->render($dom)) != null) {
					$form->appendChild($rendered);
				}
			}

			return $dom->saveHTML();
		}

		public function isEmpty() {
			foreach ($this->_fields as $i => $field) {
				if (($field->type != self::FIELD_INPUT_SUBMIT) && ($field->value !== null)) {
					return false;
				}
			}

			return true;
		}

		public function clean() {
			foreach ($this->_fields as $name => $field) {
				if ($field->type != self::FIELD_INPUT_SUBMIT) {
					$this->_fields[$name]->value = null;
				}
			}
		}
	}
?>
