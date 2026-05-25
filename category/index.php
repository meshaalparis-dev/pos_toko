<?php include './aciont.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori — Toko Saya</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #F6F5F2; --surface: #FFFFFF; --surface-2: #F0EEE9;
            --border: rgba(0,0,0,0.08); --border-strong: rgba(0,0,0,0.14);
            --text-primary: #1A1917; --text-secondary: #6B6860;
            --text-muted: #A09D98; --accent: #1A1917; --accent-fg: #FFFFFF;
            --radius-md: 12px; --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
            --primary-blue: #020202;
        }
        body.dark {
            --bg: #0F0E0C; --surface: #1C1B18; --surface-2: #252420;
            --border: rgba(255,255,255,0.07); --text-primary: #F2F0EB;
            --text-secondary: #A09D98; --accent: #F2F0EB; --accent-fg: #1A1917;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text-primary); transition: 0.3s; }
        
        .sidebar { position: fixed; width: 240px; height: 100vh; background: var(--surface); border-right: 1px solid var(--border); display: flex; flex-direction: column; z-index: 100; }
        .sidebar-brand { padding: 30px 24px; font-weight: 600; display: flex; align-items: center; gap: 12px; font-size: 18px; letter-spacing: -0.5px; }
        .brand-icon { width: 32px; height: 32px; background: var(--primary-blue); border-radius: 8px; box-shadow: 0 4px 10px rgba(99, 102, 241, 0.3); }
        
        .nav-item { display: flex; align-items: center; gap: 12px; padding: 12px 24px; text-decoration: none; color: var(--text-secondary); font-size: 14px; transition: 0.2s; border-radius: 0 20px 20px 0; margin-right: 20px; }
        .nav-item.active { background: #6366f115; color: var(--primary-blue); font-weight: 600; }
        .nav-item:hover:not(.active) { color: var(--text-primary); background: var(--surface-2); }

        .main { margin-left: 240px; padding: 40px; min-height: 100vh; }
        
        /* PAGE HEADER & STATS */
        .page-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 32px; }
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 32px; }
        .stat-card { background: var(--surface); padding: 20px; border-radius: var(--radius-md); border: 1px solid var(--border); box-shadow: var(--shadow-sm); }
        .stat-label { font-size: 12px; text-transform: uppercase; color: var(--text-secondary); letter-spacing: 0.05em; margin-bottom: 8px; }
        .stat-value { font-size: 24px; font-weight: 600; color: var(--text-primary); }

        /* BUTTONS */
        .btn-primary { background: var(--accent); color: var(--accent-fg); padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 500; transition: 0.2s; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; }
        .btn-primary:hover { opacity: 0.9; transform: translateY(-1px); }

        /* TABLE CONTAINER */
        .table-container { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-sm); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { background: var(--surface-2); padding: 16px 24px; font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; color: var(--text-secondary); border-bottom: 1px solid var(--border); }
        td { padding: 18px 24px; border-bottom: 1px solid var(--border); font-size: 14px; }
        tr:hover td { background: rgba(0,0,0,0.01); }
        
        .badge { padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 500; background: var(--surface-2); }
        .price { font-family: 'DM Mono', monospace; font-weight: 500; }
        
        .btn-edit { color: var(--primary-blue); text-decoration: none; font-weight: 600; }
        .btn-delete { color: #ef4444; text-decoration: none; font-weight: 600; margin-left: 15px; }
        
        .sidebar-footer { margin-top: auto; padding: 20px; border-top: 1px solid var(--border); }
        .theme-btn { width: 100%; padding: 10px; cursor: pointer; background: var(--surface-2); color: var(--text-primary); border: 1px solid var(--border); border-radius: 8px; font-size: 13px; font-weight: 500; }
    </style>
</head>

<body>

<aside class="sidebar">

    <div class="sidebar-brand">
        Toko Saya
    </div>

    <nav>

        <a href="../produk/index.php" class="nav-item">
            Produk
        </a>

        <a href="index.php" class="nav-item active">
            Kategori
        </a>

        <a href="../role/index.php" class="nav-item">
            Role
        </a>

         <a href="../kastemer/index.php" class="nav-item"> kastemer</a>
    </nav>

</aside>

<main class="main">

    <div class="page-header">

        <div>
            <h1>Daftar Kategori</h1>
        </div>

        <a href="insert.php" class="btn-primary">
            + Tambah Kategori
        </a>

    </div>

    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th width="80">No</th>
                    <th>Nama Kategori</th>
                    <th width="180" style="text-align:right;">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php

            $result = readCategory($conn);
            $no = 1;

            if($result->num_rows > 0):

                while($row = $result->fetch_assoc()):

            ?>

                <tr>

                    <td>
                        <?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['nama']) ?>
                    </td>

                    <td style="text-align:right;">

                        <a 
                            href="edit.php?id=<?= $row['id'] ?>" 
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <a 
                            href="delete.php?id=<?= $row['id'] ?>" 
                            class="btn-delete"
                            onclick="return confirm('Hapus kategori ini?')"
                        >
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php

                endwhile;

            else:

            ?>

                <tr>
                    <td colspan="3" style="text-align:center; padding:40px;">
                        Belum ada data kategori
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</main>

</body>
</html>