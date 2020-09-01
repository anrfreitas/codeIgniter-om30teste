<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imagem_Model extends CI_Model {

	public function inserir($data)
	{
		$this->load->database();
		$this->db->insert('imagem', $data);
		return $this->db->insert_id(); 
	}
	
	public function deletar($id)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$this->db->delete('imagem');
	}
	
	public function obter($id)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$query = $this->db->get('imagem');
		return $query->result();
	}
}
