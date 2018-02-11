<?php

if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}


require_once '../../controller/conexao.php';

$nome= $_POST ['nome'];
$datanasc= $_POST ['datanasc'];
$rg= $_POST ['rg'];
$cargo= $_POST ['cargo'];
$telefone= $_POST ['telefone'];
$cidade= $_POST ['cidade'];
$endereco= $_POST ['endereco'];

$sql = "UPDATE FUNCIONARIO
		SET 
		NOME = '$nome'
		,DATANASC = '$datanasc'
		,RG = '$rg'
		,CARGO = '$cargo'
		,TELEFONE = '$telefone'
		,CIDADE = '$cidade'
        ,ENDERECO = '$endereco'
		WHERE
		idFUNCIONARIO = '$id'	
		";
				
		$insert = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());
		
		echo("<script type='text/javascript'> alert('Funcionario $nome editado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=funcionariolista';</script>");
	
		
?>
