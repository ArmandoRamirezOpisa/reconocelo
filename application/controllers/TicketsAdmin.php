<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class TicketsAdmin extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library('email');
            $this->load->model("Reconocelo_model1");
        }

    	public function index(){
            if ($this->session->userdata('administardor')) {
                header( 'Location: '.base_url().'TicketsAdmin/home');
            } else {
                $this->load->view('home_adminList_view');
            }
        }

        public function login(){
            $loginTicketAdmin = array(
                "usuario"=>$this->input->post('usuario'),
                "password"=>$this->input->post('password')
            );
            $userTicketExist = $this->Reconocelo_model1->loginUserTicket($loginTicketAdmin);
            if ($userTicketExist){
                $userTicketExist = array(
                    'administrador' => TRUE,
                    'CodEmpresa' => $userTicketExist[0]["CodEmpresa"],
                    'CodPrograma' => $userTicketExist[0]["CodPrograma"],
                    'Usuario' => $userTicketExist[0]["Usuario"]
                );
                $this->session->set_userdata($userTicketExist);
                $this->output->set_output(json_encode($userTicketExist));
            }else{
                $NoEntro = "NoEntro";
                $this->output->set_output(json_encode(false));
            }
        }

        public function home(){
            $ticketListAdmin = $this->Reconocelo_model1->ticketsAdmin();
            if ($ticketListAdmin){
                $data['ticketListAdmin'] = $ticketListAdmin;
            }else{
                $data['ticketListAdmin'] = false;
            }
            $this->load->view('ticketsList_view',$data);
        }

        public function sendTicketAnswer(){
            $ticketAnswerAdmin = array(
                "ticketId"=>$this->input->post('ticketId'),
                "respuestaTicket"=>$this->input->post('respuestaTicket')
            );
            $ticketHistoryData = $this->Reconocelo_model1->sendAnswerTicketAdmin($ticketAnswerAdmin);
            $mailAdministradorTickets = $this->session->userdata('idPart');
            if($mailAdministradorTickets){
                $mailAdministradorTickets;
            }else{
                $ticketId = $ticketAnswerAdmin['ticketId'];
                $RespuestaTicket = $ticketAnswerAdmin['respuestaTicket'];
                $participanteTicket = $this->Reconocelo_model1->participanteTicket($ticketId);
                $ParticipanteId = $participanteTicket[0]['idParticipante'];
                $fechaCreacion = $participanteTicket[0]['FechaCreacion'];
                $datosParticipante = $this->Reconocelo_model1->datosParticipante($ParticipanteId);
                $config['smtp_host'] = 'm176.neubox.net';
                $config['smtp_user'] = 'envios@opisa.com';
                $config['smtp_pass'] = '3hf89w';
                $config['smtp_port'] = 465;
                $config['mailtype'] = 'html';
                $message = '<!DOCTYPE html>
                <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>Reconocelo ticket mail</title>
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
                            p,h1,h2,ul,ol,li,div {
                                margin: 0;
                                padding: 0;
                            }
                            h1,h2 {
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
                            td,table {
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
                                                                            <img src="http://35.236.41.75/reconocelo/assets/images/reconocelo.png" alt="Wedding couple" data-default="placeholder" data-max-width="660" width="660" height="250">
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
                                                                            <h2 class="bigger">Respuesta del ticket: '.$ticketId.'</h2>
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
                                                                <td colspan="5" height="50"></td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div style="border-top:0px solid #ffffff;"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable" style="color:#000000;text-align:center;font-family:Helvetica;font-weight:normal;font-style:italic;">
                                                                            <h2 class="big">Detalle del ticket</h2>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="5" height="15"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">Participante:</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">'.$datosParticipante[0]['PrimerNombre'].'</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">Fecha de creacion:</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">'.$fechaCreacion.'</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">Tema:</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">'.$participanteTicket[0]['Subject'].'</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="40"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">Respuesta:</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">'.$RespuestaTicket.'</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="movableContent">
                                                        <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
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
                $this->email->initialize($config);
                $this->email->from('no_reply@reconocelo.com.mx', 'reconocelo.com.mx');
                $this->email->to($datosParticipante[0]['eMail']);
                $this->email->subject('Respuesta del ticket '.$ticketId.'');
                $this->email->message($message);
                $this->email->send();
                $mailAdministradorTickets = "Administrador";
            }
            if ($ticketHistoryData){
                $this->output->set_output(json_encode($ticketHistoryData));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function exit_ticket(){
            $array_items = array('administrador' => '', 'Usuario' => '');
            $this->session->unset_userdata($array_items);
            header( 'Location: '.base_url().'TicketsAdmin');
        }
    }
?>