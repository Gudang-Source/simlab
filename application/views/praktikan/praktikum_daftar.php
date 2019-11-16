<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <?php $data['page_title'] = 'Pendaftaran praktikum | SIMLAB'; ?>
    <?php $this->load->view('praktikan/partials/header', $data); ?>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <?php $this->load->view('praktikan/partials/navbar'); ?>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <?php $this->load->view('praktikan/partials/navbar2'); ?>
        </header>
        <!-- /#header -->
        <!-- breadcrumb -->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Pendaftaran Praktikum</h1>
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
                                <h4 class="box-title">Mata kuliah yang ditawarkan</h4>
                            </div>
                            <div class="card-body">
                                <?php echo form_open(); ?>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="serial">#</th>
                                            <th>Mata Kuliah</th>
                                            <th>Semester</th>
                                            <th>Pengampu</th>
                                            <th>Kelas</th>
                                            <th>Jam</th>
                                            <th>Hari</th>
                                            <th>Biaya Modul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; ?>

                                        <?php foreach ($praktikum->result() as $p) : ?>
                                            <tr class="text-center">
                                                <td class="serial"><?php echo $i += 1; ?></td>
                                                <td><?php echo $p->nama; ?></td>
                                                <td><?php echo $p->semester; ?></td>
                                                <td><?php echo $p->pengampu; ?></td>
                                                <td><?php echo $p->kelas; ?></td>
                                                <td><?php echo $p->sesi; ?></td>
                                                <td><?php echo $p->hari; ?></td>
                                                <td><?php echo $p->biaya_modul; ?></td>
                                                <td>
                                                    <div class="d-sm-flex justify-content-around">
                                                        <a href="<?php echo site_url("Praktikan_controller/tambahPendaftaran/?jdw=$p->id"); ?>" class="btn btn-outline-primary btn-sm">
                                                            <i class="fa fa-eye fa-lg" aria-hidden="true"></i>&nbsp; Daftar
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php echo form_close(); ?>
                            </div> <!-- /.table-stats -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-8 -->
                </div>
            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <?php $this->load->view('praktikan/partials/footer'); ?>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

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
</body>

</html>