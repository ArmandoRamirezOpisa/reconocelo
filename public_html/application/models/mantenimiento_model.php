<?php
    class Mantenimiento_model extends CI_Model {
        public function __construct(){}
        
        public function loginUserMantenimiento($loginMantenimientoData){
            $usuario =$loginMantenimientoData['usuario'];
            $password = $loginMantenimientoData['password'];
            $query = $this->db->query("
                SELECT *
                FROM  Participante
                WHERE  loginWeb = '".$usuario."'
                AND  pwd = md5('".$password."')
            ");
            if ($query->num_rows() == 1){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function login($loginMantenimientoData){
            $usuario =$loginMantenimientoData['usuario'];
            $password = $loginMantenimientoData['password'];
            $query = $this->db->query("
                SELECT pp.codPrograma,pp.codEmpresa,pp.codParticipante,pp.Status,pp.Cargo,
                pp.PrimerNombre,pp.SegundoNombre,pp.ApellidoPaterno,pp.ApellidoMaterno,pp.eMail,
                pp.SaldoActual,pp.idParticipante,pp.CalleNumero, pp.Colonia, pp.CP,pp.Ciudad,pp.Estado,
                pp.eMail,pp.Telefono,pp.fhInicioOrden,pp.fhFinOrden,Emp.Visibilidad,pp.pwd
                FROM Participante AS pp
                INNER JOIN Empresa as Emp ON (pp.codPrograma = Emp.CodPrograma and pp.CodEmpresa= Emp.CodEmpresa)
                WHERE pp.codPrograma = 41
                AND pp.loginWeb = '".$usuario."'
                AND pwd = md5('".$password."')
                AND pp.Status = 1
            ");
            if ($query->num_rows() == 1){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function participanteMantenimientoExits($saveParticipantesData){
            $query = $this->db->query("
            SELECT loginWeb, codPrograma, codEmpresa, codParticipante, Status, Cargo, PrimerNombre, SegundoNombre,
            ApellidoPaterno, ApellidoMaterno, CalleNumero, Colonia, CP, Ciudad, Estado, Pais, Telefono,
            EnvioDocumentacion, TipoMov, pwd, eMail, stEmail, SaldoActual, idParticipante, codCategoria,
            Administrador FROM Participante
            WHERE loginWeb = '".$saveParticipantesData['loginwebMantenimiento']."'
            AND pwd = '".$saveParticipantesData['passwordMantenimiento']."'
            AND eMail = '".$saveParticipantesData['emailMantenimiento']."'
            AND idParticipante = '".$saveParticipantesData['idParticipanteMantenimiento']."'
            ");
            if($query->num_rows() == 1){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function participanteMantenimiento($saveParticipantesData){
            $query = $this->db->query("
                INSERT INTO `opisa_opisa`.`Participante`(`loginWeb`, `codPrograma`, `codEmpresa`, `codParticipante`,
                `Status`, `Cargo`, `PrimerNombre`, `SegundoNombre`, `ApellidoPaterno`, `ApellidoMaterno`,
                `CalleNumero`, `Colonia`, `CP`, `Ciudad`, `Estado`, `Pais`, `Telefono`,
                `EnvioDocumentacion`, `TipoMov`, `pwd`, `eMail`, `stEmail`,
                `SaldoActual`,`idParticipante`,`codCategoria`, `Administrador`) VALUES (
                '".$saveParticipantesData['loginwebMantenimiento']."','".$saveParticipantesData['codProgramaMantenimiento']."',
                '".$saveParticipantesData['codEmpresaMantenimiento']."','".$saveParticipantesData['codParticipanteMantenimiento']."',
                0,'".$saveParticipantesData['cargoMantenimiento']."','".$saveParticipantesData['nombreCompletoMantenimiento']."',
                'NULL','NULL','NULL','".$saveParticipantesData['calleNumeroMantenimiento']."','".$saveParticipantesData['coloniaMantenimiento']."',
                '".$saveParticipantesData['cpMantenimiento']."','".$saveParticipantesData['ciudadMantenimiento']."',
                '".$saveParticipantesData['estadoMantenimiento']."','".$saveParticipantesData['paisMantenimiento']."',
                '".$saveParticipantesData['telefonoMantenimiento']."',0,'A','".$saveParticipantesData['passwordMantenimiento']."',
                '".$saveParticipantesData['emailMantenimiento']."',0,0,'".$saveParticipantesData['idParticipanteMantenimiento']."',
                1,0);
            ");
            if ($query){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        public function insertParticipantesMasivo($infoNewsParticipantes){
            $valorReturn = 0;
            if($infoNewsParticipantes){
                foreach($infoNewsParticipantes as $row){
                    foreach($row as $row1){
                        $valoresDefinidosParticipantes = explode(",",$row1);
                        if(! isset($valoresDefinidosParticipantes[0]) || ! isset($valoresDefinidosParticipantes[1]) || ! isset($valoresDefinidosParticipantes[2]) || ! isset($valoresDefinidosParticipantes[3]) || ! isset($valoresDefinidosParticipantes[4]) || ! isset($valoresDefinidosParticipantes[5]) || ! isset($valoresDefinidosParticipantes[6]) || ! isset($valoresDefinidosParticipantes[7]) || ! isset($valoresDefinidosParticipantes[8]) || ! isset($valoresDefinidosParticipantes[9]) || ! isset($valoresDefinidosParticipantes[10]) || ! isset($valoresDefinidosParticipantes[11]) || ! isset($valoresDefinidosParticipantes[12]) || ! isset($valoresDefinidosParticipantes[13]) || ! isset($valoresDefinidosParticipantes[14]) || ! isset($valoresDefinidosParticipantes[15]) ){
                            $valoresDefinidosParticipantes[0] = null;
                            $valoresDefinidosParticipantes[1] = null;
                            $valoresDefinidosParticipantes[2] = null;
                            $valoresDefinidosParticipantes[3] = null;
                            $valoresDefinidosParticipantes[4] = null;
                            $valoresDefinidosParticipantes[5] = null;
                            $valoresDefinidosParticipantes[6] = null;
                            $valoresDefinidosParticipantes[7] = null;
                            $valoresDefinidosParticipantes[8] = null;
                            $valoresDefinidosParticipantes[9] = null;
                            $valoresDefinidosParticipantes[10] = null;
                            $valoresDefinidosParticipantes[11] = null;
                            $valoresDefinidosParticipantes[12] = null;
                            $valoresDefinidosParticipantes[13] = null;
                            $valoresDefinidosParticipantes[14] = null;
                            $valoresDefinidosParticipantes[15] = null;
                        }else{
                            if($valoresDefinidosParticipantes[0] == "idParticipante" || $valoresDefinidosParticipantes[1] == "codPrograma" || $valoresDefinidosParticipantes[2] == "codEmpresa" || $valoresDefinidosParticipantes[3] == "codParticipante" || $valoresDefinidosParticipantes[4] == "cargo" || $valoresDefinidosParticipantes[5] == "nombreCompleto" || $valoresDefinidosParticipantes[6] == "calleNumero" || $valoresDefinidosParticipantes[7] == "colonia" || $valoresDefinidosParticipantes[8] == "cp" || $valoresDefinidosParticipantes[9] == "ciudad" || $valoresDefinidosParticipantes[10] == "estado" || $valoresDefinidosParticipantes[11] == "pais" || $valoresDefinidosParticipantes[12] == "telefono" || $valoresDefinidosParticipantes[13] == "pwd" || $valoresDefinidosParticipantes[14] == "eMail" || $valoresDefinidosParticipantes[15] == "loginWeb" ){}
                            else{
                                $query = $this->db->query("
                                    INSERT INTO `opisa_opisa`.`Participante`(`idParticipante`,
                                    `codPrograma`, `codEmpresa`, `codParticipante`, `Cargo`, `PrimerNombre`,
                                    `CalleNumero`, `Colonia`, `CP`, `Ciudad`, `Estado`, `Pais`,
                                    `Telefono`, `pwd`, `eMail`, `loginWeb`)
                                    VALUES (".$valoresDefinidosParticipantes[0].",".$valoresDefinidosParticipantes[1].",
                                    ".$valoresDefinidosParticipantes[2].",".$valoresDefinidosParticipantes[3].",
                                    '".$valoresDefinidosParticipantes[4]."','".$valoresDefinidosParticipantes[5]."',
                                    '".$valoresDefinidosParticipantes[6]."','".$valoresDefinidosParticipantes[7]."',
                                    '".$valoresDefinidosParticipantes[8]."','".$valoresDefinidosParticipantes[9]."',
                                    '".$valoresDefinidosParticipantes[10]."','".$valoresDefinidosParticipantes[11]."',
                                    '".$valoresDefinidosParticipantes[12]."',".$valoresDefinidosParticipantes[13].",
                                    '".$valoresDefinidosParticipantes[14]."',".$valoresDefinidosParticipantes[15].")
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

        public function premioMantenimientoExits($savePremioData){
            $query = $this->db->query("
                SELECT codPremio, CodCategoria, codProveedor, Marca, Modelo, Nombre_Esp, Nombre_Ing, Caracts_Esp,
                Caracts_Ing
                FROM Premio
                WHERE codPremio ='".$savePremioData['codPremio']."'
            ");
            if($query->num_rows() == 1){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function premioMantenimiento($savePremioData){
            $query = $this->db->query("
                INSERT INTO `opisa_opisa`.`Premio`(`codPremio`, `CodCategoria`, `codProveedor`, `Marca`, `Modelo`,
                `Nombre_Esp`, `Nombre_Ing`, `Caracts_Esp`, `Caracts_Ing`) VALUES ('".$savePremioData['codPremio']."',
                '".$savePremioData['codCategoria']."','".$savePremioData['codProveedor']."',
                '".$savePremioData['marca']."','".$savePremioData['modelo']."','".$savePremioData['nomESP']."',
                '".$savePremioData['nomING']."','".$savePremioData['caracESP']."','".$savePremioData['caracING']."');
            ");
            if ($query){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        public function premioProgramaMantenimiento($savePremioData){
            $query = $this->db->query("
                INSERT INTO `opisa_opisa`.`PremioPrograma` (`codPrograma`, `codPremio`, `codEmpresa`,
                `ValorPuntos`, `stAtipico`, `codCategoria`, `Visible`)
                SELECT '".$savePremioData['codPrograma']."' , codPremio, '".$savePremioData['codEmpresa']."',
                '".$savePremioData['valorPuntos']."', 0, codCategoria, 1
                FROM Premio
                WHERE codPremio ='".$savePremioData['codPremio']."';
            ");
            if ($query){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        public function premioDelete($savePremioData){
            $query = $this->db->query("
                DELETE FROM `opisa_opisa`.`PremioPrograma` WHERE `codPremio` = '".$savePremioData['codPremio']."'
            ");
            if ($query){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        public function premioData(){
            $query = $this->db->query("
                SELECT codPremio, Nombre_Esp
                FROM Premio
            ");
            if ($query->num_rows() > 0){
                return $query->result_array();
    		}else{
                return false;
    		}
        }

        public function premioProgramaMantenimientoExits($savePremioData){
            $query = $this->db->query("
                SELECT codPrograma, codEmpresa, ValorPuntos
                FROM PremioPrograma
                WHERE codPremio = '".$savePremioData['codPremio']."'
            ");
            if ($query->num_rows() > 0){
                return $query->result_array();
    		}else{
                return false;
    		}
        }

        public function updatePremio($savePremioData){
            $query = $this->db->query("
                UPDATE `opisa_opisa`.`Premio` SET `codPremio`='".$savePremioData['codPremioUpdate']."',
                `CodCategoria`='".$savePremioData['codCategoriaUpdate']."',`codProveedor`='".$savePremioData['codProveedorUpdate']."',
                `Marca`='".$savePremioData['marcaUpdate']."',`Modelo`='".$savePremioData['modeloUpdate']."',
                `Nombre_Esp`='".$savePremioData['nomESPUpdate']."',`Nombre_Ing`='".$savePremioData['nomINGUpdate']."',
                `Caracts_Esp`='".$savePremioData['caracESPUpdate']."',`Caracts_Ing`='".$savePremioData['caracINGUpdate']."'
                WHERE codPremio = '".$savePremioData['codPremioUpdate']."'
            ");
            if ($query){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        public function updatePremioPrograma($savePremioData){
            $query = $this->db->query("
                UPDATE `PremioPrograma` SET `codPrograma`='".$savePremioData['codProgramaUpdate']."',
                `codEmpresa`='".$savePremioData['codEmpresaUpdate']."',`ValorPuntos`='".$savePremioData['valorPuntosUpdate']."'
                WHERE codPremio = '".$savePremioData['codPremioUpdate']."'
            ");
            if ($query){
                return $this->db->insert_id();
            }else{
                return false;
            }
        }

        public function insertDepositoMasivoMantenimiento(){
            $query = $this->db->query("
                INSERT INTO `opisa_opisa`.`Despositos`(`fhDeposito`, `idParticipanteCliente`, `standBy`)
                VALUES (NOW(),'41160001',0)
            ");
    	    if ($query){
                return $this->db->insert_id();
    	    }else{
                return false;
    	    }
        }
        
        public function insertDepositoDetalleMasivoMantenimiento($infoNewsDepositosMantenimiento,$depositoMasivo){
            $valorReturn = 0;
            if($infoNewsDepositosMantenimiento){
                foreach($infoNewsDepositosMantenimiento as $row){
                    foreach($row as $row1){
                        $valoresDefinidosDepositos = explode(",",$row1);
                        if(! isset($valoresDefinidosDepositos[0]) || ! isset($valoresDefinidosDepositos[1]) || ! isset($valoresDefinidosDepositos[2]) ){
                            $valoresDefinidosDepositos[0] = null;
                            $valoresDefinidosDepositos[1] = null;
                            $valoresDefinidosDepositos[2] = null;
                        }else{
                            if($valoresDefinidosDepositos[0] == "idParticipante" || $valoresDefinidosDepositos[1] == "Puntos" || $valoresDefinidosDepositos[2] == "Concepto"){}
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

        public function verDepositosUsuarioMantenimiento(){
            $query = $this->db->query("
                SELECT idDeposito
                FROM  `Despositos`
                WHERE idParticipanteCliente ='41160001'
                AND standBy = 0
            ");
    		if ($query->num_rows() > 0){
                return $query->result_array();
    		}else{
                return false;
    		}
        }

        public function getDepositosDetMantenimiento($numTransaccionMantenimiento){
            $query = $this->db->query("
                SELECT idDeposito, idParticipanteCliente, Puntos, Concepto, STATUS
                FROM DepositosDet
                WHERE idDeposito =".$numTransaccionMantenimiento['numTransaccionMantenimiento']."
            ");
    		if ($query->num_rows() > 0){
                return $query->result_array();
    		}else{
                return false;
    		}
        }

        public function UpdateSaldoParticipanteMantenimiento($idParticipanteCliente,$Puntos){
            $query = $this->db->query("
                UPDATE `Participante`
                SET SaldoActual = SaldoActual + ".$Puntos."
                WHERE idParticipanteCliente =".$idParticipanteCliente."
            ");
            if ($query){
                return true;
            }else{
                return false;
            }
        }

        public function UpdateDepositosDetMantenimiento($numTransaccionMantenimiento,$idParticipanteCliente){
            $query = $this->db->query("
                UPDATE `DepositosDet`
                SET `status`= 1
                WHERE `idDeposito` = ".$numTransaccionMantenimiento['numTransaccionMantenimiento']."
                and `idParticipanteCliente` = ".$idParticipanteCliente
            );
            if ($query){
                return true;
            }else{
                return false;
            }
        }

        public function idParticipanteGetMantenimiento($IdParticipanteCliente){
            $query = $this->db->query("
                SELECT idParticipante
                FROM  `Participante`
                WHERE codPrograma =41
                AND idParticipanteCliente =".$IdParticipanteCliente."
            ");
            if ($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function insertPartMovsRealizaMantenimiento($idParticipanteCliente,$Concepto,$Puntos){
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

        public function UpdateMasterDepositoMantenimiento($numTransaccionMantenimiento){
            $query = $this->db->query("
                UPDATE  `opisa_opisa`.`Despositos`
                SET  `standBy` =  '1'
                WHERE  `Despositos`.`idDeposito` = ".$numTransaccionMantenimiento['numTransaccionMantenimiento'].";
            ");
            if ($query){
                return true;
            }else{
                return false;
            }
        }

        public function insertPremio($PcodPremio,$PcodCategoria,$PcodProveedor,$PMarca,$PModelo,$PNombre_Esp,$PNombre_Ing,$PCaracts_Esp,$PCaracts_Ing){
            $sql = "CALL spu_InsPremio (\"$PcodPremio\",\"$PcodCategoria\",\"$PcodProveedor\",\"$PMarca\",\"$PModelo\",\"$PNombre_Esp\",\"$PNombre_Ing\",\"$PCaracts_Esp\",\"$PCaracts_Ing\");";
            $query = $this->db->query($sql);
            if($query){
                return true;
            }else{
                return false;
            }
        }
	}
?>