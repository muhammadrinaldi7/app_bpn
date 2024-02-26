<?php

class HasilPengukuran extends CI_Controller {

    public function index() {
        $data['title'] = "Hasil Pengukuran" ;
        //$data['pengukuran'] = $this->bpnModel->get_data('pengukuran')->result();
        $data['pengukuran'] = $this->db->query(
            "SELECT pk.id_pengukuran,pk.kode_ukur,pr.kode_permohonan,pr.alamat,pr.kelurahan,pr.kecamatan,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran,s.status,h.kode_hasil,h.panjang,h.lebar,h.nama_berkas,h.id_hasil FROM pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai LEFT JOIN hasil h on h.kode_ukur = pk.kode_ukur Left Join statusdoc s on s.kode = h.kode_hasil;")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('hasilpengukuran/hasilpengukuran',$data);
        $this->load->view('footer',$data);
    }

    public function cetakukur(){
        $data['title'] = "hasilpengukuran" ;
        $data['peminjaman'] = $this->db->query("select pm.id_peminjaman,pm.jam_diambil,pm.kode_alat,a.nama_alat,p.nama_pegawai,p.telp,pm.tgl_dipinjam,pm.tgl_kembali,pm.jam_kembali from peminjaman pm left join alat a on pm.kode_alat = a.kode_alat left join pegawai p on p.id_pegawai=pm.id_pegawai;")->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('hasilpengukuran/cetak',$data);
        $this->load->view('footer');
    }
    public function tambahData(){
        $data['title'] = "hasilpengukuran" ;
        $data['cekp'] = $this->db->query("SELECT permohonan.kode_permohonan,statusdoc.status from statusdoc,permohonan where kode_permohonan = kode and status = 'DITERIMA'")->result();
        $kode_hasilpengukuran = $this->db->query('SELECT max(kode_hasil) as kodeTerbesar From hasil')->row();
        $hasil = $kode_hasilpengukuran->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "HSL";
        $data['kode'] = $huruf.sprintf("%03s",$urutan); 
        $data['pemohon'] = $this->bpnModel->get_data('pemohon')->result();
        $data['permohonan'] = $this->db->query("SELECT permohonan.*,statusdoc.status from statusdoc,permohonan where kode_permohonan = kode and status = 'DITERIMA';")->result();
        $data['pegawai'] = $this->bpnModel->get_data('pegawai')->result();
        $data['pengukuran'] = $this->bpnModel->get_data('pengukuran')->result();
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('hasilpengukuran/tambahdata',$data);
        $this->load->view('footer');
    }
    public function lihatgambar($id){
        $data['title'] = "hasilpengukuran" ;
        $data['gmbr'] = $this->db->query("SELECT nama_berkas FROM `hasil` WHERE nama_berkas = '$id'")->result();        
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('hasilpengukuran/lihatgambar',$data);
        $this->load->view('footer');
    }

    public function download($id)
	{
		$data = $this->db->get_where('hasil',['nama_berkas'=>$id])->row();
		force_download('./assets/uploads/'.$data->nama_berkas,NULL);
	}

    public function tambahDataAksi(){
        $this->load->library('upload');
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'jpg|png|pdf|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['max_size']    = 0;
		$this->upload->initialize($config);
		if (!empty($_FILES['nama_berkas']['name'])) {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data Gagal Ditambahkan!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('hasilpengukuran/hasilpengukuran');
			} else {
				$this->upload->do_upload('berkas');
				$gbr = $this->upload->data();
				$dok = $gbr['file_name'];
            $kode_ukur = $this->input->post('kode_ukur');
            $kode_hasil = $this->input->post('kode_hasil');
            $panjang = $this->input->post('panjang');
            $lebar = $this->input->post('lebar');
            $status = $this->input->post('status');
            $data = array(
                'kode_ukur' => $kode_ukur,
                'kode_hasil' => $kode_hasil,
                'panjang' => $panjang,
                'lebar' => $lebar,
                'nama_berkas' => $dok
            );
            $where = array(
                'kode_ukur' => $kode_ukur
            );
            $data1 = array(
                'kode' => $kode_hasil,
                'status' => $status
            );
            $this->bpnModel->update_data('hasil',$data,$where);
            $this->bpnModel->insert_data($data1,'statusdoc');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Ditambahkan!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('hasilpengukuran/hasilpengukuran');
            }
    }

    public function updateData($id){
        $data['permohonan'] = $this->bpnModel->get_data('permohonan')->result();
        $data['hasil'] = $this->db->query("SELECT * From hasil where kode_ukur = '$id';")->result();
        $kode_hasilpengukuran = $this->db->query('SELECT max(kode_hasil) as kodeTerbesar From hasil')->row();
        $hasil = $kode_hasilpengukuran->kodeTerbesar;
        $urutan =(int)substr($hasil,3,3);
        $urutan++;
        $huruf = "HSL";
        $data['ambilkode'] = $huruf.sprintf("%03s",$urutan); 
        $data['cekkode'] = $this->db->query("SELECT kode_hasil cek from hasil where kode_ukur = '$id';")->num_rows();
        $data['title'] = 'Hasil Pengukuran';
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('hasilpengukuran/updateData',$data);
        $this->load->view('footer');
    }

    public function updateDataAksi(){
        $this->load->library('upload');
		$config['upload_path'] = './assets/uploads/';
		$config['allowed_types'] = 'jpg|png|pdf|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['max_size']    = 0;
		$this->upload->initialize($config);
		if (!empty($_FILES['berkas1']['name'])) {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data Gagal Ditambahkan!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>');
				redirect('hasilpengukuran/hasilpengukuran');
			} else {
                $id = $this->input->post('id_hasilpengukuran');
                $kode_ukur = $this->input->post('kode_ukur');
                $kode_hasil = $this->input->post('kode_hasil');
                $panjang = $this->input->post('panjang');
                $lebar = $this->input->post('lebar');
                $status = $this->input->post('status');
				$this->upload->do_upload('berkas');
				$gbr = $this->upload->data();
				$dok = $gbr['file_name'];
            
            $data = array(
                'kode_ukur' => $kode_ukur,
                'kode_hasil' => $kode_hasil,
                'panjang' => $panjang,
                'lebar' => $lebar,
                'nama_berkas' => $dok
            );
            $data1 = array(
                'kode'=>$kode_hasil,
                'status' => $status,
            );
            $where = array(
                'kode_ukur' => $kode_ukur
            );
            $where1 = array(
                'kode' => $kode_hasil
            );
            $this->bpnModel->update_data('hasil',$data,$where);
            $this->bpnModel->update_data('statusdoc',$data1,$where1);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Diupdate!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('hasilpengukuran/hasilpengukuran');
            }
        }

    public function deleteData($id) {
        $where = array('kode_hasil' => $id);
        $where1 = array('kode' => $id);
        $this->bpnModel->delete_data($where, 'hasil');
        $this->bpnModel->delete_data($where1, 'statusdoc');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil Dihapus!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('hasilpengukuran/hasilpengukuran');
    }

    public function cetakHasil($id){
        $data['x'] = $this->db->query("SELECT pn.*,p.*,pr.*,pm.nama_pemohon from pengukuran pn left join pegawai p on pn.id_pegawai = p.id_pegawai left join permohonan pr on pr.kode_permohonan = pn.kode_permohonan LEFT JOIN pemohon pm ON pm.id_pemohon = pn.id_pemohon where pn.id_pengukuran = '$id';")->result();
        $data['hasil'] = $this->db->query("SELECT permohonan.*,permohonan.alamat alamatpr,pemohon.*,pemohon.alamat alamatrumah,pengukuran.*,hasil.*,statusdoc.status,panjang*lebar as hasil,((panjang*lebar/500*80000)+100000) as biaya From pengukuran LEFT JOIN permohonan on permohonan.kode_permohonan = pengukuran.kode_permohonan LEFT JOIN pemohon on pemohon.id_pemohon = permohonan.id_pemohon LEFT JOIN hasil ON hasil.kode_ukur = pengukuran.kode_ukur LEFT JOIN statusdoc on statusdoc.kode = hasil.kode_hasil WHERE pengukuran.kode_ukur = '$id';")->result();
        $this->load->view('header',$data);
        $this->load->view('hasilpengukuran/report1',$data);
    }

    public function cetakHasilPengukuran(){
        $data['title'] = 'Hasil Pengukuran';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        $data['liat'] = $this->db->query("SELECT pk.id_pengukuran,pk.kode_ukur,pr.kode_permohonan,pr.alamat,pr.kelurahan,pr.kecamatan,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran,s.status,panjang*lebar as hasil,((panjang*lebar/500*80000)+100000) as biaya FROM pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai LEFT JOIN hasil h on h.kode_ukur = pk.kode_ukur Left Join statusdoc s on s.kode = h.kode_hasil where pk.tgl_pengukuran BETWEEN '$tgl1' AND '$tgl2';")->result();
        $this->load->view('header',$data);
        $this->load->view('hasilpengukuran/report',$data);
    }
    public function cetakHasilPengukuran1(){
        $data['title'] = 'Hasil Pengukuran';
        $data['liat'] = $this->db->query("SELECT pk.id_pengukuran,pk.kode_ukur,pr.kode_permohonan,pr.alamat,pr.kelurahan,pr.kecamatan,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran,s.status,panjang*lebar as hasil,((panjang*lebar/500*80000)+100000) as biaya FROM pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai LEFT JOIN hasil h on h.kode_ukur = pk.kode_ukur Left Join statusdoc s on s.kode = h.kode_hasil;")->result();
        $this->load->view('header',$data);
        $this->load->view('hasilpengukuran/report2',$data);
    }
    public function cetak_pengukuran(){
        
        $data['title'] = 'Pengukuran';
        $tgl1 = $this->input->post('tgl1');
		$tgl2 = $this->input->post('tgl2');
		$data['tgl1'] = $this->input->post('tgl1');
		$data['tgl2'] = $this->input->post('tgl2');
        //$data['liat']= $this->db->query('SELECT bahan_keluar.*,bahan.nama_bahan,outlet.nama_outlet,bahan_keluar.total from bahan_keluar left join bahan on bahan.id_bahan = bahan_keluar.id_bahan left join outlet on outlet.kode_outlet = bahan_keluar.kode_outlet ;')->result();
        $data['liat']= $this->db->query("SELECT pk.id_pengukuran,pk.kode_ukur,pr.kode_permohonan,pr.kelurahan,pr.kecamatan,pr.alamat,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran from pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai where date(pk.tgl_pengukuran) BETWEEN '$tgl1' AND '$tgl2';")->result();
        $this->load->view('header',$data);
        $this->load->view('pengukuran/report',$data);
    }
    public function cetakh(){
        $data['title'] = "Laporan Hasil Pengukuran" ;
        
        $this->load->view('header',$data);
        $this->load->view('navbar');
        $this->load->view('hasilpengukuran/cetakp',$data);
        $this->load->view('footer');
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
