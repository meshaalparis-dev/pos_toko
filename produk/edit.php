<?php
include './aciont.php';
$data = showDataEditProduk($conn, $_GET['id']);


?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Produk</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
body { font-family:'DM Sans',sans-serif; background:#f5f5f5; padding:40px; }
.card { max-width:500px; margin:auto; background:white; padding:30px; border-radius:14px; box-shadow:0 3px 12px rgba(0,0,0,0.08); }
h2 { margin-bottom:25px; }
.form-group { margin-bottom:20px; }
label { display:block; margin-bottom:8px; font-weight:600; }
input, select { width:100%; padding:12px; border:1px solid #ccc; border-radius:8px; font-size:14px; box-sizing:border-box; }
button { background:black; color:white; border:none; padding:12px 18px; border-radius:8px; cursor:pointer; width:100%; font-weight:bold; }
button:hover { opacity:0.8; }
.btn-kembali { display:inline-block; margin-top:15px; text-decoration:none; color:black; }
</style>
</head>
<body>

<div class="card">
    <h2>Edit Produk</h2>

    
    <form method="POST" action="aciont.php?aksi=update" enctype="multipart/form-data">

        
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="form-group">
            <label>Nama Produk</label>
            <input
                type="text"
                name="nama"                            
                placeholder="Masukkan nama produk"
                value="<?= htmlspecialchars($data['nama']) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input
                type="number"
                name="harga"
                value="<?= $data['harga'] ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input
                type="number"
                name="stok"
                value="<?= $data['stok'] ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <input
                type="text"
                name="deskripsi"
                value="<?= htmlspecialchars($data['deskripsi'] ?? '') ?>"
            >
        </div>

        <div class="form-group">
            <label>Gambar (kosongkan jika tidak diganti)</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <select name="id_category">
                <?php 
                $category = mysqli_query($conn, "SELECT * FROM category");
                while($k = mysqli_fetch_assoc($category)) : ?>
                    <option
                        value="<?= $k['id'] ?>"
                        <?= $k['id'] == $data['id_category'] ? 'selected' : '' ?> 
                    >
                        <?= htmlspecialchars($k['nama']) ?>  
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit">Update Produk</button>

    </form>

    <a href="index.php" class="btn-kembali">← Kembali</a>
</div>

</body>
</html>