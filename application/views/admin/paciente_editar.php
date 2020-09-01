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
						<small><br />Registro e alteração de informações de pacientes</small></h1>
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
		
		<div class="col-md-6">
			<section class="card">
				<div class="card-header">
					<h4>Ficha de informações do paciente</h4>
				</div>
				<div class="card-body text-secondary">
				
					<!-- Conteudo do site aqui -->
					<div class="row">

                            <input type='hidden' id='id' name='id' value="<?php echo $paciente['id'] ?>" />
                            
                            <!-- Imagem -->
                            <div class="col-md-6">
                                
                                <div class="col-md-12 no-padding">
                                    <p style="color:black;"><b>Foto do paciente</b></p>
                                </div>
                                
                                <div class="col-md-4">
                                
                                    <input type="hidden" id="TMPImagem_id" name="TMPImagem_id" value="<?php echo $paciente['imagem_id'] ?>" />
                                    
                                    <a id="TMPImagem_asrc" name="TMPImagem_asrc" target="_blank" href="">
                                        <img id="TMPImagem_src" name="TMPImagem_src" src="" height="75" style="height:75px;"></img>
                                    </a>
                                    
                                </div>
                                
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="Imagem_id" class=" form-control-label"><b>Imagem</b>: Selecione um imagem (Opcional)</label>
                                        <input type="file" id="Imagem_id" name="Imagem_id" class="form-control-file">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- FIM: Imagem -->
                            
                            <div class="col col-md-12 no-padding"><hr></div>
							
							<div class="col-md-12">
							
								<div class="form-group">
									<label for="nome" class=" form-control-label">Nome do paciente*</label>
									<input type="text" id="nome" name="nome" value="<?php echo $paciente['nome'] ?>" placeholder="Nome do paciente (obrigatório)" class="form-control">
								</div>
							
                            </div>
                            
                            <div class="col-md-12">
							
								<div class="form-group">
									<label for="nome_mae" class=" form-control-label">Nome da mãe*</label>
									<input type="text" id="nome_mae" name="nome_mae" value="<?php echo $paciente['nome_mae'] ?>" placeholder="Nome da mãe (obrigatório)" class="form-control">
								</div>
							
                            </div>
                            
                            <div class="col-md-6">
							
								<div class="form-group">
									<label for="datanasc" class=" form-control-label">Data de nascimento*</label>
									<input type="text" id="dtanasc" name="dtanasc" value="<?php if($paciente['dtanasc'] != '') echo date_format(date_create($paciente['dtanasc']), 'd/m/Y') ?>" placeholder="Data de nascimento (obrigatório)" class="form-control" data-mask="00/00/0000" data-mask-reverse="true">
								</div>
							
                            </div>
                            
                            <div class="col-md-6">
							
								<div class="form-group">
									<label for="cpf" class=" form-control-label">CPF*</label>
									<input type="text" id="cpf" name="cpf" value="<?php echo $paciente['cpf'] ?>" placeholder="CPF (obrigatório)" class="form-control" data-mask="000.000.000-00" data-mask-reverse="true">
								</div>
							
                            </div>

                            <div class="col-md-6">
							
								<div class="form-group">
									<label for="cns" class=" form-control-label">CNS*</label>
									<input type="text" id="cns" name="cns" value="<?php echo $paciente['cns'] ?>" placeholder="CNS (obrigatório)" class="form-control">
								</div>
							
							</div>
							
							<div class="col-md-6">
							
								<div class="form-group">
									<label for="cep" class=" form-control-label">CEP</label>
									<input type="text" id="cep" name="cep" value="<?php echo $paciente['cep'] ?>" placeholder="CEP (opcional)" onblur="buscaCEP()" class="form-control" data-mask="00000-000" data-mask-reverse="true">
								</div>
							
                            </div>
                            
                            <div class="col-md-12">
							
								<div class="form-group">
									<label for="endereco" class=" form-control-label">Endereço completo*</label>
									<input type="text" id="endereco" name="endereco" value="<?php echo $paciente['endereco'] ?>" placeholder="Endereço completo (obrigatório)" class="form-control">
								</div>
							
                            </div>
						
					</div>
				
				</div>
				<div class="card-footer">
					<button type="submit" onclick="salvarPaciente()" class="btn btn-primary btn-sm">
						<i class="fa fa-dot-circle-o"></i> Salvar
					</button>
				</div>
			</section>
		</div>
		
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="../styles/admin/assets/js/vendor/jquery-2.1.4.min.js"></script>
	<script src="../styles/admin/assets/js/popper.min.js"></script>
    
    <script src="../styles/admin/assets/js/plugins.js"></script>
    <script src="../styles/admin/assets/js/main.js"></script>


    <script src="../styles/admin/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../styles/admin/assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="../styles/admin/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../styles/admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../styles/admin/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
	
	<script src="../styles/admin/assets/js/vendor/jquery.mask.js"></script>
    
    <?php include 'ToolBox.php'; ?>

    <script>
		$(document).ready(function() {

			carregarImagem(<?php echo $paciente['imagem_id'] ?>);
        });

		function carregarImagem(id)
		{
			var imagem_id = id;
			if(imagem_id != '' && imagem_id != 0 && imagem_id != null)
			{
				$.ajax({
						type: 'POST',
						url: './getImagemDados',
						data: {'id': imagem_id},  
						success: function(result) {
						  
							try
							{
								var obj = jQuery.parseJSON(result);	
								
								$('#TMPImagem_src').prop('src', '../upload/' + obj.nome);
								$('#TMPImagem_asrc').prop('href', '../upload/' + obj.nome);
							}
							catch(err) {}
						
						}
					});
			}
		}

		function validarCPF(cpf) {	
			cpf = cpf.replace(/[^\d]+/g,'');	
			if(cpf == '') return false;	
			// Elimina CPFs invalidos conhecidos	
			if (cpf.length != 11 || 
				cpf == "00000000000" || 
				cpf == "11111111111" || 
				cpf == "22222222222" || 
				cpf == "33333333333" || 
				cpf == "44444444444" || 
				cpf == "55555555555" || 
				cpf == "66666666666" || 
				cpf == "77777777777" || 
				cpf == "88888888888" || 
				cpf == "99999999999")
					return false;		
			// Valida 1o digito	
			add = 0;	
			for (i=0; i < 9; i ++)		
				add += parseInt(cpf.charAt(i)) * (10 - i);	
				rev = 11 - (add % 11);	
				if (rev == 10 || rev == 11)		
					rev = 0;	
				if (rev != parseInt(cpf.charAt(9)))		
					return false;		
			// Valida 2o digito	
			add = 0;	
			for (i = 0; i < 10; i ++)		
				add += parseInt(cpf.charAt(i)) * (11 - i);	
			rev = 11 - (add % 11);	
			if (rev == 10 || rev == 11)	
				rev = 0;	
			if (rev != parseInt(cpf.charAt(10)))
				return false;		
			return true;   
		}

		function validarDados()
		{
			var id 				= $("#id").val();
			var nome  			= $("#nome").val();
			var nome_mae  		= $("#nome_mae").val();
			var dtanasc  		= $("#dtanasc").val();
			var cpf  			= $("#cpf").val();
			var cep  			= $("#cep").val();
			var cns  			= $("#cns").val();
			var endereco  		= $("#endereco").val();

			var erros = 0;

			if(nome == null || nome == '' || nome == ' ')
			{
				erros++;
			}

			if(nome_mae == null || nome_mae == '' || nome_mae == ' ')
			{
				erros++;
			}

			if(cpf == null || cpf == '' || cpf == ' ')
			{
				erros++;
			}

			if(cns == null || cns == '' || cns == ' ')
			{
				erros++;
			}

			if(endereco == null || endereco == '' || endereco == ' ')
			{
				erros++;
			}

			if(erros > 0) {
				MessageBox('Há ' + erros + ' erros de preenchimento no formulário. Por favor, revise o preenchimento. Lembrando que os campos com asterisco (*) são de preenchimento obrigatório!');
				return false;
			}

			if(!validarCPF(cpf.replace('-', ''))) { MessageBox('O CPF informado é inválido!'); return false; } 

			if(isValidDate(dtanasc) == false || dtanasc == '' || dtanasc == ' ') 
			{ 
				MessageBox('A data de vencimento informado está inválida. Por favor, verifique!');
				return false; 
			}
			
			return true;
		}
		
		function salvarPaciente()
		{
			var id 				= $("#id").val();
			var nome  			= $("#nome").val();
			var nome_mae  		= $("#nome_mae").val();
			var dtanasc  		= formatarDataInversa($("#dtanasc").val());
			var cpf  			= $("#cpf").val();
			var cns  			= $("#cns").val();
			var cep  			= $("#cep").val();
			var endereco  		= $("#endereco").val();	
			
			if(validarDados() == false) return;
			
			var TMPImagem_id 		= $('#TMPImagem_id').val();
			
			/* Remove a ação do botão, alguns pessoas são impacientes e clicam mais de uma vez :) */
			$('#btnSalvar').prop('onclick', '');
			
			if($('#Imagem_id').prop('files').length > 0)
			{
				//Upload de arquivo
				var streamData = new FormData();
				streamData.append('Imagem_id', $('#Imagem_id').prop('files')[0]);

				$.ajax({
					url: './uploadImage',
					data: streamData,
					processData: false,
					contentType: false,
					type: 'POST',
					success: function (idOutput) {
						if(idOutput == '0') 
						{	
							MessageBox("Ocorreu um erro ao salvar. O arquivo deve ser do tipo JPG, PNG ou GIF e conter no máximo 5 Mb\n\nSystem Error: " + decodeURIComponent(readCookie('SysError')).split('+').join(' ').split('<p>').join('').split('</p>').join('') );
							
							Console.log("Você deve dar permissão de escrita para o diretório 'upload' da raiz da instalação, ok?!");
						}
						else //Troca todos as informações incluindo a imagem
						{
							//Deleta a imagem T:Imagem e da pasta upload
							excluirImagem(TMPImagem_id);
            				
							$.ajax({
								type: 'POST',
								url: './salvar_paciente',
								data: {
									'id' 				: id, 
									'nome'				: nome,
									'nome_mae'			: nome_mae,
									'dtanasc'			: dtanasc,
									'cpf'				: cpf,
									'cns'				: cns,
									'cep'				: cep,
									'endereco'			: endereco,
									'imagem_id' 		: idOutput,
								},
								cache: false,
								success: function() {
									alert("Paciente foi salvo com sucesso!");
									location.href="./pacientes";
								}
							});
				    	}
					}
				});
			}
			
			else
			{
				$.ajax({
					type: 'POST',
					url: './salvar_paciente',
					data: {
						'id' 				: id, 
						'nome'				: nome,
						'nome_mae'			: nome_mae,
						'dtanasc'			: dtanasc,
						'cpf'				: cpf,
						'cns'				: cns,
						'cep'				: cep,
						'endereco'			: endereco,
						'imagem_id' 		: TMPImagem_id,
					},
					cache: false,
					success: function() {
						alert("Paciente foi salvo com sucesso!");
						location.href="./pacientes";
					}
				});				
			}
		}
		
		
    </script>

</body>
</html>
