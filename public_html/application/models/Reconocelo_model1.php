<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reconocelo_model1 extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    function loginReconocelo($loginReconoceloData) {
        $query = $this->db->query('
            SELECT pp.codPrograma,pp.codEmpresa,pp.codParticipante,pp.Status,pp.Cargo,
            pp.PrimerNombre,pp.SegundoNombre,pp.ApellidoPaterno,pp.ApellidoMaterno,pp.eMail,
            pp.SaldoActual,pp.idParticipante,pp.CalleNumero, pp.Colonia, pp.CP,pp.Ciudad,pp.Estado,
            pp.eMail,pp.Telefono,Emp.Visibilidad,pp.pwd,Emp.urlEmpresa
            FROM Participante AS pp 
            INNER JOIN Empresa as Emp ON (pp.codPrograma = Emp.CodPrograma and pp.CodEmpresa= Emp.CodEmpresa)
            WHERE pp.codPrograma = 41
            AND pp.loginWeb = '.$loginReconoceloData['usuarioReconocelo'].'
            AND pwd = md5('.$loginReconoceloData['passwordReconocelo'].')
            AND pp.Status = 1
        ');
        return $query->result();
    }

    public function getCategory(){
        $query = $this->db->query("
            SELECT distinct(cp.nbCategoria) as nbCategoria,cp.CodCategoria                                          
            FROM CategoriaPremio cp 
            JOIN Premio pr ON pr.codCategoria = cp.codCategoria
            JOIN PremioPrograma pp ON pp.codPremio = pr.codPremio                              
            WHERE pp.CodEmpresa = ".$this->session->userdata('empresa')."
            AND pp.codPrograma = ".$this->session->userdata('programa')." 
            ORDER BY cp.nbCategoria
        ");
        if ($query->num_rows() > 0){
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    public function getAwards($idCat){
        $query = $this->db->query("
            SELECT DISTINCT (p.codPremio) AS codPremio, p.Nombre_Esp, p.Caracts_Esp, pp.ValorPuntos,p.Marca
            FROM Premio p
            INNER JOIN PremioPrograma pp ON pp.codPremio = p.codPremio
            JOIN Empresa e ON e.codPrograma = pp.codPrograma
            AND e.codEmpresa = pp.codEmpresa
            WHERE pp.codPrograma =". $this->session->userdata('programa')."
            AND p.CodCategoria =".$idCat."
            AND pp.CodEmpresa = ".$this->session->userdata('empresa')."
            AND ( e.catalogoVisible =1
            OR pp.ValorPuntos <= ( 
            SELECT saldoActual
            FROM Participante
            WHERE codPrograma = pp.codPrograma
            AND codEmpresa =".$this->session->userdata('empresa')."
            AND codParticipante =".$this->session->userdata('participante')." )
            )
            ORDER BY pp.ValorPuntos DESC , p.codPremio
        ");
        if ($query->num_rows() > 0){
            return $query->result_array(); 
        }else{
            return false;
        }     
    }

    public function getDataItem($idItem){
        $query = $this->db->query("
            SELECT p.codPremio,p.Nombre_Esp,p.Caracts_Esp,pp.ValorPuntos
            FROM Premio p
            INNER JOIN PremioPrograma pp ON pp.codPremio = p.codPremio 
            WHERE pp.codPrograma = ". $this->session->userdata('programa')."
            AND pp.codEmpresa = ".$this->session->userdata('empresa')."
            AND p.codPremio = ".$idItem
        );
        if ($query->num_rows() > 0){
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    public function misPreCanjes(){
        $query=$this->db->query("
            SELECT p.idCanje,p.feSolicitud,d.Cantidad,pr.Nombre_Esp,d.Status,d.Mensajeria,
            d.NumeroGuia,d.Cantidad*d.PuntosXUnidad *-1 as puntos
            FROM Canje p
            INNER JOIN CanjeDetalle d on d.idCanje = p.idCanje
            INNER join Premio pr ON pr.codPremio = d.CodPremio 
            WHERE
            p.codPrograma = ".$this->session->userdata('programa')."
            AND p.idParticipante = ".$this->session->userdata('idPart')."
            UNION ALL SELECT p.NoFolio as idCanje, p.feMov as feSolicitud,null as Cantidad, 
            dsMov as Nombre_Esp, '-' as Status,'-' as Mensajeria,'-' as NumeroGuia,
            noPuntos as puntos 
            from PartMovsRealizados p  
            where p.idParticipante = ".$this->session->userdata('idPart')."
        ");
        if ($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function saldoActualParticipante(){
        $query=$this->db->query("
            SELECT SaldoActual
            FROM  `Participante` 
            WHERE codPrograma =".$this->session->userdata('programa')."
            AND idParticipante = " .$this->session->userdata('idPart')."                                     
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
            SELECT codPrograma, idParticipante, noTipoEntrega, CalleNumero, Colonia, CP, 
            Ciudad, Estado, Telefono, referencias
            FROM  `Canje`
            WHERE codPrograma = ".$this->session->userdata('programa')."
            AND idParticipante = ".$this->session->userdata('idPart')."
            AND noTipoEntrega = 1
            AND CalleNumero = '".$_POST["address"][0]["value"]."'
            AND Colonia = '".$_POST["address"][1]["value"]."'
            AND CP = '".$_POST["address"][4]["value"]."'
            AND Ciudad = '".$_POST["address"][2]["value"]."'
            AND Estado = '".$_POST["address"][3]["value"]."'
            AND Telefono = '".$_POST["address"][5]["value"]."'
            AND referencias = '".$_POST["address"][6]["value"]."'
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
            INSERT INTO `opisa_opisa`.Canje (codPrograma,idParticipante,noTipoEntrega,CalleNumero,Colonia,
            CP,Ciudad,Estado,Telefono,referencias)
            VALUES (".$this->session->userdata('programa').",
            ".$this->session->userdata('idPart').",1,'".$_POST["address"][0]["value"]."',
            '".$_POST["address"][1]["value"]."','".$_POST["address"][4]["value"]."'
            ,'".$_POST["address"][2]["value"]."','".$_POST["address"][3]["value"]."'
            ,'".$_POST["address"][5]["value"]."','".$_POST["address"][6]["value"]."')
        ");
        if ($query){
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
                INSERT INTO `opisa_opisa`.CanjeDetalle (codPrograma,idCanje,idPreCanjeDet,CodPremio,
                cantidad,PuntosXUnidad)
                VALUES (".$this->session->userdata('programa').",".$noFolio.",".$nItem.",".$d->id.",".$d->cantidad.",".$d->puntos.")
            ");
            if (!$query){
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
            UPDATE Participante 
            SET SaldoActual = SaldoActual - ".$ptsCanje."
            WHERE idParticipante = ".$this->session->userdata('idPart')
        );
        if ($query){
            return true;
        }else{
            return false;
        }
    }

    public function misOrdenesFolio(){
        $query=$this->db->query("
            SELECT idCanje 
            FROM Canje
            where idParticipante =  " .$this->session->userdata('idPart')." 
            and codPrograma = ".$this->session->userdata('programa')."
        ");
        if ($query->num_rows() > 0){
            return $query->result_array(); 
        }else{
            return false;
        }
    }

    public function tipos_preguntas() {
        $query = $this->db->query("
            SELECT TipoPregunta FROM Preguntas "
        );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function addDudaTicket($data){
        $query = $this->db->query("
            INSERT INTO `opisa_opisa`.`AtencionTicket`(`idCanje`, `idParticipante`, `status`, `FechaCreacion`,
            `Subject`) VALUES (".$data['idcanje'].",".$this->session->userdata('idPart').",
            1,NOW(),'".$data['nombre']."');
        ");
        if ($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function AtencionTicket(){
        $query = $this->db->query("
            SELECT IdTicket
            FROM AtencionTicket
            ORDER BY IdTicket DESC 
            LIMIT 1
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function detalleTicket($duda,$data){
        $query = $this->db->query("                           
            INSERT INTO `opisa_opisa`.`AtencionTicketDetalle`(`IdTicket`, `mensaje`, `fecha`, `loginWeb`) 
            VALUES (".$duda.",'".$data['mensaje']."',now(),".$this->session->userdata('idPart').");
        ");
        if ($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

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
        if ($query){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function loginUserTicket($loginTicketAdmin){
        $usuario =$loginTicketAdmin['usuario'];
        $password = $loginTicketAdmin['password'];
        $query = $this->db->query("
            SELECT * 
            FROM  `Administrador` 
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

    public function participanteTicket($ticketId){
        $query = $this->db->query("                              
            SELECT idParticipante,FechaCreacion,Subject
            FROM  `AtencionTicket` 
            WHERE IdTicket =".$ticketId."
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function datosParticipante($ParticipanteId){
        $query = $this->db->query("                              
            SELECT PrimerNombre, eMail
            FROM  `Participante` 
            WHERE idParticipante =".$ParticipanteId."
        ");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
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
    
    public function checkPasswordReconocelo($updatePasswordReconoceloData){
        $query = $this->db->query("
              SELECT pwd
              FROM `Participante` 
              WHERE codPrograma = '".$this->session->userdata('programa')."'
              AND codEmpresa = '".$this->session->userdata('empresa')."'
              AND idParticipante = '".$this->session->userdata('idPart')."'
              AND pwd = md5('".$updatePasswordReconoceloData['passwordOld']."')
        ");
        if ($query->num_rows() == 1){
              return $query->result_array(); 
        }else{
              return false;
        }
    }

    public function updatePasswordReconocelo($updatePasswordReconoceloData){
        $query = $this->db->query("
            UPDATE `Participante` 
            SET `pwd`=md5('".$updatePasswordReconoceloData['passwordNew']."' )
            WHERE codPrograma ='".$this->session->userdata('programa')."'
            AND codEmpresa ='".$this->session->userdata('empresa')."'
            AND  `idParticipante` ='".$this->session->userdata('idPart')."'
        ");
        if ($query){
            return true;
        }else{
            return false;
        }
    }
    
    public function checkMailExitsReconocelo($usuarioEmailReconocelo){
        $query = $this->db->query("
            SELECT loginWeb, CodPrograma, codEmpresa, idParticipante, PrimerNombre
            FROM  `Participante` 
            WHERE codPrograma =41
            AND eMail =  '".$usuarioEmailReconocelo['usuarioEmailReconocelo']."'
        ");
        if ($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    
    public function cambiarPasswordNewReconocelo($passwordConfigReconocelo){
        $query = $this->db->query("
            UPDATE `Participante` SET `pwd`=md5(".$passwordConfigReconocelo['passwordNewReconocelo'].")
            WHERE loginWeb = ".$passwordConfigReconocelo['loginWeb']."
            and idParticipante = ".$passwordConfigReconocelo['idParticipante']."
        ");
        if ($query){
            return true;
        }else{
            return false;
        }
    }
}