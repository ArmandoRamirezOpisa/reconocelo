<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Noticias_controller extends CI_Controller {
    	   
        public function __construct()
        {
                parent::__construct();
                $this->load->library('email');
                $this->load->model("noticias_model");
        }
        
        public function getNoticias()
        {
            $data["news"]="";
            $this->load->view('noticias_view',$data);
        }
        
        public function getInfo()
        {
            $data["news_info"]="";
            $this->load->view('noticia_info_view',$data);
        }
    }
?>
        
