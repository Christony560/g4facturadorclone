<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarioModel extends CI_Model{

function __construct()
	{
		parent::__construct();
	}

    public function getUsuarioData(){
		$this->db->select('usuario_id,usuario_nombre,usuario_apellido,usuario_email,usuario_password,usuario_estado,usuario_rol_id');
		$this->db->from('usuario');
	    $this->db->where('usuario_estado = 1'); 
 		$query = $this->db->get();
		return $query->result();
	}
	public function modificarUsuario($data, $id) {
		$this->db->where('id_usuario', $id);
		$this->db->update('usuario', $data);
	
	}
	public function eliminarUsuario($id,$data) {
		$this->db->where('usuario_id', $id);
		$this->db->update('usuario', $data);
	}
	
}