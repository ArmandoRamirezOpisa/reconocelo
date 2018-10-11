<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ini extends CI_Controller {
    
    	public function index()
    	{
    		//var_dump($this->session->userdata);
			if ($this->session->userdata('logged_in'))
			{
				$this->load->view('home_view');
			}else{
				$this->load->view('login_view');
			}
    	}
    }

?>