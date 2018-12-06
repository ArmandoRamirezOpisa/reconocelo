<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ayuda_Controller extends CI_Controller {
    
    	public function index()
    	{
            $this->load->model("Ayuda_model");
                  $this->load->model("canje_model");
                  
                  
            $preguntas = $this->Ayuda_model->tipos_preguntas();
            $ordenes= $this->canje_model->misPreCanjes();
           $ordenesFolio = $this->canje_model->misOrdenesFolio();
           
           if ($ordenesFolio)
            {
                $data["ordenesFolio"] = $ordenesFolio;
            }else{
                $data["ordenesFolio"] = false;
            }
           
            if ($ordenes)
            {
                $data["ordenes"] = $ordenes;
            }else{
                $data["ordenes"] = false;
            }
            
            if ($preguntas)
            {
                $data["preguntas"] = $preguntas;
            }else{
                $data["preguntas"] = false;
            }
            
            
    		$this->load->view('ayuda_View',$data);
    	}
        
        public function crearComentario(){

            $this->load->model("Ayuda_model");
            $this->load->library('email');
         
            $data = array("idcanje"=>$_POST['idcanje'],
                        "nombre"=>$_POST['nombre'],
                        "mensaje"=>$_POST['mensaje'],
                        "tipo"=>$_POST['tipo']
             );

            $duda = $this->Ayuda_model-> addDuda($data);
            if ($duda) {
            
                $this->sendEmailTicket($data);
                $this->output->set_output(json_encode('ok')); 
            }else{
                $this->output->set_output(json_encode(false));
            }
        
        }
        
        /* Funcion crearComentario prueba */
        public function crearComentarioPrueba(){
            
            $this->load->model("Ayuda_model");
            $this->load->library('email');
         
            $data = array("idcanje"=>$_POST['idcanje'],
                        "nombre"=>$_POST['nombre'],
                        "mensaje"=>$_POST['mensaje'],
                        "tipo"=>$_POST['tipo']
             );

             $duda = $this->Ayuda_model->addDudaPrueba($data);
            if ($duda) {
                //$this->sendEmailTicket($data);
                $AtencionTicket = $this->Ayuda_model->AtencionTicket();
                if ($AtencionTicket){

                    $dudaDetalle = $this->Ayuda_model->detalleTicket($AtencionTicket,$data);
                    if ($dudaDetalle){
                        $this->output->set_output(json_encode($dudaDetalle));
                    }else{
                        $this->output->set_output(json_encode('no hizo bien la insercion'));
                    }
                }else{
                    $this->output->set_output(json_encode('no hizo bien el select'));
                } 
            }else{
                $this->output->set_output(json_encode(false));
            }
        
        }
        /* Fin funcion crearComentario prueba */

        function sendEmailTicket($data)
        {
            //Configuracion de SMTP
            $config['smtp_host'] = 'm176.neubox.net';
            $config['smtp_user'] = 'envios@opisa.com';
            $config['smtp_pass'] = '3hf89w';
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
                           }if($data['tipo']=='2'){
                               $tipoMessage ='Sobre la orden : '.$data['idcanje'];
                               
                           }if($data['tipo']=='3'){
                              $tipoMessage ='Sobre un tema nuevo ';
              
                           }
                                $message.="</table><br />
            
                                            <p><b>Clasificación :</b><br />".$tipoMessage."</p>
                                            <p><b>Mensaje: </b><br/>".$data['mensaje']."</p>
                                           </tr>
                                          ";
                            
           // $message .= "</table>";
                       
            //Inicializa
            $this->email->initialize($config);
            //Envío de alerta de canje.
            $this->email->from('no_reply@reconocelo.com.mx', 'reconocelo.com.mx');
            $this->email->to('operaciones@opisa.com');
           $this->email->cc($this->session->userdata('email'));
             // $this->email->cc('mauro.morales.limon1@gmail.com');
            $this->email->subject('Nuevo Ticket Generado Reconócelo');
            $this->email->message($message);

            $this->email->send();
        }
        
        
    }

?>