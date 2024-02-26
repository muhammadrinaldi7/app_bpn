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
            <h5 class="card-title">Cetak <?= $title ?></h5>

              <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Per Tanggal</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Seluruh</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
                <div class="col mb-2">
            <form target="_blank" action="<?= base_url('pengukuran/pengukuran/cetak_pengukuran') ?>" method="post">
                 <label for="">DARI TANGGAL</label><input type="date" name="tgl1" class="form-control" required autocomplete="off" /> 
            </div>
            <div class="col mb-2">
                <label for="">SAMPAI TANGGAL</label><input type="date" name="tgl2" class="form-control" required autocomplete="off" />
            </div>
            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" value="Filter"> 
                  <i class="bi bi-file-earmark-pdf"></i> Cetak Laporan</a>
            </button>
            </form>
            </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <a href="<?= base_url('peminjaman/peminjaman/cetak_peminjaman2') ?>" target="_blank" class="button btn btn-danger"><i class="bi bi-file-earmark-pdf-fill"></i>Cetak Laporan</a>
                </div>
              </div><!-- End Default Tabs -->

            </div>
      </div>
  </div>

</section>

</main>
</div>