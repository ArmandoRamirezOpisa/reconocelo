<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class CofInfo_controller extends CI_Controller {
    
        public function info() {
            $this->load->view('confInfo_View');
        }
          
        public function cambiarPassword(){
            $this->load->model("login_model");
            $loginMantenimientoData = array("passwordNew"=>$_POST['passwordNew']);
            $updatePassword = $this->login_model->updatePassword($loginMantenimientoData);
            if($updatePassword){
                $this->output->set_output(json_encode($updatePassword));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }  
    }