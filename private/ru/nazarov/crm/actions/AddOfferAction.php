<?php
    namespace ru\nazarov\crm\actions;

    class AddOfferAction extends UserAction {
        protected function prepareData() {
            parent::prepareData();
            $this->view()->set('content', 'offer_form.tpl')
                ->set('attachment_key', AddAppAction::ATTACHMENT_KEY);;
        }

        public function execute() {
            $em = $this->em();
            $form = $this->prepareForm(new \ru\nazarov\crm\forms\OfferForm('offer-form', 'Add offer', '/?action=add_offer', \ru\nazarov\crm\forms\Form::METHOD_POST, 'multipart/form-data'));

            if (!$form->isEmpty() && $form->validate()) {
                $offer = new \ru\nazarov\crm\entities\Offer();
                $offer->setOrg($em->find('\ru\nazarov\crm\entities\Organization', $form->get('org')));
                $offer->setApp($em->find('\ru\nazarov\crm\entities\Application', $form->get('app')));
                $offer->setDate(new \DateTime($form->get('date')));
                $offer->setComment($form->get('comment'));
                $offer->setLegalEntity($_SESSION['le']);

                $em->persist($offer);
                $em->flush();

                if (($attachments = $form->get(AddAppAction::ATTACHMENT_KEY)) != null) {
                    \ru\nazarov\sitebase\Facade::saveAttachments($offer->getId(), 'offer', $attachments);
                    $em->flush();
                }

                $form->clean();
            }

            if ($form->get('org') == null) {
                $form->set('org', 'undef');
            }

            $form->setFieldVals('org', \ru\nazarov\sitebase\Facade::getPersonFormOrgsSelectDp());
            $this->view()->set('form', $form)
                ->set('apps', \ru\nazarov\sitebase\Facade::getAppsSelectDp());
            parent::execute();
        }
    }
?>