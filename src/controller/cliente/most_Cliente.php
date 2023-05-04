<?php 
require_once "src/model/con_DB_Cliente.php";

    class Most_Cliente extends Conexao_DB_Cliente{
        private $uid;
        public $pdo;

        public function __construct(){
            $db = new Conexao_DB_Cliente;
            $this->pdo = $db->get_PDO();
        }

        public function mostrar($id){
            $this->uid = $id;

            $res = $this->pdo->prepare("SELECT c.nome, c.email, c.telefone, c.id FROM clientes c JOIN usuario u ON u.id=c.idusuario WHERE c.idusuario=:id ORDER BY c.nome;");
            $res->bindValue(":id", $id);
            $res->execute();
            $resultado = $res->fetchAll(PDO::FETCH_ASSOC);

            echo "<table>";
            echo '<tr>
            <th>Nome</th>
            <th>Email</th>
            <th colspan="2">Telefone</th>
            </tr>';

            if(count($resultado)>0){
                echo "<tr>";
                echo "<td>";
                foreach($resultado as $res){
                    echo $res["nome"]."<br>";
                }
                echo "</td>";
                echo "<td>";
                foreach($resultado as $res){
                    echo $res["email"]."<br>";
                }
                echo "</td>";
                echo '<td colspan="4">';
                foreach($resultado as $res){
                    echo $res["telefone"]."<br>";
                }
                echo "</td>";
                echo "<td>";
                foreach($resultado as $res){
                    echo '<a href="index.php?id='.$res["id"].'">Editar</a>'." ".'<a href="index.php?id='.$res["id"].'">Apagar</a>'."<br>";
                }
                echo "</td>";
                echo "</tr>";
            } else {
                echo "<p>Você ainda não possui nenhum usuario cadastrado.</p>";
            }
            echo "</table>";
        }
    }




?>