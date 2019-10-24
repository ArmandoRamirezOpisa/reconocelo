<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Mantenimiento extends CI_Controller {    
        public function __construct() {
            parent::__construct();
            $this->load->library('email');
            $this->load->model("Mantenimiento_model");
        }

    	public function index(){			
            if ($this->session->userdata('administrador')) {
                header( 'Location: '.base_url().'Mantenimiento/home');
            } else {
                $this->load->view('home_mantenimiento_view');
            }
        }
        
        public function login(){
            $loginMantenimientoData = array(
                "usuario"=>$this->input->post('usuario'),
                "password"=>$this->input->post('password')
            );
            $userMantenimientoExist = $this->Mantenimiento_model->loginUserMantenimiento($loginMantenimientoData);
            if ($userMantenimientoExist['loginWeb'] == '41160001' && $userMantenimientoExist['pwd']){
                $InformacionLogin = $this->Mantenimiento_model->login($loginMantenimientoData);
                if ($InformacionLogin){
                    $InformacionLoginUsuario = array(
                        'administrador' => TRUE,
                        'CodEmpresa' => $InformacionLogin[0]["CodEmpresa"],
                        'CodPrograma' => $InformacionLogin[0]["CodPrograma"],
                        'PrimerNombre' => $InformacionLogin[0]["PrimerNombre"]
                    );
                    $this->session->set_userdata($InformacionLoginUsuario);
                    $this->output->set_output(json_encode(true));
                }else{
                    $this->output->set_output(json_encode(false));
                }
            }
        }

        public function home(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('includes/mantenimiento_header',$PrimerNombre);
            $this->load->view('mantenimiento_view');
            $this->load->view('includes/mantenimiento_footer');
        }

        public function participantes(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('includes/mantenimiento_header',$PrimerNombre);
            $this->load->view('mantenimiento_participante_view');
            $this->load->view('includes/mantenimiento_footer');
        }

        public function unParticipante(){
            $this->load->view('participante_uno_view');
        }

        public function variosParticipantes(){
            $this->load->view('participante_varios_view');
        }

        public function participanteSave(){
            $saveParticipantesData = array(
                "idParticipanteMantenimiento"=>$this->input->post('idParticipanteMantenimiento'),
                "codProgramaMantenimiento"=>$this->input->post('codProgramaMantenimiento'),
                "codEmpresaMantenimiento"=>$this->input->post('codEmpresaMantenimiento'),
                "codParticipanteMantenimiento"=>$this->input->post('codParticipanteMantenimiento'),
                "cargoMantenimiento"=>$this->input->post('cargoMantenimiento'),
                "nombreCompletoMantenimiento"=>$this->input->post('nombreCompletoMantenimiento'),
                "calleNumeroMantenimiento"=>$this->input->post('calleNumeroMantenimiento'),
                "coloniaMantenimiento"=>$this->input->post('coloniaMantenimiento'),
                "cpMantenimiento"=>$this->input->post('cpMantenimiento'),
                "ciudadMantenimiento"=>$this->input->post('ciudadMantenimiento'),
                "estadoMantenimiento"=>$this->input->post('estadoMantenimiento'),
                "paisMantenimiento"=>$this->input->post('paisMantenimiento'),
                "telefonoMantenimiento"=>$this->input->post('telefonoMantenimiento'),
                "passwordMantenimiento"=>$this->input->post('passwordMantenimiento'),
                "emailMantenimiento"=>$this->input->post('emailMantenimiento'),
                "loginwebMantenimiento"=>$this->input->post('loginwebMantenimiento')
            );
            $participanteDataExits = $this->Mantenimiento_model->participanteMantenimientoExits($saveParticipantesData);
            if ($participanteDataExits){
                $this->output->set_output(json_encode(false));
            }else{
                $participanteData = $this->Mantenimiento_model->participanteMantenimiento($saveParticipantesData);
                if($participanteData){
                    $this->output->set_output(json_encode(true));
                }else{
                    $this->output->set_output(json_encode(false));
                }
            }
        }

        public function uploadParticipantesNews(){
            $infoNewsParticipantes = $this->input->post('infoNewsParticipantes');
            $participanteMasivo = $this->Mantenimiento_model->insertParticipantesMasivo($infoNewsParticipantes);
            if($participanteMasivo){
                $this->output->set_output(json_encode($participanteMasivo));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }
        
        public function premios(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('includes/mantenimiento_header',$PrimerNombre);
            $this->load->view('mantenimiento_premio_view');
            $this->load->view('includes/mantenimiento_footer');
        }

        public function altaPremio(){
            $this->load->view('premio_alta_view');
        }

        public function premiosAlta(){
            $savePremioData = array(
                "codPremio"=>$this->input->post('codPremio'),
                "codCategoria"=>$this->input->post('codCategoria'),
                "codProveedor"=>$this->input->post('codProveedor'),
                "marca"=>$this->input->post('marca'),
                "modelo"=>$this->input->post('modelo'),
                "nomESP"=>$this->input->post('nomESP'),
                "nomING"=>$this->input->post('nomING'),
                "caracESP"=>$this->input->post('caracESP'),
                "caracING"=>$this->input->post('caracING'),
                "codPrograma"=>$this->input->post('codPrograma'),
                "codEmpresa"=>$this->input->post('codEmpresa'),
                "valorPuntos"=>$this->input->post('valorPuntos')
            );
            $PremioDataExits = $this->Mantenimiento_model->premioMantenimientoExits($savePremioData);
            if($PremioDataExits){
                $this->output->set_output(json_encode(false));
            }else{
                $premioData = $this->Mantenimiento_model->premioMantenimiento($savePremioData);
                $premioProgramaData = $this->Mantenimiento_model->premioProgramaMantenimiento($savePremioData);
                if($premioProgramaData){
                    $this->output->set_output(json_encode($premioData));
                }else{
                    $this->output->set_output(json_encode(false));
                }
            }
        }

        public function bajaPremio(){
            $this->load->view('premio_baja_view');
        }

        public function premiosBaja(){
            $savePremioData = array("codPremio"=>$this->input->post('codPremio'));
            $PremioDataExits = $this->Mantenimiento_modelmantenimiento_model->premioMantenimientoExits($savePremioData);
            if($PremioDataExits){
                $PremioDelete = $this->Mantenimiento_model->premioDelete($savePremioData);
                $this->output->set_output(json_encode("Bien"));
            }else{
                $this->output->set_output(json_encode("Mal"));
            }
        }

        public function updatePremio(){
            $PremioData = $this->Mantenimiento_model->premioData();
            if($PremioData){
                $data["PremioData"] = $PremioData;
            }else{
                $data["PremioData"] = false;
            }
            $this->load->view('premio_update_view',$data);
        }

        public function premiosUpdateInfo(){
            $savePremioData = array(
                "codPremio"=>$this->input->post('codPremio')
            );
            $PremioDataInfo = $this->Mantenimiento_model->premioMantenimientoExits($savePremioData);
            $PremioProgramaDataInfo = $this->Mantenimiento_model->premioProgramaMantenimientoExits($savePremioData);
            if($PremioDataInfo){
                $data = array(
                    'PremioDataInfo' => $PremioDataInfo,
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
            $savePremioData = array(
                "codPremioUpdate"=>$this->input->post('codPremioUpdate'),
                "codCategoriaUpdate"=>$this->input->post('codCategoriaUpdate'),
                "codProveedorUpdate"=>$this->input->post('codProveedorUpdate'),
                "marcaUpdate"=>$this->input->post('marcaUpdate'),
                "modeloUpdate"=>$this->input->post('modeloUpdate'),
                "nomESPUpdate"=>$this->input->post('nomESPUpdate'),
                "nomINGUpdate"=>$this->input->post('nomINGUpdate'),
                "caracESPUpdate"=>$this->input->post('caracESPUpdate'),
                "caracINGUpdate"=>$this->input->post('caracINGUpdate'),
                "codProgramaUpdate"=>$this->input->post('codProgramaUpdate'),
                "codEmpresaUpdate"=>$this->input->post('codEmpresaUpdate'),
                "valorPuntosUpdate"=>$this->input->post('valorPuntosUpdate')
            );
            $PremioDataInfo = $this->Mantenimiento_model->updatePremio($savePremioData);
            $PremioProgramaDataInfo = $this->Mantenimiento_model->updatePremioPrograma($savePremioData);
            if($PremioDataInfo && $PremioProgramaDataInfo){
                $this->output->set_output(json_encode("Bien"));
            }
        }

        public function uploadDepositos(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('includes/mantenimiento_header',$PrimerNombre);
            $this->load->view('depositos_upload_mantenimiento');
            $this->load->view('includes/mantenimiento_footer');
        }

        public function uploadDepositosNewsMantenimiento(){
            $infoNewsDepositosMantenimiento = $this->input->post('infoNewsDepositosMantenimiento');
            $depositoMasivo = $this->Mantenimiento_model->insertDepositoMasivoMantenimiento();
            if($depositoMasivo){
                $depositoDetalleMasivo = $this->Mantenimiento_model->insertDepositoDetalleMasivoMantenimiento($infoNewsDepositosMantenimiento,$depositoMasivo);
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
            $this->load->model("Mantenimiento_model");
            $depositover = $this->Mantenimiento_model->verDepositosUsuarioMantenimiento();
            if ($depositover){
                $data["depositover"] = $depositover;
            }else{
                $data["depositover"] = false;
            }
            $this->load->view('depositoUpload_mantenimiento_view',$data);
        }

        public function uploadPuntosDepositoMantenimiento(){
            $numTransaccionMantenimiento = array(
                "numTransaccionMantenimiento"=>$this->input->post('numTransaccionMantenimiento')
            );
            $depositoverUpload = $this->Mantenimiento_model->getDepositosDetMantenimiento($numTransaccionMantenimiento);
            $saldoTotalParticipante = 0;
            $totalRegistros = 0;
            if($depositoverUpload){
                foreach($depositoverUpload as $row){
                    $saldoParticipantes = $this->Mantenimiento_model->UpdateSaldoParticipanteMantenimiento($row['idParticipanteCliente'],$row['Puntos']);
                    if($saldoParticipantes){
                        $updateDepositosDet = $this->Mantenimiento_model->UpdateDepositosDetMantenimiento($numTransaccionMantenimiento,$row['idParticipanteCliente']);
                        if($updateDepositosDet){
                            $idParticipanteData = $this->Mantenimiento_model->idParticipanteGetMantenimiento($row['idParticipanteCliente']);
                            if($idParticipanteData){
                                $insertPartMovsRealiza = $this->Mantenimiento_model->insertPartMovsRealizaMantenimiento($idParticipanteData[0]['idParticipante'],$row['Concepto'],$row['Puntos']);
                                $saldoTotalParticipante = $saldoTotalParticipante + 1;
                            }
                        }
                    }
                    $totalRegistros = $totalRegistros + 1;
                }
                if($saldoTotalParticipante > 0){
                    $UpdateMasterDeposito = $this->Mantenimiento_modelmantenimiento_model->UpdateMasterDepositoMantenimiento($numTransaccionMantenimiento);
                    $this->output->set_output(json_encode($saldoTotalParticipante));
                }else{
                    $this->output->set_output(json_encode(false));    
                }
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function premioPrograma(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('includes/mantenimiento_header',$PrimerNombre);
            $this->load->view('premio_programa_mantenimiento');
            $this->load->view('includes/mantenimiento_footer');          
        }

        public function uploadPremioPrograma(){
            $dataPremioPrograma = array(
                "infoPremioPrograma"=>$this->input->post('infoPremioPrograma')
            );
            if($dataPremioPrograma){
                $cont = 0;
                $a=array();
                foreach($dataPremioPrograma['infoPremioPrograma'] as $row){
                    foreach($row as $row1){
                        sleep(5);
                        $valorColumnaPremio = explode(";",$row1);
                        if(! isset($valorColumnaPremio[0]) || ! isset($valorColumnaPremio[1]) || ! isset($valorColumnaPremio[2]) || ! isset($valorColumnaPremio[3]) || ! isset($valorColumnaPremio[4]) || ! isset($valorColumnaPremio[5]) || ! isset($valorColumnaPremio[6]) || ! isset($valorColumnaPremio[7]) || ! isset($valorColumnaPremio[8]) || ! isset($valorColumnaPremio[9]) || ! isset($valorColumnaPremio[10]) || ! isset($valorColumnaPremio[11]) ){
                        }else{
                            if ( $valorColumnaPremio[0] != 'codPrograma' || $valorColumnaPremio[1] != 'codEmpresa' || $valorColumnaPremio[2] != 'ValorPuntos' || $valorColumnaPremio[3] != 'codPremio' || $valorColumnaPremio[4] != 'codCategoria' || $valorColumnaPremio[5] != 'codProveedor' || $valorColumnaPremio[6] != 'Marca' || $valorColumnaPremio[7] != 'Modelo' || $valorColumnaPremio[8] != 'Nombre_ESP' || $valorColumnaPremio[9] != 'Nombre_ING' || $valorColumnaPremio[10] != 'Caracts_ESP' || $valorColumnaPremio[11] != 'Caracts_ING' ){
                                //$cont ++;
                                //array_push($a,$cont,$valorColumnaPremio[3],$valorColumnaPremio[4],$valorColumnaPremio[5],$valorColumnaPremio[6],$valorColumnaPremio[7],$valorColumnaPremio[8],$valorColumnaPremio[9],$valorColumnaPremio[10],$valorColumnaPremio[11]);
                                $dataPremio = $this->Mantenimiento_model->insertPremio( $valorColumnaPremio[3],$valorColumnaPremio[4],$valorColumnaPremio[5],$valorColumnaPremio[6],$valorColumnaPremio[7],$valorColumnaPremio[8],$valorColumnaPremio[9],$valorColumnaPremio[10],$valorColumnaPremio[11]);
                                if($dataPremio){
                                    $cont++;
                                }
                            }
                        }
                        sleep(5);
                    }
                }
                if($cont > 0){
                    $this->output->set_output(json_encode($dataPremio));
                }else{
                    $this->output->set_output(json_encode(false));    
                }
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function exit_mantenimiento(){
            $array_items = array('administrador' => '', 'CodEmpresa' => '');
            $this->session->unset_userdata($array_items);
            header( 'Location: '.base_url().'Mantenimiento');
        }
    }
?>