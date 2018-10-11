<?php
    class Login_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}

        
        public function login($datos)
        {
       		$emp=substr($datos["usuario"],0,5);
    		$part=intval(substr($datos["usuario"],5,3));
			
    		$query = $this->db->query("
                                         SELECT p.codPrograma,p.codEmpresa,p.codParticipante,p.Status,Cargo,PrimerNombre,SegundoNombre,ApellidoPaterno,ApellidoMaterno,
                                                p.eMail,p.SaldoActual,p.idParticipante,p.CalleNumero, p.Colonia, p.CP,p.Ciudad,p.Estado,p.Telefono,p.codCategoria,
                                                e.Visibilidad,p.fhInicioOrden,p.fhFinOrden
                                         FROM Participante p
                                         INNER JOIN Empresa e ON e.codEmpresa = p.codEmpresa AND e.codPrograma = p.codPrograma 
                                         WHERE p.codPrograma = 41 AND p.codEmpresa = ".$emp." AND p.codParticipante = ".$part." AND pwd = '".$datos["password"]."'                                        
                                      ");
    		if ($query->num_rows() == 1)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }
	}
?>