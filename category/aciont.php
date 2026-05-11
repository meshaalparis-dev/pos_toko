
<?php
require '../koneksi.php';

if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $conn->query("INSERT INTO category(nama_category) VALUES('$nama')");
    header("Location: index.php");
}

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $conn->query("UPDATE category SET nama_category='$nama' WHERE id_category=$id");
    header("Location: index.php");
}

if($_GET['aksi']=='hapus'){
    $id = $_GET['id'];
    $conn->query("DELETE FROM category WHERE id_category=$id");
    header("Location: index.php");
}
?>