<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('aluno');
	}

	function index()
	{
		 $data = [];

		 //get session messages
		 if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		 }
		 if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		 }

		 $data['alunos'] = $this->aluno->getAluno();

		 $this->load->view('/home',$data);
	}

	function view($id)
	{
		$data = [];

		if($id != null){
			$data['aluno'] = $this->aluno->getAluno($id);
			$this->load->view('/view',$data);
		}else{
			redirect('/aluno');
		}
	}

	function create()
	{
		$data = [];
		$postData = [];
		date_default_timezone_set('America/Sao_Paulo');
		$this->load->helper('form');
		$this->load->library('form_validation');


		if($this->input->post('nomeAluno')){
			//validação
			$this->form_validation->set_rules('nomeAluno','Nome Aluno','required');
			$this->form_validation->set_rules('nomeMae','Nome Mãe','required');
			$this->form_validation->set_rules('dataNascimento','Data Nascimento','required');
			$this->form_validation->set_rules('cpf','CPF','required');
			$this->form_validation->set_rules('cep','Cep','required');
			$this->form_validation->set_rules('endereco','Endereco','required');
			$this->form_validation->set_rules('numero','Numero','required');
			$this->form_validation->set_rules('bairro','Bairro','required');
			$this->form_validation->set_rules('cidade','Cidade','required');
			$this->form_validation->set_rules('estado','Estado','required');


			$postData = [
				'nomeAluno'      => $this->input->post('nomeAluno'),
				'nomeMae'        => $this->input->post('nomeMae'),
				'dataNascimento' => $this->input->post('dataNascimento'),
				'foto'           => '',
				'ra'			 => substr(md5($this->input->post('cpf')), 7, 16),
				'rg'             => $this->input->post('rg'),
				'cpf'            => $this->input->post('cpf'),
				'cep'            => $this->input->post('cep'),
				'endereco'       => $this->input->post('endereco'),
				'numero'         => $this->input->post('numero'),
				'complemento'    => $this->input->post('complemento'),
				'bairro'         => $this->input->post('bairro'),
				'cidade'         => $this->input->post('cidade'),
				'estado'         => $this->input->post('estado'),
				'email'          => $this->input->post('email'),
				'created_at'     => date('Y-m-d H:i:s'),
				'updated_at'     => date('Y-m-d H:i:s')
			];

			
			//check validação
			if($this->form_validation->run() == true){

				$config['upload_path']          = 'images';
                $config['allowed_types']        = 'gif|jpg|png';

				$this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')){
					$errors = $this->upload->display_errors();
					$this->session->set_flashdata('create', $errors);
					redirect('/alunos');
                }else{
					$foto = $this->upload->data();
					$filename = $foto['file_name'];
					$postData['foto'] = $config['upload_path'].$filename;
                }

				$insert = $this->aluno->create($postData);

				if($insert){
					$this->session->set_userdata('success_msg','Aluno Cadastrado com Sucesso!');
					redirect('/alunos');
				}else{
					$data['error_msg'] = 'Algo deu errado, contate o Administrador!';
				}
			}
		}

		$data = ['aluno' => [], 'estado' => []];

		$aluno['aluno'] = $postData;
		$data['action'] = 'Create';
		$data['estados'] = $this->aluno->getEstado();


		$this->load->view('create', $data);
	}

	function update($id)
	{
		$data = [];
		$postData = $this->aluno->getAluno($id);
		date_default_timezone_set('America/Sao_Paulo');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		if($this->input->post('nomeAluno')){
			//validação
			$this->form_validation->set_rules('nomeAluno','Nome Aluno','required');
			$this->form_validation->set_rules('nomeMae','Nome Mãe','required');
			$this->form_validation->set_rules('dataNascimento','Data Nascimento','required');
			$this->form_validation->set_rules('cpf','CPF','required');
			$this->form_validation->set_rules('cep','Cep','required');
			$this->form_validation->set_rules('endereco','Endereco','required');
			$this->form_validation->set_rules('numero','Numero','required');
			$this->form_validation->set_rules('bairro','Bairro','required');
			$this->form_validation->set_rules('cidade','Cidade','required');
			$this->form_validation->set_rules('estado','Estado','required');

			$postData = [
				'nomeAluno'      => $this->input->post('nomeAluno'),
				'nomeMae'        => $this->input->post('nomeMae'),
				'dataNascimento' => $this->input->post('dataNascimento'),
				'rg'             => $this->input->post('rg'),
				'cpf'            => $this->input->post('cpf'),
				'cep'            => $this->input->post('cep'),
				'endereco'       => $this->input->post('endereco'),
				'numero'         => $this->input->post('numero'),
				'complemento'    => $this->input->post('complemento'),
				'bairro'         => $this->input->post('bairro'),
				'cidade'         => $this->input->post('cidade'),
				'estado'         => $this->input->post('estado'),
				'email'          => $this->input->post('email'),
				'updated_at'     => date('Y-m-d H:i:s')
			];

			//check validação
			if($this->form_validation->run() == true){
				$config['upload_path']          = 'images';
                $config['allowed_types']        = 'gif|jpg|png';

				$this->upload->initialize($config);

                if ($this->upload->do_upload('foto')){
					$foto = $this->upload->data();
					$filename = $foto['file_name'];
					$postData['foto'] = $filename;
                }
				
				$idAluno = $this->input->post('id');

				$update = $this->aluno->edit($postData, (int)$idAluno);

				if($update){
					$this->session->set_userdata('success_msg','Aluno atualizado com Sucesso!');
					redirect('/alunos');
				}else{
					$data['error_msg'] = 'Algo deu errado, contate o Administrador!';
				}
			}
		}


		$aluno['aluno'] = $postData;
		$data['action'] = 'Update';
		$data['estados'] = $this->aluno->getEstado();

		$this->load->view('edit', array('aluno'=>$postData,'estados' => $data));
	}

	function delete($id)
	{
		$delete = $this->aluno->delete($id);

		if($delete){
			$this->session->set_userdata('success_msg','Aluno excluído com Sucesso!');
			redirect('alunos');
		}else{
			$data['error_msg'] = 'Algo deu errado, contate o Administrador!';
		}
		redirect('/alunos');
	}

	function exportCsv()
	{
	
	 $file_name = 'alunos'.date('Ymd').'.xlsx'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$file_name"); 
		header("Content-Type: application/xlsx;");
	  
		$data['alunos'] = $this->aluno->getAluno();

		$file = fopen('php://output', 'w');

		$headers = [];
		
		foreach ($data['alunos'][0] as $key => $value) {
			array_push($headers, ucfirst($key));
		}
		
		fputcsv($file, $headers);
		foreach ($data['alunos'] as $key => $value)
		{ 
		  fputcsv($file, $value); 
		}
		fclose($file); 
		exit; 
	}

	function uniformes()
	{
		$data = ['alunos' => [], 'uniformes' => []];

		$data['alunos'] = $this->aluno->getAluno();
		$data['uniformes'] = $this->aluno->getUniformes();

		$this->load->view('uniformes', array('alunos'=>$data['alunos'],'uniformes' => $data['uniformes']));
	}

	function createUniform()
	{
		$data = [];
		$postData = [];
		date_default_timezone_set('America/Sao_Paulo');
		$this->load->helper('form');
		$this->load->library('form_validation');

		if($this->input->post('aluno')){

			$postData = [
				'id_aluno'   => $this->input->post('aluno'),
				'tamCamisa'  => $this->input->post('tamCamisa'),
				'tamBlusa'   => $this->input->post('tamBlusa'),
				'tamCalca'   => $this->input->post('tamCalca'),
				'tamBermuda' => $this->input->post('tamBermuda'),
				'status'     => 2,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];

			
			$insert = $this->aluno->createUniforme($postData);

			if($insert){
				$this->session->set_userdata('success_msg','Aluno Cadastrado com Sucesso!');
				redirect('/uniformes');
			}else{
				$data['error_msg'] = 'Algo deu errado, contate o Administrador!';
			}
		}

		$data = ['aluno' => [], 'estado' => []];

		$aluno['aluno'] = $postData;
		$data['action'] = 'Create';
		$data['alunos'] = $this->aluno->getAluno();
		$data['uniformes'] = $this->aluno->getUniformes();


		$this->load->view('uniCreate', $data);
	}

	function updateUniforme($id)
	{

		$data = [];
		$postData = [];
		date_default_timezone_set('America/Sao_Paulo');

		if($this->input->post('aluno')){

			$postData = [
				'id_aluno'   => $this->input->post('aluno'),
				'tamCamisa'  => $this->input->post('tamCamisa'),
				'tamBlusa'   => $this->input->post('tamBlusa'),
				'tamCalca'   => $this->input->post('tamCalca'),
				'tamBermuda' => $this->input->post('tamBermuda'),
				'status'     => 2,
				'updated_at' => date('Y-m-d H:i:s')
			];

			$update = $this->aluno->editUniforme($postData, $id);

			if($update){
				$this->session->set_userdata('success_msg','Aluno Cadastrado com Sucesso!');
				redirect('/uniformes');
			}else{
				$data['error_msg'] = 'Algo deu errado, contate o Administrador!';
			}
		}

		$data = ['aluno' => [], 'uniformes' => []];

		$aluno['aluno'] = $postData;
		$data['action'] = 'Create';
		$data['alunos'] = $this->aluno->getAluno();
		$data['uniformes'] = $this->aluno->getUniformes();


		$this->load->view('uniEdit', $data);
	}

	function deleteUniforme($id)
	{
		$delete = $this->aluno->delUniforme($id);

		if($delete){
			$this->session->set_userdata('success_msg','Aluno excluído com Sucesso!');
			redirect('uniformes');
		}else{
			$data['error_msg'] = 'Algo deu errado, contate o Administrador!';
		}
		redirect('/uniformes');
	}

}
