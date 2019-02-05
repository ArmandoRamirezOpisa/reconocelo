<?php
      class Deposito_monitor_model extends CI_Model {
    	
    	      public function __construct(){}
        
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
                        INSERT INTO `opisa_opisa`.`despositos_dev`(`fhDeposito`, `idParticipante`, `standBy`) 
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
                                          if($valoresDefinidosDepositos[0] == "idParticipanteCliente" || $valoresDefinidosDepositos[1] == "Puntos" || $valoresDefinidosDepositos[2] == "Concepto"){}
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

            public function totalParticipantesSubidos($depositoMasivo){
                  $query = $this->db->query("
                        SELECT COUNT( * ) AS TotalSubido
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
                        WHERE idParticipante ='".$this->session->userdata('CodEmpresa')."'
                        AND standBy = 0
                  ");
    		      if ($query->num_rows() > 0)
    		      {
                        return $query->result_array(); 
    		      }else{
                        return false;
    		      }
            }

            public function UploadDepositosPuntos($numTransaccion){
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

            public function UpdatePuntosParticipante($idParticipanteCliente,$Puntos){
                  $query = $this->db->query("
                        UPDATE `ZParticipante-desarrollo`
                        SET SaldoActual = SaldoActual + ".$Puntos."
                        WHERE idParticipante =".$idParticipanteCliente
                        );
			if ($query){
			        return true;
			}else{
				return false;
			}
            }

            public function UpdateDepositosDet($numTransaccion,$idParticipanteCliente){
                  $query = $this->db->query("
                        UPDATE `depositosDet_dev` SET `status`= 1 
                        WHERE `idDeposito` = ".$numTransaccion['numTransaccion']." 
                        and `idParticipanteCliente` = ".$idParticipanteCliente
                        );
			if ($query){
			        return true;
			}else{
				return false;
			}
            }

            public function insertPartMovsRealiza($idParticipanteCliente,$Concepto,$Puntos){
                  $query = $this->db->query("
                        INSERT INTO `opisa_opisa`.`ZPartMovsRealizados`(`idParticipante`, `feMov`, `dsMov`, 
                        `noPuntos`) VALUES (".$idParticipanteCliente.",NOW(),'".$Concepto."',".$Puntos.")
                  ");
                  if ($query){
                        $valorReturn = $this->db->insert_id();
    	            }else{
                        $valorReturn = false;
    	            }
            }

            public function UpdateDeposito($numTransaccion){
                  $query = $this->db->query("
                        UPDATE `despositos_dev` SET `standBy`=1 
                        WHERE `idDeposito`=".$numTransaccion['numTransaccion']
                  );//Este no quiere actualizar
			if ($query){
			      return true;
			}else{
				return false;
			}
            }
      }
?>