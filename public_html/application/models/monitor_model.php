<?php
    class Login_monitor_model  extends CI_Model{
   
        public function loadData($datos){
            $usuario =$datos['usuario'];
            $password = $datos['password'];
            $query = $this->db->query("          
                SELECT adm.CodEmpresa,adm.CodPrograma,adm.Usuario,adm.email,emp.NombreOficial as empresa
                FROM opisa_opisa.administrador as adm inner join opisa_opisa.Programa as
                pr on adm.CodPrograma = pr.codPrograma
                inner join opisa_opisa.Empresa as emp on emp.codEmpresa = adm.CodEmpresa 
                and adm.Usuario = '".$usuario."' and adm.Pwd = '".$password."'                                     
            ;");
        
            if ($query) {
                return $query->result_array() ;
            }else{
                $query=array();
                return $query;
            }
        }
    }
?>
