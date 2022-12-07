<?php
include 'database.php';
$produk = mysqli_query($kon, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
	$p = mysqli_fetch_object($produk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <li><a href="profil.php">Profil</a></li>
					<li><a href="login.php">Login</a></li>
                </ul>
            </div>
    </header>


   	<!-- search -->
	<div class="search">
		<div class="container">
			<!-- <form action="daftar_produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
				<input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?> ">
				<input type="submit" name="cari" value="Cari Produk">
			</form> -->
		</div>
	</div>

	<!-- product detail -->
	<div class="section">
		<div class="container">
			<h3>Detail Produk</h3>
			<div class="box">
				<div class="col-2">
					<img src="/skincare/admin/produk/<?php echo $p->gambar ?>" width="80%">
				</div>
				<div class="col-2">
					<h3><?php echo $p->nama_produk ?></h3>
					<h4>Rp. <?php echo number_format($p->harga) ?></h4>
					<p>Deskripsi :<br>
						<?php echo $p->deskripsi ?>
					</p>
				</div>
			</div>
		</div>
	</div>

</body>
</html>