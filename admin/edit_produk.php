<?php
include "../database.php";
$produk = mysqli_query($kon, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
	if(mysqli_num_rows($produk) == 0){
		echo '<script>window.location="produk.php"</script>';
	}
	$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    
</head>
<body>
	<header>
            <div class="container">
				<img src="../img/logo.png" alt="" width="140" height="110">
                <!-- <h1><a href="index.php">Skincare</a></h1> -->
                <ul>
                    <li><a href="produk.php">Produk</a></li>
					<li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
    </header>


   	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Form Edit Data Produk</h3>
			<div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
					<select class="input-control" name="kategori" required>
						<option value="">--Pilih--</option>
						<?php 
							$kategori = mysqli_query($kon, "SELECT * FROM tb_category ORDER BY category_id DESC");
							while($r = mysqli_fetch_array($kategori)){
						?>
						<option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected':''; ?>><?php echo $r['category_name'] ?></option>
						<?php } ?>
					</select>

					<input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php echo $p->nama_produk ?>" required>
					<input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p->harga ?>" required>
					
					<img src="produk/<?php echo $p->product_image ?>" width="100px">
					<input type="hidden" name="foto" value="<?php echo $p->gambar ?>">
					<input type="file" name="gambar" class="input-control">
					<textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->deskripsi ?></textarea><br>
					<input type="submit" name="submit" value="Submit" class="button_biru">
				</form>
				<?php 
					if(isset($_POST['submit'])){

						// data inputan dari form
						$kategori 	= $_POST['kategori'];
						$nama 		= $_POST['nama'];
						$harga 		= $_POST['harga'];
						$deskripsi 	= $_POST['deskripsi'];
                        $foto 	 	= $_POST['foto'];
						

						// data gambar yang baru
						$filename = $_FILES['gambar']['name'];
						$tmp_name = $_FILES['gambar']['tmp_name'];

						

						// jika admin ganti gambar
						if($filename != ''){
							$type1 = explode('.', $filename);
							$type2 = $type1[1];

							$newname = 'produk'.time().'.'.$type2;

							// menampung data format file yang diizinkan
							$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

							// validasi format file
							if(!in_array($type2, $tipe_diizinkan)){
								// jika format file tidak ada di dalam tipe diizinkan
								echo '<script>alert("Format file tidak diizinkan")</scrtip>';

							}else{
								unlink('./produk/'.$foto);
								move_uploaded_file($tmp_name, 'produk/'.$newname);
								$namagambar = $newname;
							}

						}else{
							// jika admin tidak ganti gambar
							$namagambar = $foto;
							
						}

						// query update data produk
						$update = mysqli_query($kon, "UPDATE tb_produk SET 
												category_id = '".$kategori."',
												nama_produk = '".$nama."',
												harga = '".$harga."',
												deskripsi = '".$deskripsi."',
												gambar = '".$namagambar."'
												WHERE produk_id = '".$p->produk_id."'");
						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="produk.php"</script>';
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