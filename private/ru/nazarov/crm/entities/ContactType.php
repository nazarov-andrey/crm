<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity @Table(name="contact_type") */
	class ContactType {
		/** @Id @Column(type="bigint") */
		private $id;
		/** @Column(length=255)  */
		private $code;

		public function getCode() {
			return $this->code;
		}

		public function getId() {
			return $this->id;
		}
	}
?>
