<?php

    class Ticket_model extends CI_Model {

        public function __construct() {}
    
        public function Get_Tickets() {
            $query = $this->db->query("                  
                SELECT a.IdTicket,a.idCanje,p.TipoPregunta,a.mensaje,a.solucion,a.FechaCreacion,
                a.FechaFinalizacion,a.status
                FROM opisa_opisa.Atencion as a inner join opisa_opisa.Preguntas as p on p.idPregunta = a.idPregunta 
                where idParticipante = '".$this->session->userdata('idPart')."' 
                order by a.FechaCreacion desc,a.status "
            );
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }

        /* funcion para la base de datos del historial */
        public function Get_TicketsReconocelo() {
            $query = $this->db->query("                  
                SELECT IdTicket,idCanje,idParticipante,status,FechaCreacion,Subject
                FROM AtencionTicket 
                WHERE idParticipante = '".$this->session->userdata('idPart')."';
            ");
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function Get_TicketsHistory($ticketData){
            $query = $this->db->query("                  
                SELECT IdTicket, mensaje, fecha, loginWeb
                FROM AtencionTicketDetalle
                WHERE IdTicket =".$ticketData['idTicket']."
            ");
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function sendAnswerTicket($ticketAnswer){
            $query = $this->db->query("                           
                INSERT INTO `opisa_opisa`.`AtencionTicketDetalle`(`IdTicket`, `mensaje`, `fecha`, `loginWeb`) 
                VALUES (".$ticketAnswer['ticketId'].",'".$ticketAnswer['respuestaTicket']."',
                now(),".$this->session->userdata('idPart').");
            ");
    	    if ($query)
    	    {
                return $this->db->insert_id();
    	    }else{
                return false;
            }
        }

        public function sendAnswerTicketAdmin($ticketAnswerAdmin){
            $loginWeb = $this->session->userdata('idPart');
            if($loginWeb){
                $loginWeb;
            }else{
                $loginWeb = "Administrador";
            }
            $query = $this->db->query("                           
                INSERT INTO `opisa_opisa`.`AtencionTicketDetalle`(`IdTicket`, `mensaje`, `fecha`, `loginWeb`) 
                VALUES (".$ticketAnswerAdmin['ticketId'].",'".$ticketAnswerAdmin['respuestaTicket']."',
                now(),'".$loginWeb."');
            ");
    	    if ($query)
    	    {
                return $this->db->insert_id();
    	    }else{
                return false;
            }
        }

        public function closeTicket($ticketDataClose){
            $query = $this->db->query("                           
                UPDATE `AtencionTicket` SET `status`=0 WHERE `IdTicket` = ".$ticketDataClose['ticketId'].";
            ");
    	    if ($query){
                return $this->db->insert_id();
    	    }else{
                return false;
            }
        }
        /* fin funcion para la base de datos del historia ejemplo */

        /* Funcion para la lista de los tickets administrador */
        public function loginUserTicket($loginTicketAdmin){
            $usuario =$loginTicketAdmin['usuario'];
            $password = $loginTicketAdmin['password'];
            $query = $this->db->query("
                SELECT * 
                FROM  `administrador` 
                WHERE Usuario =  '".$usuario."'
                AND Pwd ='".$password."'
                AND typeTicket = 1
            ");
            if ($query->num_rows() > 0){

                return $query->result_array(); 

            }else{

                return false;

            }
        }

        public function ticketsAdmin(){

            $query = $this->db->query("                              
                SELECT at.IdTicket, at.idCanje, at.idParticipante, at.STATUS, at.FechaCreacion, at.Subject, 
                p.PrimerNombre
                FROM AtencionTicket at, Participante p
                WHERE at.idParticipante = p.idParticipante
            ");
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }
        /* Fin funcion para la lista de los tickets administrador */
    
    }
?>