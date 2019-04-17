<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Monitor extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->library('email');
        }

        public function index() {
            if ($this->session->userdata('administrador')) {
                header( 'Location: '.base_url().'monitor/home');
            } else {
                $this->load->view("monitor_Login_view");
            }
        }

        public function home(){
            $this->load->view("home_monitor_view");
        }

        public function login() {
            $data = array('usuario' => $_POST['user'], 'password' => $_POST['password']);
            $this->load->model("monitor_model");
            $InformacionLogin = $this->monitor_model->loadData($data);
            $result = 0;
            if ($InformacionLogin) {
                $InformacionLoginUsuario = array(
                    'administrador' => TRUE,
                    'CodEmpresa' => $InformacionLogin[0]["CodEmpresa"],
                    'CodPrograma' => $InformacionLogin[0]["CodPrograma"],
                    'empresa' => $InformacionLogin[0]["empresa"],
                    'usuario' => $InformacionLogin[0]["Usuario"],
                    'email' => $InformacionLogin[0]["email"]
                );
                $this->session->set_userdata($InformacionLoginUsuario);
                $this->output->set_output(json_encode($InformacionLogin));
            } else {
                $this->output->set_output(json_encode(false));
            }
        }

        public function AvisoPrivacidad(){   
            $this->load->view('aviso_view_monitor');   
        }

    /////////////////////////Menu navegacion reconocelo monitor/////////////////////
    ///////////////////////////////Participantes///////////////////////////////////
        public function participantes(){
            $this->load->view('participante_monitor_view');
        }

        //Todos los participantes
        public function ParticipantesTodos(){

            $this->load->model("monitor_model");
            $participante = $this->monitor_model->getTodosParticipantes();
            $codEmpresa = $this->session->userdata('CodEmpresa');
            if ($participante){
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);

        }

        //Participantes con saldo
        public function conSaldoParticipantes(){
            $this->load->model("monitor_model");
            $participante = $this->monitor_model->geTParticipantesSaldo();
            if ($participante){
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Participantes sin saldo
        public function sinSaldoParticipantes(){
            $this->load->model("monitor_model");
            $participante = $this->monitor_model->geTParticipantesSinSaldo();
            if ($participante){
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Participantes todos activos
        public function saldoTodoActivo(){
            $this->load->model("monitor_model");
            $participante = $this->monitor_model->geTodoSaldoActivo();
            if ($participante)
            {
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Participantes todos inactivos
        public function saldoTodoInactivo(){
            $this->load->model("monitor_model");
            $participante = $this->monitor_model->geTodoInactivo();
            if ($participante)
            {
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Participantes Activos con saldo
        public function saldoActivo(){
            $this->load->model("monitor_model");
            $participante = $this->monitor_model->getSaldoActivo();
            if ($participante)
            {
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Participantes inactivos con saldo
        public function saldoInactivo(){
            $this->load->model("monitor_model");
            $participante = $this->monitor_model->geTSaldoInactivo();
            if ($participante)
            {
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Participantes activos sin saldo
        public function sinSaldoActivo(){
            $this->load->model("monitor_model");
            $participante = $this->monitor_model->geTSinSaldoActivo();
            if ($participante)
            {
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Pariticipantes inactivos sin saldo
        public function sinSaldoInactivo(){
            $this->load->model("monitor_model");
            $participante = $this->monitor_model->geTSinSaldoInactivo();
            if ($participante)
            {
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Informacion de los participantes
        public function participanteInfo(){
            $this->load->model("monitor_model");

            $infoParticipante = array("codParticipante"=>$_POST['codParticipante']);

            $movimientosDeParticipante = $this->monitor_model->participanteInfoData($infoParticipante);

            $codPrograma = $movimientosDeParticipante[0]["codPrograma"];
            $codEmpresa = $movimientosDeParticipante[0]["codEmpresa"];
            $codParticipante = $movimientosDeParticipante[0]["codParticipante"];

            $participanteData = $this->monitor_model->movimientosDeParticipante($codPrograma,$codEmpresa,$codParticipante);

            if ($participanteData){
                $data = array( 'participanteData' => $participanteData);
            }else{
                $data = array( 'participanteData' => false);
            }
            $this->load->view('modalPartici_monitor_view',$data);
        }
////////////////////////////FinParticipantes///////////////////////////////////
////////////////////////////InicioDepositos///////////////////////////////////
        public function depositos(){
            $this->load->model("monitor_model");
            $deposito = $this->monitor_model->getFechaDeposito();
            if ($deposito){
                $data["deposito"] = $deposito;
            }else{
                $data["deposito"] = false;
            }

            $this->load->view('deposito_monitor_view',$data);
        }

        public function depositosInfo(){
            $this->load->model("monitor_model");
            $deposito = $this->monitor_model->getDeposito();
            if ($deposito){
                $data["deposito"] = $deposito;
            }else{
                $data["deposito"] = false;
            }
            $this->load->view('depoTable_monitor_view',$data);
        }

        public function depositosInforma(){
            $this->load->model("monitor_model");

            $infoFechas = array("fechaInicio"=>$_POST['fechaInicio'],
                "fechaFin"=>$_POST['fechaFin']
                );

            $deposito = $this->monitor_model->getDepositoFechas($infoFechas);
            if ($deposito){
                $data["deposito"] = $deposito;
            }else{
                $data["deposito"] = false;
            }
            $this->load->view('depoTable_monitor_view',$data);
        }

        public function insertarDepositos(){
            $this->load->view('depositoInsert_monitor_view');
        }

        public function uploadDepositosNews(){
            $this->load->model("monitor_model");

            $infoDepositosNews = $_POST['infoNewsDepositos'];

            $depositoMasivo = $this->monitor_model->insertDepositoMasivo();

            if($depositoMasivo){
                $depositoDetalleMasivo = $this->monitor_model->insertDepositoDetalleMasivo($infoDepositosNews,$depositoMasivo);
                if($depositoDetalleMasivo){

                    //Total de puntos
                    $totalPuntos = $this->monitor_model->totalPuntos($depositoMasivo);

                    //TotalParticipantes
                    $totalParticipantesSubidos = $this->monitor_model->totalParticipantesSubidos($depositoMasivo);

                    /* Notificacion por correo */

                    //Configuracion de SMTP
                    $config['smtp_host'] = 'm176.neubox.net';
                    $config['smtp_user'] = 'envios@opisa.com';
                    $config['smtp_pass'] = '3hf89w';
                    $config['smtp_port'] = 465;
                    $config['mailtype'] = 'html';

                    /* Estructura del correo de reconocelo monitor*/
                    $message = '<!DOCTYPE html>
                    <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <title>Reconocelo Monitor mail</title>
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
                                                                            <img src="https://www.reconocelo.com.mx/assets/images/monitorLog.png" alt="Wedding couple" data-default="placeholder" data-max-width="1000" width="800" height="150">
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
                                                                            <h2 class="bigger">Se han subido exitosamente los depositos con numero de transaccion: '.$depositoMasivo.'</h2>
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
                                                                            <h2 class="big">Descripcion</h2>
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
                                                                                <h2 style="font-size:18px;line-height:50px;">Total de puntos:</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">'.$totalPuntos[0]['Puntos'].'</h2>
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
                                                                                <h2 style="font-size:18px;line-height:50px;">Numero de participantes:</h2>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="60"></td>
                                                                <td width="230" align="center">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable">
                                                                            <ul>
                                                                                <h2 style="font-size:18px;line-height:50px;">'.$totalParticipantesSubidos[0]['TotalSubido'].'</h2>
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
                                                        <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
                                                            <tr>
                                                                <td class="middle" width="100">
                                                                    <div style="border-top:0px solid #ffffff"></div>
                                                                </td>
                                                                <td class="middle" width="100">
                                                                    <div style="border-top:0px solid #ffffff"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="50" colspan="3"></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="20" colspan="3"></td>
                                                            </tr>
                                                            <tr>    
                                                                <td width="80"></td>
                                                                <td align="justify">
                                                                    <div class="contentEditableContainer contentTextEditable">
                                                                        <div class="contentEditable" style="color:#000000;font-size:13px;line-height:19px;">
                                                                            <p>
                                                                                Los depositos que has subido, se encuentran inactivos, en la misma seccion,
                                                                                donde se subieron,aparecera una parte para poder activarlos, en el momento 
                                                                                que ustdes desee.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td width="80"></td>
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
                    $this->email->to($this->session->userdata('email'));

                    $this->email->subject('Nuevos depositos subidos');
                    $this->email->message($message);

                    $this->email->send();

                    /* Fin notificacion por correo */

                    $this->output->set_output(json_encode($depositoDetalleMasivo));
                }else{
                    $this->output->set_output(json_encode(false));
                    
                }
            }

        }

        public function depositosSubidos(){

            $idDepositoParticipante = "";
            $this->load->model("monitor_model");
            $depositover = $this->monitor_model->verDepositosUsuario();
            if ($depositover){
                $data["depositover"] = $depositover;
            }else{
                $data["depositover"] = false;
            }
            $this->load->view('depositoUpload_monitor_view',$data);
        
        }

        public function uploadPuntosDeposito(){

            $numTransaccion = array("numTransaccion"=>$_POST['numTransaccion']);
            $this->load->model("monitor_model");
            $depositoverUpload = $this->monitor_model->getDepositosDet($numTransaccion);
            $saldoTotalParticipante = 0;
            $totalRegistros = 0;
            if($depositoverUpload){

                foreach($depositoverUpload as $row){

                    $saldoParticipantes = $this->monitor_model->UpdateSaldoParticipante($row['idParticipanteCliente'],$row['Puntos']);
                    if($saldoParticipantes){
                        
                        $updateDepositosDet = $this->monitor_model->UpdateDepositosDet($numTransaccion,$row['idParticipanteCliente']);
                        if($updateDepositosDet){
                            $idParticipanteData = $this->monitor_model->idParticipanteGet($row['idParticipanteCliente']);
                            if($idParticipanteData){
                                $insertPartMovsRealiza = $this->monitor_model->insertPartMovsRealiza($idParticipanteData[0]['idParticipante'],$row['Concepto'],$row['Puntos']);
                                $saldoTotalParticipante = $saldoTotalParticipante + 1;
                            }

                        }
                    }

                    $totalRegistros = $totalRegistros + 1;
                }

                if($totalRegistros == $saldoTotalParticipante){

                    $UpdateMasterDeposito = $this->monitor_model->UpdateMasterDeposito($numTransaccion);
                    $this->output->set_output(json_encode("Todo se hizo correcto"));

                }else{
                    $this->output->set_output(json_encode($saldoTotalParticipante));    
                }

            }else{
                $this->output->set_output(json_encode(false));
            }
        }
////////////////////////////FinDepositos///////////////////////////////////////
/////////////////////////InicioCanjes/////////////////////////////////////////
        public function canjes(){
            $this->load->model("canje_monitor_model");
            $canje = $this->canje_monitor_model->getFechaCanje();
            if ($canje){
                $data["canje"] = $canje;
            }else{
                $data["canje"] = false;
            }

            $this->load->view('canje_monitor_view',$data);
        }

        public function canjesInfo(){
            $this->load->model("canje_monitor_model");
            $canje = $this->canje_monitor_model->getCanje();
            if ($canje){
                $data["canje"] = $canje;
            }else{
                $data["canje"] = false;
            }
            $this->load->view('canjeTable_monitor_view',$data);
        }

        public function canjesInforma(){
            $this->load->model("canje_monitor_model");

            $infoFechas = array("fechaInicio"=>$_POST['fechaInicio'],
                "fechaFin"=>$_POST['fechaFin']
                );

            $canje = $this->canje_monitor_model->getCanjeFechas($infoFechas);
            if ($canje){
                $data["canje"] = $canje;
            }else{
                $data["canje"] = false;
            }
            $this->load->view('canjeTable_monitor_view',$data);
        }
////////////////////////FinCanjes////////////////////////////////////////////
///////////////////////////InicioCatalogo//////////////////////////////////////
        public function catalogo(){
            $this->load->model("catalogo_monitor_model");
            $catalogo = $this->catalogo_monitor_model->getCatalogo();
            if ($catalogo)
                {
                    $data["catalogo"] = $catalogo;
                }else{
                    $data["catalogo"] = false;
                }
            $this->load->view('catalogo_monitor_view',$data);
        }

        public function catalogoImg(){

            $codPremio = array("codPremio"=>$_POST['codPremio']);

            $this->load->model("catalogo_monitor_model");
            $descripcionImg = $this->catalogo_monitor_model->getDescripcionIMG($codPremio);

            if($descripcionImg){
                $data = array('codPremio'=>$codPremio,
                    'descripcion'=>$descripcionImg
                );
            }else{
                $data = array('codPremio'=>$codPremio,
                    'descripcion'=>false
                );
            }

            $this->load->view('catalogoModal_monitor_view',$data);
        }
///////////////////////////FinCatalogo//////////////////////////////////////
        public function programa(){
            $this->load->model("programa_monitor_model");
            $programa= $this->programa_monitor_model->getPrograma();
            $programaCanje= $this->programa_monitor_model->getProgramaCanje();
            if ($programa){
                $data = array( 'programa' => $programa,
                    'programaCanje' => $programaCanje
                );
            }else{
                $data = array( 'programa' => false,'programaCanje' => false);
            }

            $this->load->view('programa_monitor_view',$data);
        }
///////////////////////Configuracion usuario reconocelo monitor///////////////
        public function configuracion(){
            $this->load->view('configuracionUser_monitor_view');
        }

        public function cambiarUserName(){
            $this->load->model("configuracion_monitor_model");
            $usuario = array("usuario"=>$_POST['usuario']);
            $usuarioCambiado = $this->configuracion_monitor_model->cambiarNombre($usuario);
            if($usuarioCambiado){
                $this->output->set_output(json_encode($usuarioCambiado));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function cambiarUserPassword(){
            $this->load->model("configuracion_monitor_model");
            $password = array("password"=>$_POST['password']);
            $passwordCambiado = $this->configuracion_monitor_model->cambiarPassword($password);
            if($passwordCambiado){
                $this->output->set_output(json_encode($passwordCambiado));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }
///////////////////////Fin Configuracion usuario reconocelo monitor///////////////
/////////////////////// Recuperar contrasena///////////////////////////
        public function recuperarPassword(){
            $this->load->view('recuperaPassword_monitor_view');
        }

        public function sendMailRecupera(){
            $this->load->model("configuracion_monitor_model");
            $email = array("email"=>$_POST['email']);
            $emailTrue = $this->configuracion_monitor_model->checkMailExits($email);
            if($emailTrue){
                /* Notificacion por correo */

                //Configuracion de SMTP
                $config['smtp_host'] = 'm176.neubox.net';
                $config['smtp_user'] = 'envios@opisa.com';
                $config['smtp_pass'] = '3hf89w';
                $config['smtp_port'] = 465;
                $config['mailtype'] = 'html';

                $message = '<!DOCTYPE html>
                <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>Reconocelo Monitor mail</title>
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
                                                                            <img src="https://www.reconocelo.com.mx/assets/images/monitorLog.png" alt="Wedding couple" data-default="placeholder" data-max-width="1000" width="800" height="150">
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
                                                                        <h2 class="big"><a href="https://reconocelo.com.mx/monitor/passwordNuevo/?user='.$emailTrue[0]['Usuario'].'&cod='.$emailTrue[0]['CodEmpresa'].'">Recupera tu contraseña</a></h2>
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
                </html>
                ';
                /* Fin de la Estructura del correo de reconocelo monitor */
                //Inicializa
                $this->email->initialize($config);
                //Envío de alerta.
                $this->email->from('no_reply@reconocelo.com.mx', 'reconocelo.com.mx');
                $this->email->to($email['email']);
                //$this->email->cc($this->session->userdata('email'));

                $this->email->subject('Recuperar cuenta');
                $this->email->message($message);

                $this->email->send();

                /* Fin notificacion por correo */
            }
        }

        public function passwordNuevo(){
            $email = array("user"=>$_GET["user"],"cod"=>$_GET["cod"]);
            $this->load->view('recuperaPasswordNew_monitor_view',$email);
        }

        public function cambiarUserPasswordNew(){
            $this->load->model("configuracion_monitor_model");
            $passwordConfig = array("password"=>$_POST['password'],
                "usuario"=>$_POST['usuario'],
                "codEmpresa"=>$_POST['codEmpresa']
            );
            $passwordCambiado = $this->configuracion_monitor_model->cambiarPasswordNew($passwordConfig);
            if($passwordCambiado){
                $this->output->set_output(json_encode($passwordCambiado));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }
///////////////////////Fin recuperar contrasena////////////////////////
/////////////////////Reglas monitor reconocelo/////////////////////////
        public function reglasMonitor(){
            $this->load->model("reglas_model");
            $codEmpresa = $this->session->userdata('CodEmpresa');
            $CodPrograma = $this->session->userdata('CodPrograma');
            $reglasMonitor = $this->reglas_model->reglasReconocelo($codEmpresa,$CodPrograma);
            if($reglasMonitor){
                $data['reglasMonitor'] = $reglasMonitor;
            }else{
                $data['reglasMonitor'] = false;
            }
            $this->load->view('reglas_monitor_view',$data);
        }

        public function cambiarReglaReconocelo(){
            $this->load->model("reglas_model");
            $dataReglaReconocelo = array("idReglaNombre"=>$_POST['idReglaNombre'],
                "textoRegla"=>$_POST['textoRegla']
            );
            $reglasMonitorData = $this->reglas_model->reglasReconoceloUpdate($dataReglaReconocelo);
            if($reglasMonitorData){
                $this->output->set_output(json_encode($reglasMonitorData));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function cambiarNombreReglaReconocelo(){
            $this->load->model("reglas_model");
            $dataNombreReglaReconocelo = array("idReglaNombre"=>$_POST['idReglaNombre'],
                "textCambiar"=>$_POST['textCambiar']
            );
            $nombreReglasMonitorData = $this->reglas_model->nombreReglasReconoceloUpdate($dataNombreReglaReconocelo);
            if($nombreReglasMonitorData){
                $this->output->set_output(json_encode($reglasMonitorData));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function addNuevaRegla(){
            $this->load->model("reglas_model");
            $dataNuevaRegla = array("regla"=>$_POST['regla'],
                "descripcionRegla"=>$_POST['descripcionRegla']
            );
            $nuevaReglasData = $this->reglas_model->nuevaReglaReconocelo($dataNuevaRegla);
            if($nuevaReglasData){
                $this->output->set_output(json_encode($nuevaReglasData));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }
/////////////////////Fin reglas monitor reconocelo/////////////////////
/////////////////////////////////////Fin menu/////////////////////////////////////
    }