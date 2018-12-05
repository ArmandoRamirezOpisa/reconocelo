<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller {
    
    	public function index()
    	{
			
    		$this->load->view('home_view');
		}

		public function ticketsExam(){

			$this->load->model("Ayuda_model");
                  $this->load->model("canje_model");
                  
                  
            $preguntas = $this->Ayuda_model->tipos_preguntas();
            $ordenes= $this->canje_model->misPreCanjes();
           $ordenesFolio = $this->canje_model->misOrdenesFolio();
           
           if ($ordenesFolio)
            {
                $data["ordenesFolio"] = $ordenesFolio;
            }else{
                $data["ordenesFolio"] = false;
            }
           
            if ($ordenes)
            {
                $data["ordenes"] = $ordenes;
            }else{
                $data["ordenes"] = false;
            }
            
            if ($preguntas)
            {
                $data["preguntas"] = $preguntas;
            }else{
                $data["preguntas"] = false;
            }


            $this->load->view('tickets_reconocelo_view',$data);
    	}
		
    }

?>