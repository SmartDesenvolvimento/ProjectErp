<?php

if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';

//$codfornecedor= $_POST ['codfornecedor'];
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

$sql = "UPDATE FORNECEDOR
		SET 
		NOME = '$nome'
		,CNPJ = '$cnpj'
		,INSCRICAO_ESTADUAL = '$ie'
		,ESTADO = '$estado'
		,CIDADE = '$cidade'
		,ENDERECO = '$endereco'
		,TELEFONE = '$tel'
		,EMAIL = '$email'
		WHERE
		CODIGO_FORNECEDOR = '$id'	
		";
				
		$insert = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());
	
		//header("Location: http://localhost/sist_info/view/body/index.php?menu=fornecedorcadastro&acao=fornecedorlistar");
		//echo "Cliente cadastrado com sucesso!";
		
		echo 
			"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=
			http://localhost/Sist_Info_Project/view/control/control_view.php?menu=fornecedor'>
			<script>
				function funcao1()
				{
				alert('Eu sou um alert!');
				}
			</script>
			";
	
		
?>
