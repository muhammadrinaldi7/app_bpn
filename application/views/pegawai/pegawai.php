
<main id="main" class="main">

<div class="pagetitle">
  <h1><?= $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active"><?= $title ?></li>
    </ol>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card" >
        <div class="card-body">
          <h5 class="card-title">Data Pegawai</h5>
          <?php echo $this->session->flashdata('pesan')?> 
          <table class="p-1 table table-striped dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns" id="table_id" width="100%">
          <div class="float-end mb-4">
			    <a href="<?= base_url('pegawai/Pegawai/tambahData');?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i></i>&nbsp;&nbsp;Tambah</a>			
			    </div><div class="float-start mb-4">
			    <a href="<?= base_url('pegawai/Pegawai/printpegawai');?>" target="_blank" class="btn btn-danger"><i class="bi bi-printer"></i></i>&nbsp;&nbsp;Cetak</a>			
			    </div>
          <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Telpon WA</th>
                <th>Bidang</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($pegawai as $p) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $p->nik ?></td>
              <td><?= $p->nama_pegawai ?></td>            
              <td><?= tgl_indo($p->tgl_lahir) ?></td>
              <td><?= $p->alamat ?></td>
              <td><?= $p->telp ?></td>
              <td><?= $p->divisi ?></td>
              <td><a href="<?php echo base_url('pegawai/Pegawai/updateData/'.$p->id_pegawai);?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
              <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ?')" href="<?php echo base_url('pegawai/Pegawai/deleteData/'.$p->id_pegawai);?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</section>

</main>
</div>