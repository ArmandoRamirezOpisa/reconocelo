<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Reglas_controller extends CI_Controller {
    
    	public function index()
    	{	  
            $this->load->model("rules_model");
            
			if ($this->session->userdata('logged_in'))
			{
				$this->load->view('reglas_view');
			}else{
				echo "0";
			}
    		
    	}
        
        public function getRules()
        {
            $cat = $this->rules_model->getRules();
            if ($cat)
            {
                $data["cat"] = $cat;
            }else{
                $data["cat"] = false;
            }
    		$this->load->view('reglas_view',$cat);
        }
    }

?>