<?php
    namespace ru\nazarov\crm\actions;

    class EditAppAction extends AbstractEditAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Application', 'Invalid request id', '/?action=apps_list', '\ru\nazarov\crm\forms\AppForm', 'app-form', 'Edit request', '/?action=edit_app', \ru\nazarov\crm\forms\Form::METHOD_POST, 'multipart/form-data', 'app_form.tpl');
        }

        protected function setItemFields() {
            $form = $this->_form;
            $item = $this->_item;
            $em = $this->em();

            $item->setClient($em->find('\ru\nazarov\crm\entities\Organization', $form->get('client')));
            $item->setSupplier($em->find('\ru\nazarov\crm\entities\Organization', $form->get('supplier')));
            $item->setDate(new \DateTime($form->get('date')));
            $item->setComment($form->get('comment'));

            if (($attachments = $form->get(AddAppAction::ATTACHMENT_KEY)) != null) {
                \ru\nazarov\sitebase\Facade::saveAttachments($item->getId(), 'application', $attachments);
            }

            if (($rmAttachments = $form->get('rm-attachment')) != null) {
                foreach ($rmAttachments as $a) {
                    $attachment = $em->find('\ru\nazarov\crm\entities\Attachment', $a);

                    unlink($_SERVER['DOCUMENT_ROOT'] . $attachment->getPath());
                    $em->remove($attachment);
                }
            }
        }

        protected function fillSelects() {
            $em = $this->em();

            $this->_form->setFieldVals('supplier', array_map(
                function($org) { return (object) array('label' => htmlspecialchars($org->getName()), 'val' => $org->getId()); },
                $em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array('type' => 1), array('name' => 'ASC'))
            ))
                ->setFieldVals('client', array_map(
                function($org) { return (object) array('label' => htmlspecialchars($org->getName()), 'val' => $org->getId()); },
                $em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array('type' => 2), array('name' => 'ASC'))
            ));
        }

        protected function prepareData() {
            parent::prepareData();

            $em = $this->em();
            $attachments = $em->getRepository('\ru\nazarov\crm\entities\Attachment')
                ->findBy(array(
                'owner' => $this->_item->getId(),
                'type' => $em->getRepository('\ru\nazarov\crm\entities\AttachmentType')->findBy(array('code' => 'application'))
            ));

            $this->view()->set('date', $this->_item->getDate())
                ->set('attachment_key', AddAppAction::ATTACHMENT_KEY)
                ->set('attachments', array_map(function ($a) { return (object) array( 'name' => $a->getName(), 'id' => $a->getId() ); }, $attachments));
        }

        protected function setFormFields() {
            $form = $this->_form;
            $item = $this->_item;

            $form->set('client', $item->getClient()->getId());
            $form->set('supplier', $item->getSupplier()->getId());
            $form->set('comment', $item->getComment());
        }
    }
?>