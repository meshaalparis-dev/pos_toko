<!DOCTYPE html>
<html>
<head>
    <title>Tambah Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 40px;
        }
        .card {
            max-width: 500px;
            background: white;
            padding: 30px;
            margin: auto;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        input, textarea, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box; /* Agar padding tidak merusak lebar */
        }
        button {
            padding: 12px 20px;
            background: black;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }
        button:hover {
            background: #333;
        }
        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Tambah Role</h2>

    <!-- HANYA GUNAKAN SATU FORM. Action harus mengarah ke aciont.php -->
    <form action="aciont.php?aksi=insert" method="POST">

        <label style="font-size: 14px; color: #555;">Nama Role</label>
        <input 
            type="text" 
            name="nama" 
            placeholder="Contoh: Admin" 
            required
        >

        <label style="font-size: 14px; color: #555;">Deskripsi</label>
        <textarea 
            name="deskripsi" 
            placeholder="Jelaskan hak akses role ini..."
            rows="3"
        ></textarea>

        <label style="font-size: 14px; color: #555;">Status</label>
        

        <button type="submit">Simpan </button>
        
        
    </form>
</div>

</body>
</html>