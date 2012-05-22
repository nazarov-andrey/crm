<?php
	namespace ru\nazarov\sitebase;

	use \ru\nazarov\sitebase\core\Application;
	use \ru\nazarov\sitebase\core\ActionFactory;
	use \ru\nazarov\sitebase\core\CoreFactory;
	use \ru\nazarov\sitebase\core\Uploader;
	use \ru\nazarov\crm\Auth;
    use \stdClass;

	class Facade {
		const BEAN_ACTION_FACTORY = 'facade_bean_action_factory';
		const BEAN_CORE_FACTORY = 'facade_bean_core_factory';
		const BEAN_AUTH = 'facade_bean_auth';
		const BEAN_ENTITY_MANAGER = 'facade_bean_entity_manager';
		const BEAN_BEAN_CONTAINER = 'facade_bean_bean_container';
		const BEAN_SMARTY_VIEW = 'facade_bean_smarty_view';
		const BEAN_REQUEST = 'facade_bean_request';
		const BEAN_APP = 'facade_bean_app';
		const BEAN_UPLOADER = 'facade_bean_uploader';

		public static function customPreparation($beans) {
			$beans->bc->addDependency($beans->auth, Auth::INJECTION_ENTITY_MANAGER, self::BEAN_ENTITY_MANAGER);
		}

		public static function runApplication($beans, $conf) {
			$app = $beans->app;
			$actionFactory = $beans->actionFactory;
			$coreFactory = $beans->coreFactory;
			$customFactory = $beans->customFactory;
			$auth = $beans->auth;
			$request = $beans->request;
			$bc = $beans->bc;
			$uploader = $beans->uploader;

			$bc->addBean(self::BEAN_ACTION_FACTORY, $actionFactory)
				->addBean(self::BEAN_AUTH, $beans->auth)
				->addBean(self::BEAN_CORE_FACTORY, $coreFactory)
				->addBean(self::BEAN_SMARTY_VIEW, $customFactory->createView())
				->addBean(self::BEAN_ENTITY_MANAGER, $customFactory->createEntityManager($conf))
				->addBean(self::BEAN_BEAN_CONTAINER, $beans->bc)
				->addBean(self::BEAN_REQUEST, $request)
				->addBean(self::BEAN_APP, $app)
				->addBean(self::BEAN_UPLOADER, $uploader)
				->addDependency($app, Application::INJECTION_ACTS_FACTORY, self::BEAN_ACTION_FACTORY)
				->addDependency($app, Application::INJECTION_BEAN_CONTAINER, self::BEAN_BEAN_CONTAINER)
				->addDependency($app, Application::INJECTION_AUTH, self::BEAN_AUTH)
				->addDependency($actionFactory, ActionFactory::INJECTION_CORE_FACTORY, self::BEAN_CORE_FACTORY)
			    ->addDependency($coreFactory, CoreFactory::INJECTION_BEAN_CONTAINER, self::BEAN_BEAN_CONTAINER)
				->addDependency($uploader, Uploader::INJECTION_REQUEST, self::BEAN_REQUEST);
			self::customPreparation($beans);
			$bc->injectAll();

			foreach ($beans->roles as $roleStr => $role) {
				$auth->addRole($roleStr, $role);
			}

			try {
				$app->init(array())->run($request);
			} catch (\Exception $e) {
				$actionFactory->createErrorAction($e->getMessage())->execute();
			}
		}

        protected static function uploader() {
            $bc = \ru\nazarov\sitebase\core\BeanContainer::instance();

            if (($upldr = $bc->getBean(self::BEAN_UPLOADER)) == null) {
                throw new \ru\nazarov\sitebase\core\exceptions\SitebaseException('Unknown bean \'' . self::BEAN_UPLOADER . '\'');
            }

            return $upldr;
        }

        protected static function em() {
            $bc = \ru\nazarov\sitebase\core\BeanContainer::instance();

            if (($em = $bc->getBean(self::BEAN_ENTITY_MANAGER)) == null) {
                throw new \ru\nazarov\sitebase\core\exceptions\SitebaseException('Unknown bean \'' . self::BEAN_ENTITY_MANAGER . '\'');
            }

            return $em;
        }

        public static function getAppsSelectDp() {
            $appsSrc = self::em()->getRepository('\ru\nazarov\crm\entities\Application')->findBy(array(), array('id' => 'DESC'));
            $apps = array();

            foreach ($appsSrc as $app) {
                $appId = $app->getId();
                $client = $app->getClient()->getId();
                $supplier = $app->getSupplier()->getId();

                if (!array_key_exists($client, $apps)) {
                    $apps[$client] = array();
                }

                if (!array_key_exists($supplier, $apps)) {
                    $apps[$supplier] = array();
                }

                $apps[$client][] = (object) array('val' => $appId, 'label' => $appId);
                $apps[$supplier][] = (object) array('val' => $appId, 'label' => $appId);
            }

            return $apps;
        }

        public static function getReportSelectsDps() {
            $em = self::em();

            $orgsSrc = $em->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array(), array('name' => 'ASC'));
            $orgs = array();
            $personsSrc = $em->getRepository('\ru\nazarov\crm\entities\Person')->findAll();
            $persons = array();
            $contactsSrc = $em->getRepository('\ru\nazarov\crm\entities\Contact')->findAll();
            $contacts = array();

            foreach ($orgsSrc as $org) {
                $type = $org->getType()->getId();

                if (!array_key_exists($type, $orgs)) {
                    $orgs[$type] = array();
                }

                $orgs[$type][] = (object) array('label' => $org->getName(), 'val' => $org->getId());
            }

            foreach ($personsSrc as $person) {
                $org = $person->getOrganization()->getId();

                if (!array_key_exists($org, $persons)) {
                    $persons[$org] = array();
                }

                $persons[$org][] = (object) array('label' => $person->getName(), 'val' => $person->getId());
            }

            foreach ($contactsSrc as $contact) {
                $person = $contact->getPerson()->getId();

                if (!array_key_exists($person, $contacts)) {
                    $contacts[$person] = array();
                }

                $contacts[$person][] = (object) array('label' => $contact->getType()->getCode() . '(' . $contact->getValue() . ')', 'val' => $contact->getId());
            }

            return (object) array(
                'orgs' => $orgs,
                'persons' => $persons,
                'contacts' => $contacts,
                'apps' => self::getAppsSelectDp(),
            );
        }

        public static function getPersonFormOrgsSelectDp() {
            $orgs = self::em()->getRepository('\ru\nazarov\crm\entities\Organization')->findBy(array(), array('typeId' => 'ASC', 'name' => 'ASC'));
            $orgVals = array((object) array('label' => '--choose organization--', 'val' => 'undef', 'disabled' => true, 'selected' => true));

            foreach ($orgs as $i => $org) {
                if ($i == 0 || $orgs[$i - 1]->getType() != $org->getType()) {
                    $orgVals[] = (object) array('label' => $org->getType()->getCode() . 's', 'val' => null, 'disabled' => true);
                }

                $orgVals[] = (object) array('label' => str_repeat('&nbsp;', 6) . htmlspecialchars($org->getName()), 'val' => $org->getId());
            }

            return $orgVals;
        }

        public static function saveAttachments($app, $attachments) {
            $em = self::em();
            $type = $em->getRepository('\ru\nazarov\crm\entities\AttachmentType')->findOneBy(array('code' => 'application'));
            $uploader = self::uploader();

            foreach ($attachments['name'] as $i => $name) {
                if (empty($name)) {
                    continue;
                }

                $a = new \ru\nazarov\crm\entities\Attachment();
                $a->setMimeType($attachments['type'][$i]);
                $a->setName($name);
                $a->setPath($uploader->upload($attachments['tmp_name'][$i]));
                $a->setType($type);
                $a->setOwner($app->getId());

                $em->persist($a);
            }
        }
	}
?>
