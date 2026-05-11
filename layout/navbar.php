<?php
$halaman_aktif = basename(dirname($_SERVER['PHP_SELF']));
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
  <div class="container-fluid px-4">
    <a class="navbar-brand fw-bold text-warning" href="/pos_toko/transaksi/index.php">
      <i class="bi bi-shop me-2"></i>POS Toko
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center gap-1">
        <li class="nav-item">
          <a class="nav-link <?= $halaman_aktif=='transaksi' ? 'active fw-semibold' : '' ?>"
             href="/pos_toko/transaksi/index.php">
            <i class="bi bi-cart3 me-1"></i>Transaksi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $halaman_aktif=='produk' ? 'active fw-semibold' : '' ?>"
             href="/pos_toko/produk/index.php">
            <i class="bi bi-box-seam me-1"></i>Produk
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $halaman_aktif=='category' ? 'active fw-semibold' : '' ?>"
             href="/pos_toko/category/index.php">
            <i class="bi bi-tags me-1"></i>Kategori
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $halaman_aktif=='role' ? 'active fw-semibold' : '' ?>"
             href="/pos_toko/role/index.php">
            <i class="bi bi-shield-check me-1"></i>Role
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $halaman_aktif=='user' ? 'active fw-semibold' : '' ?>"
             href="/pos_toko/user/index.php">
            <i class="bi bi-people me-1"></i>User
          </a>
        </li>
        <li class="nav-item ms-2">
          <a class="btn btn-outline-warning btn-sm" href="/pos_toko/logout.php">
            <i class="bi bi-box-arrow-right me-1"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>