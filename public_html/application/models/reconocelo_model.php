<?php
    class Reconocelo_model extends CI_Model {
    	
        public function __construct(){}
        
        //Login Reconocelo
        public function loginReconocelo($loginReconoceloData){
            $query = $this->db->query("
                SELECT pp.codPrograma,pp.codEmpresa,pp.codParticipante,pp.Status,pp.Cargo,
                pp.PrimerNombre,pp.SegundoNombre,pp.ApellidoPaterno,pp.ApellidoMaterno,pp.eMail,
                pp.SaldoActual,pp.idParticipante,pp.CalleNumero, pp.Colonia, pp.CP,pp.Ciudad,pp.Estado,
                pp.eMail,pp.Telefono,pp.fhInicioOrden,pp.fhFinOrden,Emp.Visibilidad,pp.pwd
                FROM Participante AS pp 
                INNER JOIN Empresa as Emp ON (pp.codPrograma = Emp.CodPrograma and pp.CodEmpresa= Emp.CodEmpresa)
                WHERE pp.codPrograma = 41 
                AND pp.loginWeb = '".$loginReconoceloData["usuarioReconocelo"]."' 
                AND pwd = md5('".$loginReconoceloData["passwordReconocelo"]."')
                AND pp.Status = 1
            ");
            if ($query->num_rows() == 1){
                return $query->result_array(); 
            }else{
                return false;
            }
        }

        //Barra navbar (Menu de opciones)
        public function getCategory(){
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
        }

        /* Funciones premios */

        //Obtiene los premios
        public function getAwards($idCat){
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
        }

        //Obtiene el premio
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

        /* Fin funciones premios */

        /* Funciones Canjes Reconocelo */
        public function misPreCanjes(){
            $query=$this->db->query("
                SELECT p.idCanje,p.feSolicitud,d.Cantidad,pr.Nombre_Esp,d.Status,d.Mensajeria,
                d.NumeroGuia,d.Cantidad*d.PuntosXUnidad *-1 as puntos
                FROM PreCanje p
                INNER JOIN PreCanjeDet d on d.noFolio = p.idCanje
                INNER join Premio pr ON pr.codPremio = d.CodPremio 
                WHERE  
                p.codPrograma = ".$this->session->userdata('programa')."
                AND p.idParticipante = ".$this->session->userdata('idPart')."
                UNION ALL SELECT p.NoFolio as idCanje, p.feMov as feSolicitud,null as Cantidad, 
                dsMov as Nombre_Esp, '-' as Status,'-' as Mensajeria,'-' as NumeroGuia,
                noPuntos as puntos 
                from PartMovsRealizados p  
                where p.idParticipante = ".$this->session->userdata('idPart')."
            ");
            if ($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        /* Fin Funciones Canjes Reconocelo */

	}
?>