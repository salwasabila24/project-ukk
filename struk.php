<?php
// struk.php
include "includes/cek_session.php";
include "config/koneksi.php";

$id_transaksi = $_GET['id'];

$sql_header  = "SELECT t.*, u.nama_lengkap AS nama_kasir, p.nama_pelanggan";
$sql_header .= " FROM tbl_transaksi t";
$sql_header .= " JOIN tbl_user u ON t.id_kasir = u.id_user";
$sql_header .= " LEFT JOIN tbl_pelanggan p ON t.id_pelanggan = p.id_pelanggan";
$sql_header .= " WHERE t.id_transaksi = '$id_transaksi'";
$transaksi = mysqli_fetch_assoc(mysqli_query($koneksi, $sql_header));

$sql_detail  = "SELECT d.jumlah, d.subtotal, b.nama_barang, b.harga_satuan";
$sql_detail .= " FROM tbl_detail_transaksi d";
$sql_detail .= " JOIN tbl_barang b ON d.id_barang = b.id_barang";
$sql_detail .= " WHERE d.id_transaksi = '$id_transaksi'";
$detail = mysqli_query($koneksi, $sql_detail);
?>
<!DOCTYPE html>
<html>
<head><title>Struk Transaksi - SellPoint</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', Arial, sans-serif;
}

body{
    background:linear-gradient(135deg,#EAF6FF,#D9EEFF);
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    min-height:100vh;
    padding:30px;
}

/* Card putih utama */
body::before{
    content:"";
    position:absolute;
    width:700px;
    max-width:95%;
    height:fit-content;
    background:#fff;
    border-radius:25px;
    box-shadow:0 12px 30px rgba(80,140,200,.18);
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    z-index:-1;
}

/* Judul */
h2{
    width:700px;
    max-width:95%;
    background:linear-gradient(90deg,#7EC8FF,#5AAEF5);
    color:white;
    text-align:center;
    padding:22px;
    border-radius:25px 25px 0 0;
    font-size:30px;
    letter-spacing:1px;
}

/* Info transaksi */
h2 + p{
    width:700px;
    max-width:95%;
    background:white;
    padding:22px 28px;
    color:#34597C;
    line-height:2;
    font-size:15px;
    border-left:3px solid #8CCBFF;
    border-right:3px solid #8CCBFF;
}

/* Tabel */
table{
    width:700px;
    max-width:95%;
    border-collapse:collapse;
    background:white;
    border-left:3px solid #8CCBFF;
    border-right:3px solid #8CCBFF;
}

th{
    background:#B8DFFF;
    color:#1F4E79;
    padding:14px;
}

td{
    padding:14px;
    text-align:center;
    color:#444;
    border-bottom:1px solid #EAF5FF;
}

tr:nth-child(even){
    background:#F8FCFF;
}

tr:last-child{
    background:#DCEEFF;
    font-weight:bold;
    color:#2F6DA8;
    font-size:16px;
}

/* Tombol bawah */
table + p{
    width:700px;
    max-width:95%;
    background:white;
    padding:25px;
    border-radius:0 0 25px 25px;
    border-left:3px solid #8CCBFF;
    border-right:3px solid #8CCBFF;
    border-bottom:3px solid #8CCBFF;

    display:flex;
    justify-content:center;
    gap:15px;
}

button{
    background:#6EB8F7;
    color:white;
    border:none;
    padding:13px 24px;
    border-radius:12px;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#4AA6F3;
}

a{
    text-decoration:none;
    background:#EAF6FF;
    color:#2F6DA8;
    padding:13px 24px;
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

a:hover{
    background:#B8DFFF;
    color:white;
}

/* Print */
@media print{
    body{
        background:white;
        padding:0;
    }

    body::before{
        display:none;
    }

    button,
    a{
        display:none;
    }

    h2,
    h2+p,
    table{
        width:100%;
        border:none;
        box-shadow:none;
    }

    table+p{
        display:none;
    }
}
</style>
</head>
<body>
    <h2>SellPoint</h2>
    <p>
        No. Transaksi: <?php echo $transaksi['no_transaksi']; ?><br>
        Tanggal: <?php echo $transaksi['tanggal']; ?><br>
        Kasir: <?php echo $transaksi['nama_kasir']; ?><br>
        Pelanggan: <?php echo $transaksi['nama_pelanggan'] ? $transaksi['nama_pelanggan'] : 
        'Umum'; ?>
    </p>
    <table border="1" cellpadding="6">
    <tr><th>Barang</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th></tr>
    <?php while ($item = mysqli_fetch_assoc($detail)) { ?>
    <tr>
        <td><?php echo $item['nama_barang']; ?></td>
        <td><?php echo number_format($item['harga_satuan'], 0, ',', '.'); ?></td>
        <td><?php echo $item['jumlah']; ?></td>
        <td><?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
    </tr>
    <?php } ?>
    <tr><td colspan="3">Total Bayar</td>
        <td><?php echo number_format($transaksi['total_bayar'], 0, ',', '.'); ?></td>
    </tr>
    </table>
    <p>
        <button onclick="window.print()">Cetak Struk</button>
        <a href="riwayat_transaksi.php">Kembali ke Riwayat Transaksi</a>
    </p>
</body>
</html>