<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
</head>
<body>
    <header>
            <div class="container">
                <img src="img/logo.png" alt="" width="140" height="110">
                <!-- <h1><a href="index.php">Skincare</a></h1> -->
                <ul>
                    <li><a href="daftar_produk.php">Beranda</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
    </header>
    <br>
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo '<script>alert("Login gagal! username dan password salah!")</script>';
                echo '<script>window.location="login.php"</script>';
            }
            else if($_GET['pesan'] == "logout") {
                echo "Anda berhasil logout";
            }
            else if($_GET['pesan'] == "belum_login"){
                echo '<script>alert("Anda harus login untuk mengakses halaman admin")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
        ?>
    <br>
    <!-- Login -->
	<div class="section">
            <div class="box-login">
                <div class="form-login">
                    <form action="cek_login.php" method="post" class="form-signin">

                        <input type="username" id="username" name="username" placeholder="Masukan Username" class="email" required autofocus>

                        <input type="password" id="password" name="password" placeholder="Masukan Password" class="password" required>

                        <!-- <button type="submit" class="btn">Sign In</button> -->
                        <input type="submit" class="btn" value="Sign In">
                    </form>
                </div>
		</div>
	</div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
</body>
</html>