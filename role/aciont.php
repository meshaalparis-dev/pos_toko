<?php

include '../koneksi.php';

if (isset($_GET['aksi'])) {
    

    $aksi = $_GET['aksi'];
    if ($aksi == 'insert') {
        $nama = $_POST['nama_role'];
        insertRole($conn, $nama);
    } else if ($aksi == 'edit') {
        $id = $_GET['id'];
        $data = showDataEditRole($conn, $id)->fetch_assoc();
    } else if ($aksi == 'update') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        updateRole($conn, $id, $nama);
    } else if ($aksi == 'delete') {
        $id = $_GET['id'];
        deleteRole($conn, $id);
    }
}
    





// ── FUNGSI ──────────────────────────────────────

// Ganti dengan file koneksi Anda



function getRoleById($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM role WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function readRole($conn)
{
    $query  = "SELECT * FROM role";
    $result = $conn->execute_query($query);
    return $result;
}

function insertRole($conn, $nama)
{
    $query  = "INSERT INTO role (nama) VALUES ('$nama')";
    $result = $conn->execute_query($query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal insert";
    }
}

function editRole($id)
{
    header("Location: edit.php?id=$id");
    exit;
}

function updateRole($conn, $id, $nama)
{
    $query  = "UPDATE role SET nama='$nama' WHERE id='$id'";
    $result = $conn->execute_query($query);

    if ($result) {
        // header("Location: index.php");
        // exit;
    } else {
        echo "Gagal update";
    }
}

function deleteRole($conn, $id)
{
    $query  = "DELETE FROM role WHERE id='$id'";
    $result = $conn->execute_query($query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal delete";
    }
}

function showDataEditRole($conn, $id)
{
    $query  = "SELECT * FROM role WHERE id='$id'";
    $result = $conn->execute_query($query);
    return $result;
}