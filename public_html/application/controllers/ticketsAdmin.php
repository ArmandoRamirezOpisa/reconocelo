<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class TicketsAdmin extends CI_Controller {
    
    	public function index(){
			
            if ($this->session->userdata('administardor')) {
                header( 'Location: '.base_url().'ticketsAdmin/home');
            } else {
                $this->load->view('home_adminList_view');
            }
        }

        public function login(){
            $this->load->model("ticket_model");
            $loginTicketAdmin = array("usuario"=>$_POST['usuario'],"password"=>$_POST['password']);
            $userTicketExist = $this->ticket_model->loginUserTicket($loginTicketAdmin);
            if ($userTicketExist){
                $userTicketExist = array(
                    'administrador' => TRUE,
                    'CodEmpresa' => $userTicketExist[0]["CodEmpresa"],
                    'CodPrograma' => $userTicketExist[0]["CodPrograma"],
                    'Usuario' => $userTicketExist[0]["Usuario"]
                );
                $this->session->set_userdata($userTicketExist);
                $this->output->set_output(json_encode($userTicketExist));
            }else{
                $NoEntro = "NoEntro";
                $this->output->set_output(json_encode(false));
            }
        }

        public function home(){
            $this->load->model("ticket_model");
            $ticketListAdmin = $this->ticket_model->ticketsAdmin();
            if ($ticketListAdmin){
                $data['ticketListAdmin'] = $ticketListAdmin;
            }else{
                $data['ticketListAdmin'] = false;
            }

            $this->load->view('ticketsList_view',$data);
        }

        public function sendTicketAnswer(){

            $this->load->model("ticket_model");
            $ticketAnswerAdmin = array(
                "ticketId"=>$_POST['ticketId'],
                "respuestaTicket"=>$_POST['respuestaTicket']
            );
            $ticketHistoryData = $this->ticket_model->sendAnswerTicketAdmin($ticketAnswerAdmin);

            if ($ticketHistoryData){
                $this->output->set_output(json_encode($ticketHistoryData));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function exit_ticket(){
            $array_items = array('administrador' => '', 'Usuario' => '');
            $this->session->unset_userdata($array_items);
            //Manda al inicio de la página, si no hay session se va al login.
            header( 'Location: '.base_url().'ticketsAdmin');
        }

    }

?>