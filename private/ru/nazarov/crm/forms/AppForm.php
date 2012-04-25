<?php
	namespace ru\nazarov\crm\forms;

	class AppForm extends Form {
		public function init() {
			$this->addFieldExt('client', 'Client', FOrm::FIELD_SELECT, true)
				->addFieldExt('supplier', 'Supplier', FOrm::FIELD_SELECT, true)
				->addFieldExt('date', 'Date', null, true)
			        ->addValidator(new \ru\nazarov\sitebase\core\forms\RegexpValidator('[\d]{2}/[\d]{2}/[\d]{4}'), 'Invalid date format')
				->addFieldExt('comment', 'Comment', Form::FIELD_TEXTAREA)
				->addFieldExt('notify_client', 'Notify client', Form::FIELD_INPUT_CHECKBOX)
				->addFieldExt('attachment', '', Form::FIELD_NOT_RENDER)
				->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
				->setVal('submit', 'save');

			return $this;
		}
	}
?>