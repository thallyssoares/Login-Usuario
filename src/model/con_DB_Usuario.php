<?php 

class Conexao_DB_Usuario{
    protected $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO ("mysql:dbname=loginuser;host=localhost", "root", "");    
        } catch (PDOException $e) {
            echo "<p>Houve um erro ao se conectar ao Banco de Dados.</p>";
        } catch (Exception $e){
            echo "<p>Houve um erro.</p>";
        }
            
    }
    
    public function get_PDO(){
        return $this->pdo;    
    }
};


?>