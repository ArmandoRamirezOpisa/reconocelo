<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reconocelo_model1 extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    function loginReconocelo($loginReconoceloData) {
        $query = $this->db->query('
            CALL `spu_loginReconocelo`('.$loginReconoceloData['usuarioReconocelo'].', '.$loginReconoceloData['passwordReconocelo'].');
        ');
        return $query->result();
    }

    public function getCategory(){
        $query = $this->db->query("
            CALL `spu_getCategoryReconocelo`(".$this->session->userdata('empresa').", ".$this->session->userdata('programa').");
        ");
        if ($query->num_rows() > 0)
        {
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    public function getAwards($idCat){
        $query = $this->db->query("
            CALL `spu_getAwardsReconocelo`(". $this->session->userdata('programa').", ".$this->session->userdata('empresa').", ".$idCat.", ".$this->session->userdata('participante').");
        ");
        if ($query->num_rows() > 0)
        {
            return $query->result_array(); 
        }else{
            return false;
        }     
    }

    public function getDataItem($idItem){
        $query = $this->db->query("
            CALL `spu_getDataItemReconocelo`(". $this->session->userdata('programa').", ".$idItem.");"
        );
        if ($query->num_rows() > 0)
        {
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    public function misPreCanjes(){
        $query=$this->db->query("
            CALL `spu_misPreCanjesReconocelo`(".$this->session->userdata('programa').", ".$this->session->userdata('idPart').");
        ");
        if ($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function saldoActualParticipante(){
        $query=$this->db->query("
            CALL `spu_saldoActualParticipante`(".$this->session->userdata('programa').", " .$this->session->userdata('idPart').");
        ");
        if ($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function checkAddCanje(){
        $address = $this->input->post("address");
        $query=$this->db->query("
            CALL spu_checkAddCanjeReconocelo (".$this->session->userdata('programa').",".$this->session->userdata('idPart').",'".$_POST["address"][0]["value"]."','".$_POST["address"][1]["value"]."','".$_POST["address"][4]["value"]."','".$_POST["address"][2]["value"]."','".$_POST["address"][3]["value"]."','".$_POST["address"][5]["value"]."','".$_POST["address"][6]["value"]."');
        ");
        if ($query->num_rows() > 0){
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    public function addCanje(){
        $address = $this->input->post("address");
        $query = $this->db->query("
            CALL spu_addCanjeReconocelo(".$this->session->userdata('programa').",".$this->session->userdata('idPart').",1,'".$_POST["address"][0]["value"]."','".$_POST["address"][1]["value"]."','".$_POST["address"][4]["value"]."','".$_POST["address"][2]["value"]."','".$_POST["address"][3]["value"]."','".$_POST["address"][5]["value"]."','".$_POST["address"][6]["value"]."');
        ");
        if ($query)
        {
            return $this->db->insert_id();
        }else{
            return false;
        }  
    }

    public function addDetCanje($datos,$noFolio){
        $err = 0;
        $nItem = 1;
        foreach($datos as $d){
            $query = $this->db->query("
                CALL spu_addDetCanjeReconocelo(".$this->session->userdata('idPart').",".$noFolio.",".$nItem.",".$d->id.",".$d->cantidad.",".$d->puntos.");
            ");
            if (!$query)
            {
                $err ++;
            }else{
                $nItem++;
            }
        }
        if ($err > 0){
            return false;
        }
            return true;
    }

    public function updSaldo($ptsCanje){
        $query = $this->db->query("
            CALL spu_updSaldoReconocelo (".$ptsCanje.",".$this->session->userdata('idPart').");
        ");
        if ($query){
            return true;
        }else{
            return false;
        }
    }

    public function misOrdenesFolio(){
        $query=$this->db->query("
            CALL spu_misOrdenesFolioReconocelo(" .$this->session->userdata('idPart')." ,".$this->session->userdata('programa').")
        ");
        if ($query->num_rows() > 0){
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    /* Fin Funciones Canjes Reconocelo */

    /* Funcion Ayuda Model */

    public function tipos_preguntas() {
        $query = $this->db->query("
            call spu_tipos_preguntasReconocelo
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function addDudaTicket($data){

        $query = $this->db->query("
            CALL spu_addDudaTicketReconocelo(".$data['idcanje'].",".$this->session->userdata('idPart').",1,NOW(),'".$data['nombre']."');
        ");
        if ($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function AtencionTicket(){
        $query = $this->db->query("
            CALL spu_AtencionTicket;
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function detalleTicket($duda,$data){

        $query = $this->db->query("
            CALL spu_detalleTicketReconocelo(".$duda.",'".$data['mensaje']."',now(),".$this->session->userdata('idPart').");
        ");
        if ($query)
        {
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    /* Fin Funcion Ayuda Model */

    /* Funcion historial del ticket Reconocelo*/

    public function Get_TicketsReconocelo() {
        $query = $this->db->query("
            CALL spu_Get_TicketsReconocelo('".$this->session->userdata('idPart')."');
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function Get_TicketsHistory($ticketData){
        $query = $this->db->query("   
            CALL spu_Get_TicketsHistoryReconocelo(".$ticketData['idTicket'].");
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
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
            CALL spu_sendAnswerTicketAdminReconocelo(".$ticketAnswerAdmin['ticketId'].",'".$ticketAnswerAdmin['respuestaTicket']."',
            now(),'".$loginWeb."');
        ");
        if ($query)
        {
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function loginUserTicket($loginTicketAdmin){
        $usuario =$loginTicketAdmin['usuario'];
        $password = $loginTicketAdmin['password'];
        $query = $this->db->query("
            CALL spu_loginUserTicketReconocelo('".$usuario."','".$password."')
        ");
        if ($query->num_rows() > 0){
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    public function ticketsAdmin(){
        $query = $this->db->query("      
            CALL spu_ticketsAdminReconocelo;
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function participanteTicket($ticketId){
        $query = $this->db->query("
            CALL spu_participanteTicketReconocelo(".$ticketId.")
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function datosParticipante($ParticipanteId){
        $query = $this->db->query("
            CALL spu_datosParticipanteReconocelo(".$ParticipanteId.");
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function closeTicket($ticketDataClose){
        $query = $this->db->query("
            CALL spu_closeTicketReconocelo(".$ticketDataClose['ticketId'].");
        ");
        if ($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    /* Fin funcion historial del ticket Reconocelo */

    /* Funcion configuracion personal */
    public function checkPasswordReconocelo($updatePasswordReconoceloData){
        $query = $this->db->query("
            CALL spu_checkPasswordReconoceloReconocelo('".$this->session->userdata('programa')."','".$this->session->userdata('empresa')."','".$this->session->userdata('idPart')."','".$updatePasswordReconoceloData['passwordOld']."');
        ");
        if ($query->num_rows() == 1){
              return $query->result_array(); 
        }else{
              return false;
        }
    }

    public function updatePasswordReconocelo($updatePasswordReconoceloData){
        $query = $this->db->query("
            CALL spu_updatePasswordReconocelo('".$updatePasswordReconoceloData['passwordNew']."','".$this->session->userdata('programa')."','".$this->session->userdata('empresa')."','".$this->session->userdata('idPart')."');
        ");
        if ($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    /* Fin funcion configuracion personal */


    /* Funcion Recuperar password */
    public function checkMailExitsReconocelo($usuarioEmailReconocelo){
        $query = $this->db->query("
            CALL spu_checkMailExitsReconocelo('".$usuarioEmailReconocelo['usuarioEmailReconocelo']."');
        ");
        if ($query->num_rows() > 0){
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    public function cambiarPasswordNewReconocelo($passwordConfigReconocelo){
        $query = $this->db->query("
            CALL spu_cambiarPasswordNewReconocelo(".$passwordConfigReconocelo['passwordNewReconocelo'].",".$passwordConfigReconocelo['loginWeb'].",".$passwordConfigReconocelo['idParticipante'].");
        ");
        if ($query){
            return true;
        }else{
            return false;
        }
    }

}
