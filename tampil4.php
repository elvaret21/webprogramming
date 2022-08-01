<?php
//memasukkan file config.php
include('config.php');
include ("rupiah.php");
if ($_SESSION["ses_level"]!= "Administrator"){
	die();
}
?>



	<div class="card card-info" style="margin-top:20px">
		<div class="card-header">
		<h3 class="card-title">
			<center><i class="fa fa-table"></i> Data Pengguna</h3></center>
			<a href="index.php?page=tambah3"><button class="btn btn-dark right">Tambah Data</button></a>
	</div>

		<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					
					<th>No</th>
					<th>Nama </th>
					<th>Username</th>
					<th>level</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				 $no = 1;
				$sql = mysqli_query($koneksi, "SELECT * FROM pengguna  ORDER BY id_pm ASC") or die(mysqli_error($koneksi));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							
							<td>'.$no.'</td>
							<td>'.$data['nama_pm'].'</td>
							<td>'.$data['username'].'</td>
							<td>'.$data['level'].'</td>

							<td>
								<a href="index.php?page=edit_pm&id_pm='.$data['id_pm'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete3.php?id_pm='.$data['id_pm'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
