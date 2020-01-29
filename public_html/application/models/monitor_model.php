<?php
      class Monitor_model  extends CI_Model{
            public function loadData($datos){
                  $usuario =$datos['usuario'];
                  $password = $datos['password'];
                  $query = $this->db->query("      
                        SELECT adm.CodEmpresa,adm.CodPrograma,adm.Usuario,adm.email,emp.NombreOficial as empresa
                        FROM opisa_opisa.Administrador as adm inner join opisa_opisa.Programa as
                        pr on adm.CodPrograma = pr.codPrograma
                        inner join opisa_opisa.Empresa as emp on emp.codEmpresa = adm.CodEmpresa
                        and adm.Usuario = '".$usuario."' and adm.Pwd = '".$password."'
                  ;");
                  if ($query) {
                        return $query->result_array();
                  }else{
                        $query=array();
                        return $query;
                  }
            }

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
                        FROM Canje c JOIN CanjeDetalle d on c.codPrograma=d.codPrograma
                        and c.idCanje=d.idCanje JOIN Participante p on p.idParticipante=c.idParticipante
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
                  if ($query->num_rows() > 0){
                        return $query->result_array();
                  }else{
                        return false;
                  }
            }

            public function getDeposito(){
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
    		      if ($query->num_rows() > 0){
                        return $query->result_array();
    		      }else{
                        return false;
    		      }
            }

            public function getDepositoFechas($infoFechas){
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
    		      if ($query->num_rows() > 0){
                        return $query->result_array();
    		      }else{
                        return false;
    		      }
            }

            public function insertDepositoMasivo($usuario){
                  $query = $this->db->query("              
                        INSERT INTO `opisa_opisa`.`Despositos`(`fhDeposito`, `idParticipanteCliente`, `standBy`)
                        VALUES (NOW(),'".$this->session->userdata('CodEmpresa')."',0)
                  ");
    	            if ($query){
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
                                                      INSERT INTO `opisa_opisa`.`DepositosDet`(`idDeposito`,
                                                      `idParticipanteCliente`, `Puntos`, `Concepto`,
                                                      `fechaRegistro`, `status`)
                                                      VALUES ('".$depositoMasivo."','".$valoresDefinidosDepositos[0]."',
                                                      '".$valoresDefinidosDepositos[1]."','".$valoresDefinidosDepositos[2]."',
                                                      NOW(),0)
                                                ");
                                                if ($query){
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
                        FROM DepositosDet
                        WHERE idDeposito ='".$depositoMasivo."'
                  ");
    		      if ($query->num_rows() > 0){
                        return $query->result_array();
    		      }else{
                        return false;
    		      }
            }

            public function verDepositosUsuario(){
                  $query = $this->db->query("
                        SELECT idDeposito
                        FROM  `Despositos`
                        WHERE idParticipanteCliente ='".$this->session->userdata('CodEmpresa')."'
                        AND standBy = 0
                  ");
    		      if ($query->num_rows() > 0){
                        return $query->result_array();
    		      }else{
                        return false;
    		      }
            }

            public function getDepositosDet($numTransaccion){
                  $query = $this->db->query("
                        SELECT idDeposito, idParticipanteCliente, Puntos, Concepto, STATUS
                        FROM DepositosDet
                        WHERE idDeposito =".$numTransaccion['numTransaccion']."
                  ");
    		      if ($query->num_rows() > 0){
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
                        UPDATE `DepositosDet`
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
    		      if ($query->num_rows() > 0){
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
                        UPDATE  `opisa_opisa`.`Despositos`
                        SET  `standBy` =  '1' 
                        WHERE  `Despositos`.`idDeposito` = ".$numTransaccion['numTransaccion'].";
                  ");
			if ($query){
			      return true;
			}else{
				return false;
			}
            }

            public function getFechaCanje(){
                  $query = $this->db->query("
                      SELECT DISTINCT DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) AS Fecha
                      FROM Canje pc
                      JOIN Participante p ON p.idParticipante = pc.idParticipante
                      WHERE p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                      AND p.CodPrograma =41
                      AND feSolicitud >=  '20180101'
                      ORDER BY Fecha
                  ");
                  if ($query->num_rows() > 0){
                      return $query->result_array();
                  }else{
                      return false;
                  }
            }

            public function getCanje(){
                  $query = $this->db->query("
                        SELECT pc.idCanje, p.idParticipante,
                        CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', p.ApellidoMaterno )
                        AS Nombre, pc.feSolicitud, pc.fhExp, pcd.PuntosXUnidad
                        FROM Canje pc, Participante p, CanjeDetalle pcd
                        WHERE pc.idParticipante = p.idParticipante
                        AND pc.idCanje = pcd.idCanje
                        AND pc.codPrograma =41
                        AND p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                        ORDER BY pc.feSolicitud
                  ");
                  if ($query->num_rows() > 0){
                        return $query->result_array();
                  }else{
                        return false;
                  }
            }

            public function getCanjeFechas($infoFechas){
                  $query = $this->db->query("
                        SELECT idCanje, p.idParticipante,
                        CONCAT( p.PrimerNombre,  ' ', p.SegundoNombre,  ' ', p.ApellidoPaterno,  ' ', p.ApellidoMaterno )
                        AS Nombre, pc.feSolicitud, pc.fhExp, pcd.PuntosXUnidad
                        FROM Canje pc, Participante p, CanjeDetalle pcd
                        WHERE pc.idParticipante = p.idParticipante
                        AND pc.idCanje = pcd.noFolio
                        AND pc.codPrograma =41
                        AND p.codEmpresa =".$this->session->userdata('CodEmpresa')."
                        AND DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) >= '".$infoFechas['fechaInicio']."'
                        AND DATE_FORMAT( pc.feSolicitud,  '%Y %m' ) <= '".$infoFechas['fechaFin']."'
                        ORDER BY pc.feSolicitud
                  ");
                  if ($query->num_rows() > 0){
                        return $query->result_array();
                  }else{
                        return false;
                  }
            }

            public function getCatalogo(){
                  $query = $this->db->query("
                        SELECT pp.codPrograma, pp.codEmpresa, c.codCategoria, c.nbCategoria as Categoria,
                        pr.codPremio, pr.Nombre_Esp as Premio, Caracts_Esp, Marca, Modelo, pp.ValorPuntos 
                        FROM Premio pr
                        JOIN PremioPrograma pp on pr.codPremio=pp.codPremio
                        JOIN CategoriaPremio c on c.codCategoria=pr.codCategoria
                        WHERE pp.codPrograma='41' and pp.codEmpresa='".$this->session->userdata('CodEmpresa')."'
                        ORDER BY 10,5
                  ");
    		      if ($query->num_rows() > 0){
                        return $query->result_array();
    		      }else{
                        return false;
    		      }
            }

            public function getCatalogoAdminOpi(){
                  $query = $this->db->query("
                        SELECT DISTINCT pp.codPrograma,pp.codEmpresa,em.NombreOficial, c.codCategoria,
                        c.nbCategoria as Categoria, pr.codPremio, pr.Nombre_Esp as Premio, Caracts_Esp, Marca,
                        Modelo, pp.ValorPuntos
                        FROM Premio pr 
                        JOIN PremioPrograma pp on pr.codPremio=pp.codPremio 
                        JOIN Empresa em on pp.codEmpresa = em.codEmpresa
                        JOIN CategoriaPremio c on c.codCategoria=pr.codCategoria 
                        WHERE pp.codPrograma='41' ORDER BY 5
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

            public function getDescripcionPremio($codPremio){
                  $query = $this->db->query("
                        SELECT p.codPremio,p.CodCategoria,cp.nbCategoria,p.Nombre_Esp,p.Marca,p.Modelo,p.Caracts_Esp
                        from Premio p 
                        JOIN CategoriaPremio cp on cp.CodCategoria = p.CodCategoria
                        where p.codPremio =".$codPremio['codPremio']."
                        limit 1;
                  ");
                  if ($query->num_rows() > 0){
                        return $query->result_array();
    		      }else{
                        return false;
    		      }
            }

            public function getCatetoriasPremios(){
                  $query = $this->db->query("
                        SELECT cp.CodCategoria,cp.nbCategoria
                        FROM CategoriaPremio cp;
                  ");
                  if ($query->num_rows() > 0){
                        return $query->result_array();
    		      }else{
                        return false;
    		      }
            }

            public function updPremioInfoCatalogo($CodPremio,$categoria,$nombrePremio,$marcaPremio,$modeloPremio,$caractsPremio){
                  $query = $this->db->query("
                        UPDATE Premio
                        SET CodCategoria=".$categoria.", Marca='".$marcaPremio."', Modelo='".$modeloPremio."', Nombre_Esp='".$nombrePremio."', Caracts_Esp='".$caractsPremio."'
                        WHERE codPremio = ".$CodPremio.";
                  ");
                  if ($query){
                        return true;
                  }else{
                        return false;
                  }     
            }

            public function borrarPremioCatalogo($codPremio){
                  $query = $this->db->query(" 
                        DELETE FROM PremioPrograma
                        WHERE codPrograma = 41
                        and codEmpresa = '".$this->session->userdata('CodEmpresa')."'
                        and codPremio = ".$codPremio.";
                  ");
                  if($query){
                        return true;
                  }else{
                        return false;
                  }
            }

            public function PremioCatalogo($dataPremio){
                  $consultaPremio = '';
                  if( $dataPremio[0] != 'codPremio' || $dataPremio[1] != 'codCategoria' || $dataPremio[2] != 'codPrograma' || $dataPremio[3] != 'Marca' || $dataPremio[4] != 'Modelo' || $dataPremio[5] != 'Nombre' || $dataPremio[6] != 'Nombre_Ing' || $dataPremio[7] != 'Caracts' || $dataPremio[8] != 'Caracts_Ing' ){
                        $consultaPremio = 'CALL spu_InsPremio ('.$dataPremio[0].','.$dataPremio[1].','.$dataPremio[2].',"'.$dataPremio[3].'","'.$dataPremio[4].'","'.$dataPremio[5].'","'.$dataPremio[6].'","'.$dataPremio[7].'","'.$dataPremio[8].'");';
                        $query = $this->db->query($consultaPremio);
                        if ($query){
                              $consultaPremio = true;
                        }else{
                              $consultaPremio = false;
                        }
                  }else{
                        $consultaPremio = 'enzabezado';
                  }

                  return $consultaPremio;
            }

            public function getPrograma(){
                  $query = $this->db->query("
                        SELECT DATE_FORMAT( feMov,  '%Y %m' ) AS Fecha,
                        SUM( m.noPuntos ) AS Depositos
                        FROM PartMovsRealizados m
                        JOIN Participante p ON p.idParticipante = m.idParticipante
                        WHERE feMov >=  '20180501'
                        AND p.CodPrograma =41
                        AND p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                        GROUP BY DATE_FORMAT( m.feMov,  '%Y %m' )
                        ORDER BY 1
                  ");
                  if ($query->num_rows() > 0){
                        return $query->result_array();
                  }else{
                        return false;
                  }
            }

            public function getProgramaCanje(){
                  $query = $this->db->query("
                        SELECT DATE_FORMAT( feSolicitud,  '%Y %m' ) AS Fecha,
                        SUM( cd.PuntosXUnidad * cd.Cantidad ) AS Canjes
                        FROM CanjeDetalle cd, Canje c, Participante p
                        WHERE cd.idCanje = c.idCanje
                        AND cd.codPrograma = c.codPrograma
                        AND c.idParticipante = p.idParticipante
                        AND feSolicitud >=  '20180501'
                        AND c.codPrograma =41
                        AND p.codEmpresa = ".$this->session->userdata('CodEmpresa')."
                        GROUP BY DATE_FORMAT( feSolicitud,  '%Y %m' )
                        ORDER BY 1
                  ");
                  if ($query->num_rows() > 0){
                        return $query->result_array();
                  }else{
                        return false;
                  }
            }

            public function cambiarNombre($usuario){
                  $query = $this->db->query("
                      UPDATE `Administrador` SET `Usuario`='".$usuario['usuario']." '
                      WHERE `CodEmpresa` = ".$this->session->userdata('CodEmpresa')."
                  ");
                  if ($query){
                        return true;
                  }else{
                        return false;
                  }
            }

            public function cambiarPassword($password){
                  $query = $this->db->query("
                      UPDATE `Administrador` SET `Pwd`=".$password['password']."
                      WHERE `CodEmpresa` = ".$this->session->userdata('CodEmpresa')."
                  ");
                  if ($query){
                              return true;
                  }else{
                        return false;
                  }
            }

            public function checkMailExits($email){
                  $query = $this->db->query("
                      SELECT Usuario, CodEmpresa
                      FROM Administrador
                      WHERE email =  '".$email['email']."'
                  ");
                  if ($query->num_rows() > 0){
                        return $query->result_array();
                  }else{
                        return false;
                  }
            }

            public function cambiarPasswordNew($passwordConfig){
                  $query = $this->db->query("
                      UPDATE `Administrador` SET `Pwd`=".$passwordConfig['password']."
                      WHERE `CodEmpresa` = ".$passwordConfig['codEmpresa']."
                      AND `Usuario` = '".$passwordConfig['usuario']."'
                  ");
                  if ($query){
                              return true;
                  }else{
                        return false;
                  }
            }
      }
?>