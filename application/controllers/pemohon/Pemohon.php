<?php

class Pemohon extends CI_Controller {

    public function index() {
        $data['title'] = "Pemohon" ;
        $data['pemohon'] = $this->bpnModel->get_data('pemohon')->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pemohon/pemohon',$data);
        $this->load->view('footer');
    }

    public function tambahData(){
        $data['title'] = "pemohon" ;
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pemohon/tambahdata',$data);
        $this->load->view('footer');
    }

    public function tambahDataAksi(){
            $nama_pemohon = $this->input->post('nama_pemohon');    
            $nik = $this->input->post('nik');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hak_akses = $this->input->post('hak_akses');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $data = array(
                'nama_pemohon' => $nama_pemohon,
                'nik' => $nik,
                'tgl_lahir'    => $tgl_lahir,
                'alamat' => $alamat,
                'telp' => $telp,
            );
            $data1 = array(
                'nik' => $nik,
                'username' => $username,
                'password' => $password,
                'hak_akses' => $hak_akses,
            );
            $this->bpnModel->insert_data($data,'pemohon');
            $this->bpnModel->insert_data($data1,'user');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pemohon/pemohon');
    }

    public function updateData($id){
        $where = array('id_pemohon' => $id);
        $data['pemohon'] = $this->db->query("SELECT * FROM pemohon where id_pemohon = '$id'")->result();
        $data['title'] = 'Pemohon';
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pemohon/updateData',$data);
        $this->load->view('footer');
    }

    public function updateDataAksi(){
            $id = $this->input->post('id_pemohon');
            $nama_pemohon = $this->input->post('nama_pemohon');    
            $nik = $this->input->post('nik');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $data = array(
                'nama_pemohon' => $nama_pemohon,
                'nik' => $nik,
                'tgl_lahir'    => $tgl_lahir,
                'alamat' => $alamat,
                'telp' => $telp,
            );
            $where = array(
                'id_pemohon' => $id
            );
            $this->bpnModel->update_data('pemohon',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pemohon/pemohon');
        }

    public function deleteData($id) {
        $where = array('id_pemohon' => $id);
        $this->bpnModel->delete_data($where, 'pemohon');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pemohon/pemohon');
    }
    public function printpemohon() {
        $data['title'] = "Laporan Data Pemohon" ;
        $data['pemohon'] = $this->bpnModel->get_data('pemohon')->result();
        $this->load->view('header',$data);
        $this->load->view('pemohon/reportp',$data);
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
