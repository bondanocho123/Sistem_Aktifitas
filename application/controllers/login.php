<?php 

class login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		if ($this->session->cekss == "") {
			// redirect(base_url('Main'));
		}
	}

	public function index(){
		$this->load->view('login');
	}

	public function plogin(){
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

		if ($this->form_validation->run()==false) {
			$dt['pesan']=validation_errors();
			$this->load->view('login',$dt);
		}
		else{
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$paramCriteria = array('username' => $username, 'password' => md5($password));
			$getFieldValue = $this->global_query->getWhere('user_system', $paramCriteria);
			$bValid = $getFieldValue->num_rows();
			if ($bValid==1 && $getFieldValue->id_akses=='55') {
				// $sesion1=array('userid'=>$id);
				$uname = $cek->row()->nama;
				$this->session->set_userdata('cekss',$uname);
				redirect(base_url().'Penjualan');
			}
			else if ($cek2==1 && $cek->row()->id_akses=='99'){
				$uname = $cek->row()->nama;
				$this->session->set_userdata('cekss',$uname);
				redirect(base_url().'Admin');
			}
			else{
				$dt['pesan']="Username atau Password Salah";
			 	$this->load->view('penjualan/login',$dt);
			}
		}
	}
	

}


 ?>