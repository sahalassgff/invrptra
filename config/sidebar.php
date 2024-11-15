<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: linear-gradient(135deg, #6fb3f7, #e1f1fc); box-shadow: 2px 0 10px rgba(0, 0, 0, 0.15); transition: all 0.3s ease-in-out;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-white py-3" href="index.html" style="font-weight: 700; font-size: 1.2rem; transition: all 0.3s ease;">
        <div class="sidebar-brand-text mx-3">INVENTARIS RPTRA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" style="border-color: rgba(255, 255, 255, 0.3);">

    <!-- Nav Item - Beranda -->
    <li class="nav-item <?=isset($home)?'active':'';?>">
        <a class="nav-link text-white nav-link-animated" href="?#" style="display: flex; align-items: center; transition: all 0.3s ease;">
            <i class="fas fa-fw fa-home mr-2 icon-animated" style="color: #ffffffcc;"></i>
            <span>Beranda</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider" style="border-color: rgba(255, 255, 255, 0.3);">

    <!-- Heading -->
    <div class="sidebar-heading text-white" style="opacity: 0.85;">Menu</div>

    <?php if($_SESSION['level']=='admin'):?>

    <!-- Nav Item - Master -->
    <li class="nav-item <?=isset($master)?'active':'';?>">
        <a class="nav-link collapsed text-white nav-link-animated" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="master">
            <i class="fas fa-fw fa-folder mr-2 icon-animated"></i>
            <span>Master</span>
        </a>
        <div id="master" class="collapse <?=isset($master)?'show':'';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item text-dark <?=isset($merek)?'active':'';?>" href="?merek">Merek</a>
                <a class="collapse-item text-dark <?=isset($kategori)?'active':'';?>" href="?kategori">Kategori</a>
                <a class="collapse-item text-dark <?=isset($barang)?'active':'';?>" href="?barang">Barang</a>
                <a class="collapse-item text-dark <?=isset($pengguna)?'active':'';?>" href="?pengguna">Pengguna</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item <?=isset($transaksi)?'active':'';?>">
        <a class="nav-link collapsed text-white nav-link-animated" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
            <i class="fas fa-fw fa-folder mr-2 icon-animated"></i>
            <span>Transaksi</span>
        </a>
        <div id="transaksi" class="collapse <?=isset($transaksi)?'show':'';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item text-dark <?=isset($barang_masuk)?'active':'';?>" href="?barang_masuk">Barang Masuk</a>
                <a class="collapse-item text-dark <?=isset($barang_keluar)?'active':'';?>" href="?barang_keluar">Barang Keluar</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Laporan -->
    <li class="nav-item <?=isset($laporan)?'active':'';?>">
        <a class="nav-link collapsed text-white nav-link-animated" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
            <i class="fas fa-fw fa-folder mr-2 icon-animated"></i>
            <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse <?=isset($laporan)?'show':'';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item text-dark <?=isset($lap_barang_masuk)?'active':'';?>" href="?lap_barang_masuk">Laporan Barang Masuk</a>
                <a class="collapse-item text-dark <?=isset($lap_barang_keluar)?'active':'';?>" href="?lap_barang_keluar">Laporan Barang Keluar</a>
                <a class="collapse-item text-dark <?=isset($lap_barang_perkategori)?'active':'';?>" href="views/laporan/lap_barang_perkategori">Laporan Barang Area</a>
                <a class="collapse-item text-dark <?=isset($lap_stok_barang)?'active':'';?>" href="<?=base_url();?>process/lap_stok_barang.php" target="_blank">Laporan Stok Barang</a>
            </div>
        </div>
    </li>

    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" style="border-color: rgba(255, 255, 255, 0.3);">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: rgba(255, 255, 255, 0.6); transition: transform 0.2s ease-in-out;"></button>
    </div>

</ul>
<!-- End of Sidebar -->
