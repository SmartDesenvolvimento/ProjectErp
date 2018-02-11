<?php
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';

$codigoProduto= $_POST ['codigoProduto'];
$qtd= $_POST ['qtd'];

$sqlProduto = "SELECT VALOR FROM PRODUTO WHERE CODIGO_PRODUTO = '$codigoProduto'";
$queryProduto = mysqli_query($conexao,$sqlProduto) or die("Query: ".$sqlProduto. mysqli_error());
$resultproduto = mysqli_fetch_array($queryProduto);

$valor = $resultproduto['VALOR'];

$sql = "INSERT INTO RECEBIMENTO_ITEM
        (CODIGO_RECEBIMENTO
        ,CODIGO_PRODUTO
        ,QUANTIDADE
        ,valor
        )
        VALUES
        ($id
        ,'$codigoProduto'
        ,'$qtd'
        ,'$valor'
        ) ";
$query = mysqli_query($conexao,$sql) or die("Query: ".$sql. mysqli_error());


	echo("<script type='text/javascript'> alert('Produto $codigoProduto adicionado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=add_item_recebimento&id=$id';</script>");

?>