<?php
    $docroot = $_SERVER['DOCUMENT_ROOT'];
    $confDir = $docroot . '/../private/config/';
    $myConf = $confDir . 'my.php';

    require_once $confDir . 'default.php';
	require_once $docroot . '/../private/SitebaseClassLoader.php';

    if (file_exists($myConf)) {
        require_once $myConf;
    }

	SitebaseClassLoader::create($docroot . '/../private/')->register();

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
    $beans->conf = $conf;

	Facade::runApplication($beans);
?>
