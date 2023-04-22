<?php 

class Conexao_DB{
    private $nome;
    private $email;
    private $senha;

    public function __construct($n,$s){
        $this->nome = $n;
        $this->senha = $s;
    }
    
    public function Login(){
        try {
            $pdo = new PDO("mysql:dbname=loginuser;host=localhost", "root", "");
            $res = $pdo->prepare("SELECT * FROM usuario WHERE nome=:n");
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

        } catch (PDOException $e) {
    
            echo "<p>Houve um erro ao conectar com o Banco de Dados, esse foi o erro gerado: </p>" . $e->getMessage();
        } catch (Exception $e){
            echo "<p>Houve um erro, esse foi o erro gerado: </p>". $e->getMessage();
        }
        

    }
    
    public function Cadastrar($e){
        try {
            $this->email = $e;
            $pdo = new PDO("mysql:dbname=loginuser;host=localhost", "root", "");
            $res = $pdo->prepare("INSERT INTO usuario(nome, email, senha) VALUES (:n, :e, :s)");
            $res->bindValue(":n", $this->nome);
            $res->bindValue(":e", $this->email);
            $res->bindValue(":s", $this->senha);
            $res->execute();

            echo "<p>Cadastro feito com sucesso. Volte a página de login pra entrar na conta.</p>";
            
            
        } catch (PDOException $e) {
            echo "<p>Houve um erro ao conectar com o Banco de Dados, esse foi o erro gerado: </p>" . $e->getMessage();
        } catch (Exception $e){
            echo "<p>Houve um erro, esse foi o erro gerado: </p>" . $e->getMessage();
        }
    }
    
    

};


?>