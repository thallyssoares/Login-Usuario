<?php 
require_once "src/model/con_DB_Cliente.php";

    class Editar_Cliente extends Conexao_DB_Cliente{
        public $pdo;
        private $id_c, $nome, $email, $telefone;


        public function __construct(){
            $db = new Conexao_DB_Cliente;
            $this->pdo = $db->get_PDO();
        }

        public function buscarDadosCliente($id_cliente){
            $this->id_c = $id_cliente;
            $retorno = array();
            $res = $this->pdo->prepare("SELECT * FROM clientes WHERE id=:id_cliente");
            $res->bindValue(":id_cliente", $this->id_c);
            $res->execute();
            $retorno = $res->fetch(PDO::FETCH_ASSOC);
            return $retorno;

        }

        public function editar($id, $n, $e, $t){
            $this->id_c = $id;
            $this->nome = $n;
            $this->email = $e;
            $this->telefone = $t;

            $cmd = $this->pdo->prepare("UPDATE clientes SET nome=:n, email=:e, telefone=:t WHERE id=:id");
            $cmd->bindValue(":n", $this->nome);
            $cmd->bindValue(":e", $this->email);
            $cmd->bindValue(":t", $this->telefone);
            $cmd->bindValue(":id", $this->id_c);
            $resultado = $cmd->execute();
            if($resultado){
                echo "<p>Cliente Atualizado.</p>";
                header("location: index.php");
            } else {
                echo "<p>Erro ao atualizar o cliente. Tente Novamente.</p>";
            }
        }
    }



?>