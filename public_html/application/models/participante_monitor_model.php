<?php
    class Participante_monitor_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}
        
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


        public function geTParticipantes()
        {
    		$query = $this->db->query("
                                          SELECT pr.codParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                                          pr.SaldoActual, pr.Status
                                          FROM Participante pr
                                          WHERE pr.codPrograma =41
                                          pr.SaldoActual <> 0
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

        public function geTSinSaldoParticipantes()
        {
    		$query = $this->db->query("
                                        SELECT pr.codParticipante, pr.PrimerNombre, pr.SegundoNombre, 
                                        pr.ApellidoPaterno, pr.ApellidoMaterno, pr.Telefono,
                                        pr.eMail, pr.SaldoActual, pr.Status 
                                        FROM Participante pr
                                        WHERE 
                                        pr.SaldoActual = 0
                                        AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                        
                                      ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        public function geTSaldoActivo()
        {
    		$query = $this->db->query("
                                        SELECT pr.codParticipante, pr.PrimerNombre, pr.SegundoNombre, 
                                        pr.ApellidoPaterno, pr.ApellidoMaterno, pr.Telefono,
                                        pr.eMail, pr.SaldoActual, pr.Status 
                                        FROM Participante pr
                                        WHERE 
                                        pr.SaldoActual <> 0
                                        AND pr.Status = 1
                                        AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                        
                                      ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        public function geTSinSaldoActivo()
        {
    		$query = $this->db->query("
                                        SELECT pr.codParticipante, pr.PrimerNombre, pr.SegundoNombre, 
                                        pr.ApellidoPaterno, pr.ApellidoMaterno, pr.Telefono,
                                        pr.eMail, pr.SaldoActual, pr.Status 
                                        FROM Participante pr
                                        WHERE 
                                        pr.SaldoActual = 0
                                        AND pr.Status = 1
                                        AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                        
                                      ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }
        
        public function geTSaldoInactivo()
        {
    		$query = $this->db->query("
                                        SELECT pr.codParticipante, pr.PrimerNombre, pr.SegundoNombre, 
                                        pr.ApellidoPaterno, pr.ApellidoMaterno, pr.Telefono,
                                        pr.eMail, pr.SaldoActual, pr.Status 
                                        FROM Participante pr
                                        WHERE 
                                        pr.SaldoActual <> 0
                                        AND pr.Status = 0
                                        AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                        
                                      ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        public function geTSinSaldoInactivo()
        {
    		$query = $this->db->query("
                                        SELECT pr.codParticipante, pr.PrimerNombre, pr.SegundoNombre, 
                                        pr.ApellidoPaterno, pr.ApellidoMaterno, pr.Telefono,
                                        pr.eMail, pr.SaldoActual, pr.Status 
                                        FROM Participante pr
                                        WHERE 
                                        pr.SaldoActual = 0
                                        AND pr.Status = 0
                                        AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                        
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