<?php
	namespace ru\nazarov\crm\actions;

	class AddPersonAction extends UserAction {
		const CONTACT_TYPES_KEY = 'types';
		const CONTACT_VALUES_KEY = 'contacts';

		protected function prepareData() {
			parent::prepareData();

			$this->view()->set('content', 'person_form.tpl')
				->set('types', array_map(function($ct) {
					return (object) array('val' => $ct->getId(), 'lbl' => $ct->getCode()); }, $this->em()->getRepository('\ru\nazarov\crm\entities\ContactType')->findAll())
				);
		}

		public function execute() {
			$em = $this->em();
			$form = $this->prepareForm(new \ru\nazarov\crm\forms\PersonForm('person-form', 'Add person', '/?action=add_person', \ru\nazarov\crm\forms\Form::METHOD_POST));

			if (!$form->isEmpty() && $form->validate()) {
				$p = new \ru\nazarov\crm\entities\Person();
				$p->setName($form->get('name'));
				$p->setOrganization($em->find('\ru\nazarov\crm\entities\Organization', $form->get('org')));
				$p->setPosition($form->get('pos'));
				$p->setComment($form->get('comment'));
                $p->setLegalEntity($_SESSION['le']);
				$em->persist($p);

				$contacts = $form->get(self::CONTACT_VALUES_KEY);

				if ($contacts != null) {
					foreach ($form->get(self::CONTACT_TYPES_KEY) as $i => $type) {
						$c = new \ru\nazarov\crm\entities\Contact();
						$c->setPerson($p);
						$c->setType($em->find('\ru\nazarov\crm\entities\ContactType', $type));
						$c->setValue($contacts[$i]);
						$em->persist($c);
					}
				}

				$em->flush();
				$form->clean();
			}

			$view = $this->view();
			$view->set('form', $form)
				->set('contact_types_key', self::CONTACT_TYPES_KEY)
				->set('contact_values_key', self::CONTACT_VALUES_KEY);

			//$orgs = $em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array(), array('typeId' => 'ASC'));
			//$orgVals = array((object) array('label' => '--choose organization--', 'val' => 'undef', 'disabled' => true));
            //
			//foreach ($orgs as $i => $org) {
			//	if ($i == 0 || $orgs[$i - 1]->getType() != $org->getType()) {
			//		$orgVals[] = (object) array('label' => $org->getType()->getCode() . 's', 'val' => null, 'disabled' => true);
			//	}
            //
			//	$orgVals[] = (object) array('label' => str_repeat('&nbsp;', 6) . htmlspecialchars($org->getName()), 'val' => $org->getId());
			//}

			$form->setFieldVals('org', \ru\nazarov\sitebase\Facade::getPersonFormOrgsSelectDp());

			if ($form->get('org') == null) {
				$form->set('org', 'undef');
			}

			if (count($types = $form->get(self::CONTACT_TYPES_KEY)) > 0) {
				$view->set('contacts', array_map(function ($type, $val) { return (object) array('type' => $type, 'val' => $val); }, $types, $form->get(self::CONTACT_VALUES_KEY)));
			}

			parent::execute();
		}
	}
?>
