<?php 

class Supplier extends CI_Controller {
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
        $data['title'] = 'Data Supplier';
        $data['supplier']= $this->pondokModel->get_data('supplier')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('supplier/Supplier',$data);
        $this->load->view('template/footer');
    }

    public function tambahData(){
        $data['title'] = 'Tambah Data Supplier';
        $kodesupplier = $this->db->query('SELECT max(kode_supplier) as kodeTerbesar From supplier')->row();
        $hasil = $kodesupplier->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "SUP";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('supplier/tambahData',$data);
        $this->load->view('template/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $kode_supplier = $this->input->post('kode_supplier');
            $nama_supplier = $this->input->post('nama_supplier');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $tgl_kerjasama = $this->input->post('tgl_kerjasama');
            $data = array(
                'kode_supplier' => $kode_supplier,
                'nama_supplier' => $nama_supplier,
                'alamat'        => $alamat,
                'telp'          => $telp,
                'tgl_kerjasama'          => $tgl_kerjasama,
            );
            $this->pondokModel->insert_data($data,'supplier');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('supplier/Supplier');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('kode_supplier','Kode Supplier','required');
        $this->form_validation->set_rules('nama_supplier','Nama Supplier','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('telp','No Telepon','required');
        $this->form_validation->set_rules('tgl_kerjasama','Tanggal Kerjasama','required');
    }

    public function updateData($id){
        $where = array('id_supplier' => $id);
        $data['supplier'] = $this->db->query("SELECT * FROM supplier where id_supplier = '$id'")->result();
        $data['title'] = 'Update Data Supplier';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('supplier/updateData',$data);
        $this->load->view('template/footer');
    }
    
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id             = $this->input->post('id_supplier');
            $kode_supplier = $this->input->post('kode_supplier');
            $nama_supplier = $this->input->post('nama_supplier');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $tgl_kerjasama = $this->input->post('tgl_kerjasama');
            $data = array(
                'kode_supplier' => $kode_supplier,
                'nama_supplier' => $nama_supplier,
                'alamat'        => $alamat,
                'telp'          => $telp,
                'tgl_kerjasama'          => $tgl_kerjasama,
            );

            $where = array(
                'id_supplier' => $id
            );
            $this->pondokModel->update_data('supplier',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('supplier/Supplier');
        }
    }

    public function deleteData($id) {
        $where = array('id_supplier' => $id);
        $this->pondokModel->delete_data($where, 'supplier');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('supplier/Supplier');
    }
}

?>