<?php
	namespace ru\nazarov\sitebase;

	use \ru\nazarov\sitebase\core\Application;
	use \ru\nazarov\sitebase\core\ActionFactory;
	use \ru\nazarov\sitebase\core\CoreFactory;
	use \ru\nazarov\sitebase\core\Uploader;
	use \ru\nazarov\crm\Auth;

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
	}
?>
