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
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('permohonan/permohonan/updateDataAksi');?>">
          <?php foreach($permohonan as $p) : ?>
            <?php endforeach; ?>
          <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Permohonan</label>
                  <input type="hidden" value="<?= $p->id_permohonan ?>" name="id_permohonan" id="">
                  <input type="text" name="kode_permohonan" value="<?= $p->kode_permohonan ?>" readonly class="form-control" required id="validationCustom02" placeholder="Masukkan Kode Permohonan">
                  <div class="invalid-feedback">Harap Isi Kode.</div>
                </div>
                </div>
                <?php if($this->session->userdata('hak_akses') == '1'){?>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Pemohon</label>
                  <select name="id_pemohon" class="form-control">
                    <option value="<?= $p->id_pemohon ?>" selected disabled><?= $p->nama_pemohon ?></option>
                     <?php foreach ($pemohon as $pr): ?>
                    <option value="<?= $pr->id_pemohon ?>"><?= $pr->nama_pemohon ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <?php }else{ ?>
                  <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Pemohon</label>
                  <input type="hidden" name="id_pemohon" id="" value="<?= $p->id_pemohon ?>">
                  <input disabled type="text" class="form-control" name="" id="" value="<?= $p->nama_pemohon ?>">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Alamat</label>
                  <input type="text" class="form-control" value="<?= $p->almtpr ?>" for="Alamat" name="alamat" required id="validationCustom03" placeholder="Masukkan Alamat">
                  <div class="invalid-feedback">Harap Isi Alamat.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kelurahan</label>
                  <input type="text" class="form-control"  for="Kelurahan" value="<?= $p->kelurahan ?>" name="kelurahan" required id="validationCustom03" placeholder="Masukkan Kelurahan">
                  <div class="invalid-feedback">Harap Isi Kelurahan.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" for="Kecamatan" name="kecamatan" value="<?= $p->kecamatan ?>" required id="validationCustom03" placeholder="Masukkan Kecamatan">
                  <div class="invalid-feedback">Harap Isi Kecamatan.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">No Telpon WA</label>
                  <input type="text" class="form-control" name="telp" value="<?= $p->telp ?>" required id="validationCustom05" placeholder="Masukkan No WA">
                  <div class="invalid-feedback">Harap Isi No Telpon WA.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Tanggal Permohanan Pengukuran</label>
                  <input type="date" class="form-control" value="<?= $p->tgl_permohonan ?>" required id="validationCustom04" name="tgl_permohonan">
                  <div class="invalid-feedback">Harap Isi Tanggal Lahir.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <input type="hidden" name="status"  value="<?php echo "MENUNGGU KONFIRMASI"; ?>" id="">
                </div>
                </div>
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <button type="button" class="btn btn-warning" onclick="history.back(-1)">Kembali</button>
                </div>
                <?php } ?>
              </form><!-- Vertical Form -->
        </div>
      </div>

    </div>

  </div>
</section>

</main><!-- End #main -->