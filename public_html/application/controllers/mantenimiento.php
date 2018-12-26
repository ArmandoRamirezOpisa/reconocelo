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

            $participanteData = $this->mantenimiento_model->participanteMantenimiento($saveParticipantesData);

            if($participanteData){
                $this->output->set_output(json_encode($participanteData));
            }else{
                $this->output->set_output(json_encode(false));
            }

        }

        //pantalla premios
        public function premios(){
            $PrimerNombre = array("PrimerNombre"=>$this->session->userdata('CodEmpresa'));
            $this->load->view('mantenimiento_premio_view',$PrimerNombre);
        }

        //salir del mantenimiento
        public function exit_mantenimiento(){
            $array_items = array('administrador' => '', 'CodEmpresa' => '');
            $this->session->unset_userdata($array_items);
            //Manda al inicio de la página, si no hay session se va al login.
            header( 'Location: '.base_url().'mantenimiento');
        }

    }

?>