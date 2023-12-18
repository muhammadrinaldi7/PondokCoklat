<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualanc extends CI_Controller {
    
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
        $data['title'] = 'Cashier';
        $bahan = $this->db->query('SELECT * From bahan');
        $data['bahan_masuk'] = $this->pondokModel->get_data('bahan_masuk')->num_rows();
        $data['bahan_keluar'] = $this->pondokModel->get_data('bahan_keluar')->num_rows();
        $data['outlet'] = $this->pondokModel->get_data('outlet')->num_rows();
        $data['bahan'] = $this->pondokModel->get_data('bahan')->result();
        $kodekemitraan = $this->db->query('SELECT max(kode_transaksi) as kodeTerbesar From penjualanoutlet')->row();
        $hasil = $kodekemitraan->kodeTerbesar;
        $urutan =(int)substr($hasil,4,3);
        $urutan++;
        $huruf = "2023";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/penjualanc',$data);
        $this->load->view('template/footer');
             
    }
    public function detailpenjualan() 
    {
        $data['title'] = 'History Penjualan';
        $data['riwayatpenjualan'] = $this->db->query("SELECT id_penjualan,kode_transaksi,tgl_transaksi,SUM(qty) as qty from riwayatpenjualan group By kode_transaksi")->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/hpenjualanc',$data);
        $this->load->view('template/footer');
             
    }

    public function detail(){
        $this->load->view('transaksi/detail_penjualan');
    }

    public function tambahDataAksi() {
        $kode = $this->input->post('kode');
        $tgl_transaksi = $this->input->post('tgl_transaksi');
        $kode_bahan = $this->input->post('kode_bahan');
        $qty = $this->input->post('qty');
        $outlet = $this->session->userdata('username');
        $data = array(
            'kode_transaksi' => $kode,
            'kode_outlet' => $outlet,
            'tgl_transaksi' => $tgl_transaksi,            
        );      
        
        $this->pondokModel->insert_data($data,'penjualanoutlet');
            $idpenjualan = $this->db->query('SELECT max(id_penjualan) as idTerbesar From penjualanoutlet')->row();
            $id = $idpenjualan->idTerbesar;
            $data['idp'] = $id;
            $jumlh = count($this->input->post('kode_bahan'));
            for ($i = 0; $i < $jumlh; $i++) {
                $this->db->query("INSERT INTO dpenjualanoutlet SET id_penjualan = '$id', kode_transaksi = '2023001', kode_bahan = '$kode_bahan[$i]', qty = '$qty[$i]'");
            }             
        
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>');
        redirect('transaksi/Penjualanc');
    }
    
}

?>
