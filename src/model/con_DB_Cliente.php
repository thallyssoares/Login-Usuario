<?php 

class Conexao_DB_Cliente{

    public $pdo; 

    public function __construct(){
        $this->pdo = new PDO("mysql:dbname=loginuser;host=localhost", "root", "");
    }

    public function get_PDO(){
        return $this->pdo;
    }

    public function most_Cliente($id){
        $res = $this->pdo->prepare("SELECT c.nome, c.email, c.telefone FROM clientes c JOIN usuario u ON u.id=c.idusuario WHERE c.idusuario=:id ORDER BY c.nome;");
        $res->bindValue(":id", $id);
        $res->execute();
        $resultado = $res->fetchAll(PDO::FETCH_ASSOC);

        
        foreach ($resultado as $res) {
            echo $res["nome"] ." ". $res["email"] ." ". $res["telefone"] ."<br>";
        }
        
    }
}

?>