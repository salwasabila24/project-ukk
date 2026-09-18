<?php
// edit_pelanggan.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql = "SELECT * FROM tbl_pelanggan WHERE id_pelanggan = '$id'";
$hasil = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Pelanggan - SellPoint</title>
<head>
    <title>Edit Pelanggan - SellPoint</title>

    <head>
    <title>Edit Pelanggan - SellPoint</title>

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
            flex-direction:column;
            justify-content:center;
            align-items:center;
            padding:30px;
        }

        /* Card utama */
        form{
            display:flex;
            width:850px;
            max-width:100%;
            background:#FFFFFF;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,.12);
        }

        /* Panel kiri */
        form::before{
            content:"👤 Edit Pelanggan";
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

        h1{
            display:none;
        }

        table{
            flex:1;
            width:100%;
            padding:30px;
        }

        td{
            padding:12px 5px;
            color:#355C7D;
            vertical-align:middle;
        }

        td:first-child{
            font-weight:bold;
            width:150px;
        }

        input[type="text"]{
            width:100%;
            padding:11px 12px;
            border:1px solid #B7D9F8;
            border-radius:10px;
            background:#F8FCFF;
            outline:none;
            transition:.3s;
        }

        input[type="text"]:focus{
            border-color:#6EB8F7;
            box-shadow:0 0 6px rgba(110,184,247,.35);
        }

        input[type="submit"]{
            width:100%;
            padding:12px;
            margin-top:12px;
            border:none;
            border-radius:10px;
            background:#6EB8F7;
            color:white;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:.3s;
        }

        input[type="submit"]:hover{
            background:#4FA8F5;
        }

        /* Tombol kembali */
        .back-btn{
            margin-top:20px;
        }

        .back-btn a{
            display:inline-block;
            text-decoration:none;
            background:#A9D6FF;
            color:#1F4E79;
            padding:10px 22px;
            border-radius:10px;
            font-weight:bold;
            box-shadow:0 4px 10px rgba(0,0,0,.08);
            transition:.3s;
        }

        .back-btn a:hover{
            background:#8CCBFF;
            color:white;
        }

        /* Responsive */
        @media(max-width:700px){
            form{
                flex-direction:column;
            }

            form::before{
                width:100%;
                height:120px;
                font-size:24px;
            }

            table{
                padding:20px;
            }
        }
    </style>

</head>
<body>
    <h1>Edit Pelanggan SellPoint</h1>
    <form action="proses_edit_pelanggan.php" method="POST">
        <input type="hidden" name="id_pelanggan" 
               value="<?php echo $data['id_pelanggan']; ?>">
        <table>
            <tr><td>Nama Pelanggan</td><td>:</td>
                <td><input type="text" name="nama_pelanggan"
                    value="<?php echo $data['nama_pelanggan']; ?>" required></td></tr>
            <tr><td>No. HP</td><td>:</td>
                <td><input type="text" name="no_hp"
                    value="<?php echo $data['no_hp']; ?>"></td></tr>
            <tr><td>Alamat</td><td>:</td>
                <td><input type="text" name="alamat"
                    value="<?php echo $data['alamat']; ?>"></td></tr>
            <tr><td colspan="3"><input type="submit" value="Update"></td></tr>
        </table>
    </form>
    <p><a href="data_pelanggan.php"></a></p>
</body>
</html>
                