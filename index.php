<?php 
    session_start();
    if(!$_SESSION["logado"]){
        header("location:src/view/login.php");
    }
?>