<?php
    namespace ru\nazarov\crm\forms;

    class PersonEditForm extends PersonForm {
        public function init() {
            parent::init();
            $this->addFieldExt('ids', '', Form::FIELD_NOT_RENDER);
            return $this;
        }
    }
?>
