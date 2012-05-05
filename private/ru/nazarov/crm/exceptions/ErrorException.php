<?php
    namespace ru\nazarov\crm\exceptions;

    class ErrorException extends \Exception {
        public $mes;
        public $back;

        public function __construct($mes, $back = null) {
            $this->mes = $mes;
            $this->back = $back;
        }
    }
?>
