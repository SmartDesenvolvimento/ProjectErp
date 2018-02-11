<div class="content-wrapper">
	<?php
		include_once 'controller/cTermoCompromisso.php';
	?>
	<section class="content-header">
		<h1>
			Termo Compromisso
		</h1>
		<ol class="breadcrumb">
			<li><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="#">Termo de Compromisso</a></li>
			<li class="active">Temo de Compromisso</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div style="padding-left: 25%" class="col-md-8">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Termo de Compormisso</h3>
						<!-- Main content -->
					</div>
					<div class="box-body">
						<form role="form" action="controller/cGeneratePDF.php" method="post" name="frmCliente" onsubmit="return ValidaForm(this);">
							<div class="form-group">
								<label>Tipo Compromisso</label> 
								<select class="form-control" id="tipoCompromisso" name="tipoCompromisso" required name=tipoCompromisso>
									<option></option>
									<?php 
										$resultState = $termoComprimisso->GetTipoCompromisso("");
										while($dataState = $resultState->fetch(PDO::FETCH_OBJ)) { 
									?>
									<option value="<?php echo $dataState->ID ?>"><?php echo $dataState->DESCRICAO ?></option>
									<?php } ?>
								</select>
							</div>			
							<div class="form-group">
								<label>Cliente</label> 
								<select class="form-control" id="cliente" name="cliente" required name=cliente>
									<option></option>
									<?php 
										$resultState = $Cliente->getList("STATUS = 1", "NOME DESC");
										while($dataState = $resultState->fetch(PDO::FETCH_OBJ)) { 
									?>
									<option value="<?php echo $dataState->CODIGO ?>"><?php echo $dataState->NOME ?></option>
									<?php } ?>
								</select>
							</div>	
							<div class="form-group">
								<label>Micropigmentador(a)</label> 
								<select class="form-control" id="micropigmentador" name="micropigmentador" required name=micropigmentador>
									<option></option>
									<?php 
										$resulUsuario = $Usuario->GetUsuario("");
										while($rowUsuario = $resulUsuario->fetch(PDO::FETCH_OBJ)) { 
									?>
									<option value="<?php echo $rowUsuario->CODIGO_USUARIO ?>"><?php echo $rowUsuario->NOME ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<div class="form-check form-check-inline">
									<label class="form-check-label">
							  			Doença Pré Existente?
									</label>
									<input class="form-check-input" type="checkbox" id="existDoenca" value="1">
						  		</div>
							</div>
							<div class="form-group" id="descricaoDoenca">
								<label>Descrição Doença</label> <input type="text" class="form-control"
									placeholder="Doença ..." id="descricaoDoenca" name="descricaoDoenca" value="">
							</div>
							<div class="form-group">
								<label>Forma Pagamento</label> 
								<select class="form-control" name="forma_pagamento" required name=forma_pagamento>
									<option></option>
									<option value="Dinheiro">Dinheiro</option>
									<option value="Cartão">Cartão</option>
								</select>
							</div>
							<div class="col-md-12">
								<table class="table table-bordered text-center">
									<tr>
										<td><input type="reset" class="btn btn-block btn-danger"
											value="Cancelar"></td>
										<td><input type="submit" class="btn btn-block btn-success"
											value="Gerar Termo"></td>
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