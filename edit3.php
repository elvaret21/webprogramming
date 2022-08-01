<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_pm'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_pm = $_GET['id_pm'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pm='$id_pm'") or die(mysqli_error($koneksi));

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
			$nama_pm			= $_POST['nama_pm'];
			$username			= $_POST['username'];
			$password			= $_POST['password'];
			$level			= $_POST['level'];


			$sql = mysqli_query($koneksi, "UPDATE pengguna SET nama_pm='$nama_pm', username='$username', password='$password', level='$level' WHERE id_pm='$id_pm'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil4";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_pm&id_pm=<?php echo $id_pm; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_pm" class="form-control"value="<?php echo $data['nama_pm']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">username </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">password</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
				</div>
			</div>
						 <div class="item form-group">
      <label class="col-form-label col-md-3 col-sm-3 label-align">Level</label>
      <div class="col-sm-4">
          <select name="level" id="level" class="form-control">
              <option>- Pilih -</option>
              <option>Administrator</option>
              <option>Bendahara</option>
          </select>
      				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil4" class="btn btn-warning">Kembali</a>
		</div>
			</div>
		</form>
	</div>
