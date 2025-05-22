<?php
    require_once ABS_APP_PATH . '/config/config.php';

    class Model {
        protected $db;

        public function __construct() {
            try {
                $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
                // ERRMODE_EXCEPTION para auxiliar no caso de erros
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro na conexão: ' . $e->getMessage());
            }
        }
    }