<?php

include '../koneksi.php';

if (isset($_GET['aksi'])) {
    $aksi = $_GET['aksi'];

    // Aksi yang butuh ID
    if (in_array($aksi, ['delete', 'edit', 'update']) && isset($_GET['id'])) {
        $id = $_GET['id'];

        if ($aksi == 'delete') {
            deleteRole($id);

        } else if ($aksi == 'edit') {
            editRole($id);

        } else if ($aksi == 'update') {
            $id   = $_POST['id'];
            $nama = $_POST['edit_role'];
            updateRole($conn, $nama, $id);
        }
    }

    // Insert tidak butuh ID
    if ($aksi == 'insert') {
        $nama = $_POST['nama'];
        insertRole($conn, $nama);
    }
}

// ── FUNGSI ──────────────────────────────────────

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

function updateRole($conn, $nama, $id)
{
    $query  = "UPDATE role SET nama='$nama' WHERE id='$id'";
    $result = $conn->execute_query($query);

    if ($result) {
        header("Location: index.php");
        exit;
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
    return $result->fetch_assoc();
}