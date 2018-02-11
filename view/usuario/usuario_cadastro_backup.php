<? php
 // Recebe os dados e guarda-os em variáveis;
if(isset($_GET['nome'])) {
    $nome = $_GET['nome'];
} else {
    $nome = '';
}

if(isset($_GET['cidade'])) {
    $cidade = $_GET['cidade'];
} else {
    $cidade = '';
}

if(isset($_GET['rg'])) {
    $rg = $_GET['rg'];
} else {
    $rg = '';
}

if(isset($_GET['cargo'])) {
    $cargo = $_GET['cargo'];
} else {
    $cargo = '';
}

if(isset($_GET['telefone'])) {
    $telefone = $_GET['telefone'];
} else {
    $telefone = '';
}

if(isset($_GET['datanasc'])) {
    $datanasc = $_GET['datanasc'];
} else {
    $datanasc = '';
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
	<?php
		require_once ("../../controller/cUsuarioCadastro.php")
	?>
</head>
<body class="hold-transition register-page">
	<div class="register-box">
		<div class="register-logo">
			<a href="#"><b>Usuário</b></a>
		</div>

		<div class="register-box-body">
			<p class="login-box-msg">Cadastrar novo Usuário</p>

			<form action="#" method="post">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Nome" name="nome" > <span
						class="glyphicon glyphicon-user form-control-feedback" ></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" type="date" placeholder="Data nascimento"  name="datanasc" 
					id="dataNasc" required name=dataNasc value=""> <span
						class="glyphicon glyphicon-calendar form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="CPF" name="cpf"> <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="RG" name="rg"> <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Cargo" name="cargo" > <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Telefone" name="telefone" > <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback"> 
					<select class="form-control" id="estado" name="estado" onchange="buscar_cidades()" required name=estado>
						<option>Estado</option>
							<?php 
								$resultState = $Estado->getStateList();
								while($dataState = $resultState->fetch(PDO::FETCH_OBJ)) { 
								?>
								<option value="<?php echo $dataState->ID ?>"><?php echo $dataState->NOME ?></option>
							<?php } ?>
					</select>
				</div>
				<div class="form-group has-feedback">
					<select class="form-control" id="cidade" name="cidade" required name=cidade>
						<option value="">Cidade</option>
					</select>
				</div>	
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Endereço" name="endereco"> <span
						class="glyphicon glyphicon-credit-card form-control-feedback"></span>
				</div>	
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Senha" name="senha">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control"
						placeholder="Digite novamente senha" name="duplicate_senha"> <span
						class="glyphicon glyphicon-log-in form-control-feedback"></span>
				</div>
				<div class="form-group">
                  <label for="exampleInputFile">Selecionar Imagem</label>
                  <input type="file" id="exampleInputFile">
                </div>
				<div class="row">
					<!-- /.col -->
					<div class=".col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
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

	<script src="../../bootstrap/js/MascaraValidacao.js"></script>

	<script src="../../bootstrap/js/request.js"></script>

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

