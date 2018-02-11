<?php
require_once '../../controller/conexao.php';

$codfornecedor= $_POST ['codfornecedor'];
$nome= $_POST ['nome'];
$cnpj= $_POST ['cnpj'];
$ie= $_POST ['ie'];
$pais= $_POST ['pais'];
$estado= $_POST ['estado'];
$cidade= $_POST ['cidade'];
$endereco= $_POST ['endereco'];
$tel= $_POST ['tel'];
$email= $_POST ['email'];
$ativo= $_POST ['ativo'];

$sql = "INSERT INTO FORNECEDOR
		(CODIGO_FORNECEDOR
		,NOME
		,CNPJ
		,INSCRICAO_ESTADUAL
		,ESTADO
		,CIDADE
		,ENDERECO
		,TELEFONE
		,EMAIL
		,HABILITADO
		)
		VALUES
		('$codfornecedor'
		,'$nome'
		,'$cnpj'
		,'$ie'
		,'$estado'
		,'$cidade'
		,'$endereco'
		,'$tel'
		,'$email'
		,$ativo
		)";
				
		$insert = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());
	
		
		
		echo("<script type='text/javascript'> alert('Fornecedor Cadastrado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=fornecedorcadastro';</script>");
		
?>
