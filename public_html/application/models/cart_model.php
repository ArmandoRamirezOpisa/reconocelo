<?php
    class Cart_model extends CI_Model {
    	
            public function __construct(){}
            
            /*public function getAwards($idCat){
                  $query = $this->db->query("
                        SELECT DISTINCT (p.codPremio) AS codPremio, p.Nombre_Esp, p.Caracts_Esp, pp.ValorPuntos
                        FROM Premio p
                        INNER JOIN PremioPrograma pp ON pp.codPremio = p.codPremio
                        JOIN Empresa e ON e.codPrograma = pp.codPrograma
                        AND e.codEmpresa = pp.codEmpresa
                        WHERE pp.codPrograma =". $this->session->userdata('programa')."
                        AND pp.CodCategoria =".$idCat."
                        AND pp.CodEmpresa = ".$this->session->userdata('empresa')."
                        AND ( e.catalogoVisible =1
                        OR pp.ValorPuntos <= ( 
                        SELECT saldoActual
                        FROM Participante
                        WHERE codPrograma = pp.codPrograma
                        AND codEmpresa =".$this->session->userdata('empresa')."
                        AND codParticipante =".$this->session->userdata('participante')." )
                        )
                        ORDER BY pp.ValorPuntos DESC , p.codPremio
                  ");
                  if ($query->num_rows() > 0)
                  {
                  return $query->result_array(); 
                  }else{
                  return false;
                  }
                  
            }*/
            
            /*public function getCategory(){
                  $query = $this->db->query("
                        SELECT distinct(cp.nbCategoria) as nbCategoria,cp.CodCategoria                                          
                        FROM t213kpCategoriaPremio cp 
                        JOIN PremioPrograma pp ON pp.codCategoria = cp.codCategoria                                 
                        WHERE pp.CodEmpresa = ".$this->session->userdata('empresa')."
                        AND pp.codPrograma = ".$this->session->userdata('programa')." 
                        ORDER BY cp.nbCategoria
                  ");
                  if ($query->num_rows() > 0)
                  {
                        return $query->result_array(); 
                  }else{
                        return false;
                  }
            }*/
            
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