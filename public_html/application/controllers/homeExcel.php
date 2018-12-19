<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('mysql_to_excel_helper');
    }
 
    public function index()
    {
        $this->load->model("participante_monitor_model");
        to_excel($this->usuarios->get(), "archivoexcel");
    }
 
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */