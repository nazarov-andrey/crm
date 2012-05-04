<?php
	namespace ru\nazarov\crm\actions;

	class AppsListAction extends UserAction {
		protected function prepareData() {
			parent::prepareData();
			$em = $this->em();

			$attachmentOwnerType = $em->getRepository('\ru\nazarov\crm\entities\AttachmentType')->findOneBy(array('code' => 'application'));
			$attachments = array();

			foreach ($em->getRepository('\ru\nazarov\crm\entities\Attachment')->findAll() as $attachment) {
				$ownerId = $attachment->getOwner();

				if (!array_key_exists($ownerId, $attachments)) {
					$attachments[$ownerId] = array();
				}

				$attachments[$ownerId][] = $attachment;
			}

			$orgs = $em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array(), array('typeId' => 'ASC'));
			$orgId = $this->request()->get('org');

			foreach ($orgs as $org) {
				if ($org->getId() == $orgId) {
					break;
				}
			}

			if (isset($org) && $org->getId() != $orgId) {
				$org = null;
			}

			$repo = $em->getRepository('\ru\nazarov\crm\entities\Application');
			$this->view()->set('content', 'apps_list.tpl')
				->set('apps', isset($org) ? $repo->findBy(array($org->getType()->getCode() => $org->getId())) : $repo->findAll())
				->set('attachments', $attachments)
				->set('orgId', isset($org) ? $org->getId() : null)
				->set('orgs', $orgs);
		}
	}
?>
