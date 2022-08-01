<?php
//memasukkan file config.php
include('config.php');
include ("rupiah.php");
?>

	<div class="card card-info" style="margin-top:20px">
	<button class="btn btn-dark right">TOTAL PEMASUKAN MASJID
	<?php
    $sql = mysqli_query($koneksi,"SELECT SUM(masuk) as tot_masuk  from keuangan where jenis='masuk'");
    while($data = mysqli_fetch_assoc($sql)) {
  ?>
	<h2>
		<?php echo rupiah($data['tot_masuk']); }?>
	</h2>
</button>
</div>	


	<div class="card card-info" style="margin-top:20px">
		<div class="card-header">
		<h3 class="card-title">
			<center><i class="fa fa-table"></i> Kas Masjid Masuk</h3></center>
			<a href="index.php?page=tambah1"><button class="btn btn-dark right">Tambah Data</button></a>
	</div>

		<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					
					<th>No</th>
					<th>Tanggal </th>
					<th>Keterangan</th>
					<th>Jumlah</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				 $no = 1;
				$sql = mysqli_query($koneksi, "SELECT * FROM keuangan where jenis='masuk' ORDER BY id_km ASC") or die(mysqli_error($koneksi));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							
							<td>'.$no.'</td>
							<td>'.$data['tanggal'].'</td>
							<td>'.$data['keterangan'].'</td>
							<td>'.rupiah($data['masuk']).'</td>

							<td>
								<a href="index.php?page=edit_km&id_km='.$data['id_km'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?id_km='.$data['id_km'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
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
