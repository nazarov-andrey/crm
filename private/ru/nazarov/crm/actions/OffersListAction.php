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

            $type = $this->request()->get('type');
            $types = $em->getRepository('\ru\nazarov\crm\entities\OrganizationType')->findAll();
            $correctType = false;

            foreach ($types as $orgType) {
                if ($orgType->getId() == $type) {
                    $correctType = true;
                    break;
                }
            }

            $em = $this->em();

            if ($correctType) {
                $offersQuery = $em->createQuery('SELECT off FROM \ru\nazarov\crm\entities\Offer off JOIN off.org org WHERE org.type=:type ORDER BY off.offerId desc');
                $offersQuery->setParameters(array('type' => $type));
                $offers = $offersQuery->getResult();
            } else {
                $offers = $em->getRepository('\ru\nazarov\crm\entities\Offer')->findBy(array(), array('offerId' => 'DESC'));
            }

            $this->view()->set('content', 'offers_list.tpl')
                ->set('attachments', $attachments)
                ->set('offers', $offers)
                ->set('types', $types)
                ->set('filter', $type);
        }
    }
?>