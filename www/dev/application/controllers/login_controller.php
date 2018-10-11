<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login_controller extends CI_Controller {
    	   
        public function __construct()
        {
                parent::__construct();
                $this->load->model("login_model");
        }
		
		public function login()
		{
            $fecha     = date("H:i:s");
            $fechaHora = date("Y-m-d H:i:s");

			$login = $this->login_model->login($_POST);
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
                                            'fecha'          => $fecha,
                                            'fechaHora'      => $fechaHora,
                                            'logged_in'      => TRUE,
                                            'nombre'         => $login[0]["PrimerNombre"]." ".$login[0]["ApellidoPaterno"],//PrimerNombre,SegundoNombre,ApellidoPaterno,ApellidoMaterno
                                            'programa'       => $login[0]["codPrograma"],
                                            'participante'   => $login[0]["codParticipante"],
                                            'empresa'        => $login[0]["codEmpresa"],
                                            'status'         => $login[0]["Status"],
                                            'puntos'         => $login[0]["SaldoActual"],
                                            'idPart'         => $login[0]["idParticipante"],
                                            'calle'          => $login[0]["CalleNumero"],
                                            'colonia'        => $login[0]["Colonia"],
                                            'cp'             => $login[0]["CP"],
                                            'ciudad'         => $login[0]["Ciudad"],
                                            'estado'         => $login[0]["Estado"],
                                            'email'          => $email_s,     
                                            'visibilidad'    => $login[0]["Visibilidad"],//0 = Solo visualiza la categoría que le corresponde. 1 = Ve todas las categorias de premios
                                            'categoria'      => $login[0]["codCategoria"],//CAtegoria correspondiente al usuario en la tabla participantes
                                            //Fechas correspondientes al periodo permitido para que el usuario realice canjes
                                            'fini'           => $login[0]["fhInicioOrden"], 
                                            'ffin'           => $login[0]["fhFinOrden"]
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