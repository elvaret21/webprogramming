<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$tanggal			= $_POST['tanggal'];
			$keterangan			= $_POST['keterangan'];
			$masuk			= $_POST['masuk'];

			$cek = mysqli_query($koneksi, "SELECT * FROM keuangan WHERE id_km='$id_km'") or die(mysqli_error($koneksi));
			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO keuangan(tanggal, keterangan, masuk, jenis) VALUES('$tanggal', '$keterangan', '$masuk', 'masuk')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil1";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
		}
		?>

		<form action="index.php?page=tambah1" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal </label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="keterangan" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="masuk" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
