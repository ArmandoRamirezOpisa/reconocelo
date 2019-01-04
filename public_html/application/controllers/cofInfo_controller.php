<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class CofInfo_controller extends CI_Controller {
    
        public function info() {
    
            $this->load->view('confInfo_View');
            //  $this->load->view('cofInfo_controller');
            //  $this->load->view('home_view');
        }
          
        public function cambiarCorreo(){
            $data = $_POST['correo'];   
            $this->output->set_output(json_encode($data));    
            //  echo"ok";
        }  
    }