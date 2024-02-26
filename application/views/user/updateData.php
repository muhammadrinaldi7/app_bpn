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
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('user/user/updateDataAksi');?>">
                <div class="row mb-2">
                <?php foreach($User as $p): ?>
                <div class="col-sm-12">
                  <label class="form-label">Nama</label>
                  <input type="hidden" name="id" value="<?php echo $p->id?>">
                  <input type="hidden" name="nik" value="<?php echo $p->nik?>">
                  <input type="text" readonly class="form-control" value="<?= $p->Nama ?>" required id="validationCustom01" placeholder="Masukkan NIK">
                  <div class="invalid-feedback">Harap Isi NIK.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama user</label>
                  <input type="text" name="username" class="form-control" value="<?= $p->username ?>" required id="validationCustom02" placeholder="Masukkan Nama user">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" value="<?= $p->password ?>" required id="validationCustom04" name="password">
                  <div class="invalid-feedback">Harap Isi Password.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Akses</label>
                  <input type="hidden" value="<?= $p->hak_akses ?>" name="hak_akses" >
                  <input type="text" class="form-control" value="<?php if ($p->hak_akses == '1'){ 
                echo 'Pegawai';
              }else{ 
                echo 'Pemohon'; 
                } ?>" for="Alamat" required id="validationCustom03" placeholder="Masukkan Alamat">
                  <div class="invalid-feedback">Harap Isi Akses.</div>
                </div>
                </div>
                <?php endforeach; ?>
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