<?php 

class Retur extends CI_Controller {
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
        $data['title'] = 'Data Retur Baku';
        $data['retur']= $this->pondokModel->get_data('retur')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('retur/retur',$data);
        $this->load->view('template/footer');
    }

    public function tambahData(){
        $data['title'] = 'Tambah Data Retur';
        $koderetur = $this->db->query('SELECT max(kode_retur) as kodeTerbesar From retur')->row();
        $hasil = $koderetur->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "BRG";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('retur/tambahData',$data);
        $this->load->view('template/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $kode_retur = $this->input->post('kode_retur');
            $nama_retur = $this->input->post('nama_retur');
            $satuan = $this->input->post('satuan');
            $harga = $this->input->post('harga');
            $harga_jual = $this->input->post('harga_jual');
            $data = array(
                'kode_retur' => $kode_retur,
                'nama_retur' => $nama_retur,
                'satuan'    => $satuan,
                'harga' => $harga,
                'harga_jual' => $harga_jual,
            );
            $this->pondokModel->insert_data($data,'retur');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('retur/retur');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('kode_retur','Kode retur','required');
        $this->form_validation->set_rules('nama_retur','Nama retur','required');
    }

    public function updateData($id){
        $where = array('id_retur' => $id);
        $data['retur'] = $this->db->query("SELECT * FROM retur where id_retur = '$id'")->result();
        $data['title'] = 'Update Data retur';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('retur/updateData',$data);
        $this->load->view('template/footer');
    }
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id             = $this->input->post('id_retur');
            $kode_retur = $this->input->post('kode_retur');
            $nama_retur = $this->input->post('nama_retur');
            $satuan = $this->input->post('satuan');
            $harga = $this->input->post('harga');
            $harga_jual = $this->input->post('harga_jual');
            $stok = $this->input->post('stok');
            $data = array(
                'kode_retur' => $kode_retur,
                'nama_retur' => $nama_retur,
                'satuan'        => $satuan,
                'harga'          => $harga,
                'harga_jual'          => $harga_jual,
                'stok'          => $stok,
            );

            $where = array(
                'id_retur' => $id
            );
            $this->pondokModel->update_data('retur',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('retur/retur');
        }
    }

    public function deleteData($id) {
        $where = array('id_retur' => $id);
        $this->pondokModel->delete_data($where, 'retur');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('retur/retur');
    }
}

?>