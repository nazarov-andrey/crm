<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity @Table(name="report") */
	class Report {
		/** @id @Column(type="bigint") @GeneratedValue */
		private $id;
		/** @OneToOne(targetEntity="Contact") @JoinColumn(name="contact",referencedColumnName="id") */
		private $contact;
		/** @Column(type="date")  */
		private $date;
		/** @Column(type="text")  */
		private $comment;

		public function setComment($comment) {
			$this->comment = $comment;
		}

		public function getComment() {
			return $this->comment;
		}

		public function setContact($contact) {
			$this->contact = $contact;
		}

		public function getContact() {
			return $this->contact;
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
	}
?>
