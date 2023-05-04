<?php 
require_once "src/model/con_DB_Cliente.php";


    class Apagar_Cliente extends Conexao_DB_Cliente{
        public $pdo;
        public $id;

        public function __construct(){
            $db = new Conexao_DB_Cliente;
            $this->pdo = $db->get_PDO();
        }

        public function apagar($id){
            $this->id = $id;

            $res = $this->pdo->prepare("DELETE FROM clientes WHERE id=:id");
            $res->bindValue("id", $this->id);
            $resultado = $res->execute();

            if($resultado){
                echo "<p><strong>Cliente Deletado com Sucesso.</strong></p>";
            } else {
                echo "<p>Não foi possivel deletar o cliente. Tente Novamente.</p>";
            }
        }
    }




?>