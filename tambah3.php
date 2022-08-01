<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$nama_pm			= $_POST['nama_pm'];
			$username			= $_POST['username'];
			$password			= $_POST['password'];
			$level			= $_POST['level'];

			$cek = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE id_pm='$id_pm'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO pengguna(nama_pm, username, password, level) VALUES('$nama_pm', '$username', '$password', '$level')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil4";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}
		}
		?>

		<form action="index.php?page=tambah3" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">nama </label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_pm" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">username</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="username" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">password</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="password" class="form-control" required>
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
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
