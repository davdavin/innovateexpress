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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'mengelola_artikel' ?>">Artikel</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary card-green">
            <div class="card-header">
                <h3 class="card-title">Tambah Artikel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="<?php echo base_url() . 'article_add_process' ?>" id="submit" class="submit-artikel" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control" id="title" name="title">
                        <div class="px-2 error_title clear" style="display: none">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi_singkat"></textarea>
                        <div class="px-2 error_deskripsi clear" style="display: none">
                        </div>
                    </div>

                    <!-- Tipe artikel -->
                    <!-- <div class="form-group">
                        <label>Tipe Artikel</label>
                        <select class="custom-select select2bs4" style="width: 100%;" name="tipe_artikel" id="tipe">
                            <option selected disabled value>-- Pilih --</option>
                            <option value="Renungan Harian">Renungan Harian</option>
                            <option value="Warta Jemaat">Warta Jemaat</option>
                            <option value="Doa Harian">Doa Harian</option>
                            <option value="Warta Jemaat">Artikel Lainnya</option>
                        </select>
                        <div class="px-2 error_tipe clear" style="display: none">
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label>Cover Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">Pilih foto (Maksimal 5MB)</label>
                            </div>
                        </div>
                        <div class="px-2 error_foto clear" style="display: none">
                        </div>
                    </div>

                    <div class="form-group" id="isi">
                        <label>Isi</label>
                        <textarea id="textArea" class="form-control" name="isi"></textarea>
                    </div>

                    <!-- <div class="form-group" id="file" style="display: none">
                        <label for="inputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputFile" name="pdf">
                                <label class="custom-file-label" for="inputFile">Pilih file (Maks size file 5 MB & format PDF)</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        <div class="px-2 error_file clear" style="display: none">
                        </div>
                    </div> -->


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-form bg-green simpan">Submit</button>
                </div>
            </form>
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
<script src="<?php echo base_url(); ?>jquery-3.4.1.min.js"></script>
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
<!-- Summernote -->
<script src="<?php echo base_url(); ?>resources/back/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>resources/back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>resources/back/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>resources/back/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>resources/back/dist/js/pages/dashboard.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>resources/back/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- ckeditor4 -->
<script src="<?php echo base_url(); ?>ckeditor4/ckeditor.js"></script>
<!-- tinymce -->
<script src="<?php echo base_url(); ?>resources/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url(); ?>resources/tinymce/jquery.tinymce.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>resources/back/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
    $(function() {
        bsCustomFileInput.init();

        // $('#tipe').change(function() {
        //     var target = $('#tipe option:selected').text();
        //     //  alert(target);
        //     if (target == "Warta Jemaat") {
        //         $("#isi").hide();
        //         tinymce.activeEditor.setContent('');
        //         $('#file').show();
        //         $('#inputFile').prop('disabled', false).show();

        //     } else {
        //         $('#isi').show();
        //         $('#file').hide();
        //         $('#inputFile').prop('disabled', true).hide();
        //     }
        // });

        //  CKEDITOR.replace('textArea');

        tinymce.init({
            selector: '#textArea',
            height: 500,
            // plugins: ['code'],
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media mediaembed codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap emoticons',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile anchor codesample | ltr rtl',
            toolbar_sticky: true,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

        $('.submit-artikel').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                dataType: 'JSON',
                data: new FormData(this),
                contentType: false,
                //cache: false,
                processData: false,
                beforeSend: function() {
                    $('.simpan').attr('disable', 'disabled');
                    $('.simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.simpan').removeAttr('disable');
                    $('.simpan').html('Submit');
                },
                success: function(respon) {
                    if (respon.sukses == false) {
                        if (respon.error_title) {
                            $('.error_title').show();
                            $('.error_title').html(respon.error_title);
                            $('.error_title').css("color", "red");
                        } else {
                            $('.error_title').hide();
                        }
                        // if (respon.error_tipe) {
                        //     $('.error_tipe').show();
                        //     $('.error_tipe').html(respon.error_tipe);
                        //     $('.error_tipe').css("color", "red");
                        // } else {
                        //     $('.error_tipe').hide();
                        // }
                        if (respon.error_deskripsi) {
                            $('.error_deskripsi').show();
                            $('.error_deskripsi').html(respon.error_deskripsi);
                            $('.error_deskripsi').css("color", "red");
                        } else {
                            $('.error_deskripsi').hide();
                        }

                        if (respon.error_foto) {
                            $('.error_foto').show();
                            $('.error_foto').html(respon.error_foto);
                            $('.error_foto').css("color", "red");
                        } else {
                            $('.error_foto').hide();
                        }

                        // if (respon.error_file) {
                        //     $('.error_file').show();
                        //     $('.error_file').html(respon.error_file);
                        //     $('.error_file').css("color", "red");
                        // } else {
                        //     $('.error_file').hide();
                        // }

                    } else {
                        $('.clear').hide();
                        $('#title').val('');
                        $('#deskripsi').val('');
                        tinymce.activeEditor.setContent('');
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
        });

    });
</script>
</body>

</html>