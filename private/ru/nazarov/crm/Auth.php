<?php
	namespace ru\nazarov\crm;

	session_start();

	class Auth extends \ru\nazarov\sitebase\core\Auth {
		protected static $_instance;

		const ROLE_GUEST = 'auth_role_guest';
		const ROLE_USER = 'auth_role_user';
        const ROLE_ADMIN = 'auth_role_admin';
		const INJECTION_ENTITY_MANAGER = 'auth_injection_entity_manager';

		protected function em() {
			return $this->getInjection(self::INJECTION_ENTITY_MANAGER);
		}

		public function check() {
			if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
				$params = array(
					'login' => $_SESSION['login'],
					'pass' => $_SESSION['pass'],
				);

				$u = $this->em()
					->getRepository('\ru\nazarov\crm\entities\User')
					->findOneBy(array('login' => $_SESSION['login'], 'pass' => $_SESSION['pass']));

                $_SESSION['super'] = $u->getSuper() > 0;
				$this->_role = $this->getInjection(($retval = $u !== null) ? ($u->getSuper() > 0 ? self::ROLE_ADMIN : self::ROLE_USER) : self::ROLE_GUEST);
			} else {
				$this->_role = $this->getInjection(self::ROLE_GUEST);
				$retval = false;
                $_SESSION['super'] = false;
			}

			return $retval;
		}

		public function reset() {
			session_unset();
			return $this;
		}

		public function authenticate($login, $pass) {
			$_SESSION['login'] = $login;
			$_SESSION['pass'] = $pass;

			return $this;
		}

		public static function instance() {
			if (self::$_instance == null) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}
	}
?>
