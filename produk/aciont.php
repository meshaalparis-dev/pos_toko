<?php

include '../koneksi.php';

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteProduk($conn, $id);
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        editProduk($id);
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $image = $_FILES['image'];
        $deskripsi = $_POST['deskripsi'];
         if($image){
            $targetFolder = "image/";
            $fileName = basename($image["name"]);
            $targetFileFolder = $targetFolder.$fileName;

            if (move_uploaded_file($image['tmp_name'], $targetFileFolder)) {
                echo"image berhasil di upload";
            } else {
                echo "image gagal di upload";
            }

            updateProduk($conn,$id, $nama, $stok, $harga, $fileName, $deskripsi);
        }else{
            updateProduk($conn,$id, $nama, $stok, $harga,'', $deskripsi );
        } 
    } else if ($aksi == 'insert') {
    
    $nama      = $_POST['nama_product'] ?? '';  
    $harga     = $_POST['harga']        ?? '';
    $deskripsi = $_POST['deskripsi']    ?? '';
    $stok      = $_POST['stok']         ?? '';
    $category  = $_POST['category_id']  ?? '';  
    $image     = $_FILES['image']       ?? null;

    if (!empty($image['name'])) {
        $targetFolder = __DIR__ . "/image_produk/";
        
        if (!file_exists($targetFolder)) {
            mkdir($targetFolder, 0777, true);
        }

        $filename         = basename($image['name']);
        $targetFileFolder = $targetFolder . $filename;

        if (move_uploaded_file($image['tmp_name'], $targetFileFolder)) {
            echo "image berhasil diupload";
        } else {
            echo "image gagal diupload";
        }

        insertProduk($conn, $nama, $harga, $deskripsi, $filename, $stok, $category);
    } else {
        insertProduk($conn, $nama, $harga, $deskripsi, '', $stok, $category);
    }
}
}

function readProduk($conn)
{
    $query = "SELECT 
                produk.id,
                produk.nama,
                produk.image,
                produk.stok,
                produk.deskripsi,
                category.nama AS category,
                produk.harga
              FROM produk
              JOIN category
              ON produk.id_category = category.id";

    $result = $conn->execute_query($query);
    return $result;
}

function deleteProduk($conn, $id)
{
    $query = "DELETE FROM produk WHERE id='$id'";
    $result = $conn->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "gagal";
    }
}

function editProduk($id)
{
    header("Location: edit.php?id=$id");
}

function updateProduk($conn, $id, $nama, $stok, $harga, $image, $deskripsi)
{
    $query = '';

    if ($image == '') {
        $query = "UPDATE produk SET  nama='$nama', stok='$stok', harga='$harga', image='$image', deskripsi='$deskripsi'  WHERE id='$id'";
    } else {
        $query = "UPDATE produk SET  nama='$nama', stok='$stok', harga='$harga', image='$image', deskripsi='$deskripsi'  WHERE id='$id'";
    }

    $result = $conn->execute_query($query);

    if ($result) {
        header("location: index.php");
    } else {
        echo "gagal";
    }
}

function showDataEditProduk($conn, $id)
{
    $query = "SELECT * FROM produk WHERE id='$id'";
    $result = $conn->execute_query($query);
    return $result->fetch_assoc();
}

function insertProduk($con, $nama, $harga, $deskripsi, $image, $stok, $category)
{
    $query = "INSERT INTO produk 
                (nama, harga, deskripsi, image, stok, id_category) 
              VALUES 
                ('$nama', '$harga', '$deskripsi', '$image', '$stok', '$category')";
    
    $result = $con->execute_query($query);

    if ($result) {
        header("Location: index.php");
    } else {
        echo "Gagal insert";
    }
}


?>
