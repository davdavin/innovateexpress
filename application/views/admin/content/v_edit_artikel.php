<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Artikel</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() . 'managekonten/managea' ?>">Artikel</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Form Edit Artikel</h3>
      </div>
      <?php foreach ($artikel_edit as $detail) { ?>
        <form method="post" action="<?php echo base_url() . 'article_edit_process' ?>" class="submit-artikel" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $detail->id; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Judul Artikel</label>
              <input type="text" class="form-control" name="judul_artikel" value="<?= $detail->title; ?>" required>
              <div class="p-2 is-invalid error_judul clear" style="display: none">
              </div>
            </div>

            <div class="form-group">
              <label>Deskripsi Singkat</label>
              <textarea class="form-control" name="deskripsi_singkat"><?= $detail->deskripsi_singkat; ?></textarea>
              <div class="p-2 is-invalid error_deskripsi clear" style="display: none">
              </div>
            </div>

            <?php if ($detail->isi != NULL) { ?>
              <div class="form-group">
                <label>Isi</label>
                <textarea id="textArea" class="form-control" name="isi"><?= $detail->isi; ?></textarea>
              </div>

            <?php } ?>

            <!-- <?php /* if ($detail->file != NULL) { ?>
              <div class="form-group" id="file">
                <label for="exampleInputFile">File input</label><br>
                <label>File sekarang <a href="<?php echo base_url() . 'Artikel/baca_artikel/' . $detail->id_artikel ?>" target="_blank">
                    <?php echo $detail->file ?>
                  </a></label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="pdf">
                    <label class="custom-file-label" for="exampleInputFile">Pilih file (Maks size file 5 MB & format PDF)</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                <div class="p-2 is-invalid error_file clear" style="display: none">
                </div>
              </div>
            <?php } */ ?> -->

            <div class="form-group">
              <label>Status</label>
              <select class="custom-select select2bs4" style="width: 100%;" name="status">
                <option selected disabled value>-- Pilih --</option>
                <?php if ($detail->status == "DITERBITKAN") { ?>
                  <option value="<?php echo $detail->status ?>" <?php echo "selected"; ?>>
                    <?php echo $detail->status ?>
                  </option>
                  <option value="TIDAK DITERBITKAN">TIDAK DITERBITKAN</option>
                <?php } ?>
                <?php if ($detail->status == "TIDAK DITERBITKAN") { ?>
                  <option value="DITERBITKAN">DITERBITKAN</option>
                  <option value="<?php echo $detail->status ?>" <?php echo "selected"; ?>>
                    <?php echo $detail->status ?>
                  </option>
                <?php } ?>
              </select>
              <div class="p-2 is-invalid error_status clear" style="display: none">
              </div>
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary simpan">Ubah</button>
          </div>
        </form>
      <?php } ?>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>resources/back/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>resources/back/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>resources/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>resources/back/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>resources/back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>resources/back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>resources/back/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>resources/back/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>resources/back/dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>resources/back/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- tinymce -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>resources/tinymce/jquery.tinymce.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>resources/back/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
  $(function() {
    bsCustomFileInput.init();

    $('#tanggalPembuatan').datetimepicker({
      format: 'YYYY-MM-DD'
    });

    tinymce.init({
      selector: '#textArea',
      height: 500,
      // plugins: ['code'],
      plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
      menubar: 'file edit view insert format tools table help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile anchor codesample | ltr rtl',
      toolbar_sticky: true,
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });


    $('.submit-artikel').submit(function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Apakah anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'batal',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ubah Data'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            //  cache: false,
            processData: false,
            beforeSend: function() {
              $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
              $('.simpan').attr('disabled', 'disabled');
            },
            complete: function() {
              $('.simpan').removeAttr('disabled');
              $('.simpan').html('Ubah');
            },
            success: function(respon) {
              if (respon.sukses == false) {
                if (respon.error_judul) {
                  $('.error_judul').show();
                  $('.error_judul').html(respon.error_judul);
                  $('.error_judul').css("color", "red");
                } else {
                  $('.error_judul').hide();
                }
                if (respon.error_deskripsi) {
                  $('.error_deskripsi').show();
                  $('.error_deskripsi').html(respon.error_deskripsi);
                  $('.error_deskripsi').css("color", "red");
                } else {
                  $('.error_deskripsi').hide();
                }
                // if (respon.error_file) {
                //   $('.error_file').show();
                //   $('.error_file').html(respon.error_file);
                //   $('.error_file').css("color", "red");
                // } else {
                //   $('.error_file').hide();
                // }
                if (respon.error_status) {
                  $('.error_status').show();
                  $('.error_status').html(respon.error_status);
                  $('.error_status').css("color", "red");
                } else {
                  $('.error_status').hide();
                }

              } else {
                $('.clear').hide();
                Swal.fire({
                  title: 'Sukses',
                  text: respon.sukses,
                  icon: 'success'
                }).then((confirmed) => {
                  window.location.href = "<?php echo base_url() . 'managekonten/managea' ?>";
                });
              }
            }
          });
        }
      });
    });

  });
</script>
</body>

</html>