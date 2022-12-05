<?php
include "database.php";
$kategori = mysqli_query($kon, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($kategori) == 0){
		echo '<script>window.location="kategori.php"</script>';
	}
	$k = mysqli_fetch_object($kategori);
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
                    <li><a href="produk.php">Data Produk</a></li>
                    <!-- <li><a href="kategori.php">Data Kategori</a></li> -->
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
    </header>


       <div class="section">
		<div class="container">
			<h3> Form Edit kategori</h3>
			<div class="box">
			<form action="" method="POST">
					<input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
					<input type="submit" name="submit" value="Submit" class="button">
				</form>
				<?php 
				include "database.php";
                    if(isset($_POST['submit'])){

                        $nama = ucwords($_POST['nama']);

                        $update = mysqli_query($kon, "UPDATE tb_category SET 
                                                category_name = '".$nama."'
                                                WHERE category_id = '".$k->category_id."' ");

                        if($update){
                            echo '<script>alert("Edit data berhasil")</script>';
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