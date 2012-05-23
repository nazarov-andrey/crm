<?php
    namespace ru\nazarov\crm\forms;

    class OfferForm extends Form {
        public function init() {
            $this->addFieldExt('org', 'Organization', Form::FIELD_SELECT, true)
                ->addFieldExt('app', 'Request id', Form::FIELD_SELECT, true)
                //->addFieldExt('offer_id', 'Offer id', null, true)
                ->addFieldExt('date', 'Date', null, true)
                ->addFieldExt('comment', 'Comment', Form::FIELD_TEXTAREA)
                ->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
                ->set('submit', $this->_submitVal);

            return $this;
        }
    }
?>