<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_km'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_km = $_GET['id_km'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM keuangan WHERE id_km='$id_km'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$tanggal			= $_POST['tanggal'];
			$keterangan			= $_POST['keterangan'];
			$keluar			= $_POST['keluar'];


			$sql = mysqli_query($koneksi, "UPDATE keuangan SET tanggal='$tanggal', keterangan='$keterangan', keluar='$keluar', jenis='keluar' WHERE id_km='$id_km'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil2";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_km2&id_km=<?php echo $id_km; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
				<div class="col-md-6 col-sm-6">
					<input type="date" name="tanggal" class="form-control"value="<?php echo $data['tanggal']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="keluar" class="form-control" value="<?php echo $data['keluar']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index-admin.php?page=tampil2" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
