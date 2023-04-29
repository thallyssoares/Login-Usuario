<?php 

class Conexao_DB_Cliente{

    private $cNome;
    private $cEmail;
    private $cTel;
    private $pdo;
    private $uId; 

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=loginuser;host=localhost", "root", "");
    }
    public function cad_Cliente($n, $e, $t, $id){
        $this->cNome = $n;
        $this->cEmail = $e;
        $this->cTel = $t;
        $this->uId = $id;
        try {
            $res = $this->pdo->prepare("INSERT INTO clientes (idusuario, nome, email, telefone) VALUES (:i, :n, :e, :t);");

            $res->bindValue(":i", $this->uId);
            $res->bindValue(":n", $this->cNome);
            $res->bindValue(":e", $this->cEmail);
            $res->bindValue(":t", $this->cTel);    
            $exec = $res->execute();

            if($exec){
                echo "<p>Cliente inserido com sucesso.</p>";
            } else {
                echo "<p>Houve um erro no cadastro do cliente. Tente Novamente.</p>";
            }
        } catch (PDOException $e) {
            echo "<p>Houve um erro na conexão com o Banco de Dados.</p>";
        } catch (Exception $e){
            echo "<p>Houve um erro na execução do código.</p>";
        }
        
    }
}

?>