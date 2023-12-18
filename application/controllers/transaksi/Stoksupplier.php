<?php 
class Stoksupplier extends CI_Controller{

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
        $data['title'] = 'Bahan Masuk';
        $data['stoksupp']= $this->pondokModel->get_data('bahan_masuk')->result();
        $data['liat']= $this->db->query('SELECT bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk left join bahan on bahan.id_bahan = bahan_masuk.id_bahan left join supplier on supplier.id_supplier = bahan_masuk.id_supplier;')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/stoksupplier',$data);
        $this->load->view('template/footer');
           
    }
    public function tambahData(){
        $data['title'] = 'Order Stok Bahan';
        $kodesupplier = $this->db->query('SELECT max(kode_transaksi) as kodeTerbesar From bahan_masuk')->row();
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
    $wa     = new \ay4t\WhatsAppHelper\WhatsAppSG();
    $wa->setPort('6789')
    ->setSenderPhone('0895705038835')
    ->setRecepient($telp)
    ->setMessage("Kode Transaksi : ".$kode_transaksi."\nNama Bahan : ".$nama_bahan."\nJumlah Permintaan : ".$permintaan."");
    $wa->sendText();
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
            $tgl = $this->input->post('tgl_transaksi');
            $data = array(
                'kode_transaksi' => $kode_transaksi,
                'id_bahan' => $id_bahan,
                'permintaan'        => $permintaan,
                'id_supplier'          => $id_supplier,
                'tgl_transaksi'        => $tgl,
            );
            $this->pondokModel->insert_data($data,'bahan_masuk');
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
        $data['bahan_masuk'] = $this->db->query("SELECT bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk left join bahan on bahan.id_bahan = bahan_masuk.id_bahan left join supplier on supplier.id_supplier = bahan_masuk.id_supplier where id_transaksi = '$id';")->result();
        $data['bahan'] = $this->pondokModel->get_data('bahan')->result();
        $data['supplier'] = $this->pondokModel->get_data('supplier')->result();
        $data['title'] = 'Update Data Bahan Masuk';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/updateMasuk',$data);
        $this->load->view('template/footer');
    }
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id = $this->input->post('id_transaksi');
            $kode_transaksi = $this->input->post('kode_transaksi');
            $id_bahan = $this->input->post('id_bahan');
            $permintaan = $this->input->post('permintaan');
            $id_supplier = $this->input->post('id_supplier');
            $tgl_transaksi = $this->input->post('tgl_transaksi');

            $data = array(
                'kode_transaksi' => $kode_transaksi,
                'id_bahan' => $id_bahan,
                'permintaan'        => $permintaan,
                'id_supplier'          => $id_supplier,
                'tgl_transaksi'          => $tgl_transaksi,
            );
            $where = array(
                'id_transaksi' => $id
            );
            $this->pondokModel->update_data('bahan_masuk',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/Stoksupplier');
        }
    }
    public function cetak()
    {
        $data['liat']= $this->db->query('select bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk left join bahan on bahan.id_bahan = bahan_masuk.id_bahan left join supplier on supplier.id_supplier = bahan_masuk.id_supplier;')->result();
        
        $this->load->view('transaksi/cetak_bahanmasuk', $data);
    }

    public function cetak2($id)
    {
        $x['data'] = $this->db->query("select * from absen_masuk,pegawai,jabatan where pegawai.id_pegawai=absen_masuk.id_pegawai
		AND jabatan.id_jabatan=pegawai.id_jabatan AND id_absen_masuk='$id'")->row_array();
        $this->load->view('transaksi/cetak_perabsen_masuk', $x);
    }

    public function deleteData($id) {
        $where = array('id_transaksi' => $id);
        $this->pondokModel->delete_data($where, 'bahan_masuk');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/stoksupplier');
    }

    public function cetakbahanmasuk(){
        
        $data['title'] = 'Bahan Masuk';
       
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/report_bahanmasuk',$data);
        $this->load->view('template/footer');
    }
    public function cetak_bahankeluar(){
        
        $data['title'] = 'Bahan Keluar';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        //$data['liat']= $this->db->query('SELECT bahan_keluar.*,bahan.nama_bahan,outlet.nama_outlet,bahan_keluar.total from bahan_keluar left join bahan on bahan.id_bahan = bahan_keluar.id_bahan left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet ;')->result();
        $data['liat']= $this->db->query("SELECT bahan_keluar.*,bahan.nama_bahan,outlet.nama_outlet,bahan_keluar.total from bahan_keluar,bahan,outlet where bahan.id_bahan = bahan_keluar.id_bahan and outlet.kode_outlet = bahan_keluar.kode_outlet and bahan_keluar.tgl_transaksi BETWEEN '$tgl1' AND '$tgl2';")->result();
        $this->load->view('template/header',$data);
        $this->load->view('transaksi/cetak_bahankeluar',$data);
    }

    public function cetakbahankeluar(){
        $data['title'] = 'Penjualan';
        $data['stoksupp']= $this->pondokModel->get_data('bahan_masuk')->result();
        $data['liat']= $this->db->query('SELECT bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk left join bahan on bahan.id_bahan = bahan_masuk.id_bahan left join supplier on supplier.id_supplier = bahan_masuk.id_supplier;')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/report_bahankeluar',$data);
        $this->load->view('template/footer');
    }

    public function cetak_bahanmasuk(){
        
        $data['title'] = 'Bahan Masuk';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        //$data['liat']= $this->db->query("SELECT bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk left join bahan on bahan.id_bahan = bahan_masuk.id_bahan left join supplier on supplier.id_supplier = bahan_masuk.id_supplier AND date(tgl_transaksi) BETWEEN '$tgl1' AND '$tgl2'")->result();
        $data['liat']= $this->db->query("SELECT bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk,bahan,supplier where bahan.id_bahan = bahan_masuk.id_bahan and supplier.id_supplier = bahan_masuk.id_supplier AND date(tgl_transaksi) BETWEEN '$tgl1' AND '$tgl2'")->result();
        $this->load->view('template/header',$data);
        $this->load->view('transaksi/cetak_bahanmasuk',$data);
    }
    
    public function cetakmutasi(){
        $data['title'] = 'Mutasi Bahan';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/cetak_mutasi',$data);
        $this->load->view('template/footer');
    }
    public function report_mutasi(){
        $data['title'] = 'Mutasi Bahan';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        //$data['liat']= $this->db->query("SELECT bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk left join bahan on bahan.id_bahan = bahan_masuk.id_bahan left join supplier on supplier.id_supplier = bahan_masuk.id_supplier AND date(tgl_transaksi) BETWEEN '$tgl1' AND '$tgl2'")->result();
        $data['liat']= $this->db->query("SELECT * FROM (SELECT outlet.nama_outlet vendor,bahan_keluar.tgl_transaksi tanggal,bahan_keluar.nama_bahan,bahan_keluar.permintaan bahankeluar,'' bahanmasuk 
        FROM `bahan_keluar` LEFT JOIN outlet on outlet.kode_outlet=bahan_keluar.kode_outlet 
        UNION ALL 
        SELECT supplier.nama_supplier vendor,bahan_masuk.tgl_transaksi tanggal,bahan.nama_bahan,'' bahankeluar,bahan_masuk.permintaan bahanmasuk 
        FROM bahan_masuk LEFT JOIN bahan ON bahan_masuk.id_bahan = bahan.id_bahan LEFT JOIN supplier on supplier.id_supplier = bahan_masuk.id_supplier WHERE bahan_masuk.tgl_transaksi BETWEEN '$tgl1' and '$tgl2')mutasi ORDER BY mutasi.tanggal;")->result();
        $this->load->view('template/header',$data);
        $this->load->view('transaksi/report_mutasi',$data);
    }
}

?>
