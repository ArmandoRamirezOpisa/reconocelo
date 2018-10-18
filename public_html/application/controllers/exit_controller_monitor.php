<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Exit_controller_monitor extends CI_Controller {
    	   
        public function __construct()
        {
                parent::__construct();
        }
		
    	public function index()
    	{
            
            $array_items = array('administrador' => '', 'empresa' => '');
            $this->session->unset_userdata($array_items);
            //Manda al inicio de la página, si no hay session se va al login.
            header( 'Location: '.base_url().'/monitor');
            //if ($this->session->userdata('administrador')) {
               // $this->load->view("home_monitor_view");
            //} else {
                //$this->load->view("monitor_Login_view");
            //}

        }
    }
?>