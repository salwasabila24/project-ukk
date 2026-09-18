<?php
//edit_barang.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$id    = $_GET['id'];
$sql   = "SELECT * FROM tbl_barang WHERE id_barang = '$id'";
$hasil = mysqli_query($koneksi, $sql);
$data  = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Barang - SellPoint</title>
<head>
    <title>Edit Barang - SellPoint</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:linear-gradient(135deg,#EAF6FF,#CFEAFF,#DDEFFF);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:30px;
        }

        /* Card utama */
        form{
            display:flex;
            width:850px;
            max-width:100%;
            background:#fff;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,.12);
        }

        /* Bagian kiri */
        form::before{
            content:"📦 Edit Barang";
            width:250px;
            background:linear-gradient(180deg,#8CCBFF,#6EB8F7);
            color:white;
            font-size:28px;
            font-weight:bold;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
            padding:20px;
        }

        table{
            flex:1;
            padding:30px;
            width:100%;
        }

        td{
            padding:10px 5px;
            color:#355C7D;
            vertical-align:middle;
        }

        td:first-child{
            font-weight:bold;
            width:140px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"]{
            width:100%;
            padding:10px 12px;
            border:1px solid #B7D9F8;
            border-radius:10px;
            background:#F8FCFF;
            outline:none;
            transition:.3s;
        }

        input:focus{
            border-color:#6EB8F7;
            box-shadow:0 0 6px rgba(110,184,247,.35);
        }

        input[type="submit"]{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background:#6EB8F7;
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:.3s;
            margin-top:10px;
        }

        input[type="submit"]:hover{
            background:#4FA8F5;
        }

        /* Judul HTML disembunyikan karena sudah ada panel kiri */
        h1{
            display:none;
        }

        p{
            position:absolute;
            bottom:35px;
        }

        p a{
            text-decoration:none;
            background:white;
            color:#2F6DA8;
            padding:10px 18px;
            border-radius:10px;
            font-weight:bold;
            box-shadow:0 4px 10px rgba(0,0,0,.08);
            transition:.3s;
        }

        p a:hover{
            background:#A9D6FF;
            color:#1F4E79;
        }

        /* HP */
        @media(max-width:700px){
            form{
                flex-direction:column;
            }

            form::before{
                width:100%;
                height:120px;
                font-size:24px;
            }

            p{
                position:static;
                margin-top:20px;
                text-align:center;
            }
        }
    </style>
</head>

<body>
    <h1>Edit Barang</h1>
    <form action="proses_edit_barang.php" method="POST">
        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
        <table>
            <tr><td>Kode Barang</td><td>:</td>
                <td><input type="text" name="kode_barang"
                value="<?php echo $data ['kode_barang']; ?>" required></td></tr>
            <tr><td>Nama Barang</td><td>:</td>
                <td><input type="text" name="nama_barang"
                value="<?php echo $data ['nama_barang']; ?>" required></td></tr>
            <tr><td>Harga Satuan</td><td>:</td>
                <td><input type="number" name="harga_satuan" step="0.01"
                value="<?php echo $data ['harga_satuan']; ?>" required></td></tr>
            <tr><td>Stok</td><td>:</td>
                <td><input type="number" name="stok"
                value="<?php echo $data ['stok']; ?>" required></td></tr>
            <tr><td>Tanggal Kadaluarsa </td><td>:</td>
                <td><input type="date" name="tanggal_kadaluarsa"
                value="<?php echo $data ['tanggal_kadaluarsa']; ?>" required></td></tr>
            <tr><td colspan="3"><input type="submit" value="Update"></td></tr>
        </table>        
    </form>
    <p><a href="data_barang.php">Kembali</a></p>
</body>
</html>