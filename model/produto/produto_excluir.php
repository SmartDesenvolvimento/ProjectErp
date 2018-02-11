<?php

	if (isset ( $_GET ['id'] )) {
	
		$id = $_GET ['id'];
	} 
	else {
		
		$id = "Comando Não Encontrado";
	}

	else {
		
		$descricao = "Comando Não Encontrado";
	}

	require_once '../../controller/conexao.php';

	if(isset ($id)){

		$sql = "UPDATE PRODUTO SET ATIVO = 0 WHERE CODIGO_PRODUTO = '$id' ";

		$query = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());

	}

	echo("<script type='text/javascript'> alert('Produto $descricao excluído com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=produto_lista';</script>");


?>