<?php 
include './aciont.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <style>

        body{
            font-family:'DM Sans',sans-serif;
            background:#f5f5f5;
            padding:40px;
        }

        .container{
            max-width:600px;
            margin:auto;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        h2{
            margin-bottom:20px;
        }

        .form-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:6px;
            font-weight:600;
        }

        input{
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
            padding:12px 20px;
            border-radius:8px;
            cursor:pointer;
            width:100%;
            font-weight:bold;
        }

        button:hover{
            opacity:0.8;
        }

        .btn-back{
            display:block;
            text-align:center;
            margin-top:15px;
            color:#666;
            text-decoration:none;
            font-size:14px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h2>Tambah Kategori</h2>

        <form aciont="aciont.php?aksi=insert" method="POST">

            <div class="form-group">

                <label>Nama Kategori</label>

                <input 
                    type="text"
                    name="nama_category"
                    placeholder="Masukkan nama kategori"
                    required
                >

            </div>

            <button type="submit">
                Simpan Kategori
            </button>

            <a href="index.php" class="btn-back">
                Batal & Kembali
            </a>

        </form>

    </div>

</div>

</body>

</html>