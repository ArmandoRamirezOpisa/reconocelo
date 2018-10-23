<?php
    class Programa_monitor_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}
        
        public function getPrograma()
        {
    		$query = $this->db->query("
                                          SELECT  'D' AS Tipo, DATE_FORMAT( feMov,  '%Y %m' ) AS Fecha, 
                                          SUM( m.noPuntos ) AS Depositos,  'Canjes' AS Canjes
                                          FROM PartMovsRealizados m
                                          JOIN Participante p ON p.idParticipante = m.idParticipante
                                          WHERE feMov >=  '20180501'
                                          AND feMov <=  '20181030'
                                          AND p.CodPrograma =41
                                          AND p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                          GROUP BY DATE_FORMAT( m.feMov,  '%Y %m' ) 
                                          UNION ALL 
                                          SELECT  'C' AS Tipo, DATE_FORMAT( feSolicitud,  '%Y %m' ) AS Fecha,  
                                          'depositos' AS Depositos, SUM( cd.PuntosXUnidad * cd.Cantidad ) AS Canjes
                                          FROM PreCanjeDet cd
                                          JOIN PreCanje c ON cd.noFolio = c.idCanje
                                          AND cd.idParticipante = c.idParticipante
                                          WHERE feSolicitud >=  '20180501'
                                          AND feSolicitud <=  '20181030'
                                          GROUP BY DATE_FORMAT( feSolicitud,  '%Y %m' ) 
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