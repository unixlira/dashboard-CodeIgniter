<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once ('header.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cadastro de Uniforme</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastro de Uniforme</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section>
		<div class="container mt-5">
			<form action="create" method="POST" enctype="multipart/form-data">
				<?php 
					if(!empty(validation_errors()))
					{
						echo '
						<div class="col-md-6 offset-md-3">
							<div class="alert alert-danger alert-dismissible fade show" role="alert" 
								style="background-color:#f8d7da;border-color:#f5c6cb;color:#721c24;">
								'.validation_errors().'
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</div>';
					}
				?>
				<div class="form-group">
					<div class="col-md-6 offset-md-3">
						<label for="aluno">Aluno</label>
						<select name="aluno" class="form-control" id="aluno" >
							<option>Selecione o Aluno</option>
							<?php foreach(empty($alunos['alunos']) ? $alunos : $alunos['alunos'] as $aluno): ?>
							<option value="<?= $aluno['id']; ?>" ><?= $aluno['nomeAluno'] ?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="row offset-md-3">
					<div class="form-group">
						<div class="col-md-12 ">
							<label for="tamCamisa">Tamanho Camisa</label>
							<input type="text" class="form-control" id="tamCamisa" name="tamCamisa" 
							value=""  placeholder="Ex. P,M,G,GG ou 42,36,48...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12 offset-md-4">
							<label for="tamBlusa">Tamanho Blusa</label>
							<input type="text" class="form-control col-12 ml-1" id="tamBlusa" name="tamBlusa" 
							value=""  placeholder="Ex. P,M,G,GG ou 42,36,48...">
						</div>
					</div>
				</div>
				<div class="row offset-md-3">
					<div class="form-group">
						<div class="col-md-12 ">
							<label for="tamCalca">Tamanho Calça</label>
							<input type="text" class="form-control" id="tamCalca" name="tamCalca" 
							value=""  placeholder="Ex. P,M,G,GG ou 42,36,48...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12 offset-md-4">
							<label for="tamBermuda">Tamanho Bermuda</label>
							<input type="text" class="form-control col-12 ml-1" id="tamBermuda" name="tamBermuda" 
							value=""  placeholder="Ex. P,M,G,GG ou 42,36,48...">
						</div>
					</div>
				</div>
				<div class="form-group mb-2">
					<div class="col-md-6 offset-md-3">
						<button type="submit" class="btn btn-primary btn-block" name="postSubmit">Enviar</button>
					</div>
				</div></br>
			</form>
		</div>
		</section>
		
    <!-- /.content -->	
  </div>
  <!-- /.content-wrapper -->
<?php
	require_once ('footer.php');
?>
