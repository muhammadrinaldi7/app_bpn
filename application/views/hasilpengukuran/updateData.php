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
          <form enctype="multipart/form-data" method="post" class="needs-validation" novalidate action="<?php echo base_url('hasilpengukuran/hasilpengukuran/updateDataAksi');?>">
          <?php foreach($hasil as $pk) : ?>
            <?php endforeach; ?>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Hasil Pengukuran</label>
                  <input type="hidden" class="form-control"  value="<?= $pk->id_hasil ?>" id="">
                  <input type="text" class="form-control" readonly name="kode_hasil" value="<?= $pk->kode_hasil ?>" id="">
                </div>
              </div> 
              <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Pengukuran</label>
                  <input type="text" class="form-control" readonly name="kode_ukur" value="<?= $pk->kode_ukur ?>" id="">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-sm-6 mb-2">
                  <label class="form-label">Hasil Panjang</label>
                  <input type="number" class="form-control"  name="panjang" value="<?= $pk->panjang ?>" id=""> 
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-sm-6 mb-2">
                  <label class="form-label">Hasil Lebar</label>
                  <input type="number" class="form-control"  name="lebar" value="<?= $pk->lebar ?>" id=""> 
                </div>
              </div>
              <div class="row mb-2">
              <div class="form-group">
                      <label for="">Foto Bukti Pengukuran</label>
                      <!-- <pre> <i>(Kosongkan Apabila Tidak Merubah Foto)*</i> </pre> -->
                      <input type="hidden" value="<?= $pk->nama_berkas?>" name="berkas1" id="">
                      <input class="form-control" type="file" name="berkas">
                    </div>
              </div>
              <div class="row mb-2">
                <div class="col-sm-12 mb-3">
                  <label class="form-label">Status</label>
                  <input type="text" class="form-control"  name="status" value="" id="">
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