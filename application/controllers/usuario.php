<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class usuario extends CI_Controller{
    
 
function __construct()
	{
		parent::__construct();
		$this->load->model('usuarioModel');
	}

    public function index(){
		$resultados = $this->usuarioModel->getUsuarioData();
		$this->data['resultados'] = $resultados;
		$this->data['titulo'] = "Nuevo titulo";
		$this->load->view('V_usuario', $this->data);
	}

    function guardarEdicion(){
        $password= $this->input->post('ed_pasword');
        $decod = base64_decode($password);
        $data = array(
            'usuario_nombre' => $this->input->post('ed_nombre'),
            'usuario_apellido' => $this->input->post('ed_apellido'),
            'usuario_correo' => $this->input->post('ed_correo'),
            'usuario_pasword' => sha1($decod),    
            'usuario_estado' => $this->input->post('ed_estado') ,  
            'usuario_rol_id' => $this->input->post('ed_rol')
        );
        $id = $this-> input->post('usuario_id');
        $this->usuarioModel->modificarUsuario($data,$id);
        redirect('usuario/index');
    }

    function eliminarUsuario(){
        $data = array(
            'usuario_estado'=>0
        );
        
        $id = $this-> input->post('mEliminar');
        $this->usuarioModel->eliminarUsuario($id,$data);
        redirect('usuario/index');
    }

}