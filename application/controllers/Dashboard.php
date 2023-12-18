<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('hak_akses')=='1'){
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
        $supplier = $this->db->query("SELECT * from supplier");
        $data['supplier']= $supplier->num_rows();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('template/footer');
       
    }

    public function outlet(){
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('template/footer');
    }
}

?>
