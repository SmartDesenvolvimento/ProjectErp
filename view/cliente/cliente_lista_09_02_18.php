
<?php
require_once 'controller/cClienteLista.php';
?>

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<div style="overflow-x: auto; height: 100%; width: 100%">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Clientes</h1>
			<ol class="breadcrumb">
				<li><a href="?menu=home"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#">Cliente</a></li>
				<li class="active">Clientes</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">Lista de Clientes</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive">
							<table id="example1" class="table table-bordered table-striped" name="tableCliente">
								<thead>
									<tr>
										<th>Codigo Cliente</th>
										<th>Nome</th>
										<th>Tipo Pessoa</th>
										<th>RG/CNPJ</th>
										<th>CPF/IE</th>
										<th>Estado</th>
										<th>Cidade</th>
										<th>Endereço</th>
										<th>Telefone</th>
										<th>E-mail</th>
										<th>Habilitado</th>
										<th>Data Nascimento</th>
										<th>Data Inclusão</th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php
									//$where = "null";
									//$orderby = "NOME ASC";
									$resultList = $cliente->getList("null", "NOME ASC");
									while($listCliente = $resultList->fetch(PDO::FETCH_OBJ)) { 
								?>
								<tr>
										<td><?php echo $listCliente->CODIGO?> </td>
										<td name="name"><?php echo $listCliente->NOME?> </td>
										<td><?php echo $listCliente->TIPO_PESSOA?> </td>
										<td><?php echo $listCliente->RG_CNPJ?> </td>
										<td><?php echo $listCliente->CPF_IE?> </td>
										<td><?php echo $listCliente->ESTADO?> </td>
										<td><?php echo $listCliente->CIDADE?> </td>
										<td><?php echo $listCliente->ENDERECO?> </td>
										<td><?php echo $listCliente->TELEFONE?> </td>
										<td><?php echo $listCliente->EMAIL?> </td>
										<td><?php echo $listCliente->STATUS?> </td>
										<td><?php echo $listCliente->DATA_NASCIMENTO?> </td>
										<td><?php echo $listCliente->DATA_INCLUSAO?> </td>
										<td>
											<?php
											echo
												'<a style="width: 50px"
												class="btn btn-warning btn-xs" href="?menu=cliente_editar&id='
												. $listCliente->CODIGO.
												 '">Editar </a>';
											?>
										</td>
										<td>
											<button type="button" style="width: 50px" class="btn btn-danger btn-xs" 
												data-toggle="modal" data-target="#exemplomodal"
												>Excluir 
											</button>		
										</td>
									</tr>
								<?php } ;?>	
							</tbody>
								<tfoot>
									<tr>
										<th>Codigo Cliente</th>
										<th>Nome</th>
										<th>Tipo Pessoa</th>
										<th>RG/CNPJ</th>
										<th>CPF/IE</th>
										<th>Estado</th>
										<th>Cidade</th>
										<th>Endereço</th>
										<th>Telefone</th>
										<th>E-mail</th>
										<th>Habilitado</th>
										<th>Data Nascimento</th>
										<th>Data Inclusão</th>
										<th></th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
					<!-- /.box-body -->
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>