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
            <h1 class="m-0 text-dark">
			Cadastrar Novo Aluno
			</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">
			  Cadastrar Novo Aluno
			  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section>
			<div class="container">
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
							<label for="nomeAluno">Nome Completo</label>
							<input type="text" class="form-control" id="nomeAluno" name="nomeAluno" aria-describedby="nomeAluno" 
							value="<?php echo !empty($aluno['nomeAluno']) ? $aluno['nomeAluno'] : ''?>" >   
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="nomeMae">Nome Mãe</label>
							<input type="text" class="form-control" id="nomeMae" name="nomeMae" 
							value="<?php echo !empty($aluno['nomeMae']) ? $aluno['nomeMae'] : '' ?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="rg">RG</label>
							<input type="text" class="form-control" id="rg" name="rg" 
							value="<?php echo !empty($aluno['rg']) ? $aluno['rg'] : ''?>">
						</div>
					</div>
					<div class="form-group">
						<div class="   col-md-6 offset-md-3">
							<label for="cpf">CPF</label>
							<input type="text" class="form-control" id="cpf" name="cpf" 
							value="<?php echo !empty($aluno['cpf']) ? $aluno['cpf'] : ''?>" onkeydown="javascript: fMasc( this, mCPF );">
						</div>
					</div>
					<div class="form-group">
						<div class="   col-md-6 offset-md-3">
							<label for="cpf">Nascimento</label>
							<input type="date" class="form-control" id="dataNascimento" name="dataNascimento" 
							value="<?php echo !empty($aluno['dataNascimento']) ? $aluno['dataNascimento'] : ''?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="cep">Cep</label>
							<input type="text" class="form-control" id="cep" name="cep" 
							value="<?php echo !empty($aluno['cep']) ? $aluno['cep'] : ''?>" onkeydown="javascript: fMasc( this, mCEP );"
							 onblur="pesquisacep(this.value);">
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="endereco">Endereço</label>
							<input type="text" class="form-control" id="endereco" name="endereco" 
							value="<?php echo !empty($aluno['endereco']) ? $aluno['endereco'] : ''?>" >
						</div>
					</div>
					<div class="row offset-md-3">
						<div class="form-group">
							<div class="col-md-12 ">
								<label for="numero">Número</label>
								<input type="text" class="form-control" id="numero" name="numero" 
								value="<?php echo !empty($aluno['numero']) ? $aluno['numero'] : ''?>" >
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 offset-md-4">
								<label for="complemento">Complemento</label>
								<input type="text" class="form-control col-12 ml-1" id="complemento" name="complemento" 
								value="<?php echo !empty($aluno['complemento']) ? $aluno['complemento'] : ''?>" >
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="bairro">Bairro</label>
							<input type="text" class="form-control" id="bairro" name="bairro" 
							value="<?php echo !empty($aluno['bairro']) ? $aluno['bairro'] : ''?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="cidade">Cidade</label>
							<input type="text" class="form-control" id="cidade" name="cidade" 
							value="<?php echo !empty($aluno['cidade']) ? $aluno['cidade'] : ''?>" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="estado">Estado</label>
							<select name="estado" class="form-control" id="estado" >
								<option>Selecione o Estado</option>
								<?php foreach(empty($estados['estados']) ? $estados : $estados['estados'] as $uf): ?>
								<option value="<?= $uf['uf'] ?>" ><?= $uf['nome'] ?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="nomeAluno">Email</label>
							<input type="text" class="form-control" id="email" name="email" aria-describedby="email" 
							value="<?php echo !empty($aluno['email']) ? $aluno['email'] : ''?>">   
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 offset-md-3">
							<label for="foto">Foto Perfil</label>
							<input type="file" name="foto" class="form-control-file input-group-text" id="exampleFormControlFile1" multiple>
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
