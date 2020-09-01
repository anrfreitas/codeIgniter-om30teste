<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Teste OM30 - PHP Fullstack</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../styles/admin/assets/css/normalize.css">
    <link rel="stylesheet" href="../styles/admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../styles/admin/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../styles/admin/assets/css/cs-skin-elastic.css">
	<link rel="stylesheet" href="../styles/admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../styles/admin/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../styles/admin/assets/scss/style.css">
    <link href="../styles/admin/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


    <!-- Left Panel -->
	
	<?php include 'menu.php'; ?>
	
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
					
                        <span class="search-trigger" style="cursor:auto;color:transparent;"><i class="fa fa-search"></i></span>
                        

                        <div class="dropdown for-notification">
						
                        </div>

                        <div class="dropdown for-message">
                          
                        </div>
                    </div>
                </div>

                <?php include 'header.php'; ?>
				
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Módulo de Pacientes
						<small><br />Organização e listagem geral de pacientes</small></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Pacientes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
		
			<div class="col col-md-12">
				<button onclick="location.href='paciente_editar'" class="btn btn-primary"><i class="menu-icon fa fa-plus"></i> Inserir novo paciente</button>
			</div>
			
			<div class="col col-md-12 no-padding">&nbsp;</div>
		
			<div class="col-md-12">
				<div class="animated fadeIn">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<strong class="card-title">Lista de pacientes cadastrados</strong>
								</div>
								<div class="card-body">
								  <table id="tabelaPaciente" class="table table-striped table-bordered">
									<thead>
									  <tr>
										<th class="d-none">#</th>
										<th>Nome</th>
										<th>CPF</th>
										<th class="d-none">CNS</th>
										<th>Funções</th>
									  </tr>
									</thead>
									<tbody>
									  <?php foreach($pacientes as $item) { ?>
									  <tr>
									    <td class="d-none"><?= $item->id ?></td>
										<td><?= $item->nome ?></td>
										<td><?= $item->cpf ?></td>
										<td class="d-none"><?= $item->cns ?></td>
										<td>
											
											<div style="display: flex;">
												<form action="paciente_editar" method="post">
													<input type="hidden" id="id" name="id" value="<?= $item->id ?>">
													<button type="submit"><i class="menu-icon fa fa-pencil"></i></button> &nbsp;		<!-- Alterar -->
												</form>
												<button><a href="#" onclick="removerPacienteRowId('<?= $item->id ?>')"><i class="menu-icon fa fa-trash-o"></i></a></button> &nbsp;		<!-- Remover -->
											</div>
											
										</td>

										
									  </tr>
									  <?php } ?>
									</tbody>
								  </table>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .animated -->
			</div>
		
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="../styles/admin/assets/js/vendor/jquery-2.1.4.min.js"></script>
	<script src="../styles/admin/assets/js/popper.min.js"></script>
    
    <script src="../styles/admin/assets/js/plugins.js"></script>
    <script src="../styles/admin/assets/js/main.js"></script>

	<script src="../styles/admin/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../styles/admin/assets/js/lib/data-table/datatables-init.js"></script>

    <script src="../styles/admin/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../styles/admin/assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="../styles/admin/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../styles/admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../styles/admin/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
	
	<script src="../styles/admin/assets/js/vendor/jquery.mask.js"></script>

	<?php include 'ToolBox.php'; ?>

	<script type="text/javascript">
	
        $(document).ready(function() {
          $('#tabelaPaciente').DataTable( {
			"language": {
				"sEmptyTable": "Nenhum registro encontrado",
				"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				"sInfoFiltered": "(Filtrados de _MAX_ registros)",
				"sInfoPostFix": "",
				"sInfoThousands": ".",
				"sLengthMenu": "_MENU_ resultados por página",
				"sLoadingRecords": "Carregando...",
				"sProcessing": "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar",
				"oPaginate": {"sNext": "Próximo", "sPrevious": "Anterior", "sFirst": "Primeiro", "sLast": "Último"},
				"oAria": {"sSortAscending": ": Ordenar colunas de forma ascendente", "sSortDescending": ": Ordenar colunas de forma descendente" }}
			} );
			
        } );

		function removerPacienteRowId(id)
		{
			if (window.confirm("Você realmente quer excluir este paciente?")) 
			{ 
				$.ajax({
                    type: 'POST',
                    url: './excluir_paciente',
                    data: {'id': id},
                    cache: false,
                    success: function() {
						location.reload();
                    }
                });
			}
		}
    </script>

</body>
</html>
