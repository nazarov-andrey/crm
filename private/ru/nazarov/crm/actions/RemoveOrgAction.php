<?php
    namespace ru\nazarov\crm\actions;

    class RemoveOrgAction extends AbstractRemoveAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Organization', 'Invalid organization id', '/?action=orgs_list');
        }

        protected function checkRemovePossibility() {
            parent::checkRemovePossibility();

            $em = $this->em();
            $sq = $em->createQuery('SELECT a FROM \ru\nazarov\crm\entities\Application a JOIN a.supplier s WHERE s=:sup');
            $sq->setMaxResults(1);
            $sq->setParameter('sup', $this->_item->getId());
            $cq = $em->createQuery('SELECT a FROM \ru\nazarov\crm\entities\Application a JOIN a.client c WHERE c=:cli');
            $cq->setMaxResults(1);
            $cq->setParameter('cli', $this->_item->getId());

            if (count($sq->getResult()) > 0 || count($cq->getResult()) > 0) {
                throw new \ru\nazarov\crm\exceptions\ErrorException('Cannot remove organization: at first remove all requests with organization, then try to remove once again');
            }
        }
    }
?>