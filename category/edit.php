<?php
require '../koneksi.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM category WHERE id_category=$id")->fetch();
?>

<form method="POST" action="aciont.php">
<input type="hidden" name="id" value="<?= $data['id_category'] ?>">
<input type="text" name="nama" value="<?= $data['nama_category'] ?>">
<button type="submit" name="edit">Update</button>
</form>