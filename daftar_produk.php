<?php
include "database.php";
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

	<style>
		* {box-sizing: border-box}
		body {font-family: Verdana, sans-serif; margin:0}
		.mySlides {display: none}
		img {vertical-align: middle;}

		/* Slideshow container */
		.slideshow-container {
		max-width: 1000px;
		position: relative;
		margin: auto;
		}

		/* Next & previous buttons */
		.prev, .next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto;
		padding: 16px;
		margin-top: -22px;
		color: white;
		font-weight: bold;
		font-size: 18px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		user-select: none;
		}

		/* Position the "next button" to the right */
		.next {
		right: 0;
		border-radius: 3px 0 0 3px;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev:hover, .next:hover {
		background-color: rgba(0,0,0,0.8);
		}

		/* Caption text */
		.text {
		color: #f2f2f2;
		font-size: 15px;
		padding: 8px 12px;
		position: absolute;
		bottom: 8px;
		width: 100%;
		text-align: center;
		}

		/* Number text (1/3 etc) */
		.numbertext {
		color: #f2f2f2;
		font-size: 12px;
		padding: 8px 12px;
		position: absolute;
		top: 0;
		}

		/* The dots/bullets/indicators */
		.dot {
		cursor: pointer;
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbb;
		border-radius: 50%;
		display: inline-block;
		transition: background-color 0.6s ease;
		}

		.active, .dot:hover {
		background-color: #717171;
		}

		/* Fading animation */
		.fade {
		animation-name: fade;
		animation-duration: 1.5s;
		}

		@keyframes fade {
		from {opacity: .4} 
		to {opacity: 1}
		}

		/* On smaller screens, decrease text size */
		@media only screen and (max-width: 300px) {
		.prev, .next,.text {font-size: 11px}
		}
	</style>
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
	<br>
	<div class="container">
		<div class="box">
			<div class="search">
				<form action="daftar_produk.php" method="GET">
					<input type="text" name="cari_produk" placeholder="Cari Produk" value="">
					<input type="submit" value="Cari Produk">
				</form>
				<?php
					if(isset($_GET['cari_produk'])){
						$cari_produk = $_GET['cari_produk'];
						echo "Hasil Pencarian : ".$cari_produk;
					}
				?>
			</div>
		</div>
	</div>

	<br>
	<div class="slideshow-container">

	<div class="mySlides fade">
	<div class="numbertext">1 / 3</div>
		<img src="img/1.jpeg" style="width:100%">
		<div class="text">Caption Text</div>
	</div>

	<div class="mySlides fade">
	<div class="numbertext">2 / 3</div>
		<img src="img/2.jpeg" style="width:100%">
		<div class="text">Caption Two</div>
	</div>

	<div class="mySlides fade">
	<div class="numbertext">3 / 3</div>
		<img src="img/3.jpeg" style="width:100%">
		<div class="text">Caption Three</div>
	</div>

		<a class="prev" onclick="plusSlides(-1)">❮</a>
		<a class="next" onclick="plusSlides(1)">❯</a>

	</div>
	<br>

	<div style="text-align:center">
		<span class="dot" onclick="currentSlide(1)"></span> 
		<span class="dot" onclick="currentSlide(2)"></span> 
		<span class="dot" onclick="currentSlide(3)"></span> 
	</div>


    <!-- new product -->
	<div class="section">
		<div class="container">
			<h3>Produk</h3>
			<div class="box">

			<?php
				if(isset($_GET['cari_produk'])){
					$cari_produk = $_GET['cari_produk'];
					$data = mysqli_query($kon, "SELECT * FROM tb_produk  WHERE nama_produk like '%".$cari_produk."%'");
				}
				else{
					$data = mysqli_query($kon, "SELECT * FROM tb_produk");
				}
				if(mysqli_num_rows($data) > 0){
					while($p = mysqli_fetch_array($data)){
			?>	
				<a href="detail_produk.php?id=<?php echo $p['produk_id'] ?>">
					<div class="col-4">
						<img src="/skincare/admin/produk/<?php echo $p['gambar'] ?>">
						<p class="nama"><?php echo substr($p['nama_produk'], 0, 30) ?></p>
						<p class="harga">Rp. <?php echo number_format($p['harga']) ?></p>
					</div>
				</a>
			<?php }}else{ ?>
				<p>Produk tidak ada</p>
			<?php } ?>

				
			</div>
		</div>
	</div>

	<script>
		let slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		showSlides(slideIndex = n);
		}

		function showSlides(n) {
		let i;
		let slides = document.getElementsByClassName("mySlides");
		let dots = document.getElementsByClassName("dot");
		if (n > slides.length) {slideIndex = 1}    
		if (n < 1) {slideIndex = slides.length}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
		}
	</script>
</body>
</html>