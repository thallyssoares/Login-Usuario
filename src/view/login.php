<?php 
    require_once "../controller/validacao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login de Usuario</h1>
    <main>
        <form action=" " method="post">
            <label for="nome">Nome de Usuario:</label><br>
            <input type="text" name="nome" id="idNome"><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="idSenha">

            <input type="submit" value="Entrar"> 
            <button><a href="cad.php">Criar Conta</a></button>
        </form>
        <?php 
            if(!empty($_POST["nome"]) && !empty($_POST["senha"])){
                $l = new Validar();
                $l->validar_Login($_POST["nome"], $_POST["senha"]);
            } else {
                echo "<p>Preencha todos os campos</p>";
            }
        
        ?>
    </main>
</body>
</html>