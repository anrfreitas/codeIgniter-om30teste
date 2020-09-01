<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_Model extends CI_Model {
	
	public function inserir($data)
	{
		$this->load->database();
		$this->db->insert('paciente', $data);
	}

	public function alterar($data, $id)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->update('paciente', $data);
	}
	
	public function deletar($id)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('paciente');
	}
	
	public function obter($id)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$query = $this->db->get('paciente');
		return $query->result();
	}
	
	public function listar()
	{
		$this->load->database();
		
		$this->db->select('P.*');    
		$this->db->from('paciente P');
		
		$query = $this->db->get();
		return $query->result();
	}
}
