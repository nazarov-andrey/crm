<?php
	namespace ru\nazarov\crm\actions;

	class PersonsListAction extends UserAction {
		protected function prepareData() {
			parent::prepareData();

			$em = $this->em();
			$orgId = $this->request()->get('org');
			$orgs = $em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array(), array('typeId' => 'ASC'));
			$orgIdCorrect = false;

			foreach ($orgs as $org) {
				if ($org->getId() == $orgId) {
					$orgIdCorrect = true;
					break;
				}
			}

			$repo = $em->getRepository('\ru\nazarov\crm\entities\Person');
			$this->view()->set('content', 'persons_list.tpl')
				->set('orgId', $orgId)
				->set('orgs', $orgs)
				->set('persons', $orgIdCorrect ? $repo->findBy(array('organization' => $orgId)) : $repo->findAll());
		}
	}
?>
