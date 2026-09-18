<?php
//transaksi.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

if(!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

$daftar_barang = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE stok > 0");
$total = 0;
foreach ($_SESSION['keranjang'] as $item) {
    $total += $item['subtotal'];
}
?>
<!DOCTYPE html>
<html>
<head><title>Transaksi - SellPoint</title>
<head>
    <title>Transaksi - SellPoint</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:linear-gradient(135deg,#EAF6FF,#CFEAFF,#DDEFFF);
            padding:35px;
        }

        h1{
            text-align:center;
            color:#2F6DA8;
            margin-bottom:25px;
        }

        h3{
            color:#2F6DA8;
            margin:20px auto 10px;
            width:90%;
            max-width:850px;
        }

        /* Pesan error */
        p{
            text-align:center;
            color:#D9534F;
            font-weight:bold;
            margin-bottom:15px;
        }

        /* Form pilih barang */
        form{
            width:90%;
            max-width:850px;
            margin:15px auto;
            background:#FFFFFF;
            padding:18px;
            border-radius:15px;
            box-shadow:0 6px 15px rgba(0,0,0,.08);
        }

        select,
        input[type="number"]{
            padding:10px;
            border:1px solid #B7D9F8;
            border-radius:8px;
            background:#F7FBFF;
            margin:8px 5px;
        }

        select{
            width:260px;
        }

        input[type="number"]{
            width:90px;
        }

        input[type="submit"]{
            background:#8CCBFF;
            color:#1F4E79;
            border:none;
            padding:10px 18px;
            border-radius:10px;
            font-weight:bold;
            cursor:pointer;
            transition:.3s;
        }

        input[type="submit"]:hover{
            background:#6EB8F7;
            color:white;
        }

        /* Tabel keranjang */
        table{
            width:90%;
            margin:15px auto;
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
        }

        td{
            padding:12px;
            text-align:center;
            border-bottom:1px solid #E8F2FC;
        }

        tr:nth-child(even){
            background:#F7FBFF;
        }

        tr:hover{
            background:#EAF5FF;
        }

        /* Total */
        tr:last-child{
            font-weight:bold;
            background:#D9EEFF;
            color:#1F4E79;
        }

        /* Link hapus */
        td a{
            color:#D9534F;
            font-weight:bold;
            text-decoration:none;
        }

        td a:hover{
            text-decoration:underline;
        }

        /* Link kembali dashboard */
        p:last-child a{
            display:inline-block;
            background:#A9D6FF;
            color:#1F4E79;
            padding:10px 18px;
            border-radius:10px;
            text-decoration:none;
            font-weight:bold;
            margin-top:15px;
        }

        p:last-child a:hover{
            background:#8CCBFF;
        }
    </style>

</head>
</head>
<body>
    <h1>Transaksi Penjualan SellPoint</h1>

    <?php if (isset($_SESSION['pesan_error'])) {
        echo '<p>' . $_SESSION['pesan_error'] . '</p>';
        unset($_SESSION['pesan_error']);
    } ?>

    <h3>Pilih Barang</h3>
    <form action="proses_tambah_keranjang.php" method="POST">
        <select name="id_barang" required>
            <?php while ($b = mysqli_fetch_assoc($daftar_barang)) { ?>
            <option value="<?php echo $b['id_barang']; ?>">
                <?php echo $b['nama_barang'] . ' (stok: ' . $b['stok'] . ')';?>
            </option>
            <?php } ?>
        </select>
        Jumlah: <input type="number" name="jumlah" min="1" required>
        <input type="submit" value="Tambah ke keranjang">
    </form>

    <h3>Keranjang</h3>
    <table border="1" cellpadding="6">
        <tr><th>Nama Barang</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr>
        <?php foreach ($_SESSION['keranjang'] as $id_barang => $item) { ?>
        <tr>
            <td><?php echo $item['nama_barang']; ?></td>
            <td><?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
            <td><?php echo $item['jumlah']; ?></td>
            <td><?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
            <td><a href="hapus_keranjang.php?id=<?php echo $id_barang; ?>">Hapus</a></td>
        </tr>
        <?php } ?>
        <tr><td colspan="3">Total</td>
            <td colspan="2"><?php echo number_format($total, 0, ',', '.'); ?></td></tr>
    </table>

    <form action="proses_simpan_transaksi.php" method="POST">
        <input type="submit" value="Simpan Transaksi">
    </form>
    <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
</body>
</html>