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
        public function getId() {
            return $this->id;
        }

        public function getLogin() {
            return $this->login;
        }

        public function getPass() {
            return $this->pass;
        }

        public function getSuper() {
            return $this->super;
        }
    }
?>
