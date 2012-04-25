<?php
	namespace ru\nazarov\sitebase\custom;

	$privatePath = $_SERVER['DOCUMENT_ROOT'] . '/../private/';
	require_once $privatePath . 'doctrine/lib/Doctrine/ORM/Tools/Setup.php';
	\Doctrine\ORM\Tools\Setup::registerAutoloadGit($privatePath . 'doctrine');

	class CustomFactory {
		protected static $_instance;

		protected function __construct() {}

		public function createView() {
			return new SmartyView();
		}

		public function createAjaxView() {
			return new AjaxView();
		}

		public function createEntityManager(\stdClass $conf) {
			$emConf = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(array($conf->entitiesPath), true, $conf->proxiesPath);

			$conn = array(
				'driver' => $conf->dbDriver,
				'host' => $conf->dbHost,
				'dbname' => $conf->dbName,
				'user' => $conf->dbUser,
				'password' => $conf->dbPass,
			);

			return \Doctrine\ORM\EntityManager::create($conn, $emConf);
		}

		public static function instance() {
			if (self::$_instance == null) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
	}
?>
