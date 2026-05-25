<?php 
// Mengambil file logika (pastikan path ke aciont.php benar)
include './aciont.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Role — Toko Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #F6F5F2; --surface: #FFFFFF; --surface-2: #F0EEE9;
            --border: rgba(0,0,0,0.08); --text-primary: #1A1917; 
            --text-secondary: #6B6860; --accent: #1A1917; --accent-fg: #FFFFFF;
            --radius-md: 12px; --shadow-sm: 0 2px 8px rgba(0,0,0,0.04);
            --primary-blue: #007bff; --danger-red: #dc3545;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); color: var(--text-primary); }
        
        /* Layout Sidebar & Main */
        .sidebar { position: fixed; width: 240px; height: 100vh; background: var(--surface); border-right: 1px solid var(--border); display: flex; flex-direction: column; z-index: 100; }
        .sidebar-brand { padding: 30px 24px; font-weight: 600; display: flex; align-items: center; gap: 12px; font-size: 18px; }
        .brand-icon { width: 32px; height: 32px; background: var(--accent); border-radius: 8px; }
        
        .nav-item { display: flex; align-items: center; gap: 12px; padding: 12px 24px; text-decoration: none; color: var(--text-secondary); font-size: 14px; }
        .nav-item.active { background: #6366f115; color: var(--text-primary); font-weight: 600; }

        .main { margin-left: 240px; padding: 40px; min-height: 100vh; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; }

        /* Table Styling */
        .table-container { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-sm); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { background: #fafafa; padding: 16px 24px; font-size: 13px; color: var(--text-secondary); border-bottom: 1px solid var(--border); text-transform: uppercase; letter-spacing: 0.05em; }
        td { padding: 16px 24px; border-bottom: 1px solid var(--border); font-size: 14px; vertical-align: middle; }
        
        /* Badge Status */
        .badge-active { background: #e6fffa; color: #38a169; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 500; }
        .badge-inactive { background: #fff5f5; color: #e53e3e; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 500; }

        /* Buttons */
        .btn-edit, .btn-delete { padding: 6px 14px; border-radius: 6px; text-decoration: none; font-size: 12px; font-weight: 600; color: white; margin-right: 4px; }
        .btn-edit { background-color: var(--primary-blue); }
        .btn-delete { background-color: var(--danger-red); }
        .btn-add { background: var(--accent); color: var(--accent-fg); padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 500; }
    </style>
</head>
<body>

<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"></div>
        <span class="brand-name">Toko Saya</span>
    </div>
    <nav style="margin-top: 10px;">
        <a href="../produk/index.php" class="nav-item"> Produk</a>
        <a href="../category/index.php" class="nav-item"> category</a>
        <a href="index.php" class="nav-item active"> Role</a>
         <a href="../kastemer/index.php" class="nav-item"> kastemer</a>
    </nav>
</aside>

<main class="main">
    <div class="page-header">
        <div>
            <h1 style="font-size: 28px; letter-spacing: -1px;">Daftar Role</h1>
            <p style="color: var(--text-secondary); font-size: 14px;">Kelola hak akses dan tingkatan pengguna.</p>
        </div>
        <a href="insert.php" class="btn-add">+ Tambah Role</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Role</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th style="text-align: center; width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menggunakan fungsi readRole yang seharusnya ada di aciont.php
                $result = readRole($conn);
                $no = 1;
                if ($result && mysqli_num_rows($result) > 0):
                    while ($row = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td style="color: var(--text-secondary);"><?= $no++ ?></td>
                        <td style="font-weight: 600;"><?= htmlspecialchars($row['nama']) ?></td>
                        <td style="color: var(--text-secondary);"><?= htmlspecialchars($row['deskripsi'] ?? '-') ?></td>
                        <td>
                            <span class="badge-active">Active</span>
                            <!-- <span class="badge-inactive">Inactive</span> -->
                        </td>
                        <td style="text-align: center;">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                            <a href="aciont.php?aksi=delete&id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus role ini?')">Delete</a>
                        </td>
                        
                    </tr>
                <?php 
                    endwhile; 
                else: 
                ?>
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-secondary);">
                            Belum ada data role yang tersedia.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

</body>
</html>