<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity @Table(name="organization_type") */
	class OrganizationType {
		/** @Id @Column(type="bigint") @GeneratedValue  */
		private $id;
		/** @Column(length=255)  */
		private $code;

		public function setCode($code) {
			$this->code = $code;
		}

		public function getCode() {
			return $this->code;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}
	}
?>
