<?php
    namespace ru\nazarov\crm\actions;

    use \ru\nazarov\sitebase\core\Application;

    abstract class AbstractRemoveAction extends UserAction {
        protected $_entityCls;
        protected $_invalidIdMes;
        protected $_redirectUrl;

        protected $_item;

        public function __construct($entityCls, $invalidIdMes, $redirectUrl) {
            $this->_entityCls = $entityCls;
            $this->_invalidIdMes = $invalidIdMes;
            $this->_redirectUrl = $redirectUrl;
        }

        protected function checkRemovePossibility() {
            $req = $this->request();
            $em = $this->em();
            $id = $req->get('id');

            if ($id === null || (($this->_item = $this->em()->find($this->_entityCls, $id)) == null)) {
                throw new \ru\nazarov\crm\exceptions\ErrorException($this->_invalidIdMes);
            }
        }

        public function execute() {
            try {
                $this->checkRemovePossibility();

                $em = $this->em();
                $em->remove($this->_item);
                $em->flush();

                Application::instance()->redirect($this->_redirectUrl);
            } catch (\ru\nazarov\crm\exceptions\ErrorException $e) {
                $this->error($e->mes, $e->back);
            }
        }
    }
?>