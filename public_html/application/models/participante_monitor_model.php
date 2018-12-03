<?php
    class Participante_monitor_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}
        
          //Todos los participantes
          public function getTodosParticipantes(){
    		$query = $this->db->query("
                                          SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                                          pr.SaldoActual, pr.Status
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
                                          pr.SaldoActual, pr.Status
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
                                          pr.SaldoActual, pr.Status
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
                                          pr.SaldoActual, pr.Status
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
                                          pr.SaldoActual, pr.Status
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
                                          pr.SaldoActual, pr.Status
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
                                          pr.SaldoActual, pr.Status
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
                                          pr.SaldoActual, pr.Status
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
                                          pr.SaldoActual, pr.Status
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

        public function participanteInfo($codParticipante){
            $query = $this->db->query("
                                          SELECT DATE_FORMAT( feMov,  '%Y %m' ) AS Fecha, SUM( m.noPuntos ) AS Depositos
                                          FROM PartMovsRealizados m
                                          JOIN Participante p ON p.idParticipante = m.idParticipante
                                          WHERE p.CodPrograma =41
                                          AND p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                          AND p.codParticipante = ".$codParticipante['codParticipante']."
                                          GROUP BY DATE_FORMAT( m.feMov,  '%Y %m' ) 
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