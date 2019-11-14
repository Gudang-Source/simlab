<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <?php
    $data['page_title'] = 'Kelola Mata Kuliah - SIMLAB';
    $this->load->view('laboran/partials/header', $data);
    ?>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <?php $this->load->view('laboran/partials/navbar'); ?>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <?php $this->load->view('laboran/partials/navbar2'); ?>
        </header>
        <!-- /#header -->
        <!-- breadcrumb -->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <button type="button" class="btn btn-success" style="margin:4.5pt" data-toggle="modal" data-target="#tambahMatkul">Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="box-title">Daftar Matkul </h4>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th>Nama</th>
                                            <th>Semester</th>
                                            <th>Prodi</th>
                                            <th>Pengampu</th>
                                            <th>Biaya Modul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        <?php foreach ($matkul->result() as $m) { ?>
                                            <tr>
                                                <td class="serial"><?php echo $i += 1; ?></td>
                                                <td><?php echo $m->nama; ?></td>
                                                <td><?php echo $m->semester; ?></td>
                                                <td><?php echo $m->prodi; ?></td>
                                                <td><?php echo $m->pengampu; ?></td>
                                                <td><?php echo $m->biaya_modul; ?></td>
                                                <td>
                                                    <div class="d-sm-flex justify-content-between"><a href="javascript:;" data-toggle="modal" data-target="#editMatkul" data-id="<?php echo $m->id; ?>" data-nama="<?php echo $m->nama; ?>" data-semester="<?php echo $m->semester; ?>" data-prodi="<?php echo $m->prodi; ?>" data-pengampu="<?php echo $m->pengampu; ?>" data-biaya="<?php echo $m->biaya_modul; ?>">
                                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="<?php echo site_url("Laboran_controller/hapusMatkul/$m->id"); ?>">
                                                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->
                </div>
            </div>
        </div><!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <?php $this->load->view('laboran/partials/footer'); ?>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    <!-- modal tambah matkul -->
    <div class="modal fade" id="tambahMatkul" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Tambah Matkul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Laboran_controller/tambahMatkul'); ?>
                    <div class="form-group">
                        <label for="matkul-id" class="control-label mb-1">Kode</label>
                        <input id="matkul-id" name="id" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="matkul-nama" class="control-label mb-1">Nama</label>
                        <input id="matkul-nama" name="nama" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="matkul-semester" class="control-label mb-1">Semester</label>
                        <input id="matkul-semester" name="semester" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="matkul-prodi" class="control-label mb-1">Prodi</label>
                        <input id="matkul-prodi" name="prodi" type="text" class="form-control ">

                    </div>
                    <div class="form-group">
                        <label for="matkul-pengampu" class="control-label mb-1">Pengampu</label>
                        <input id="matkul-pengampu" name="pengampu" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="matkul-biaya" class="control-label mb-1">Biaya Modul</label>
                        <input id="matkul-biaya" name="biaya" type="number" class="form-control ">
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Confirm</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.Modal tambah matkul -->

    <!-- modal edit matkul -->
    <div class="modal fade" id="editMatkul" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Matkul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Laboran_controller/editMatkul'); ?>
                    <div class="form-group">
                        <label for="e-id" class="control-label mb-1">Kode</label>
                        <input id="e-id" name="id" type="text" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="e-nama" class="control-label mb-1">Nama</label>
                        <input id="e-nama" name="nama" type="text" class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="e-semester" class="control-label mb-1">Semester</label>
                        <input id="e-semester" name="semester" type="number" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="e-prodi" class="control-label mb-1">Prodi</label>
                        <input id="e-prodi" name="prodi" type="text" class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="e-pengampu" class="control-label mb-1">Pengampu</label>
                        <input id="e-pengampu" name="pengampu" type="text" class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="e-biaya" class="control-label mb-1">Biaya Modul</label>
                        <input id="e-biaya" name="biaya" type="text" class="form-control ">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Confirm</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- /.Modal edit matkul -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
    <!-- Custom Script -->
    <script src="<?php echo base_url('assets/js/lib/data-table/datatables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.print.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/lib/data-table/buttons.colVis.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/init/datatables-init.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            $("#editMatkul").on("shown.bs.modal", function(event) {
                $("#e-id").attr("value", $(event.relatedTarget).data("id"));
                $("#e-nama").attr("value", $(event.relatedTarget).data("nama"));
                $("#e-semester").attr("value", $(event.relatedTarget).data("semester"));
                $("#e-prodi").attr("value", $(event.relatedTarget).data("prodi"));
                $("#e-pengampu").attr("value", $(event.relatedTarget).data("pengampu"));
                $("#e-biaya").attr("value", $(event.relatedTarget).data("biaya"));
            });
        });
    </script>
</body>

</html>