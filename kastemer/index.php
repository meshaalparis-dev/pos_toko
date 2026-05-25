<?php include './aciont.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Toko Saya</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono&display=swap" rel="stylesheet">

    <!-- ICON -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        :root {
            --bg: #F6F5F2;
            --surface: #FFFFFF;
            --surface-2: #F0EEE9;
            --surface-3: #E8E6E0;
            --border: rgba(0, 0, 0, 0.08);
            --border-strong: rgba(0, 0, 0, 0.14);

            --text-primary: #1A1917;
            --text-secondary: #6B6860;
            --text-muted: #A09D98;

            --accent: #1A1917;
            --accent-fg: #FFFFFF;

            --green: #16a34a;
            --green-light: #dcfce7;

            --amber: #d97706;
            --amber-light: #fef3c7;

            --red: #ef4444;
            --red-light: #fee2e2;

            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-full: 9999px;

            --shadow-sm: 0 2px 8px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 20px rgba(0,0,0,0.08);

            --sidebar-w: 240px;
            --right-w: 360px;
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
            display: flex;
            min-height: 100vh;
        }

        .material-symbols-outlined {
            font-size: 20px;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 28px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 18px;
            font-weight: 700;
            border-bottom: 1px solid var(--border);
        }

        .brand-icon {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: var(--accent);
        }

        .nav {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: var(--radius-sm);
            text-decoration: none;
            color: var(--text-secondary);
            transition: .2s;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-item:hover {
            background: var(--surface-2);
            color: var(--text-primary);
        }

        .nav-item.active {
            background: var(--accent);
            color: white;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px;
            border-top: 1px solid var(--border);
        }

        .theme-btn {
            width: 100%;
            padding: 12px;
            border-radius: var(--radius-sm);
            border: none;
            background: var(--surface-2);
            cursor: pointer;
            font-weight: 600;
        }

        /* MAIN */

        .main {
            margin-left: var(--sidebar-w);
            margin-right: var(--right-w);
            width: 100%;
            min-height: 100vh;
        }

        .topbar {
            height: 70px;
            padding: 0 32px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--bg);
        }

        .topbar-title {
            font-size: 18px;
            font-weight: 700;
        }

        .topbar-right {
            display: flex;
            align-items: center;
        }

        .search-box {
            width: 260px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            background: var(--surface);
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            background: transparent;
            font-family: inherit;
        }

        /* CANVAS */

        .canvas {
            padding: 28px 32px;
        }

        /* CHIPS */

        .chips-row {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            margin-bottom: 24px;
        }

        .chip {
            padding: 8px 18px;
            border-radius: var(--radius-full);
            border: 1px solid var(--border);
            background: var(--surface);
            color: var(--text-secondary);
            cursor: pointer;
            white-space: nowrap;
            transition: .2s;
        }

        .chip.active {
            background: var(--accent);
            color: white;
            border-color: var(--accent);
        }

        /* GRID */

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(210px, 1fr));
            gap: 18px;
        }

        .product-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: .2s;
        }

        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .product-img {
            position: relative;
            aspect-ratio: 1;
            overflow: hidden;
            background: var(--surface-2);
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .stock-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: var(--radius-full);
            background: white;
            font-size: 11px;
            font-weight: 600;
        }

        .stock-badge.low {
            background: var(--amber-light);
            color: var(--amber);
        }

        .stock-badge.out {
            background: var(--red-light);
            color: var(--red);
        }

        .product-body {
            padding: 14px;
        }

        .product-category {
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .product-name {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 14px;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-family: 'DM Mono', monospace;
            font-size: 14px;
            font-weight: 600;
        }

        .add-btn {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: var(--accent);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: .2s;
        }

        .add-btn:hover {
            opacity: .8;
        }

        /* RIGHT SIDEBAR */

        .order-sidebar {
            position: fixed;
            right: 0;
            top: 0;
            width: var(--right-w);
            height: 100vh;
            background: var(--surface);
            border-left: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .order-header {
            padding: 28px 24px;
            border-bottom: 1px solid var(--border);
        }

        .order-title {
            font-size: 20px;
            font-weight: 700;
        }

        .order-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .order-items {
            flex: 1;
            overflow-y: auto;
            padding: 16px;
        }

        .order-footer {
            padding: 20px;
            border-top: 1px solid var(--border);
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .total-value {
            font-family: 'DM Mono', monospace;
            font-size: 20px;
            font-weight: 700;
        }

        .btn-checkout {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: var(--radius-sm);
            background: var(--accent);
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="sidebar-brand">
            <div class="brand-icon"></div>
            Toko Saya
        </div>

        <nav class="nav">

            <a href="index.php" class="nav-item active">
                Kastemer
            </a>

            <a href="../category/index.php" class="nav-item">
                Category
            </a>

            <a href="../role/index.php" class="nav-item">
                Role
            </a>

            <a href="../produk/index.php" class="nav-item">
                Produk
            </a>

        </nav>

        <div class="sidebar-footer">
            <button class="theme-btn">
                Dark Mode
            </button>
        </div>

    </aside>

    <!-- MAIN -->

    <main class="main">

        <header class="topbar">

            <span class="topbar-title">
                Kasir
            </span>

            <div class="topbar-right">

                <div class="search-box">

                    <span class="material-symbols-outlined" style="font-size:18px;color:var(--text-muted)">
                        search
                    </span>

                    <input type="text" placeholder="Cari produk...">

                </div>

            </div>

        </header>

        <!-- CANVAS -->

        <div class="canvas">

            <!-- CATEGORY -->

            <div class="chips-row">

                <button class="chip active">
                    Semua
                </button>

                <?php
                $dataCategory = showDataCategory($conn);

                while ($row = $dataCategory->fetch_assoc()):
                ?>

                    <button class="chip">
                        <?= htmlspecialchars($row['nama']) ?>
                    </button>

                <?php endwhile; ?>

            </div>

            <!-- PRODUCT GRID -->

            <div class="product-grid">

                <?php
                $dataProduct = readProduct($conn);

                while ($product = $dataProduct->fetch_assoc()):

                    $stok = $product['stok'];

                    $badgeClass =
                        $stok <= 0 ? 'out' :
                        ($stok <= 5 ? 'low' : '');
                ?>

                    <div class="product-card">

                        <div class="product-img">

                                src="../product/image_product/<?= htmlspecialchars($product['image']) ?>"
                                alt="<?= htmlspecialchars($product['nama']) ?>">
                            <img
                                src="../product/image_product/<?= htmlspecialchars($product['image']) ?>"
                                alt="<?= htmlspecialchars($product['nama']) ?>">

                            <span class="stock-badge <?= $badgeClass ?>">
                                Stok <?= $stok ?>
                            </span>

                        </div>

                        <div class="product-body">

                            <div class="product-category">
                                <?= htmlspecialchars($product['nama_category']) ?>
                            </div>

                            <div class="product-name">
                                <?= htmlspecialchars($product['nama']) ?>
                            </div>

                            <div class="product-footer">

                                <div class="product-price">
                                    Rp <?= number_format($product['harga'], 0, ',', '.') ?>
                                </div>

                                <a
                                    href="action.php?aksi=insertCart&id_user=1&id_product=<?= $product['id'] ?>"
                                    class="add-btn">

                                    <span class="material-symbols-outlined">
                                        add
                                    </span>

                                </a>

                            </div>

                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    </main>

    <!-- RIGHT SIDEBAR -->

    <aside class="order-sidebar">

        <div class="order-header">

            <div class="order-title">
                Pesanan
            </div>

            <div class="order-subtitle">
                Daftar item yang dipilih
            </div>

        </div>

        <div class="order-items">

            <?php require_once './sedebar.php'; ?>

        </div>

        <div class="order-footer">

            <div class="total-row">

                <span>Total</span>

                <span class="total-value">
                    Rp 0
                </span>

            </div>

            <button class="btn-checkout">
                Proses Pembayaran
            </button>

        </div>

    </aside>

</body>

</html>