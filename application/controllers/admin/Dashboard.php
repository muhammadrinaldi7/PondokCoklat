<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
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
        $data['title'] = 'Dashboard';
        $supplier = $this->db->query('SELECT * From supplier');
        $data['supplier'] = $supplier->num_rows();
        $data['bahan_masuk'] = $this->pondokModel->get_data('bahan_masuk')->num_rows();
        $data['bahan_keluar'] = $this->pondokModel->get_data('bahan_keluar')->num_rows();
        $data['outlet'] = $this->pondokModel->get_data('outlet')->num_rows();
        $data['lokasi'] = $this->pondokModel->get_data('lokasi')->result();
        $ku = $this->session->userdata('username');
        $data['stok'] = $this->db->query("SELECT * FROM stok_outlet where status ='In' and kode_outlet = '$ku'")->result();
        
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('template/footer');
       
       
    }
    
}

?>
