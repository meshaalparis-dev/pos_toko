<?php
require '../koneksi.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
 </head>
 <body>
    <div class="card">
        <h3>nama Produk</h3>
    </div>
    <form id="formProduk" action="produk.php?aksi=insert" method="post" enctype="multipart/form-data">
    </div>
    <form method="POST" action="produk.php">
        <input type="text" name="nama">
        <button type="submit" name="tambah">Simpan</button>
    </form>
     <!-- <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" id="nama">
            <small class="error-text">Nama wajib diisi</small>
        </div> -->
         </div>
    <form id="formProduk" action="produk.php?aksi=insert" method="post" enctype="multipart/form-data">
        <div class="card">
            <h4>Harga</h4>
            <form method="POST" action="produk.php">
        <input type="text" name="nama">
        <button type="submit" name="tambah">Simpan</button>
    </form>
    <form id="formProduk" action="produk.php?aksi=insert" method="post" enctype="multipart/form-data">
        <div class="card">
            <h4>Kategori</h4>
            <form method="POST" action="produk.php">
        <input type="text" name="id_category">
        <button type="submit" name="tambah">Simpan</button>
        <form id="formProduk" action="produk.php?aksi=insert" method="post" enctype="multipart/form-data">
        <div class="card">
            <h4>Stok Produk</h4>
            <form method="POST" action="produk.php">
        <input type="text" name="id_category">
        <button type="submit" name="tambah">Simpan</button>
    </form>
 </body>
 </html>