    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('welcome')?>">
          <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class=""></i> -->
          </div>
          <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0" />

        <!-- Nav Item - Beranda -->
        <li class="nav-item">
          <a class="nav-link active" href="<?= base_url('welcome')?>">
          <i class="fas fa-home"></i>
            <span>Beranda</span></a
          >
        </li>

        <!-- Awal sidebar -->
        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Pengunjung -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('welcome')?>/pengunjung">
          <i class="fas fa-users"></i>
            <span>Pengunjung</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Kunjungan -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('welcome')?>/kunjungan">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Kunjungan</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
          <i class="fas fa-user"></i>
            <span>Akun</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
          <i class="fas fa-calendar-alt"></i>
            <span>Laporan</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Log System</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
          <i class="fas fa-cog"></i>
            <span>Setting</span></a>
        </li>

        <hr class="sidebar-divider" />

        <li class="nav-item">
 			    <a class="nav-link" href="<?php echo base_url('index.php/autentikasi/logout'); ?>">
			  	<i class="fas fa-sign-out-alt"></i>
			     <span>Logout</span></a
  			>
	  	</li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" />

        <!-- akhir sidebar -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <!-- End of Sidebar -->