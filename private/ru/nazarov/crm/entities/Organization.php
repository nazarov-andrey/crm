<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity(repositoryClass="ru\nazarov\crm\entities\CrmEntityRepository") @Table(name="organization") */
	class Organization {
		/** @Id @Column(type="bigint") @GeneratedValue */
		private $id;
		/** @OneToOne(targetEntity="OrganizationType") @JoinColumn(name="type",referencedColumnName="id") */
		private $type;
		/** @Column(length=255)  */
		private $name;
		/** @Column(length=255)  */
		private $phone;
		/** @Column(length=255)  */
		private $site;
		/** @Column(length=255)  */
		private $address;
		/** @Column(length=255)  */
		private $country;
		/** @OneToMany(targetEntity="Person", mappedBy="organization", cascade={"remove"}) */
		private $persons;
		/** @Column(name="type", type="bigint")  */
		private $typeId;
        /** @Column(name="legal_entity", type="bigint")  */
        private $legalEntity;

		public function __construct() {
			$this->persons = new \Doctrine\Common\Collections\ArrayCollection();
		}

		public function setAddress($address) {
			$this->address = $address;
		}

		public function getAddress() {
			return $this->address;
		}

		public function setCountry($country) {
			$this->country = $country;
		}

		public function getCountry() {
			return $this->country;
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

		public function setPhone($phone) {
			$this->phone = $phone;
		}

		public function getPhone() {
			return $this->phone;
		}

		public function setSite($site) {
			$this->site = $site;
		}

		public function getSite() {
			return $this->site;
		}

		public function setType($type) {
			$this->type = $type;
		}

		public function getType() {
			return $this->type;
		}

		public function setPersons($persons) {
			$this->persons = $persons;
		}

		public function getPersons() {
			return $this->persons;
		}

        public function getLegalEntity() {
            return $this->legalEntity;
        }

        public function setLegalEntity($legalEntity) {
            $this->legalEntity = $legalEntity;
        }
    }
?>
