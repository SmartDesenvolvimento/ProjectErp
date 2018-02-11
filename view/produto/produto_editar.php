<?php
if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}

require_once '../../controller/conexao.php';

if(isset ($id))
{
	$sql = "SELECT * FROM PRODUTO WHERE CODIGO_PRODUTO = '$id'";

	$query = mysqli_query($conexao,$sql) or die(mysql_error());

	$result = mysqli_fetch_array($query);

	$codProduto = $result['CODIGO_PRODUTO'];
	$codFornecedor = $result['CODIGO_FORNECEDOR'];
	$descricao = $result['DESCRICAO'];
	$valor = $result['VALOR'];
	$unidade = $result['UNIDADE'];
	$loteMinimo= $result['LOTE_MINIMO'];
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
					<li><a href="?menu=clientelistar&acao=clientelistar">Produto</a></li>
					<li class="active">Editar Produto</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-md-8">
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Editar Produto</h3>
								<!-- Main content -->
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<form role="form" action="../../model/produto/produto_editar.php?id=<?php echo $id ?>" method="post" >
									<div class="form-group">
										<label>Código Produto</label> <input type="text" class="form-control"
											placeholder="Código Produto ..." id="codfornecedor" name="codproduto" value="<?php echo $codProduto ?>" disabled >
									</div>
									<div class="form-group">
                                        <?php $query = mysqli_query($conexao,"SELECT CODIGO_FORNECEDOR, NOME FROM FORNECEDOR ORDER BY NOME");?>
										<label>Fornecedor</label> <select class="form-control" id="codfornecedor" name="codfornecedor">
											<option value="<?php echo $codFornecedor ?>"><?php echo $codFornecedor ?></option>
											<?php while($prod = mysqli_fetch_array($query)) { ?>
 												<option value="<?php echo $prod['CODIGO_FORNECEDOR'] ?>"><?php echo $prod['NOME'] ?></option>
												 <?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Descrição</label> <input type="text" class="form-control"
											placeholder="Descrição ..." id="descricao" name="descricao" value="<?php echo $descricao ?>">
									</div>
									<div class="form-group">
										<label>Valor</label> <input type="number" class="form-control"
											placeholder="Valor R$ ..." id="valor" name="valor" value="<?php echo $valor ?>">
									</div>
									<div class="form-group">
										<label>Unidade</label> <input type="text"
											class="form-control" placeholder="Tipo Unidade ..." id="unidade"
											name="unidade" value="<?php echo $unidade ?>">
									</div>														
									<div class="form-group">
										<label>Lote Mínimo</label> <input type="number" class="form-control"
											placeholder="Lote Mínimo ..." id="loteminimo" name="loteminimo" value="<?php echo $loteMinimo ?>">
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