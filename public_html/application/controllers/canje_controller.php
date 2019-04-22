<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Canje_controller extends CI_Controller {
    	   
        public function __construct()
        {
                parent::__construct();
                $this->load->library('email');
                $this->load->model("canje_model");
        }
        
        function addCanje()
        {
            $data = json_decode(stripslashes($_POST['data']));//Decodifica JSON
            
            $saldoACtualParticipante = $this->canje_model->saldoActualParticipante();

            if($saldoACtualParticipante >= $this->session->userdata('puntos')){
                $idCanjeExits = $this->canje_model->checkAddCanje();
                if($idCanjeExits){
                    $this->output->set_output(json_encode(false));
                }else{
                    $idCanje = $this->canje_model->addCanje();
            
                if ($idCanje){
                    $detCanje = $this->canje_model->addDetCanje($data,$idCanje);
                    $updateSaldo = $this->canje_model->updSaldo($_POST["ptsCanje"]);
                
                    if ($updateSaldo){
                        $sdoAct = $this->session->userdata('puntos') - $_POST["ptsCanje"];
                        $this->session->set_userdata('puntos', $sdoAct);
                    }
                
                    if ($detCanje){
                        //Envía mail de confirmación de canje
                        $this->sendCanjeMail($idCanje,$data);
                        $this->output->set_output(json_encode($idCanje));    
                    }
                }else{
                    $this->output->set_output(json_encode(false));
                }
                }
            }else{
                $this->output->set_output(json_encode(false));
            }

        }
        
        /*function getCanjes()
        {
            $misPreCanjes = $this->canje_model->misPreCanjes();

            if ($misPreCanjes)
            {
                $data["precanjes"] = $misPreCanjes;
            }else{
                $data["precanjes"] = false;
            }

            $this->load->view('canjes_view',$data);
        }*/

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
    }
?>