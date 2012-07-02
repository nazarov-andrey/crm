<?php
    namespace ru\nazarov\crm\forms;

    class OfferForm extends Form {
        public function init() {
            $this->addFieldExt('org', 'Organization', Form::FIELD_SELECT, true)
                ->addFieldExt('app', 'Request id', Form::FIELD_SELECT, true)
                ->addFieldExt('offer_id', 'Offer №', null, true)
                ->addFieldExt('date', 'Date', null, true)
                ->addFieldExt('comment', 'Comment', Form::FIELD_TEXTAREA)
                ->addFieldExt('attachment', '', Form::FIELD_NOT_RENDER)
                ->addFieldExt('submit', '&nbsp;', Form::FIELD_INPUT_SUBMIT)
                ->addFieldExt('rm-attachment', '', Form::FIELD_NOT_RENDER)
                ->set('submit', $this->_submitVal);

            return $this;
        }
    }
?>