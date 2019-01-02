<?php
    class Mantenimiento_model extends CI_Model {
    	
        public function __construct(){}
        
        public function login($loginMantenimientoData)
        {
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
                AND pwd = '".$password."'
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

        /* Premios alta */
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
        /* Fin premios alta */

        /* Baja premios */
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
        /* Fin baja premios */ 
        
	}
?>