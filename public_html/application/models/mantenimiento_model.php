<?php
    class Login_model extends CI_Model {
    	
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
                '".$saveParticipantesData['emailMantenimiento']."',0,0,'".$saveParticipantesData['$saveParticipantesData']."',
                1,0);
            ");
            if ($query){
                return $this->db->insert_id(); 
            }else{
                return false;
            }
        }
        
	}
?>