<?php
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';

if(isset ($id))
{
	$sql = "SELECT * FROM FORNECEDOR WHERE CODIGO_FORNECEDOR = '$id'";

	$query = mysqli_query($conexao,$sql) or die(mysql_error());

	$result = mysqli_fetch_array($query);

	$codfornecedor = $result['CODIGO_FORNECEDOR'];
	$nome = $result['NOME'];
	$cnpj = $result['CNPJ'];
	$ie = $result['INSCRICAO_ESTADUAL'];
	$pais = "";
	$estado = $result['ESTADO'];
	$cidade = $result['CIDADE'];
	$endereco = $result['ENDERECO'];
	$tel = $result['TELEFONE'];
	$email = $result['email'];
	$ativo = $result['HABILITADO'];

}


?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once '../header/header.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include_once '../menu/menu.php';?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Fornecedor</h1>
				<ol class="breadcrumb">
					<li><a href="?menu=home"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="?menu=clientelistar&acao=clientelistar">Fornecedor</a></li>
					<li class="active">Editar Fornecedor</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Editar fornecedor</h3>
								<!-- Main content -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<form role="form" action="../../model/fornecedor/fornecedor_editar.php?id=<?php echo $id ?>" method="post" >
									<div class="form-group">
										<label>Código Fornecedor</label> <input type="text" class="form-control"
											placeholder="Código Fornecedor ..." id="codfornecedor" name="codfornecedor" value="<?php echo $codfornecedor ?>" disabled >
									</div>
									<div class="form-group">
										<label>Nome</label> <input type="text" class="form-control"
											placeholder="Nome ..." id="nome" name="nome" value="<?php echo $nome ?>"
									</div>
									<div class="form-group">
										<label>CNPJ</label> <input type="text" class="form-control"
											placeholder="CNPJ ..." id="cnpj" name="cnpj" value="<?php echo $cnpj ?>"
									</div>
									<div class="form-group">
										<label>IE</label> <input type="text" class="form-control"
											placeholder="Inscrição Estadual ..." id="ie" name="ie"
											value="<?php echo $ie ?>"
									</div>
									<?php $query = mysqli_query($conexao,"SELECT NOME FROM PAIS ORDER BY NOME");?>
									<div class="form-group">
										<label>País</label> <select class="form-control" id="pais" name="pais">
											<option value= "<?php echo $pais ?>"><?php echo $pais  ?></option>
											<?php while($prod = mysqli_fetch_array($query)) { ?>
 												<option value="<?php echo $prod['NOME'] ?>"><?php echo $prod['NOME'] ?></option>
												 <?php } ?>
										</select>
									</div>
									<div class="form-group">
									<?php $query = mysqli_query($conexao,"SELECT NOME, UF FROM estado ORDER BY NOME");?>
										<label>Estado</label> <select class="form-control" id="estado" name="estado">
											<option value= "<?php echo $estado ?>"><?php echo $estado ?></option>
											<?php while($prod = mysqli_fetch_array($query)) { ?>
 												<option value="<?php echo $prod['UF'] ?>"><?php echo $prod['NOME'] ?></option>
												 <?php } ?>
										</select>
									</div>			
									<div class="form-group">
									<?php $query = mysqli_query($conexao,"SELECT NOME FROM CIDADE ORDER BY NOME");?>
										<label>Cidade</label> <select class="form-control" id="cidade" name="cidade">
											<option value= "<?php echo $cidade ?>" ><?php echo $cidade ?></option>
											<?php while($prod = mysqli_fetch_array($query)) { ?>
 												<option value="<?php echo $prod['NOME'] ?>"><?php echo $prod['NOME'] ?></option>
												 <?php } ?>
										</select>
									</div>		
									<div class="form-group">
										<label>Endereço</label> <input type="text"
											class="form-control" placeholder="Endereço ..." id="endereco"
											name="endereco" value="<?php echo $endereco ?>">
									</div>														
									<div class="form-group">
										<label>Telefone</label> <input type="text"
											class="form-control" placeholder="Telefone ..." id="tel"
											name="tel" value="<?php echo $tel ?>">
									</div>
									<div class="form-group">
										<label>E-mail</label> <input type="text" class="form-control"
											placeholder="E-mail ..." id="email" name="email" value="<?php echo $email ?>">
									</div>
									<div class="box-body">
										<label>
						                  Ativo
						                </label>
						                <label>
						                  <input type="checkbox" class="flat-red" name="ativo" value="<?php echo $ativo ?>">
						                </label>
						            </div>
									<br>
									<div class="col-md-12">
										<table class="table table-bordered text-center">
											<tr>
												<td><input type="submit" class="btn btn-block btn-success"
													value="salvar"></td>
												<td><input type="reset" class="btn btn-block btn-danger"
													value="cancelar"></td>
											</tr>
										</table>
									</div>

								</form>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->


					</div>
				</div>

			</section>
		</div>
		
		
		<?php
		// chamar rodapé
		include_once '../header/footer.php';
		?>
	<?php include_once '../header/sidebar.php';?>
	<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../../plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../../dist/js/demo.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="../../plugins/iCheck/icheck.min.js"></script>

	<script>
  		$(function () {

  		//iCheck for checkbox and radio inputs
	    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
	      checkboxClass: 'icheckbox_minimal-blue',
	      radioClass: 'iradio_minimal-blue'});
  			//Flat red color scheme for iCheck
	    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
	      checkboxClass: 'icheckbox_flat-green',
	      radioClass: 'iradio_flat-green'
	    });
  	});

</body>