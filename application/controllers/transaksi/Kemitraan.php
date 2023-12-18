<?php 

class Kemitraan extends CI_Controller {
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
        $data['title'] = 'Data kemitraan';
        $data['kemitraan']= $this->db->query("SELECT * FROM kemitraan left JOIN outlet on outlet.kode_outlet = kemitraan.kode_outlet")->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('kemitraan/kemitraan',$data);
        $this->load->view('template/footer');
    }

    public function tambahData(){
        $data['title'] = 'Tambah Data kemitraan';
        $data['paket'] = $this->db->query("SELECT * FROM paket")->result();
        $kodekemitraan = $this->db->query('SELECT max(kode_outlet) as kodeTerbesar From kemitraan')->row();
        $hasil = $kodekemitraan->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "PCH";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('kemitraan/tambahData',$data);
        $this->load->view('template/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $no_ktp = $this->input->post('no_ktp');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $alamat_lengkap = $this->input->post('alamat_lengkap');
            $koordinat = $this->input->post('latlong');
            $email = $this->input->post('email');
            $kode_outlet = $this->input->post('kode_outlet');
            $nama_outlet = $this->input->post('nama_outlet');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $paket = $this->input->post('kode_paket');
            $tgl_bergabung = $this->input->post('tgl_bergabung');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $data = array(
                'no_ktp' => $no_ktp,
                'nama_lengkap' => $nama_lengkap,
                'alamat_lengkap'        => $alamat_lengkap,
                'email'          => $email,
                'kode_outlet'          => $kode_outlet,
                'paket'          => $paket,
            );
            $data1 = array(
                'username'          => $this->input->post('username'),
                'password'          => $this->input->post('password'),
                'hak_akses'          => "2",
            );
            $data2 = array(
                'kode_outlet'          => $kode_outlet,
                'koordinat'          => $koordinat,
                'nama_lokasi'          => $nama_outlet,
                'keterangan'        => "YA",
            );
            $data3 = array(
                'kode_outlet' => $kode_outlet,
                'nama_outlet' => $nama_outlet,
                'alamat'        => $alamat,
                'telp'          => $telp,
                'tgl_bergabung'          => $tgl_bergabung,
            );
            $this->pondokModel->insert_data($data,'kemitraan');
            $this->pondokModel->insert_data($data1,'user');
            $this->pondokModel->insert_data($data2,'lokasi');
            $this->pondokModel->insert_data($data3,'outlet');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('transaksi/kemitraan');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('no_ktp','No KTP','required');
        $this->form_validation->set_rules('kode_outlet','Kode Outlet','required');
        $this->form_validation->set_rules('nama_outlet','Nama Outlet','required');
        $this->form_validation->set_rules('username','Username','required');
    }

    public function updateData($id){
        $where = array('id_kemitraan' => $id);
        $data['kemitraan'] = $this->db->query("SELECT * FROM kemitraan LEFT JOIN user on user.username = kemitraan.kode_kemitraan LEFT JOIN lokasi on lokasi.kode_outlet = kemitraan.kode_outlet where kemitraan.id_kemitraan = '$id'")->result();
        $data['title'] = 'Update Data kemitraan';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('kemitraan/updateData',$data);
        $this->load->view('template/footer');
    }
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id             = $this->input->post('id_kemitraan');
            $kode_kemitraan = $this->input->post('kode_kemitraan');
            $nama_kemitraan = $this->input->post('nama_kemitraan');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $tgl = $this->input->post('tgl');        
            $koordinat = $this->input->post('latlong');        
            $data = array(
                'kode_kemitraan' => $kode_kemitraan,
                'nama_kemitraan' => $nama_kemitraan,
                'alamat'        => $alamat,
                'telp'          => $telp,
                'tgl_bergabung'          => $tgl,
            );

            $where = array(
                'id_kemitraan' => $id
            );
            $this->pondokModel->update_data('kemitraan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('kemitraan/kemitraan');
        }
    }

    public function deleteData($id) {
        $where = array('kode_kemitraan' => $id);
        $where1 = array('username' => $id);
        $this->pondokModel->delete_data($where, 'kemitraan');
        $this->pondokModel->delete_data($where1, 'user');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('kemitraan/kemitraan');
    }

    public function LaporanKemitraan(){
        $data['title'] = 'Laporan Kemitraan Terbaru';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('kemitraan/LaporanKemitraan',$data);
        $this->load->view('template/footer');
    }

    public function report_kemitraan(){
        $data['title'] = 'Kemitraan Terbaru';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        //$data['liat']= $this->db->query("SELECT bahan_masuk.*,bahan.nama_bahan,supplier.nama_supplier,supplier.telp from bahan_masuk left join bahan on bahan.id_bahan = bahan_masuk.id_bahan left join supplier on supplier.id_supplier = bahan_masuk.id_supplier AND date(tgl_transaksi) BETWEEN '$tgl1' AND '$tgl2'")->result();
        $data['liat']= $this->db->query("SELECT k.nama_lengkap,o.kode_outlet,o.alamat,o.telp,o.tgl_bergabung,p.nama_paket,p.harga 
        FROM kemitraan k 
        LEFT JOIN paket p ON k.paket=p.kode_paket 
        LEFT JOIN outlet o on o.kode_outlet = k.kode_outlet 
        WHERE o.tgl_bergabung BETWEEN '$tgl1' AND '$tgl2'")->result();
        $this->load->view('template/header',$data);
        $this->load->view('transaksi/Report_kemitraan',$data);
    }

}

?>