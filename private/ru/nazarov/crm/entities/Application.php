<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity @Table(name="application") */
	class Application {
		/** @Id @Column(type="bigint") @GeneratedValue */
		private $id;
		/** @OneToOne(targetEntity="Organization") @JoinColumn(name="client",referencedColumnName="id") */
		private $client;
		/** @OneToOne(targetEntity="Organization") @JoinColumn(name="supplier",referencedColumnName="id") */
		private $supplier;
		/** @Column(type="date") */
		private $date;
		/** @Column(type="text") */
		private $comment;

		public function setClient($client) {
			$this->client = $client;
		}

		public function getClient() {
			return $this->client;
		}

		public function setComment($comment) {
			$this->comment = $comment;
		}

		public function getComment() {
			return $this->comment;
		}

		public function setDate($date) {
			$this->date = $date;
		}

		public function getDate() {
			return $this->date;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setSupplier($supplier) {
			$this->supplier = $supplier;
		}

		public function getSupplier() {
			return $this->supplier;
		}
	}
?>
