<?php
    namespace ru\nazarov\crm\forms;

    use ru\nazarov\sitebase\core\forms\RegexpValidator;
    use ru\nazarov\sitebase\core\forms\MethodValidator;

    class AddOrgForm extends OrgForm {
        public function validateName($value) {
            return $this->em()->getRepository('\ru\nazarov\crm\entities\Organization')->findOneBy(array('name' => $value, 'legalEntity' => $_SESSION['le'])) == null;
        }

        public function init() {
            parent::init();

            $this->forField('name')->addValidator(new MethodValidator($this, 'validateName'), 'Organization with same name exists');

            return $this;
        }
    }
?>
