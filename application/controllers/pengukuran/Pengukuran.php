<?php

class Pengukuran extends CI_Controller {

    public function index() {
        $data['title'] = "Pengukuran" ;
        //$data['pengukuran'] = $this->bpnModel->get_data('pengukuran')->result();
        $data['pengukuran'] = $this->db->query(
            "SELECT pk.id_pengukuran,pk.kode_ukur,pr.kode_permohonan,pr.alamat,pr.kelurahan,pr.kecamatan,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran, s.status FROM pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai Left Join statusdoc s on s.kode = pk.kode_ukur;")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pengukuran/pengukuran',$data);
        $this->load->view('footer');
    }

    public function cetakukur(){
        $data['title'] = "Pengukuran" ;
        $data['peminjaman'] = $this->db->query("select pm.id_peminjaman,pm.jam_diambil,pm.kode_alat,a.nama_alat,p.nama_pegawai,p.telp,pm.tgl_dipinjam,pm.tgl_kembali,pm.jam_kembali from peminjaman pm left join alat a on pm.kode_alat = a.kode_alat left join pegawai p on p.id_pegawai=pm.id_pegawai;")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pengukuran/cetak',$data);
        $this->load->view('footer');
    }
    public function tambahData(){
        $data['title'] = "Pengukuran" ;
        $data['cekp'] = $this->db->query("SELECT permohonan.kode_permohonan,statusdoc.status from statusdoc,permohonan where kode_permohonan = kode and status = 'DITERIMA'")->result();
        $kode_pengukuran = $this->db->query('SELECT max(kode_ukur) as kodeTerbesar From pengukuran')->row();
        $hasil = $kode_pengukuran->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "ATR";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $data['pemohon'] = $this->bpnModel->get_data('pemohon')->result();
        $data['permohonan'] = $this->db->query("SELECT permohonan.*,statusdoc.status,pemohon.id_pemohon,pemohon.nama_pemohon from statusdoc,permohonan LEFT JOIN pemohon on pemohon.id_pemohon = permohonan.id_pemohon where kode_permohonan = kode and status = 'DITERIMA' and kode_permohonan NOT IN (SELECT kode_permohonan from pengukuran);")->result();
        $data['pegawai'] = $this->bpnModel->get_data('pegawai')->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pengukuran/tambahdata',$data);
        $this->load->view('footer');
    }

    public function tambahDataAksi(){
            $kode_ukur = $this->input->post('kode_ukur');
            $kode_permohonan = $this->input->post('kode_permohonan');
            $id_pemohon = $this->input->post('id_pemohon');    
            $id_pegawai = $this->input->post('id_pegawai');
            $tgl_pengukuran = $this->input->post('tgl_pengukuran');
            $waktu = $this->input->post('waktu');
            $status = " ";
            $data = array(
                'kode_ukur' => $kode_ukur,
                'kode_permohonan' => $kode_permohonan,
                'id_pemohon' => $id_pemohon,
                'id_pegawai' => $id_pegawai,
                'tgl_pengukuran' => $tgl_pengukuran,
                'waktu' => $waktu,
            );
            $data1 = array(
                'kode' => $kode_ukur,
                'status' => $status,
            );
            $this->bpnModel->insert_data($data,'pengukuran');
            $this->bpnModel->insert_data($data1,'statusdoc');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pengukuran/pengukuran');
    }

    public function updateData($id){
        $where = array('id_pengukuran' => $id);
        $data['pemohon'] = $this->bpnModel->get_data('pemohon')->result();
        $data['pegawai'] = $this->bpnModel->get_data('pegawai')->result();
        $data['permohonan'] = $this->bpnModel->get_data('permohonan')->result();
        $data['pengukuran'] = $this->db->query("SELECT pengukuran.*,pegawai.nama_pegawai,pemohon.nama_pemohon,statusdoc.status FROM pengukuran left join pegawai on pengukuran.id_pegawai = pegawai.id_pegawai left join pemohon on pemohon.id_pemohon=pengukuran.id_pemohon LEFT JOIN statusdoc ON statusdoc.kode=pengukuran.kode_ukur where pengukuran.kode_ukur = '$id';")->result();
        $data['title'] = 'pengukuran';
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pengukuran/updateData',$data);
        $this->load->view('footer');
    }

    public function updateDataAksi(){
            $id = $this->input->post('id_pengukuran');
            $kode_ukur = $this->input->post('kode_ukur');
            $kode_permohonan = $this->input->post('kode_permohonan');
            $id_pemohon = $this->input->post('id_pemohon');    
            $id_pegawai = $this->input->post('id_pegawai');
            $tgl_pengukuran = $this->input->post('tgl_pengukuran');
            $waktu = $this->input->post('waktu');
            $status = $this->input->post('status');
            $data = array(
                'kode_ukur' => $kode_ukur,
                'kode_permohonan' => $kode_permohonan,
                'id_pemohon' => $id_pemohon,
                'id_pegawai' => $id_pegawai,
                'tgl_pengukuran' => $tgl_pengukuran,
                'waktu' => $waktu,
            );
            $where = array(
                'id_pengukuran' => $id,
            );
            $data1 = array('status' => $status);
            $where1 = array(
                'kode' => $kode_ukur
            );
            $this->bpnModel->update_data('statusdoc',$data1,$where1);
            $this->bpnModel->update_data('pengukuran',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pengukuran/pengukuran');
        }

    public function deleteData($id) {
        $where = array('kode_ukur' => $id);
        $where1 = array('kode' => $id);
        $this->bpnModel->delete_data($where, 'pengukuran');
        $this->bpnModel->delete_data($where, 'hasil');
        $this->bpnModel->delete_data($where1, 'statusdoc');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pengukuran/pengukuran');
    }

    public function cetakPenugasan($id){
        $data['x'] = $this->db->query("SELECT pn.*,p.*,pr.*,pm.nama_pemohon from pengukuran pn left join pegawai p on pn.id_pegawai = p.id_pegawai left join permohonan pr on pr.kode_permohonan = pn.kode_permohonan LEFT JOIN pemohon pm ON pm.id_pemohon = pn.id_pemohon where pn.id_pengukuran = '$id';")->result();
        $data['tugas'] = $this->db->query("SELECT pn.*,p.* from pengukuran pn left join pegawai p on pn.id_pegawai = p.id_pegawai where pn.id_pengukuran = '$id';")->result();
        $this->load->view('header',$data);
        $this->load->view('pengukuran/report1',$data);
    }
    public function cetak_pengukuran(){
        
        $data['title'] = 'Bahan Keluar';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        //$data['liat']= $this->db->query('SELECT bahan_keluar.*,bahan.nama_bahan,outlet.nama_outlet,bahan_keluar.total from bahan_keluar left join bahan on bahan.id_bahan = bahan_keluar.id_bahan left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet ;')->result();
        $data['liat']= $this->db->query("SELECT pk.id_pengukuran,pk.kode_ukur,pk.waktu,pr.kode_permohonan,pr.kelurahan,pr.kecamatan,pr.alamat,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran from pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai where date(pk.tgl_pengukuran) BETWEEN '$tgl1' AND '$tgl2';")->result();
        $this->load->view('header',$data);
        $this->load->view('pengukuran/report',$data);
    }
    public function cetak_pengukuran1(){
        
        $data['title'] = 'Bahan Keluar';
        $data['liat']= $this->db->query("SELECT pk.id_pengukuran,pk.kode_ukur,pk.waktu,pr.kode_permohonan,pr.kelurahan,pr.kecamatan,pr.alamat,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran from pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai;")->result();
        $this->load->view('header',$data);
        $this->load->view('pengukuran/report2',$data);
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
