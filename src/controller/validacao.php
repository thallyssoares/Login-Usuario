<?php
    require_once("../model/con_DB.php");

    class Validar{
        private $user;
        private $email;
        private $senha;

        public function validar_Cad($u,$e,$s){
            
            $this->user = preg_replace('/[^[:alnum:]_]/', "", $u); //comando que remove caracteres especiais 
            $this->email = filter_var($e, FILTER_SANITIZE_EMAIL);
            $this->senha = preg_replace('/[^[:alnum:]_]/',"",$s);

            if((!filter_var($this->email, FILTER_VALIDATE_EMAIL)) || ($this->user<3) || ($this->senha<8)){

                echo "<p>Dados digitados estão incorretos. <strong>Tente Novamente</strong>.</p>"; 
            } else {
                $cad = new Conexao_DB($this->user, $this->senha);
                $cad->Cadastrar($this->email);
            }

        }
        
        public function validar_Login($u, $s){
            $this->user = preg_replace('/[^[:alnum:]_]/', "", $u);
            $this->senha = preg_replace('/[^[:alnum:]_]/', "", $s);

            $pdo = new PDO("mysql:host=localhost;dbname=loginuser", "root", "");
            $res = $pdo->prepare("SELECT * FROM usuario WHERE nome=:n");
            $res->bindValue(":n", $this->user);
            $res->execute();

            $arrayResult = $res->fetch(PDO::FETCH_ASSOC);
            if($arrayResult == false){
                echo "<p>Usuario não encontrado. <strong>Tente Novamente</strong>.</p>";
            } else {
                $l = new Conexao_DB($this->user, $this->senha);
                $l->Login();
            }
        }
    }

?>