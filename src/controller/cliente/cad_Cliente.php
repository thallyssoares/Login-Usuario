<?php 
require_once "src/model/con_DB_Cliente.php";

    class Cad_Cliente extends Conexao_DB_Cliente{
        public $nome, $email, $telefone, $id, $pdo, $db;

        public function __construct(){
            $this->db = new Conexao_DB_Cliente;
            $this->pdo = $this->db->get_PDO();
        }

        public function cadastrar($n, $e, $t, $id){
            $this->nome = $n;
            $this->email = $e;
            $this->telefone = $t;
            $this->id = $id;

            try {
                $res = $this->pdo->prepare("INSERT INTO clientes (idusuario, nome, email, telefone) VALUES (:id, :n, :e, :t)");
                $res->bindValue(":n", $this->nome);
                $res->bindValue(":e", $this->email);
                $res->bindValue(":t", $this->telefone);
                $res->bindValue(":id", $this->id);
                $resultado = $res->execute();

                
            } catch (PDOException $e) {
                echo "<p>Houve um erro ao enviar os dados pro Banco de Dados. Tente Novamente. " . $e->getMessage() . "</p>";
            } catch (Exception $e){
                echo "<p>Houve um erro na execução do código.</p>";
            }

            if($resultado){
                echo "<p>Cliente cadastrado com sucesso.</p>";
            }
        }
    }

?>