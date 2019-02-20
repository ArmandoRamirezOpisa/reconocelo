<?php
    class Reglas_model extends CI_Model {
    	
    	      public function __construct(){}
        
            public function getRules(){
    		      $query = $this->db->query("
                        SELECT * 
                        FROM reglas
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
                        FROM  `reglas` 
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
      }
?>