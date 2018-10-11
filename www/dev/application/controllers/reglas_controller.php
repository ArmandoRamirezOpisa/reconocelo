<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Reglas_controller extends CI_Controller {
    
    	public function index()
    	{
    		  
			if ($this->session->userdata('logged_in'))
			{
				$this->load->view('reglas_view');
			}else{
				echo "0";
			}
    		
    	}
    }

?>