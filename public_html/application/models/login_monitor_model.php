<?php
    class Login_monitor_model  extends CI_Model{
   
        public function loadData($datos){
            $usuario =$datos['usuario'];
            $password = $datos['password'];
            $query = $this->db->query("          
                SELECT adm.CodEmpresa,adm.CodPrograma,emp.NombreOficial as empresa 
                FROM opisa_opisa.administrador as adm inner join opisa_opisa.Programa as
                pr on adm.CodPrograma = pr.codPrograma
                inner join opisa_opisa.Empresa as emp on emp.codEmpresa = adm.CodEmpresa 
                and adm.Usuario = '".$usuario."' and adm.Pwd = '".$password."'                                       
            ;");
        
            if ($query) {
                return $query->result_array() ;
            }else{
                $query=array();
                return $query;
            }
        }
 
        public function loadParticipantes(){

            $query = $this->db->query("
                select codParticipante,Cargo,PrimerNombre,idParticipante,SaldoActual,
                PuntosEspera from opisa_opisa.Participante
                where codPrograma = 41  and codEmpresa = 41160 and Periodo = '".'2018-01-01'."'
            ;");
        
            if ($query) {
                return $query->result_array() ;
            }else{
                $query=array("Peter" => "35", "Ben" => "37", "Joe" => "43");
                return $query;
            }
        }

        public function misPreCanjes($idParticipante){
            $query=$this->db->query("
                SELECT p.idCanje,p.feSolicitud,d.Cantidad,pr.Nombre_Esp,d.Status,d.Mensajeria,d.NumeroGuia,
                d.Cantidad*d.PuntosXUnidad *-1 as puntos
                FROM PreCanje p
                INNER JOIN PreCanjeDet d on d.noFolio = p.idCanje
                INNER join Premio pr ON pr.codPremio = d.CodPremio 
                WHERE  p.codPrograma = ".$this->session->userdata('CodPrograma')."
                AND p.idParticipante = ".$idParticipante."
                UNION ALL 
                    SELECT p.NoFolio as idCanje, p.feMov as feSolicitud,null as Cantidad, dsMov as Nombre_Esp, 
                    '-' as Status,'-' as Mensajeria,'-' as NumeroGuia,noPuntos as puntos 
                    from PartMovsRealizados p  
                    where p.idParticipante = ".$idParticipante." "
            );
            if ($query->num_rows() > 0){
                return $query->result_array(); 
            }else{
                return false;
            }
        }
    }
?>
