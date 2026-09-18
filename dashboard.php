<?php
//dashboard.php
include 'includes/cek_session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - SellPoint </title>
    <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:linear-gradient(135deg,#EAF6FF,#D4ECFF);
    min-height:100vh;
    padding:40px;
}

/* Welcome Card */
h1{
    background:linear-gradient(90deg,#7EC8FF,#5BAEF7);
    color:white;
    padding:25px 30px;
    border-radius:20px 20px 0 0;
    max-width:850px;
    margin:0 auto;
    font-size:30px;
}

body > p:first-of-type{
    max-width:850px;
    margin:0 auto 30px;
    background:white;
    padding:18px 30px;
    color:#2F6DA8;
    border-radius:0 0 20px 20px;
    box-shadow:0 8px 20px rgba(80,140,200,.15);
    font-weight:bold;
}

/* Menu Dashboard */
ul{
    max-width:850px;
    margin:auto;
    list-style:none;
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:20px;
}

li{
    margin:0;
}

li a{
    display:flex;
    align-items:center;
    justify-content:center;
    height:130px;
    text-decoration:none;
    color:#23527C;
    background:white;
    border-radius:18px;
    font-size:18px;
    font-weight:bold;
    box-shadow:0 8px 18px rgba(80,140,200,.12);
    transition:.3s;
    border:2px solid transparent;
}

li a:hover{
    transform:translateY(-5px);
    border-color:#8CCBFF;
    background:#F4FAFF;
}

/* Ikon otomatis */
li:nth-child(1) a::before{
    content:"📦 ";
    font-size:28px;
    margin-right:10px;
}
li:nth-child(2) a::before{
    content:"👥 ";
    font-size:28px;
    margin-right:10px;
}
li:nth-child(3) a::before{
    content:"🛒 ";
    font-size:28px;
    margin-right:10px;
}
li:nth-child(4) a::before{
    content:"🧾 ";
    font-size:28px;
    margin-right:10px;
}

/* Logout */
body > a{
    display:block;
    max-width:250px;
    margin:35px auto 0;
    text-align:center;
    text-decoration:none;
    background:#FFB6C1;
    color:#8A3552;
    padding:14px;
    border-radius:12px;
    font-weight:bold;
    transition:.3s;
}

body > a:hover{
    background:#FF9EB0;
    color:white;
}

/* HP */
@media(max-width:700px){

    body{
        padding:20px;
    }

    ul{
        grid-template-columns:1fr;
    }

    li a{
        height:90px;
        font-size:16px;
    }

    h1{
        font-size:24px;
    }
}
</style>
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION['nama_lengkap']; ?></h1>
    <p>Anda login sebagai: <?php echo $_SESSION['role']; ?></p>

    <ul>
    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'gudang') { ?>
        <li><a href="data_barang.php">Data Barang</a></li>
        <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
    <?php } ?>

    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'kasir') { ?>
        <li><a href="transaksi.php">Transaksi Kasir</a></li>
        <li><a href="riwayat_transaksi.php">Riwayat Transaksi</a></li>
     <?php } ?>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>