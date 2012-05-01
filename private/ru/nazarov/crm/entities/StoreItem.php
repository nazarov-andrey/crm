<?php
    namespace ru\nazarov\crm\entities;

    /**
     * @Entity
     * @Table(name="store_item")
     */
    class StoreItem {
        /** @id @Column(type="bigint") @GeneratedValue */
        private $id;
        /** @Column(length=255) */
        private $code;
        /** @Column(type="text")  */
        private $description;
        /** @Column(length=255, name="supplier_code")  */
        private $supplierCode;
        /** @Column(length=255, name="manufacturer_code")  */
        private $manufacturerCode;
        /** @Column(type="bigint")  */
        private $amount;
        /** @Column(type="bigint", name="min_amount")  */
        private $minAmount;
        /** @Column(type="text")  */
        private $comment;

        public function setAmount($amount) {
            $this->amount = $amount;
        }

        public function getAmount() {
            return $this->amount;
        }

        public function setCode($code) {
            $this->code = $code;
        }

        public function getCode() {
            return $this->code;
        }

        public function setComment($comment) {
            $this->comment = $comment;
        }

        public function getComment() {
            return $this->comment;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getId() {
            return $this->id;
        }

        public function setManufacturerCode($manufacturerCode) {
            $this->manufacturerCode = $manufacturerCode;
        }

        public function getManufacturerCode() {
            return $this->manufacturerCode;
        }

        public function setMinAmount($minAmount) {
            $this->minAmount = $minAmount;
        }

        public function getMinAmount() {
            return $this->minAmount;
        }

        public function setSupplierCode($supplierCode) {
            $this->supplierCode = $supplierCode;
        }

        public function getSupplierCode() {
            return $this->supplierCode;
        }

        public function getJsonable() {
            $obj = new \stdClass();
            $obj->id = $this->id;
            $obj->code = $this->code;
            $obj->description = nl2br($this->description);
            $obj->supplierCode = $this->supplierCode;
            $obj->manufacturerCode = $this->manufacturerCode;
            $obj->amount = $this->amount;
            $obj->minAmount = $this->minAmount;
            $obj->comment = nl2br($this->comment);

            return $obj;
        }
    }
?>
