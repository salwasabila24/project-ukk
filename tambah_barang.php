<!-- tambah_barang.php -->
<?php include 'includes/cek_session.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Barang - SellPoint</title>
<head>
    <title>Tambah Barang - SellPoint</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:linear-gradient(135deg,#EAF6FF,#CFEAFF,#DDEFFF);
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            padding:30px;
        }

        h1{
            color:#2F6DA8;
            margin-bottom:20px;
        }

        form{
            background:#FFFFFF;
            padding:30px;
            border-radius:18px;
            box-shadow:0 8px 20px rgba(0,0,0,.1);
            width:100%;
            max-width:450px;
        }

        table{
            width:100%;
        }

        td{
            padding:10px 0;
            color:#444;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"]{
            width:100%;
            padding:10px;
            border:1px solid #B7D9F8;
            border-radius:10px;
            background:#F8FCFF;
            outline:none;
            transition:.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus{
            border-color:#6EB8F7;
            box-shadow:0 0 6px rgba(110,184,247,.3);
        }

        input[type="submit"]{
            width:100%;
            padding:12px;
            background:#8CCBFF;
            color:#1F4E79;
            border:none;
            border-radius:10px;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:.3s;
            margin-top:10px;
        }

        input[type="submit"]:hover{
            background:#6EB8F7;
            color:white;
        }

        p{
            margin-top:20px;
        }

        p a{
            text-decoration:none;
            background:#A9D6FF;
            color:#1F4E79;
            padding:10px 20px;
            border-radius:10px;
            font-weight:bold;
            transition:.3s;
        }

        p a:hover{
            background:#8CCBFF;
        }
    </style>

</head>
<body>
    <h1>Tambah Barang</h1>
    <form action="proses_tambah_barang.php" method="POST">
        <table>
            <tr><td>Kode Barang</td><td>:</td>
                <td><input type="text" name="kode_barang" required></td></tr>
            <tr><td>Nama Barang</td><td>:</td>
                <td><input type="text" name="nama_barang" required></td></tr>
            <tr><td>Harga Satuan</td><td>:</td>
                <td><input type="number" name="harga_satuan" step="0.01" required></td></tr>
            <tr><td>Stok</td><td>:</td>
                <td><input type="number" name="stok" required></td></tr>
            <tr><td>Tanggal Kadaluarsa</td><td>:</td>
                <td><input type="date" name="tanggal_kadaluarsa"></td></tr>
            <tr><td colspan="3"><input type="submit" value="Simpan"></td></tr>
        </table>
    </form>
    <p><a href="data_barang.php">Kembali</a></p>
</body>
</html>