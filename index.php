<?php 
    require_once "src/model/con_DB_Cliente.php";
    session_start();
    if(!$_SESSION["logado"]){
        header("location:src/view/login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
</head>
<body>
    <header>
        <h1>Painel Administrativo</h1>
        <nav>
            <a href="index.php?cmd=cad">Cadastrar Cliente</a>
            <a href="index.php?cmd=atu">Atualizar Dados</a>
            <a href="index.php?cmd=delete">Deletar Cliente</a>
            <a href="index.php?cmd=sair">Sair da Conta</a>
        </nav>
    </header>
    <main>
        <?php 
            if(!empty($_GET["cmd"])){
                
                $cmd = $_GET["cmd"];
                
                switch ($cmd) {
                    case "cad":
                        
                        echo '<form action="" method="post">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="idNome"><br>

                            <label for="email">Email</label>
                            <input type="email" name="email" id="idEmail"><br>

                            <label for="tel">Telefone</label>
                            <input type="text" name="tel" id="idTel"><br>

                            <input type="submit" value="Cadastrar">
                        </form>';
                        
                        if(!empty($_POST["nome"])){
                            $nome = $_POST["nome"];
                            $email = $_POST["email"];
                            $tel = $_POST["tel"];
                            $db = new Conexao_DB_Cliente;
                            $db->cad_Cliente($nome, $email, $tel, $_SESSION["id"]);
                        } else {
                            echo "<p>Preencha todos os dados corretamente.</p>";
                        }
                        
                        break;

                    case "atu":
                        echo "<p>$cmd</p>";
                        break;
                    case "delete":
                        echo "<p>$cmd</p>";
                        break;
                    default:
                        echo "<p>$cmd</p>";
                        break;
                }
            }
        ?>
    </main>
</body>
</html>