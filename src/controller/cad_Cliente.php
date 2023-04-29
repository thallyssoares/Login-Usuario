<?php 
require_once "src/model/con_DB_Cliente.php";

    class Cad_Cliente extends Conexao_DB_Cliente{
        private $db;
        public $pdo;
        public $res; 

        public function __construct(){

            $this->db = new Conexao_DB_Cliente;
            $this->pdo = $this->db->get_PDO();

            $this->res = $this->pdo->prepare("SELECT * FROM usuario;");
            $this->res->execute();

            print_r($this->res->fetchAll(PDO::FETCH_ASSOC));
        }
    }

?>