<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->library('email');
            $this->load->model("reconocelo_model");
            $this->load->model("reglas_model");
        }

        //Pagina principal que carga todo
    	public function index(){
            if($this->session->userdata('logged_in')){

                $cat = $this->reconocelo_model->getCategory();
                if ($cat){
                    $data["cat"] = $cat;
                }else{
                    $data["cat"] = false;
                }
                $this->load->view('includes/home_view_header',$data);

                $this->load->view('home_view');

                $this->load->view('includes/home_view_footer');

            }else{
                header('Location:'.base_url());
            }
		}

        //funcion para logearse
        public function loginReconocelo(){
            $loginReconoceloData = array(
                "usuarioReconocelo"=>$_POST['usuarioReconocelo'],
                "passwordReconocelo"=>$_POST['passwordReconocelo']
            );
            $login = $this->reconocelo_model->loginReconocelo($loginReconoceloData);
            if ($login){
                if (strlen($login[0]["eMail"])>0){
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
            	$this->session->set_userdata($userData);
				$this->output->set_output(json_encode(true));
            }else{
                $this->output->set_output(json_encode(0));//si no encuentra al usuario regresa false
            }
        }

        /* Funciones premios */

        //Obtiene todos los premios
        public function getAwards($idCat){
    	    $aw = $this->reconocelo_model->getAwards($idCat);
            if ($aw){
                $data["awards"] = $aw;
            }else{
                $data["awards"] = false;
            }
            $this->load->view('premios_view',$data);
        }

        //Muestra el premio seleccionado
        public function showItem($id){
    	    $item = $this->reconocelo_model->getDataItem($id);
            if ($item){
                $data["item"] = $item;
            }else{
                $data["item"] = false;
            }
    		$this->load->view('det_item_view',$data);
        }

        //Muestra los premios que se van a canjear
        public function showContentCart(){
			$this->load->view('prev_cart_view');
		}

        /* Fin funciones premios */

        /* Funcion Reglas Reconocelo */
        public function reglas(){
			if ($this->session->userdata('logged_in')){
                $cat = $this->reglas_model->getRules();
                if ($cat){
                    $data["cat"] = $cat;
                }else{
                    $data["cat"] = false;
                }
                $this->load->view('reglas_view',$data);
			}
    	}
        /* Fin funcion Reglas Reconocelo */

        /* Funcion Canjes Reconocelo */

        function getCanjes()
        {
            $misPreCanjes = $this->reconocelo_model->misPreCanjes();

            if ($misPreCanjes)
            {
                $data["precanjes"] = $misPreCanjes;
            }else{
                $data["precanjes"] = false;
            }

            $this->load->view('canjes_view',$data);
        }

        function addCanje()
        {

            $data = json_decode(stripslashes($_POST['data']));//Decodifica JSON
            
            $saldoACtualParticipante = $this->reconocelo_model->saldoActualParticipante();

            if($saldoACtualParticipante >= $this->session->userdata('puntos')){
                $idCanjeExits = $this->reconocelo_model->checkAddCanje();
                if($idCanjeExits){
                    $this->output->set_output(json_encode(false));
                }else{
                    $idCanje = $this->reconocelo_model->addCanje();
                    if ($idCanje){
                        $detCanje = $this->reconocelo_model->addDetCanje($data,$idCanje);
                        $updateSaldo = $this->reconocelo_model->updSaldo($_POST["ptsCanje"]);
                
                        if ($updateSaldo){
                            $sdoAct = $this->session->userdata('puntos') - $_POST["ptsCanje"];
                            $this->session->set_userdata('puntos', $sdoAct);
                        }
                
                        if ($detCanje){
                            //Envía mail de confirmación de canje
                            $this->sendCanjeMail($idCanje,$data);
                            $this->output->set_output(json_encode(true));    
                        }
                    }else{
                        $this->output->set_output(json_encode(false));
                    }
                }
            }else{
                $this->output->set_output(json_encode(false));
            }

        }

        function sendCanjeMail($idCanje = 0,$datos)
        {
            //Configuracion de SMTP
            $config['smtp_host'] = 'm176.neubox.net';
            $config['smtp_user'] = 'envios@opisa.com';
            $config['smtp_pass'] = '3hf89w';
            $config['smtp_port'] = 465;
            $config['mailtype'] = 'html';
            
            /* Estructura del correo de reconocelo */
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
                                                                    <img src="https://www.reconocelo.com.mx/assets/images/reconocelo.png" alt="Wedding couple" data-default="placeholder" data-max-width="660" width="660" height="250">
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
                                                                    <h2 class="bigger">Se ha generado la orden con Folio: '.$idCanje.'</h2>
                                                                </div>
                                                            </div>
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
                                                        <td align="center">
                                                            <div class="contentEditableContainer contentTextEditable">
                                                                <div class="contentEditable" style="color:#000000;font-size:13px;line-height:19px;">
                                                                    <p>NOMBRE: '.$this->session->userdata('nombre').' </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td width="80"></td>
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
                                                        <td colspan="5" height="35"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5">
                                                            <div class="contentEditableContainer contentTextEditable">
                                                                <div class="contentEditable" style="color:#000000;text-align:center;font-family:Helvetica;font-weight:normal;font-style:italic;">
                                                                    <h2 class="big">Productos</h2>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="5" height="15"></td>
                                                    </tr>';
                                                    foreach($datos as $d){
                                                        $message .='
                                                        <tr>
                                                            <td width="40"></td>
                                                            <td width="230" align="center">
                                                                <div class="contentEditableContainer contentTextEditable">
                                                                    <div class="contentEditable">
                                                                        <ul>
                                                                            <h2 style="font-size:18px;line-height:50px;">Artículo:</h2>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td width="60"></td>
                                                            <td width="230" align="center">
                                                                <div class="contentEditableContainer contentTextEditable">
                                                                    <div class="contentEditable">
                                                                        <ul>
                                                                            <h2 style="font-size:18px;line-height:50px;">'.$d->id.'</h2>
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
                                                                            <h2 style="font-size:18px;line-height:50px;">Desc:</h2>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td width="60"></td>
                                                            <td width="230" align="center">
                                                                <div class="contentEditableContainer contentTextEditable">
                                                                    <div class="contentEditable">
                                                                        <ul>
                                                                            <h2 style="font-size:18px;line-height:50px;">'.$d->nombre.'</h2>
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
                                                                            <h2 style="font-size:18px;line-height:50px;">Cantidad:</h2>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td width="60"></td>
                                                            <td width="230" align="center">
                                                                <div class="contentEditableContainer contentTextEditable">
                                                                    <div class="contentEditable">
                                                                        <ul>
                                                                            <h2 style="font-size:18px;line-height:50px;">'.$d->cantidad.'</h2>
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
                                                                            <h2 style="font-size:18px;line-height:50px;">Puntos:</h2>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td width="60"></td>
                                                            <td width="230" align="center">
                                                                <div class="contentEditableContainer contentTextEditable">
                                                                    <div class="contentEditable">
                                                                        <ul>
                                                                            <h2 style="font-size:18px;line-height:50px;">'.number_format($d->puntos).'</h2>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td width="60"></td>
                                                        </tr>';
                                                    }
                                                    $message .='
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
                                                                            Tu orden será enviada en los próximos 20 días hábiles, 
                                                                            la mayoría de los productos son entregados por empresas 
                                                                            de mensajería.
                                                                        </p>
                                                                        <br/>
                                                                        <p>
                                                                            Cuando un producto está listo para ser enviado, se enviará 
                                                                            un correo electrónico informativo al 
                                                                            participante para que éste pueda monitorear el envío.
                                                                        </p>
                                                                        <br/>
                                                                        <p>
                                                                            Todos los productos del catálogo tienen una garantía 
                                                                            directa con el fabricante o importador. Es muy 
                                                                            importante que mantengan su póliza de 
                                                                            garantía correspondiente para aplicarla cuando se requiera. 
                                                                            Si tiene alguna duda o pregunta al respecto, 
                                                                            podrá solicitar al proveedor una orientación a 
                                                                            soporte@Reconocelo.com.mx.
                                                                        </p>
                                                                        <br/>
                                                                        <p>
                                                                            <strong>Artículos dañados:</strong> En caso de recibir algún producto dañado 
                                                                            o golpeado, debe reportarlo inmediatamente 
                                                                            al proveedor a soporte@Reconocelo.com.mx, en un plazo 
                                                                            límite de 24 horas posteriores a la recepción de este. 
                                                                            El proveedor hará el reclamo con la mensajería y enviará 
                                                                            un nuevo artículo. Después del 
                                                                            plazo de 24 horas, el proveedor no podrá ofrecer la 
                                                                            sustitución del artículo.
                                                                        </p>
                                                                        <br/>
                                                                        <p>
                                                                            <strong>Artículos Defectuosos:</strong> En caso de recibir un producto 
                                                                            en mal estado, el proveedor podrá realizar el reemplazo 
                                                                            correspondiente; siempre que sea 
                                                                            notificado dentro de los primeros 7 días posteriores a 
                                                                            la recepción a soporte@Reconocelo.com.mx. Después 
                                                                            del plazo de 7 días, tendrá que aplicar 
                                                                            la garantía directamente con el fabricante o importador.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
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
            /* Fin de la Estructura del correo de reconocelo */
                       
            //Inicializa
            $this->email->initialize($config);
            //Envío de alerta de canje.
            $this->email->from('no_reply@reconocelo.com.mx', 'reconocelo.com.mx');
            $this->email->to('operaciones@opisa.com');//operaciones@opisa.com
            $this->email->cc($this->session->userdata('email'));

            $this->email->subject('Canje');
            $this->email->message($message);

            $this->email->send();
        }

        /* Fin Funcion Canjes Reconocelo */

        /* Funcion Ayuda Reconocelo */

        public function ayuda()
    	{
                  
            $preguntas = $this->reconocelo_model->tipos_preguntas();
            $ordenes= $this->reconocelo_model->misPreCanjes();
            $ordenesFolio = $this->reconocelo_model->misOrdenesFolio();
           
           if ($ordenesFolio){
                $data["ordenesFolio"] = $ordenesFolio;
            }else{
                $data["ordenesFolio"] = false;
            }
           
            if ($ordenes){
                $data["ordenes"] = $ordenes;
            }else{
                $data["ordenes"] = false;
            }
            
            if ($preguntas){
                $data["preguntas"] = $preguntas;
            }else{
                $data["preguntas"] = false;
            }
            
    		$this->load->view('ayuda_View',$data);
        }

        public function crearTicketReconocelo(){
         
            $data = array("idcanje"=>$_POST['idcanje'],
                "nombre"=>$_POST['nombre'],
                "mensaje"=>$_POST['mensaje'],
                "tipo"=>$_POST['tipo']
             );

            $duda = $this->reconocelo_model->addDudaTicket($data);
            if ($duda){
                $ticketAtencion = $this->reconocelo_model->AtencionTicket();
                $this->sendEmailTicket($data);
                if ($ticketAtencion){
                    $dudaDetalle = $this->reconocelo_model->detalleTicket($duda,$data);
                    if ($dudaDetalle){
                        $this->output->set_output(json_encode($dudaDetalle));
                    }else{
                        $this->output->set_output(json_encode($ticketAtencion));
                    }
                }else{
                    $this->output->set_output(json_encode('no hizo bien el select'));
                } 
            }else{
                $this->output->set_output(json_encode(false));
            }
        
        }

        function sendEmailTicket($data){
            //Configuracion de SMTP
            $config['smtp_host'] = 'm176.neubox.net';
            $config['smtp_user'] = 'envios@opisa.com';//envios@opisa.com
            $config['smtp_pass'] = '3hf89w';//3hf89w
            $config['smtp_port'] = 465;
            $config['mailtype'] = 'html';
            
            $message = "<h1>PROGRAMA DE INCENTIVOS RECONÓCELO</h1>
                        <h2>SE HA GENERADO UN NUEVO TICKET DE ATENCIÓN CANJE : ".$data['idcanje']."</h2>
                        <table>
                            <tr><td>ID PARTICIPANTE: </td><td style='font-weight'>".$this->session->userdata('idPart')."</td></tr>
                            <tr><td>NOMBRE: </td><td style='font-weight'>".$this->session->userdata('nombre')."</td></tr>
                            <tr><td>COD. PARTICIPANTE: </td><td style='font-weight'>".$this->session->userdata('participante')."</td></tr>
                            <tr><td>COD. EMPRESA: </td><td style='font-weight'>".$this->session->userdata('empresa')."</td></tr>
                        </table>
                        <h3>Descripción del Ticket </h3>
                        <table>";
            $tipoMessage='';
            if($data['tipo']=='1'){
                $tipoMessage='Sobre el articulo - '.$data['nombre'].' <br/>Numero de orden : '.$data['idcanje']; 
            }
            if($data['tipo']=='2'){
                $tipoMessage ='Sobre la orden : '.$data['idcanje'];               
            }
            if($data['tipo']=='3'){
                $tipoMessage ='Sobre un tema nuevo ';
            }
            $message.="</table><br />
                <p><b>Clasificación :</b><br />".$tipoMessage."</p>
                <p><b>Mensaje: </b><br/>".$data['mensaje']."</p>
                </tr>
            ";
                       
            //Inicializa
            $this->email->initialize($config);
            //Envío de alerta de canje.
            $this->email->from('no_reply@reconocelo.com.mx', 'reconocelo.com.mx');
            $this->email->to('operaciones@opisa.com');
            $this->email->cc($this->session->userdata('email'));
            $this->email->subject('Nuevo Ticket Generado Reconócelo');
            $this->email->message($message);
            $this->email->send();
        }
        
        /* Fin Funcion Ayuda Reconocelo */

        /* Funcion Ticket Reconocelo */

        public function ticket(){
            $ticketHistory = $this->reconocelo_model->Get_TicketsReconocelo();
            
            if ($ticketHistory){
                $data["ticketHistory"] = $ticketHistory;
            }else{
                $data["ticketHistory"] = false;
            }
            $this->load->view('ticket_view',$data);
        }

        public function historiaTicket(){
            
            $ticketData = array("idTicket"=>$_POST['idTicket']);
            $ticketStatus = array("status"=>$_POST['status']);

            $ticketHistory = $this->reconocelo_model->Get_TicketsHistory($ticketData);

            if ($ticketHistory){
                $data['ticketHistory'] = $ticketHistory;
                $data['status'] = $ticketStatus;
            }else{
                $data['ticketHistory'] = false;
                $data['status'] = false;
            }

            $this->load->view('modalTickect_view',$data);

        }

        public function historiaTicketAnswer(){

            $ticketHistoria = array("idTicketHistory"=>$_POST['idTicketHistory']);
            $this->load->view('modalTicketAns_view',$ticketHistoria);

        }


        public function closeTicket(){
            $ticketDataClose = array("ticketId"=>$_POST['ticketId']);
            $ticketCloseData = $this->reconocelo_model->closeTicket($ticketDataClose);

            if ($ticketCloseData){
                $this->output->set_output(json_encode('ok'));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function sendTicketAnswer(){
            $ticketAnswer = array(
                "ticketId"=>$_POST['ticketId'],
                "respuestaTicket"=>$_POST['respuestaTicket']
            );
            $ticketHistoryData = $this->reconocelo_model->sendAnswerTicketAdmin($ticketAnswer);

            if ($ticketHistoryData){
                $this->output->set_output(json_encode('ok'));
            }else{
                $this->output->set_output(json_encode(false));
            }
        }

        public function closeConfirmTicket(){
            $ticketClose = array("idTicket"=>$_POST['idTicket']);
            $this->load->view('modalTicketClose_view',$ticketClose);
        }

        /* Fin Funcion ticket Reconocelo */

        /* Funcion Configuracion personal */

        public function info() {
            $this->load->view('confInfo_View');
        }

        public function updatePasswordReconocelo(){
            $updatePasswordReconoceloData = array(
                "passwordOld"=>$_POST['passwordOld'],
                "passwordNew"=>$_POST['passwordNew']
            );
            $checkPasswordReconocelo = $this->reconocelo_model->checkPasswordReconocelo($updatePasswordReconoceloData);
            if($checkPasswordReconocelo){
                $updatePasswordReconocelo = $this->reconocelo_model->updatePasswordReconocelo($updatePasswordReconoceloData);
                if($updatePasswordReconocelo){
                    $this->output->set_output(json_encode($updatePasswordReconocelo));
                }else{
                    $this->output->set_output(json_encode(0));
                }
            }else{
                $this->output->set_output(json_encode(0));
            }
        }

        /* Fin funcion configuracion personal */

        /* Funcion salir Reconocelo */
        public function salirReconocelo(){
            $array_items = array('nombre' => '', 'programa' => '', 'participante' => '', 'empresa' => '', 'status' => '', 'puntos' => '', 'idPart' => '','logged_in' => '');
            $this->session->unset_userdata($array_items);
            //Manda al inicio de la página, si no hay session se va al login.
            header( 'Location: '.base_url());
         }
        /* Fin funcion Reconocelo*/
    }
?>