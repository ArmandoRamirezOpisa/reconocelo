<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Recuperar_usuario extends CI_Controller {
            
        public function index(){   
            $this->load->view('recuperaPasword_view');
        }
        
        public function sendMailRecuperaReconocelo(){
            $this->load->library('email');
            $this->load->model("cuenta_model");
            $usuarioEmailReconocelo = array("usuarioEmailReconocelo"=>$_POST['usuarioEmailReconocelo']);
            $emailTrueReconocelo = $this->cuenta_model->checkMailExitsReconocelo($usuarioEmailReconocelo);
            if($emailTrueReconocelo){
                /* Notificacion por correo */

                //Configuracion de SMTP
                $config['smtp_host'] = 'm176.neubox.net';
                $config['smtp_user'] = 'armando.ramirez@opisa.com';//envios@opisa.com
                $config['smtp_pass'] = 'arm941008';//3hf89w
                $config['smtp_port'] = 465;
                $config['mailtype'] = 'html';

                $message = '<!DOCTYPE html>
                <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>Reconocelo mail</title>
                        <style type="text/css">
                            body {
                                padding-top: 0 !important;
                                padding-bottom: 0 !important;
                                padding-top: 0 !important;
                                padding-bottom: 0 !important;
                                margin: 0 !important;
                                width: 100% !important;
                                -webkit-text-size-adjust: 100% !important;
                                -ms-text-size-adjust: 100% !important;
                                -webkit-font-smoothing: antialiased !important;
                            }
                            .tableContent img {
                                border: 0 !important;
                                display: inline-block !important;
                                outline: none !important;
                            }
                            a {
                                color: #382F2E;
                            }
                            p,
                            h1,
                            h2,
                            ul,
                            ol,
                            li,
                            div {
                                margin: 0;
                                padding: 0;
                            }
                            h1,
                            h2 {
                                font-weight: normal;
                                background: transparent !important;
                                border: none !important;
                            }
                            .contentEditable h2.big {
                                font-size: 30px !important;
                            }
                            .contentEditable h2.bigger {
                                font-size: 37px !important;
                            }
                            td,
                            table {
                                vertical-align: top;
                            }
                            td.middle {
                                vertical-align: middle;
                            }
                            a.link1 {
                                font-size: 13px;
                                color: #B791BF;
                                text-decoration: none;
                            }
                            .link2 {
                                font-size: 13px;
                                color: #ffffff;
                                text-decoration: none;
                                line-height: 19px;
                                font-family: Helvetica;
                            }
                            .link3 {
                                color: #FBEFFE;
                                text-decoration: none;
                            }
                            .contentEditable li {
                                margin-top: 10px;
                                margin-bottom: 10px;
                                list-style: none;
                                color: #ffffff;
                                text-align: center;
                                font-size: 13px;
                                line-height: 19px;
                            }
                            .appart p {
                                font-size: 13px;
                                line-height: 19px;
                                color: #aaaaaa !important;
                            }
                            .bgBody {
                                background: #ffffff;
                            }
                            .bgItem {
                                background: #ffffff;
                            }
                        </style>
                        <script type="colorScheme" class="swatch active">
                            { "name":"Default", "bgBody":"ffffff", "link":"B791BF", "color":"ffffff", "bgItem":"CFB4D5", "title":"ffffff" }
                        </script>
                        </head>
                        <body paddingwidth="0" paddingheight="0" class="bgBody" style="padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;"
                        offset="0" toppadding="0" leftpadding="0">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableContent bgBody" align="center" style="font-family:Georgia, serif;">
                                <tr>
                                    <td width="660" align="center">
                                        <table width="660" border="0" cellspacing="0" cellpadding="0" align="center" class="bgItem">
                                            <tr>
                                                <td align="center" width="660" class="movableContentContainer">
                                                    <div class="movableContent">
                                                        <table width="660" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="contentEditableContainer contentImageEditable">
                                                                        <div class="contentEditable">
                                                                            <img src="https://www.reconocelo.com.mx/assets/images/reconocelo.png" alt="Wedding couple" data-default="placeholder" data-max-width="1000" width="800" height="150">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="movableContent">
                                                        <table width="700" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tr>
                                                                <td height="30" colspan="3"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="middle" width="100">
                                                                    <div style="border-top:0px solid #ffffff"></div>
                                                                </td>
                                                                <td>
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable" style="color:#000000;text-align:center;font-family:Baskerville;">
                                                                            <h2 class="bigger">Ingresa al siguiente link para cambiar tu contraseña</h2>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="middle" width="100">
                                                                    <div style="border-top:0px solid #ffffff"></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="movableContent">
                                                        <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div style="border-top:0px solid #ffffff;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" height="35"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable" style="color:#000000;text-align:center;font-family:Helvetica;font-weight:normal;font-style:italic;">
                                                                            <h2 class="big"><a href="https://reconocelo.com.mx/recuperar_usuario/passwordNuevoReconocelo/?log='.$emailTrueReconocelo[0]['loginWeb'].'&codP='.$emailTrueReconocelo[0]['CodPrograma'].'&codE='.$emailTrueReconocelo[0]['codEmpresa'].'&codP='.$emailTrueReconocelo[0]['idParticipante'].'">Recupera tu contraseña</a></h2>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" height="15"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="movableContent">
                                                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tr>
                                                                <td colspan="2" height="50"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div style="border-top:0px solid #ffffff;"></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="movableContent">
                                                        <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tr>
                                                                <td class="middle" width="100">
                                                                    <div style="border-top:0px solid #ffffff"></div>
                                                                </td>
                                                                <td class="middle" width="100">
                                                                    <div style="border-top:0px solid #ffffff"></div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="movableContent">
                                                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tr>
                                                                <td height="75"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div style="border-top:0px solid #ffffff;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="25"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable" style="color:#000000;text-align:center;font-size:13px;line-height:19px;">
                                                                            <p>Enviado por el equipo de Operaciones Reconocelo</p>
                                                                            <p>soporte@Reconocelo.com.mx</p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </body>
                    </html>';
                /* Fin de la Estructura del correo de reconocelo monitor */
                //Inicializa
                $this->email->initialize($config);
                //Envío de alerta.
                $this->email->from('no_reply@reconocelo.com.mx', 'reconocelo.com.mx');
                $this->email->to($usuarioEmailReconocelo['usuarioEmailReconocelo']);
                //$this->email->cc($this->session->userdata('email'));

                $this->email->subject('Recuperar cuenta Reconocelo');
                $this->email->message($message);

                $this->email->send();

                /* Fin notificacion por correo */
            }
        }

        public function passwordNuevoReconocelo(){
            $UpdateEmailReconocelo = array(
                "log"=>$_GET["log"],
                "codP"=>$_GET["codP"],
                "codE"=>$_GET['codE'],
                "codP"=>$_GET['codP']);
            $this->load->view('recuperaPasswordNew_view',$UpdateEmailReconocelo);
        }

        public function cambiarUserPasswordNewReconocelo(){
            $this->load->model("cuenta_model");

            $passwordConfigReconocelo = array("loginWeb"=>$_POST['loginWeb'],
                "idParticipante"=>$_POST['idParticipante'],
                "passwordNewReconocelo"=>$_POST['passwordNewReconocelo']
            );
            $passwordCambiado = $this->cuenta_model->cambiarPasswordNewReconocelo($passwordConfigReconocelo);
            if($passwordCambiado){
                $this->output->set_output(json_encode($passwordCambiado));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

    }
?>