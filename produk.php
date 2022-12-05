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


   	<!-- content -->
	<div class="section">
		<div class="container">
			<h3>Data Produk yang dijual </h3>
			<div class="box">
				<p><a href="tambah_produk.php" class="button">Tambah Produk</a></p>
				<table border="1" cellspacing="0" class="table">
					<thead>
                        <tr>
							<th width="30px">No</th>
							<th>Kategori</th>
							<th>Nama Produk</th>
							<th>Harga</th>
							<th>Gambar</th>
							<th width="245px">Aksi</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            include "database.php";
							$no = 1;
							$produk = mysqli_query($kon, "SELECT * FROM tb_produk LEFT JOIN tb_category USING (category_id) ORDER BY produk_id DESC");
							if(mysqli_num_rows($produk) > 0){
							while($row = mysqli_fetch_array($produk)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['category_name'] ?></td>
							<td><?php echo $row['nama_produk'] ?></td>
							<td>Rp. <?php echo number_format($row['harga']) ?></td>
							<td><a href="produk/<?php echo $row['gambar'] ?>" target="_blank"> <img src="produk/<?php echo $row['gambar'] ?>" width="50px"> </a></td>
							<td>
								<a href="edit_produk.php?id=<?php echo $row['produk_id'] ?>" class="button_kuning">Edit</a>
                                <a href="hapus.php?idp=<?php echo $row['produk_id'] ?>" class="button_merah" onclick="return confirm('Yakin ingin hapus ?')">Hapus</a>
							</td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="7">Tidak ada data</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>