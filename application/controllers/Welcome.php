<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('bpnModel');
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
		$nik = $this->session->userdata('nik');
		$data['cek'] = $this->db->query("SELECT * From statusdoc ")->result();
        //$data['permohonan'] = $this->bpnModel->get_data('permohonan')->result();
        $data['permohonan'] = $this->db->query(
            "SELECT pr.*,p.nama_pemohon,s.status FROM permohonan pr LEFT JOIN pemohon p ON pr.id_pemohon = p.id_pemohon LEFT JOIN statusdoc s ON pr.kode_permohonan = s.kode")->result();
            $data['permohonan1'] = $this->db->query(
                "SELECT pr.*,p.nama_pemohon,s.status FROM permohonan pr LEFT JOIN pemohon p ON pr.id_pemohon = p.id_pemohon LEFT JOIN statusdoc s ON pr.kode_permohonan = s.kode where p.nik ='$nik' ")->result();
				$data['title'] = "Pengukuran" ;
				//$data['pengukuran'] = $this->bpnModel->get_data('pengukuran')->result();
				$data['pengukuran1'] = $this->db->query(
					"SELECT pk.id_pengukuran,pk.kode_ukur,pr.kode_permohonan,pr.alamat,pr.kelurahan,pr.kecamatan,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran, s.status FROM pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai Left Join statusdoc s on s.kode = pk.kode_ukur where p.nik ='$nik';")->result();
		$data['pengukuran2'] = $this->db->query(
						"SELECT pk.id_pengukuran,pk.kode_ukur,pr.kode_permohonan,pr.alamat,pr.kelurahan,pr.kecamatan,p.telp as hp,p.nama_pemohon,pg.nama_pegawai,pg.telp,pk.tgl_pengukuran,s.status,(h.panjang*h.lebar) hasil,h.nama_berkas FROM pengukuran pk left join permohonan pr on pr.kode_permohonan = pk.kode_permohonan left join pemohon p on p.id_pemohon = pk.id_pemohon left join pegawai pg on pg.id_pegawai = pk.id_pegawai LEFT JOIN hasil h on h.kode_ukur = pk.kode_ukur Left Join statusdoc s on s.kode = h.kode_hasil where p.nik ='$nik' ;")->result();
		
		$data['title']="Dashboard";
		$data['permohonan'] = $this->db->query("SELECT COUNT(*) as juml FROM `permohonan` Where tgl_pendaftaran = CURDATE()")->result();
		$data['pengukuran'] = $this->db->query("SELECT COUNT(*) as juml FROM `pengukuran` Where tgl_pengukuran = CURDATE()")->result();
		$data['hasil'] = $this->db->query("SELECT COUNT(*) juml FROM `hasil` LEFT JOIN statusdoc ON hasil.kode_hasil = statusdoc.kode;")->result();
		$this->load->view('header',$data);
		$this->load->view('navbar');
		$this->load->view('welcome',$data);
		$this->load->view('footer');

	}
	public function download($id)
	{
		$data = $this->db->get_where('hasil',['nama_berkas'=>$id])->row();
		force_download('./assets/uploads/'.$data->nama_berkas,NULL);
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

