<?php
$halaman_aktif = basename(dirname($_SERVER['PHP_SELF']));
?>
<div class="sidebar bg-dark text-white d-flex flex-column p-3"
     style="width:240px; min-height:100vh; position:fixed; top:56px; left:0; z-index:100;">

  <div class="text-center mb-4 pt-2">
    <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-2"
         style="width:48px;height:48px;">
      <i class="bi bi-person-fill text-dark fs-4"></i>
    </div>
    <div class="small text-warning fw-semibold">
      <?= $_SESSION['nama'] ?? 'Admin' ?>
    </div>
    <div class="badge bg-secondary mt-1"><?= $_SESSION['role'] ?? 'Admin' ?></div>
  </div>

  <hr class="border-secondary">

  <nav class="nav flex-column gap-1">

    <span class="text-uppercase text-secondary small px-2 mb-1" style="font-size:.65rem;letter-spacing:.08em;">
      Utama
    </span>

    <a href="/pos_toko/transaksi/index.php"
       class="nav-link text-white rounded px-3 py-2 <?= $halaman_aktif=='transaksi' ? 'bg-warning text-dark fw-semibold' : 'hover-item' ?>">
      <i class="bi bi-cart3 me-2"></i>Transaksi
    </a>

    <span class="text-uppercase text-secondary small px-2 mt-3 mb-1" style="font-size:.65rem;letter-spacing:.08em;">
      Master Data
    </span>

    <a href="/pos_toko/produk/index.php"
       class="nav-link text-white rounded px-3 py-2 <?= $halaman_aktif=='produk' ? 'bg-warning text-dark fw-semibold' : '' ?>">
      <i class="bi bi-box-seam me-2"></i>Produk
    </a>
    <a href="/pos_toko/category/index.php"
       class="nav-link text-white rounded px-3 py-2 <?= $halaman_aktif=='category' ? 'bg-warning text-dark fw-semibold' : '' ?>">
      <i class="bi bi-tags me-2"></i>Kategori
    </a>

    <span class="text-uppercase text-secondary small px-2 mt-3 mb-1" style="font-size:.65rem;letter-spacing:.08em;">
      Pengaturan
    </span>

    <a href="/pos_toko/role/index.php"
       class="nav-link text-white rounded px-3 py-2 <?= $halaman_aktif=='role' ? 'bg-warning text-dark fw-semibold' : '' ?>">
      <i class="bi bi-shield-check me-2"></i>Role
    </a>
    <a href="/pos_toko/user/index.php"
       class="nav-link text-white rounded px-3 py-2 <?= $halaman_aktif=='user' ? 'bg-warning text-dark fw-semibold' : '' ?>">
      <i class="bi bi-people me-2"></i>User
    </a>

  </nav>

  <div class="mt-auto pt-3 border-top border-secondary">
    <a href="/pos_toko/logout.php" class="btn btn-outline-warning btn-sm w-100">
      <i class="bi bi-box-arrow-right me-1"></i>Logout
    </a>
  </div>
</div>

<style>
.nav-link:hover { background: rgba(255,193,7,.15) !important; }
</style>