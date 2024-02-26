<?php

class Peminjaman extends CI_Controller {

    public function index() {
        $data['title'] = "Peminjaman" ;
        $data['cekalat'] = $this->db->query("select count(tgl_kembali) status from peminjaman where id_peminjaman = 5;")->num_rows();
        $data['peminjaman'] = $this->db->query("SELECT pm.id_peminjaman,pm.jam_diambil,pm.kode_alat,a.nama_alat,p.nama_pegawai,p.telp,pm.tgl_dipinjam,pm.penanggung_jawab,IFNULL(pm.tgl_kembali,'1999-01-01') tgl_kembali,pm.jam_kembali from peminjaman pm left join alat a on pm.kode_alat = a.kode_alat left join pegawai p on p.id_pegawai=pm.id_pegawai;")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('peminjaman/peminjaman',$data);
        $this->load->view('footer');
    }

    public function cetakpinjam(){
        $data['title'] = "Peminjaman" ;
        $data['peminjaman'] = $this->db->query("select pm.id_peminjaman,pm.jam_diambil,pm.kode_alat,a.nama_alat,p.nama_pegawai,p.telp,pm.tgl_dipinjam,pm.tgl_kembali,pm.jam_kembali from peminjaman pm left join alat a on pm.kode_alat = a.kode_alat left join pegawai p on p.id_pegawai=pm.id_pegawai;")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('peminjaman/cetak',$data);
        $this->load->view('footer');
    }
    public function tambahData(){
        $data['title'] = "peminjaman" ;
        $data['alat'] = $this->db->query("select * from alat where status = 'Ada';")->result();
        $data['pegawai'] = $this->db->query('SELECT * from pegawai')->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('peminjaman/tambahdata',$data);
        $this->load->view('footer');
    }

    public function tambahDataAksi(){
            $kode_alat = $this->input->post('kode_alat');
            $id_pegawai = $this->input->post('id_pegawai');
            $penanggung_jawab = $this->input->post('penanggung_jawab');
            $jam_diambil = $this->input->post('jam_diambil');
            $tgl_dipinjam = $this->input->post('tgl_dipinjam');    
            $data = array(
                'kode_alat' => $kode_alat,
                'id_pegawai' => $id_pegawai,
                'penanggung_jawab' => $penanggung_jawab,
                'jam_diambil' => $jam_diambil,
                'tgl_dipinjam' => $tgl_dipinjam,
            );
            $this->bpnModel->insert_data($data,'peminjaman');
            $where = array(
                'kode_alat' => $kode_alat,
                
            );
            $data1 = array(
                'status' => 'Dipinjam'
            );
            $this->bpnModel->update_data('alat',$data1,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('peminjaman/peminjaman');
    }

    public function updateData($id){
        $where = array('id_peminjaman' => $id);
        $data['peminjaman'] = $this->db->query("select peminjaman.*,pegawai.nama_pegawai,alat.kode_alat,alat.nama_alat from peminjaman left join pegawai on pegawai.id_pegawai=peminjaman.id_pegawai left join alat on alat.kode_alat = peminjaman.kode_alat where peminjaman.id_peminjaman = '$id';")->result();
        $data['title'] = 'peminjaman';
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('peminjaman/updateData',$data);
        $this->load->view('footer');
    }

    public function updateDataAksi(){
            $id = $this->input->post('id_peminjaman');
            $id_pegawai = $this->input->post('id_pegawai');    
            $kode_alat = $this->input->post('kode_alat');
            $jam_kembali = $this->input->post('jam_kembali');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $data = array(
                'kode_alat' => $kode_alat,
                'id_pegawai' => $id_pegawai,
                'jam_kembali' => $jam_kembali,
                'tgl_kembali' => $tgl_kembali,
            );
            $where = array(
                'id_peminjaman' => $id
            );
            $this->bpnModel->update_data('peminjaman',$data,$where);
            $where = array(
                'kode_alat' => $kode_alat,
            );
            $data1 = array(
                'status' => 'Ada'
            );
            $this->bpnModel->update_data('alat',$data1,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('peminjaman/peminjaman');
        }

    public function deleteData($id) {
        $where = array('id_peminjaman' => $id);
        $this->bpnModel->delete_data($where, 'peminjaman');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('peminjaman/peminjaman');
    }

    public function cetak_peminjaman(){
        
        $data['title'] = 'Peminjaman Alat';
        $tgl1 = $this->input->post('tgl1');
		$data['tgl1'] = $this->input->post('tgl1');
        //$data['liat']= $this->db->query('SELECT bahan_keluar.*,bahan.nama_bahan,outlet.nama_outlet,bahan_keluar.total from bahan_keluar left join bahan on bahan.id_bahan = bahan_keluar.id_bahan left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet ;')->result();
        $data['liat']= $this->db->query(
            "SELECT peminjaman.id_peminjaman,peminjaman.jam_diambil,peminjaman.kode_alat,alat.nama_alat,pegawai.nama_pegawai,pegawai.telp,peminjaman.tgl_dipinjam,peminjaman.tgl_kembali,peminjaman.jam_kembali,timediff(peminjaman.jam_kembali,peminjaman.jam_diambil) jam 
             FROM peminjaman LEFT JOIN alat on peminjaman.kode_alat = alat.kode_alat LEFT JOIN pegawai on pegawai.id_pegawai=peminjaman.id_pegawai 
             WHERE date(peminjaman.tgl_dipinjam) = '$tgl1';")->result();
        $this->load->view('header',$data);
        $this->load->view('peminjaman/report',$data);
    }
    public function cetak_peminjaman1(){
        
        $data['title'] = 'Peminjaman Alat';
        $tgl1 = $this->input->post('tgl1');
		$data['tgl1'] = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
		$data['tgl2'] = $this->input->post('tgl2');
        //$data['liat']= $this->db->query('SELECT bahan_keluar.*,bahan.nama_bahan,outlet.nama_outlet,bahan_keluar.total from bahan_keluar left join bahan on bahan.id_bahan = bahan_keluar.id_bahan left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet ;')->result();
        $data['liat']= $this->db->query(
            "SELECT peminjaman.id_peminjaman,peminjaman.jam_diambil,peminjaman.kode_alat,alat.nama_alat,pegawai.nama_pegawai,pegawai.telp,peminjaman.tgl_dipinjam,peminjaman.tgl_kembali,peminjaman.jam_kembali,timediff(peminjaman.jam_kembali,peminjaman.jam_diambil) jam 
             FROM peminjaman LEFT JOIN alat on peminjaman.kode_alat = alat.kode_alat LEFT JOIN pegawai on pegawai.id_pegawai=peminjaman.id_pegawai 
             WHERE date(peminjaman.tgl_dipinjam) BETWEEN '$tgl1' AND '$tgl2';")->result();
        $this->load->view('header',$data);
        $this->load->view('peminjaman/report1',$data);
    }
    public function cetak_peminjaman2(){
        
        $data['liat']= $this->db->query(
            "SELECT peminjaman.id_peminjaman,peminjaman.jam_diambil,peminjaman.kode_alat,alat.nama_alat,pegawai.nama_pegawai,pegawai.telp,peminjaman.tgl_dipinjam,peminjaman.tgl_kembali,peminjaman.jam_kembali,timediff(peminjaman.jam_kembali,peminjaman.jam_diambil) jam 
             FROM peminjaman LEFT JOIN alat on peminjaman.kode_alat = alat.kode_alat LEFT JOIN pegawai on pegawai.id_pegawai=peminjaman.id_pegawai ;")->result();
        $this->load->view('header',$data);
        $this->load->view('peminjaman/report2',$data);
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
