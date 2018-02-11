<?php
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';

$codigoProduto= $_POST ['codigoProduto'];
$qtd= $_POST ['qtd'];

$sql = "INSERT INTO VENDA_ITEM
        (idVenda
        ,CODIGO_PRODUTO
        ,QUANTIDADE
        )
        VALUES
        ($id
        ,'$codigoProduto'
        ,'$qtd'
        ) ";
$query = mysqli_query($conexao,$sql) or die("Query: ".$sql. mysqli_error());


	echo("<script type='text/javascript'> alert('Produto $id adicionado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=add_product_sale&id=$id';</script>");

?>