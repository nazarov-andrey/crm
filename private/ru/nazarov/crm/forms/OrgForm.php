<?php
	namespace ru\nazarov\crm\forms;

	use ru\nazarov\sitebase\core\forms\RegexpValidator;
	use ru\nazarov\sitebase\core\forms\MethodValidator;

	class OrgForm extends Form {
		public function init() {
			$this->addFieldExt('name', 'Name', null, true)
                    ->addValidator(new RegexpValidator('^.{1,255}$'), 'Name allowed length is between 1 and 255 symbols')
				->addFieldExt('type', 'Type', Form::FIELD_SELECT)
				->addFieldExt('phone', 'Phone')
				->addFieldExt('site', 'Site')
				->addFieldExt('address', 'Address')
				->addFieldExt('country', 'Country')
				->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
				->set('submit', $this->_submitVal);

			return $this;
		}
	}
?>
