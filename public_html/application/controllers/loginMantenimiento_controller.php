<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class LoginMantenimiento_controller extends CI_Controller {
    	   
        public function __construct()
        {
            parent::__construct();
            $this->load->model("login_model");
        }

		public function login()
		{
			$login = $this->login_model->loginMantenimiento($_POST);
            //echo $login;
			if ($login)
			{
				//Crea la session con los datos del usuario
                if (strlen($login[0]["eMail"])>0)
                {
                	$email_s = $login[0]["eMail"];
                }else{
                	$email_s = "-";
                }    

				$userData = array(
			                   'logged_in'      => TRUE,
                               'nombre'      	  => $login[0]["PrimerNombre"],
                               'programa'   	  => $login[0]["codPrograma"],
                               'participante'	  => $login[0]["codParticipante"],
                               'empresa'        => $login[0]["codEmpresa"],
                               'status'         => $login[0]["Status"],
                               'puntos'         => $login[0]["SaldoActual"],
                               'idPart'         => $login[0]["idParticipante"],
                               'calle'          => $login[0]["CalleNumero"],
                               'colonia'        => $login[0]["Colonia"],
                               'cp'             => $login[0]["CP"],
                               'ciudad'         => $login[0]["Ciudad"],
                               'estado'         => $login[0]["Estado"],
                               'iniOrden'       => $login[0]["fhInicioOrden"],
                               'finOrden'       => $login[0]["fhFinOrden"],
                               'email'          => $email_s,
                                 'Visibilidad'       => $login[0]["Visibilidad"],
                                    'pwd' => $login[0]['pwd']
                                                                                                            
                           );
				//Asigna el array con los datos del usuario a userdata
            	$this->session->set_userdata($userData);
				//var_dump($userData);
				//echo "SSSM=".$this->session->userdata('logged_in');  
				
				$this->output->set_output(json_encode(true));//si encuantra al usuario regresa true
			}else{
				$this->output->set_output(json_encode(false));//si no encuentra al usuario regresa false
			}
		}
	}
?>