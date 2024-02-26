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
          <h5 class="card-title">Data <?= $title ?></h5>
          <?php echo $this->session->flashdata('pesan')?> 
          <table class="p-1 table table-striped dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns" id="table_id" width="100%">
          <div class="float-end mb-4">
			    <a href="<?= base_url('peminjaman/peminjaman/tambahData');?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i></i>&nbsp;&nbsp;Tambah</a>			
			    </div>
          <thead>
            <tr>
                <th>No</th>
                <th>Kode Alat</th>
                <th>Nama Peminjam</th>
                <th>Jam dan Tanggal Dipinjam</th>
                <th>Jam dan Tanggal Kembali</th>
                <th>Penanggung Jawab</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($peminjaman as $p) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $p->kode_alat ?></td>
              <td><?= $p->nama_pegawai ?></td>    
              <td><?= "$p->jam_diambil /".tgl_indo($p->tgl_dipinjam) ?></td>        
              <td><?= "$p->jam_kembali /".tgl_indo( $p->tgl_kembali) ?></td>
              <td><?= $p->penanggung_jawab ?></td>
              <td>
                <a href="<?php echo base_url('peminjaman/peminjaman/updateData/'.$p->id_peminjaman);?>" class="btn btn-sm btn-primary"><i class="bi bi-reply-fill"></i></a>
              <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ?')" href="<?php echo base_url('peminjaman/peminjaman/deleteData/'.$p->id_peminjaman);?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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