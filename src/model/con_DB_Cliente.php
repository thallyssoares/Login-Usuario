<?php 

class Conexao_DB_Cliente{

    public $pdo; 

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=loginuser;host=localhost", "root", "");
    }

    public function get_PDO(){
        return $this->pdo;
    }

}

?>