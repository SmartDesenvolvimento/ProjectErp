<?php
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';


$sql = "CALL FINALIZARECEBIMENTO ($id) ";

$query = mysqli_query($conexao,$sql) or die("Query: ".$sql. mysqli_error());


	echo("<script type='text/javascript'> alert('Recebimento finalizado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=criar_recebimento';</script>");

?>