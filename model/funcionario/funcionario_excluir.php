<?php

	if (isset ( $_GET ['id'] )) {
	
		$id = $_GET ['id'];
	} 
	else {
		
		$id = "Comando Não Encontrado";
	}

    if (isset ( $_GET ['nome'] )) {
	
		$nome = $_GET ['nome'];
	} 
	else {
		
		$nome = "Comando Não Encontrado";
	}

	require_once '../../controller/conexao.php';

	if(isset ($id)){

		$sql = "UPDATE FUNCIONARIO SET HABILITADO = 0 WHERE idFUNCIONARIO = '$id' ";

		$query = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());

	}

	echo("<script type='text/javascript'> alert('Funcionário $nome excluído com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=funcionariolista';</script>");


?>