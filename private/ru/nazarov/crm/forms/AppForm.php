<?php
	namespace ru\nazarov\crm\forms;

	class AppForm extends Form {
		public function init() {
			$this->addFieldExt('client', 'Client', Form::FIELD_SELECT, true)
				->addFieldExt('supplier', 'Supplier', Form::FIELD_SELECT, true)
				->addFieldExt('date', 'Date', null, true)
			        ->addValidator(new \ru\nazarov\sitebase\core\forms\RegexpValidator('[\d]{4}-[\d]{2}-[\d]{2}'), 'Invalid date Format')
				->addFieldExt('comment', 'Comment', Form::FIELD_TEXTAREA)
				->addFieldExt('attachment', '', Form::FIELD_NOT_RENDER)
				->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
                ->addFieldExt('rm-attachment', '', Form::FIELD_NOT_RENDER)
				->set('submit', $this->_submitVal);

			return $this;
		}
	}
?>
