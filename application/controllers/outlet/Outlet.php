<?php 

class Outlet extends CI_Controller {
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
        $data['title'] = 'Data Outlet';
        $data['outlet']= $this->pondokModel->get_data('outlet')->result();
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('outlet/outlet',$data);
        $this->load->view('template/footer');
    }

    public function tambahData(){
        $data['title'] = 'Tambah Data outlet';
        $kodeoutlet = $this->db->query('SELECT max(kode_outlet) as kodeTerbesar From outlet')->row();
        $hasil = $kodeoutlet->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "PCH";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('outlet/tambahData',$data);
        $this->load->view('template/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else {
            $kode_outlet = $this->input->post('kode_outlet');
            $nama_outlet = $this->input->post('nama_outlet');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $tgl = $this->input->post('tgl');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hak = "2";
            $data = array(
                'kode_outlet' => $kode_outlet,
                'nama_outlet' => $nama_outlet,
                'alamat'        => $alamat,
                'telp'          => $telp,
                'tgl_bergabung'          => $tgl,
            );
            $data1 = array(
                'username'          => $this->input->post('username'),
                'password'          => $this->input->post('password'),
                'hak_akses'          => "2",
            );
            $this->pondokModel->insert_data($data,'outlet');
            $this->pondokModel->insert_data($data1,'user');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('outlet/outlet');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('kode_outlet','Kode outlet','required');
        $this->form_validation->set_rules('nama_outlet','Nama outlet','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('telp','No Telepon','required');
    }

    public function updateData($id){
        $where = array('id_outlet' => $id);
        $data['outlet'] = $this->db->query("SELECT outlet.*,user.*,lokasi.koordinat,lokasi.nama_lokasi FROM outlet LEFT JOIN user on user.username = outlet.kode_outlet LEFT JOIN lokasi ON lokasi.kode_outlet = outlet.kode_outlet where outlet.id_outlet = '$id'")->result();
        $data['lokasi'] = $this->db->query("SELECT outlet.*,user.*,IFNULL(lokasi.koordinat,'LatLng(-3.391251, 114.656078)') as koordinat,IFNULL(lokasi.nama_lokasi,'Warehouse') as nama_lokasi FROM outlet LEFT JOIN user on user.username = outlet.kode_outlet LEFT JOIN lokasi ON lokasi.kode_outlet = outlet.kode_outlet where outlet.id_outlet = '$id'")->result();
        $data['title'] = 'Update Data outlet';
        $this->load->view('template/header',$data);
        $this->load->view('template/sidebar');
        $this->load->view('outlet/updateData',$data);
        $this->load->view('template/footer');
    }
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else {
            $id             = $this->input->post('id_outlet');
            $kode_outlet = $this->input->post('kode_outlet');
            $nama_outlet = $this->input->post('nama_outlet');
            $alamat = $this->input->post('alamat');
            $koordinat = $this->input->post('latlong');
            $telp = $this->input->post('telp');
            $tgl = $this->input->post('tgl');           
            $data = array(
                'kode_outlet' => $kode_outlet,
                'nama_outlet' => $nama_outlet,
                'alamat'        => $alamat,
                'telp'          => $telp,
                'tgl_bergabung'          => $tgl,
            );

            $where = array(
                'id_outlet' => $id
            );
            $data1 = array(
                'koordinat' => $koordinat,
                'nama_lokasi' => $nama_outlet,
                'keterangan'        => 'YA',
            );

            $where1 = array(
                'kode_outlet' => $kode_outlet
            );
            $this->pondokModel->update_data('outlet',$data,$where);
            $this->pondokModel->update_data('lokasi',$data1,$where1);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('outlet/outlet');
        }
    }

    public function deleteData($id) {
        $where = array('kode_outlet' => $id);
        $where1 = array('username' => $id);
        $this->pondokModel->delete_data($where, 'outlet');
        $this->pondokModel->delete_data($where1, 'user');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('outlet/outlet');
    }
}

?>