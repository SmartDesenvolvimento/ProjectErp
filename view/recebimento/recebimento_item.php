<?php

if (isset ( $_GET ['id'] )) {
	
	$id = $_GET ['id'];
} else {
	
	$id = "Comando Não Encontrado";
}
    include '../../controller/conexao.php';
    include '../../controller/function.php';
?>

<!DOCTYPE html>
<html>
<head>
	<?php 
        include_once '../header/header.php';
    ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include_once '../menu/menu.php';?>
		 <!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Vendas
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Recebimento</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box-header">
							<h3 class="box-title">Nova Recebimento</h3>
						</div>
						
						<!-- /.box-header -->
						<div>
                            <table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Código Recebimento</th>
										<th>Código Produto</th>
										<th>Descrição Produto</th>
										<th>Valor</th>
										<th>Quantidade</th>
										<th>Excluir</th>
									</tr>
								</thead>
								<tbody>
									<?php $sql = "SELECT 
														ITEM.CODIGO_RECEBIMENTO
														,ITEM.CODIGO_PRODUTO
														,PRODUTO.DESCRICAO
														,ITEM.QUANTIDADE
														,PRODUTO.VALOR
													FROM 
														RECEBIMENTO_ITEM ITEM
													INNER JOIN
														PRODUTO 
													ON PRODUTO.CODIGO_PRODUTO = ITEM.CODIGO_PRODUTO
													WHERE ITEM.CODIGO_RECEBIMENTO = $id" ;
									$query = mysqli_query($conexao,$sql) or die("Query: ".$sql. mysqli_error());
									while($prod = mysqli_fetch_array($query)) { ?>
									<tr>
										<td><?php echo $prod['CODIGO_RECEBIMENTO']?> </td>
										<td><?php echo $prod['CODIGO_PRODUTO']?> </td>
										<td><?php echo $prod['DESCRICAO']?> </td>
										<td><?php echo $prod['QUANTIDADE']?> </td>
										<td><?php echo $prod['VALOR']?> </td>
											<td style='width: 30px'>
												<?php
												echo
													'<a style="width: 50px"
													class="btn btn-danger btn-xs" 
														href="../../model/produto/produto_excluir.php?id='
													. $prod['CODIGO_PRODUTO'].'
													 &descricao='.$prod['DESCRICAO'].'">Excluir </a>';
												?>
											</td>
									</tr>
								<?php 
								} ;

								?>	
								</tbody>
								<tfoot>
									<tr>
										<th>Código Recebimento</th>
										<th>Código Produto</th>
										<th>Descrição Produto</th>
										<th>Valor</th>
										<th>Quantidade</th>
										<th>Excluir</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<div>
							<br>
							<form role="form" action="../../model/recebimento/recebimento_item.php?id=<?php echo $id ?>" method="post" >
								<div class="row">
									<div class=" col-md-4 form-group ">
									<?php $query = mysqli_query($conexao,"SELECT CODIGO_PRODUTO, DESCRICAO FROM PRODUTO ORDER BY CODIGO_PRODUTO");?>
										<label>Código Produto</label> <select class="form-control" id="codigoProduto" name="codigoProduto">
											<option>Selecione...</option>
											<?php while($result = mysqli_fetch_array($query)) { ?>
 												<option value="<?php echo $result['CODIGO_PRODUTO'] ?>">
												 <?php echo $result['DESCRICAO'] ?></option>
												 <?php } ?>
										</select>
									</div>
									<div class="col-md-4 form-group">
										
										<label>Quantidade</label> <input type="Number" class="form-control"
											placeholder="Quantidade ..." id="qtd" name="qtd" value="">
									</div>
									<br>
									<div class="col-md-1 ">
										<input type="submit" class="btn btn-block btn-success"
													value="Adicionar" >
									</div>
								</div>
							</form>
							<br>
							<form role="form" action="../../model/recebimento/recebimento_finalizar.php?id=<?php echo $id ?>" method="post" >
								<div class="row">
									<div class="col-md-4 form-group">
										<?php $queryTotal = mysqli_query($conexao,"SELECT 
																				CONCAT('R$ ', format(TOTAL, 2)) AS TOTAL
																			FROM(
																				SELECT
																					SUM(VALOR_QUANTIDADE) AS TOTAL
																				FROM
																				(
																					SELECT 
																						P.VALOR * VI.QUANTIDADE AS VALOR_QUANTIDADE
																						
																					FROM
																						RECEBIMENTO_ITEM VI
																					INNER JOIN
																						PRODUTO P
																					ON
																						P.CODIGO_PRODUTO = VI.CODIGO_PRODUTO
																					WHERE
																						CODIGO_RECEBIMENTO = $id
																				) AS FIM
																			) AS FIM2");
										$resultTotal = mysqli_fetch_array($queryTotal)?>
										<label>Total</label> <input type="text" class="form-control"
											placeholder="Quantidade ..." id="total" name="total" value="<?php echo $resultTotal['TOTAL'] ?>">
									</div>
									<br><br>
									<div class="col-md-1 ">
										<button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-pencil"></span>Cancelar</button>
									</div>
									<div class="col-md-1 ">
										<input type="submit" class="btn btn-block btn-success"
													value="Salvar">
									</div>
								</div>
							</form>
						</div>
						<!-- /.box-body -->

					</div>
				</div>
			</section>
		</div>
		
		<?php
		// chamar rodapé
		include_once '../header/footer.php';
		?>
		
		<!-- Control Sidebar -->
		<?php
		include_once '../header/sidebar.php';
		?>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="../../bootstrap/js/bootstrap.min.js"></script>
	<!-- DataTables -->
	<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="../../plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../../dist/js/demo.js"></script>
	<!-- page script -->
	<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>

</html>
