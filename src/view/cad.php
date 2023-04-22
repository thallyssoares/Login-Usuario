<?php 
    require_once "../model/con_DB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Cadastro de novo Usuario</h1>
    <main>
        <form action="" method="post">
            <label for="nome">Nome de Usuario:</label>
            <input type="text" name="nome" id="idNome">

            <label for="email">Email:</label>
            <input type="email" name="email" id="idEmail">

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="idSenha">

            <input type="submit" value="Cadastrar">
            <button><a href="login.php">Voltar</a></button>
        </form>
        <?php 
            if(!empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["senha"])){
                $db = new Conexao_DB($_POST["nome"], $_POST["senha"]);
                $db->Cadastrar($_POST["email"]);
            }
        ?>
    </main>
</body>
</html>