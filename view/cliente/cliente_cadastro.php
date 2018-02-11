<div class="content-wrapper">
	<?php
		include_once 'controller/cClienteForm.php';

		$sucesso = "";
		$alertName = "";
		$alert = "";
		$messageAlert = "";

		if (isset($_GET['sucesso'])) {
			$sucesso = $_GET['sucesso'];
			$cliente = $_GET['cliente'];
		}
	?>
	<section class="content-header">
		<h1>
			Cliente
		</h1>
		<ol class="breadcrumb">
			<li><a href="?menu=home"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="?menu=clientelistar&acao=clientelistar">Cliente</a></li>
			<li class="active">Cadastro Cliente</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<?php
				if ($sucesso == 'true'){
					$alert = "Sucesso!";
					$alertName = "alert-success";
					$messageAlert = "$cliente cadastrado com sucesso!";
				}
				elseif ($sucesso == 'false'){
					$alert = "Falha!";
					$alertName = "alert-danger";
					$messageAlert = "Falha ao cadastrar cliente $cliente!";
				}
				if ($sucesso != ''){
					echo '<div class="col-md-12">
							<div class="alert alert-dismissable '. $alertName .'">
						 
								<button class="close" aria-hidden="true" type="button" data-dismiss="alert">
								×
								</button>
								<h4> '
									. $alert . 
								' </h4> '. $messageAlert .
							'</div>
						  </div>
						';
				}
			?>
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Cadastro de Cliente</h3>
						<!-- Main content -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form role="form" action= <?php echo ("controller/cClienteCadastro.php?action=$codigoUsuario") ?> 
							method="post" name="frmCliente" onsubmit="return ValidaForm(this);">
							<div class="form-group">
								<label>Nome</label> <input type="text" class="form-control"
									placeholder="Nome ..." id="nome" name="nome" value="" required name=nome>
							</div>
							<div class="form-group">
								<label>Tipo Pessoa</label> <select class="form-control" name="tipo_pessoa" required name=tipo_pessoa>
									<option></option>
									<option value="Física">Física</option>
									<option value="Jurídica">Jurídica</option>
								</select>
							</div>
							<div class="form-group">
								<label>RG</label> <input type="text" class="form-control"
									placeholder="RG..." id="rg" name="rg"
									value="" onKeyPress="MascaraRG(frmCliente.rg);" maxlength="13" required name=rg>  
							</div>
							<div class="form-group">
								<label>CPF</label> <input type="text" class="form-control"
									placeholder="CPF..." id="cpf_ie" name="cpf_ie"
									value="" onKeyPress="MascaraCPF(frmCliente.cpf_ie);" maxlength="14" required name=cpf_ie
									>
							</div>
							<div class="form-group">
								<label>Data Nascimento</label> <input type="date" class="form-control"
									placeholder="Data Nascimento..." id="dataNasc" name="dataNasc"
									value="" required name=dataNasc
									>
							</div>
							<div class="form-group">
								<label>Estado</label> 
								<select class="form-control" id="estado" name="estado" onchange="buscar_cidades()" required name=estado>
									<option></option>
									<?php 
										$resultState = $Estado->getStateList();
										while($dataState = $resultState->fetch(PDO::FETCH_OBJ)) { 
									?>
									<option value="<?php echo $dataState->ID ?>"><?php echo $dataState->NOME ?></option>
									<?php } ?>
								</select>
							</div>			
							<div id="load_cidades" class="form-group">
								<label>Cidade</label> 
								<select class="form-control" id="cidade" name="cidade" required name=cidade>
									<option value=""></option>
								</select>
							</div>	
							<div class="form-group">
								<label>Endereço</label> <input type="text"
									class="form-control" placeholder="Endereço ..." id="endereco"
									name="endereco" value="" required name=endereco>
							</div>			
							<div class="form-group">
								<label>Telefone</label> <input type="text"
									class="form-control" placeholder="Telefone ..." id="tel"
									name="tel" value="" onKeyPress="MascaraTelefone(frmCliente.tel);" maxlength="15" required name=tel>
							</div>
							<div class="form-group">
								<label>E-mail</label> <input type="text" class="form-control"
									placeholder="E-mail ..." id="email" name="email" value="" required name=email>
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
			<div class="col-md-4"></div>
		</div>
			
	</section>
</div>
			
			
	


