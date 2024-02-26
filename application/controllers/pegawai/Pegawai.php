<?php

class Pegawai extends CI_Controller {

    public function index() {
        $data['title'] = "Pegawai" ;
        $data['pegawai'] = $this->bpnModel->get_data('pegawai')->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pegawai/pegawai',$data);
        $this->load->view('footer');
    }

    public function tambahData(){
        $data['title'] = "Pegawai" ;
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pegawai/tambahdata',$data);
        $this->load->view('footer');
    }

    public function tambahDataAksi(){
        $nama_pegawai = $this->input->post('nama_pegawai');    
        $nik = $this->input->post('nik');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $divisi = $this->input->post('divisi');
            $data = array(
                'nama_pegawai' => $nama_pegawai,
                'nik' => $nik,
                'tgl_lahir'    => $tgl_lahir,
                'alamat' => $alamat,
                'telp' => $telp,
                'divisi' => $divisi,
            );
            $this->bpnModel->insert_data($data,'pegawai');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pegawai/pegawai');
    }

    public function updateData($id){
        $where = array('id_pegawai' => $id);
        $data['pegawai'] = $this->db->query("SELECT * FROM pegawai where id_pegawai = '$id'")->result();
        $data['title'] = 'Pegawai';
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pegawai/updateData',$data);
        $this->load->view('footer');
    }

    public function updateDataAksi(){
            $id = $this->input->post('id_pegawai');
            $nama_pegawai = $this->input->post('nama_pegawai');    
            $nik = $this->input->post('nik');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $divisi = $this->input->post('divisi');
            $data = array(
                'nama_pegawai' => $nama_pegawai,
                'nik' => $nik,
                'tgl_lahir'    => $tgl_lahir,
                'alamat' => $alamat,
                'telp' => $telp,
                'divisi' => $divisi,
            );
            $where = array(
                'id_pegawai' => $id
            );
            $this->bpnModel->update_data('pegawai',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pegawai/pegawai');
        }

    public function deleteData($id) {
        $where = array('id_pegawai' => $id);
        $this->bpnModel->delete_data($where, 'pegawai');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('pegawai/pegawai');
    }

    public function cetakhistory() {
        $data['title'] = "History Kinerja Pengukuran" ;
        //$data['pegawai'] = $this->db->query("SELECT pegawai.*,pengukuran.*, pemohon.*,statusdoc.status,pegawai.nik no_ktp from pegawai LEFT join pengukuran on pengukuran.id_pegawai = pegawai.id_pegawai left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon LEFT JOIN statusdoc on statusdoc.kode = pengukuran.kode_ukur group by pegawai.id_pegawai;")->result();
        $data['pegawai'] = $this->db->query("SELECT * from pegawai")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('pegawai/cetak',$data);
        $this->load->view('footer');
    }
    public function printhistory() {
        $data['title'] = "History Kinerja Pengukuran" ;
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
        $id = $this->input->post('nama_pegawai');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
		$data['id'] = $this->input->post('nama_pegawai');
        $data['jumlah'] = $this->db->query("SELECT SUM(hasil.panjang*hasil.lebar) as Hasil from pegawai left join pengukuran on pengukuran.id_pegawai = pegawai.id_pegawai left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon LEFT JOIN statusdoc on statusdoc.kode = pengukuran.kode_ukur LEFT JOIN hasil on hasil.kode_ukur = pengukuran.kode_ukur WHERE pegawai.id_pegawai = '$id';")->result();
        $data['print'] = $this->db->query("SELECT pegawai.*,pegawai.nik no_ktp,pegawai.tgl_lahir tgl,pegawai.alamat almt,pengukuran.*, pemohon.*,(hasil.panjang*hasil.lebar) as Hasil,statusdoc.status from pegawai left join pengukuran on pengukuran.id_pegawai = pegawai.id_pegawai left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon LEFT JOIN statusdoc on statusdoc.kode = pengukuran.kode_ukur LEFT JOIN hasil on hasil.kode_ukur = pengukuran.kode_ukur WHERE pegawai.id_pegawai = '$id' AND pengukuran.tgl_pengukuran BETWEEN '$tgl1' AND '$tgl2';")->result();
        $data['cetak'] = $this->db->query("SELECT pegawai.*,pengukuran.*, pemohon.* from pegawai left join pengukuran on pengukuran.id_pegawai = pegawai.id_pegawai left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon where pegawai.id_pegawai = '$id';")->result();
        $this->load->view('header',$data);
        $this->load->view('pegawai/report',$data);
    }

    public function printhistory1() {
        $data['title'] = "History Kinerja Pengukuran" ;
        $data['jumlah'] = $this->db->query("SELECT SUM(hasil.panjang*hasil.lebar) jumlh from pegawai left join pengukuran on pengukuran.id_pegawai = pegawai.id_pegawai left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon LEFT JOIN statusdoc on statusdoc.kode = pengukuran.kode_ukur LEFT JOIN hasil on hasil.kode_ukur = pengukuran.kode_ukur;")->result();
       $data['print'] = $this->db->query("SELECT pegawai.*,pegawai.nik no_ktp,pegawai.tgl_lahir tgl,pegawai.alamat almt,SUM(hasil.panjang*hasil.lebar) as Hasil,statusdoc.status from pegawai left join pengukuran on pengukuran.id_pegawai = pegawai.id_pegawai left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon LEFT JOIN statusdoc on statusdoc.kode = pengukuran.kode_ukur LEFT JOIN hasil on hasil.kode_ukur = pengukuran.kode_ukur GROUP BY pegawai.id_pegawai;")->result();
        $data['cetak'] = $this->db->query("SELECT pegawai.*,pengukuran.*, pemohon.* from pegawai left join pengukuran on pengukuran.id_pegawai = pegawai.id_pegawai left join pemohon on pemohon.id_pemohon = pengukuran.id_pemohon;")->result();
        $this->load->view('header',$data);
        $this->load->view('pegawai/report1',$data);
    }

    public function printpegawai() {
        $data['title'] = "Laporan Data Pegawai" ;
        $data['pegawai'] = $this->bpnModel->get_data('pegawai')->result();
        $this->load->view('header',$data);
        $this->load->view('pegawai/reportp',$data);
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
