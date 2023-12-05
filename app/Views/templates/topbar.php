<style>
    .navbar-custom {
    background-color: white;
    }
    .navbar-center{ 
        position: absolute;
        left: 40%;
     }

</style>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light navbar-custom mb-4 shadow" >
            <h1 class="h4 mb-0 ml-2 "><img src="<?= base_url() ?>/img/logo.png" width="60%" ></h1>

          
            <!-- Topbar Navbar -->
            <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav navbar-center">
            
                <?php if ($nav_url == 'Siswa') : ?>
                    <li class="nav-item active">
                <?php else : ?>
                    <li class="nav-item ">
                <?php endif ?>
                        <a class="nav-link" href="<?= base_url('/siswa')?>"> 
                        <span class="font-weight-bold " >Siswa</span> </a>
                    </li>
                 <?php if ($nav_url == 'Kelas') : ?>
                    <li class="nav-item active">
                <?php else : ?>
                    <li class="nav-item ">
                <?php endif ?>
                        <a class="nav-link" href="<?= base_url('/kelas')?>">
                        <span class="font-weight-bold" >Kelas</span></a>
                    </li>
                <?php if ($nav_url == 'Manage') : ?>
                    <li class="nav-item active">
                <?php else : ?>
                    <li class="nav-item ">
                <?php endif ?>
                        <a class="nav-link " href="<?= base_url('/manage')?>">
                        <span class="font-weight-bold" >Setting Siswa</span></a>
                    </li>
            </ul>
            </div>
        </nav>
        <!-- End of Topbar -->