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
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('alat/alat/updateDataAksi');?>">
                <div class="row mb-2">
                <?php foreach($alat as $p): ?>
                <div class="col-sm-12">
                  <label class="form-label">kode Alat</label>
                  <input type="hidden" name="id_alat" value="<?php echo $p->id_alat?>">
                  <input type="text" name="kode_alat" readonly class="disabled form-control" value="<?= $p->kode_alat ?>" required id="validationCustom01" >
                  <div class="invalid-feedback">Harap Isi kode alat.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama alat</label>
                  <input type="text" name="nama_alat" class="form-control" value="<?= $p->nama_alat ?>" required id="validationCustom02" placeholder="Masukkan Nama alat">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <?php endforeach; ?>
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