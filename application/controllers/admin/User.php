<?php

class User extends CI_Controller {

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
    public function index() {
        $data['title'] = 'Data Pengguna';
        $data['user'] = $this->pondokModel->get_data('user')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/user',$data);
        $this->load->view('template/footer');
    }

    public function tambahData(){
        $data['title'] = 'Tambah Data Pengguna';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/tambahData',$data);
        $this->load->view('template/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hak_akses = $this->input->post('hak_akses');
            $data = array(
                'username' => $username,
                'password' => $password,
                'hak_akses'        => $hak_akses,
            );
            $cek = $this->db->query("SELECT * FROM user where username='$username';");
            if($cek->num_rows() > 0){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username ini telah digunakan!!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>');
            redirect('admin/user/tambahData');
            }else {
                $this->pondokModel->insert_data($data,'user');
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('admin/user');
            }
            
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('hak_akses','Hak Akses','required');
    }

    public function updateData($id){
        $where = array('id_admin' => $id);
        $data['admin'] = $this->db->query("SELECT * FROM user where id = '$id'")->result();
        $data['title'] = 'Update Data admin';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('admin/updateData',$data);
        $this->load->view('template/footer');
    }
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id             = $this->input->post('id_admin');
            $kode_admin = $this->input->post('kode_admin');
            $nama_admin = $this->input->post('nama_admin');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $tgl = $this->input->post('tgl');           
            $data = array(
                'kode_admin' => $kode_admin,
                'nama_admin' => $nama_admin,
                'alamat'        => $alamat,
                'telp'          => $telp,
                'tgl_bergabung'          => $tgl,
            );

            $where = array(
                'id_admin' => $id
            );
            $this->pondokModel->update_data('admin',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('admin/admin');
        }
    }

    public function deleteData($id) {
        $where = array('id' => $id);
        $where1 = array('username' => $id);
        $this->pondokModel->delete_data($where, 'user');
        $this->pondokModel->delete_data($where1, 'user');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('admin/User');
    }
}