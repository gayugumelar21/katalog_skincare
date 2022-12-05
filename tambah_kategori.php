<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Skincare</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
            <div class="container">
				<img src="img/logo.png" alt="" width="140" height="110">
                <!-- <h1><a href="index.php">Skincare</a></h1> -->
                <ul>
                    <li><a href="daftar_produk.php">Beranda</a></li>
                    <li><a href="produk.php">Data Produk</a></li>
                    <!-- <li><a href="kategori.php">Data Kategori</a></li> -->
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
    </header>


	<div class="section">
		<div class="container">
			<h3> Form tambah kategori</h3>
			<div class="box">
			<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
					<input type="submit" name="submit" value="Submit" class="button">
				</form>
				<?php 
				include "database.php";
					if(isset($_POST['submit'])){

						$nama = ucwords($_POST['nama']);

						$insert = mysqli_query($kon, "INSERT INTO tb_category VALUES (
											null,
											'".$nama."') ");
						if($insert){
							echo '<script>alert("Tambah data berhasil")</script>';
							echo '<script>window.location="kategori.php"</script>';
						}else{
							echo 'gagal '.mysqli_error($kon);
						}

					}
				?>
			</div>
		</div>
	</div>

</body>
</html>