<?php
//riwayat_transaksi.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT t.id_transaksi, t.no_transaksi, t.tanggal, t.total_bayar, u.nama_lengkap AS nama_kasir
        FROM tbl_transaksi t
        JOIN tbl_user u ON t.id_kasir = u.id_user
        ORDER BY t.tanggal DESC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head><title>Riwayat Transaksi - Warung ABC</title>
<head>
    <title>Riwayat Transaksi - SellPoint</title>

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
            text-align:center;
            color:#2F6DA8;
            margin-bottom:25px;
        }

        table{
            width:90%;
            margin:auto;
            border-collapse:collapse;
            background:#FFFFFF;
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

        /* Kolom Total Bayar */
        td:last-child{
            font-weight:bold;
            color:#2F6DA8;
        }

        /* Tombol kembali */
        p{
            text-align:center;
            margin-top:25px;
        }

        p a{
            display:inline-block;
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
</head>
<body>
    <h1>Riwayat Transaksi</h1>
    <table border="1" cellpadding"6">
        <tr><th>No.Transaksi</th><th>Tanggal</th><th>Kasir</th><th>Total Bayar</th><th>Aksi</th></tr>
        <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <tr>
            <td><?php echo $row['no_transaksi']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['nama_kasir']; ?></td>
            <td><?php echo number_format ($row['total_bayar'], 0, ',', '.'); ?></td>
            <td><a href="struk.php?id=<?php echo $row['id_transaksi']; ?>">Cetak</a></td>
        </tr>
    <?php } ?>
    </table>
    <p><a href="dashboard.php">Kembali ke Dashboard</a></p>

</body>
</html>