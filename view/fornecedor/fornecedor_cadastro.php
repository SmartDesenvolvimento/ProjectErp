<!DOCTYPE html>
<html>
<head>
	<?php require_once '../../controller/conexao.php';?>
	<?php 
		include_once '../header/header.php';
		require_once '../../controller/functions.php';
	?>
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
					<li class="active">Cadastro Fornecedor</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div style="padding-left: 25%" class="col-md-8">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Cadastro de Fornecedores</h3>
								<!-- Main content -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<form role="form" action="../../model/fornecedor/fornecedor_cadastro.php" method="post" >
									<div class="form-group">
										<label>Nome</label> <input type="text" class="form-control"
											placeholder="Nome ..." id="nome" name="nome" value="">
									</div>
									<div class="form-group">
										<label>CNPJ</label> <input type="text" class="form-control"
											placeholder="CNPJ ..." id="cnpj" name="cnpj" value="">
									</div>
									<div class="form-group">
										<label>IE</label> <input type="text" class="form-control"
											placeholder="Inscrição Estadual ..." id="ie" name="ie" value="">
									</div>
									<div class="form-group">
										<label>Estado</label> <select class="form-control" id="estado" name="estado">
											<option>Selecione...</option>
											<?php while($prod = $oFunction->GetEstado($conexao)) { ?>
 												<option value="<?php echo $prod['UF'] ?>"><?php echo $prod['NOME'] ?></option>
												 <?php } ?>
										</select>
									</div>			
									<div class="form-group">
									<?php $query = mysqli_query($conexao,"SELECT NOME FROM CIDADE ORDER BY NOME");?>
										<label>Cidade</label> <select class="form-control" id="cidade" name="cidade">
											<option>Selecione...</option>
											<?php while($prod = mysqli_fetch_array($query)) { ?>
 												<option value="<?php echo $prod['NOME'] ?>"><?php echo $prod['NOME'] ?></option>
												 <?php } ?>
										</select>
									</div>		
									<div class="form-group">
										<label>Endereço</label> <input type="text"
											class="form-control" placeholder="Endereço ..." id="endereco"
											name="endereco" value="">
									</div>														
									<div class="form-group">
										<label>Telefone</label> <input type="text"
											class="form-control" placeholder="Telefone ..." id="tel"
											name="tel" value="">
									</div>
									<div class="form-group">
										<label>E-mail</label> <input type="text" class="form-control"
											placeholder="E-mail ..." id="email" name="email" value="">
									</div>
									<div class="form-group">
										<label>Ativo</label>
										<div class="radio">
											<label> <input type="radio" name="ativo"
												id="id" value="1" checked> Sim
											</label> <label> <input type="radio" name="ativo"
												id="ativo" value="0" checked> Não
											</label>
										</div>
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

</body>