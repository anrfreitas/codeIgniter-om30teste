<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		redirect('paciente/pacientes');
	}

	public function pacientes()
	{
		$this->load->model('Paciente_Model');
		$data['pacientes'] = $this->Paciente_Model->listar();
		$this->load->view('admin/paciente_listar', $data);
	}

	public function paciente_editar()
	{
		$this->load->model('Paciente_Model');

		if($this->input->post('id'))
		{
			$this->load->model('Paciente_Model');
			$paciente = $this->Paciente_Model->obter($this->input->post('id'))[0];
			$paciente = array(
				'id' 						=> $paciente->id,
				'nome'   					=> $paciente->nome,
				'nome_mae'   				=> $paciente->nome_mae,
				'dtanasc'   				=> $paciente->dtanasc,
				'cpf'  						=> $paciente->cpf,
				'cns'  						=> $paciente->cns,
				'endereco'  				=> $paciente->endereco,
				'cep'  						=> $paciente->cep,
				'imagem_id'  				=> $paciente->imagem_id,
			);
		}
		else
		{
			$paciente = array(
				'id' 						=> '',
				'nome'   					=> '',
				'nome_mae'   				=> '',
				'dtanasc'   				=> '',
				'cpf'  						=> '',
				'cns'  						=> '',
				'cep'  						=> '',
				'endereco'  				=> '',
				'imagem_id'  				=> '',
			);
		}

		$data['paciente'] = $paciente;

		$this->load->view('admin/paciente_editar', $data);
	}

	public function salvar_paciente()
	{
		$this->load->model('Paciente_Model');

		$data = array(
			'nome'   					=> $this->input->post('nome'),
			'nome_mae'   				=> $this->input->post('nome_mae'),
			'dtanasc'   				=> $this->input->post('dtanasc'),
			'cpf'  						=> $this->input->post('cpf'),
			'cns'  						=> $this->input->post('cns'),
			'cep'  						=> $this->input->post('cep'),
			'endereco'  				=> $this->input->post('endereco'),
		);
		
		if($this->input->post('imagem_id') != '') $data['imagem_id'] = $this->input->post('imagem_id');

		if($this->input->post('id') != '')
			$this->Paciente_Model->alterar($data, $this->input->post('id'));

		else
			$this->Paciente_Model->inserir($data);
	}

	public function excluir_paciente()
	{
		$this->load->model('Paciente_Model');

		/* Remove o vinculo de imagem do paciente */
		$pacienteData = $this->Paciente_Model->obter($this->input->post('id'));
		$this->deletar_imagem($pacienteData[0]->imagem_id);

		/* Finalmente deleta o paciente da tabela */
		$this->Paciente_Model->deletar($this->input->post('id'));
	}

	public function deletar_imagem($Imagem_id)
	{
		$this->load->model('Imagem_Model');
		$resultado = $this->Imagem_Model->obter($Imagem_id);
		$nomeImagem = $resultado[0]->nome;
		
		/* Remove imagem do banco de dados */
		$this->Imagem_Model->deletar($resultado[0]->id);
		
		/* Remove imagem da pasta upload */
		$this->load->helper("file");
		@unlink("././upload/".$nomeImagem);
	}

	public function deleteImage()
	{
		$this->load->model('Imagem_Model');
		$resultado = $this->Imagem_Model->obter($this->input->post('id'));
		$nomeImagem = $resultado[0]->nome;
		
		/* Remove imagem do banco de dados */
		$this->Imagem_Model->deletar($resultado[0]->id);
		
		/* Remove imagem da pasta upload */
		$this->load->helper("file");
		@unlink("././upload/".$nomeImagem);
	}

	public function uploadImage()
	{
		$Imagem_id = $_FILES['Imagem_id'];
		$arquivo = $Imagem_id['name'];
		$extensao = pathinfo($arquivo, PATHINFO_EXTENSION);

		//Timestamp como nome da imagem (para evitar repetição do nome)
		$date = new DateTime();
		$timestamp = $date->getTimestamp();
		$novo_nome = $timestamp.'.'.$extensao;

		$configuracao = array(
			'upload_path'   => '././upload/',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'file_name'     => $timestamp,
			'max_size'      => '5000'
		); 
		$this->load->library('upload');
		$this->upload->initialize($configuracao);
		
		if ($this->upload->do_upload('Imagem_id'))
		{
			$data = array(
				'nome' => $novo_nome,
			);
		
			$this->load->model('Imagem_Model');
			$id = $this->Imagem_Model->inserir($data);
			
			echo $id; //'Arquivo '.$novo_nome.' salvo com sucesso.';
		}
		else
		{
			setcookie('SysError', $this->upload->display_errors(), time() + (86400 * 1), "/"); 
        	echo '0';
		}
	}

	public function getImagemDados()
	{
		$this->load->model('Imagem_Model');
		$resultado = $this->Imagem_Model->obter($this->input->post('id'));
		echo json_encode($resultado[0]);
	}

	

}