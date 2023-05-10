<?php 
    require_once "src/controller/cliente/most_Cliente.php";
    require_once "src/controller/cliente/apagar_Cliente.php";
    require_once "src/controller/cliente/editar_Cliente.php";
    require_once "src/controller/validacao_cliente.php";

    $val = new Validar_Clientes;
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
            <h2>Cadastrar Clientes</h2>   
            <?php 
                if(isset($_GET["id_up"])){
                    $edit = new Editar_Cliente;
                    $resultado = $edit->buscarDadosCliente($_GET["id_up"]);
                }
            ?>
            <form action="" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="<?php if(isset($_GET['id_up'])){
                    echo "nomeAtualizar";} else{ echo "nome";} ?>" id="idNome" value="<?php if(isset($_GET['id_up'])){echo $resultado["nome"];}
                ?>"><br>

                <label for="email">Email</label>
                <input type="email" name="email" id="idEmail" value="<?php if(isset($_GET['id_up'])){echo $resultado["email"];} ?>"><br>

                <label for="tel">Telefone</label>
                <input type="text" name="tel" id="idTel" value="<?php if(isset($_GET['id_up'])){echo $resultado["telefone"];}?>"><br>

                <input type="submit" value="<?php if(isset($_GET['id_up'])){echo "Atualizar";} else{echo"Cadastrar";} ?>">
            </form>
            <?php 
                if(!empty($_POST["nomeAtualizar"])){ 
                    $val->val_edit($_GET["id_up"], $_POST["nomeAtualizar"], $_POST["email"], $_POST["tel"]);
                }
            ?>
            <?php 
                if(!empty($_POST["nome"])){
                    $val->val_cad($_POST["nome"], $_POST["email"], $_POST["tel"], $_SESSION["id"]);
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