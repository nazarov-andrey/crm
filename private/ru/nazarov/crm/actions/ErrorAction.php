<?php
    namespace ru\nazarov\crm\actions;

    class ErrorAction extends UserAction {
        protected function prepareData() {
            parent::prepareData();

            $r = $this->request();

            $this->view()->set('content', 'error.tpl')
                ->set('mes', $r->get('mes'))
                ->set('back', $r->get('back'));
        }
    }
?>
