<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Nav_monitor_controller extends CI_Controller {
		
    	public function getNavegacionParticipante()
    	{
    		$this->load->view('participante_monitor_view');
    	}
		
    }

?>