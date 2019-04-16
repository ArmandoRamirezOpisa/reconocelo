<?php
      class Catalogo_monitor_model extends CI_Model {
    	
    	      public function __construct(){}
        
            public function getCatalogo(){
                  $query = $this->db->query("
                        SELECT pp.codPrograma, pp.codEmpresa, c.codCategoria, c.nbCategoria as Categoria, 
                        pr.codPremio, pr.Nombre_Esp as Premio, Caracts_Esp, Marca, Modelo, pp.ValorPuntos 
                        FROM Premio pr 
                        JOIN PremioPrograma pp on pr.codPremio=pp.codPremio
                        JOIN t213kpCategoriaPremio c on c.codCategoria=pr.codCategoria
                        WHERE pp.codPrograma='41' and pp.codEmpresa='".$this->session->userdata('CodEmpresa')."'
                        ORDER BY 10,5
                  ");
    		      if ($query->num_rows() > 0){
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function getDescripcionIMG($codPremio){
                  $query = $this->db->query("
                        SELECT  `Caracts_Esp` 
                        FROM  `Premio` 
                        WHERE  `codPremio` =".$codPremio['codPremio']."
                  ");
                  if ($query->num_rows() > 0){
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }
      }
?>