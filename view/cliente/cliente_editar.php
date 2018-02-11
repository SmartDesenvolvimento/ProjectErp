<!DOCTYPE html>
<html>
	<head>
		<title>
            Editar Cliente
        </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php 
			include_once '../header/header.php';
			//alterar pelo autoload;
			require '../../controller/cClienteEdit.php';
		?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini" >
		<div class="wrapper">
			<?php include_once '../menu/menu.php';?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>
						Cliente Editar
					</h1>
					<ol class="breadcrumb">
						<li><a href="?menu=home"><i class="fa fa-dashboard"></i> Home</a></li>
						<li><a href="?menu=clientelistar&acao=clientelistar">Cliente</a></li>
						<li class="active">Cadastro Cliente</li>
					</ol>
				</section>
				<section class="content">
					<div class="row">
						<div style="padding-left: 25%" class="col-md-8">
							<div class="box box-primary">
								<div class="box-header with-border">
									<h3 class="box-title">Alterar dados do cliente</h3>
									<!-- Main content -->


								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<form role="form" action="../../controller/cClienteEdit.php?update&codigo=<?php echo $listClient->CODIGO;?>" method="post" name="frmCliente" onsubmit="return ValidaForm(this);">
										<div class="form-group">
											<label>Codigo Cliente</label> <input type="text" class="form-control"
												 id="codigo" name="codigo" value=<?php echo $listClient->CODIGO; ?> disabled>
										</div>
										<div class="form-group">
											<label>Nome</label> <input type="text" class="form-control"
												placeholder="Nome ..." id="nome" name="nome" value=<?php echo $listClient->NOME; ?> required name=nome>
										</div>
										<div class="form-group">
											<label>Tipo Pessoa</label> <select class="form-control" name="tipo_pessoa" required name=tipo_pessoa>
												<option value=<?php echo $listClient->TIPO_PESSOA; ?>><?php echo $listClient->TIPO_PESSOA; ?></option>
												<?php 
													if($listClient->TIPO_PESSOA == "Jurídica"){
														echo '<option value="Física">Física</option>';
													}
													else{
														echo '<option value="Jurídica">Jurídica</option>';
													} 
												?>	
											</select>
										</div>
										<div class="form-group">
											<label>RG</label> <input type="text" class="form-control"
												placeholder="RG..." id="rg" name="rg"
												value=<?php echo $listClient->RG_CNPJ; ?> onKeyPress="MascaraRG(frmCliente.rg);" maxlength="13" required name=rg>  
										</div>
										<div class="form-group">
											<label>CPF</label> <input type="text" class="form-control"
												placeholder="CPF..." id="cpf_ie" name="cpf_ie"
												value=<?php echo $listClient->CPF_IE; ?> onKeyPress="MascaraCPF(frmCliente.cpf_ie);" maxlength="14" required name=cpf_ie
												>
										</div>
										<div class="form-group">
											<label>Data Nascimento</label> <input type="date" class="form-control"
												placeholder="Data Nascimento..." id="dataNasc" name="dataNasc"
												value=<?php echo $listClient->DATA_NASCIMENTO; ?> required name=dataNasc
												>
										</div>
										<div class="form-group">
											<label>Estado</label> <select class="form-control" id="estado" name="estado" onchange="buscar_cidades()" required name=estado>
											<option value=<?php echo $listClient->ESTADO; ?>><?php echo $listClient->NOME_ESTADO; ?></option>
												<?php 
													$resultState = $estado->getStateList();
													while($dataState = $resultState->fetch(PDO::FETCH_OBJ)) { 
												?>
												<option value="<?php echo $dataState->ID ?>"><?php echo $dataState->NOME ?></option>
												<?php } ?>
											</select>
										</div>			
										<div id="load_cidades" class="form-group">
											<label>Cidade</label> 
											<select class="form-control" id="cidade" name="cidade" required name=cidade>
												<option value="<?php echo $listClient->CIDADE; ?>"> <?php echo $listClient->NOME_CIDADE; ?> </option>
											</select>
										</div>	
										<div class="form-group">
											<label>Endereço</label> <input type="text"
												class="form-control" placeholder="Endereço ..." id="endereco"
												name="endereco" value="<?php echo $listClient->ENDERECO; ?>" required name=endereco>
										</div>			
										<div class="form-group">
											<label>Telefone</label> <input type="text"
												class="form-control" placeholder="Telefone ..." id="tel"
												name="tel" value="<?php echo $listClient->TELEFONE; ?>" onKeyPress="MascaraTelefone(frmCliente.tel);" maxlength="15" required name=tel>
										</div>
										<div class="form-group">
											<label>E-mail</label> <input type="text" class="form-control"
												placeholder="E-mail ..." id="email" name="email" value="<?php echo $listClient->EMAIL; ?>" required name=email>
										</div>
										<br>
										<div class="col-md-12">
											<table class="table table-bordered text-center">
												<tr>
													<td><input type="reset" class="btn btn-block btn-danger"
														value="Cancelar"></td>
													<td><input type="submit" class="btn btn-block btn-success"
														value="Salvar"></td>
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

		<script src="../../bootstrap/js/request.js"></script>

		<script src="../../bootstrap/js/MascaraValidacao.js"></script>

	</body>
</html>