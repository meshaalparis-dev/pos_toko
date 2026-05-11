<?php include './role_aksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role — Admin Panel</title>

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
            --amber: #B45309;
            --amber-bg: #FEF3C7;
            --amber-border: rgba(180,83,9,0.2);
            --red: #B91C1C;
            --red-bg: #FEE2E2;
            --indigo: #4338CA;
            --indigo-bg: #EEF2FF;
            --green: #1D6F42;
            --green-bg: #EAF5EE;
            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
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
            --amber: #FCD34D;
            --amber-bg: rgba(252,211,77,0.1);
            --amber-border: rgba(252,211,77,0.2);
            --red: #F87171;
            --red-bg: rgba(248,113,113,0.12);
            --indigo: #818CF8;
            --indigo-bg: rgba(129,140,248,0.12);
            --green: #34D399;
            --green-bg: rgba(52,211,153,0.12);
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.3);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            min-height: 100vh;
            transition: background 0.3s, color 0.3s;
        }

        /* ── SIDEBAR ─────────────────────────── */
        .sidebar {
            position: fixed; top: 0; left: 0;
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
            width: 32px; height: 32px; border-radius: var(--radius-sm);
            background: var(--accent);
            display: flex; align-items: center; justify-content: center; flex-shrink: 0;
        }

        .brand-icon svg { width: 16px; height: 16px; fill: var(--accent-fg); }
        .brand-name { font-size: 15px; font-weight: 600; color: var(--text-primary); letter-spacing: -0.3px; }

        .sidebar-section { padding: 20px 12px 8px; flex: 1; }

        .sidebar-label {
            font-size: 10px; font-weight: 600; letter-spacing: 0.08em;
            text-transform: uppercase; color: var(--text-muted);
            padding: 0 8px; margin-bottom: 6px;
        }

        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 10px; border-radius: var(--radius-sm);
            text-decoration: none; color: var(--text-secondary);
            font-size: 14px; transition: background 0.15s, color 0.15s; margin-bottom: 2px;
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

        /* ── MAIN ───────────────────────────── */
        .main { margin-left: 240px; min-height: 100vh; display: flex; flex-direction: column; }

        .topbar {
            background: var(--surface); border-bottom: 1px solid var(--border);
            padding: 0 32px; height: 60px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 50;
            transition: background 0.3s, border-color 0.3s;
        }

        .breadcrumb {
            display: flex; align-items: center; gap: 6px;
            font-size: 13px; color: var(--text-muted);
        }

        .breadcrumb a { color: var(--text-muted); text-decoration: none; transition: color 0.15s; }
        .breadcrumb a:hover { color: var(--text-primary); }
        .breadcrumb span { color: var(--text-primary); font-weight: 500; }

        .avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--surface-2); border: 1.5px solid var(--border-strong);
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; font-weight: 600; color: var(--text-secondary);
        }

        /* ── CONTENT ────────────────────────── */
        .content {
            padding: 36px 32px; flex: 1;
            display: flex; align-items: flex-start; justify-content: center;
        }

        .edit-wrap { width: 100%; max-width: 560px; }

        .page-header { margin-bottom: 24px; }

        .page-title {
            font-size: 22px; font-weight: 600;
            letter-spacing: -0.5px; color: var(--text-primary); margin-bottom: 4px;
        }

        .page-subtitle { font-size: 14px; color: var(--text-secondary); }

        /* ── BANNER ─────────────────────────── */
        .banner {
            display: flex; align-items: flex-start; gap: 10px;
            padding: 12px 14px;
            background: var(--amber-bg); border: 1px solid var(--amber-border);
            border-radius: var(--radius-md); margin-bottom: 20px;
        }

        .banner svg { width: 15px; height: 15px; color: var(--amber); flex-shrink: 0; margin-top: 1px; }
        .banner-text { font-size: 13px; color: var(--amber); line-height: 1.5; }
        .banner-text strong { font-weight: 600; }

        /* ── FORM CARD ──────────────────────── */
        .form-card {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);
            overflow: hidden;
            transition: background 0.3s, border-color 0.3s;
            margin-bottom: 16px;
        }

        .form-card-header {
            padding: 18px 20px; border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
        }

        .form-card-title { font-size: 14px; font-weight: 600; color: var(--text-primary); }

        .edit-badge {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 11px; font-weight: 600; padding: 3px 10px;
            border-radius: 100px;
            background: var(--amber-bg); color: var(--amber); border: 1px solid var(--amber-border);
        }

        .edit-badge svg { width: 10px; height: 10px; }

        .form-body { padding: 20px; }

        /* ── ORIGINAL ROW ───────────────────── */
        .original-row {
            display: grid; grid-template-columns: repeat(2, 1fr);
            gap: 10px; margin-bottom: 22px;
        }

        .original-field {
            padding: 10px 12px;
            background: var(--surface-2);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
        }

        .original-label {
            font-size: 10px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.07em;
            color: var(--text-muted); margin-bottom: 3px;
        }

        .original-value {
            font-size: 13px; color: var(--text-secondary);
            font-family: 'DM Mono', monospace;
        }

        /* ── FIELDS ─────────────────────────── */
        .fields-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 4px; }
        .field-full { grid-column: 1 / -1; }
        .field-group { display: flex; flex-direction: column; }

        label {
            font-size: 11px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 0.06em;
            color: var(--text-secondary); margin-bottom: 6px;
        }

        .input-wrap { position: relative; }

        .input-wrap svg {
            position: absolute; left: 11px; top: 50%;
            transform: translateY(-50%);
            width: 14px; height: 14px;
            color: var(--text-muted); pointer-events: none;
        }

        .input-wrap.textarea-wrap svg { top: 14px; transform: none; }

        input[type="text"], select, textarea {
            width: 100%;
            font-family: 'DM Sans', sans-serif; font-size: 14px;
            padding: 10px 12px 10px 34px;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-strong);
            background: var(--surface-2); color: var(--text-primary);
            outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }

        select { cursor: pointer; appearance: none; }

        textarea { resize: vertical; min-height: 90px; }

        input[type="text"]::placeholder,
        textarea::placeholder { color: var(--text-muted); }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            border-color: var(--accent); background: var(--surface);
            box-shadow: 0 0 0 3px rgba(26,25,23,0.08);
        }

        body.dark input:focus,
        body.dark select:focus,
        body.dark textarea:focus {
            box-shadow: 0 0 0 3px rgba(242,240,235,0.1);
        }

        .select-wrap::after {
            content: '';
            position: absolute; right: 12px; top: 50%;
            transform: translateY(-50%);
            width: 0; height: 0;
            border-left: 4px solid transparent;
            border-right: 4px solid transparent;
            border-top: 5px solid var(--text-muted);
            pointer-events: none;
        }

        .field-hint { font-size: 11px; color: var(--text-muted); margin-top: 5px; }

        /* ── DIVIDER ────────────────────────── */
        .divider { height: 1px; background: var(--border); margin: 20px 0; }

        /* ── ACTIONS ────────────────────────── */
        .form-actions { display: flex; gap: 8px; }

        .btn-save {
            flex: 1; font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500;
            padding: 10px 20px; border-radius: var(--radius-sm);
            background: var(--accent); color: var(--accent-fg);
            border: none; cursor: pointer; transition: opacity 0.15s;
            display: flex; align-items: center; justify-content: center; gap: 6px;
        }

        .btn-save:hover { opacity: 0.85; }
        .btn-save svg { width: 14px; height: 14px; fill: none; stroke: currentColor; stroke-width: 1.5; stroke-linecap: round; stroke-linejoin: round; }

        .btn-cancel {
            font-family: 'DM Sans', sans-serif; font-size: 13px; font-weight: 500;
            padding: 10px 16px; border-radius: var(--radius-sm);
            background: var(--surface-2); color: var(--text-secondary);
            border: 1px solid var(--border-strong); cursor: pointer;
            text-decoration: none; display: flex; align-items: center; gap: 6px;
            transition: background 0.15s, color 0.15s;
        }

        .btn-cancel:hover { background: var(--border); color: var(--text-primary); }
        .btn-cancel svg { width: 14px; height: 14px; }

        /* ── DANGER ZONE ────────────────────── */
        .danger-zone {
            background: var(--surface); border: 1px solid var(--border);
            border-radius: var(--radius-lg); overflow: hidden;
            transition: background 0.3s, border-color 0.3s;
        }

        .danger-header {
            padding: 14px 20px; border-bottom: 1px solid var(--border);
            display: flex; align-items: center; gap: 8px;
        }

        .danger-header svg { width: 14px; height: 14px; color: var(--red); flex-shrink: 0; }
        .danger-title { font-size: 13px; font-weight: 600; color: var(--red); }

        .danger-body {
            padding: 16px 20px;
            display: flex; align-items: center; justify-content: space-between; gap: 16px;
        }

        .danger-desc { font-size: 13px; color: var(--text-secondary); line-height: 1.5; }

        .btn-danger {
            font-family: 'DM Sans', sans-serif; font-size: 12px; font-weight: 500;
            padding: 8px 14px; border-radius: var(--radius-sm);
            background: var(--red-bg); color: var(--red);
            border: none; cursor: pointer; text-decoration: none;
            white-space: nowrap; transition: opacity 0.15s;
            display: inline-flex; align-items: center; gap: 5px;
        }

        .btn-danger:hover { opacity: 0.75; }
        .btn-danger svg { width: 12px; height: 12px; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border-strong); border-radius: 3px; }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon">
            <svg viewBox="0 0 16 16"><rect x="1" y="1" width="6" height="6" rx="1.5"/><rect x="9" y="1" width="6" height="6" rx="1.5"/><rect x="1" y="9" width="6" height="6" rx="1.5"/><rect x="9" y="9" width="6" height="6" rx="1.5"/></svg>
        </div>
        <span class="brand-name">Admin Panel</span>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-label">Menu</div>

        <a href="../produk/index.php" class="nav-item">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 2h3v3H2zM2 6.5h3v3H2zM2 11h3v3H2zM6.5 2h7.5v3H6.5zM6.5 6.5h7.5v3H6.5zM6.5 11h7.5v3H6.5z"/></svg>
            Produk
        </a>

        <a href="../kategori/index.php" class="nav-item">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 3a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H2a1 1 0 01-1-1V3zm5.5 0a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H7.5a1 1 0 01-1-1V3zM1 9.5a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H2a1 1 0 01-1-1v-3zm5.5 0a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 01-1 1H7.5a1 1 0 01-1-1v-3z"/></svg>
            Kategori
        </a>

        <a href="index.php" class="nav-item active">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 8a3 3 0 100-6 3 3 0 000 6zm-5 5a5 5 0 0110 0H3z"/></svg>
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
            <a href="index.php">Role</a>
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M4.5 3l3 3-3 3"/>
            </svg>
            <span>Edit</span>
        </div>
        <div class="avatar">AD</div>
    </div>

    <div class="content">
        <div class="edit-wrap">

            <?php $data = showDataEditRole($conn, $_GET['id']); ?>

            <div class="page-header">
                <h1 class="page-title">Edit Role</h1>
                <p class="page-subtitle">Perbarui informasi role yang sudah ada.</p>
            </div>

            <!-- WARNING BANNER -->
            <div class="banner">
                <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M8 1.5L14.5 13H1.5L8 1.5z" stroke-linejoin="round"/>
                    <path d="M8 6v3.5M8 11v.5" stroke-linecap="round"/>
                </svg>
                <div class="banner-text">
                    <strong>Perhatian:</strong> Perubahan role akan langsung mempengaruhi semua pengguna yang memiliki role ini.
                </div>
            </div>

            <!-- FORM CARD -->
            <div class="form-card">
                <div class="form-card-header">
                    <div class="form-card-title">Detail Role</div>
                    <span class="edit-badge">
                        <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M1 11l2-.5L9.5 4 8 2.5 1.5 9 1 11z"/>
                        </svg>
                        Sedang diedit
                    </span>
                </div>

                <div class="form-body">

                    <!-- Original values -->
                    <div class="original-row">
                        <div class="original-field">
                            <div class="original-label">Nama Sekarang</div>
                            <div class="original-value"><?= htmlspecialchars($data['nama']) ?></div>
                        </div>
                        <div class="original-field">
                            <div class="original-label">Status Sekarang</div>
                            <div class="original-value"><?= htmlspecialchars($data['status'] ?? 'aktif') ?></div>
                        </div>
                    </div>

                    <form action="index.php?aksi=update&id=<?= $_GET['id'] ?>" method="post">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">

                        <div class="fields-grid">

                            <!-- Nama Role -->
                            <div class="field-group field-full">
                                <label for="edit_role">Nama Role</label>
                                <div class="input-wrap">
                                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M8 8a3 3 0 100-6 3 3 0 000 6zm-5 5a5 5 0 0110 0H3z"/>
                                    </svg>
                                    <input type="text" id="edit_role" name="edit_role"
                                           value="<?= htmlspecialchars($data['nama']) ?>"
                                           placeholder="Nama role..." required autocomplete="off">
                                </div>
                            </div>

                            <!-- Deskripsi -->
                            <div class="field-group field-full">
                                <label for="edit_deskripsi">Deskripsi</label>
                                <div class="input-wrap textarea-wrap">
                                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <rect x="2" y="2" width="12" height="12" rx="2"/>
                                        <path d="M5 6h6M5 9h4"/>
                                    </svg>
                                    <textarea id="edit_deskripsi" name="edit_deskripsi"
                                              placeholder="Deskripsi role..."><?= htmlspecialchars($data['deskripsi'] ?? '') ?></textarea>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="field-group field-full">
                                <label for="edit_status">Status</label>
                                <div class="input-wrap select-wrap">
                                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <circle cx="8" cy="8" r="6"/>
                                        <path d="M8 5v3l2 2" stroke-linecap="round"/>
                                    </svg>
                                    <select id="edit_status" name="edit_status">
                                        <option value="aktif"    <?= ($data['status'] ?? '') === 'aktif'    ? 'selected' : '' ?>>Aktif</option>
                                        <option value="nonaktif" <?= ($data['status'] ?? '') === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                                    </select>
                                </div>
                                <div class="field-hint">Role nonaktif tidak dapat digunakan oleh pengguna</div>
                            </div>

                        </div>

                        <div class="divider"></div>

                        <div class="form-actions">
                            <a href="index.php" class="btn-cancel">
                                <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M8.5 2.5L4 7l4.5 4.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Batal
                            </a>
                            <button type="submit" class="btn-save">
                                <svg viewBox="0 0 16 16">
                                    <path d="M2 8.5l4 4 8-8"/>
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- DANGER ZONE -->
            <div class="danger-zone">
                <div class="danger-header">
                    <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="8" cy="8" r="6"/>
                        <path d="M8 5v3.5M8 10.5v.5" stroke-linecap="round"/>
                    </svg>
                    <span class="danger-title">Zona Berbahaya</span>
                </div>
                <div class="danger-body">
                    <div class="danger-desc">Menghapus role ini bersifat permanen. Pengguna dengan role ini akan kehilangan hak aksesnya.</div>
                    <a href="./role_aksi.php?aksi=delete&id=<?= $_GET['id'] ?>"
                       class="btn-danger"
                       onclick="return confirm('Yakin ingin menghapus role ini secara permanen?')">
                        <svg viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                            <path d="M2 3h8M5 3V2h2v1M4 3v6h4V3"/>
                        </svg>
                        Hapus Role
                    </a>
                </div>
            </div>

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
</script>

</body>
</html>
