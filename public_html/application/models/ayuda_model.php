<?php

    class Ayuda_model extends CI_Model {

        public function __construct() {}

        /*public function tipos_preguntas() {
            $query = $this->db->query("
                SELECT TipoPregunta FROM Preguntas "
            );
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }*/

        public function addDuda($data){
    	    $query = $this->db->query("                            
                INSERT INTO `opisa_opisa`.`Atencion` (`idCanje`, `idPregunta`, `idParticipante`, `mensaje`,
                `FechaCreacion`) VALUES ('".$data['idcanje']."', '".$data['tipo']."',  
                '".$this->session->userdata('idPart')."', '".$data['nombre'].' -'.$data['mensaje']."',NOW());
            ");
    	    if ($query)
    	    {
                return $this->db->insert_id();
    	    }else{
                return false;
    	    }  
        }

        /* Funcion addDudaTicket */
        public function addDudaTicket($data){

    	    $query = $this->db->query("
                INSERT INTO `opisa_opisa`.`AtencionTicket`(`idCanje`, `idParticipante`, `status`, `FechaCreacion`,
                `Subject`) VALUES (".$data['idcanje'].",".$this->session->userdata('idPart').",
                1,NOW(),'".$data['nombre']."');
            ");
    	    if ($query){
                return $this->db->insert_id();
    	    }else{
                return false;
            }
        }

        public function AtencionTicket(){
            $query = $this->db->query("
                SELECT IdTicket
                FROM AtencionTicket
                ORDER BY IdTicket DESC 
                LIMIT 1
            ");
            if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function detalleTicket($duda,$data){

    	    $query = $this->db->query("                           
                INSERT INTO `opisa_opisa`.`AtencionTicketDetalle`(`IdTicket`, `mensaje`, `fecha`, `loginWeb`) 
                VALUES (".$duda.",'".$data['mensaje']."',now(),".$this->session->userdata('idPart').");
            ");
    	    if ($query)
    	    {
                return $this->db->insert_id();
    	    }else{
                return false;
            }
        }
        /* Fin funcion addDuda prueba */
    }
?>