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
          <h5 class="card-title">Data Pengukuran</h5>
          <?php echo $this->session->flashdata('pesan')?> 
          <table class="p-1 table table-striped dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns" id="table_id" width="100%">
          <div class="float-end mb-4">
			    <a href="<?= base_url('hasilpengukuran/hasilpengukuran/tambahData');?>" class="btn btn-primary"><i class="bi bi-plus-circle"></i></i>&nbsp;&nbsp;Tambah</a>			
			    </div>
          <thead>
            <tr>
                <th>No</th>
                <th>Kode Pengukuran</th>
                <th>Kode Permohonan</th>
                <th>Detail</th>
                <th>Tanggal Pengukuran</th>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($pengukuran as $p) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $p->kode_ukur ?></td>  
              <td><?= $p->kode_permohonan ?></td>  
              <td><button type="button" class="btn btn-outline-success lihat" id="show" data-id="<?= $p->id_pengukuran?>" data-nama="<?= $p->nama_pemohon?>" data-alamat="<?= $p->alamat?>" data-kelurahan="<?= $p->kelurahan?>" data-kecamatan="<?= $p->kecamatan?>" data-telp="<?= $p->hp?>"  data-bs-toggle="modal" data-bs-target="#largeModal">Lihat <i class="bi bi-eye"></i></button></td> 
              <td><?= tgl_indo($p->tgl_pengukuran) ?></td>     
              <td><?= $p->panjang?></td>
              <td><?= $p->lebar?></td>
              <td><?= $p->status ?></td>
              <td>
              <a href="<?php echo base_url('hasilpengukuran/hasilpengukuran/updateData/'.$p->kode_ukur);?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a>
              <a href="<?php echo base_url('hasilpengukuran/hasilpengukuran/cetakHasil/'.$p->kode_ukur);?>" class="btn btn-sm btn-success"><i class="bi bi-printer"></i></a>
              <a onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ?')" href="<?php echo base_url('hasilpengukuran/hasilpengukuran/deleteData/'.$p->kode_hasil);?>" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
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