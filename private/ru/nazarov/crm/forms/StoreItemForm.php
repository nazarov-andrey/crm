<?php
    namespace ru\nazarov\crm\forms;

    use \ru\nazarov\sitebase\core\forms\RegexpValidator;

    class StoreItemForm extends Form {
        public function init() {
            $this->addFieldExt('code', 'Code', Form::FIELD_INPUT_TEXT, true)
                ->addFieldExt('desc', 'Description', Form::FIELD_TEXTAREA, true)
                ->addFieldExt('supcode', 'Supplier code', Form::FIELD_INPUT_TEXT, true)
                ->addFieldExt('mancode', 'Manufacturer code', Form::FIELD_INPUT_TEXT, true)
                ->addFieldExt('amount', 'Amount', Form::FIELD_INPUT_TEXT, true)
                    ->addValidator(new RegexpValidator('^[\d]+$'), 'Amount should be valid number')
                ->addFieldExt('minamount', 'Min amount', Form::FIELD_INPUT_TEXT, true)
                    ->addValidator(new RegexpValidator('^[\d]+$'), 'Min amount should be valid number')
                ->addFieldExt('comment', 'Comment', Form::FIELD_TEXTAREA)
                ->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
                ->setVal('submit', 'save');

            return $this;
        }
    }
?>
