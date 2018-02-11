<?php
require_once '../../controller/conexao.php';

$fornecedor= $_POST ['fornecedor'];
$nf= $_POST ['nf'];

$dataAtual = "CURDATE()";

$sql = "INSERT INTO RECEBIMENTO
        (CODIGO_FORNECEDOR
        ,VALOR
        ,NF
        ,DATA_CRIACAO
        ,STATUS
        )
        VALUES
        ('$fornecedor'
        ,0      
        ,'$nf'
        ,'$dataAtual'
        ,0
        ) ";
$query = mysqli_query($conexao,$sql) or die("Query: ".$sql. mysqli_error());

$id = mysqli_insert_id($conexao);

echo("<script type='text/javascript'>
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=add_item_recebimento&id=$id';</script>");

?>