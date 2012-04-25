<?php
	namespace ru\nazarov\crm\actions;

	class ReportsListAction extends UserAction {
		protected function prepareData() {
			parent::prepareData();

			$em = $this->em();

			$orgs = $em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array(), array('typeId' => 'ASC'));
			$orgId = $this->request()->getValue('org');

			foreach ($orgs as $org) {
				if ($org->getId() == $orgId) {
					break;
				}
			}

			$reports = array();

			if (isset($org)) {
				if ($org->getId() != $orgId) {
					$reports = $em->getRepository('\ru\nazarov\crm\entities\Report')->findAll();
					$org = null;
				} else {
					$query = $em->createQuery('SELECT r FROM \ru\nazarov\crm\entities\Report r JOIN r.contact c JOIN c.person p JOIN p.organization o WHERE o=:org');
					$query->setParameter('org', $org->getId());
					$reports = $query->getResult();
				}
			}

			$this->view()->set('content', 'reports_list.tpl')
				->set('reports', $reports)
				->set('orgId', isset($org) ? $org->getId() : null)
				->set('orgs', $orgs);
		}
	}
?>