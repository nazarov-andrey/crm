<?php
	namespace ru\nazarov\sitebase\core;

	use \ru\nazarov\sitebase\core\exceptions\SitebaseException;

	class Auth extends Dependent implements IDependent, IAuth {
		const ROLE_GUEST = 'auth_role_guest';

		protected static $_instance;
		protected $_role;

		protected function __construct() {}

		public function getRole() {
			return $this->_role;
		}

		public function check() {
			$this->_role = $this->getInjection(self::ROLE_GUEST);
			return true;
		}

		public function reset() {
			return $this;
		}

		public function authenticate($login, $pass) {
			return $this;
		}

		public function addRole($roleStr, IRole $role) {
			$this->inject($roleStr, $role);
			return $this;
		}

		public function isAllowed(IAction $act) {
			return $this->_role == null ? true : $this->_role->isAllowed($act);
		}

		public function getDefaultAction() {
			return $this->_role->getDefaultAction();
		}

		public static function instance() {
			if (self::$_instance == null) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
	}
?>
