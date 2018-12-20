<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mantenimiento extends CI_Controller {
    
    	public function index()
    	{
			
            $this->load->view('home_mantenimiento_view');
            
		}
    }

?>