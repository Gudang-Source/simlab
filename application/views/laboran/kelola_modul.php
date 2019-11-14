<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <?php
    $data['page_title'] = 'Kelola Modul - SIMLAB';
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
                                <button type="button" class="btn btn-success" style="margin:4.5pt" data-toggle="modal" data-target="#tambahModul">Tambah</button>
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
                                <h4 class="box-title">Daftar Modul </h4>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="serial">#</th>
                                            <th>Mata Kuliah</th>
                                            <th>Nama File</th>
                                            <th>Pertemuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>
                                        <?php foreach ($modul->result() as $m) : ?>
                                            <tr class="text-center">
                                                <td class="serial"><?php echo $i += 1; ?></td>
                                                <td><?php echo $m->nama; ?></td>
                                                <td><?php echo $m->nama_file; ?></td>
                                                <td><?php echo $m->pertemuan; ?></td>
                                                <td>
                                                    <div class="d-sm-flex justify-content-around">
                                                        <a href="<?php echo base_url("uploads/modul/$m->nama_file"); ?>" class="btn btn-outline-primary btn-sm" target="_blank">
                                                            <i class="fa fa-eye fa-lg" aria-hidden="true"></i>&nbsp; Lihat
                                                        </a>
                                                        <a href="<?php echo site_url("Laboran_controller/hapusModul/$m->id"); ?>" class="btn btn-outline-danger btn-sm">
                                                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>&nbsp; Hapus
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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
    <!-- modal tambah modul -->
    <div class="modal fade" id="tambahModul" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Tambah Modul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('Laboran_controller/tambahModul'); ?>
                    <div class="form-group">
                        <label for="select" class="form-control-label">Mata Kuliah</label>
                        <select name="idmatkul" id="select" class="form-control">
                            <option value="">Please select</option>
                            <?php foreach ($matkul->result() as $ma) : ?>
                                <option value="<?php echo $ma->id; ?>"><?php echo $ma->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="modul-pertemuan" class="form-control-label">Pertemuan</label>
                        <input id="modul-pertemuan" name="pertemuan" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="modul-file" class="form-control-label">Upload Modul</label>
                        <input id="modul-file" name="modul" type="file" class="form-control-file">
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
    <!-- /.Modal tambah modul -->

    <!-- modal edit modul -->
    <div class="modal fade" id="editModul" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Modul</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Laboran_controller/editModul'); ?>
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
    <!-- /.Modal edit modul -->

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
            $("#editModul").on("shown.bs.modal", function(event) {
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