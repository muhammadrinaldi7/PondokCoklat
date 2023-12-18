<?php

class Lokasi extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('pondokModel');
        if($this->session->userdata('hak_akses') != ('1'||'2')){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Lokasi';
        $data['lokasi']= $this->db->query("SELECT * FROM saran")->result();
        $data['saran']= $this->db->query("SELECT * FROM lokasi")->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('lokasi/lokasi',$data);
        $this->load->view('template/footer');
    }
    public function tambahData(){
        $data['title'] = 'Tambah Data Saran Lokasi';
        $data['saran'] = $this->db->query("SELECT * FROM saran")->result();
        $data['lokasi']= $this->db->query("SELECT * FROM saran")->result();
        $kodekemitraan = $this->db->query('SELECT max(kode_outlet) as kodeTerbesar From saran')->row();
        $hasil = $kodekemitraan->kodeTerbesar;
        $urutan =(int)substr($hasil,4,3);
        $urutan++;
        $huruf = "BDJ-";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('lokasi/tambahData',$data);
        $this->load->view('template/footer');
    }
    public function _rules(){
        $this->form_validation->set_rules('kode','Kode Outlet','required');
        $this->form_validation->set_rules('koordinat','Kode Bahan','required');
        $this->form_validation->set_rules('nama_lokasi','Kuantitas','required');
        $this->form_validation->set_rules('alamat','Total Penjualan','required');
        $this->form_validation->set_rules('keterangan','Tanggal Input','required');
    }
    public function tambahDataAksi(){
            $kode = $this->input->post('kode');
            $koordinat = $this->input->post('latlong');
            $nama_lokasi = $this->input->post('nama_lokasi');
            $alamat = $this->input->post('alamat');
            $keterangan = $this->input->post('keterangan');
            $data = array(
                'kode_outlet' => $kode,
                'koordinat' => $koordinat,
                'nama_lokasi'        => $nama_lokasi,
                'alamat'          => $alamat,
                'keterangan'          => $keterangan,
            );
            $this->pondokModel->insert_data($data,'saran');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('lokasi/lokasi');
    }
    public function updateData($id){
        $where = array('kode_outlet' => $id);
        $data['lokasi'] = $this->db->query("SELECT * FROM saran where kode_outlet = '$id'")->result();
        $data['title'] = 'Update Data lokasi';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('lokasi/updateData',$data);
        $this->load->view('template/footer');
    }
    public function updateDataAksi(){        
        $kode = $this->input->post('kode');
        $koordinat = $this->input->post('latlong');
        $nama_lokasi = $this->input->post('nama_lokasi');
        $alamat = $this->input->post('alamat');
        $keterangan = $this->input->post('keterangan');
        $data = array(
            'koordinat' => $koordinat,
            'nama_lokasi'        => $nama_lokasi,
            'alamat'          => $alamat,
            'keterangan'          => $keterangan,
        );
            $where = array(
                'kode_outlet' => $kode
            );
            $this->pondokModel->update_data('saran',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('lokasi/lokasi');        
    }

    public function deleteData($id) {
        $where = array('kode_outlet' => $id);
        $this->pondokModel->delete_data($where, 'saran');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('lokasi/lokasi');
    }
}
?>