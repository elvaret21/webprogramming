<?php
//memasukkan file config.php
include('config.php');
include ("rupiah.php");
?>

	<div class="card card-info" style="margin-top:20px">
	<button class="btn btn-dark right">SALDO KAS MASJID
	<?php
    $sql = mysqli_query($koneksi,"SELECT SUM(masuk) as tot_masuk  from keuangan where jenis='masuk'");
    while($data = mysqli_fetch_assoc($sql)) {
    	$masuk=$data['tot_masuk'];
    	  }
?>
<?php
  $sql = mysqli_query($koneksi,"SELECT SUM(keluar) as tot_keluar  from keuangan where jenis='Keluar'");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['tot_keluar'];
  }
?>
<?php 
$saldo= $masuk-$keluar;
?>

	<h2>PEMASUKAN :
		<?php echo rupiah($masuk); ?></h2>
		<h2>PENGELUARAN :
		<?php echo rupiah($keluar); ?></h2>
		<h1>TOTAL SALDO :
		<?php echo rupiah($saldo); ?></h1>
</button>
</div>	


	<div class="card card-info" style="margin-top:20px">
		<div class="card-header">
		<h3 class="card-title">
			<center><i class="fa fa-table"></i> Kas Masjid </h3></center>
	</div>

		<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					
					<th>No</th>
					<th>Tanggal </th>
					<th>Keterangan</th>
					<th>Pemasukan</th>
					<th>Pengeluaran</th>
				</tr>
			</thead>
			<tbody>
				<?php
				 $no = 1;
				$sql = mysqli_query($koneksi, "SELECT * FROM keuangan ORDER BY id_km ASC") or die(mysqli_error($koneksi));
				if(mysqli_num_rows($sql) > 0){
					$no = 1;
					while($data = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							
							<td>'.$no.'</td>
							<td>'.$data['tanggal'].'</td>
							<td>'.$data['keterangan'].'</td>
							<td>'.rupiah($data['masuk']).'</td>
							<td>'.rupiah($data['keluar']).'</td>

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
