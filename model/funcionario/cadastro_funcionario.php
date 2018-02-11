<?php
require_once '../../controller/conexao.php';

$nome= $_POST ['nome'];
$datanasc= $_POST ['datanasc'];
$cpf= $_POST ['cpf'];
$senha= $_POST ['senha'];
$duplicate_senha= $_POST ['duplicate_senha'];
$rg= $_POST ['rg'];
$cargo= $_POST ['cargo'];
$telefone= $_POST ['telefone'];
$cidade= $_POST ['cidade'];
$endereco= $_POST ['endereco'];
  

$sql = "SELECT MAX(idFUNCIONARIO) AS ID FROM FUNCIONARIO";

$result = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());

$id = mysqli_fetch_array($result);

$id = $id['ID'] + 1;

if($senha == $duplicate_senha)
{
    $sql = "INSERT INTO FUNCIONARIO
        (idFUNCIONARIO
            ,NOME
            ,CIDADE
            ,ENDERECO
            ,PAIS
            ,ESTADO
            ,RG
            ,IMAGEM
            ,CARGO
            ,TELEFONE
            ,SENHA)
            VALUES
            ($id
            ,'$nome'
            ,'$cidade'
            ,'$endereco'
            ,'null'
            ,null
            ,'$rg'
            ,null
            ,'$cargo'
            ,'$telefone'
            ,'$senha'
            )";
    $Query = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());

    echo("<script type='text/javascript'> alert('Funcionário cadastrado com sucesso!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=funcionario';</script>");
}

else{
    echo("<script type='text/javascript'> alert('Senha Incorreta!!!'); 
        location.href='http://localhost/Sist_Info_Project/view/control/control_view.php?menu=funcionario&nome=$nome&cidade=$cidade&rg=$rg&cargo=$cargo&telefone=$telefone&datanasc=$datanasc';</script>");
}



?>