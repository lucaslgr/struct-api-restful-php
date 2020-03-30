<?php
    namespace Core;

    class Model {
        protected $pdo;
        public function __construct() {
            global $db;
            $this->pdo = $db;
        }
    }