<?php 

class Paket extends CI_Controller {
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
        $data['title'] = 'Data Paket Kemitraan';
        $data['paket']= $this->pondokModel->get_data('paket')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('paket/paket',$data);
        $this->load->view('template/footer');
    }

    public function tambahData(){
        $data['title'] = 'Tambah Data Paket';
        $kodepaket = $this->db->query('SELECT max(kode_paket) as kodeTerbesar From paket')->row();
        $hasil = $kodepaket->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "COK";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('paket/tambahData',$data);
        $this->load->view('template/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $kode_paket = $this->input->post('kode_paket');
            $nama_paket = $this->input->post('nama_paket');
            $deskripsi = $this->input->post('deskripsi');
            $harga = $this->input->post('harga');
            $data = array(
                'kode_paket' => $kode_paket,
                'nama_paket' => strtoupper($nama_paket),
                'deskripsi'    => $deskripsi,
                'harga' => $harga,
            );
            $this->pondokModel->insert_data($data,'paket');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('paket/paket');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('kode_paket','Kode paket','required');
        $this->form_validation->set_rules('nama_paket','Nama paket','required');
    }

    public function updateData($id){
        $where = array('id_paket' => $id);
        $data['paket'] = $this->db->query("SELECT * FROM paket where id_paket = '$id'")->result();
        $data['title'] = 'Update Data paket';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('paket/updateData',$data);
        $this->load->view('template/footer');
    }
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id             = $this->input->post('id_paket');
            $kode_paket = $this->input->post('kode_paket');
            $nama_paket = $this->input->post('nama_paket');
            $deskripsi = $this->input->post('deskripsi');
            $harga = $this->input->post('harga');
            $harga_jual = $this->input->post('harga_jual');
            $stok = $this->input->post('stok');
            $data = array(
                'kode_paket' => $kode_paket,
                'nama_paket' => $nama_paket,
                'deskripsi'        => $deskripsi,
                'harga'          => $harga,
                'harga_jual'          => $harga_jual,
                'stok'          => $stok,
            );

            $where = array(
                'id_paket' => $id
            );
            $this->pondokModel->update_data('paket',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('paket/paket');
        }
    }

    public function deleteData($id) {
        $where = array('id_paket' => $id);
        $this->pondokModel->delete_data($where, 'paket');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('paket/paket');
    }
}

?>