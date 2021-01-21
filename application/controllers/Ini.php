<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Ini extends CI_Controller {
		public function loginReconocelo(){
            $loginReconoceloData = array(
                "usuarioReconocelo"=>$this->input->post('usuarioReconocelo'),
                "passwordReconocelo"=>$this->input->post('passwordReconocelo')
            );

            $login['result'] = $this->Reconocelo_model1->loginReconocelo($loginReconoceloData);


			if ($login['result'][0]){

				if (strlen($login['result'][0]->eMail)>0){
					$email_s = $login['result'][0]->eMail;
				}else{
					$email_s = "-";
				}

				$userData = array(
					'logged_in'      => TRUE,
					'nombre'      	  => $login['result'][0]->PrimerNombre,
					'programa'  	  => $login['result'][0]->codPrograma,
					'participante'	  => $login['result'][0]->codParticipante,
					'empresa'        => $login['result'][0]->codEmpresa,
					'status'         => $login['result'][0]->Status,
					'puntos'         => $login['result'][0]->SaldoActual,
					'idPart'         => $login['result'][0]->idParticipante,
					'calle'          => $login['result'][0]->CalleNumero,
					'colonia'        => $login['result'][0]->Colonia,
					'cp'             => $login['result'][0]->CP,
					'ciudad'         => $login['result'][0]->Ciudad,
					'estado'         => $login['result'][0]->Estado,
					'email'          => $email_s,
					'pwd' => $login['result'][0]->pwd,
					'urlEmp' => $login['result'][0]->urlEmpresa
				);

				$this->session->set_userdata($userData);
				$this->output->set_output(json_encode($login['result'][0]));
			}else{
				$this->output->set_output(json_encode(0));
			}
        }
		public function index(){
			if ($this->session->userdata('logged_in')){
				header( 'Location: '.base_url().'Home');
			}else{
				$this->load->view('login_view');
			}
		}

  	}
?>