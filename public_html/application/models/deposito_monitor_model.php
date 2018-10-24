<?php
    class Deposito_monitor_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}
        
          public function getFechaDeposito()
          {
                  $query = $this->db->query("
                                                SELECT DATE_FORMAT( m.feMov,  '%Y %m' ) AS Fecha
                                                FROM PartMovsRealizados m
                                                JOIN Participante p ON p.idParticipante = m.idParticipante
                                                WHERE p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                                AND p.CodPrograma =41
                                                AND feMov >=  '20180101'
                                          
                                        ");
                  if ($query->num_rows() > 0)
                  {
                  return $query->result_array(); 
                  }else{
                  return false;
                  }
          }

        public function getDeposito()
        {
    		$query = $this->db->query("
                                          SELECT m.noFolio, 
                                          CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', 
                                          p.ApellidoMaterno ) AS Nombre, DATE_FORMAT( m.feMov,  '%Y %m %d' ) AS Fecha, m.dsMov AS Descripcion, 
                                          m.noPuntos AS Puntos
                                          FROM PartMovsRealizados m
                                          JOIN Participante p ON p.idParticipante = m.idParticipante
                                          WHERE p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                          AND p.CodPrograma =41
                                          AND feMov >=  '20180101'
                                        
                                      ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        public function getDepositoFechas($infoFechas)
        {
    		$query = $this->db->query("
                                          SELECT m.noFolio, 
                                          CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', 
                                          p.ApellidoMaterno ) AS Nombre, DATE_FORMAT( m.feMov,  '%Y %m %d' ) AS Fecha, m.dsMov AS Descripcion, 
                                          m.noPuntos AS Puntos
                                          FROM PartMovsRealizados m
                                          JOIN Participante p ON p.idParticipante = m.idParticipante
                                          WHERE p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                          AND p.CodPrograma =41
                                          AND feMov >=  .".$infoFechas['fechaInicio']."
                                          AND feMov >=  .".$infoFechas['fechaFin']."
                                        
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