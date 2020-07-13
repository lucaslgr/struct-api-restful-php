<?php
    namespace Core;

    class Model {
        protected $pdo;

        /**
         * Seta o membro $pdo da classe Model com a instância global $db definida no config.php
         */
        public function __construct() {
            global $db;
            $this->pdo = $db;
        }
    }