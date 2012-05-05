<?php
	namespace ru\nazarov\crm\forms;

	class PersonForm extends Form {
		public function validateOrg($value) {
			return $value != null ? $this->em()->find('\ru\nazarov\crm\entities\Organization', $value) != null : false;
		}

		public function validateTypes($value) {
			if ($value != null) {
				foreach ($value as $type) {
					if ($this->em()->find('\ru\nazarov\crm\entities\ContactType', $type) == null) {
						return false;
					}
				}
			}

			return true;
		}

		public function validateContactsNum($value) {
			return count($this->get('types')) == count($this->get('contacts'));
		}

		public function validateContacts($value) {
			if ($value != null) {
				foreach ($value as $contact) {
					if (empty($contact)) {
						return false;
					}
				}
			}

			return true;
		}

		public function init() {
			$this->addFieldExt('name', 'Name', null, true)
					->addValidator(new \ru\nazarov\sitebase\core\forms\RegexpValidator('^.{1,255}$'), 'Name allowed length is between 1 and 255 symbols')
				->addFieldExt('org', 'Organization', Form::FIELD_SELECT)
					->addValidator(new \ru\nazarov\sitebase\core\forms\MethodValidator($this, 'validateOrg'), 'Invalid organization id')
				->addFieldExt('pos', 'Position')
				->addFieldExt('comment', 'Comment', Form::FIELD_TEXTAREA)
				->addFieldExt('types', '', Form::FIELD_NOT_RENDER)
					->addValidator(new \ru\nazarov\sitebase\core\forms\MethodValidator($this, 'validateTypes'), 'Invalid contact type')
				->addFieldExt('contacts', '', Form::FIELD_NOT_RENDER)
					->addValidator(new \ru\nazarov\sitebase\core\forms\MethodValidator($this, 'validateContactsNum'), 'Contacts number is not match types number')
					->addValidator(new \ru\nazarov\sitebase\core\forms\MethodValidator($this, 'validateContacts'), 'Empty contact is not allowed')
				->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
				->set('submit', $this->_submitVal);

			return $this;
		}
	}
?>
