<?php

include '../koneksi.php';
$conn = $conn ?? null;

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == 'insert') {
        $nama_product = $_POST['nama_product'];
        $harga = $_POST['harga'];
        $id_category = $_POST['id_category'];
        $stok = $_POST['stok'];
        $deskripsi = $_POST['deskripsi'];
        $image = $_FILES['image_product'];
        insertProduk($conn, $nama_product, $harga, $id_category, $filename,$stok,$deskripsi);
    } else if ($aksi == 'update') {
    }
    $targetfolder = 'image/produk/';
    $filename=basename($image['name']);
    $targetfiloefolder = $targetfolder . $filename;
   if(move_uploaded_file($image['tmp_name'], $targetfiloefolder)){
    echo "Gambar berhasil diupload";
   }else{
    echo "Gbar gagal diupload";
   }



}


function readProduk($con)
{
    $query = 'select produk.id, produk.nama_product, produk.harga, category.nama as nama_category, produk.stok from produk join category on produk.id_category = category.id';
    $result = $con->execute_query($query);
    return $result;
}

function showDataCategory($con)
{
    $query = "select * from category";
    $result = $con->execute_query($query);
    return $result;
}

function insertProduk($con, $nama_product, $harga, $id_category, $filename, $stok)
{
    $query = "insert into produk (nama_product, harga, id_category, image_product, stok) values ('$nama_product', '$harga', '$id_category', '$image', '$stok')";
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Data gagal diinsert";
    }
}
function showDataEditProduk($con, $id)
{
    $query = "select * from produk where id='$id'";
    $result = $con->execute_query($query);
    return $result;
    
    $stmt = $conn->prepare("SELECT * FROM produk WHERE id_produk = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function updateProduk($con, $nama_product, $harga, $id_category, $id)
{
    $query = "update produk set nama_product ='$nama_product', harga='$harga', id_category='$id_category' where id='$id'";
    $result = $con->execute_query($query);
    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal update";
    }
}

function deleteProduk($con, $id)
{
    $query = "delete from produk where id='$id'";
    $result = $con->execute_query($query);
    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal hapus";
    }
}
