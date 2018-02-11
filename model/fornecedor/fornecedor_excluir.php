<?php

	if (isset ( $_GET ['id'] )) {
	
		$id = $_GET ['id'];
	} 
	else {
		
		$id = "Comando Não Encontrado";
	}

	require_once '../../controller/conexao.php';

	if(isset ($id)){

		$sql = "UPDATE FORNECEDOR SET HABILITADO = 0 WHERE CODIGO_FORNECEDOR = '$id' ";

		$query = mysqli_query($conexao,$sql) or die(mysql_error());

	}

	echo("<script type='text/javascript'> alert('Fornecedor excluído com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=fornecedor';</script>");


?>