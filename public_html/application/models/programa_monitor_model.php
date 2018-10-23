<?php
    class Programa_monitor_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}
        
        public function getPrograma()
        {
    		$query = $this->db->query("
                                          SELECT DATE_FORMAT( m.feMov,  '%Y %m' ) AS Fecha, SUM( m.noPuntos ) AS Depositos, 
                                          SUM( cd.PuntosXUnidad * cd.Cantidad ) AS Canjes
                                          FROM PartMovsRealizados m, Participante part, PreCanjeDet cd, PreCanje c
                                          WHERE part.idParticipante = m.idParticipante
                                          AND feMov >=  '20180501'
                                          AND feMov <=  '20180830'
                                          AND part.CodPrograma = 41
                                          AND part.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                          AND cd.noFolio = c.idCanje
                                          AND cd.idParticipante = c.idParticipante
                                          GROUP BY DATE_FORMAT( m.feMov,  '%Y %m' ) 
                                          ORDER BY 2
                                        
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