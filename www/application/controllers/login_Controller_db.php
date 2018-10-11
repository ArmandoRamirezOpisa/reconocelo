<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login_Controller_db extends CI_Controller {
    	   
        public function __construct()
        {
                parent::__construct();
               
        }
    
        
      

        public function login(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $usuario = $request->usuario;
        $pasword = $request->password;
        $data = array('usuario' => $usuario, 'password' => $pasword);
        $this->load->model("login_monitor_model");
        $InformacionLogin = $this->login_monitor_model->loadData($data);
        $result = 0;  
        if ($InformacionLogin) {
        $InformacionLoginUsuario = array(
                'administrador' => TRUE,
                'Usuario' => $InformacionLogin[0]["Usuario"],
                'Nombre' => $InformacionLogin[0]["Nombre"],
                'CodPrograma' => $InformacionLogin[0]["CodPrograma"],
                'CodEmpresa' => $InformacionLogin[0]["CodEmpresa"],
                'Personalizado' => $InformacionLogin[0]["Personalizado"]  
            );
            $this->session->set_userdata($InformacionLoginUsuario);
           // var_dump($InformacionLoginUsuario);
            $result = 1;
         
     
        } else {
             $result = 0;     
        }
        echo $result;
    }
        
        
        }