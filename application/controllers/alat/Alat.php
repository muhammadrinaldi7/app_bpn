<?php

class Alat extends CI_Controller {

    public function index() {
        $data['title'] = "Alat" ;
        $data['alat'] = $this->bpnModel->get_data('alat')->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('alat/alat',$data);
        $this->load->view('footer');
    }

    public function tambahData(){
        $data['title'] = "Alat" ;
        $kode_alat = $this->db->query('SELECT max(kode_alat) as kodeTerbesar From alat')->row();
        $hasil = $kode_alat->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "TOL";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('alat/tambahdata',$data);
        $this->load->view('footer');
    }

    public function tambahDataAksi(){
            $kode_alat = $this->input->post('kode_alat');
            $nama_alat = $this->input->post('nama_alat');    
            $data = array(
                'kode_alat' => $kode_alat,
                'nama_alat' => $nama_alat,
                'status' => 'Ada',
            );
            $this->bpnModel->insert_data($data,'alat');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('alat/alat');
    }

    public function updateData($id){
        $where = array('id_alat' => $id);
        $data['alat'] = $this->db->query("SELECT * FROM alat where id_alat = '$id'")->result();
        $data['title'] = 'alat';
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('alat/updateData',$data);
        $this->load->view('footer');
    }

    public function updateDataAksi(){
            $id = $this->input->post('id_alat');
            $nama_alat = $this->input->post('nama_alat');    
            $kode_alat = $this->input->post('kode_alat');
            $data = array(
                'kode_alat' => $kode_alat,
                'nama_alat' => $nama_alat,
            );
            $where = array(
                'id_alat' => $id
            );
            $this->bpnModel->update_data('alat',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('alat/alat');
        }

    public function deleteData($id) {
        $where = array('id_alat' => $id);
        $this->bpnModel->delete_data($where, 'alat');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('alat/alat');
    }

    public function printalat() {
        $data['title'] = "Laporan Data Alat" ;
        $data['alat'] = $this->bpnModel->get_data('alat')->result();
        $this->load->view('header',$data);
        $this->load->view('alat/reportp',$data);
    }
}
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
