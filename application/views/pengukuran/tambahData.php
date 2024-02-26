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
          <form method="post" class="needs-validation" novalidate action="<?php echo base_url('Pengukuran/Pengukuran/tambahDataAksi');?>">
          <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Pengukuran</label>
                  <input type="text" name="kode_ukur" value="<?= $kode ?>" readonly class="form-control" required id="validationCustom02" placeholder="Masukkan Kode Pengukuran">
                  <div class="invalid-feedback">Harap Isi Kode.</div>
                </div>
                </div>
          <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Kode Permohonan</label>
                  <select class="form-control form-select" name="kode_permohonan" onchange="changeValueKode(this.value)" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php
                                $jsArray1 = "var kodePermohonan = new Array();\n";
                                foreach($permohonan as $data):
                                    echo '<option value="'.$data->kode_permohonan.'">'.$data->kode_permohonan.'</option> ';
                                    $jsArray1 .= "kodePermohonan ['" . $data->kode_permohonan . "'] = {nama:'" . addslashes($data->nama_pemohon) . "',id:'" . addslashes($data->id_pemohon) . "'};\n";
                               endforeach;
                                ?>
                    </select>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama Pemohon</label>
                  <input type="hidden" name="id_pemohon" id="id">
                  <input type="text" name="" id="nama" readonly class="form-control">
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12">
                  <label class="form-label">Nama pegawai</label>
                  <select name="id_pegawai" class="form-control">
                    <?php foreach ($pegawai as $p): ?>
                    <option value="<?= $p->id_pegawai ?>"><?= $p->nama_pegawai ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">Harap Isi Nama.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">Tanggal Pengukuran</label>
                  <input type="date" class="form-control"  required id="validationCustom04" name="tgl_pengukuran">
                  <div class="invalid-feedback">Harap Isi Tanggal Pengukuran.</div>
                </div>
                </div>
                <div class="row mb-2">
                <div class="col-sm-12 mb-2">
                  <label class="form-label">Waktu Pengukuran</label>
                  <select class="form-control form-select" name="waktu" id="">
                      <option value="PAGI">PAGI</option>
                      <option value="SIANG">SIANG</option>
                      <option value="SORE">SORE</option>
                  </select>
                  <div class="invalid-feedback">Harap Isi Tanggal Pengukuran.</div>
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
<script type="text/javascript">    
    <?php echo $jsArray1; ?>  
    function changeValueKode(x){  
    document.getElementById('nama').value = kodePermohonan[x].nama;
    document.getElementById('id').value = kodePermohonan[x].id;
    }; 
    </script>