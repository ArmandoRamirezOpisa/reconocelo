<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mantenimiento extends CI_Controller {
    
    	public function index(){
			
            if ($this->session->userdata('administrador')) {
                header( 'Location: '.base_url().'mantenimiento/home');
            } else {
                $this->load->view('home_mantenimiento_view');
            }
            
        }
        
        //Login mantenimiento
        public function login(){

            $this->load->model("mantenimiento_model");
            $loginMantenimientoData = array("usuario"=>$_POST['usuario'],"password"=>$_POST['password']);
            $userMantenimientoExist = $this->mantenimiento_model->loginUserMantenimiento($loginMantenimientoData);
            if ($userMantenimientoExist['loginWeb'] == '41160001' && $userMantenimientoExist['pwd']){

                $InformacionLogin = $this->mantenimiento_model->login($loginMantenimientoData);
                if ($InformacionLogin){
                    $InformacionLoginUsuario = array(
                        'administrador' => TRUE,
                        'CodEmpresa' => $InformacionLogin[0]["CodEmpresa"],
                        'CodPrograma' => $InformacionLogin[0]["CodPrograma"],
                        'PrimerNombre' => $InformacionLogin[0]["PrimerNombre"]
                    );
                    $this->session->set_userdata($InformacionLoginUsuario);
                    $this->output->set_output(json_encode(true));//si encuantra al usuario regresa true
                }else{
                    $this->output->set_output(json_encode(false));//si no encuentra al usuario regresa false
                }
            }

        }

        //Inicio manteniniento
        public function home(){

            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('mantenimiento_view',$PrimerNombre);

        }

        /* Inicio pantalla participantes */
        //pantalla participantes
        public function participantes(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('mantenimiento_participante_view',$PrimerNombre);
        }

        public function unParticipante(){

            $this->load->view('participante_uno_view');

        }

        public function variosParticipantes(){
            $this->load->view('participante_varios_view');
        }

        //guardando participantes
        public function participanteSave(){
            $this->load->model("mantenimiento_model");
            $saveParticipantesData = array(
                "idParticipanteMantenimiento"=>$_POST['idParticipanteMantenimiento'],
                "codProgramaMantenimiento"=>$_POST['codProgramaMantenimiento'],
                "codEmpresaMantenimiento"=>$_POST['codEmpresaMantenimiento'],
                "codParticipanteMantenimiento"=>$_POST['codParticipanteMantenimiento'],
                "cargoMantenimiento"=>$_POST['cargoMantenimiento'],
                "nombreCompletoMantenimiento"=>$_POST['nombreCompletoMantenimiento'],
                "calleNumeroMantenimiento"=>$_POST['calleNumeroMantenimiento'],
                "coloniaMantenimiento"=>$_POST['coloniaMantenimiento'],
                "cpMantenimiento"=>$_POST['cpMantenimiento'],
                "ciudadMantenimiento"=>$_POST['ciudadMantenimiento'],
                "estadoMantenimiento"=>$_POST['estadoMantenimiento'],
                "paisMantenimiento"=>$_POST['paisMantenimiento'],
                "telefonoMantenimiento"=>$_POST['telefonoMantenimiento'],
                "passwordMantenimiento"=>$_POST['passwordMantenimiento'],
                "emailMantenimiento"=>$_POST['emailMantenimiento'],
                "loginwebMantenimiento"=>$_POST['loginwebMantenimiento']
            );

            $participanteDataExits = $this->mantenimiento_model->participanteMantenimientoExits($saveParticipantesData);

            if ($participanteDataExits){
                $this->output->set_output(json_encode(false));
            }else{
                $participanteData = $this->mantenimiento_model->participanteMantenimiento($saveParticipantesData);

                if($participanteData){
                    $this->output->set_output(json_encode(true));
                }else{
                    $this->output->set_output(json_encode(false));
                }
            }
        }

        public function uploadParticipantesNews(){
            $this->load->model("mantenimiento_model");
            $infoNewsParticipantes = $_POST['infoNewsParticipantes'];
            $participanteMasivo = $this->mantenimiento_model->insertParticipantesMasivo($infoNewsParticipantes);
            if($participanteMasivo){
                $this->output->set_output(json_encode($participanteMasivo));
            }else{
                $this->output->set_output(json_encode(false));
                    
            }
        }
        /* Fin pantalla participantes */

        /* Inicio pantalla premios */
        //pantalla premios
        public function premios(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('mantenimiento_premio_view',$PrimerNombre);
        }

        //Alta de premios
        public function altaPremio(){

            $this->load->view('premio_alta_view');
            
        }

        //save alta premios
        public function premiosAlta(){
            $this->load->model("mantenimiento_model");
            $savePremioData = array(
                "codPremio"=>$_POST['codPremio'],
                "codCategoria"=>$_POST['codCategoria'],
                "codProveedor"=>$_POST['codProveedor'],
                "marca"=>$_POST['marca'],
                "modelo"=>$_POST['modelo'],
                "nomESP"=>$_POST['nomESP'],
                "nomING"=>$_POST['nomING'],
                "caracESP"=>$_POST['caracESP'],
                "caracING"=>$_POST['caracING'],
                "codPrograma"=>$_POST['codPrograma'],
                "codEmpresa"=>$_POST['codEmpresa'],
                "valorPuntos"=>$_POST['valorPuntos']
            );
            $PremioDataExits = $this->mantenimiento_model->premioMantenimientoExits($savePremioData);
            if($PremioDataExits){

                $this->output->set_output(json_encode(false));

            }else{

                $premioData = $this->mantenimiento_model->premioMantenimiento($savePremioData);

                $premioProgramaData = $this->mantenimiento_model->premioProgramaMantenimiento($savePremioData);
                if($premioProgramaData){

                    $this->output->set_output(json_encode($premioData));

                }else{

                    $this->output->set_output(json_encode(false));

                }
            }
        }

        //baja de premio
        public function bajaPremio(){

            $this->load->view('premio_baja_view');
            
        }

        //Baja del premio
        public function premiosBaja(){

            $this->load->model("mantenimiento_model");
            $savePremioData = array("codPremio"=>$_POST['codPremio']);
            $PremioDataExits = $this->mantenimiento_model->premioMantenimientoExits($savePremioData);
            if($PremioDataExits){

                $PremioDelete = $this->mantenimiento_model->premioDelete($savePremioData);
                $this->output->set_output(json_encode("Bien"));

            }else{
                $this->output->set_output(json_encode("Mal"));
            }

        }

        /* Update premios */
        public function updatePremio(){

            $this->load->model("mantenimiento_model");
            $PremioData = $this->mantenimiento_model->premioData();

            if($PremioData){
                $data["PremioData"] = $PremioData;
            }else{
                $data["PremioData"] = false;
            }

            $this->load->view('premio_update_view',$data);

        }

        public function premiosUpdateInfo(){

            $this->load->model("mantenimiento_model");
            $savePremioData = array("codPremio"=>$_POST['codPremio']);
            $PremioDataInfo = $this->mantenimiento_model->premioMantenimientoExits($savePremioData);
            $PremioProgramaDataInfo = $this->mantenimiento_model->premioProgramaMantenimientoExits($savePremioData);
            
            if($PremioDataInfo){
                $data = array( 'PremioDataInfo' => $PremioDataInfo,
                    'PremioProgramaDataInfo' => $PremioProgramaDataInfo
                );
            }else{
                $data = array( 'PremioDataInfo' => false,
                    'PremioProgramaDataInfo' => false
                );
            }

            $this->load->view('premio_updateInfo_view',$data);

        }

        public function premiosUpdateInfoData(){
            $this->load->model("mantenimiento_model");
            $savePremioData = array(
                "codPremioUpdate"=>$_POST['codPremioUpdate'],
                "codCategoriaUpdate"=>$_POST['codCategoriaUpdate'],
                "codProveedorUpdate"=>$_POST['codProveedorUpdate'],
                "marcaUpdate"=>$_POST['marcaUpdate'],
                "modeloUpdate"=>$_POST['modeloUpdate'],
                "nomESPUpdate"=>$_POST['nomESPUpdate'],
                "nomINGUpdate"=>$_POST['nomINGUpdate'],
                "caracESPUpdate"=>$_POST['caracESPUpdate'],
                "caracINGUpdate"=>$_POST['caracINGUpdate'],
                "codProgramaUpdate"=>$_POST['codProgramaUpdate'],
                "codEmpresaUpdate"=>$_POST['codEmpresaUpdate'],
                "valorPuntosUpdate"=>$_POST['valorPuntosUpdate']
            );
            $PremioDataInfo = $this->mantenimiento_model->updatePremio($savePremioData);
            $PremioProgramaDataInfo = $this->mantenimiento_model->updatePremioPrograma($savePremioData);

            if($PremioDataInfo && $PremioProgramaDataInfo){
                $this->output->set_output(json_encode("Bien"));
            }

        }
        /* Fin update premios */

        /* Pantalla para subir depositos */
        public function uploadDepositos(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('depositos_upload_mantenimiento',$PrimerNombre);
        }

        public function uploadDepositosNewsMantenimiento(){

            $this->load->model("mantenimiento_model");
            $infoNewsDepositosMantenimiento = $_POST['infoNewsDepositosMantenimiento'];

            $depositoMasivo = $this->mantenimiento_model->insertDepositoMasivoMantenimiento();
            if($depositoMasivo){
                $depositoDetalleMasivo = $this->mantenimiento_model->insertDepositoDetalleMasivoMantenimiento($infoNewsDepositosMantenimiento,$depositoMasivo);
                if($depositoDetalleMasivo){
                    $this->output->set_output(json_encode($infoNewsDepositosMantenimiento));
                }else{
                    $this->output->set_output(json_encode(false));
                }
            }else{
                $this->output->set_output(json_encode(false));
            }

        }

        public function depositosSubidosMantenimiento(){

            $idDepositoParticipante = "";
            $this->load->model("mantenimiento_model");
            $depositover = $this->mantenimiento_model->verDepositosUsuarioMantenimiento();
            if ($depositover){
                $data["depositover"] = $depositover;
            }else{
                $data["depositover"] = false;
            }
            $this->load->view('depositoUpload_mantenimiento_view',$data);

        }

        public function uploadPuntosDepositoMantenimiento(){

            $numTransaccionMantenimiento = array("numTransaccionMantenimiento"=>$_POST['numTransaccionMantenimiento']);
            $this->load->model("mantenimiento_model");
            $depositoverUpload = $this->mantenimiento_model->getDepositosDetMantenimiento($numTransaccionMantenimiento);
            $saldoTotalParticipante = 0;
            $totalRegistros = 0;
            if($depositoverUpload){

                foreach($depositoverUpload as $row){

                    $saldoParticipantes = $this->mantenimiento_model->UpdateSaldoParticipanteMantenimiento($row['idParticipanteCliente'],$row['Puntos']);
                    if($saldoParticipantes){
                        
                        $updateDepositosDet = $this->mantenimiento_model->UpdateDepositosDetMantenimiento($numTransaccionMantenimiento,$row['idParticipanteCliente']);
                        if($updateDepositosDet){
                            $idParticipanteData = $this->mantenimiento_model->idParticipanteGetMantenimiento($row['idParticipanteCliente']);
                            if($idParticipanteData){
                                $insertPartMovsRealiza = $this->mantenimiento_model->insertPartMovsRealizaMantenimiento($idParticipanteData[0]['idParticipante'],$row['Concepto'],$row['Puntos']);
                                $saldoTotalParticipante = $saldoTotalParticipante + 1;
                            }

                        }
                    }

                    $totalRegistros = $totalRegistros + 1;
                }

                if($saldoTotalParticipante > 0){

                    $UpdateMasterDeposito = $this->mantenimiento_model->UpdateMasterDepositoMantenimiento($numTransaccionMantenimiento);
                    $this->output->set_output(json_encode($saldoTotalParticipante));

                }else{
                    $this->output->set_output(json_encode(false));    
                }

            }else{
                $this->output->set_output(json_encode(false));
            }

        }
        /* Fin pantalla para subir depositos */

        //salir del mantenimiento
        public function exit_mantenimiento(){
            $array_items = array('administrador' => '', 'CodEmpresa' => '');
            $this->session->unset_userdata($array_items);
            //Manda al inicio de la página, si no hay session se va al login.
            header( 'Location: '.base_url().'mantenimiento');
        }

    }

?>