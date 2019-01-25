<?php
    class Canje_monitor_model extends CI_Model {
    	
    	public function __construct(){}
        
        public function getFechaCanje(){
            $query = $this->db->query("
                SELECT DISTINCT DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) AS Fecha
                FROM PreCanje pc
                JOIN Participante p ON p.idParticipante = pc.idParticipante
                WHERE p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                AND p.CodPrograma =41
                AND feSolicitud >=  '20180101'
                ORDER BY Fecha
            ");
            if ($query->num_rows() > 0)
            {
                return $query->result_array(); 
            }else{
                return false;
            }
        }

        public function getCanje()
        {
            $query = $this->db->query("
                SELECT idCanje, p.idParticipante, 
                CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', p.ApellidoMaterno ) 
                AS Nombre, pc.feSolicitud, pc.fhExp, pcd.PuntosXUnidad
                FROM PreCanje pc, Participante p, PreCanjeDet pcd
                WHERE pc.idParticipante = p.idParticipante
                AND pc.idCanje = pcd.noFolio
                AND pc.codPrograma =41
                AND p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                ORDER BY pc.feSolicitud
            ");
            if ($query->num_rows() > 0)
            {
                return $query->result_array(); 
            }else{
                return false;
            }
        }

        public function getCanjeFechas($infoFechas)
        {
            $query = $this->db->query("
                SELECT idCanje, p.idParticipante, 
                CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', p.ApellidoMaterno ) 
                AS Nombre, pc.feSolicitud, pc.fhExp, pcd.PuntosXUnidad
                FROM PreCanje pc, Participante p, PreCanjeDet pcd
                WHERE pc.idParticipante = p.idParticipante
                AND pc.idCanje = pcd.noFolio
                AND pc.codPrograma =41
                AND p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                AND DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) >= '".$infoFechas['fechaInicio']."'
                AND DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) <= '".$infoFechas['fechaFin']."'
                ORDER BY Fecha
            ");
            if ($query->num_rows() > 0)
            {
                return $query->result_array(); 
            }else{
                return false;
            }
        }
    }
?>