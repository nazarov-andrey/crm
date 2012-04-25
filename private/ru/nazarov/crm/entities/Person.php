<?php
	namespace ru\nazarov\crm\entities;

	/**
	 * @Entity
	 * @Table(name="person")
	 */
	class Person {
		/** @id @Column(type="bigint") @GeneratedValue */
		private $id;
		/**
		 * @ManyToOne(targetEntity="Organization", inversedBy="persons")
		 * @JoinColumn(name="organization", referencedColumnName="id")
		 **/
		private $organization;
		/** @Column(length=255)  */
		private $name;
		/** @Column(length=255)  */
		private $position;
		/** @Column(type="text") */
		private $comment;
		/** @OneToMany(targetEntity="Contact", mappedBy="person") */
		private $contacts;

		public function __construct() {
			$this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
		}

		public function setComment($comment) {
			$this->comment = $comment;
		}

		public function getComment() {
			return $this->comment;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setName($name) {
			$this->name = $name;
		}

		public function getName() {
			return $this->name;
		}

		public function setOrganization($organization) {
			$this->organization = $organization;
		}

		public function getOrganization() {
			return $this->organization;
		}

		public function setPosition($position) {
			$this->position = $position;
		}

		public function getPosition() {
			return $this->position;
		}

		public function getContacts() {
			return $this->contacts;
		}
	}
?>
