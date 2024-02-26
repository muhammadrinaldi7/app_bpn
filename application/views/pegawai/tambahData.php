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
                  <label class="form-label">Nama Pegawai</label>
                  <input type="text" name="nama_pegawai" class="form-control" required id="validationCustom02" placeholder="Masukkan Nama Pegawai">
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
                <div class="col-sm-12">
                  <label class="form-label">No Telpon WA</label>
                  <input type="text" class="form-control" name="telp"  required id="validationCustom05" placeholder="Masukkan No WA">
                  <div class="invalid-feedback">Harap Isi No Telpon WA.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Bidang</label>
                  <select name="divisi" class="form-control"  required id="validationCustom06">
                    <option value="" disabled selected>--Pilih Bidang--</option>
                    <option value="Petugas Kantor">Petugas Kantor</option>
                    <option value="Petugas Pengukuran">Petugas Pengukuran</option>
                  </select>
                  <div class="invalid-feedback">Harap Pilih Bidang.</div>
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