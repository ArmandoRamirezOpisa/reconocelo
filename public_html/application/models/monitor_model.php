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

            /* Modelo Depositos */

            public function getFechaDeposito(){
                  $query = $this->db->query("
                        SELECT DISTINCT DATE_FORMAT( m.feMov,  '%Y %m' ) AS Fecha
                        FROM PartMovsRealizados m
                        JOIN Participante p ON p.idParticipante = m.idParticipante
                        WHERE p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                        AND p.CodPrograma =41
                        AND feMov >=  '20180101'
                        ORDER BY Fecha
                  ");
                  if ($query->num_rows() > 0)
                  {
                        return $query->result_array(); 
                  }else{
                        return false;
                  }
            }

            public function getDeposito()
            {
    		      $query = $this->db->query("
                        SELECT m.noFolio, p.idParticipante,
                        CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', 
                        p.ApellidoMaterno ) AS Nombre, DATE_FORMAT( m.feMov,  '%Y %m %d' ) AS Fecha, 
                        m.dsMov AS Descripcion, 
                        m.noPuntos AS Puntos
                        FROM PartMovsRealizados m
                        JOIN Participante p ON p.idParticipante = m.idParticipante
                        WHERE p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                        AND p.CodPrograma =41
                        AND feMov >=  '20180101'
                        ORDER BY Fecha
                  ");
    		      if ($query->num_rows() > 0)
    		      {
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function getDepositoFechas($infoFechas)
            {
    		      $query = $this->db->query("
                        SELECT m.noFolio, p.idParticipante,CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', 
                        p.ApellidoPaterno,  ' ', p.ApellidoMaterno ) AS Nombre, 
                        DATE_FORMAT( m.feMov, '%Y %m %d' ) AS Fecha, m.dsMov AS Descripcion, 
                        m.noPuntos AS Puntos
                        FROM PartMovsRealizados m
                        JOIN Participante p ON p.idParticipante = m.idParticipante
                        WHERE p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                        AND p.CodPrograma = 41
                        AND DATE_FORMAT( m.feMov,  '%Y %m' ) >= '".$infoFechas['fechaInicio']."'
                        AND DATE_FORMAT( m.feMov,  '%Y %m' ) <= '".$infoFechas['fechaFin']."'
                        ORDER BY Fecha
                  ");
    		      if ($query->num_rows() > 0)
    		      {
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function insertDepositoMasivo($usuario){
                  $query = $this->db->query("                            
                        INSERT INTO `opisa_opisa`.`despositos_dev`(`fhDeposito`, `idParticipanteCliente`, `standBy`) 
                        VALUES (NOW(),'".$this->session->userdata('CodEmpresa')."',0)
                  ");
    	            if ($query)
    	            {
                        return $this->db->insert_id();
    	            }else{
                        return false;
    	            }
            }

            public function insertDepositoDetalleMasivo($infoDepositosNews,$depositoMasivo){
                  $valorReturn = 0;
                  if($infoDepositosNews){
                        foreach($infoDepositosNews as $row){
                              foreach($row as $row1){
                                    $valoresDefinidosDepositos = explode(",",$row1);
                                    if(! isset($valoresDefinidosDepositos[0]) || ! isset($valoresDefinidosDepositos[1]) || ! isset($valoresDefinidosDepositos[2]) ){
                                          $valoresDefinidosDepositos[0] = null;
                                          $valoresDefinidosDepositos[1] = null;
                                          $valoresDefinidosDepositos[2] = null;
                                    }else{
                                          if($valoresDefinidosDepositos[0] == "Cliente" || $valoresDefinidosDepositos[1] == "Puntos" || $valoresDefinidosDepositos[2] == "Concepto"){}
                                          else{
                                                $query = $this->db->query("
                                                      INSERT INTO `opisa_opisa`.`depositosDet_dev`(`idDeposito`, 
                                                      `idParticipanteCliente`, `Puntos`, `Concepto`, 
                                                      `fechaRegistro`, `status`) 
                                                      VALUES ('".$depositoMasivo."','".$valoresDefinidosDepositos[0]."',
                                                      '".$valoresDefinidosDepositos[1]."','".$valoresDefinidosDepositos[2]."',
                                                      NOW(),0)
                                                ");
                                                if ($query)
    	                                          {
                                                      $valorReturn = $this->db->insert_id();
    	                                          }else{
                                                      $valorReturn = false;
    	                                          }
                                          }                                           
                                    }
                              }
                        }
                  }
                  return $valorReturn;
            }

            public function totalPuntos($depositoMasivo){
                  $query = $this->db->query("
                        SELECT SUM( Puntos ) AS Puntos
                        FROM depositosDet_dev
                        WHERE idDeposito ='".$depositoMasivo."'
                  ");
    		      if ($query->num_rows() > 0)
    		      {
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function verDepositosUsuario(){
                  $query = $this->db->query("
                        SELECT idDeposito
                        FROM  `despositos_dev` 
                        WHERE idParticipanteCliente ='".$this->session->userdata('CodEmpresa')."'
                        AND standBy = 0
                  ");
    		      if ($query->num_rows() > 0)
    		      {
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function getDepositosDet($numTransaccion){
                  $query = $this->db->query("
                        SELECT idDeposito, idParticipanteCliente, Puntos, Concepto, STATUS 
                        FROM depositosDet_dev
                        WHERE idDeposito =".$numTransaccion['numTransaccion']."
                  ");
    		      if ($query->num_rows() > 0)
    		      {
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function UpdateSaldoParticipante($idParticipanteCliente,$Puntos){
                  $query = $this->db->query("
                        UPDATE `Participante`
                        SET SaldoActual = SaldoActual + ".$Puntos."
                        WHERE idParticipanteCliente =".$idParticipanteCliente."
                        AND codPrograma = 41
                        AND codEmpresa = ".$this->session->userdata('CodEmpresa')."
                  ");
			if ($query){
			        return true;
			}else{
				return false;
			}
            }

            public function UpdateDepositosDet($numTransaccion,$idParticipanteCliente){
                  $query = $this->db->query("
                        UPDATE `depositosDet_dev` 
                        SET `status`= 1 
                        WHERE `idDeposito` = ".$numTransaccion['numTransaccion']." 
                        and `idParticipanteCliente` = ".$idParticipanteCliente
                        );
			if ($query){
			        return true;
			}else{
				return false;
			}
            }

            public function idParticipanteGet($IdParticipanteCliente){
                  $query = $this->db->query("
                        SELECT idParticipante
                        FROM  `Participante` 
                        WHERE codPrograma =41
                        AND codEmpresa =".$this->session->userdata('CodEmpresa')."
                        AND idParticipanteCliente =".$IdParticipanteCliente."
                  ");
    		      if ($query->num_rows() > 0)
    		      {
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function insertPartMovsRealiza($idParticipanteCliente,$Concepto,$Puntos){
                  $query = $this->db->query("
                        INSERT INTO `opisa_opisa`.`PartMovsRealizados`(`idParticipante`, `feMov`, `dsMov`, 
                        `noPuntos`) VALUES (".$idParticipanteCliente.",NOW(),'".$Concepto."',".$Puntos.")
                  ");
                  if ($query){
                        $valorReturn = $this->db->insert_id();
    	            }else{
                        $valorReturn = false;
    	            }
            }

            public function UpdateMasterDeposito($numTransaccion){
                  $query = $this->db->query("
                        UPDATE  `opisa_opisa`.`despositos_dev` 
                        SET  `standBy` =  '1' 
                        WHERE  `despositos_dev`.`idDeposito` = ".$numTransaccion['numTransaccion'].";
                  ");//Este no quiere actualizar
			if ($query){
			      return true;
			}else{
				return false;
			}
            }
            /* Fin Modelo Depositos */

            /* Modelo Canjes */

            public function getFechaCanje(){
                  $query = $this->db->query("
                      SELECT DISTINCT DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) AS Fecha
                      FROM PreCanje pc
                      JOIN Participante p ON p.idParticipante = pc.idParticipante
                      WHERE p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                      AND p.CodPrograma =41
                      AND feSolicitud >=  '20180101'
                      ORDER BY Fecha
                  ");
                  if ($query->num_rows() > 0)
                  {
                      return $query->result_array(); 
                  }else{
                      return false;
                  }
            }

            public function getCanje()
            {
                  $query = $this->db->query("
                        SELECT idCanje, p.idParticipante, 
                        CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', p.ApellidoMaterno ) 
                        AS Nombre, pc.feSolicitud, pc.fhExp, pcd.PuntosXUnidad
                        FROM PreCanje pc, Participante p, PreCanjeDet pcd
                        WHERE pc.idParticipante = p.idParticipante
                        AND pc.idCanje = pcd.noFolio
                        AND pc.codPrograma =41
                        AND p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                        ORDER BY pc.feSolicitud
                  ");
                  if ($query->num_rows() > 0)
                  {
                        return $query->result_array(); 
                  }else{
                        return false;
                  }
            }

            public function getCanjeFechas($infoFechas)
            {
                  $query = $this->db->query("
                        SELECT idCanje, p.idParticipante, 
                        CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', p.ApellidoMaterno ) 
                        AS Nombre, pc.feSolicitud, pc.fhExp, pcd.PuntosXUnidad
                        FROM PreCanje pc, Participante p, PreCanjeDet pcd
                        WHERE pc.idParticipante = p.idParticipante
                        AND pc.idCanje = pcd.noFolio
                        AND pc.codPrograma =41
                        AND p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                        AND DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) >= '".$infoFechas['fechaInicio']."'
                        AND DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) <= '".$infoFechas['fechaFin']."'
                        ORDER BY Fecha
                  ");
                  if ($query->num_rows() > 0)
                  {
                        return $query->result_array(); 
                  }else{
                        return false;
                  }
            }
            /* Fin Modelo canjes */
      }
?>
