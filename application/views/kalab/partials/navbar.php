<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active">
                <a href="index.html"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>
            <li class="menu-title">Manajemen</li><!-- /.menu-title -->
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Pengguna</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-id-badge"></i><a href="<?php echo site_url('Kalab_controller/?page=laboran'); ?>">Laboran</a></li>
                    <li><i class="fa fa-puzzle-piece"></i><a href="<?php echo site_url('Laboran_controller/?page=praktikan'); ?>">Praktikan</a></li>
                    <li><i class="fa fa-id-badge"></i><a href="<?php echo site_url('Laboran_controller/?page=asisten'); ?>">Asisten</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Praktikum</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="fa fa-table"></i><a href="<?php echo site_url('Laboran_controller/?page=jadwal'); ?>">Jadwal</a></li>
                    <li><i class="fa fa-table"></i><a href="<?php echo site_url('Laboran_controller/?page=matkul'); ?>">Mata Kuliah</a></li>
                    <li><i class="fa fa-th"></i><a href="<?php echo site_url('Laboran_controller/?page=modul'); ?>">Modul</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Pencetakan</a>
                <ul class="sub-menu children dropdown-menu">
                    <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Cetak Sertifikat</a></li>
                    <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Cetak Surat Bebas Lab</a></li>
                </ul>
            </li>

            <li class="menu-title">Option</li><!-- /.menu-title -->

            <li>
                <a href="<?php echo site_url('Laboran_controller/?page=setting'); ?>"> <i class="menu-icon ti-email"></i>Pengaturan </a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>