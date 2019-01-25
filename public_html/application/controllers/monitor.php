<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Monitor extends CI_Controller {

        public function __construct() {
            parent::__construct();
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
            $postdata = file_get_contents("php://input");
            $request = json_decode($postdata);
            $usuario = $request->usuario;
            $pasword = $request->password;
            $data = array('usuario' => $usuario, 'password' => $pasword);
            $this->load->model("login_monitor_model");
            $InformacionLogin = $this->login_monitor_model->loadData($data);
            $result = 0;
            if ($InformacionLogin) {
                $InformacionLoginUsuario = array(
                    'administrador' => TRUE,
                    'CodEmpresa' => $InformacionLogin[0]["CodEmpresa"],
                    'CodPrograma' => $InformacionLogin[0]["CodPrograma"],
                    'empresa' => $InformacionLogin[0]["empresa"]
                );
                $this->session->set_userdata($InformacionLoginUsuario);
                // var_dump($InformacionLoginUsuario);
                $result = 1;
            } else {
                $result = 0;
            }
            echo $result;
        }

        public function AvisoPrivacidad(){   
            $this->load->view('aviso_view_monitor');   
        }

        public function ObtenerParticipantes() {

            $this->load->model("login_monitor_model");

            $participantes = $this->login_monitor_model->loadParticipantes();
            $info = array('data' => $participantes);

            echo $info;
            //   $info =  json_encode($info)
            //  $this->load->view("participantes_view",$info);
        }

        public function Participante_Detalle($idParticipante, $nombre) {
            $this->load->model("login_monitor_model");
            $data = $this->login_monitor_model->misPreCanjes($idParticipante);
            $info = array('data' => $data, 'nombre' => $nombre);
            //var_dump($info);

            $this->load->view('participante_detalle_monitor', $info);
        }

////////////////////////////////////API RECONOCELO //////////////////////////////////

////////////////////////////////////GETS //////////////////////////////////   
    
        public function ObtenerPrticipantes($idCodPrograma, $codEmpresa) {
            $this->load->model("api_model_monitor");
            $data = $this->api_model_monitor->obtenerParticipantes($idCodPrograma, $codEmpresa);
            if ($data) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($data));
            } else {
                $error = array("Error" => "No Information");
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($error));
            }
        }
    

        public function ObtenerCanjesPrticipante($idParticipante,$codPrograma) {
            $this->load->model("api_model_monitor");
            $data = $this->api_model_monitor->ObtenerCanjesParticipante($idParticipante,$codPrograma);
            if ($data) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($data));
            } else {
                $error = array("Error" => "No Information");
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($error));
            }
        }

        public function ValidateLogin($usuario,$password) {
            $this->load->model("api_model_monitor");
            $data = $this->api_model_monitor->login($usuario,$password);
            if ($data) {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($data));
            } else {
                $error = array("Error" => "No Information");
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($error));
            }
        } 
    //////////////////////////////////// END GETS //////////////////////////////////   

    /////////////////////////Menu navegacion reconocelo monitor/////////////////////
    ///////////////////////////////Participantes///////////////////////////////////
        public function participantes(){
            $this->load->view('participante_monitor_view');
        }

        //Todos los participantes
        public function ParticipantesTodos(){

            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->getTodosParticipantes();
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
            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->geTParticipantesSaldo();
            if ($participante){
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Participantes sin saldo
        public function sinSaldoParticipantes(){
            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->geTParticipantesSinSaldo();
            if ($participante){
                $data["participante"] = $participante;
            }else{
                $data["participante"] = false;
            }
            $this->load->view('partSaldo_monitor_view',$data);
        }

        //Participantes todos activos
        public function saldoTodoActivo(){
            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->geTodoSaldoActivo();
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
            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->geTodoInactivo();
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
            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->getSaldoActivo();
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
            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->geTSaldoInactivo();
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
            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->geTSinSaldoActivo();
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
            $this->load->model("participante_monitor_model");
            $participante = $this->participante_monitor_model->geTSinSaldoInactivo();
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
            $this->load->model("participante_monitor_model");

            $infoParticipante = array("codParticipante"=>$_POST['codParticipante']);

            $movimientosDeParticipante = $this->participante_monitor_model->participanteInfoData($infoParticipante);

            $codPrograma = $movimientosDeParticipante[0]["codPrograma"];
            $codEmpresa = $movimientosDeParticipante[0]["codEmpresa"];
            $codParticipante = $movimientosDeParticipante[0]["codParticipante"];

            $participanteData = $this->participante_monitor_model->movimientosDeParticipante($codPrograma,$codEmpresa,$codParticipante);

            if ($participanteData){
                $data = array( 'participanteData' => $participanteData);
            }else{
                $data = array( 'participanteData' => false);
            }
            $this->load->view('modalPartici_monitor_view',$data);
        }

        //Exportando participantes a excel
        public function exportParticipantesExcel(){

            $this->load->model("participante_monitor_model");
            $optionExportData = array("numberExportDB"=>$_POST['numberExportDB']);
            $number = $optionExportData['numberExportDB'];

            switch ($optionExportData['numberExportDB']){
                case 1:
                    $participante = $this->participante_monitor_model->getTodosParticipantes();
                    if ($participante){
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
                case 2:
                    $participante = $this->participante_monitor_model->geTodoSaldoActivo();
                    if ($participante)
                    {
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
                case 3:
                    $participante = $this->participante_monitor_model->geTodoInactivo();
                    if ($participante)
                    {
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
                case 4:
                    $participante = $this->participante_monitor_model->geTParticipantesSaldo();
                    if ($participante){
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
                case 5:
                    $participante = $this->participante_monitor_model->getSaldoActivo();
                    if ($participante)
                    {
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
                case 6:
                    $participante = $this->participante_monitor_model->geTSaldoInactivo();
                    if ($participante)
                    {
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
                case 7:
                    $participante = $this->participante_monitor_model->geTParticipantesSinSaldo();
                    if ($participante){
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
                case 8:
                    $participante = $this->participante_monitor_model->geTSinSaldoActivo();
                    if ($participante)
                    {
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
                case 9:
                    $participante = $this->participante_monitor_model->geTSinSaldoInactivo();
                    if ($participante)
                    {
                        $data["participante"] = $participante;
                    }else{
                        $data["participante"] = false;
                    }
                    break;
            }

            $this->load->view('participanteExcel_monitor_view',$data);

        }
////////////////////////////FinParticipantes///////////////////////////////////
////////////////////////////InicioDepositos///////////////////////////////////
        public function depositos(){
            $this->load->model("deposito_monitor_model");
            $deposito = $this->deposito_monitor_model->getFechaDeposito();
            if ($deposito){
                $data["deposito"] = $deposito;
            }else{
                $data["deposito"] = false;
            }

            $this->load->view('deposito_monitor_view',$data);
        }

        public function depositosInfo(){
            $this->load->model("deposito_monitor_model");
            $deposito = $this->deposito_monitor_model->getDeposito();
            if ($deposito){
                $data["deposito"] = $deposito;
            }else{
                $data["deposito"] = false;
            }
            $this->load->view('depoTable_monitor_view',$data);
        }

        public function depositosInforma(){
            $this->load->model("deposito_monitor_model");

            $infoFechas = array("fechaInicio"=>$_POST['fechaInicio'],
                "fechaFin"=>$_POST['fechaFin']
                );

            $deposito = $this->deposito_monitor_model->getDepositoFechas($infoFechas);
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
/////////////////////////////////////Fin menu/////////////////////////////////////
    }