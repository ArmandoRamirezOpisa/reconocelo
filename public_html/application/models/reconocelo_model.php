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

        public function saldoActualParticipante(){
            $query=$this->db->query("
                SELECT SaldoActual
                FROM  `Participante` 
                WHERE codPrograma =".$this->session->userdata('programa')."
                AND idParticipante = " .$this->session->userdata('idPart')."                                     
            ");
            if ($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function checkAddCanje(){
            $address = $this->input->post("address");
            $query=$this->db->query("
                SELECT codPrograma, idParticipante, noTipoEntrega, CalleNumero, Colonia, CP, 
                Ciudad, Estado, Telefono, referencias
                FROM  `PreCanje` 
                WHERE codPrograma = ".$this->session->userdata('programa')."
                AND idParticipante = ".$this->session->userdata('idPart')."
                AND noTipoEntrega = 1
                AND CalleNumero = '".$_POST["address"][0]["value"]."'
                AND Colonia = '".$_POST["address"][1]["value"]."'
                AND CP = '".$_POST["address"][4]["value"]."'
                AND Ciudad = '".$_POST["address"][2]["value"]."'
                AND Estado = '".$_POST["address"][3]["value"]."'
                AND Telefono = '".$_POST["address"][5]["value"]."'
                AND referencias = '".$_POST["address"][6]["value"]."'
            ");
            if ($query->num_rows() > 0){
                return $query->result_array(); 
            }else{
                return false;
            }
        }

        public function addCanje(){
            $address = $this->input->post("address");
            $query = $this->db->query("
                INSERT INTO `opisa_opisa`.PreCanje (codPrograma,idParticipante,noTipoEntrega,CalleNumero,Colonia,
                CP,Ciudad,Estado,Telefono,referencias)
                VALUES (".$this->session->userdata('programa').",
                ".$this->session->userdata('idPart').",1,'".$_POST["address"][0]["value"]."',
                '".$_POST["address"][1]["value"]."','".$_POST["address"][4]["value"]."'
                ,'".$_POST["address"][2]["value"]."','".$_POST["address"][3]["value"]."'
                ,'".$_POST["address"][5]["value"]."','".$_POST["address"][6]["value"]."')
            ");
            if ($query)
            {
                return $this->db->insert_id();
            }else{
                return false;
            }  
        }

        public function addDetCanje($datos,$noFolio){
            $err = 0;
            $nItem = 1;
            foreach($datos as $d){
                $query = $this->db->query("
                    INSERT INTO `opisa_opisa`.PreCanjeDet (idParticipante,noFolio,idPreCanjeDet,CodPremio,
                    cantidad,PuntosXUnidad)
                    VALUES (".$this->session->userdata('idPart').",".$noFolio.",".$nItem.",
                    ".$d->id.",".$d->cantidad.",".$d->puntos.")
                ");
                if (!$query)
                {
                    $err ++;
                }else{
                    $nItem++;
                }
            }
            if ($err > 0){
                return false;
            }
                return true;
        }

        public function updSaldo($ptsCanje){
            $query = $this->db->query("
                UPDATE Participante 
                SET SaldoActual = SaldoActual - ".$ptsCanje."
                WHERE idParticipante = ".$this->session->userdata('idPart')
            );
            if ($query){
                return true;
            }else{
                return false;
            }
        }

        public function misOrdenesFolio(){
            $query=$this->db->query("
                SELECT idCanje 
                FROM PreCanje 
                where idParticipante =  " .$this->session->userdata('idPart')." 
                and codPrograma = ".$this->session->userdata('programa')."
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