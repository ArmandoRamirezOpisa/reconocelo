<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mantenimiento extends CI_Controller {
    
    	public function index()
    	{
			
            if ($this->session->userdata('administrador')) {
                header( 'Location: '.base_url().'mantenimiento/home');
            } else {
                $this->load->view('home_mantenimiento_view');
            }

            
        }
        
        public function login(){

            $loginMantenimientoData = array("usuario"=>$_POST['usuario'],"password"=>$_POST['password']);
            $this->load->model("mantenimiento_model");
            $InformacionLogin = $this->mantenimiento_model->login($loginMantenimientoData);
            if ($InformacionLogin){
                $InformacionLoginUsuario = array(
                    'administrador' => TRUE,
                    'CodEmpresa' => $InformacionLogin[0]["CodEmpresa"],
                    'CodPrograma' => $InformacionLogin[0]["CodPrograma"],
                    'empresa' => $InformacionLogin[0]["empresa"]
                );
                $this->session->set_userdata($InformacionLoginUsuario);
                $this->output->set_output(json_encode(true));//si encuantra al usuario regresa true
            }else{
                $this->output->set_output(json_encode(false));//si no encuentra al usuario regresa false
            }

        }

        public function home(){

            $this->load->view('mantenimiento_view');
            
        }

    }

?>