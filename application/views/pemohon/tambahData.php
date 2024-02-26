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
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('pemohon/pemohon/tambahDataAksi');?>">
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">NIK</label>
                  <input type="number" name="nik" class="form-control" required id="validationCustom01" placeholder="Masukkan NIK">
                  <div class="invalid-feedback">Harap Isi NIK.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Pemohon</label>
                  <input type="text" name="nama_pemohon" class="form-control" required id="validationCustom02" placeholder="Masukkan Nama Pemohon">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control"  required id="validationCustom04" name="tgl_lahir">
                  <div class="invalid-feedback">Harap Isi Tanggal Lahir.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Alamat</label>
                  <input type="text" class="form-control" for="Alamat" name="alamat" required id="validationCustom03" placeholder="Masukkan Alamat">
                  <div class="invalid-feedback">Harap Isi Alamat.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">No Telpon WA</label>
                  <input type="text" class="form-control" name="telp"  required id="validationCustom05" placeholder="Masukkan No WA">
                  <div class="invalid-feedback">Harap Isi No Telpon WA.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control" name="username"  required id="validationCustom07" placeholder="Masukkan Username">
                  <div class="invalid-feedback">Harap Isi Username.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password"  required id="validationCustom08" placeholder="Masukkan Password">
                  <input type="hidden" value="2" name="hak_akses" id="">
                  <div class="invalid-feedback">Harap Isi Password.</div>
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