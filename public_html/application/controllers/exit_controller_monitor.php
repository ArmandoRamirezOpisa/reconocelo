<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Exit_controller_monitor extends CI_Controller {
    	   
        public function __construct()
        {
                parent::__construct();
        }
		
    	public function index()
    	{
            
            $data = array('usuario' => $usuario, 'password' => $pasword);
            $array_items = array('usuario' => $usuario, 'password' => $pasword);
            $this->session->unset_userdata($array_items);
            //Manda al inicio de la página, si no hay session se va al login.
            header( 'Location: '.base_url());
        }
    }
?>