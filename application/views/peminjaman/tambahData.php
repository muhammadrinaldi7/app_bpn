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
          <h5 class="card-title">Tambah Data <?= $title ?></h5>
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('peminjaman/peminjaman/tambahDataAksi');?>">
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Alat</label>
                  <select name="kode_alat" class="form-control">
                    <option value="" selected disabled>--Pilih Alat--</option>
                    <?php foreach($alat as $k):?>
                      <option value="<?= $k->kode_alat ?>"><?= $k->nama_alat ?></option>
                    <?php endforeach;?>
                  </select>
                  <div class="invalid-feedback">Harap Isi Alat.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Peminjam</label>
                  <select name="id_pegawai" class="form-control">
                    <option value="" disabled selected>--Nama Peminjam--</option>  
                    <?php foreach ($pegawai as $p):?>
                    <option value="<?= $p->id_pegawai ?>"><?= $p->nama_pegawai ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-12">
                    <label class="form-label">Penanggung Jawab</label>
                    <input type="input" class="form-control" placeholder="Nama Penanggung Jawab" name="penanggung_jawab" id="">
                  </div>
                </div>
                <div class="row mb-3 mt-2">
                <div class="col-sm-6">
                  <label class="form-label">Waktu Peminjaman</label>
                  <input type="time" class="form-control" name="jam_diambil" id="">
                </div>
                <div class="col-sm-6">
                  <label class="form-label">Tanggal Peminjaman</label>
                  <input type="date" class="form-control" name="tgl_dipinjam" id="">
                </div>
                </div>
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="button" class="btn btn-warning" onclick="history.back(-1)">Kembali</button>
                  </div>
              </form><!-- Vertical Form -->
        </div>
      </div>

    </div>

  </div>
</section>

</main><!-- End #main -->