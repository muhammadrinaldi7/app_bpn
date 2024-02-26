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
          <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate action="<?php echo base_url('hasilpengukuran/hasilpengukuran/tambahDataAksi');?>">
          <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Hasil</label>
                  <input type="text" name="kode_hasil" value="<?= $kode ?>" readonly class="form-control" required id="validationCustom02" placeholder="Masukkan Kode Pengukuran">
                  <div class="invalid-feedback">Harap Isi Kode.</div>
                </div>
                </div>
          <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Pengukuran</label>
                  <select name="kode_ukur" class="form-control">
                    <?php foreach ($pengukuran as $p): ?>
                    <option value="<?= $p->kode_ukur ?>"><?= $p->kode_ukur ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Hasil Panjang</label>
                  <input type="number" class="form-control"  required id="validationCustom04" name="panjang">
                  <div class="invalid-feedback">Harap Isi Hasil Pengukuran.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Hasil Lebar</label>
                  <input type="number" class="form-control"  required id="validationCustom04" name="lebar">
                  <div class="invalid-feedback">Harap Isi Hasil Pengukuran.</div>
                </div>
                </div>
                <div class="form-group">
                      <label for="">Foto Bukti Pengukuran</label>
                      <input class="form-control" type="file" name="berkas" id="">
                    </div>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">Status</label>
                  <input type="text" class="form-control"  required id="validationCustom04" name="status">
                  <div class="invalid-feedback">Harap Isi Status.</div>
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