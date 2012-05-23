<?php
    namespace ru\nazarov\crm\actions;

    class EditOfferAction extends AbstractEditAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Offer', 'Invalid offer id', '/?action=add_offer', '\ru\nazarov\crm\forms\OfferForm', 'offer-form', 'Edit offer', '/?action=edit_offer', \ru\nazarov\crm\forms\Form::METHOD_POST, 'multipart/form-data', 'offer_form.tpl');
        }

        protected function fillSelects() {
            $this->_form->setFieldVals('org', \ru\nazarov\sitebase\Facade::getPersonFormOrgsSelectDp());
        }

        protected function setItemFields() {
            $form = $this->_form;
            $item = $this->_item;

            $em = $this->em();

            $item->setOrg($em->find('\ru\nazarov\crm\entities\Organization', $form->get('org')));
            $item->setApp($em->find('\ru\nazarov\crm\entities\Application', $form->get('app')));
            $item->setDate(new \DateTime($form->get('date')));
            $item->setComment($form->get('comment'));

            if (($attachments = $form->get(AddAppAction::ATTACHMENT_KEY)) != null) {
                \ru\nazarov\sitebase\Facade::saveAttachments($item->getId(), 'offer', $attachments);
            }

            if (($rmAttachments = $form->get('rm-attachment')) != null) {
                foreach ($rmAttachments as $a) {
                    $attachment = $em->find('\ru\nazarov\crm\entities\Attachment', $a);

                    unlink($_SERVER['DOCUMENT_ROOT'] . $attachment->getPath());
                    $em->remove($attachment);
                }
            }
        }

        protected function prepareData() {
            parent::prepareData();

            $em = $this->em();
            $attachments = $em->getRepository('\ru\nazarov\crm\entities\Attachment')
                ->findBy(array(
                'owner' => $this->_item->getId(),
                'type' => $em->getRepository('\ru\nazarov\crm\entities\AttachmentType')->findBy(array('code' => 'offer'))
            ));

            $this->view()->set('apps', \ru\nazarov\sitebase\Facade::getAppsSelectDp())
                ->set('attachment_key', AddAppAction::ATTACHMENT_KEY)
                ->set('attachments', array_map(function ($a) { return (object) array( 'name' => $a->getName(), 'id' => $a->getId() ); }, $attachments));;
        }

        protected function setFormFields() {
            $form = $this->_form;
            $item = $this->_item;

            $form->set('org', $item->getOrg()->getId());
            $form->set('app', $item->getApp()->getId());
            $form->set('date', $item->getDate()->format('Y-m-d'));
            $form->set('comment', $item->getComment());
        }
    }
?>