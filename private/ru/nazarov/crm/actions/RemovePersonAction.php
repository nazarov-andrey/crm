<?php
    namespace ru\nazarov\crm\actions;

    class RemovePersonAction extends AbstractRemoveAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Person', 'Invalid person id', '/?action=persons_list');
        }

        protected function checkRemovePossibility() {
            parent::checkRemovePossibility();
            $em = $this->em();

            $query = $em->createQuery('SELECT r FROM \ru\nazarov\crm\entities\Report r JOIN r.contact c JOIN c.person p WHERE p=:pers');
            $query->setMaxResults(1);
            $query->setParameter('pers', $this->_item->getId());

            if (count($query->getResult()) > 0) {
                throw new \ru\nazarov\crm\exceptions\ErrorException('Cannot remove person: remove at first all reports with this person, then try to remove person again.');
            }
        }
    }
?>