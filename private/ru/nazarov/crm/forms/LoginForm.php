<?php
	namespace ru\nazarov\crm\forms;

	use ru\nazarov\sitebase\core\forms\RegexpValidator;
	use ru\nazarov\sitebase\core\forms\MethodValidator;

	class LoginForm extends Form {
		public function init() {
			$this->addFieldExt('login', 'Login')
					->addValidator(new RegexpValidator('^.{1,255}$'), 'Login allowed length is between 1 and 255 symbols')
				->addFieldExt('pass', 'Password', Form::FIELD_INPUT_PASSWORD)
                ->addFieldExt('legal_entity', 'Legal entity', Form::FIELD_SELECT)
				->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
				->setVal('submit', 'login');

			return $this;
		}
	}
?>
