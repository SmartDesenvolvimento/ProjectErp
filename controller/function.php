<?php
    //require_once 'conexao.php';

    //$conexao;
	function getIdVenda($conexao){
		$sql = "SELECT MAX(idVenda) as idVenda  FROM VENDA";
		$query = mysqli_query($conexao,$sql) or die ('comando falhou <br>'.$sql.'<br>'.mysqli_error());
		$result = mysqli_fetch_array($query);

		$id = $result['idVenda'];

		return $id + 1;

	}

?>