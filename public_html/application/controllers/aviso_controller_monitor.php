<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Aviso_controller_monitor extends CI_Controller {
    
    	public function index()
    	{
            $this->load->view('aviso_view_monitor');
    	}
    }

?>