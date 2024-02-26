<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class=" d-flex align-items-center w-auto">
                  <img src="assets/img/bpnlogo.png" class="p-2 " height="120px" alt="">
                  <span class="d-none d-lg-block" style="color:orange">Kementerian Agraria dan Tata Ruang <br> Badan Pertanahan Nasional
                  </span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small">Masukkan Username dan Password</p>
                  </div>
                  <?= $this->session->flashdata('pesan') ?>
                  <form class="row g-3 needs-validation" method="POST" action="<?php echo base_url('Login'); ?>" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                        <?= form_error('username','<div class="text-small text-danger"></div>') ?>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                      <?= form_error('password','<div class="text-small text-danger"></div>') ?>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form> <br>
                   <!-- Large Modal -->
              <a href=""  data-bs-toggle="modal" data-bs-target="#largeModal">
                Lupa Password ?
              </a>

              
                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="#">Vitra</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
  <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Large Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <!-- Horizontal Form -->
              <form action="<?php echo base_url('User/User/resetPassword');?>" method="POST">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">NIK</label>
                  <div class="col-sm-10">
                    <input type="number" name="nik" class="form-control" id="inputEmail">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Password Baru</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword">
                  </div>
                </div>
             <!-- End Horizontal Form -->
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Large Modal-->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>assets/js/main.js"></script>
  <script src="<?php echo base_url();?>assets/vendor/dataTables/js/jquery-3.6.0.js"></script>
<script src="<?php echo base_url();?>assets/vendor/dataTables/js/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
  </script>
</body>

</html>