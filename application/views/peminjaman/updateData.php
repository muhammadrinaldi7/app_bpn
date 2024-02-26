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
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Data <?= $title ?></h5>
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('peminjaman/peminjaman/updateDataAksi');?>">
          <?php foreach($peminjaman as $p): ?>
          <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Alat</label>
                  <input type="hidden" value="<?php echo $p->id_peminjaman?>" name="id_peminjaman" id="">
                  <input type="text" readonly value="<?= $p->kode_alat ?>" name="kode_alat" class="form-control">
                  <div class="invalid-feedback">Harap Isi Alat.</div>
                </div>
                </div>
                
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Alat</label>
                  <input type="text" readonly value="<?= $p->nama_alat ?>" class="form-control">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Peminjam</label>
                  <input type="hidden" name="id_pegawai" value="<?= $p->id_pegawai?>" id="">
                  <input type="text" readonly value="<?= $p->nama_pegawai ?>" class="form-control">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label class="form-label">Penanggung Jawab</label>
                    <input type="input" class="form-control" value="<?= $p->penanggung_jawab ?>" name="penanggung_jawab" id="">
                  </div>
                </div>
                <div class="row mb-3">
                <div class="col-sm-6">
                  <label class="form-label">Waktu Pengembalian</label>
                  <input type="time" class="form-control" name="jam_kembali" id="">
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Tanggal Pengembalian</label>
                  <input type="date" class="form-control" name="tgl_kembali" id="">
                </div>
                </div><div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="button" class="btn btn-warning" onclick="history.back(-1)">Kembali</button>
                </div>
              <?php endforeach; ?>
              </form><!-- Vertical Form -->
        </div>
      </div>

    </div>

  </div>
</section>

</main><!-- End #main -->