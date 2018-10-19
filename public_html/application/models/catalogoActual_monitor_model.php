<?php
    class CatalogoActual_monitor_model extends CI_Model {
    	
    	public function __construct()
    	{
    		
    	}
        
        public function getCatalogo()
        {
    		$query = $this->db->query("
                                          SELECT categoria.nbCategoria AS categoria, pre.codPremio, 
                                          pre.Nombre_Esp AS nombrePremio, pre.Marca, pre.Modelo, 
                                          prePro.ValorPuntos AS Puntos
                                          FROM PremioPrograma prePro, t213kpCategoriaPremio categoria, Premio pre
                                          WHERE prePro.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                                          AND prePro.codPrograma =41
                                          AND categoria.CodCategoria = prePro.codCategoria
                                          AND pre.codPremio = prePro.codPremio
                                        
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