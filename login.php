<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Login - SellPoint</title>

    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body{
        background: linear-gradient(135deg, #DCEEFF, #B8DFFF, #CDEBFF);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h1{
        position: absolute;
        top: 70px;
        width: 100%;
        text-align: center;
        color: #3A6EA5;
        font-size: 32px;
    }

    form{
        background: #FFFFFF;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(58,110,165,0.15);
        width: 360px;
    }

    table{
        width: 100%;
    }

    td{
        padding: 10px 0;
        color: #4A6583;
        font-size: 15px;
    }

    input[type="text"],
    input[type="password"]{
        width: 100%;
        padding: 12px;
        border: 1px solid #C7DFFF;
        border-radius: 10px;
        background: #F7FBFF;
        outline: none;
        transition: 0.3s;
    }

    input[type="text"]:focus,
    input[type="password"]:focus{
        border-color: #84BDF5;
        box-shadow: 0 0 8px rgba(132,189,245,0.4);
    }

    input[type="submit"]{
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        border: none;
        border-radius: 10px;
        background: #8CCBFF;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    input[type="submit"]:hover{
        background: #6EB8F7;
    }

    p{
        position: absolute;
        top: 120px;
        width: 100%;
        text-align: center;
        color: #2E6FA7;
        font-weight: bold;
    }
</style>
</head>
<body>
    <h1>Login Aplikasi SellPoint</h1>

    <?php
    session_start();
    if (isset($_SESSION['pesan_error'])) {
        echo '<p>' . $_SESSION['pesan_error'] . '<p>';
        unset($_SESSION['pesan_error']);
    }
    ?>

    <form action="proses_login.php" method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="login">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>