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
					var_dump($data['alunos']);die;
				?>
				<div class="form-group">
					<div class="col-md-6 offset-md-3">
						<label for="estado">Aluno</label>
						<select name="estado" class="form-control" id="estado" >
							<option>Selecione o Aluno</option>
							<?php foreach(empty($data['alunos']) ? $data : $data['alunos'] as $data): ?>
							<option value="<?= $data['id'] ?>" ><?= $data['nome'] ?></option>
							<?php endforeach;?>
						</select>
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
