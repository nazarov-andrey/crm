<?php
    namespace ru\nazarov\crm\actions;

    use \ru\nazarov\sitebase\core\Application;

    class RemoveStoreAction extends UserAction {
        public function execute() {
            $req = $this->request();
            $em = $this->em();
            $id = $req->get('id');

            if ($id === null || (($item = $this->em()->find('\ru\nazarov\crm\entities\StoreItem', $id)) == null)) {
                $this->error('Invalid store item id', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null);
                return;
            }

            $em->remove($item);
            $em->flush();

            Application::instance()->redirect('/?action=store');
        }
    }
?>
