<?php
	namespace ru\nazarov\crm\actions;

	class AttachmentAction extends UserAction {
		public function execute() {
			if (($attachment = $this->em()->find('\ru\nazarov\crm\entities\Attachment', $this->request()->getValue('id'))) == null) {
				throw new \ru\nazarov\sitebase\core\exceptions\SitebaseException('Attachment not found');
			}

			header('Content-type: ' . $attachment->getMimeType());
			header('Content-Disposition: attachment; filename="' . $attachment->getName() .'"');
			readfile($this->request()->getValue('DOCUMENT_ROOT') . $attachment->getPath());
		}
	}
?>
