<?php include 'action.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah User</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        :root{
            --bg:#F6F5F2;
            --surface:#FFFFFF;
            --surface-2:#F0EEE9;
            --border:rgba(0,0,0,0.08);
            --text-primary:#1A1917;
            --text-secondary:#6B6860;
            --accent:#1A1917;
            --accent-fg:#FFFFFF;
            --radius:12px;
            --shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'DM Sans', sans-serif;
            background:var(--bg);
            color:var(--text-primary);
        }

        /* SIDEBAR */
        .sidebar{
            position:fixed;
            width:240px;
            height:100vh;
            background:var(--surface);
            border-right:1px solid var(--border);
            padding-top:20px;
        }

        .sidebar-brand{
            padding:20px 24px;
            font-size:22px;
            font-weight:700;
        }

        .nav-item{
            display:block;
            padding:12px 24px;
            margin-right:20px;
            border-radius:0 20px 20px 0;
            text-decoration:none;
            color:var(--text-secondary);
            font-size:14px;
            transition:.2s;
        }

        .nav-item:hover{
            background:var(--surface-2);
            color:var(--text-primary);
        }

        .nav-item.active{
            background:#00000010;
            color:black;
            font-weight:600;
        }

        /* MAIN */
        .main{
            margin-left:240px;
            padding:40px;
        }

        .page-header{
            margin-bottom:30px;
        }

        .page-title{
            font-size:30px;
            font-weight:700;
        }

        .page-subtitle{
            margin-top:6px;
            color:var(--text-secondary);
            font-size:14px;
        }

        /* CARD */
        .card{
            background:var(--surface);
            border:1px solid var(--border);
            border-radius:var(--radius);
            padding:30px;
            max-width:700px;
            box-shadow:var(--shadow);
        }

        .form-group{
            margin-bottom:22px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-size:14px;
            font-weight:600;
        }

        input,
        textarea,
        select{
            width:100%;
            padding:14px;
            border:1px solid var(--border);
            border-radius:10px;
            font-size:14px;
            font-family:'DM Sans', sans-serif;
            outline:none;
            transition:.2s;
            background:white;
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

        .btn-submit{
            background:var(--accent);
            color:var(--accent-fg);
            border:none;
            padding:14px 20px;
            border-radius:10px;
            font-size:14px;
            font-weight:600;
            cursor:pointer;
            transition:.2s;
        }

        .btn-submit:hover{
            opacity:.9;
        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="sidebar-brand">
            Toko Saya
        </div>

        <nav>

            <a href="../kastemer/index.php" class="nav-item">
                Kastemer
            </a>

            <a href="../produk/index.php" class="nav-item">
                Produk
            </a>

            <a href="../category/index.php" class="nav-item">
                Category
            </a>

            <a href="../role/index.php" class="nav-item">
                Role
            </a>

            <a href="index.php" class="nav-item active">
                User
            </a>

        </nav>

    </aside>

    <!-- MAIN -->
    <main class="main">

        <div class="page-header">

            <h1 class="page-title">
                Tambah User
            </h1>

            <p class="page-subtitle">
                Tambahkan data user baru
            </p>

        </div>

        <div class="card">

            <form action="action.php?aksi=insert" method="POST">

                <!-- NAMA -->
                <div class="form-group">

                    <label>Nama User</label>

                    <input 
                        type="text"
                        name="nama"
                        placeholder="Masukkan nama user"
                        required>

                </div>

                <!-- ALAMAT -->
                <div class="form-group">

                    <label>Alamat</label>

                    <textarea 
                        name="alamat"
                        placeholder="Masukkan alamat user"
                        required></textarea>

                </div>

                <!-- NO HP -->
                <div class="form-group">

                    <label>No HP</label>

                    <input 
                        type="text"
                        name="no_hp"
                        placeholder="08xxxxxxxxxx"
                        required>

                </div>

                <!-- USERNAME -->
                <div class="form-group">

                    <label>Username</label>

                    <input 
                        type="text"
                        name="username"
                        placeholder="Masukkan username"
                        required>

                </div>

                <!-- PASSWORD -->
                <div class="form-group">

                    <label>Password</label>

                    <input 
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required>

                </div>

                <!-- ROLE -->
                <div class="form-group">

                    <label>Role</label>

                    <select name="id_role" required>

                        <option value="">
                            -- Pilih Role --
                        </option>

                        <?php
                        
                        $role = showDataRole($conn);

                        while($row = $role->fetch_assoc()):
                        
                        ?>

                            <option value="<?= $row['id'] ?>">
                                <?= $row['nama'] ?>
                            </option>

                        <?php endwhile; ?>

                    </select>

                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn-submit">
                    Simpan User
                </button>

            </form>

        </div>

    </main>

</body>

</html>