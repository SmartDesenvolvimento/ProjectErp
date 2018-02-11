<?php
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';

if(isset ($id))
{
	$sql = "SELECT * FROM FUNCIONARIO WHERE idFUNCIONARIO = '$id'";

	$query = mysqli_query($conexao,$sql) or die(mysql_error());

	$result = mysqli_fetch_array($query);

	$idFuncionario = $result['idFUNCIONARIO'];
	$nome = $result['NOME'];
	$cidade = $result['CIDADE'];
	$endereco = $result['ENDERECO'];
	$pais = $result['PAIS'];
	$rg = $result['RG'];
	$cargo = $result['CARGO'];
	$telefone = $result['TELEFONE'];
    $dataNasc = $result['DATANASC'];

}


?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>AdminLTE 2 | Registration Page</title>
<!-- Tell the browser to be responsive to screen width -->
<meta
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
	name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<?php require_once '../../controller/conexao.php';?>
</head>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="../../index2.html"><b>Funcionario</b></a>
		</div>

		<div class="register-box-body">
			<p class="login-box-msg">Editar funcionário</p>

			<form action="../../model/funcionario/funcionario_editar.php?id=<?php echo $id ?>" method="post">
                <div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Código Funcionário" name="idFuncionario" value="<?php echo $idFuncionario ?>" disabled > <span
						class="glyphicon glyphicon-user form-control-feedback" ></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $nome ?>"> <span
						class="glyphicon glyphicon-user form-control-feedback" ></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Data nascimento" data-inputmask="'alias': 'dd/mm/yyyy'" name="datanasc" value="<?php echo $dataNasc ?>" data-mask> <span
						class="glyphicon glyphicon-calendar form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="RG" name="rg" value="<?php echo $rg ?>"> <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Cargo" name="cargo" value="<?php echo $cargo ?>"> <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Telefone" name="telefone" value="<?php echo $telefone ?>" > <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<?php $query = mysqli_query($conexao,"SELECT NOME FROM CIDADE ORDER BY NOME");?>
					<select class="form-control" id="cidade" name="cidade" >
						<option value="<?php echo $cidade ?>" > <?php echo $cidade ?> </option>
						<?php while($prod = mysqli_fetch_array($query)) { ?>
 						<option value="<?php echo $prod['NOME'] ?>"><?php echo $prod['NOME'] ?></option>
						<?php } ?>
					</select>
				</div>	
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Endereço" name="endereco" value="<?php echo $endereco ?>"> <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>
				<div class="row">
					<!-- /.col -->
					<div class=".col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Salvar</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.form-box -->
	</div>
	<!-- /.register-box -->

	<!-- jQuery 2.2.3 -->
	<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="../../plugins/iCheck/icheck.min.js"></script>
	<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

