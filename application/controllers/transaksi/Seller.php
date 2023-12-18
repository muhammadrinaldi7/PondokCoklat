<?php 
class Seller extends CI_Controller{

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
        $data['title'] = 'Rekap Penjualan Hari Ini';
        $data['penjualan']= $this->pondokModel->get_data('penjualan')->result();
        $kde = $this->session->userdata('username');
        $data['liat']= $this->db->query("SELECT * from penjualan LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan WHERE kode_outlet = '$kde';")->result();
        $data['oliat']= $this->db->query("SELECT penjualan.*,outlet.nama_outlet,outlet.telp,outlet.alamat from penjualan left join outlet on outlet.kode_outlet = penjualan.kode_outlet WHERE outlet.kode_outlet='$kde';")->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/Seller',$data);
        $this->load->view('template/footer');
    }
    public function tambahData(){
        $data['title'] = 'Tambah Data Penjualan Outlet';
        $data['kode'] = $this->session->userdata('username');
        $data['bahan']= $this->pondokModel->get_data('bahan')->result();
        $data['outlet']= $this->pondokModel->get_data('outlet')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/tambahSeller',$data);
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
	redirect('transaksi/ordersupplier');
    }

    public function tambahDataAksi(){  
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $kode_outlet = $this->input->post('kode_outlet');
            $kode_bahan = $this->input->post('kode_bahan');
            $qty = $this->input->post('qty');
            $total = $this->input->post('total');
            $tanggal = $this->input->post('tanggal');
            $data = array(
                'kode_outlet' => $kode_outlet,
                'kode_bahan' => $kode_bahan,
                'qty' => $qty,
                'total'        => $total,
                'tanggal'          => $tanggal,
            );
            $this->pondokModel->insert_data($data,'penjualan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/Seller');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('kode_outlet','Kode Outlet','required');
        $this->form_validation->set_rules('kode_bahan','Kode Bahan','required');
        $this->form_validation->set_rules('qty','Kuantitas','required');
        $this->form_validation->set_rules('total','Total Penjualan','required');
        $this->form_validation->set_rules('tanggal','Tanggal Input','required');
    }

    public function updateData($id){
        $where = array('id' => $id);
        $data['penjualan'] = $this->db->query("SELECT penjualan.*,bahan.nama_bahan FROM `penjualan` LEFT JOIN bahan on bahan.kode_bahan=penjualan.kode_bahan where id = '$id'")->result();
        $data['bahan']= $this->pondokModel->get_data('bahan')->result();
        $data['outlet']= $this->pondokModel->get_data('outlet')->result();        
        $data['title'] = 'Update Data Penjualan';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/updateSeller',$data);
        $this->load->view('template/footer');
    }

    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id = $this->input->post('id');
            $kode_outlet = $this->input->post('kode_outlet');
            $kode_bahan = $this->input->post('kode_bahan');
            $qty = $this->input->post('qty');
            $total = $this->input->post('total');
            $tanggal = $this->input->post('tanggal');
            $data = array(
                'kode_outlet'=> $kode_outlet,
                'kode_bahan' => $kode_bahan,
                'qty'        => $qty,
                'total'      => $total,
                'tanggal'    => $tanggal,
            );
            $where = array(
                'id' => $id
            );
            $this->pondokModel->update_data('penjualan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/seller');
        }
    }

    public function cetakseller(){
        $data['title'] = 'Data Penjualan Hari Ini';
        $data['stoksupp']= $this->pondokModel->get_data('bahan_masuk')->result();
        $data['liat']= $this->db->query('SELECT bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk left join bahan on bahan.id_bahan = bahan_masuk.id_bahan left join supplier on supplier.id_supplier = bahan_masuk.id_supplier;')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/cetak_seller',$data);
        $this->load->view('template/footer');
    }

    public function report_seller(){
        
        $data['title'] = 'Laporan Penjualan';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        //$data['liat']= $this->db->query('SELECT bahan_keluar.*,bahan.nama_bahan,outlet.nama_outlet,bahan_keluar.total from bahan_keluar left join bahan on bahan.id_bahan = bahan_keluar.id_bahan left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet ;')->result();
        $hak = $this->session->userdata('hak_akses');
        $outlet = $this->session->userdata('username');
        $data['tanggal'] = date("d-m-Y");
        if($hak == '2'){
        $data['liat']= $this->db->query("SELECT penjualan.tanggal,outlet.nama_outlet,bahan.nama_bahan,IFNULL(penjualan.qty,0)qty,IFNULL(penjualan.total,0)total,IFNULL(SUM(penjualan.qty)OVER(),0) jumlhqty, IFNULL(SUM(penjualan.total)OVER(),0) jumlhtotal FROM `penjualan` LEFT JOIN outlet on outlet.kode_outlet = penjualan.kode_outlet LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan WHERE penjualan.tanggal = CURDATE() and penjualan.kode_outlet = '$outlet';")->result();
        $data['lliat']= $this->db->query("SELECT penjualan.tanggal,outlet.nama_outlet,bahan.nama_bahan,IFNULL(penjualan.qty,0)qty,IFNULL(penjualan.total,0)total,IFNULL(SUM(penjualan.qty)OVER(),0) jumlhqty, IFNULL(SUM(penjualan.total)OVER(),0) jumlhtotal FROM `penjualan` LEFT JOIN outlet on outlet.kode_outlet = penjualan.kode_outlet LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan WHERE penjualan.tanggal = CURDATE() and penjualan.kode_outlet = '$outlet';")->result();
        }else{
        $data['liat']= $this->db->query("SELECT penjualan.tanggal,outlet.nama_outlet,bahan.nama_bahan,penjualan.qty,penjualan.total,SUM(penjualan.qty)OVER(PARTITION by penjualan.kode_outlet) jumlhqty, SUM(penjualan.total)OVER(PARTITION by penjualan.kode_outlet) jumlhtotal 
        FROM `penjualan` LEFT JOIN outlet on outlet.kode_outlet = penjualan.kode_outlet LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan 
        WHERE penjualan.tanggal = CURDATE();")->result();
        $data['liat1'] = $this->db->query("SELECT penjualan.tanggal,outlet.nama_outlet,bahan.nama_bahan,penjualan.qty,penjualan.total,SUM(penjualan.qty) jumlhqty, SUM(penjualan.total) jumlhtotal 
        FROM `penjualan` 
        LEFT JOIN outlet on outlet.kode_outlet = penjualan.kode_outlet 
        LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan 
        WHERE penjualan.tanggal = CURDATE() GROUP by penjualan.kode_outlet;")->result();
        }
        $this->load->view('template/header',$data);
        $this->load->view('transaksi/report_seller',$data);
    }
    public function report_sellerpertgl(){
        $data['title'] = 'Laporan Penjualan';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
        $hak = $this->input->post('hak');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        $data['hak'] = $this->input->post('hak');
        //$data['liat']= $this->db->query('SELECT bahan_keluar.*,bahan.nama_bahan,outlet.nama_outlet,bahan_keluar.total from bahan_keluar left join bahan on bahan.id_bahan = bahan_keluar.id_bahan left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet ;')->result();       
        $outlet = $this->session->userdata('username');
        $data['tanggal'] = date("d-m-Y");
        if($hak == 2){
        $data['liat']= $this->db->query("SELECT penjualan.tanggal,outlet.nama_outlet,bahan.nama_bahan,SUM(penjualan.qty) qty,penjualan.total,SUM(penjualan.qty)OVER(PARTITION BY penjualan.tanggal) jumlhqty, SUM(penjualan.total)OVER(PARTITION BY penjualan.tanggal) jumlhtotal 
        FROM `penjualan` LEFT JOIN outlet on outlet.kode_outlet = penjualan.kode_outlet LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan 
        WHERE penjualan.tanggal between '$tgl1' and '$tgl2' and penjualan.kode_outlet = '$outlet' GROUP by penjualan.kode_bahan,penjualan.tanggal;")->result();
         }else{
        $data['liat3']= $this->db->query("SELECT penjualan.tanggal,outlet.nama_outlet,bahan.nama_bahan,penjualan.qty,penjualan.total,SUM(penjualan.qty)OVER(PARTITION by penjualan.kode_outlet) jumlhqty, SUM(penjualan.total)OVER(PARTITION by penjualan.kode_outlet) jumlhtotal 
        FROM `penjualan` LEFT JOIN outlet on outlet.kode_outlet = penjualan.kode_outlet 
        LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan 
        WHERE penjualan.tanggal between '$tgl1' and '$tgl2'")->result();
        $data['liat1'] = $this->db->query("SELECT penjualan.tanggal,outlet.nama_outlet,bahan.nama_bahan,penjualan.qty,penjualan.total,SUM(penjualan.qty) jumlhqty, SUM(penjualan.total) jumlhtotal FROM `penjualan` LEFT JOIN outlet on outlet.kode_outlet = penjualan.kode_outlet LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan WHERE penjualan.tanggal between '$tgl1' and '$tgl2'  GROUP by penjualan.kode_outlet;")->result();
        $this->load->view('template/header',$data);        
        $this->load->view('transaksi/report_sellerpertgl',$data);
    }
       
    }

    public function deleteData($id) {
        $where = array('id' => $id);
        $this->pondokModel->delete_data($where, 'penjualan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/seller');
    }

  
}

?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
?>
