<?php

class User extends CI_Controller {

    public function index() {
        $data['title'] = "User" ;
        $data['User'] = $this->bpnModel->get_data('user')->result();
        $data['usr'] = $this->db->query("SELECT user.id,user.username,user.password,user.hak_akses,(CASE WHEN user.hak_akses = '1' THEN pegawai.nama_pegawai ELSE pemohon.nama_pemohon END) as Nama FROM user LEFT JOIN pemohon on pemohon.nik = user.nik LEFT JOIN pegawai on pegawai.nik = user.nik;")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('User/User',$data);
        $this->load->view('footer');
    }

    public function tambahData(){
        $data['title'] = "User" ;
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('User/tambahdata',$data);
        $this->load->view('footer');
    }

    public function tambahDataAksi(){
            $username = $this->input->post('username');    
            $nik = $this->input->post('nik');
            $password = $this->input->post('password');
            $hak_akses = $this->input->post('hak_akses');
            $data = array(
                'nik' => $nik,
                'username' => $username,
                'password' => $password,
                'hak_akses'    => $hak_akses,
            );
            $this->bpnModel->insert_data($data,'user');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>User Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('User/User');
    }

    public function updateData($id){
        $where = array('id' => $id);
        $data['User'] = $this->db->query("SELECT user.nik,user.id,user.username,user.password,user.hak_akses,(CASE WHEN user.hak_akses = '1' THEN pegawai.nama_pegawai ELSE pemohon.nama_pemohon END) as Nama FROM user LEFT JOIN pemohon on pemohon.nik = user.nik LEFT JOIN pegawai on pegawai.nik = user.nik where user.id = '$id';")->result();
        $data['title'] = 'User';
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('User/updateData',$data);
        $this->load->view('footer');
    }

    public function updateDataAksi(){
            $id = $this->input->post('id');    
            $nik = $this->input->post('nik');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $hak_akses = $this->input->post('hak_akses');
            $data = array(
                'nik' => $nik,
                'username' => $username,
                'password' => $password,
                'hak_akses' => $hak_akses,
            );
            $where = array(
                'id' => $id
            );
            $this->bpnModel->update_data('user',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('User/User');
        }

    public function deleteData($id) {
        $where = array('id' => $id);
        $this->bpnModel->delete_data($where, 'User');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('User/User');
    }
    public function resetPassword(){
        $nik = $this->input->post('nik');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $cek = $this->db->query("SELECT user.nik FROM user left join pemohon on user.nik = pemohon.nik where user.nik = '$nik';")->num_rows();
        $data = array(
            'password' => $pass,
        );
        $where = array( 'nik' => $nik,);
        if($cek>0){
            $this->bpnModel->update_data('user',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password Berhasil Diupdate, Silahkan Coba Login Kembali!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Login');
        }else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>NIK anda belum terdata pada user!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('Login');
        }
    }
    public function cetakhistory() {
        $data['title'] = "History Pengukuran User" ;
        //$data['User'] = $this->db->query("SELECT User.*,pengukuran.*, pemohon.*,statusdoc.status,User.nik no_ktp from User LEFT join pengukuran on pengukuran.id = User.id left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon LEFT JOIN statusdoc on statusdoc.kode = pengukuran.kode_ukur group by User.id;")->result();
        $data['User'] = $this->db->query("SELECT * from User")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('User/cetak',$data);
        $this->load->view('footer');
    }
    public function printhistory($id) {
        $data['title'] = "History Pengukuran User" ;
        $data['print'] = $this->db->query("SELECT User.*,User.nik no_ktp,User.tgl_lahir tgl,User.alamat almt,pengukuran.*, pemohon.*,statusdoc.status from User left join pengukuran on pengukuran.id = User.id left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon LEFT JOIN statusdoc on statusdoc.kode = pengukuran.kode_ukur WHERE User.id = '$id';")->result();
        $data['cetak'] = $this->db->query("SELECT User.*,pengukuran.*, pemohon.* from User left join pengukuran on pengukuran.id = User.id left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon where User.id = '$id';")->result();
        $this->load->view('header',$data);
        $this->load->view('User/report',$data);
    }

    public function printUser() {
        $data['title'] = "Laporan Data User" ;
        $data['User'] = $this->bpnModel->get_data('User')->result();
        $this->load->view('header',$data);
        $this->load->view('User/reportp',$data);
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
