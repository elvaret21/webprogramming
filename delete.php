<?php

include('config.php');


		$id_km = $_GET['id_km'];
		$del = mysqli_query($koneksi, "DELETE FROM keuangan WHERE id_km='$id_km'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil1";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil1";</script>';
		}


?>
