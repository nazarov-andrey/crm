<?php
	namespace ru\nazarov\crm\actions;

	class OrgsListAction extends UserAction {
		protected function prepareData() {
			parent::prepareData();

			$em = $this->em();
			$type = $this->request()->get('type');
			$types = $em->getRepository('\ru\nazarov\crm\entities\OrganizationType')->findAll();
			$correctType = false;

			foreach ($types as $orgType) {
				if ($orgType->getId() == $type) {
					$correctType = true;
					break;
				}
			}

			$repo = $em->getRepository('\ru\nazarov\crm\entities\Organization');
			$this->view()->set('content', 'orgs_list.tpl')
				->set('orgs', $correctType ? $repo->findBy(array('type' => $type), array('name' => 'ASC')) : $repo->findBy(array(), array('name' => 'ASC')))
				->set('types', $types)
				->set('filter', $type);
		}
	}
?>
