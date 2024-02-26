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
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('pengukuran/pengukuran/updateDataAksi');?>">
          <?php foreach($pengukuran as $pk): ?>
          <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Pengukuran</label>
                  <input type="hidden" class="form-control" name="id_pengukuran" value="<?= $pk->id_pengukuran ?>" id="">
                  <input type="text" class="form-control" readonly name="kode_ukur" value="<?= $pk->kode_ukur ?>" id="">
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Permohonan</label>
                  <select name="kode_permohonan" class="form-control">
                    <option value="<?= $pk->kode_permohonan ?>" selected><?= $pk->kode_permohonan?></option>
                    <?php foreach ($permohonan as $pr): ?>
                    <option value="<?= $pr->kode_permohonan ?>"><?= $pr->kode_permohonan ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">Harap Isi Kode.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Pemohon</label>
                  <select name="id_pemohon" class="form-control">
                    <option value="<?= $pk->id_pemohon ?>" selected><?= $pk->nama_pemohon?></option>
                    <?php foreach ($pemohon as $p): ?>
                    <option value="<?= $p->id_pemohon ?>"><?= $p->nama_pemohon ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama pegawai</label>
                  <select name="id_pegawai" class="form-control">
                  <option value="<?= $pk->id_pegawai ?>" selected><?= $pk->nama_pegawai?></option>
                    <?php foreach ($pegawai as $p): ?>
                    <option value="<?= $p->id_pegawai ?>"><?= $p->nama_pegawai ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Tanggal Pengukuran</label>
                  <input type="date" class="form-control" value="<?= $pk->tgl_pengukuran ?>"  required id="validationCustom04" name="tgl_pengukuran">
                  <div class="invalid-feedback">Harap Isi Tanggal Pengukuran.</div>
                </div>
                </div>
                <?php endforeach; ?>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">Waktu Pengukuran</label>
                  <select class="form-control form-select" name="waktu" id="">
                      <option disabled selected value="<?= $pk->waktu ?>"><?= $pk->waktu ?></option>
                      <option value="PAGI">PAGI</option>
                      <option value="SIANG">SIANG</option>
                      <option value="SORE">SORE</option>
                  </select>
                  <div class="invalid-feedback">Harap Isi Tanggal Pengukuran.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">Status</label>
                  <input type="text" class="form-control" name="status" value="<?= $pk->status ?>" id="">
                </div>
                </div>
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Update</button>
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