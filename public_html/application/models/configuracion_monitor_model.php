<?php
    class Configuracion_monitor_model extends CI_Model {
    	
    	public function __construct(){}
        
        public function cambiarNombre($usuario){
            $query = $this->db->query("
                UPDATE `administrador` SET `Usuario`='".$usuario['usuario']." '
                WHERE `CodEmpresa` = ".$this->session->userdata('CodEmpresa')."
            ");
			if ($query){
			        return true;
			}else{
				return false;
			}
        }

        public function cambiarPassword($password){
            $query = $this->db->query("
                UPDATE `administrador` SET `Pwd`=".$password['password']." 
                WHERE `CodEmpresa` = ".$this->session->userdata('CodEmpresa')."
            ");
			if ($query){
			        return true;
			}else{
				return false;
			}
        }

        public function checkMailExits($email){
            $query = $this->db->query("
                SELECT Usuario, CodEmpresa
                FROM administrador
                WHERE email =  '".$email['email']."'
            ");
    		if ($query->num_rows() > 0){
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }

        public function cambiarPasswordNew($passwordConfig){
            $query = $this->db->query("
                UPDATE `administrador` SET `Pwd`=".$passwordConfig['password']." 
                WHERE `CodEmpresa` = ".$passwordConfig['codEmpresa']."
                AND `Usuario` = '".$passwordConfig['usuario']."'
            ");
			if ($query){
			        return true;
			}else{
				return false;
			}
        }

    }
?>