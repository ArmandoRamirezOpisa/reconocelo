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
        
        public function updatePasswordReconocelo(){
            $this->load->model("login_model");
            $updatePasswordReconoceloData = array(
                "passwordOld"=>$_POST['passwordOld'],
                "passwordNew"=>$_POST['passwordNew']
            );
            $checkPasswordReconocelo = $this->login_model->checkPasswordReconocelo();
            if($checkPasswordReconocelo[0]['pwd'] == $updatePasswordReconoceloData['passwordOld']){
                $updatePasswordReconocelo = $this->login_model->updatePasswordReconocelo($updatePasswordReconoceloData);
                if($updatePasswordReconocelo){
                    $this->output->set_output(json_encode($updatePasswordReconocelo));
                }else{
                    $this->output->set_output(json_encode(0));
                }
            }else{
                $this->output->set_output(json_encode(0));
            }
        }
    }