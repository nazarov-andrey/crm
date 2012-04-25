<?php
	namespace ru\nazarov\crm\forms;

	class NotRender extends FieldBase {
		protected function createInput(\DOMDocument $dom) {}

		public function render(\DOMDocument $dom) {
			return null;
		}
	}
?>