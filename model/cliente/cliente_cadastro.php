<?php
require_once '../../controller/conexao.php';

$codcliente= $_POST ['codcliente'];
$nome= $_POST ['nome'];
$tipo_pessoa = $_POST['tipo_pessoa'];
$rg_cnpj = $_POST['rg_cnpj'];
$cpf_ie = $_POST['cpf_ie'];
$pais= $_POST ['pais'];
$estado= $_POST ['estado'];
$cidade= $_POST ['cidade'];
$endereco= $_POST ['endereco'];
$tel= $_POST ['tel'];
$email= $_POST ['email'];
$ativo= $_POST ['ativo'];

$sql = "INSERT INTO CLIENTE
		(CODIGO_CLIENTE
	    ,NOME
	    ,TIPO_PESSOA
	    ,RG_CNPJ
	    ,CPF_IE
	    ,PAIS
	    ,ESTADO
	    ,CIDADE
	    ,ENDERECO
	    ,TELEFONE
	    ,EMAIL
	    ,HABILITADO
		)
		VALUES
		('$codcliente'
		,'$nome'
		,'$tipo_pessoa'
		,'$rg_cnpj'
		,'$cpf_ie'
		,'$pais'
		,'$estado'
		,'$cidade'
		,'$endereco'
		,'$tel'
		,'$email'
		, $ativo
		)";
				
		$insert = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());
	
		//header("Location: http://localhost/sist_info/view/body/index.php?menu=fornecedorcadastro&acao=fornecedorlistar");
		//echo "Cliente cadastrado com sucesso!";
		
		
		echo "<script type='text/javascript'>window.alert('Cliente cadastrado com sucesso');</script>";
		echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=http://localhost/Sist_Info_Project/view/control/control_view.php?menu=clientelistar&acao=clientelistar">';
		exit;
		
?>

