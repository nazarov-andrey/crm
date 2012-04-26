<?php
	namespace ru\nazarov\crm\forms;

	abstract class Field implements IField {
		protected $_field;

		public function __construct($field) {
			$this->_field = $field;
		}

		public function render(\DOMDocument $dom) {}
	}
?>
