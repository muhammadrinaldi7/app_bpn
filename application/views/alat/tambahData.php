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
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('alat/alat/tambahDataAksi');?>">
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Alat</label>
                  <input type="text" name="kode_alat" value="<?= $kode ?>" readonly class="form-control" required id="validationCustom01">
                  <div class="invalid-feedback">Harap Isi Kode.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Alat</label>
                  <input type="text" name="nama_alat" class="mb-2 form-control" required id="validationCustom02" placeholder="Masukkan Nama alat">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->
        </div>
      </div>

    </div>

  </div>
</section>

</main><!-- End #main -->