<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity @Table(name="attachment") */
	class Attachment {
		/** @Id @Column(type="bigint") @GeneratedValue */
		private $id;
		/** @Column(length=255) */
		private $path;
		/** @Column(length=255) */
		private $name;
		/** @Column(name="mime_type", length=255) */
		private $mimeType;
		/** @Column(type="bigint") */
		private $owner;
		/** @OneToOne(targetEntity="AttachmentType") @JoinColumn(name="type",referencedColumnName="id") */
		private $type;

		public function setId($id) {
			$this->id = $id;
		}

		public function getId() {
			return $this->id;
		}

		public function setMimeType($mimeType) {
			$this->mimeType = $mimeType;
		}

		public function getMimeType() {
			return $this->mimeType;
		}

		public function setName($name) {
			$this->name = $name;
		}

		public function getName() {
			return $this->name;
		}

		public function setPath($path) {
			$this->path = $path;
		}

		public function getPath() {
			return $this->path;
		}

		public function setType($type) {
			$this->type = $type;
		}

		public function getType() {
			return $this->type;
		}

		public function setOwner($owner) {
			$this->owner = $owner;
		}

		public function getOwner() {
			return $this->owner;
		}
	}
?>
