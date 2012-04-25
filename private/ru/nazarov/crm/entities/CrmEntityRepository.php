<?php
    namespace ru\nazarov\crm\entities;

    class CrmEntityRepository extends \Doctrine\ORM\EntityRepository {
        protected $_criteria;

        public function __construct($em, $class) {
            parent::__construct($em, $class);
            $this->_criteria = array('legalEntity' => $_SESSION['le']);
        }

        public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null) {
            return parent::findBy(array_merge($this->_criteria, $criteria), $orderBy, $limit, $offset);
        }
        public function findOneBy(array $criteria) {
            return parent::findOneBy(array_merge($this->_criteria, $criteria));
        }
    }
?>
