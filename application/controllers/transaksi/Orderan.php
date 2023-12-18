<?php 
class Orderan extends CI_Controller{

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
        $data['title'] = 'Orderan Bahan Baku';
        $data['ordersupp']= $this->pondokModel->get_data('bahan_keluar')->result();
        $kde = $this->session->userdata('username');
        $data['liat']= $this->db->query("SELECT bahan_keluar.*,outlet.nama_outlet,outlet.telp,outlet.alamat from bahan_keluar left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet WHERE bahan_keluar.status != 'Dikirim';")->result();
        $data['liat1']= $this->db->query("SELECT bahan_keluar.*,outlet.nama_outlet,outlet.telp,outlet.alamat from bahan_keluar left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet WHERE bahan_keluar.status = 'Dikirim';")->result();
        $data['oliat']= $this->db->query("SELECT bahan_keluar.*,outlet.nama_outlet,outlet.telp,outlet.alamat from bahan_keluar left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet WHERE outlet.kode_outlet='$kde' and bahan_keluar.status != 'Dikirim';")->result();
        $data['oliat1']= $this->db->query("SELECT bahan_keluar.*,outlet.nama_outlet,outlet.telp,outlet.alamat from bahan_keluar left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet WHERE outlet.kode_outlet='$kde' and bahan_keluar.status = 'Dikirim';")->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/Orderan',$data);
        $this->load->view('template/footer');
    }
    public function tambahData(){
        $data['title'] = 'Permintaan Order Bahan';
        $kodesupplier = $this->db->query('SELECT max(kode_transaksi) as kodeTerbesar From bahan_keluar')->row();
        $hasil = $kodesupplier->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "TRK";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $data['bahan']= $this->pondokModel->get_data('bahan')->result();
        $data['outlet']= $this->pondokModel->get_data('outlet')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/order',$data);
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
            $kode_transaksi = $this->input->post('kode_transaksi');
            $id_bahan = $this->input->post('id_bahan');
            $nama_bahan = $this->input->post('nama_bahan');
            $permintaan = $this->input->post('permintaan');
            $kode_outlet = $this->input->post('kode_outlet');
            $total = $this->input->post('total');
            $tgl_transaksi = $this->input->post('tgl_transaksi');
            $status = "Tunggu";
            $status1 = "Pending";
            $data = array(
                'kode_transaksi' => $kode_transaksi,
                'id_bahan' => $id_bahan,
                'nama_bahan' => $nama_bahan,
                'permintaan'        => $permintaan,
                'kode_outlet'          => $kode_outlet,
                'total'          => $total,
                'tgl_transaksi' =>$tgl_transaksi,
                'status'            => $status,
            );
            $data1 = array(
                'kode_outlet' => $kode_outlet,
                'nama_bahan' => $nama_bahan,
                'qty' => $permintaan,
                'status' => $status1,
            );
            
            $this->pondokModel->insert_data($data,'bahan_keluar');
            $this->pondokModel->insert_data($data1,'stok_outlet');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/Orderan');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('kode_transaksi','Kode Supplier','required');
        $this->form_validation->set_rules('id_bahan','Nama Bahan','required');
        $this->form_validation->set_rules('permintaan','Alamat','required');
        $this->form_validation->set_rules('kode_outlet','Nama Supplier','required');
        $this->form_validation->set_rules('nama_bahan','Nama Bahan','required');
    }

    public function updateDataKirim(){
        $id = $this->input->post('id');
        $data = $this->db->query("SELECT * FROM bahan_keluar where id = '$id'")->result();
        $status = $data['status'];
        $tgl_estimasi = $this->input->post('tgl_estimasi');
        $status1 = $this->input->post('status');
        $data1 = array(
            'tgl_estimasi' => $tgl_estimasi,
            'status' => $status1,
        );
        $where = array(
            'id' => $id,
        );
        $this->pondokModel->update_data('bahan_keluar',$data1,$where);
       // $kd = $this->db->query("SELECT kode_outlet from bahan_keluar where id = '$id'")->result();
       // $nm = $this->db->query("SELECT nama_bahan from bahan_keluar where id = '$id'")->result();
       // $qty = $this->db->query("SELECT permintaan from bahan_keluar where id = '$id'")->result();
        //$validasi = $this->db->query("SELECT * FROM stok_outlet WHERE kode_outlet = '$kd' and nama_bahan = '$nm'")->num_rows();
        //if($validasi < 1 ){
        //    $this->pondokModel->insert_data($data1,'stok_outlet');
        //}
        foreach ($data as $d):
        endforeach;
        $kd = $d->kode_outlet;
        $nm = $d->nama_bahan;
        $pr = $d->permintaan;
        $validasi = $this->db->query("SELECT * FROM stok_outlet WHERE kode_outlet = '$kd' and nama_bahan = '$nm' and status = 'In'")->num_rows();
        if ($validasi < 1) {
            $this->db->query("UPDATE stok_outlet set status='In' where kode_outlet ='$kd' and nama_bahan = '$nm'");
        }else{
            $cek = $this->db->query("SELECT * FROM stok_outlet where kode_outlet = '$kd' and nama_bahan = '$nm' and status = 'In'")->result();
            foreach ($cek as $c):
            endforeach;
            $qtyawal = $c->qty;
            $qtyupdate = $qtyawal + $pr;
            $this->db->query("UPDATE stok_outlet set qty = '$qtyupdate' where kode_outlet ='$kd' and nama_bahan = '$nm' and status = 'In'");
        }
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Orderan Berhasil Dikonfirmasi!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('transaksi/orderan');
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
        $where = array('id_transaksi' => $id);
        $this->pondokModel->delete_data($where, 'order');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/ordersupplier');
    }

  
}

?>
