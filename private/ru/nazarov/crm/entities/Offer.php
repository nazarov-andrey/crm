<?php
	namespace ru\nazarov\crm\entities;

    /** @Entity(repositoryClass="ru\nazarov\crm\entities\CrmEntityRepository") @Table(name="offer") */
	class Offer {
        /** @Id @Column(type="bigint") @GeneratedValue */
        private $id;
        /** @OneToOne(targetEntity="Organization") @JoinColumn(name="org",referencedColumnName="id") */
        private $org;
        /** @OneToOne(targetEntity="Application") @JoinColumn(name="app",referencedColumnName="id") */
        private $app;
        /** @Column(type="date") */
        private $date;
        /** @Column(type="text") */
        private $comment;
        /** @Column(name="legal_entity", type="bigint")  */
        private $legalEntity;
        /** @Column(name="offer_id", length=255)  */
        private $offerId;

        public function setApp($app) {
            $this->app = $app;
        }

        public function getApp() {
            return $this->app;
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

        public function setLegalEntity($legalEntity) {
            $this->legalEntity = $legalEntity;
        }

        public function getLegalEntity() {
            return $this->legalEntity;
        }

        public function setOrg($org) {
            $this->org = $org;
        }

        public function getOrg() {
            return $this->org;
        }

        public function setOfferId($offerId) {
            $this->offerId = $offerId;
        }

        public function getOfferId() {
            return $this->offerId;
        }
    }
?>
