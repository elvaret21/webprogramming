<?php
    include "config.php";
    //FUNGSI RUPIAH
    include "rupiah.php";

    $dt1 = $_POST["tgl_1"];
    $dt2 = $_POST["tgl_2"];
?>

<?php
  $sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from keuangan where jenis='Masuk' and tanggal BETWEEN '$dt1' AND '$dt2'");
  while ($data= $sql->fetch_assoc()) {
    $masuk=$data['tot_masuk'];
  }

  $sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from keuangan where jenis='Keluar' and tanggal BETWEEN '$dt1' AND '$dt2'");
  while ($data= $sql->fetch_assoc()) {
    $keluar=$data['tot_keluar'];
  }

  $saldo= $masuk-$keluar;
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Kas Masjid</title>
</head>
<body>
<center>
<h2>Laporan Rekapitulasi Kas Masjid</h2>
<h3>Masjid Darul 'Ilmi Universitas Muria Kudus</h3>
<p>Periode : <?php $a=$dt1;?> s/d <?php $b=$dt2;?>
<p>________________________________________________________________________</p>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No.</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
      </tr>
    </thead>
    <tbody>
        <?php

        if(isset($_POST["Cetak"])){
           
            $sql_tampil = "select * from keuangan where tanggal BETWEEN '$dt1' AND '$dt2' order by tanggal asc";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
         <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $data['tanggal'];?></td> 
            <td><?php echo $data['keterangan']; ?></td>
            <td align="right"><?php echo rupiah($data['masuk']); ?></td>  
            <td align="right"><?php echo rupiah($data['keluar']); ?></td>   
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
    <tr>
        <td colspan="3">Total Pemasukan</td>
        <td colspan="2"><?php echo rupiah($masuk); ?></td>
    </tr>
    <tr>
        <td colspan="4">Total Pengeluaran</td>
        <td><?php echo rupiah($keluar); ?></td>
    </tr>
    <tr>
        <td colspan="3">Saldo Kas Masjid</td>
        <td colspan="2"><?php echo rupiah($saldo); ?></td>
    </tr>
  </table>
</center>

<script>
    window.print();
</script>
</body>
</html>