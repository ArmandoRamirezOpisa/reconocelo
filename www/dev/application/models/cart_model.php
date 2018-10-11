<?php
    class Cart_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}
        
        public function getAwards($idCat)
        {
    		$query = $this->db->query("
                                         SELECT DISTINCT(p.codPremio) as codPremio,p.Nombre_Esp,p.Caracts_Esp,pp.ValorPuntos
                                         FROM Premio p 
                                         INNER JOIN PremioPrograma pp ON pp.codPremio = p.codPremio 
                                         WHERE pp.codPrograma = ". $this->session->userdata('programa')."
                                               AND pp.CodCategoria = ".$idCat."
                                               AND pp.codEmpresa = ".$this->session->userdata('empresa')."
                                         ORDER BY pp.ValorPuntos DESC,p.codPremio
                                        
                                      ");
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }
        
        public function getCategory()
        {
              //Si la cuenta con la que se ingresa a la plataforma es la usada como DEMO, se visualizarán todas las categorias, de lo contrario solo se habilitaran las categorias que contienen premios menores o iguales al saldo del participante.

              if ($this->session->userdata('idPart') == 89526)
              {
                  $w = "";
              }else{
                  if ($this->session->userdata('visibilidad') == 0)
                  {
                    $w = "AND pp.codCategoria = ".$this->session->userdata('categoria');
                  }else{
                      $w = "";
                  }
              }
              
              //Obtiene las categorias correspondientes a la empresa indicada en la tabla de premios
              //Cada empresa puede tener categorias diferentes
              //Si la visibilidad es = 0, el participante solo visualizara la categoría que le corresponde,
              //      visibilidad es = 1, el participante visualizara todas las categorías.
              $query = $this->db->query("
                                        SELECT distinct(cp.nbCategoria) as nbCategoria,cp.CodCategoria                                          
                                        FROM t213kpCategoriaPremio cp 
                                        JOIN PremioPrograma pp ON pp.codCategoria = cp.codCategoria                                 
                                        WHERE cp.esBaja=0 AND pp.codPrograma = ".$this->session->userdata('programa')."
                                          AND codEmpresa = ".$this->session->userdata('empresa')."
                                          ".$w. "
                                        ORDER BY cp.nbCategoria
                                                
                                      ");
    		if ($query->num_rows() > 0)
    		{
                    return $query->result_array(); 
    		}else{
                    return false;
    		}
        }
        
        public function getDataItem($idItem)
        {
    		$query = $this->db->query("
                                         SELECT p.codPremio,p.Nombre_Esp,p.Caracts_Esp,pp.ValorPuntos
                                         FROM Premio p 
                                         INNER JOIN PremioPrograma pp ON pp.codPremio = p.codPremio 
                                         WHERE pp.codPrograma = ". $this->session->userdata('programa')." 
                                         AND p.codPremio = ".$idItem
                                      );
    		if ($query->num_rows() > 0)
    		{
                return $query->result_array(); 
    		}else{
                return false;
    		}
        }
        
    }
?>