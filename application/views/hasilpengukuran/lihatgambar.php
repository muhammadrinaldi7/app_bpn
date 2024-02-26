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
      <?php foreach ($gmbr as $g):?>
      <?php endforeach; ?>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Lihat Gambar <?= $title ?></h5>
          <img src="./assets/uploads/'.<?= $g->nama_berkas ?>"  width='50%' height='50%' alt="">
        </div>
      </div>

    </div>

  </div>
</section>

</main><!-- End #main -->