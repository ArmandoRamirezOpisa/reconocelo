<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller {
    
    	public function index()
    	{
			
    		$this->load->view('home_view');
		}

        /* Router ejemplo para hacer un ticket */
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
        /* Fin router ejemplo para hacer un ticket */

        /* Router ejemplo para ver el historial de los tickets */
        public function ticketsHistorial()
        {
            $this->load->model("Ticket_model");
            $tickets = $this->Ticket_model->Get_TicketsExample();
            
            if ($tickets){

                $data["tickets"] = $tickets;

            }else{

                $data["tickets"] = false;

            }
               
            $this->load->view('ticketExample_view',$data);
        }
        /* Fin router ejemplo para ver el historial de los tickets */

        /* funcion para abrir el modal del historial del ticket prueba */
        public function historiaTicket(){
            $this->load->model("Ticket_model");
            $ticketData = array("idTicket"=>$_POST['idTicket']);

            $ticketHistory = $this->Ticket_model->Get_TicketsHistory($ticketData);

            if ($ticketHistory){
                $data['ticketHistory'] = $ticketHistory;
            }else{
                $data['ticketHistory'] = false;
            }

            $this->load->view('modalTickect_view',$data);

        }

        public function historiaTicketAnswer(){

            $ticketHistoria = array("idTicketHistory"=>$_POST['idTicketHistory']);

            $this->load->view('modalTicketAns_view',$ticketHistoria);

        }
        /* fin funcion para abrir el modal del historial del ticket prueba */

    }

?>