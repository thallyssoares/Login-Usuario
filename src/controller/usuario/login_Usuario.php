<?php
require_once "../../../src/model/con_DB_Usuario.php";

    class Login extends Conexao_DB_Usuario{
        public $pdo;
        private $nome, $senha;

        public function __construct(){
            $db = new Conexao_DB_Usuario;
            $this->pdo = $db->get_PDO();

        }

        public function logar($n, $s){
            $this->nome = $n;
            $this->senha = $s;
            $res = $this->pdo->prepare("SELECT * FROM usuario WHERE nome_usuario=:n");
            $res->bindValue(":n", $this->nome);
            $res->execute();

            $resultado = $res->fetch(PDO::FETCH_ASSOC);

            if(count($resultado) > 0){
                if(password_verify($this->senha, $resultado["senha"])){
                    session_start();

                    $_SESSION["name"] = $resultado["nome_usuario"];
                    $_SESSION["id"] = $resultado["id"];
                    $_SESSION["logado"] = true;

                    header("location:../../index.php");
                }

            } else{
                echo "<p>Erro ao logar na conta. Tente novamente.</p>";
            }
        }
    }




?>