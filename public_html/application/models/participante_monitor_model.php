<?php
    class Participante_monitor_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}
        
          //Todos los participantes
          public function getTodosParticipantes(){
    		$query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status, pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        //Participantes con saldo
        public function geTParticipantesSaldo()
        {
    		$query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status, pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual <> 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        //Participantes sin saldo
        public function geTParticipantesSinSaldo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual = 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        //Participantes todos activos
        public function geTodoSaldoActivo()
        {
    		$query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.Status = 1
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        //Participantes todos inactivos
        public function geTodoInactivo()
        {
    		$query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.Status = 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        //Participantes activos con saldo
        public function getSaldoActivo()
        {
    		$query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual <> 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
                  AND pr.Status = 1     
            ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        //Participantes con saldo inactivos
        public function geTSaldoInactivo()
        {
    		$query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual <> 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
                  AND pr.Status = 0     
            ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        //Participantes sin saldo activos
        public function geTSinSaldoActivo()
        {
    		$query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual = 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
                  AND pr.Status = 1                            
            ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        //Participantes sin saldo inactivos
        public function geTSinSaldoInactivo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual = 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
                  AND pr.Status = 0
            ");
            if ($query->num_rows() > 0)
            {
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        public function participanteInfoData($infoParticipante){
            $query = $this->db->query("

                  SELECT p.idCanje,p.feSolicitud,d.Cantidad,pr.Nombre_Esp,d.Status,d.Mensajeria,
                  d.NumeroGuia,d.Cantidad*d.PuntosXUnidad *-1 as puntos
                  FROM PreCanje p
                  INNER JOIN PreCanjeDet d on d.noFolio = p.idCanje
                  INNER join Premio pr ON pr.codPremio = d.CodPremio 
                  WHERE  
                  p.codPrograma = 41
                  AND p.idParticipante = ".$infoParticipante['codParticipante']."
                  UNION ALL SELECT p.NoFolio as idCanje, p.feMov as feSolicitud,null as Cantidad, 
                  dsMov as Nombre_Esp, '-' as Status,'-' as Mensajeria,'-' as NumeroGuia,
                  noPuntos as puntos 
                  from PartMovsRealizados p
                  where p.idParticipante = ".$infoParticipante['codParticipante']."

            ");
            if ($query->num_rows() > 0)
            {
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        public function participanteInfoDataCanje($infoParticipante){
            $query = $this->db->query("
                  SELECT DATE_FORMAT( feSolicitud,  '%Y %m' ) AS Fecha, 
                  SUM( cd.PuntosXUnidad * cd.Cantidad ) AS Canjes
                  FROM PreCanjeDet cd, PreCanje c, Participante p
                  WHERE cd.noFolio = c.idCanje
                  AND cd.idParticipante = c.idParticipante
                  AND c.idParticipante = p.idParticipante
                  AND c.codPrograma =41
                  AND p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND p.codParticipante = ".$infoParticipante['codParticipante']."
                  GROUP BY DATE_FORMAT( feSolicitud,  '%Y %m' ) 
                  ORDER BY 1
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