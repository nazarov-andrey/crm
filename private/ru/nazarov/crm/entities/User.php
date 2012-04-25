<?php
	namespace ru\nazarov\crm\entities;

	/**
	 * @Entity
	 * @Table(name="user")
	 */
	class User {
		/** @id @Column(type="bigint") @GeneratedValue */
		private $id;
		/** @Column(length=255) */
		private $login;
		/** @Column(length=255)  */
		private $pass;
		/** @Column(type="smallint")  */
		private $super;

		public function setLogin($login) {
			$this->login = $login;
		}

		public function getLogin() {
			return $this->login;
		}

		public function setPass($pass) {
			$this->pass = $pass;
		}

		public function getPass() {
			return $this->pass;
		}

		public function setSuper($super) {
			$this->super = $super;
		}

		public function getSuper() {
			return $this->super;
		}
	}
?>
