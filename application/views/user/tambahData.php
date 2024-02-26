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
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('pegawai/Pegawai/tambahDataAksi');?>">
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">NIK</label>
                  <input type="number" name="nik" class="form-control" required id="validationCustom01" placeholder="Masukkan NIK">
                  <div class="invalid-feedback">Harap Isi NIK.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Username</label>
                  <input type="text" name="username" class="form-control" required id="validationCustom02" placeholder="Masukkan Username">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control"  required id="validationCustom04" name="password">
                  <div class="invalid-feedback">Harap Isi Password.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Akses</label>
                  <select name="hak_akses" class="form-control"  required id="validationCustom06">
                    <option value="" disabled selected>--Pilih Akses--</option>
                    <option value="1">Pegawai</option>
                    <option value="2">Pemohon</option>
                  </select>
                  <div class="invalid-feedback">Harap Pilih Bidang.</div>
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