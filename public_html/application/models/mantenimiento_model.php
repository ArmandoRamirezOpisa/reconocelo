<?php
    class Login_model extends CI_Model {
    	
        public function __construct(){}
        
        public function login($loginMantenimientoData)
        {
            $usuario =$loginMantenimientoData['usuario'];
            $password = $loginMantenimientoData['password'];
                        
            $query = $this->db->query("
                SELECT pp.codPrograma,pp.codEmpresa,pp.codParticipante,pp.Status,pp.Cargo,
                pp.PrimerNombre,pp.SegundoNombre,pp.ApellidoPaterno,pp.ApellidoMaterno,pp.eMail,
                pp.SaldoActual,pp.idParticipante,pp.CalleNumero, pp.Colonia, pp.CP,pp.Ciudad,pp.Estado,
                pp.eMail,pp.Telefono,pp.fhInicioOrden,pp.fhFinOrden,Emp.Visibilidad,pp.pwd
                FROM Participante AS pp 
                INNER JOIN Empresa as Emp ON (pp.codPrograma = Emp.CodPrograma and pp.CodEmpresa= Emp.CodEmpresa)
                WHERE pp.codPrograma = 41 
                AND pp.loginWeb = '".$usuario."' 
                AND pwd = '".$password."'
                AND pp.Status = 1
            ");
            if ($query->num_rows() == 1){

                return $query->result_array(); 

            }else{

                  return false;

            }
        }
        
	}
?>