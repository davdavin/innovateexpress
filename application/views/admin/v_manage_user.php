<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'admin/dashboard' ?>">User</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Untuk memunculkan message berhasil tambah dan ubah data-->
        <?php $this->load->view('templates/message.php'); ?>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel User</h3>
                </div>

                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                        <i class="fas fa-plus"></i> Tambah
                    </button><br><br>

                    <table id="tabel_user" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <?php $no = 0;
                    foreach ($user as $list_user) {
                        $no++; ?>
                        <!-- modal untuk menampilakn form edit -->
                        <div class="modal fade" id="modal-lg<?php echo $list_user->id; ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Edit User</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?php echo base_url() . 'User/proses_edit_user' ?>" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" class="form-control" name="id" value="<?= $list_user->id; ?>">
                                            <div class="form-group">
                                                <label>Level</label>
                                                <select class="custom-select select2bs4" style="width: 100%;" id="level" name="level">
                                                    <option selected disabled value>-- Pilih --</option>
                                                    <?php foreach ($levelUser as $list_level) {
                                                        if ($list_user->level == $list_level->level) { ?>
                                                            <option value="<?php echo $list_level->id_level_user ?>" <?php echo "selected"; ?>>
                                                                <?php echo $list_user->level ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $list_level->id_level_user ?>"><?php echo $list_level->level ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control select2bs4" style="width: 100%;" id="status" name="status" required>
                                                    <option selected disabled value>Status</option>
                                                    <?php if ($list_user->status == 1) { ?>
                                                        <option value="<?php echo $list_user->status ?>" <?php echo "selected"; ?>>
                                                            <?php echo 'Aktif'; ?>
                                                        </option>
                                                        <option value="0">Tidak Aktif</option>
                                                    <?php } ?>

                                                    <?php if ($list_user->status == 0) { ?>
                                                        <option value="1">Aktif</option>
                                                        <option value="<?php echo $list_user->status ?>" <?php echo "selected"; ?>>
                                                            <?php echo 'Tidak Aktif'; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
        <!-- modal untuk menampilkan form input user -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-submit" action="<?php echo base_url() . 'manageuser/add'  ?>" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                <div class="px-2 error_username clear" style="display: none">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <div class="px-2 error_password clear" style="display: none">
                                </div>
                            </div>

                            <!-- Posisi -->
                            <div class="form-group">
                                <label>Level</label>
                                <select class="custom-select select2bs4" style="width: 100%;" id="level" name="level">
                                    <option selected disabled value>-- Pilih --</option>
                                    <?php foreach ($levelUser as $list_level) { ?>
                                        <option value="<?php echo $list_level->id_level_user ?>"><?php echo $list_level->level ?></option>
                                    <?php } ?>
                                </select>
                                <!-- INFO ERROR -->
                                <div class="px-2 error_level clear" style="display: none">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary simpan">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
<!-- Select2 -->
<script src="<?php echo base_url(); ?>resources/back/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url(); ?>resources/back/plugins/sweetalert2/sweetalert2.min.js"></script>
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
<!-- bs-custom-file-input -->
<script src="<?php echo base_url(); ?>resources/back/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url(); ?>resources/back/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>resources/back/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(document).ready(function() {

        $('#tabel_user').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            ajax: {
                url: "<?php echo base_url() . 'ManageUser/tampil_user' ?>",
                dataSrc: ""
            },
            columns: [{
                    data: null,
                    name: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "username"
                },
                {
                    "data": "level"
                },
                {
                    data: null,
                    name: null,
                    render: function(data, type, row, meta) {
                        switch (row.status) {
                            case "1":
                                return `<span class="badge badge-success">Aktif</span>`;
                                break;
                            default:
                                return `<span class="badge badge-danger">Tidak Aktif</span>`;
                                break;
                        }
                    }
                },
                {
                    data: null,
                    name: null,
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg${row.id}">
                          <i class="fas fa-pencil-alt"></i> Edit
                        </a>`;
                    }
                }
            ]
        });
        $('[data-mask]').inputmask();

        const sukses = $('.sukses').data('flashdata');
        if (sukses) {
            Swal.fire({
                title: 'Sukses',
                text: sukses,
                icon: 'success'
            });
        }

        $('.form-submit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                dataType: "JSON",
                data: $(this).serialize(),
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
                        if (respon.error_pilih) {
                            $('.error_pilih').show();
                            $('.error_pilih').html(respon.error_pilih);
                            $('.error_pilih').css("color", "red");
                        } else {
                            $('.error_pilih').hide();
                        }
                        if (respon.error_username) {
                            $('.error_username').show();
                            $('.error_username').html(respon.error_username);
                            $('.error_username').css("color", "red");
                        } else {
                            $('.error_username').hide();
                        }
                        if (respon.error_password) {
                            $('.error_password').show();
                            $('.error_password').html(respon.error_password);
                            $('.error_password').css("color", "red");
                        } else {
                            $('.error_password').hide();
                        }
                        if (respon.error_level) {
                            $('.error_level').show();
                            $('.error_level').html(respon.error_level);
                            $('.error_level').css("color", "red");
                        } else {
                            $('.error_level').hide();
                        }

                    } else {
                        $('.clear').hide();
                        Swal.fire({
                            title: 'Success',
                            text: respon.sukses,
                            icon: 'success',
                        }).then((confirmed) => {
                            window.location.reload();
                        });
                    }

                }
            });
        });

        const gagal = $('.gagal').data('flashdata');

        if (gagal) {
            Swal.fire({
                title: 'Data User',
                text: gagal,
                icon: 'error'
            });
        }
    });
</script>

</body>

</html>