<div class="card card-secondary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-file"></i> Laporan Kas Masjid</h3>
  </div>
  <form action="laphalf.php" method="post" enctype="multipart/form-data" target="_blank">
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Awal</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_1" name="tgl_1">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_2" name="tgl_2">
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-dark right" name="Cetak" target="_blank">Cetak Periode</button>
      <a href="lapfull.php" class="btn btn-dark right" target="_blank">Cetak Semua</a>
    </div>
  </form>
</div>
