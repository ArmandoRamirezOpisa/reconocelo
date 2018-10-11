<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ticket_controller extends CI_Controller {
    
    	public function index()
        {
              $this->load->model("Ticket_model");
                $tickets = $this->Ticket_model->Get_Tickets();
            
                if ($tickets)
            {
                $data["tickets"] = $tickets;
            }else{
                $data["tickets"] = false;
            }
              
               
            $this->load->view('ticket_view',$data);
        }
    }
    ?>