<?php
	require_once '../private/SitebaseClassLoader.php';

	SitebaseClassLoader::create($_SERVER['DOCUMENT_ROOT'] . '/../private/')->register();

	use \ru\nazarov\sitebase\Facade;
	use \ru\nazarov\sitebase\core\Application;
	use \ru\nazarov\sitebase\core\ActionFactory;
	use \ru\nazarov\sitebase\core\CoreFactory;
	use \ru\nazarov\sitebase\core\Request;
	use \ru\nazarov\sitebase\custom\CustomFactory;
	use \ru\nazarov\sitebase\core\BeanContainer;

	use \ru\nazarov\crm\Auth;

	$af = ActionFactory::instance()->setActionsNamespace('\ru\nazarov\crm\actions\\');
	$cf = CoreFactory::instance();
	$roles = array(
		Auth::ROLE_GUEST => $cf->createRole()->setDefaultAction('\ru\nazarov\crm\actions\LoginAction')->allow('\ru\nazarov\crm\actions\GuestAction'),
		Auth::ROLE_USER => $cf->createRole()->setDefaultAction('\ru\nazarov\crm\actions\AddOrgAction')
			->allow('\ru\nazarov\crm\actions\UserAction')
			->allow('\ru\nazarov\crm\actions\PrintAction'),
	);

	$conf = new stdClass();
	$conf->entitiesPath = $_SERVER['DOCUMENT_ROOT'] . '/../private/ru/nazarov/crm/entities';
	$conf->proxiesPath = $_SERVER['DOCUMENT_ROOT'] . '/../private/ru/nazarov/crm/proxies';
	$conf->dbDriver = 'pdo_mysql';
	$conf->dbHost = 'localhost';
	$conf->dbName = 'italy';
	$conf->dbUser = 'root';
	$conf->dbPass = 'root';

	$beans = new stdClass();
	$beans->bc = BeanContainer::instance();
	$beans->app = Application::instance();
	$beans->coreFactory = $cf;
	$beans->actionFactory = $af;
	$beans->request = Request::instance();
	$beans->auth = Auth::instance();
	$beans->customFactory = CustomFactory::instance();
	$beans->roles = $roles;
	$beans->uploader = new \ru\nazarov\sitebase\core\Uploader('/../private/attachments');

	Facade::runApplication($beans, $conf);
?>
