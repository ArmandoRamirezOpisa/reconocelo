<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Mantenimiento extends CI_Controller {
    
    	public function index()
    	{
			
            if ($this->session->userdata('administrador')) {
                header( 'Location: '.base_url().'mantenimiento/home');
            } else {
                $this->load->view('home_mantenimiento_view');
            }

            
        }
        
        //Login mantenimiento
        public function login(){

            $loginMantenimientoData = array("usuario"=>$_POST['usuario'],"password"=>$_POST['password']);
            $this->load->model("mantenimiento_model");
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

        //Inicio manteniniento
        public function home(){

            //$PrimerNombre = $this->session->userdata('PrimerNombre');
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('mantenimiento_view',$PrimerNombre);

        }

        //pantalla participantes
        public function participantes(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('mantenimiento_participante_view',$PrimerNombre);
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

        //Baja del premio--
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
            
            if($PremioDataInfo){
                $data["PremioDataInfo"] = $PremioDataInfo;
            }else{
                $data["PremioDataInfo"] = false;
            }

            $this->load->view('premio_updateInfo_view',$data);

        }
        /* Fin update premios */

        //salir del mantenimiento
        public function exit_mantenimiento(){
            $array_items = array('administrador' => '', 'CodEmpresa' => '');
            $this->session->unset_userdata($array_items);
            //Manda al inicio de la página, si no hay session se va al login.
            header( 'Location: '.base_url().'mantenimiento');
        }

    }

?>