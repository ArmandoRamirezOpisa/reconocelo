<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ini extends CI_Controller {
    
    	public function index()
    	{
    		//var_dump($this->session->userdata);
			if ($this->session->userdata('logged_in'))
			{
				header( 'Location: '.base_url().'devHomeDev');
			}else{
				$this->load->view('login_view');
			}
		}
		
    }

?>