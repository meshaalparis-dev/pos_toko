<?php


include './aciont.php';


 $data = showDataEditRole($conn, $_GET['id'])->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Role</title>

<style>

body{
    font-family:Arial;
    background:#f5f5f5;
    padding:40px;
}

.card{
    max-width:500px;
    background:white;
    padding:30px;
    margin:auto;
    border-radius:12px;
}

input, textarea, select{
    width:100%;
    padding:12px;
    margin-bottom:15px;
}

button{
    padding:12px 20px;
    background:black;
    color:white;
    border:none;
}

</style>

</head>
<body>

<div class="card">

<h2>Edit Role</h2>

    <form method="POST" action="aciont.php?aksi=update">

      
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label>Nama Role</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi"><?= $data['deskripsi'] ?></textarea>

        
            

        <button type="submit">Update</button>

    
    </form>

</div>

</body>
</html>