<?php 

class Bahan extends CI_Controller {
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
        $data['title'] = 'Data Bahan Baku';
        $data['bahan']= $this->pondokModel->get_data('bahan')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('bahan/bahan',$data);
        $this->load->view('template/footer');
    }

    public function tambahData(){
        $data['title'] = 'Tambah Data bahan';
        $kodebahan = $this->db->query('SELECT max(kode_bahan) as kodeTerbesar From bahan')->row();
        $hasil = $kodebahan->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "BRG";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('bahan/tambahData',$data);
        $this->load->view('template/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $kode_bahan = $this->input->post('kode_bahan');
            $nama_bahan = $this->input->post('nama_bahan');
            $satuan = $this->input->post('satuan');
            $harga = $this->input->post('harga');
            $harga_jual = $this->input->post('harga_jual');
            $data = array(
                'kode_bahan' => $kode_bahan,
                'nama_bahan' => $nama_bahan,
                'satuan'    => $satuan,
                'harga' => $harga,
                'harga_jual' => $harga_jual,
            );
            $this->pondokModel->insert_data($data,'bahan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('bahan/bahan');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('kode_bahan','Kode bahan','required');
        $this->form_validation->set_rules('nama_bahan','Nama bahan','required');
    }

    public function updateData($id){
        $where = array('id_bahan' => $id);
        $data['bahan'] = $this->db->query("SELECT * FROM bahan where id_bahan = '$id'")->result();
        $data['title'] = 'Update Data bahan';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('bahan/updateData',$data);
        $this->load->view('template/footer');
    }
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id             = $this->input->post('id_bahan');
            $kode_bahan = $this->input->post('kode_bahan');
            $nama_bahan = $this->input->post('nama_bahan');
            $satuan = $this->input->post('satuan');
            $harga = $this->input->post('harga');
            $harga_jual = $this->input->post('harga_jual');
            $stok = $this->input->post('stok');
            $data = array(
                'kode_bahan' => $kode_bahan,
                'nama_bahan' => $nama_bahan,
                'satuan'        => $satuan,
                'harga'          => $harga,
                'harga_jual'          => $harga_jual,
                'stok'          => $stok,
            );

            $where = array(
                'id_bahan' => $id
            );
            $this->pondokModel->update_data('bahan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('bahan/bahan');
        }
    }

    public function deleteData($id) {
        $where = array('id_bahan' => $id);
        $this->pondokModel->delete_data($where, 'bahan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('bahan/bahan');
    }
}

?>