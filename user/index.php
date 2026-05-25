<?php include 'aciont.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #F6F5F2;
            --surface: #FFFFFF;
            --surface-2: #F0EEE9;
            --border: rgba(0, 0, 0, 0.08);
            --border-strong: rgba(0, 0, 0, 0.14);
            --text-primary: #1A1917;
            --text-secondary: #6B6860;
            --text-muted: #A09D98;
            --accent: #1A1917;
            --accent-fg: #FFFFFF;
            --radius-md: 12px;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text-primary);
        }

        .sidebar {
            position: fixed;
            width: 240px;
            height: 100vh;
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            padding: 30px 24px;
            font-size: 20px;
            font-weight: 700;
        }

        .nav-item {
            display: flex;
            align-items: center;
            padding: 12px 24px;
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 14px;
            transition: .2s;
            border-radius: 0 20px 20px 0;
            margin-right: 20px;
        }

        .nav-item:hover {
            background: var(--surface-2);
            color: var(--text-primary);
        }

        .nav-item.active {
            background: #00000010;
            color: black;
            font-weight: 600;
        }

        .main {
            margin-left: 240px;
            padding: 40px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 30px;
            font-weight: 700;
        }

        .btn-primary {
            background: var(--accent);
            color: var(--accent-fg);
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-primary:hover {
            opacity: .9;
        }

        .top-control {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
        }

        .search-box {
            flex: 1;
        }

        .search-box input {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            outline: none;
            font-size: 14px;
        }

        .table-container {
            background: white;
            border-radius: var(--radius-md);
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: var(--surface-2);
        }

        th {
            padding: 18px 20px;
            text-align: left;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: var(--text-secondary);
        }

        td {
            padding: 18px 20px;
            border-top: 1px solid var(--border);
            font-size: 14px;
        }

        tr:hover {
            background: rgba(0, 0, 0, 0.01);
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 999px;
            background: var(--surface-2);
            font-size: 12px;
            font-weight: 500;
        }

        .btn-edit {
            text-decoration: none;
            color: #111;
            font-weight: 600;
            margin-right: 15px;
        }

        .btn-delete {
            text-decoration: none;
            color: #ef4444;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 50px;
            color: var(--text-muted);
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

        <!-- HEADER -->
        <div class="page-header">

            <div>
                <h1 class="page-title">Data User</h1>
            </div>

            <a href="insert.php" class="btn-primary">
                + Tambah User
            </a>

        </div>

        <!-- SEARCH -->
        <div class="top-control">

            <div class="search-box">
                <input type="text" placeholder="Cari user...">
            </div>

        </div>

        <!-- TABLE -->
        <div class="table-container">

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th style="text-align:right;">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    $data = readUser($conn);
                    $no = 1;

                    if ($data->num_rows > 0):

                        while ($row = $data->fetch_assoc()):

                    ?>

                            <tr>

                                <td>
                                    <?= $no++ ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['nama']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['alamat']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['no_hp']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['username']) ?>
                                </td>

                                <td>
                                    <span class="badge">
                                        <?= htmlspecialchars($row['nama_role']) ?>
                                    </span>
                                </td>

                                <td style="text-align:right; white-space:nowrap;">

                                    <a 
                                        href="edit.php?id=<?= $row['id'] ?>" 
                                        class="btn-edit">
                                        Edit
                                    </a>

                                    <a 
                                        href="action.php?aksi=delete&id=<?= $row['id'] ?>"
                                        class="btn-delete"
                                        onclick="return confirm('Hapus user ini?')">
                                        Hapus
                                    </a>

                                </td>

                            </tr>

                    <?php

                        endwhile;

                    else:

                    ?>

                        <tr>

                            <td colspan="7" class="empty">
                                Belum ada data user.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </main>

</body>

</html>