
<!-- Basic Modal -->
              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">DATA PEMOHON</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pemohon</label>
                  <div class="col-sm-10">
                    <input disabled type="text" class="dark form-control" id="nama">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">No Telp Pemohon</label>
                  <div class="col-sm-10">
                    <input disabled type="text" class="dark form-control" id="telp">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input disabledEmail3" class="col-sm-2 col-form-label">Alamat Pemohon</label>
                  <div class="col-sm-10">
                    <input disabled type="email" class="form-control" id="alamat">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input disabledPassword3" class="col-sm-2 col-form-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="kecamatan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input disabledPassword3" class="col-sm-2 col-form-label">kelurahan</label>
                  <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="kelurahan">
                  </div>
                </div>
              </form><!-- End Horizontal Form -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <script>
   $(document).on('click', '.lihat', function(e) {
     document.getElementById("nama").value = $(this).attr('data-nama');
     document.getElementById("alamat").value = $(this).attr('data-alamat');
     document.getElementById("kecamatan").value = $(this).attr('data-kecamatan');
     document.getElementById("kelurahan").value = $(this).attr('data-kelurahan');
     document.getElementById("telp").value = $(this).attr('data-telp');
   });
 </script>
              <!-- End Basic Modal-->

              <div class="modal fade" id="largeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">DATA PEMOHON</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Pemohon</label>
                  <div class="col-sm-10">
                    <input disabled type="text" class="dark form-control" id="nama">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input disabledEmail3" class="col-sm-2 col-form-label">Alamat Pemohon</label>
                  <div class="col-sm-10">
                    <input disabled type="email" class="form-control" id="alamat">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input disabledPassword3" class="col-sm-2 col-form-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="kecamatan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="input disabledPassword3" class="col-sm-2 col-form-label">kelurahan</label>
                  <div class="col-sm-10">
                    <input disabled type="text" class="form-control" id="kelurahan">
                  </div>
                </div>
              </form><!-- End Horizontal Form -->
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <script>
   $(document).on('click', '.lihat', function(e) {
     document.getElementById("nama").value = $(this).attr('data-nama');
     document.getElementById("alamat").value = $(this).attr('data-alamat');
     document.getElementById("kecamatan").value = $(this).attr('data-kecamatan');
     document.getElementById("kelurahan").value = $(this).attr('data-kelurahan');
     document.getElementById("telp").value = $(this).attr('data-telp');
   });
 </script>
              <div class="modal fade" id="basicModal1" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Basic Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <img src="<?= base_url('uploads/'.$p) ; ?>" width='50%' height='50%'><br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            
 <!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <!-- konten modal-->
     <div class="modal-content">
       <!-- heading modal -->
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Bagian heading modal</h4>
       </div>
       <!-- body modal -->
       <div class="modal-body">
         <p>bagian body modal.</p>
       </div>
       <!-- footer modal -->
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
       </div>
     </div>
   </div>
 </div>
  <!-- ======= Footer ======= -->
  <footer  id="footer" class="footer">
    <div class="copyright" >
      &copy; Copyright <strong><span>ATR/BPN</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">Vitra</a>
    </div>
  </footer><!-- End Footer -->

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
  <script>
  $(document).ready( function () {
    $('#table_id1').DataTable();
  } );
  </script>
  <script>
  $(document).ready( function () {
    $('#table_id2').DataTable();
  } );
  </script>

<script>

$('#modaledit').on('show.bs.modal', function (event) {
    // event.relatedtarget menampilkan elemen mana yang digunakan saat diklik.
    var button              = $(event.relatedTarget)

    // data-data yang disimpan pada tombol edit dimasukkan ke dalam variabelnya masing-masing 
    var nama_barang         = button.data('nama_barang')
    var deskripsi_barang    = button.data('deskripsi_barang')
    var jenis_barang        = button.data('jenis_barang')
    var harga_barang        = button.data('harga_barang')
    var modal = $(this)

    //variabel di atas dimasukkan ke dalam element yang sesuai dengan idnya masing-masing
    modal.find('#nama_barang').val(nama_barang)
    modal.find('#deskripsi_barang').val(deskripsi_barang)
    modal.find('#jenis_barang').val(jenis_barang)
    modal.find('#harga_barang').val(harga_barang)
})
</script>

</body>

</html>