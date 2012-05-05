<?php
    namespace ru\nazarov\crm\actions;

    use \ru\nazarov\sitebase\core\Application;
    use \ru\nazarov\crm\forms\StoreItemForm;

    abstract class AbstractEditAction extends UserAction {
        protected $_item = null;
        protected $_form = null;

        protected $_entityCls;
        protected $_invalidIdMsg;
        protected $_redirectUrl;
        protected $_formId;
        protected $_formName;
        protected $_formAct;
        protected $_formMethod;
        protected $_formCls;
        protected $_formEnctype;
        protected $_tpl;

        public function __construct($entityCls, $invalidIdMsg, $redirectUrl, $formCls, $formId, $formName, $formAct, $formMethod, $formEnctype = null, $tpl = 'form.tpl') {
            $this->_entityCls = $entityCls;
            $this->_invalidIdMsg = $invalidIdMsg;
            $this->_redirectUrl = $redirectUrl;
            $this->_formId = $formId;
            $this->_formName = $formName;
            $this->_formAct = $formAct;
            $this->_formMethod = $formMethod;
            $this->_formCls = $formCls;
            $this->_formEnctype = $formEnctype;
            $this->_tpl = $tpl;
        }

        protected abstract function setItemFields();

        protected abstract function setFormFields();

        protected abstract function fillSelects();

        protected function prepareData() {
            parent::prepareData();

            if ($this->_form == null) {
                $this->_form = $this->prepareForm(new $this->_formCls($this->_formId, $this->_formName, $this->_formAct . "&id=" . $this->_item->getId(), $this->_formMethod, $this->_formEnctype, 'save'));
                $this->setFormFields();
            }

            $this->fillSelects();
            $this->view()->set('content', $this->_tpl)
                ->set('form', $this->_form);
        }

        public function execute() {
            try {
                $req = $this->request();
                $id = $req->get('id');

                if ($id === null || (($this->_item = $this->em()->find($this->_entityCls, $id)) == null)) {
                    $this->error($this->_invalidIdMsg);
                    return;
                }

                if ($req->get('submit') !== null) {
                    $this->_form = $form = $this->prepareForm(new $this->_formCls($this->_formId, $this->_formName, $this->_formAct . "&id=" . $this->_item->getId(), $this->_formMethod, $this->_formEnctype, 'save'));

                    if ($this->_form->validate()) {
                        $em = $this->em();
                        $this->_item = $em->find($this->_entityCls, $id);
                        $this->setItemFields();
                        $em->flush();
                        Application::instance()->redirect($this->_redirectUrl);

                        return;
                    }
                }

                parent::execute();
            } catch (\ru\nazarov\crm\exceptions\ErrorException $e) {
                $this->error($e->mes, $e->back);
            }
        }
    }
?>