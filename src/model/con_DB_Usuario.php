<?php 

class Conexao_DB_Usuario{
    private $nome;
    private $email;
    private $senha;
    private $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO ("mysql:dbname=loginuser;host=localhost", "root", "");    
        } catch (PDOException $e) {
            echo "<p>Houve um erro ao se conectar ao Banco de Dados.</p>";
        } catch (Exception $e){
            echo "<p>Houve um erro.</p>";
        }
            
    }
    
    public function Login($n, $s){
        $this->nome = $n;
        $this->senha = $s;
        $res = $this->pdo->prepare("SELECT * FROM usuario WHERE nome=:n");
        $res->bindValue(":n", $this->nome);
        $res->execute();

        $resultado = $res->fetch(PDO::FETCH_ASSOC);

        if(count($resultado) > 0){
            if($this->senha == $resultado["senha"]){
                session_start();

                $_SESSION["name"] = $resultado["nome"];
                $_SESSION["id"] = $resultado["id"];
                $_SESSION["logado"] = true;

                header("location:../../index.php");
            }

        } else{
            echo "<p>Erro ao logar na conta. Tente novamente.</p>";
        }

    }
    
    public function Cadastrar($n, $e, $s){
        $this->nome = $n;
        $this->email = $e;
        $this->senha = $s;

        $res = $this->pdo->prepare("INSERT INTO usuario(nome, email, senha) VALUES (:n, :e, :s)");
        $res->bindValue(":n", $this->nome);
        $res->bindValue(":e", $this->email);
        $res->bindValue(":s", $this->senha);
        $res->execute();

        echo "<p>Cadastro feito com sucesso. Volte a página de login pra entrar na conta.</p>";
    }

};


?>