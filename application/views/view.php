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
            <h1 class="m-0 text-dark">Detalhes Aluno</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detalhes do Aluno </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section>
		<div class="container">
			 <div class="mt-5">
				 <p><strong>Nome:</strong> <?php echo ($aluno['nomeAluno'] != null ? $aluno['nomeAluno'] : '')?></p>
				 <p><strong>Nome da Mãe:</strong> <?php echo ($aluno['nomeMae'] != null ? $aluno['nomeMae'] : '')?></p>
				 <p><strong>Email</strong> <?php echo ($aluno['email'] != null ? $aluno['email'] : '')?></p>
				 <p><strong>Data Nascimento:</strong> <?php echo ($aluno['dataNascimento'] != null ? date("d-m-Y", strtotime($aluno['dataNascimento'])) : '')?></p>
				 <p><strong>RG:</strong> <?php echo ($aluno['rg'] != null ? $aluno['rg'] : '')?></p>
				 <p><strong>CPF:</strong> <?php echo ($aluno['cpf'] != null ? $aluno['cpf'] : '')?></p>
				 <p><strong>Endereço:</strong>
					<?php 
						echo ($aluno['endereco'] != null ? $aluno['endereco'] : '').',&nbsp;'.
							 ($aluno['numero'] != null ? $aluno['numero'] : '').'&nbsp;'.
							 ($aluno['bairro'] != null ? $aluno['bairro'] : '').'-'.
							 ($aluno['cidade'] != null ? $aluno['cidade'] : '').'/'.
							 ($aluno['estado'] != null ? $aluno['estado'] : '')
						;
					?>
				 </p>
				 <p><strong>Data Cadastro:</strong> <?php echo ($aluno['created_at'] != null ? date("d-m-Y", strtotime($aluno['created_at'])) : '')?></p>
			 </div>
			 <div class="mt-5">
					<a class="btn btn-success" href="<?php echo site_url('alunos/update/'.$aluno['id'])?>">Editar Aluno</a>
			</div>
		</div>
		</section>
		
    <!-- /.content -->	
  </div>
  <!-- /.content-wrapper -->
<?php
	require_once ('footer.php');
?>
