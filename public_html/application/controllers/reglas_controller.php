<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Reglas_controller extends CI_Controller {
    
    	public function index()
    	{
    		$this->load->model("reglas_model");
			if ($this->session->userdata('logged_in'))
			{
                $cat = $this->reglas_model->getRules();
                if ($cat)
                {
                    $data["cat"] = $cat;
                }else{
                    $data["cat"] = false;
                }
                $this->load->view('reglas_view',$data);
			}else{
				echo "0";
			}
    		
    	}
    }

?>