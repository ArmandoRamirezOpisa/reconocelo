<?php
      class Reglas_model extends CI_Model {
    	
    	      public function __construct(){}
        
            public function getRules(){
    		      $query = $this->db->query("
                        SELECT * 
                        FROM Reglas
                        WHERE codEmpresa = ".$this->session->userdata('empresa')."
                  ");
    		      if ($query->num_rows() > 0){
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function reglasReconocelo($codEmpresa,$CodPrograma){
                  $query = $this->db->query("
                        SELECT idReglaNombre,regla, descripcionRegla
                        FROM  `Reglas` 
                        WHERE codEmpresa ='".$codEmpresa."'
                        AND codPrograma ='".$CodPrograma."'
                        order by idRegla
                  ");
    		      if ($query->num_rows() > 0){
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function reglasReconoceloUpdate($dataReglaReconocelo){
                  $query = $this->db->query("
                        UPDATE `Reglas` 
                        SET `descripcionRegla`='".$dataReglaReconocelo['textoRegla']."' 
                        WHERE `codEmpresa`= '".$this->session->userdata('CodEmpresa')."'
                        AND `codPrograma`= '".$this->session->userdata('CodPrograma')."'
                        AND `idReglaNombre` = '".$dataReglaReconocelo['idReglaNombre']."'
                  ");
			if ($query){
			      return true;
			}else{
				return false;
			}
            }

            public function nombreReglasReconoceloUpdate($dataNombreReglaReconocelo){
                  $query = $this->db->query("
                        UPDATE `Reglas` 
                        SET `regla`='".$dataNombreReglaReconocelo['textCambiar']."' 
                        WHERE `codEmpresa`= '".$this->session->userdata('CodEmpresa')."'
                        AND `codPrograma`= '".$this->session->userdata('CodPrograma')."'
                        AND `idReglaNombre` = '".$dataNombreReglaReconocelo['idReglaNombre']."'
                  ");
			if ($query){
			      return true;
			}else{
				return false;
			}     
            }

            public function nuevaReglaReconocelo($dataNuevaRegla){
                  $query = $this->db->query("
                        INSERT INTO `opisa_opisa`.`Reglas`(`idReglaNombre`, `regla`, `descripcionRegla`, 
                        `codEmpresa`, `codPrograma`) VALUES (NOW(),'".$dataNuevaRegla['regla']."',
                        '".$dataNuevaRegla['descripcionRegla']."','".$this->session->userdata('CodEmpresa')."',
                        '".$this->session->userdata('CodPrograma')."');
                  ");
                  if ($query){
                        return $this->db->insert_id();
    	            }else{
                        return false;
    	            }
            }
      }
?>