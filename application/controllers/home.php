<?php 

class home extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('mudamudi_model');
        $this->load->model('combobox');
        $this->load->model('global_query');
	}

    public function index()
    {
        $dt["cbDapukan"] = $this->combobox->getDapukan();
        $dt["cbDesa"] = $this->combobox->getDesa();
        $dt["cbKelompok"] = $this->combobox->getKelompok();
		$this->load->view('home',$dt);
	}

	
	

}


 ?>