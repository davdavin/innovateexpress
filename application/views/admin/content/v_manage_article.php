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
                        <li class="breadcrumb-item active">Artikel</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php $this->load->view('templates/message.php'); ?>

        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Artikel</h3>
                </div>

                <div class="card-body">
                    <a href="<?php echo base_url() . 'managekonten/addarticle' ?>"><button type="button" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah
                        </button></a><br><br>

                    <table id="tabel_artikel" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Deskripsi Singkat</th>
                                <th>Tanggal Pembuatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
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

        $('#tabel_artikel').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            ajax: {
                url: "<?php echo base_url() . 'managekonten/showa' ?>",
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
                    "data": "title"
                },
                {
                    "data": "deskripsi_singkat"
                },
                {
                    "data": "created_at"
                },
                {
                    data: null,
                    name: null,
                    render: function(data, type, row, meta) {
                        switch (row.status) {
                            case "DITERBITKAN":
                                return `<span class="badge badge-success">PUBLISH</span>`;
                                break;
                            default:
                                return `<span class="badge badge-danger">UNPUBLISH</span>`;
                                break;
                        }
                    }
                },
                {
                    data: null,
                    name: null,
                    sortable: false,
                    render: function(data, type, row, meta) {
                        return `<a class="btn btn-info btn-sm"  href="<?php echo base_url() . 'managekonten/editarticle/' ?>${row.id}">
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

    });
</script>

</body>

</html>