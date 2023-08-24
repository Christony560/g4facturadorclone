<?php
// Archivo: UserModel.php

defined('BASEPATH') OR exit('No direct script access allowed');

class loginModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function authenticate($email, $password) {
        $this->db->where('usuario_email', $email);
        $this->db->where('usuario_password', sha1($password)); // Aplicamos el cifrado SHA-1 a la contraseña
        $userregistrado = $this->db->get('usuario')->row();
        return $userregistrado;
    }
    public function emailExists($email) {
        $this->db->where('usuario_email', $email);
        $query = $this->db->get('usuario');
        return $query->num_rows() > 0;
    }
    
    public function insertarUsuario($data){
        $this->db->insert('usuario',$data);
    }

    public function insertarCliente($cliente_data){
        $this->db->insert('cliente',$cliente_data);
    }
    

}
