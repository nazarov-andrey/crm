<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity @Table(name="attachment_type") */
	class AttachmentType {
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
