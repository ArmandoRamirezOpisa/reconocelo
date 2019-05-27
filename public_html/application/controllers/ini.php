<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Ini extends CI_Controller {

    public function index(){
			if ($this->session->userdata('logged_in')){
				header( 'Location: '.base_url().'Home');
			}else{
				$this->load->view('login_view');
			}
		}

  }

?>