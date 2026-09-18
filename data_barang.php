<?php
// data_barang.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql   = "SELECT * FROM tbl_barang ORDER BY nama_barang ASC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head><title>Data Barang - SellPoint</title>
<head>
    <title>Data Barang - SellPoint</title>

    <!-- CSS TARUH DI SINI -->
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:linear-gradient(135deg,#EAF6FF,#CFEAFF,#DDEFFF);
            padding:40px;
        }

        h1{
            color:#2F6DA8;
            text-align:center;
            margin-bottom:20px;
        }

        p{
            text-align:center;
            margin-bottom:25px;
        }

        p a{
            text-decoration:none;
            background:#A9D6FF;
            color:#1F4E79;
            padding:10px 18px;
            border-radius:10px;
            font-weight:bold;
            margin:0 8px;
            transition:.3s;
        }

        p a:hover{
            background:#8CCBFF;
        }

        table{
            width:90%;
            margin:auto;
            border-collapse:collapse;
            background:white;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 8px 20px rgba(0,0,0,.1);
        }

        th{
            background:#8CCBFF;
            color:#1F4E79;
            padding:14px;
            font-size:15px;
        }

        td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #E8F2FC;
            color:#444;
        }

        tr:nth-child(even){
            background:#F7FBFF;
        }

        tr:hover{
            background:#EAF5FF;
        }

        td a{
            text-decoration:none;
            font-weight:bold;
            margin:0 4px;
        }

        td a:first-child{
            color:#2F6DA8;
        }

        td a:last-child{
            color:#D9534F;
        }

        td a:hover{
            text-decoration:underline;
        }
    </style>

</head>
</head>
<body>
    <h1>Data Barang SellPoint</h1>
    <p><a href="dashboard.php">Kembali ke Dashboard</a> | <a href="tambah_barang.php">Tambah Barang</a></P>
    <table border="1" cellpadding="6">
        <tr>
            <th>Kode</th><th>Nama Barang</th><th>Harga Satuan</th>
            <th>Stok</th><th>Kadaluarsa</th><th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?php echo $row['kode_barang']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo number_format($row['harga_satuan'], 0, ',', '.'); ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['tanggal_kadaluarsa']; ?></td>
            <td>
                <a href="edit_barang.php?id=<?php echo $row['id_barang']; ?>">Edit</a> |
                <a href="hapus_barang.php?id=<?php echo $row['id_barang']; ?>"
                    onclick="return confirm('Yakin hapus barang ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>