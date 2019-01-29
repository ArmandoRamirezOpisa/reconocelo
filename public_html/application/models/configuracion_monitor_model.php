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

    }
?>