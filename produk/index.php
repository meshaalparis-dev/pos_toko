<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk — Toko Saya</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono&display=swap" rel="stylesheet">
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
            --primary-blue: #020202;
        }

        body.dark {
            --bg: #0F0E0C;
            --surface: #1C1B18;
            --surface-2: #252420;
            --border: rgba(255, 255, 255, 0.07);
            --text-primary: #F2F0EB;
            --text-secondary: #A09D98;
            --accent: #F2F0EB;
            --accent-fg: #1A1917;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            transition: 0.3s;
        }

        .sidebar {
            position: fixed;
            width: 240px;
            height: 100vh;
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 30px 24px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 18px;
            letter-spacing: -0.5px;
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            background: var(--primary-blue);
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(99, 102, 241, 0.3);
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            text-decoration: none;
            color: var(--text-secondary);
            font-size: 14px;
            transition: 0.2s;
            border-radius: 0 20px 20px 0;
            margin-right: 20px;
        }

        .nav-item.active {
            background: #6366f115;
            color: var(--primary-blue);
            font-weight: 600;
        }

        .nav-item:hover:not(.active) {
            color: var(--text-primary);
            background: var(--surface-2);
        }

        .main {
            margin-left: 240px;
            padding: 40px;
            min-height: 100vh;
        }

        /* PAGE HEADER & STATS */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 32px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--surface);
            padding: 20px;
            border-radius: var(--radius-md);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        .stat-label {
            font-size: 12px;
            text-transform: uppercase;
            color: var(--text-secondary);
            letter-spacing: 0.05em;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-primary);
        }

        /* BUTTONS */
        .btn-primary {
            background: var(--accent);
            color: var(--accent-fg);
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* TABLE CONTAINER */
        .table-container {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            background: var(--surface-2);
            padding: 16px 24px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-secondary);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 18px 24px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
        }

        tr:hover td {
            background: rgba(0, 0, 0, 0.01);
        }

        .badge {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            background: var(--surface-2);
        }

        .price {
            font-family: 'DM Mono', monospace;
            font-weight: 500;
        }

        .btn-edit {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
        }

        .btn-delete {
            color: #ef4444;
            text-decoration: none;
            font-weight: 600;
            margin-left: 15px;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 20px;
            border-top: 1px solid var(--border);
        }

        .theme-btn {
            width: 100%;
            padding: 10px;
            cursor: pointer;
            background: var(--surface-2);
            color: var(--text-primary);
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon"></div>
            <span class="brand-name">Toko Saya</span>
        </div>
        <nav style="margin-top: 10px;">
            <a href="index.php" class="nav-item active">
                <span></span> Produk
            </a>
            <a href="../category/index.php" class="nav-item">
                <span></span> category
            </a>
            <a href="../role/index.php" class="nav-item">
                <span></span> Role
            </a>
             <a href="../role/index.php" class="nav-item">
                <span></span> kastemer
            </a>
        </nav>
        <div class="sidebar-footer">
            <button class="theme-btn" onclick="toggleDark()" id="themeBtn"> Mode Gelap</button>
        </div>
    </aside>
<!-- Harus begini -->

    <main class="main">
        <div class="page-header">
            <div>
                <h1 style="font-size: 28px; letter-spacing: -1px;">Daftar Produk</h1>

            </div>
            <a href="insert.php" class="btn-primary">
                <span>+</span> Tambah Produk
            </a>
        </div>

      

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Produk</div>
                <div class="stat-value">
                    <?php
                    include './aciont.php';
                    $total = readProduk($conn)->num_rows;
                    echo $total;
                    ?>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Stok Hampir Habis</div>
                <div class="stat-value" style="color: #f59e0b;">
                    <!-- Contoh logika stok rendah < 10 -->
                    2
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Kategori Aktif</div>
                <div class="stat-value">5</div>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-100">
                                <th class="px-6 py-4 text-label-md font-label-md text-slate-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-4 text-label-md font-label-md text-slate-500 uppercase tracking-wider">Nama Product</th>
                                <th class="px-6 py-4 text-label-md font-label-md text-slate-500 uppercase tracking-wider">Harga</th>
                                <th class="px-6 py-4 text-label-md font-label-md text-slate-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-4 text-label-md font-label-md text-slate-500 uppercase tracking-wider">Stok</th>
                                <th class="px-6 py-4 text-label-md font-label-md text-slate-500 uppercase tracking-wider">Deskripsi</th>
                                <th class="px-6 py-4 text-label-md font-label-md text-slate-500 uppercase tracking-wider text-right">Image</th>
                            </tr>
                </thead>
                <tbody>
                    <?php
                    $result = readProduk($conn);
                    $no = 1;
                    if ($result->num_rows > 0):
                        while ($row = $result->fetch_assoc()):
                    ?>
                            <tr>
                                <td style="color: var(--text-muted);"><?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?></td>

                                <td><?= htmlspecialchars($row['nama'] ?? '') ?></td> 

                                <td class="price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>

                                <td><span class="badge"><?= htmlspecialchars($row['nama_category'] ?? '') ?></span></td> <!-- ✅ 'nama' → 'nama_category' -->
                               
                                 <td><span class="badge"><?= htmlspecialchars($row['stok'] ?? '') ?></span></td>
                                  <td><span class="badge"><?= htmlspecialchars($row['deskripsi'] ?? '') ?></span></td>
                                <td>
                                 <td>
    <?php if (!empty($row['image'])): ?>
        <img 
            src="image_produk/<?= $row['image'] ?>" 
            alt="<?= $row['nama'] ?>"
            style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;"
        >
    <?php else: ?>
        <span style="color: #ccc;">-</span>
    <?php endif; ?>
</td>
                                <td style="text-align: right; white-space: nowrap;">
    <a href="edit.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
    <a href="aciont.php?aksi=delete&id=<?= $row['id'] ?>" class="btn-delete" 
       onclick="return confirm('Hapus produk ini?')">Hapus</a>
</td>
                            </tr>
                        <?php
                        endwhile;
                    else:
                        ?>
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 60px; color: var(--text-muted);">
                                <div style="font-size: 40px; margin-bottom: 10px;"></div>
                                <p>Belum ada data produk yang tersedia.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    

</body>

</html>