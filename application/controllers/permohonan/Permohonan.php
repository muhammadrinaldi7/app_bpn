<?php

class permohonan extends CI_Controller {

    public function index() {
        $data['title'] = "Permohonan" ;
        $data['cek'] = $this->db->query("SELECT * From statusdoc ")->result();
        //$data['permohonan'] = $this->bpnModel->get_data('permohonan')->result();
        $data['permohonan'] = $this->db->query(
            "SELECT pr.*,p.nama_pemohon,s.status FROM permohonan pr LEFT JOIN pemohon p ON pr.id_pemohon = p.id_pemohon LEFT JOIN statusdoc s ON pr.kode_permohonan = s.kode")->result();
            $data['permohonan1'] = $this->db->query(
                "SELECT pr.*,p.nama_pemohon,s.status FROM permohonan pr LEFT JOIN pemohon p ON pr.id_pemohon = p.id_pemohon LEFT JOIN statusdoc s ON pr.kode_permohonan = s.kode ")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('permohonan/permohonan',$data);
        $this->load->view('footer');
    }

    public function tambahData(){
        $data['title'] = "Permohonan" ;
        $kode_permohonan = $this->db->query('SELECT max(kode_permohonan) as kodeTerbesar From permohonan')->row();
        $hasil = $kode_permohonan->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "BPN";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $nik = $this->session->userdata('nik');
        $data['cek'] = $this->db->query("SELECT * from pemohon left join user on pemohon.nik = user.nik where user.nik = '$nik';")->result();
        $data['pemohon'] = $this->bpnModel->get_data('pemohon')->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('permohonan/tambahdata',$data);
        $this->load->view('footer');
    }

    public function tambahDataAksi(){
            $kode_permohonan = $this->input->post('kode_permohonan');
            $id_pemohon = $this->input->post('id_pemohon');    
            $alamat = $this->input->post('alamat');
            $kelurahan = $this->input->post('kelurahan');
            $kecamatan = $this->input->post('kecamatan');
            $telp = $this->input->post('telp');
            $tgl_permohonan = $this->input->post('tgl_permohonan');
            $tgl_penfatran = $this->input->post('tgl_penfatran');
            $status = $this->input->post('status');
            $data = array(
                'kode_permohonan' => $kode_permohonan,
                'id_pemohon' => $id_pemohon,
                'alamat'    => $alamat,
                'kelurahan' => $kelurahan,
                'kecamatan' => $kecamatan,
                'telp' => $telp,
                'tgl_permohonan' => $tgl_permohonan,
            );
            $status = array(
                'kode' => $kode_permohonan,
                'status' => "MENUNGGU KONFIRMASI",
            );
            $this->bpnModel->insert_data($status,'statusdoc');
            $this->bpnModel->insert_data($data,'permohonan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('permohonan/permohonan');
    }

    public function updateData($id){
        $where = array('id_permohonan' => $id);
        $data['permohonan'] = $this->db->query("SELECT *,pemohon.alamat almtpm, permohonan.alamat almtpr FROM permohonan LEFT JOIN pemohon ON pemohon.id_pemohon = permohonan.id_pemohon where id_permohonan = '$id';")->result();
        $data['pemohon'] = $this->db->query("SELECT * FROM pemohon")->result();
        $data['title'] = 'permohonan';
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('permohonan/updateData',$data);
        $this->load->view('footer');
    }
    public function updateDataTerima($id){
        $data = array(
            'status' => "DITERIMA"
        );
        $where = array('kode' => $id);
        $this->bpnModel->update_data('statusdoc',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Diupdate!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('permohonan/permohonan');
    }
    public function updateDataTolak($id){
        $data = array(
            'status' => "DITOLAK"
        );
        $where = array('kode' => $id);
        $this->bpnModel->update_data('statusdoc',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Berhasil Diupdate!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>');
        redirect('permohonan/permohonan');
    }

    public function updateDataAksi(){
            $id_permohonan = $this->input->post('id_permohonan');
            $kode_permohonan = $this->input->post('kode_permohonan');
            $id_pemohon = $this->input->post('id_pemohon');
            $alamat = $this->input->post('alamat');
            $kelurahan = $this->input->post('kelurahan');
            $kecamatan = $this->input->post('kecamatan');
            $telp = $this->input->post('telp');
            $tgl_permohonan = $this->input->post('tgl_permohonan');
            $data = array(
                'kode_permohonan' => $kode_permohonan,
                'id_pemohon' => $id_pemohon,
                'alamat' => $alamat,
                'kelurahan' => $kelurahan,
                'kecamatan' => $kecamatan,
                'telp' => $telp,
                'tgl_permohonan' => $tgl_permohonan,
            );
            $where = array(
                'id_permohonan' => $id_permohonan
            );
            $this->bpnModel->update_data('permohonan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('permohonan/permohonan');
        }

    public function deleteData($id) {
        $where = array('kode_permohonan' => $id);
        $where1 = array('kode' => $id);
        $this->bpnModel->delete_data($where, 'permohonan');
        $this->bpnModel->delete_data($where1, 'statusdoc');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('permohonan/permohonan');
    }

    public function cetak(){
        $data['title'] = "Permohonan" ;
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('permohonan/cetak',$data);
        $this->load->view('footer');
    }

    public function print(){
        $data['title'] = 'Permohonan';
        $tgl1 = $this->input->post('tgl1');
		$data['tgl1'] = $this->input->post('tgl1');
        $data['liat']= $this->db->query("SELECT pr.kode_permohonan,p.nama_pemohon,pr.alamat,pr.kelurahan,pr.kecamatan,pr.tgl_pendaftaran,pr.tgl_permohonan,s.status from permohonan pr left join pemohon p on pr.id_pemohon = p.id_pemohon left join pengukuran pk on pk.kode_permohonan = pr.kode_permohonan left join statusdoc s on s.kode=pr.kode_permohonan where pr.tgl_pendaftaran = '$tgl1';")->result();
        $this->load->view('header',$data);
        $this->load->view('permohonan/report',$data);
    }

    public function print1(){
        $data['title'] = 'Permohonan';
        $tgl1 = $this->input->post('tgl1');
        $tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        $data['liat']= $this->db->query("SELECT pr.kode_permohonan,p.nama_pemohon,pr.alamat,pr.kelurahan,pr.kecamatan,pr.tgl_pendaftaran,pr.tgl_permohonan,s.status from permohonan pr left join pemohon p on pr.id_pemohon = p.id_pemohon left join pengukuran pk on pk.kode_permohonan = pr.kode_permohonan left join statusdoc s on s.kode=pr.kode_permohonan where pr.tgl_pendaftaran BETWEEN '$tgl1' AND '$tgl2';")->result();
        $this->load->view('header',$data);
        $this->load->view('permohonan/report1',$data);
    }
    public function print2(){
        $data['title'] = 'Permohonan';
        $data['liat']= $this->db->query("SELECT pr.kode_permohonan,p.nama_pemohon,pr.alamat,pr.kelurahan,pr.kecamatan,pr.tgl_pendaftaran,pr.tgl_permohonan,s.status from permohonan pr left join pemohon p on pr.id_pemohon = p.id_pemohon left join pengukuran pk on pk.kode_permohonan = pr.kode_permohonan left join statusdoc s on s.kode=pr.kode_permohonan;")->result();
        $this->load->view('header',$data);
        $this->load->view('permohonan/report2',$data);
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
