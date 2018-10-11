<?php

class Ayuda_model extends CI_Model {

    public function __construct() {//
    }

    public function tipos_preguntas() {
        $query = $this->db->query(
                "
                              
SELECT TipoPregunta FROM Preguntas "
        );
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
public function addDuda($data)
        {
            //&$_POST["address"][0]["name"]
               // $this->session->userdata('idPart') 
    		$query = $this->db->query("
                                    

INSERT INTO `opisa_opisa`.`Atencion` (`idCanje`, `idPregunta`, `idParticipante`, `mensaje`,`FechaCreacion`) 
VALUES ('".$data['idcanje']."', '".$data['tipo']."',  '".$this->session->userdata('idPart')."', '".$data['nombre'].' -'.$data['mensaje']."',NOW());

                                      ");
    		if ($query)
    		{
                return $this->db->insert_id();
    		}else{
                return false;
    		}  
        }
 

}

?>