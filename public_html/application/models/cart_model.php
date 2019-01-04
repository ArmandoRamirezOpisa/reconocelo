<?php
    class Cart_model extends CI_Model {
    	
            public function __construct(){}
            
            public function getAwards($idCat){
                  if(($this->session->userdata('idPart') == 89526) || ($this->session->userdata('Visibilidad')== 1)) {
                        $query = $this->db->query("
                              SELECT DISTINCT(p.codPremio) as codPremio,p.Nombre_Esp,p.Caracts_Esp,pp.ValorPuntos
                              FROM Premio p 
                              INNER JOIN PremioPrograma pp ON pp.codPremio = p.codPremio 
                              WHERE pp.codPrograma = ". $this->session->userdata('programa')." 
                              AND p.CodCategoria = ".$idCat." and pp.CodEmpresa = ".$this->session->userdata('empresa')."
                              ORDER BY pp.ValorPuntos DESC,p.codPremio                
                        ");
                        if ($query->num_rows() > 0)
                        {
                              return $query->result_array(); 
                        }else{
                              return false;
                        }
                  
                  }
                  
                  $query = $this->db->query("
                        SELECT DISTINCT(p.codPremio) as codPremio,p.Nombre_Esp,p.Caracts_Esp,pp.ValorPuntos
                        FROM Premio p 
                        INNER JOIN PremioPrograma pp ON pp.codPremio = p.codPremio 
                        WHERE pp.codPrograma = ". $this->session->userdata('programa')." 
                        AND pp.CodCategoria = ".$idCat." 
                        and pp.CodEmpresa = ".$this->session->userdata('empresa')."
                        and pp.ValorPuntos <= (select saldoActual from Participante 
                                                where codPrograma = pp.codPrograma 
                                                and codEmpresa = ".$this->session->userdata('empresa')." 
                                                and codParticipante = ".$this->session->userdata('participante')." ) 
                        ORDER BY pp.ValorPuntos DESC,p.codPremio
                  ");
                  if ($query->num_rows() > 0)
                  {
                  return $query->result_array(); 
                  }else{
                  return false;
                  }
                  
            }
            
            public function getCategory(){
                  if (($this->session->userdata('idPart') == 89526) || ($this->session->userdata('Visibilidad')== 1)){
                        $w = "";
                  }else{
                        $w = "AND pp.ValorPuntos <= ".$this->session->userdata('puntos');
                  }
                  $query = $this->db->query("
                        SELECT distinct(cp.nbCategoria) as nbCategoria,cp.CodCategoria                                          
                        FROM t213kpCategoriaPremio cp 
                        JOIN PremioPrograma pp ON pp.codCategoria = cp.codCategoria                                 
                        WHERE cp.esBaja=0 
                        AND  pp.CodEmpresa = ".$this->session->userdata('empresa')."
                        AND pp.codPrograma = ".$this->session->userdata('programa')." 
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
            
            public function getDataItem($idItem){
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