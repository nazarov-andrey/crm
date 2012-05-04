<?php
    namespace ru\nazarov\crm\actions;

    use \ru\nazarov\sitebase\core\Application;

    abstract class AbstractRemoveAction extends UserAction {
        protected $_entityCls;
        protected $_invalidIdMes;
        protected $_redirectUrl;

        public function __construct($entityCls, $invalidIdMes, $redirectUrl) {
            $this->_entityCls = $entityCls;
            $this->_invalidIdMes = $invalidIdMes;
            $this->_redirectUrl = $redirectUrl;
        }

        public function execute() {
            $req = $this->request();
            $em = $this->em();
            $id = $req->get('id');

            if ($id === null || (($item = $this->em()->find($this->_entityCls, $id)) == null)) {
                $this->error($this->_invalidIdMes, isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null);
                return;
            }

            $em->remove($item);
            $em->flush();

            Application::instance()->redirect($this->_redirectUrl);
        }
    }
?>