<?php
	namespace ru\nazarov\crm\entities;

	/** @Entity @Table(name="legal_entity") */
	class LegalEntity {
		/** @Id @Column(type="bigint") @GeneratedValue */
		private $id;
		/** @Column(length=255)  */
		private $name;
        /** @Column(length=255, name="res_basename") */
        private $resBasename;

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

        public function getResBasename() {
            return $this->resBasename;
        }
    }
?>
