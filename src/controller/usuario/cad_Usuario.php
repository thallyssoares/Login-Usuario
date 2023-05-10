<?php
require_once "../model/con_DB_USuario.php";

    class Cadastrar extends Conexao_DB_Usuario{
        public $pdo;
        private $nome, $email, $senha;

        public function __construct(){
            $db = new Conexao_DB_Usuario;
            $this->pdo = $db->get_PDO();
        }

        public function cadastro($n, $e, $s){
            $this->nome = $n;
            $this->email = $e;
            $this->senha = password_hash($s, PASSWORD_DEFAULT);

            $res = $this->pdo->prepare("INSERT INTO usuario(nome_usuario, email, senha) VALUES (:n, :e, :s)");
            $res->bindValue(":n", $this->nome);
            $res->bindValue(":e", $this->email);
            $res->bindValue(":s", $this->senha);
            $res->execute();

            echo "<p>Cadastro feito com sucesso. Volte a página de login pra entrar na conta.</p>";
        }
    }
?>