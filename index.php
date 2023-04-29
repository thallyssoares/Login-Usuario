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
    </header>
    <main>
        <div class="cadCliente">     
            <form action="" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="idNome"><br>

                <label for="email">Email</label>
                <input type="email" name="email" id="idEmail"><br>

                <label for="tel">Telefone</label>
                <input type="text" name="tel" id="idTel"><br>

                <input type="submit" value="Cadastrar">
            </form>;
            <?php 
                if(!empty($_POST["nome"])){
                    $db = new Conexao_DB_Cliente();
                    $db->cad_Cliente($_POST["nome"], $_POST["email"], $_POST["tel"], $_SESSION["id"]);
                }
            
            ?>
        </div>
        <div class="mostCliente">
                <?php 
                    $db->most_Cliente($_SESSION["id"]);
                ?>
        </div>
    </main>
</body>
</html>