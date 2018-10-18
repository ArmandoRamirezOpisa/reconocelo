<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Monitor_participantes extends CI_Controller {
        
         public function __construct()
        {
                parent::__construct();
               
        }

        public function ObtenerParticipantes() {
            
                $this->load->view('participante_monitor_view');
         
        }
        
}