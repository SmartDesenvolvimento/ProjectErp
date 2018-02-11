<?php
require_once '../../controller/conexao.php';

$codproduto= $_POST ['codproduto'];
$codfornecedor= $_POST ['codfornecedor'];
$descricao= $_POST ['descricao'];
$valor= $_POST ['valor'];
$unidade= $_POST ['unidade'];
$loteminimo= $_POST ['loteminimo'];
$ativo= $_POST ['ativo'];

$sql = "INSERT INTO PRODUTO
		(CODIGO_PRODUTO
		,CODIGO_FORNECEDOR
		,DESCRICAO
		,VALOR
		,UNIDADE
		,LOTE_MINIMO
		,ATIVO
		,DATA_INCLUSAO
		)
		VALUES
		('$codproduto'
		,'$codfornecedor'
		,'$descricao'
		,$valor
		,'$unidade'
		,$loteminimo
		,$ativo
		,CURDATE()
		)";
				
		$insert = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());
	
		echo("<script type='text/javascript'> alert('Produto Cadastrado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=produto_cadastro';</script>");
		
?>
