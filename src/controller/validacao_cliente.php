<?php 
require_once "cliente/cad_Cliente.php";
require_once "cliente/editar_Cliente.php";

    class Validar_Clientes{
        private $nome, $email, $telefone, $id;

        public function val_cad($n, $e, $t, $id){
            $this->nome = preg_replace('/[^[:alpha:]_]/', "",$n);
            $this->email = filter_var($e, FILTER_SANITIZE_EMAIL);
            $this->telefone = preg_replace('/[^\d\-]/',"",$t);
            $this->id = $id;
            if ((strlen($this->nome)<3) || (strlen($this->telefone)<9)){
                echo "<p>Valores digitados não permitidos. Tente Novamente.</p>";
            } else {
                $c = new Cad_Cliente;
                $c->cadastrar($this->nome, $this->email, $this->telefone, $this->id); 
            }


        }

        public function val_edit($id, $n, $e, $t){
            $this->nome = preg_replace('/[^[:alpha:]_]/', "",$n);
            $this->email = filter_var($e, FILTER_SANITIZE_EMAIL);
            $this->telefone = preg_replace('/[^\d\-]/',"",$t);
            $this->id = $id;
            if ((strlen($this->nome)<3) || (strlen($this->telefone)<9)){
                echo "<p>Valores digitados não permitidos. Tente Novamente.</p>";
            } else {
                $c = new Editar_Cliente;
                $c->editar($this->id, $this->nome, $this->email, $this->telefone); 
            }
        }
    }


?>