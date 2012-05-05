<?php
    namespace ru\nazarov\crm\actions;

    class EditPersonAction extends AbstractEditAction {
        public function __construct() {
            parent::__construct('\ru\nazarov\crm\entities\Person', 'Invalid person id', '/?action=persons_list', '\ru\nazarov\crm\forms\PersonEditForm', 'person-form', 'Edit person', '/?action=edit_person', \ru\nazarov\crm\forms\Form::METHOD_POST, null, 'person_form.tpl');
        }

        protected function checkContactRmPossibility($c) {
            $query = $this->em()->createQuery('SELECT r FROM \ru\nazarov\crm\entities\Report r JOIN r.contact c WHERE c=:con');
            $query->setMaxResults(1);
            $query->setParameter('con', $c);

            if (count($query->getResult()) > 0) {
                throw new \ru\nazarov\crm\exceptions\ErrorException('Cannot remove contact (' . $c->getType()->getCode() . ': ' . $c->getValue() . '): remove at first all reports with this contact, then try to remove contact again.');
            }
        }

        protected function setItemFields() {
            $form = $this->_form;
            $item = $this->_item;

            $em = $this->em();

            $item->setName($form->get('name'));
            $item->setOrganization($em->find('\ru\nazarov\crm\entities\Organization', $form->get('org')));
            $item->setPosition($form->get('pos'));
            $item->setComment($form->get('comment'));

            $ids = $form->get(AddPersonAction::CONTACT_ID_KEY);
            $types = $form->get(AddPersonAction::CONTACT_TYPES_KEY);
            $vals = $form->get(AddPersonAction::CONTACT_VALUES_KEY);

            if ($ids == null) {
                foreach ($item->getContacts()->toArray() as $c) {
                    $this->checkContactRmPossibility($c);
                    $em->remove($c);
                }
            } else {
                foreach ($item->getContacts()->toArray() as $c) {
                    if (($idx = array_search($c->getId(), $ids)) === false) {
                        $this->checkContactRmPossibility($c);
                        $em->remove($c);
                    } else {
                        $c->setType($em->find('\ru\nazarov\crm\entities\ContactType', $types[$idx]));
                        $c->setValue($vals[$idx]);

                        array_splice($ids, $idx, 1);
                        array_splice($types, $idx, 1);
                        array_splice($vals, $idx, 1);
                    }
                }

                foreach ($ids as $i => $id) {
                    if (!empty($id)) {
                        continue;
                    }

                    $c = new \ru\nazarov\crm\entities\Contact();
                    $c->setPerson($item);
                    $c->setType($em->find('\ru\nazarov\crm\entities\ContactType', $types[$i]));
                    $c->setValue($vals[$i]);

                    $em->persist($c);
                }
            }
        }

        protected function fillSelects() {
            $this->_form->setFieldVals('org', \ru\nazarov\sitebase\Facade::getPersonFormOrgsSelectDp());
        }

        protected function prepareData() {
            parent::prepareData();

            $view = $this->view();
            $view->set('types', array_map(function($ct) { return (object) array('val' => $ct->getId(), 'lbl' => $ct->getCode()); }, $this->em()->getRepository('\ru\nazarov\crm\entities\ContactType')->findAll()))
                ->set('contact_types_key', AddPersonAction::CONTACT_TYPES_KEY)
                ->set('contact_values_key', AddPersonAction::CONTACT_VALUES_KEY)
                ->set('contact_ids_key', AddPersonAction::CONTACT_ID_KEY);

            if (count($types = $this->_form->get(AddPersonAction::CONTACT_TYPES_KEY)) > 0) {
                $view->set('contacts', array_map(function ($id, $type, $val) { return (object) array('id' => $id, 'type' => $type, 'val' => $val); }, $this->_form->get(AddPersonAction::CONTACT_ID_KEY), $types, $this->_form->get(AddPersonAction::CONTACT_VALUES_KEY)));
            }
        }

        protected function setFormFields() {
            $form = $this->_form;
            $item = $this->_item;
            $contacts = $item->getContacts()->toArray();

            $form->set('name', $item->getName());
            $form->set('org', $item->getOrganization()->getId());
            $form->set('pos', $item->getPosition());
            $form->set('comment', $item->getComment());
            $form->set(AddPersonAction::CONTACT_ID_KEY, array_map(function ($c) { return $c->getId(); }, $contacts));
            $form->set(AddPersonAction::CONTACT_TYPES_KEY, array_map(function ($c) { return $c->getType()->getId(); }, $contacts));
            $form->set(AddPersonAction::CONTACT_VALUES_KEY, array_map(function ($c) { return $c->getValue(); }, $contacts));
        }
    }
?>