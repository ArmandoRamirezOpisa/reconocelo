<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ini extends CI_Controller {
    
    	public function index()
    	{
    		//var_dump($this->session->userdata);
			if ($this->session->userdata('logged_in'))
			{
				header( 'Location: '.base_url().'devHome/home');
			}else{
				$this->load->view('login_view');
			}
		}

		public function home()
    	{
			
    		$this->load->view('home_view');
		}
		
    }

?>