<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity @Table(name="contact") */
	class Contact {
		/** @Id @Column(type="bigint") @GeneratedValue */
		private $id;
		/** @ManyToOne(targetEntity="Person", inversedBy="features") @JoinColumn(name="person", referencedColumnName="id")  */
		private $person;
		/** @OneToOne(targetEntity="ContactType") @JoinColumn(name="type",referencedColumnName="id") */
		private $type;
		/** @Column(length=255) */
		private $value;
		private $typeCode;

		public function setId($id) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setPerson($person) {
			$this->person = $person;
		}

		public function getPerson() {
			return $this->person;
		}

		public function setType($type) {
			$this->type = $type;
		}

		public function getType() {
			return $this->type;
		}

		public function setValue($value) {
			$this->value = $value;
		}

		public function getValue() {
			return $this->value;
		}

		public function getTypeCode() {
			return $this->type->getCode();
		}
	}
?>
