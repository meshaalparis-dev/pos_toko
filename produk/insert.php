<?php 
include './aciont.php'; // Pastikan koneksi dan fungsi terpanggil
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body{ font-family:'DM Sans',sans-serif; background:#f5f5f5; padding:40px; }
        .container{ max-width:600px; margin:auto; }
        .card{ background:white; padding:25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1); }
        h2{ margin-bottom:20px; }
        .form-group{ margin-bottom:18px; }
        label{ display:block; margin-bottom:6px; font-weight:600; }
        input, select{ width:100%; padding:12px; border:1px solid #ccc; border-radius:8px; font-size:14px; box-sizing: border-box; }
        button{ background:black; color:white; border:none; padding:12px 20px; border-radius:8px; cursor:pointer; width: 100%; font-weight: bold; }
        button:hover{ opacity:0.8; }
        .btn-back { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; font-size: 14px; }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Tambah Produk</h2>

        <!-- PERBAIKAN 1: Tambahkan Action -->
        <form action="aciont.php?aksi=insert" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text" name="nama_product" required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" required>
            </div>

            <div class="form-group">
                <label>deskripsi</label>
                <input type="text" name="deskripsi" required>
            </div>

            <div class="form-group">
                <label>image</label>
                <input type="file" name="image"  required>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="category_id" required>
                    <option value="">Pilih Kategori</option>
                    <?php
                    // PERBAIKAN 2: Ambil semua data kategori dari tabel kategori
                    $query_cat = mysqli_query($conn, "SELECT * FROM category");
                    while ($cat = mysqli_fetch_assoc($query_cat)) :
                    ?>
                        <!-- Sesuaikan nama kolom ID dan Nama Kategori dengan tabel anda -->

<option value="<?= $cat['id'] ?>">
    <?= htmlspecialchars($cat['nama_category'] ?? $cat['nama_produk'] ?? 'makanan') ?>
    
</option>                    <?php endwhile; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Stok Produk</label>
                <input type="number" name="stok" required>
            </div>

            <button type="submit">
                Simpan Produk
            </button>
            
            <a href="index.php" class="btn-back">Batal & Kembali</a>
        </form>
    </div>
</div>

</body>
</html>