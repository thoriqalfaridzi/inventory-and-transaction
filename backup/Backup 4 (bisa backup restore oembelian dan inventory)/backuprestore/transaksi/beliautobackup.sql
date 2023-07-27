

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO transaksibeli VALUES
("11","2023-06-21","312321","Item mau dijual","AAA Suppli - Namasup","2","22.00","Cash","Lunas","0","V3","Km","Elektrik"),
("12","2023-06-21","asdasd","Item mau dijual","AAA Suppli - Namasup","4","222.00","Cash","Lunas","0","V3","Km","Elektrik"),
("13","2023-06-20","wqeqweqwe","Item 2","AAA Suppli - Namasup","6","23423423.00","Hutang","Belum Lunas","333","swqrqw","Cm","Elektrik");
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


