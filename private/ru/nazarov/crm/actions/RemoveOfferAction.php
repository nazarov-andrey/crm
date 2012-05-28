<?php
    namespace ru\nazarov\crm\actions;

    class RemoveOfferAction extends AbstractRemoveAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Offer', 'Invalid offer id', '/?action=offers_list');
        }

        protected function customActions() {
            $em = $this->em();
            $attachments = $em->getRepository('\ru\nazarov\crm\entities\Attachment')
                ->findBy(array(
                'owner' => $this->_item->getId(),
                'type' => $em->getRepository('\ru\nazarov\crm\entities\AttachmentType')->findBy(array('code' => 'offer'))
            ));

            foreach ($attachments as $a) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $a->getPath());
                $em->remove($a);
            }
        }
    }
?>