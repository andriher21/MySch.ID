<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() . '/produk' ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-shopping-bag"></i>
        </div>
        <div class="sidebar-brand-text mx-3">APP Pembelian</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

                    <?php if ($nav_url == 'Barang') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif ?>
                        <a class="nav-link" href=" <?= base_url('/barang')?>">
                            <i class="fas fa-cube"></i>
                            <span>Barang</span>
                        </a>
                        </li>
                        <?php if ($nav_url == 'Suplier') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif ?>
                        <a class="nav-link" href=" <?= base_url('/suplier')?>">
                            <i class="fas fa-shopping-basket"></i>
                            <span>Suplier</span>
                        </a>
                        </li>
                        <?php if ($nav_url == 'Pembelian') : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif ?>
                        <a class="nav-link" href=" <?= base_url('/pembelian')?>">
                            <i class="fas fa-shopping-cart"></i>
                            <span>Pembelian</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href=" <?= base_url('/logout')?>">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                        </li>
                <!-- Divider -->
                <hr class="sidebar-divider">
            

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>
<!-- End of Sidebar -->