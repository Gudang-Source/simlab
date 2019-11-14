<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <?php
    $data['page_title'] = 'Pengaturan - SIMLAB';
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
                                <h1>Pengaturan</h1>
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
                            <div class="card-body">
                                <h4 class="box-title">Pendaftaran Praktikum</h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                        <h6 class="pb-4 display-5">Status pendaftaran</h6>
                                        <h6 class="pb-4 display-5">Tanggal pendaftaran dimulai</h6>
                                        <h6 class="pb-4 display-5">Tanggal pendaftaran berakhir</h6>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <?php foreach ($setting->result() as $s) { ?>
                                            <h6 class="pb-4 display-5"><?php echo $s->value; ?></h6>
                                        <?php } ?>
                                        <?php echo form_open('Laboran_controller/updateSetting'); ?>
                                        <div class="input-group date" data-provide="datepicker">
                                            <input type="text" class="form-control" name="mulai" placeholder="mm/dd/yyyy">
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar-o"></span>
                                            </div>
                                        </div>
                                        <div class="input-group date" data-provide="datepicker">
                                            <input type="text" class="form-control" name="akhir" placeholder="mm/dd/yyyy">
                                            <div class="input-group-addon">
                                                <span class="fa fa-calendar-o"></span>
                                            </div>
                                        </div>
                                        <input type="reset" class="btn btn-secondary" value="Reset">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                        <?php echo form_close(); ?>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
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
    <!-- modal tambah praktikan -->
    <div class="modal fade" id="tambahPraktikan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Tambah Praktikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Laboran_controller/tambahPraktikan'); ?>
                    <div class="form-group">
                        <label for="user-id" class="control-label mb-1">NIM</label>
                        <input id="user-id" name="id" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="user-nama" class="control-label mb-1">Nama</label>
                        <input id="user-nama" name="nama" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="user-prodi" class="control-label mb-1">Prodi</label>
                        <input id="user-prodi" name="prodi" type="text" class="form-control ">

                    </div>
                    <div class="form-group">
                        <label for="user-username" class="control-label mb-1">Username</label>
                        <input id="user-username" name="user" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="user-pass" class="control-label mb-1">Password</label>
                        <input id="user-pass" name="pass" type="password" class="form-control ">
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
    <!-- /.Modal tambah praktikan -->

    <!-- modal edit praktikan -->
    <div class="modal fade" id="editPraktikan" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Edit Praktikan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('Laboran_controller/editPraktikan'); ?>
                    <div class="form-group">
                        <label for="e-id" class="control-label mb-1">NIM</label>
                        <input id="e-id" name="id" type="text" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="e-nama" class="control-label mb-1">Nama</label>
                        <input id="e-nama" name="nama" type="text" class="form-control ">
                    </div>

                    <div class="form-group">
                        <label for="e-prodi" class="control-label mb-1">Prodi</label>
                        <input id="e-prodi" name="prodi" type="text" class="form-control ">
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
    <!-- /.Modal edit praktikan -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
            $("#editPraktikan").on("shown.bs.modal", function(event) {
                $("#e-id").attr("value", $(event.relatedTarget).data("id"));
                $("#e-nama").attr("value", $(event.relatedTarget).data("nama"));
                $("#e-prodi").attr("value", $(event.relatedTarget).data("prodi"));
            });
        });
    </script>
</body>

</html>