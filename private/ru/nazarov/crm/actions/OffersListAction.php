<?php
    namespace ru\nazarov\crm\actions;

    class OffersListAction extends UserAction {
        protected function prepareData() {
            parent::prepareData();

            $em = $this->em();
            $attachmentOwnerType = $em->getRepository('\ru\nazarov\crm\entities\AttachmentType')->findOneBy(array('code' => 'offer'));
            $attachments = array();

            foreach ($em->getRepository('\ru\nazarov\crm\entities\Attachment')->findBy(array('type' => $attachmentOwnerType)) as $attachment) {
                $ownerId = $attachment->getOwner();

                if (!array_key_exists($ownerId, $attachments)) {
                    $attachments[$ownerId] = array();
                }

                $attachments[$ownerId][] = $attachment;
            }

            $em = $this->em();
            $repo = $em->getRepository('\ru\nazarov\crm\entities\Offer');
            $this->view()->set('content', 'offers_list.tpl')
                ->set('attachments', $attachments)
                ->set('offers', $repo->findAll());
        }
    }
?>