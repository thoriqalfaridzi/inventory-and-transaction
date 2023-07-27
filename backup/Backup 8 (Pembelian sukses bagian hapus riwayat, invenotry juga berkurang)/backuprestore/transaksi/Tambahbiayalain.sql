

CREATE TABLE `biaya_lain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `biayalain` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO biaya_lain VALUES ("12","6","2023","asdasd","3.00");




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





CREATE TABLE `retur_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `tanggalretur` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





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
  `jenis_bayar` varchar(15) NOT NULL,
  `status_bayar` varchar(15) NOT NULL,
  `hutang_terbayar` int(30) NOT NULL,
  `kode_item` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





CREATE TABLE `transaksijual` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `nofaktur` varchar(25) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `Member` varchar(50) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL,
  `jenis_bayar` varchar(15) NOT NULL,
  `status_bayar` varchar(15) NOT NULL,
  `seller` varchar(50) NOT NULL,
  `hutang_terbayar` int(30) NOT NULL,
  `kode_item` varchar(50) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `kategori` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



