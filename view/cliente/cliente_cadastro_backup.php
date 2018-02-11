<!DOCTYPE html>
<html>
<head>
	<?php include_once '../header/header.php';?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include_once '../menu/menu.php';?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					General Form Elements <small>Preview</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php?menu=home"><i class="fa fa-dashboard"></i> Home</a></li>
					<li><a href="#">Cliente</a></li>
					<li class="active">Cadastro de Clientes</li>
				</ol>
			</section>
			
			 <!-- Main content -->
    		<section class="content">
    		
			<div class="box box-warning">

				<div class="row">
				<div col-xs-12 col-md-8>
				
				 <!-- right column -->
				
				<!-- /.box-header -->
				<div class="box-body">
				
					<form role="form" >
						<div class="form-group" >
							<label>Nome</label> <input type="text" class="form-control"
								placeholder="Nome ..." id="nome" name="nome" value=""> 
						</div>
							
							<div class="form-group" >
							<label>Cidade</label>
							<input type="text" class="form-control" placeholder="Cidade ..."
								id="cidade" name="cidade" value=""> 
							</div>
							<div class="form-group" >
							<label>Endereço</label> <input type="text" class="form-control"
								placeholder="Endereço ..." id="endereco" name="endereco"
								value="">
							</div>
							<div class="form-group" >
							<label>Estado</label> <select class="form-control">
								<option></option>
								<option value="AC">Acre</option>
								<option value="AL">Alagoas</option>
								<option value="AP">Amapá</option>
								<option value="AM">Amazonas</option>
								<option value="BA">Bahia</option>
								<option value="CE">Ceará</option>
								<option value="DF">Distrito Federal</option>
								<option value="ES">Espírito Santo</option>
								<option value="GO">Goiás</option>
								<option value="MA">Maranhão</option>
								<option value="MT">Mato Grosso</option>
								<option value="MS">Mato Grosso do Sul</option>
								<option value="MG">Minas Gerais</option>
								<option value="PA">Pará</option>
								<option value="PB">Paraíba</option>
								<option value="PR">Paraná</option>
								<option value="PE">Pernambuco</option>
								<option value="PI">Piauí</option>
								<option value="RJ">Rio de Janeiro</option>
								<option value="RN">Rio Grande do Norte</option>
								<option value="RS">Rio Grande do Sul</option>
								<option value="RO">Rondônia</option>
								<option value="RR">Roraima</option>
								<option value="SC">Santa Catarina</option>
								<option value="SP">São Paulo</option>
								<option value="SE">Sergipe</option>
								<option value="TO">Tocantins</option>
							</select>
							</div>
							<div class="form-group" >
							<label>Tipo Pessoa</label> <select class="form-control">
								<option></option>
								<option value="">Física</option>
								<option value="">Jurídica</option>
							</select>
							</div>
							<div class="form-group" >
							<label>RG/CNPJ</label>
							</div>
							<div class="form-group" >
							<input type="text" class="form-control" placeholder="RG/CNPJ ..."
								id="rg_cnpj" name="rg_cnpj" value="">
							</div>
							<div class="form-group" > 
							<label>Telefone</label>
							<input type="text" class="form-control" placeholder="Telefone ..."
								id="tel" name="tel" value="">  
							</div>

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
					</div>
				</div>
			</div>
	

			</section>



		
		</div>
	<?php
	// chamar rodapé
	include_once '../header/footer.php';
	?>
	<?php include_once '../header/sidebar.php';?>
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
</html>
