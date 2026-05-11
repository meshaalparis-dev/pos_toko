<?php include './aciont.php' ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Role — Admin Panel</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #F6F5F2;
            --surface: #FFFFFF;
            --surface-2: #F0EEE9;
            --border: rgba(0,0,0,0.08);
            --border-strong: rgba(0,0,0,0.14);
            --text-primary: #1A1917;
            --text-secondary: #6B6860;
            --text-muted: #A09D98;
            --accent: #1A1917;
            --accent-fg: #FFFFFF;
            --green: #1D6F42;
            --green-bg: #EAF5EE;
            --amber: #B45309;
            --amber-bg: #FEF3C7;
            --red: #B91C1C;
            --red-bg: #FEE2E2;
            --indigo: #4338CA;
            --indigo-bg: #EEF2FF;
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-xl: 20px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.04);
        }

        body.dark {
            --bg: #0F0E0C;
            --surface: #1C1B18;
            --surface-2: #252420;
            --border: rgba(255,255,255,0.07);
            --border-strong: rgba(255,255,255,0.12);
            --text-primary: #F2F0EB;
            --text-secondary: #A09D98;
            --text-muted: #6B6860;
            --accent: #F2F0EB;
            --accent-fg: #1A1917;
            --green: #34D399;
            --green-bg: rgba(52,211,153,0.12);
            --amber: #FCD34D;
            --amber-bg: rgba(252,211,77,0.12);
            --red: #F87171;
            --red-bg: rgba(248,113,113,0.12);
            --indigo: #818CF8;
            --indigo-bg: rgba(129,140,248,0.12);
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.3);
            --shadow-md: 0 4px 12px rgba(0,0,0,0.4);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            min-height: 100vh;
            transition: background 0.3s, color 0.3s;
        }

        /* ── SIDEBAR ─────────────────────────────── */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: 240px; height: 100vh;
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex; flex-direction: column;
            z-index: 100;
            transition: background 0.3s, border-color 0.3s;
        }

        .sidebar-brand {
            padding: 24px 20px 20px;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; gap: 10px;
        }

        .brand-icon {
            width: 32px; height: 32px;
            border-radius: var(--radius-sm);
            background: var(--accent);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .brand-icon svg { width: 16px; height: 16px; fill: var(--accent-fg); }
        .brand-name { font-size: 15px; font-weight: 600; color: var(--text-primary); letter-spacing: -0.3px; }

        .sidebar-section { padding: 20px 12px 8px; flex: 1; }

        .sidebar-label {
            font-size: 10px; font-weight: 600;
            letter-spacing: 0.08em; text-transform: uppercase;
            color: var(--text-muted); padding: 0 8px; margin-bottom: 6px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 10px; border-radius: var(--radius-sm);
            text-decoration: none; color: var(--text-secondary);
            font-size: 14px; transition: background 0.15s, color 0.15s;
            margin-bottom: 2px;
        }

        .nav-item svg { width: 16px; height: 16px; flex-shrink: 0; opacity: 0.7; }
        .nav-item:hover { background: var(--surface-2); color: var(--text-primary); }
        .nav-item:hover svg { opacity: 1; }
        .nav-item.active { background: var(--accent); color: var(--accent-fg); font-weight: 500; }
        .nav-item.active svg { opacity: 1; fill: var(--accent-fg); }

        .sidebar-footer { padding: 16px 12px; border-top: 1px solid var(--border); }

        .theme-toggle {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 10px; border-radius: var(--radius-sm);
            cursor: pointer; color: var(--text-secondary);
            font-size: 14px; border: none; background: none; width: 100%;
            transition: background 0.15s, color 0.15s; font-family: inherit;
        }

        .theme-toggle:hover { background: var(--surface-2); color: var(--text-primary); }
        .theme-toggle svg { width: 16px; height: 16px; flex-shrink: 0; }

        /* ── MAIN ───────────────────────────────── */
        .main { margin-left: 240px; min-height: 100vh; display: flex; flex-direction: column; }

        .topbar {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0 32px; height: 60px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 50;
            transition: background 0.3s, border-color 0.3s;
        }

        .breadcrumb {
            display: flex; align-items: center; gap: 6px;
            font-size: 13px; color: var(--text-muted);
        }

        .breadcrumb span { color: var(--text-primary); font-weight: 500; }

        .avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--surface-2); border: 1.5px solid var(--border-strong);
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 600; color: var(--text-secondary);
        }

        /* ── CONTENT ─────────────────────────────── */
        .content { padding: 36px 32px; flex: 1; }

        .page-header { margin-bottom: 28px; }

        .page-title {
            font-size: 22px; font-weight: 600;
            letter-spacing: -0.5px; color: var(--text-primary); margin-bottom: 4px;
        }

        .page-subtitle { font-size: 14px; color: var(--text-secondary); }

        /* ── STATS ───────────────────────────────── */
        .stats-row {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 16px; margin-bottom: 28px;
        }

        .stat-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius-lg); padding: 20px;
            box-shadow: var(--shadow-sm);
            transition: background 0.3s, border-color 0.3s;
        }

        .stat-label {
            font-size: 12px; font-weight: 500; color: var(--text-muted);
            text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 8px;
        }

        .stat-value {
            font-size: 28px; font-weight: 600; color: var(--text-primary);
            letter-spacing: -0.5px; font-family: 'DM Mono', monospace;
        }

        .stat-badge {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 11px; font-weight: 500;
            padding: 2px 8px; border-radius: 100px; margin-top: 6px;
        }

        .stat-badge.green { background: var(--green-bg); color: var(--green); }
        .stat-badge.amber { background: var(--amber-bg); color: var(--amber); }
        .stat-badge.indigo { background: var(--indigo-bg); color: var(--indigo); }

        /* ── TABLE CARD ──────────────────────────── */
        .table-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: background 0.3s, border-color 0.3s;
        }

        .table-toolbar {
            padding: 18px 20px;
            display: flex; align-items: center; justify-content: space-between;
            border-bottom: 1px solid var(--border); gap: 12px;
        }

        .toolbar-left { display: flex; align-items: center; gap: 8px; }

        .table-title { font-size: 14px; font-weight: 600; color: var(--text-primary); }

        .count-badge {
            background: var(--surface-2); color: var(--text-secondary);
            border: 1px solid var(--border);
            font-size: 11px; font-weight: 600;
            padding: 2px 8px; border-radius: 100px;
            font-family: 'DM Mono', monospace;
        }

        .toolbar-right { display: flex; align-items: center; gap: 10px; }

        .search-wrap { position: relative; }

        .search-wrap svg {
            position: absolute; left: 10px; top: 50%;
            transform: translateY(-50%);
            width: 14px; height: 14px;
            color: var(--text-muted); pointer-events: none;
        }

        .search-input {
            font-family: 'DM Sans', sans-serif; font-size: 13px;
            padding: 8px 12px 8px 32px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-strong);
            background: var(--surface-2); color: var(--text-primary);
            outline: none; width: 220px;
            transition: border-color 0.15s, background 0.15s;
        }

        .search-input::placeholder { color: var(--text-muted); }

        .search-input:focus { border-color: var(--accent); background: var(--surface); }

        .btn-primary {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 8px 16px; border-radius: var(--radius-sm);
            background: var(--accent); color: var(--accent-fg);
            font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500;
            text-decoration: none; border: none; cursor: pointer;
            transition: opacity 0.15s; white-space: nowrap;
        }

        .btn-primary:hover { opacity: 0.85; }
        .btn-primary svg { width: 14px; height: 14px; fill: none; stroke: currentColor; stroke-width: 1.5; stroke-linecap: round; }

        /* ── TABLE ───────────────────────────────── */
        table { width: 100%; border-collapse: collapse; }

        thead tr { background: var(--surface-2); }

        th {
            padding: 11px 20px; text-align: left;
            font-size: 11px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.06em;
            color: var(--text-muted); border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        th.center, td.center { text-align: center; }

        td {
            padding: 14px 20px; font-size: 14px;
            color: var(--text-primary); border-bottom: 1px solid var(--border);
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr { transition: background 0.1s; }
        tbody tr:hover td { background: var(--surface-2); }

        .row-index {
            font-family: 'DM Mono', monospace;
            font-size: 12px; color: var(--text-muted);
        }

        /* Role name with icon */
        .role-name {
            font-weight: 500;
            display: flex; align-items: center; gap: 10px;
        }

        .role-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: var(--indigo);
            flex-shrink: 0;
        }

        /* Level badge */
        .pill-level {
            display: inline-flex; align-items: center;
            font-size: 12px; font-weight: 500;
            padding: 3px 10px; border-radius: 100px;
        }

        .pill-level.admin   { background: var(--red-bg);   color: var(--red); }
        .pill-level.manager { background: var(--amber-bg); color: var(--amber); }
        .pill-level.staff   { background: var(--green-bg); color: var(--green); }
        .pill-level.default { background: var(--indigo-bg); color: var(--indigo); }

        /* Status badge */
        .status-badge {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; font-weight: 500;
            padding: 3px 10px; border-radius: 100px;
        }

        .status-badge.aktif   { background: var(--green-bg); color: var(--green); }
        .status-badge.nonaktif { background: var(--red-bg); color: var(--red); }

        .status-dot {
            width: 5px; height: 5px;
            border-radius: 50%;
            background: currentColor;
            flex-shrink: 0;
        }

        /* Actions */
        .action-group {
            display: flex; align-items: center; justify-content: center; gap: 6px;
        }

        .btn-action {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 6px 12px; border-radius: var(--radius-sm);
            font-family: 'DM Sans', sans-serif; font-size: 12px; font-weight: 500;
            text-decoration: none; border: 1px solid transparent; cursor: pointer;
            transition: opacity 0.15s, transform 0.1s; white-space: nowrap;
        }

        .btn-action:hover { opacity: 0.8; transform: translateY(-1px); }
        .btn-action:active { transform: translateY(0); }
        .btn-action svg { width: 12px; height: 12px; }

        .btn-edit   { background: var(--amber-bg); color: var(--amber); }
        .btn-delete { background: var(--red-bg);   color: var(--red); }

        /* ── EMPTY STATE ─────────────────────────── */
        .empty-state {
            text-align: center; padding: 60px 20px; color: var(--text-muted);
        }

        .empty-state p { font-size: 14px; margin-top: 8px; }

        /* ── SCROLLBAR ───────────────────────────── */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border-strong); border-radius: 3px; }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="1" width="6" height="6" rx="1.5"/>
                <rect x="9" y="1" width="6" height="6" rx="1.5"/>
                <rect x="1" y="9" width="6" height="6" rx="1.5"/>
                <rect x="9" y="9" width="6" height="6" rx="1.5"/>
            </svg>
        </div>
        <span class="brand-name">Admin Panel</span>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-label">Menu</div>

        <a href="../produk/index.php" class="nav-item">
            <svg viewBox="0 0 16 16" fill="currentColor">
                <path d="M2 2h3v3H2zM2 6.5h3v3H2zM2 11h3v3H2zM6.5 2h7.5v3H6.5zM6.5 6.5h7.5v3H6.5zM6.5 11h7.5v3H6.5z"/>
            </svg>
            Produk
        </a>

        <a href="../kategori/index.php" class="nav-item">
            <svg viewBox="0 0 16 16" fill="currentColor">
                <path d="M1 3a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H2a1 1 0 01-1-1V3zm5.5 0a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H7.5a1 1 0 01-1-1V3zM1 9.5a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H2a1 1 0 01-1-1v-3zm5.5 0a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H7.5a1 1 0 01-1-1v-3z"/>
            </svg>
            Kategori
        </a>

        <a href="../role/index.php" class="nav-item active">
            <svg viewBox="0 0 16 16" fill="currentColor">
                <path d="M8 8a3 3 0 100-6 3 3 0 000 6zm-5 5a5 5 0 0110 0H3z"/>
            </svg>
            Role
        </a>
    </div>

    <div class="sidebar-footer">
        <button class="theme-toggle" onclick="toggleDark()" id="themeBtn">
            <svg viewBox="0 0 16 16" fill="currentColor" id="themeIcon">
                <path d="M8 1a7 7 0 100 14A7 7 0 008 1zM3 8a5 5 0 019.95-1H3.05A5.002 5.002 0 013 8z"/>
            </svg>
            <span id="themeLabel">Mode Gelap</span>
        </button>
    </div>
</aside>

<!-- MAIN -->
<main class="main">

    <div class="topbar">
        <div class="breadcrumb">
            Admin
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M4.5 3l3 3-3 3"/>
            </svg>
            <span>Role</span>
        </div>
        <div class="avatar">AD</div>
    </div>

    <div class="content">

        <div class="page-header">
            <h1 class="page-title">Manajemen Role</h1>
            <p class="page-subtitle">Kelola semua role dan hak akses pengguna.</p>
        </div>

        <!-- STATS -->
        <div class="stats-row">
            <?php
                $data_count = readRole($conn);
                $total = mysqli_num_rows($data_count);
            ?>
            <div class="stat-card">
                <div class="stat-label">Total Role</div>
                <div class="stat-value"><?= $total ?></div>
                <div class="stat-badge indigo">● Terdaftar</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Role Aktif</div>
                <div class="stat-value">—</div>
                <div class="stat-badge green">↑ Aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Status Sistem</div>
                <div class="stat-value" style="font-size:20px;letter-spacing:0">Online</div>
                <div class="stat-badge amber">● Berjalan normal</div>
            </div>
        </div>

        <!-- TABLE CARD -->
        <div class="table-card">
            <div class="table-toolbar">
                <div class="toolbar-left">
                    <span class="table-title">Semua Role</span>
                    <span class="count-badge" id="countBadge"><?= $total ?></span>
                </div>
                <div class="toolbar-right">
                    <div class="search-wrap">
                        <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="7" cy="7" r="4.5"/>
                            <path d="M10.5 10.5L14 14"/>
                        </svg>
                        <input type="text" class="search-input" id="searchInput" placeholder="Cari role...">
                    </div>
                    <a href="insert.php" class="btn-primary">
                        <svg viewBox="0 0 16 16"><path d="M8 1v14M1 8h14" stroke-linecap="round"/></svg>
                        Tambah Role
                    </a>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th width="7%" class="center">#</th>
                        <th>Nama Role</th>
                        <th>Deskripsi</th>
                        <th class="center">Status</th>
                        <th width="20%" class="center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php
                   
                    ?>
                    <tr>
                        <td class="center row-index"><?= str_pad($no++, 2, '0', STR_PAD_LEFT) ?></td>
                        <td>
                            <div class="role-name">
                                <span class="role-dot"></span>
                                <?= htmlspecialchars($row['nama']) ?>
                            </div>
                        </td>
                        <td style="color: var(--text-secondary); font-size: 13px;">
                            <?= htmlspecialchars($row['deskripsi'] ?? '—') ?>
                        </td>
                        <td class="center">
                            <?php
                                $status = strtolower($row['status'] ?? 'aktif');
                                $label  = ucfirst($status);
                            ?>
                            <span class="status-badge <?= $status === 'aktif' ? 'aktif' : 'nonaktif' ?>">
                                <span class="status-dot"></span>
                                <?= $label ?>
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="./role_aksi.php?aksi=edit&id=<?= $row['id'] ?>" class="btn-action btn-edit">
                                    <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M1 11l2.5-.5L10 4 8 2 1.5 8.5 1 11z"/>
                                        <path d="M8 2l2 2"/>
                                    </svg>
                                    Edit
                                </a>
                                <a href="./role_aksi.php?aksi=delete&id=<?= $row['id'] ?>"
                                   class="btn-action btn-delete"
                                   onclick="return confirm('Hapus role ini?')">
                                    <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M2 3h8M5 3V2h2v1M4 3v6h4V3" stroke-linecap="round"/>
                                    </svg>
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <?php if ($total === 0): ?>
            <div class="empty-state">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.2" opacity="0.3">
                    <circle cx="20" cy="15" r="7"/>
                    <path d="M6 35a14 14 0 0128 0"/>
                </svg>
                <p>Belum ada role. Tambahkan role pertama Anda.</p>
            </div>
            <?php endif; ?>
        </div>

    </div>
</main>

<script>
    function toggleDark() {
        const dark = document.body.classList.toggle('dark')
        localStorage.setItem('theme', dark ? 'dark' : 'light')
        updateThemeBtn(dark)
    }

    function updateThemeBtn(dark) {
        document.getElementById('themeLabel').textContent = dark ? 'Mode Terang' : 'Mode Gelap'
        const icon = document.getElementById('themeIcon')
        icon.innerHTML = dark
            ? '<path d="M8 2a6 6 0 100 12A6 6 0 008 2z"/><circle cx="8" cy="8" r="2.5" fill="var(--bg)"/>'
            : '<path d="M8 1a7 7 0 100 14A7 7 0 008 1zM3 8a5 5 0 019.95-1H3.05A5.002 5.002 0 013 8z"/>'
    }

    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark')
        updateThemeBtn(true)
    }

    document.getElementById('searchInput').addEventListener('input', function() {
        const q = this.value.toLowerCase()
        const rows = document.querySelectorAll('#tableBody tr')
        let visible = 0
        rows.forEach(row => {
            const match = row.innerText.toLowerCase().includes(q)
            row.style.display = match ? '' : 'none'
            if (match) visible++
        })
        document.getElementById('countBadge').textContent = visible
    })
</script>

</body>
</html>