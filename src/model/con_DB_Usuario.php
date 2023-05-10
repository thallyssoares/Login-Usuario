<?php 

class Conexao_DB_Usuario{
    private $nome;
    private $email;
    private $senha;
    protected $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO ("mysql:dbname=loginuser;host=localhost", "root", "");    
        } catch (PDOException $e) {
            echo "<p>Houve um erro ao se conectar ao Banco de Dados.</p>";
        } catch (Exception $e){
            echo "<p>Houve um erro.</p>";
        }
            
    }
    
    public function get_PDO(){
        return $this->pdo;    
    }
    
    public function Cadastrar($n, $e, $s){
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

};


?>