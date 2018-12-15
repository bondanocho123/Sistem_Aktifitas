<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
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

    }

    public function form_mudamudi()
    {
        $dt["cbDapukan"] = $this->combobox->getDapukan();
        $dt["cbDesa"] = $this->combobox->getDesa();
        $dt["cbKelompok"] = $this->combobox->getKelompok();
        $this->load->view('Anggota/frmAnggota',$dt);
    }

    public function get_mudamudi()
    {
        $data = array('data_mudamudi'=>$this->mudamudi_model->getMudamudiNotApproved());
        $this->load->view('anggota/listanggota',$data);
    }

    public function dataModalAnggota()
    {
        if (!empty($this->input->post('ids')))
        {
            $id = $this->input->post('ids');
            $data = $this->mudamudi_model->getDataModalMudamudi($id);

            $json['nama'] = $data->nama;
            $json['alamat'] = $data->alamat;
            if ($data->jenis_kelamin == "L")
            {
                $json['jenis_kelamin'] = "Laki-laki";
            }
            else
            {
                $json['jenis_kelamin'] = "Perempuan";
            }
            
            $json['no_telp'] = $data->no_telp;
            $json['email'] = $data->email;
            $json['dapukan'] = $data->dapukan;
            $json['desa'] = $data->desa;
            $json['kelompok'] = $data->kelompok;
            $json['usia'] = $data->usia;
            echo json_encode($json);
        }


    }

    public function insertAnggota()
    {
        $this->form_validation->set_rules('nama','Nama Anggota','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_telp','No. Telepon','required|numeric');
        $this->form_validation->set_rules('usia','Usia','required|numeric');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('dapukan','Dapukan', 'required');
        $this->form_validation->set_rules('desa','Desa', 'required');
        $this->form_validation->set_rules('kelompok','Kelompok','required');

        if($this->form_validation->run()==false)
        {
            $dt['msg'] = validation_errors();
            $dt["cbDapukan"] = $this->combobox->getDapukan();
            $dt["cbDesa"] = $this->combobox->getDesa();
            $dt["cbKelompok"] = $this->combobox->getKelompok();
            $this->load->view('Anggota/frmAnggota',$dt);
        }
        else
        {
            $nama = $this->input->post('nama');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $no_telp = $this->input->post('no_telp');
            $usia = $this->input->post('usia');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $dapukan = $this->input->post('dapukan');
            $desa = $this->input->post('desa');
            $kelompok = $this->input->post('kelompok');

            $paramInput = array('nama'=>$nama, 'alamat'=>$alamat, 'jenis_kelamin'=>$jenis_kelamin,
                                    'no_telp'=>$no_telp, 'email'=>$email, 'id_dapukan'=>$dapukan, 'id_desa'=>$desa, 'email'=>$email,
                                    'id_kelompok'=>$kelompok,'usia'=>$usia,"bit_approve"=>0);
            $this->mudamudi_model->saveMudamudi('mudamudi', $paramInput);
            $ret = base_url("Admin/get_mudamudi");
            redirect($ret); 
        }
    }

    public function edit_mudamudi($id)
    {
        $where = array("id"=>$id);
        $dt['dt_mudamudi']= $this->global_query->getwhere('mudamudi',$where);
        $dt["cbDapukan"] = $this->combobox->getDapukan();
        $dt["cbDesa"] = $this->combobox->getDesa();
        $dt["cbKelompok"] = $this->combobox->getKelompok();
        $this->load->view('Anggota/editanggota',$dt);


    }

    public function update_mudamudi($id)
    {
        $this->form_validation->set_rules('nama','Nama Anggota','required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_telp','No. Telepon','required|numeric');
        $this->form_validation->set_rules('usia','Usia','required|numeric');
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('dapukan','Dapukan', 'required');
        $this->form_validation->set_rules('desa','Desa', 'required');
        $this->form_validation->set_rules('kelompok','Kelompok','required');

        if($this->form_validation->run()==false)
        {
            $dt['msg'] = validation_errors();
            $dt["cbDapukan"] = $this->combobox->getDapukan();
            $dt["cbDesa"] = $this->combobox->getDesa();
            $dt["cbKelompok"] = $this->combobox->getKelompok();
            $this->load->view('Anggota/frmAnggota',$dt);
        }
        else
        {
            $where = array("id"=>$id);
            $nama = $this->input->post('nama');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $no_telp = $this->input->post('no_telp');
            $usia = $this->input->post('usia');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $dapukan = $this->input->post('dapukan');
            $desa = $this->input->post('desa');
            $kelompok = $this->input->post('kelompok');

            $paramInput = array('nama'=>$nama, 'alamat'=>$alamat, 'jenis_kelamin'=>$jenis_kelamin,
                                    'no_telp'=>$no_telp, 'email'=>$email, 'id_dapukan'=>$dapukan, 'id_desa'=>$desa, 'email'=>$email,
                                    'id_kelompok'=>$kelompok,'usia'=>$usia, 'bit_approve'=>0);
            $this->mudamudi_model->updateMudamudi('mudamudi', $paramInput,$where);
            $ret = base_url("Admin/get_mudamudi");
            redirect($ret); 
        }
    }

    public function delete_mudamudi($id)
    {
        $where = array('id'=>$id);
        $this->mudamudi_model->deleteMudamudi('mudamudi',$where);
        $ret = base_url("Admin/get_mudamudi");
        redirect($ret); 
    }

    public function get_mudamudi_notapprove()
    {
        $data = array('data_mudamudi'=>$this->mudamudi_model->getMudamudiNotApprove());
        $this->load->view('anggota/approveanggota',$data);
    }

    public function approve_mudamudi($id)
    {
        $where = array('id'=>$id);
        $paramInput = array('bit_approve'=>'1');
        $this->mudamudi_model->updateMudamudi('mudamudi',$paramInput, $where);
        $ret = base_url("Admin/get_mudamudi_notapprove");
        redirect($ret); 
    }

   

    public function get_kelompok_from_desa()
    {
        if (!empty($this->load->post('id_desa')))
        {
            $id_desa = $this->load->post('id_desa');
            $data = $this->combobox->getKelompokWhereDesa($id_desa);
            
        }
        
    }

    
}



?>