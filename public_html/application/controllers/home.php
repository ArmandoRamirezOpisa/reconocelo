<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller {
    
    	public function index(){
    		$this->load->view('home_view');
		}

        /* Router ejemplo para hacer un ticket */
		public function ticketsExam(){
			$this->load->model("Ayuda_model");
            $this->load->model("canje_model");      
            $preguntas = $this->Ayuda_model->tipos_preguntas();
            $ordenes= $this->canje_model->misPreCanjes();
            $ordenesFolio = $this->canje_model->misOrdenesFolio();
           
           if ($ordenesFolio){
                $data["ordenesFolio"] = $ordenesFolio;
            }else{
                $data["ordenesFolio"] = false;
            }
           
            if ($ordenes){
                $data["ordenes"] = $ordenes;
            }else{
                $data["ordenes"] = false;
            }
            
            if ($preguntas){
                $data["preguntas"] = $preguntas;
            }else{
                $data["preguntas"] = false;
            }

            $this->load->view('tickets_reconocelo_view',$data);
        }
        /* Fin router ejemplo para hacer un ticket */

        /* Router ejemplo para ver el historial de los tickets */
        public function historialTicket(){
            $this->load->model("Ticket_model");
            $ticketHistory = $this->Ticket_model->Get_TicketsExample();

            if ($ticketHistory){
                $data['ticketHistory'] = $ticketHistory;
            }else{
                $data['ticketHistory'] = false;
            }

            $this->load->view('ticketExample_view',$data);
        }
        /* Fin router ejemplo para ver el historial de los tickets */

        /* funcion para abrir el modal del historial del ticket prueba */
        public function historiaTicket(){
            $this->load->model("Ticket_model");
            
            $ticketData = array("idTicket"=>$_POST['idTicket']);
            $ticketStatus = array("status"=>$_POST['status']);

            $ticketHistory = $this->Ticket_model->Get_TicketsHistory($ticketData);

            if ($ticketHistory){
                $data['ticketHistory'] = $ticketHistory;
                $data['status'] = $ticketStatus;
            }else{
                $data['ticketHistory'] = false;
                $data['status'] = false;
            }

            $this->load->view('modalTickect_view',$data);

        }

        public function historiaTicketAnswer(){

            $ticketHistoria = array("idTicketHistory"=>$_POST['idTicketHistory']);
            $this->load->view('modalTicketAns_view',$ticketHistoria);

        }

        public function sendTicketAnswer(){

            $this->load->model("Ticket_model");
            $ticketAnswer = array(
                "ticketId"=>$_POST['ticketId'],
                "respuestaTicket"=>$_POST['respuestaTicket']
            );
            $ticketHistoryData = $this->Ticket_model->sendAnswerTicketAdmin($ticketAnswer);

            if ($ticketHistoryData){
                $this->output->set_output(json_encode('ok'));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function closeTicket(){
            $this->load->model("Ticket_model");
            $ticketDataClose = array("ticketId"=>$_POST['ticketId']);
            $ticketCloseData = $this->Ticket_model->closeTicket($ticketDataClose);

            if ($ticketCloseData){
                $this->output->set_output(json_encode('ok'));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }
        /* fin funcion para abrir el modal del historial del ticket prueba */

        /* Funcion para ver todo el historial de tickets administrador */
        public function ticketsLista(){

            $this->load->model("Ticket_model");
            $ticketListAdmin = $this->Ticket_model->ticketsAdmin();
            if ($ticketListAdmin){
                $data['ticketListAdmin'] = $ticketListAdmin;
            }else{
                $data['ticketListAdmin'] = false;
            }

            $this->load->view('ticketsList_view',$data);
        }
        /* Fin funcion para ver todo el historial de tickets administrador*/

        /* Funcion para confirmar para cerrar un ticket */
        public function closeConfirmTicket(){
            $ticketClose = array("idTicket"=>$_POST['idTicket']);
            $this->load->view('modalTicketClose_view',$ticketClose);
        }
        /* Fin funcion para confirmar para cerrar un ticket */


        /* Ejemplo nuevo para las nuevas rutas */
        public function homeEjemplo(){
			$this->load->view('homeEjemplo_view');
		}
        /* Fin ejemplo nuevo para las nuevas rutas */

    }
?>