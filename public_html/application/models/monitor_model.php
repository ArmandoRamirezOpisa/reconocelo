<?php
    class Monitor_model  extends CI_Model{
   
        public function loadData($datos){
            $usuario =$datos['usuario'];
            $password = $datos['password'];
            $query = $this->db->query("          
                SELECT adm.CodEmpresa,adm.CodPrograma,adm.Usuario,adm.email,emp.NombreOficial as empresa
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

        /* Modelo participantes */

        //Todos los participantes
        public function getTodosParticipantes(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante ,pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status, pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        //Participantes con saldo
        public function geTParticipantesSaldo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status, pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual <> 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        //Participantes sin saldo
        public function geTParticipantesSinSaldo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual = 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        //Participantes todos activos
        public function geTodoSaldoActivo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.Status = 1
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        //Participantes todos inactivos
        public function geTodoInactivo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.Status = 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        //Participantes activos con saldo
        public function getSaldoActivo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual <> 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
                  AND pr.Status = 1
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        //Participantes con saldo inactivos
        public function geTSaldoInactivo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual <> 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
                  AND pr.Status = 0
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        //Participantes sin saldo activos
        public function geTSinSaldoActivo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual = 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
                  AND pr.Status = 1
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        //Participantes sin saldo inactivos
        public function geTSinSaldoInactivo(){
            $query = $this->db->query("
                  SELECT pr.codParticipante, pr.idParticipante, pr.PrimerNombre, pr.Telefono, pr.eMail, 
                  pr.SaldoActual, pr.Status,pr.idParticipante
                  FROM Participante pr
                  WHERE pr.codPrograma =41
                  AND pr.SaldoActual = 0
                  AND pr.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  AND pr.Considerar =1
                  AND pr.codParticipante <>1
                  AND pr.Status = 0
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        public function participanteInfoData($infoParticipante){
            $query = $this->db->query("
                  SELECT codPrograma, codEmpresa, codParticipante
                  FROM Participante
                  WHERE idParticipante =".$infoParticipante['codParticipante']."
            ");
            if ($query->num_rows() > 0){
                  return $query->result_array(); 
            }else{
                  return false;
            }
        }

        public function movimientosDeParticipante($codPrograma,$codEmpresa,$codParticipante){
            $query = $this->db->query("
                  select c.idCanje as Folio, c.feSolicitud as Fecha, d.cantidad,d.codPremio, 
                  pr.Nombre_Esp as Descripcion,d.PuntosXUnidad*d.cantidad*-1 as Puntos
                  FROM PreCanje c JOIN PreCanjeDet d on c.idParticipante=d.idParticipante 
                  and c.idCanje=d.noFolio JOIN Participante p on p.idParticipante=c.idParticipante
                  JOIN Premio pr on pr.codPremio=d.codPremio
                  WHERE p.codPrograma=".$codPrograma."
                  and p.codEmpresa=".$codEmpresa."
                  and p.codParticipante=".$codParticipante." 
                  and c.Status=1
                  UNION ALL
                  SELECT m.noFolio as Folio, m.feMov as Fecha, 1 as cantidad, 0 as codPremio, 
                  m.dsMov as Descripcion, m.noPuntos as Puntos
                  FROM PartMovsRealizados m Join Participante p on p.idParticipante=m.idParticipante
                  WHERE p.codPrograma = ".$codPrograma."
                  AND p.codEmpresa = ".$codEmpresa."
                  AND p.codParticipante=".$codParticipante."
                  ORDER BY 2,1
            ");
            if($query->num_rows()>0){
                  return $query->result_array();
            }else{
                  return false;
            }
        }
        /* Fin Modelo participantes*/
    }
?>
