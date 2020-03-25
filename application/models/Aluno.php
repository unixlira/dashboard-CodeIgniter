<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Aluno extends CI_Model
{
	//get aluno
	function getAluno($id = null)
	{
		if($id != null){
			$query = $this->db->get_where('alunos', array('id' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('alunos');
			return $query->result_array();
		}
	}

	//create aluno
	function create($data=NULL)
	{
		if($data != NULL){
			
			$insert = $this->db->insert('alunos',$data);
			if($insert){
				return $this->db->insert_id();
			} else{
				return false;
			}
		}
	}

	//update aluno
	function edit($data, $id)
	{
		if( $data != null && $id != null){
			$this->db->update('alunos', $data, array('id' => $id));
			return true ;
		} else{
			return false;
		}
	}

	//delete aluno
	function delete($id)
	{
		if( $id != null ){
			$delete = $this->db->delete('alunos',array('id' => $id));
			return $delete ? true : false;
		}
	}

	function getEstado()
	{
		$query = $this->db->get_where('estado');

		return $query->result_array();
	}

	function getUniformes()
	{
		$query = $this->db->select('*')
						  ->from('alunos a')
						  ->join('uniformes u', 'a.id = u.id_aluno')
						  ->get();

		return $query->result_array();
	}
}
