<?php
    namespace ru\nazarov\crm\entities;

    /** @Entity(repositoryClass="ru\nazarov\crm\entities\CrmEntityRepository") @Table(name="offer_id") */
    class OfferId {
        /** @Id @Column(type="bigint") @GeneratedValue */
        private $id;
        /** @Column(name="legal_entity", length=255)  */
        private $legalEntity;
        /** @Column(length=1)  */
        private $prefix;
        /** @Column(name="next_id", type="smallint")  */
        private $nextId;

        public function getNextId() {
            return $this->nextId;
        }

        public function getPrefix() {
            return $this->prefix;
        }

        public function setNextId($nextId) {
            $this->nextId = $nextId;
        }
    }
?>