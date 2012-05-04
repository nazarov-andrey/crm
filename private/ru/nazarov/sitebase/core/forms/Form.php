<?php
	namespace ru\nazarov\sitebase\core\forms;

    abstract class Form extends \ru\nazarov\sitebase\core\Dependent implements \ru\nazarov\sitebase\core\IDependent, IForm {
		const INJECTION_REQUEST = 'form_injection_request';
		const INJECTION_ENTITY_MANAGER = 'form_entity_manager';

        protected $_field = '';
        protected $_fields = array();
        protected $_corrections = array();

		protected function request() {
			return $this->getInjection(self::INJECTION_REQUEST);
		}

		protected function em() {
			return $this->getInjection(self::INJECTION_ENTITY_MANAGER);
		}

		public function init() {
			return $this;
		}

        public function addField($name, $required = false) {
            if (array_key_exists($name, $this->_fields)) {
				return $this;
			}

			$field = new \stdClass();
            $field->name = $name;
            $field->required = $required;
            $field->value = $this->request()->get($name);
            $field->validators = array();
			$field->error = null;

			$this->_fields[$name] = $field;
            $this->_field = $name;

            return $this;
        }
        
        public function forField($name) {
            $this->_field = $name;
            return $this;
        }
        
        public function addValidator(IValidator $validator, $error) {
            if (!array_key_exists($this->_field, $this->_fields)) {
                $this->addField($this->_field);
            }
            
            $rule = new \stdClass();
            $rule->validator = $validator;
			$rule->error = $error;

            $this->_fields[$this->_field]->validators[] = $rule;
            
            return $this;
        }
        
        public function isEmpty() {
            foreach ($this->_fields as $i => $field) {
                if ($field->value !== null) {
					return false;
				}
            }
            
            return true;
        }
        
        public function clean() {
            foreach ($this->_fields as $name => $field) {
                $this->_fields[$name]->value = null;
                $this->request()->$name = null;
            }
        }
        
        public function validate() {
            foreach ($this->_fields as $i => $field) {
                if ($field->required && empty($field->value)) {
                    $field->error = 'Required field \'' . $field->label . '\' is empty';
                    return false;
                }
                
                foreach ($field->validators as $i => $rule) {
                    if (!$rule->validator->isValid($field->value)) {
                        $field->error = $rule->error;
                        return false;
                    }
                }
            }

            return true;
        }

		public function set($name, $val) {
			$this->_fields[$name]->value = $val;
		}

		public function setErr($name, $err) {
			$this->_fields[$name]->error = $err;
		}

		public function get($name) {
			return array_key_exists($name, $this->_fields) ? $this->_fields[$name]->value : null;
		}
    }
?>