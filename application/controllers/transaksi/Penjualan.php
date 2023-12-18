<?php 
class Penjualan extends CI_Controller{


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
    public function index(){
        $data['title'] = 'Penjualan Bahan Baku';
        $data['stoksupp']= $this->pondokModel->get_data('bahan_keluar')->result();
        $data['liat']= $this->db->query('select bahan_keluar.*,bahan.nama_bahan from bahan_keluar left join bahan on bahan.id_bahan = bahan_keluar.id_bahan;')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/penjualan',$data);
        $this->load->view('template/footer');
    }
    public function tambahData(){
        $data['title'] = 'Permintaan Stok Bahan';
        $kodesupplier = $this->db->query('SELECT max(kode_transaksi) as kodeTerbesar From stok')->row();
        $hasil = $kodesupplier->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "TRK";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $data['bahan']= $this->pondokModel->get_data('bahan')->result();
        $data['supplier']= $this->pondokModel->get_data('supplier')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/tambahData',$data);
        $this->load->view('template/footer');
    }

    public function kirimwa($telp, $request) {
        $telp = 'telp';
        $kode = 'kode_transaksi';
        $pesanan = 'nama_bahan';
        $permintaan = 'permintaan';
        $wa     = new \ay4t\WhatsAppHelper\WhatsAppSG();
        $wa->setPort('6789')
    ->setSenderPhone('0895705038835')
    ->setRecepient($telp)
    ->setMessage("Kode Transaksi = ".$kode.",Nama Bahan Pesanan = ".$pesanan."Jumlah Permintaan = ".$permintaan."");
    $this->session->flashdata('message','Sukses kirim');
	redirect('transaksi/Stoksupplier');
    }

    public function tambahDataAksi(){
        
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $kode_transaksi = $this->input->post('kode_transaksi');
            $id_bahan = $this->input->post('id_bahan');
            $nama_bahan = $this->input->post('bahan');
            $permintaan = $this->input->post('permintaan');
            $id_supplier = $this->input->post('id_supplier');
            $telp = $this->input->post('telp');
            $data = array(
                'kode_transaksi' => $kode_transaksi,
                'id_bahan' => $id_bahan,
                'permintaan'        => $permintaan,
                'id_supplier'          => $id_supplier,
            );
            $this->pondokModel->insert_data($data,'stok');
            $wa     = new \ay4t\WhatsAppHelper\WhatsAppSG();
            $wa->setPort('6789')
            ->setSenderPhone('0895705038835')
            ->setRecepient($telp)
            ->setMessage("Kode Transaksi : ".$kode_transaksi."\nNama Bahan : ".$nama_bahan."\nJumlah Permintaan : ".$permintaan."");
            $wa->sendText();
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/Stoksupplier');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('kode_transaksi','Kode Supplier','required');
        $this->form_validation->set_rules('id_bahan','Nama Bahan','required');
        $this->form_validation->set_rules('permintaan','Alamat','required');
        $this->form_validation->set_rules('id_supplier','Nama Supplier','required');
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

            $data = array(
                'kode_supplier' => $kode_supplier,
                'nama_supplier' => $nama_supplier,
                'alamat'        => $alamat,
                'telp'          => $telp,
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
        $where = array('id' => $id);
        $this->pondokModel->delete_data($where, 'bahan_keluar');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/Penjualan');
    }

  
}

?>
