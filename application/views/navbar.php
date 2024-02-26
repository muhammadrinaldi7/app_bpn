<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url();?>" class="logo d-flex align-items-center">
        <img src="<?php echo base_url();?>assets/img/bpnlogo.png" alt="">
        <span class="d-none d-lg-block">ATR/BPN</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

          <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $this->session->userdata('username');?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <?php 
            $id = $this->session->userdata('nik');
            $cek = $this->db->query("SELECT user.id,user.username,user.password,user.hak_akses,(CASE WHEN user.hak_akses = '1' THEN pegawai.nama_pegawai ELSE pemohon.nama_pemohon END) as Nama FROM user LEFT JOIN pemohon on pemohon.nik = user.nik LEFT JOIN pegawai on pegawai.nik = user.nik where user.nik = '$id';")->result();
            foreach($cek as $n):
            endforeach;
          ?>  
          <li class="dropdown-header">
              <h6><?= $n->Nama ?></h6>
              <span><?php if($n->hak_akses=='1'){echo 'Admin';}else{echo 'Pemohon';} ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

  

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url('welcome');?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <?php if($this->session->userdata('hak_akses')=='1'){?>
      <!-- Forms -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url();?>pegawai/pegawai">
              <i class="bi bi-circle"></i><span>Form Pegawai</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url();?>alat/alat">
              <i class="bi bi-circle"></i><span>Form Alat</span>
            </a>
          </li>
          <li>
          <a href="<?= base_url();?>pemohon/pemohon">
              <i class="bi bi-circle"></i><span>Form Pemohon</span>
            </a>
          </li>
          <li>
          <a href="<?= base_url();?>User/User">
              <i class="bi bi-circle"></i><span>Form Pengguna</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
        <?php } ?>
        <?php if($this->session->userdata('hak_akses')=='1'){?>
      <!-- Transaksi -->
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
              <a href="<?= base_url('permohonan/permohonan');?>">
                  <i class="bi bi-circle"></i><span>Permohonan Pengukuran</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('peminjaman/peminjaman');?>">
                  <i class="bi bi-circle"></i><span>Peminjaman Alat</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('pengukuran/pengukuran');?>">
                  <i class="bi bi-circle"></i><span>Jadwal Pengukuran</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('hasilpengukuran/hasilpengukuran');?>">
                  <i class="bi bi-circle"></i><span>Hasil Pengukuran</span>
                </a>
              </li>
              
              
            </ul>
          </li><!-- End Tables Nav -->
          <?php }else{?>
            <!-- Transaksi -->
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
              <a href="<?= base_url('permohonan/permohonan');?>">
                  <i class="bi bi-circle"></i><span>Permohonan Pengukuran</span>
                </a>
              </li>
              <?php if($this->session->userdata('hak_akses')=='1'){?>
              <li>
                <a href="<?php echo base_url('pengukuran/pengukuran');?>">
                  <i class="bi bi-circle"></i><span>Jadwal Pengukuran</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('hasilpengukuran/hasilpengukuran');?>">
                  <i class="bi bi-circle"></i><span>Hasil Pengukuran</span>
                </a>
              </li>
              <?php } ?>
              
            </ul>
          </li><!-- End Tables Nav -->
          <?php } ?>

      <?php if($this->session->userdata('hak_akses')=='1'){?>
      <!-- Report -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-envelope-paper"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="<?php echo base_url('permohonan/permohonan/cetak');?>">
              <i class="bi bi-circle"></i><span>Permohonan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('pengukuran/pengukuran/cetakukur');?>">
              <i class="bi bi-circle"></i><span>Proses Pengukuran</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('hasilpengukuran/hasilpengukuran/cetakh');?>">
              <i class="bi bi-circle"></i><span>Hasil Pengukuran</span>
            </a>
          </li>
          <li>
          <li>
            <a href="<?php echo base_url('pegawai/pegawai/cetakhistory');?>">
              <i class="bi bi-circle"></i><span>History Kinerja Pengukuran</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('peminjaman/peminjaman/cetakpinjam');?>">
              <i class="bi bi-circle"></i><span>Peminjaman Alat</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->
      <?php } ?>
      <li class="nav-heading">Pages</li>

      <!-- Profile  
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>End Profile Page Nav -->

      <!-- Register 
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li>End Register Page Nav -->

      <!-- Logout -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('Login/logout')?>">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End Login Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
