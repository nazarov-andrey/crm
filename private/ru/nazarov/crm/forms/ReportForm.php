<?php
	namespace ru\nazarov\crm\forms;

	class ReportForm extends Form {
		public function init() {
			$this->addFieldExt('type', 'Type', Form::FIELD_SELECT)
				->addFieldExt('org', 'Organization', Form::FIELD_SELECT)
				->addFieldExt('person', 'Person', Form::FIELD_SELECT)
				->addFieldExt('contact', 'Contact', Form::FIELD_SELECT, true)
				->addFieldExt('date', 'Date', null, true)
				->addFieldExt('comment', 'Comment', Form::FIELD_TEXTAREA)
				->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
				->set('submit', $this->_submitVal);

			return $this;
		}
	}
?>
