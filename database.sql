
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE database masjid  ;
use masjid;

CREATE TABLE `pengguna` (
  `id_pm` varchar(50) NOT NULL,
  `nama_pm` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
   `level` enum('Administrator','Bendahara') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `keuangan` (
  `id_km` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `masuk` int(50) NOT NULL,
  `keluar` int(50) NOT NULL,
  `jenis` enum('masuk','keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pengguna` (`id_pm`, `nama_pm`, `username`, `password`, `level`) VALUES
(1, 'Admin Masjid', 'admin', 'admin', 'Administrator'),
(2, 'Bendahara Masjid', 'bendahara', 'bendahara', 'Bendahara');

INSERT INTO `keuangan` (`id_km`, `tanggal`, `keterangan`, `masuk`, `keluar`, `jenis`) VALUES
(1, "2002-02-12",  'sodaqoh', 2550000, 0, "masuk"),
(2, "2002-02-12",  'imam jumat', 0, 300000, "keluar"),
(3, "2002-02-12",  'sodaqoh', 850000, 0, "masuk"),
(4, "2002-02-12",  'peralatan masjid', 0, 550000, 'keluar');


ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pm`);
COMMIT;

ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_km`);
COMMIT;

ALTER TABLE `pengguna`
  MODIFY `id_pm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

ALTER TABLE `keuangan`
  MODIFY `id_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
  COMMIT;