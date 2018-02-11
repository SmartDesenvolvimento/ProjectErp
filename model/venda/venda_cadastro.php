<?php
require_once '../../controller/conexao.php';

$cliente= $_POST ['cliente'];
$vendedor= $_POST ['vendedor'];
$tipo_venda= $_POST ['tipo_venda'];
$desconto= $_POST ['desconto'];
$comissao= $_POST ['comissao']; 

$dataAtual = "CURDATE()";

$sql = "INSERT INTO VENDA
        (DATA_VENDA
        ,VALOR
        ,CODIGO_CLIENTE
        ,DESCONTO
        ,VALOR_LIQUIDO
        ,VENDEDOR
        ,COMISSAO
        ,VALOR_COMISSAO
        ,VENDA_FINALIZADA
        ,VISTA_PRAZO)
        VALUES
        ($dataAtual
        ,0
        ,'$cliente'
        ,'$desconto'
        ,0
        ,'$vendedor'
        ,'$comissao'
        ,'null'
        ,0
        ,'$tipo_venda'
        ) ";
$query = mysqli_query($conexao,$sql) or die("Query: ".$sql. mysqli_error());

$id = mysqli_insert_id($conexao);

echo("<script type='text/javascript'>
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=add_product_sale&id=$id';</script>");

?>