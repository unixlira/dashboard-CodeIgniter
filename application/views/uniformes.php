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
            <h1 class="m-0 text-dark">Uniformes Cadastrados</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Listagem de Uniformes</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section>
		<div class="container">
			<?php if(!empty($success_msg)) {?>
				<div class="col-sx-12">
					<div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#d4edda;border-color:#c3e6cb;color:#155724;">
						<?php echo $success_msg; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			<?php }elseif(!empty($error_msg)) {?>
				<div class="col-sx-12">
					<div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color:#f8d7da;border-color:#f5c6cb;color:#721c24;">
						<?php echo $error_msg; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			<?php } ?>
			<br>
			<table class="table table-stripedmt-5">
				<thead>
					<tr>
					<th scope="col">Aluno</th>
					<th scope="col">Tamanho Camisa</th>
					<th scope="col">Tamanho Blusa</th>
					<th scope="col">Tamanho Calça</th>
					<th scope="col">Tamanho Bermuda</th>
					<th scope="col">Status Entrega</th>
					<th scope="col">Data Cadastro</th>
					<!-- <th scope="col">Ações</th> -->
					</tr>
				</thead>
				<tbody>
					<?php if($uniformes != null ): foreach($uniformes as $uniform): ?>
						<tr>
							<td><?php echo $uniform['nomeAluno']?></td>
							<td><?php echo $uniform['tamCamisa']?></th>
							<td><?php echo $uniform['tamBlusa']?></td>
							<td><?php echo $uniform['tamCalca']?></td>
							<td><?php echo $uniform['tamBermuda']?></td>
							<td><?php echo ($uniform['status'] == 0) ? 'Não Entregue' : 'Entregue' ?></td>
							<td><?php echo date("d-m-Y", strtotime($uniform['created_at']))?></td>
							<!-- <td>
							<a class="btn btn-secondary" href="<?php echo site_url('uniformes/update/'.$uniform['id']);?>">
								<svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
									<path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
								</svg>
							</a>
							<a class="btn btn-danger" href="<?php echo site_url('uniformes/delete/'.$uniform['id']);?>">
								<svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
									<path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
								</svg>
							</a>
							</td> -->
						</tr>
					<?php endforeach; endif;?>
				</tbody>
			</table>
		</div>
    </section>
    <!-- /.content -->	
  </div>
  <!-- /.content-wrapper -->
<?php
	require_once ('footer.php');
?>
