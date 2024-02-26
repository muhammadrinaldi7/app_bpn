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
<?php if ($this->session->userdata('hak_akses')=='1'){?>
<section class="section dashboard">
	<div class="container-fluid">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Permohonan Pengukuran <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <?php foreach($permohonan as $p):  ?>
                      <?php endforeach; ?>
                      <h6><?= $p->juml ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title"> Jadwal Pengukuran <span>| Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <?php foreach($pengukuran as $d):  ?>
                      <?php endforeach; ?>
                      <h6><?= $d->juml ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Pengukuran Yang Telah Selesai </h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                    <?php foreach($hasil as $h):  ?>
                      <?php endforeach; ?>
                      <h6><?= $h->juml ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

  
          </div>
        </div><!-- End Left side columns -->
      </div>
	  </div>
</section>
<?php }else{ ?>
  <section class="section dashboard">
	<div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
      <div class="row">
         <div class="card">
          <div class="card-body">
            <h5 class="card-title">INFORMASI</h5>
              <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Permohonan</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pengukuran</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Hasil</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card-body">
                    <h5 class="card-title">Data Permohonan</h5>
                    <?php echo $this->session->flashdata('pesan')?> 
                    <table class="p-1 table table-striped dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns" id="table_id" width="100%">          
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode Permohonan</th>
                          <th>Lihat Data</th>
                          <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1; foreach($permohonan1 as $p) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->kode_permohonan ?></td>      
                        <td><button type="button" class="btn btn-outline-success lihat" id="show" data-id="<?= $p->id_permohonan?>" data-nama="<?= $p->nama_pemohon?>" data-alamat="<?= $p->alamat?>" data-kelurahan="<?= $p->kelurahan?>" data-kecamatan="<?= $p->kecamatan?>" data-telp="<?= $p->telp?>"  data-bs-toggle="modal" data-bs-target="#largeModal">Lihat <i class="bi bi-eye"></i></button></td>  
                        <td><?= $p->status ?></td>         
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="card-body">
                    <h5 class="card-title">Data Pengukuran</h5>
                    <?php echo $this->session->flashdata('pesan')?> 
                    <table class="p-1 table table-striped dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns" id="table_id1" width="100%">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode Pengukuran</th>
                          <th>Kode Permohonan</th>
                          <th>Detail</th>
                          <th>Tanggal Pengukuran</th>
                          <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($pengukuran1 as $p) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->kode_ukur ?></td>  
                        <td><?= $p->kode_permohonan ?></td>
                        <td><button type="button" class="btn btn-outline-success lihat" id="show" data-id="<?= $p->id_pengukuran?>" data-nama="<?= $p->nama_pemohon?>" data-alamat="<?= $p->alamat?>" data-kelurahan="<?= $p->kelurahan?>" data-kecamatan="<?= $p->kecamatan?>" data-telp="<?= $p->hp?>"  data-bs-toggle="modal" data-bs-target="#largeModal">Lihat <i class="bi bi-eye"></i></button></td>
                        <td><?= tgl_indo($p->tgl_pengukuran) ?></td>  
                        <td><?= $p->status ?></td>          
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="card-body">
                    <h5 class="card-title">Data Pengukuran</h5>
                    <?php echo $this->session->flashdata('pesan')?> 
                    <table class="p-1 table table-striped dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns" id="table_id2" width="100%">
                    <thead>
                      <tr>
                          <th>No</th>
                          <th>Kode Pengukuran</th>
                          <th>Kode Permohonan</th>
                          <th>Detail</th>
                          <th>Tanggal Pengukuran</th>
                          <th>Hasil</th>
                          <th>Status</th>
                          <th>Foto</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; foreach($pengukuran2 as $p) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $p->kode_ukur ?></td>  
                        <td><?= $p->kode_permohonan ?></td>  
                        <td><button type="button" class="btn btn-outline-success lihat" id="show" data-id="<?= $p->id_pengukuran?>" data-nama="<?= $p->nama_pemohon?>" data-alamat="<?= $p->alamat?>" data-kelurahan="<?= $p->kelurahan?>" data-kecamatan="<?= $p->kecamatan?>" data-telp="<?= $p->hp?>"  data-bs-toggle="modal" data-bs-target="#largeModal">Lihat <i class="bi bi-eye"></i></button></td> 
                        <td><?= tgl_indo($p->tgl_pengukuran) ?></td>     
                        <td><?= $p->hasil." <sup> M2</sup>" ?></td>
                        <td><?= $p->status ?></td>
                        <td><a type="button" class="btn btn-sm btn-primary" href="<?= base_url('Welcome/download/'.$p->nama_berkas);?>"><i class="bi bi-download"></i></a></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- End Default Tabs -->
          </div>
         </div>
         </div>
        </div>
	  </div>
</section>
<?php } ?>
  </main><!-- End #main -->
