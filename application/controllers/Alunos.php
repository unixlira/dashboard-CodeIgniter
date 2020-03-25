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
		$date = new \DateTime('now');
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
				'created_at'     => $date->format('Y-m-d H:i:s'),
				'updated_at'     => $date->format('Y-m-d H:i:s'),
			];

			
			//check validação
			if($this->form_validation->run() == true){
				$insert = $this->aluno->create($postData);

				if($insert){
					$this->session->set_userdata('success_msg','Aluno Cadastrado com Sucesso!');
					redirect('/alunos');
				}else{
					$data['error_msg'] = 'Algo deu errado, contate o Administrador!';
				}
			}
		}

		$data = ['aluno' => [], 'estado' => [], 'cidade' => []];

		$aluno['aluno'] = $postData;
		$data['action'] = 'Create';
		$data['estados'] = $this->aluno->getEstado();


		$this->load->view('create', $data);
	}

	function update($id)
	{
		$data = [];
		$date = new \DateTime('now');
		$postData = $this->aluno->getAluno($id);
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
				'updated_at'     => $date->format('Y-m-d H:i:s')
			];

			//check validação
			if($this->form_validation->run() == true){
				$update = $this->aluno->edit($postData, $id);

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
}
