<?php
	namespace ru\nazarov\crm\forms;

	use ru\nazarov\sitebase\core\forms\RegexpValidator;
	use ru\nazarov\sitebase\core\forms\MethodValidator;

	class OrgForm extends Form {
		public function validateName($value) {
			return $this->em()->getRepository('\ru\nazarov\crm\entities\Organization')->findOneBy(array('name' => $value)) == null;
		}

		public function init() {
			$this->addFieldExt('name', 'Name', null, true)
					->addValidator(new RegexpValidator('^.{1,255}$'), 'Name allowed length is between 1 and 255 symbols')
					->addValidator(new MethodValidator($this, 'validateName'), 'Organization with same name exists')
				->addFieldExt('type', 'Type', Form::FIELD_SELECT)
				->addFieldExt('phone', 'Phone')
				->addFieldExt('site', 'Site')
				->addFieldExt('address', 'Address')
				->addFieldExt('country', 'Country')
				->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
				->setVal('submit', 'add');

			return $this;
		}
	}
?>
