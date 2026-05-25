<?php

include './aciont.php';

/* ambil data user berdasarkan id */
$data = showDataEditUser($conn, $_GET['id'])->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit User</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, Helvetica, sans-serif;
            background:#f5f5f5;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:40px;
        }

        .card{
            width:100%;
            max-width:550px;
            background:white;
            padding:35px;
            border-radius:16px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .title{
            font-size:28px;
            font-weight:bold;
            margin-bottom:8px;
        }

        .subtitle{
            color:#777;
            margin-bottom:30px;
            font-size:14px;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-size:14px;
            font-weight:600;
            color:#333;
        }

        input,
        textarea,
        select{
            width:100%;
            padding:14px;
            border:1px solid #ddd;
            border-radius:10px;
            font-size:14px;
            outline:none;
            transition:0.2s;
        }

        input:focus,
        textarea:focus,
        select:focus{
            border-color:black;
        }

        textarea{
            resize:vertical;
            min-height:120px;
        }

        .btn{
            width:100%;
            padding:14px;
            background:black;
            color:white;
            border:none;
            border-radius:10px;
            font-size:15px;
            font-weight:600;
            cursor:pointer;
            transition:0.2s;
        }

        .btn:hover{
            opacity:0.9;
        }

    </style>

</head>

<body>

    <div class="card">

        <div class="title">
            Edit User
        </div>

        <div class="subtitle">
            Update data user
        </div>

        <form method="POST" action="aciont.php?aksi=updateUser">

            <!-- ID -->
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <!-- NAMA -->
            <div class="form-group">

                <label>Nama User</label>

                <input 
                    type="text" 
                    name="nama" 
                    value="<?= htmlspecialchars($data['nama']) ?>" 
                    required>

            </div>

            <!-- EMAIL -->
            <div class="form-group">

                <label>Email</label>

                <input 
                    type="email" 
                    name="email" 
                    value="<?= htmlspecialchars($data['email']) ?>" 
                    required>

            </div>

            <!-- PASSWORD -->
            <div class="form-group">

                <label>Password</label>

                <input 
                    type="text" 
                    name="password" 
                    value="<?= htmlspecialchars($data['password']) ?>">

            </div>

            <!-- ROLE -->
            <div class="form-group">

                <label>Role</label>

                <select name="id_role">

                    <?php
                    
                    $role = showDataRole($conn);

                    while($row = $role->fetch_assoc()):

                    ?>

                        <option 
                            value="<?= $row['id'] ?>"
                            
                            <?= $row['id'] == $data['id_role'] ? 'selected' : '' ?>>

                            <?= $row['nama'] ?>

                        </option>

                    <?php endwhile; ?>

                </select>

            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn">
                Update User
            </button>

        </form>

    </div>

</body>

</html>

<