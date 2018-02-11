<?php
$nome = '';
$rg = '';
$cpf = '';
$datanasc = '';
$sexo = '';
$cidade = '';
$bairro = '';
$tel = '';

<div class="content-wrapper">
	<div class="box box-danger">
		<div class="box-body">
			<form role="form" action="index.php?acao=cadastrocliente" method="post">
				<label>Cadastro Cliente</label>
				<div class="form-group">
					 <input type="text"
						class="form-control" placeholder="Nome" id="nome" name="nome"
						value="<?php echo $nome; ?>"> <br> 
						<input type="text" class="form-control"
						placeholder="RG" id="rg" name="rg" value="<?php echo $rg; ?>"> <br> 
						<input
						type="text" class="form-control" placeholder="CPF" id="cpf"
						name="cpf" value="<?php echo $cpf; ?>"> <br>
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input type="text" class="form-control"
							placeholder="Data Nascimento"
							data-inputmask="'alias': 'dd/mm/yyyy'" data-mask id="datanasc"
							name="datanasc" value="<?php echo $datanasc; ?>">
					</div>
					<br>
					<div class="form-group">
						<label>Sexo</label> <select name="sexo" id="sexo"
							class="form-control">
							<option value=""></option>
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
							<option value="O">Outro</option>
						</select>
					</div>
					<br> <input type="text" class="form-control" placeholder="Cidade"
						id="cidade" name="cidade" value="<?php echo $cidade; ?>"> <br> 
						<input type="text"
						class="form-control" placeholder="Bairro / N°" id="bairro"
						name="bairro" value="<?php echo $bairro; ?>"> <br> 
						<input type="text"
						class="form-control" placeholder="Telefone" id="Tel" name="tel"
						value="<?php echo $tel; ?>">
				</div>

				<div class="btn-group" role="group">
					<input type="submit" name="criar_cliente" value="Salvar">
					<imput type="button" value="Cancelar">
				</div>
			</form>

		</div>
	</div>

	<!-- Chamar Rodape -->


</div>
	<?php require_once '../header/footer.php'; ?>  
</div>

<!-- jQuery 2.2.3 -->
<script src="../../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/dist/js/demo.js"></script>
</body>
</html>