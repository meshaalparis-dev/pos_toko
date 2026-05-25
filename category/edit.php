<?php

include './aciont.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Produk</title>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<style>

body{
    font-family:'DM Sans',sans-serif;
    background:#f5f5f5;
    padding:40px;
}

.card{
    max-width:500px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:14px;
    box-shadow:0 3px 12px rgba(0,0,0,0.08);
}

h2{
    margin-bottom:25px;
}

.form-group{
    margin-bottom:20px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
}

input, select{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:14px;
    box-sizing:border-box;
}

button{
    background:black;
    color:white;
    border:none;
    padding:12px 18px;
    border-radius:8px;
    cursor:pointer;
    font-size:14px;
}

button:hover{
    opacity:0.8;
}

.btn-kembali{
    display:inline-block;
    margin-top:15px;
    text-decoration:none;
    color:black;
}

</style>

</head>
<body>

<div class="card">

    <h2>Edit Produk</h2>

    <form method="POST">

        <div class="form-group">

            <label>Nama Produk</label>

            <input
                type="text"
                name="nama"
                value="<?= isset($data['nama']) ? $data['nama'] : '' ?>"
                required
            >

        </div>

        <button type="submit" name="update">
            Update Produk
        </button>

    </form>

    <a href="index.php" class="btn-kembali">
        ← Kembali
    </a>

</div>

</body>
</html>