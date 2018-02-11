<?php
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';

//$codcliente = $_POST['codcliente'];
$nome = $_POST['nome'];
$cidade = $_POST['cidade'];
$endereco = $_POST['endereco'];
$telefone = $_POST['tel'];
$pais = $_POST['pais'];
$estado = $_POST['estado'];
$tipoPessoa = $_POST['tipo_pessoa'];
$habilitado = $_POST['ativo'];
$email = $_POST['email'];
$rgCnpj = $_POST['rg_cnpj'];
$cpfIe = $_POST['cpf_ie'];

$sql = "UPDATE CLIENTE
		SET
		NOME = '$nome'
		,CIDADE = '$cidade'
		,ENDERECO = '$endereco'
		,TELEFONE = '$telefone'
		,PAIS = '$pais'
		,ESTADO = '$estado'
		,TIPO_PESSOA = '$tipoPessoa'
		,HABILITADO = '$habilitado'
		,EMAIL = '$email'
		,RG_CNPJ = '$rgCnpj'
		,CPF_IE = '$cpfIe'
		WHERE
		CODIGO_CLIENTE = '$id'	
		";
				
		$insert = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());
	
		
		echo("<script type='text/javascript'> alert('Cliente: $nome editado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=clientelistar&acao=clientelistar';</script>");
	
		
?>
