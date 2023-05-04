<?php 
    require_once "src/controller/cliente/most_Cliente.php";
    require_once "src/controller/cliente/cad_Cliente.php";
    require_once "src/controller/cliente/apagar_Cliente.php";

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
            </form>
            <?php 
                if(!empty($_POST["nome"])){
                    $db_cliente = new Cad_Cliente;
                    $db_cliente->cadastrar($_POST["nome"], $_POST["email"], $_POST["tel"], $_SESSION["id"]);
                }
                
            ?>
        </div>
        <div class="mostCliente">
            <h2>Meus Clientes</h2>
                <?php 
                    $most = new Most_Cliente;
                    $most->mostrar($_SESSION["id"]);
                    if(isset($_GET["id"])){
                        $apagar = new Apagar_Cliente;
                        $apagar->apagar($_GET["id"]);
                        header("location: index.php");
                    }

                ?>
        </div>
    </main>
</body>
</html>