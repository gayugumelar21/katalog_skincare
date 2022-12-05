<?php 
	
	include "database.php";

	if(isset($_GET['idk'])){
		$delete = mysqli_query($kon, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
		echo '<script>window.location="kategori.php"</script>';
	}

	if(isset($_GET['idp'])){
		$produk = mysqli_query($kon, "SELECT gambar FROM tb_produk WHERE produk_id = '".$_GET['idp']."' ");
		$p = mysqli_fetch_object($produk);

		unlink('./produk/'.$p->gambar);

		$delete = mysqli_query($kon, "DELETE FROM tb_produk WHERE produk_id = '".$_GET['idp']."' ");
		echo '<script>window.location="produk.php"</script>';
	}

?>