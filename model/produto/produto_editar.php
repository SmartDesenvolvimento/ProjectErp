<?php

if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';

$codfornecedor= $_POST ['codfornecedor'];
$descricao= $_POST ['descricao'];
$valor= $_POST ['valor'];
$unidade= $_POST ['unidade'];
$loteminimo= $_POST ['loteminimo'];
$ativo= $_POST ['ativo'];

$sql = "UPDATE PRODUTO
		SET 
		CODIGO_FORNECEDOR = '$codfornecedor'
		,DESCRICAO = '$descricao'
		,VALOR = '$valor'
		,UNIDADE = '$unidade'
		,LOTE_MINIMO = '$loteminimo'
		,ATIVO = '$ativo'
		WHERE
		CODIGO_PRODUTO = '$id'	
		";
				
		$insert = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());
		
		echo("<script type='text/javascript'> alert('Produto $id editado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=produto_lista';</script>");
	
		
?>
