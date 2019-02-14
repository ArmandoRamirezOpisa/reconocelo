<?php
      class Cuenta_model extends CI_Model {
    	
    	      public function __construct(){}
        
            public function getEdoCuenta(){
    		      $query = $this->db->query("
                        SELECT *
                        FROM PartMovimientos 
                        WHERE codPrograma = ".$this->session->userdata('programa')."
                              AND codParticipante = ".$this->session->userdata('participante')."
                              AND codEmpresa = ".$this->session->userdata('empresa')."
                        ORDER BY Act_Fecha DESC
                  ");
    		      if ($query->num_rows() > 0)
    		      {
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function checkMailExitsReconocelo($usuarioEmailReconocelo){
                  $query = $this->db->query("
                        SELECT loginWeb, CodPrograma, codEmpresa, idParticipante, PrimerNombre
                        FROM  `Participante` 
                        WHERE codPrograma =41
                        AND eMail =  '".$usuarioEmailReconocelo['usuarioEmailReconocelo']."'
                  ");
                  if ($query->num_rows() > 0){
                  return $query->result_array(); 
                  }else{
                  return false;
                  }
            }

            public function cambiarPasswordNewReconocelo($passwordConfigReconocelo){
                  $query = $this->db->query("
                        UPDATE `Participante` SET `pwd`=".$passwordConfigReconocelo['passwordNewReconocelo']." 
                        WHERE loginWeb = ".$passwordConfigReconocelo['loginWeb']."
                        and idParticipante = ".$passwordConfigReconocelo['idParticipante']."
                  ");
			if ($query){
			        return true;
			}else{
				return false;
			}
            }
      }
?>