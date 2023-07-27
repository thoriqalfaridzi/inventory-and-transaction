

CREATE TABLE `biaya_lain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `biayalain` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO biaya_lain VALUES ("12","6","2023","asdasd","3.00");
INSERT INTO biaya_lain VALUES ("13","6","2023","Ada","500.00");




CREATE TABLE `inventory` (
  `id_item` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `kode_supplier_item` varchar(20) NOT NULL,
  `kode_item` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_item`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `master_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO inventory VALUES ("27","asd","aW - w","sad","4","B","Aw");
INSERT INTO inventory VALUES ("28","Item 2","aW - w","FF32","6","B","Aw");




CREATE TABLE `retur_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `tanggalretur` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO retur_pembelian VALUES ("4","asd","2023-06-20","1","r");
INSERT INTO retur_pembelian VALUES ("5","asd","2023-06-20","1","S");




CREATE TABLE `retur_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `tanggalretur` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





CREATE TABLE `transaksibeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `nofaktur` varchar(25) NOT NULL,
  `Barang` varchar(50) NOT NULL,
  `Supplier` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `harga_beli` decimal(10,2) DEFAULT NULL,
  `total_harga_beli_barang` int(11) NOT NULL,
  `jenis_bayar` varchar(15) NOT NULL,
  `status_bayar` varchar(15) NOT NULL,
  `hutang_terbayar` int(30) NOT NULL,
  `metodebayarhutang` varchar(15) NOT NULL,
  `kode_item` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO transaksibeli VALUES ("76","2023-06-21","F01","asd","aW - w","2","10.00","20","Cash","Lunas","0","","sad","B","Aw");
INSERT INTO transaksibeli VALUES ("77","2023-06-21","F01","Item 2","aW - w","1","1.00","1","Cash","Lunas","0","","FF32","B","Aw");
INSERT INTO transaksibeli VALUES ("78","2023-06-22","F02","asd","aW - w","2","1.00","2","Cash","Lunas","0","","sad","B","Aw");
INSERT INTO transaksibeli VALUES ("79","2023-06-22","F02","Item 2","aW - w","5","2.00","10","Cash","Lunas","0","","FF32","B","Aw");




CREATE TABLE `transaksijual` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `nofaktur` varchar(25) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `Member` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL,
  `jenis_bayar` varchar(15) NOT NULL,
  `metodebayarhutang` varchar(15) NOT NULL,
  `status_bayar` varchar(15) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `hutang_terbayar` int(30) NOT NULL,
  `kode_item` varchar(50) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



