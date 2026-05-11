<?php
require '../koneksi.php';
$data = $conn->query("SELECT * FROM category")->fetchAll();
?>

<a href="insert.php">Tambah</a>

<table border="1">
<?php foreach($data as $d): ?>
<tr>
<td><?= $d['nama_category'] ?></td>
<td>
<a href="edit.php?id=<?= $d['id_category'] ?>">Edit</a>
<a href="aciont.php?aksi=hapus&id=<?= $d['id_category'] ?>">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
</table>