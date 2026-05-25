<?php

include '../koneksi.php';

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];
    if ($aksi == 'insertCart') {
        $id_user = $_GET['id_user'];
        $id_produk = $_GET['id_produk'];
        insertProductToCart($conn, $id_user, $id_produk);
    } else if ($aksi == 'deleteCart') {
        $id_user = $_GET['id_user'];
        $id_produk = $_GET['id_produk'];
        deleteDataCart($conn, $id_user, $id_produk);
    } else if ($aksi == 'deleteAllCart') {
        $id_user = $_GET['id_user'];
        deleteAllDataCart($conn, $id_user);
    }else if ($aksi == 'checkoutCart') {
        $id_user = $_GET['id_user'];
        checkoutCart($conn, $id_user);
    }
}

function showDataCategory($con)
{
    $query = 'select * from category';
    $result = $con->execute_query($query);
    return $result;
}

function readProduct($con)
{
    $query = "select produk.id, produk.nama, produk.harga, produk.image, produk.stok, category.nama as nama_category from produk join category on produk.id_category = category.id";
    $result = $con->execute_query($query);
    return $result;
}

function insertProductToCart($con, $id_user, $id_product)
{
    $query = "insert into cart (id_user, id_product) values ('$id_user', '$id_product')";
    $result = $con->execute_query($query);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal Insert";
    }
}

function showDataCart($con, $id_user)
{
    $query = "SELECT cart.id_product, produk.nama AS nama_product, produk.harga, produk.image, COUNT(*) AS qty
              FROM cart
              JOIN produk ON cart.id_product = produk.id
              WHERE cart.id_user = '$id_user'
              GROUP BY cart.id_product, produk.nama, produk.harga, produk.image";
    $result = $con->execute_query($query);
    return $result;
}

function deleteDataCart($con, $id_user, $id_produk)
{
    $query = "DELETE FROM cart WHERE id_user = '$id_user' AND id_product = '$id_produk' limit 1";
    $result = $con->execute_query($query);
    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal Delete";
    }
}

function deleteAllDataCart($con, $id_user)
{
    $query = "DELETE FROM cart WHERE id_user='$id_user'";
    $result = $con->execute_query($query);
    if ($result) {
        header('Location: index.php');
    } else {
        echo "Gagal Delete";
    }
}

function showTotalCart($con, $id_user)
{
    $query = "select sum(produk.harga) as total 
from cart join produk on cart.id_product =
produk.id where id_user='$id_user'";
    $result = $con->execute_query($query);
    return $result->fetch_assoc();
}

function checkoutCart($con, $id_user)
{
    $query = "INSERT INTO `checkout` (`id_user`, `total`) VALUES ('$id_user', (SELECT SUM(produk.harga) FROM cart JOIN produk ON cart.id_product = produk.id WHERE cart.id_user='$id_user'))";
    $result = $con->execute_query($query);
    if ($resultCekCart = $con->num_rows > 0)

        $total_pembelian = showTotalCart($con, $id_user)['total'];
        $tgl_checkout = date('Y-m-d H:i:s');
        $queryInsertTransaksi = "INSERT INTO transaksi (id_user, total, tgl_checkout) VALUES ('$id_user', '$total_pembelian', '$tgl_checkout')";
        $resultInsertTransaksi = $con->execute_query($queryInsertTransaksi);
        if ($resultInsertTransaksi) {
            $id_transaksi = $con->insert_id;
           

            while($rowCart = $resultCekCart->fetch_assoc()) {
            $id_product = $rowCart['id_product'];
            $qty = $rowCart['qty'];
            $harga = $rowCart['harga'];
            $queryInsertTransaksiDetail = "INSERT INTO detail_transaksi (id_transaksi, id_product, qty, harga) VALUES ('$id_transaksi', '$id_product', '$qty', '$harga')";
            $con->execute_query($queryInsertTransaksiDetail);

            
}
            deleteAllDataCart($con, $id_user);
            header('Location: index.php');
        } else {
            echo "Gagal Checkout";
        }


}