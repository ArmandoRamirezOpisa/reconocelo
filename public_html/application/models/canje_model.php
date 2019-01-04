<?php
        class Canje_model extends CI_Model {
                
    	        public function __construct(){}
        
                public function addCanje(){
                        $address = $this->input->post("address");
    		        $query = $this->db->query("
                                INSERT INTO PreCanje (codPrograma,idParticipante,noTipoEntrega,CalleNumero,Colonia,
                                CP,Ciudad,Estado,Telefono,referencias)
                                VALUES (".$this->session->userdata('programa').",
                                ".$this->session->userdata('idPart').",1,'".$_POST["address"][3]["value"]."',
                                '".$_POST["address"][2]["value"]."','".$_POST["address"][4]["value"]."'
                                ,'".$_POST["address"][1]["value"]."','".$_POST["address"][0]["value"]."'
                                ,'".$_POST["address"][5]["value"]."','".$_POST["address"][6]["value"]."')   
                        ");
    		        if ($query)
    		        {
                                return $this->db->insert_id();
    		        }else{
                                return false;
    		        }  
                }
        
                public function addDetCanje($datos,$noFolio){
                        $err = 0;
                        $nItem = 1;
		        foreach($datos as $d){
	    	                $query = $this->db->query("
                                        INSERT INTO PreCanjeDet (idParticipante,noFolio,idPreCanjeDet,CodPremio,
                                        cantidad,PuntosXUnidad)
                                            VALUES (".$this->session->userdata('idPart').",".$noFolio.",".$nItem.",
                                            ".$d->id.",".$d->cantidad.",".$d->puntos.")
	                        ");
			        if (!$query)
			        {
			                $err ++;
			        }else{
				        $nItem++;
			        }
		        }
			
		        if ($err > 0){
			        return false;
		        }
		        return true;
                }
        
                public function updSaldo($ptsCanje){
        
    		        $query = $this->db->query("
                                UPDATE Participante 
                                SET SaldoActual = SaldoActual - ".$ptsCanje."
                                WHERE idParticipante = ".$this->session->userdata('idPart')
                        );
			if ($query){
			        return true;
			}else{
				return false;
			}
                }

                public function misPreCanjes(){
                        $query=$this->db->query("
                                SELECT p.idCanje,p.feSolicitud,d.Cantidad,pr.Nombre_Esp,d.Status,d.Mensajeria,
                                d.NumeroGuia,d.Cantidad*d.PuntosXUnidad *-1 as puntos
                                FROM PreCanje p
                                INNER JOIN PreCanjeDet d on d.noFolio = p.idCanje
                                INNER join Premio pr ON pr.codPremio = d.CodPremio 
                                WHERE  
                                p.codPrograma = ".$this->session->userdata('programa')."
                                AND p.idParticipante = ".$this->session->userdata('idPart')."
                                UNION ALL SELECT p.NoFolio as idCanje, p.feMov as feSolicitud,null as Cantidad, 
                                dsMov as Nombre_Esp, '-' as Status,'-' as Mensajeria,'-' as NumeroGuia,
                                noPuntos as puntos 
                                from PartMovsRealizados p  
                                where p.idParticipante = ".$this->session->userdata('idPart')."
                        ");
                        if ($query->num_rows() > 0){
                                return $query->result_array(); 
                        }else{
                                return false;
                        }
                }
      
                public function misOrdenesFolio(){
                        $query=$this->db->query("
                                SELECT idCanje 
                                FROM PreCanje 
                                where idParticipante =  " .$this->session->userdata('idPart')." 
                                and codPrograma = ".$this->session->userdata('programa')."                                          
                        ");
                        if ($query->num_rows() > 0){
                                return $query->result_array(); 
                        }else{
                                return false;
                        }
                }
        }
?>