

CREATE TABLE `transaksibeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `nofaktur` varchar(25) NOT NULL,
  `Barang` varchar(50) NOT NULL,
  `Supplier` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `harga_beli` decimal(10,2) DEFAULT NULL,
  `jenis_bayar` varchar(15) NOT NULL,
  `status_bayar` varchar(15) NOT NULL,
  `hutang_terbayar` int(30) NOT NULL,
  `kode_item` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO transaksibeli VALUES
("5","2023-05-19","3342","Item 2","AAA Suppli - Namasup","322","23432432.00","Cash","Lunas","0","swqrqw","Cm","Elektrik"),
("6","2023-06-14","7878","Item mau dijual","AAA Suppli - Namasup","3","456546.00","Cash","Lunas","0","V3","Km","Elektrik");
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES
INSERT INTO transaksibeli VALUES


