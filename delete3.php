<?php

include('config.php');


		$id_pm = $_GET['id_pm'];
		$del = mysqli_query($koneksi, "DELETE FROM pengguna WHERE id_pm='$id_pm'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil4";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil4";</script>';
		}


?>
