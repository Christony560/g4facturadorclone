<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('loginModel');
    }

    public function index()
    {
        $this->load->view('V_login');
    }

    public function login()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $hashedPassword = sha1($password);

            $user = $this->loginModel->authenticate($email, $password);

            if ($user) {
                // Iniciar sesión y redirigir al dashboard
                $this->session->set_userdata('user', $user->Usuario_correo);
                redirect('dashboard/index');
            } else {
                $login_error['login_error'] = "Credenciales incorrectas. Inténtalo de nuevo.";
                $this->load->view('V_login', $login_error);
            }
        } else {
            $this->load->view('V_login');
        }
    }

    public function newregistro() //Generamos registros para la tabla Usuario y Cliente
    {
        $passcifrado = $this->input->post('password');
        $decod = base64_decode($passcifrado);

        $data = array(
            'usuario_nombre' => $this->input->post('nombre'),
            'usuario_apellido' => $this->input->post('apellido'),
            'usuario_email' => $this->input->post('email'),
            'usuario_password' => sha1($decod),
            'usuario_estado' => $this->input->post('estado'),
            'usuario_rol_id' => $this->input->post('rol')
        );
        
        $usuario_nombre = $this->input->post('nombre');
        $usuario_apellido = $this->input->post('apellido');

    // Insertar un registro en la tabla Cliente con la información del usuario
        $cliente_data = array(
            'Cliente_name' => $usuario_nombre,
            'Cliente_apellido' => $usuario_apellido
        );
        $this->loginModel->insertarCliente($cliente_data);
        $this->loginModel->insertarUsuario($data);

        $registration_success['registration_success'] = "Usuario registrado exitosamente para : " . $this->input->post('email');
        
        // Carga la vista con el mensaje
        $this->load->view('V_login', $registration_success);
       // redirect('login/index');
    }
}
