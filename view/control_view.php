
<?php
//INICIO A SESSÃO
session_start();
 
//Verifico se o usuário está logado no sistema
if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE) {
    header("Location: ../../index.php");
}
else {
   // echo "<h1>Seja bem-vindo, ".$_SESSION["usuarioNome"]."</h1>";
   // echo "<script> alert('Seja bem-vindo, ".$_SESSION["usuarioNome"]."!')</script>";
	$sucess = true;
	$usuario = $_SESSION["usuarioNome"];
	
}


require_once '../controller/control_menu.php';

?>