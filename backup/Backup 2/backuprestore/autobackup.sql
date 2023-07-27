

CREATE TABLE `biaya_lain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `biayalain` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO biaya_lain VALUES
INSERT INTO biaya_lain VALUES
INSERT INTO biaya_lain VALUES
INSERT INTO biaya_lain VALUES
INSERT INTO biaya_lain VALUES




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


INSERT INTO inventory VALUES
("23","Item mau dijual","AAA Suppli - Namasup","V3","-161122","Km","Elektrik"),
("24","Item 2","AAA Suppli - Namasup","swqrqw","-4","Cm","Elektrik");
INSERT INTO inventory VALUES
INSERT INTO inventory VALUES
INSERT INTO inventory VALUES
INSERT INTO inventory VALUES
INSERT INTO inventory VALUES
INSERT INTO inventory VALUES




CREATE TABLE `master_item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `kode_item` varchar(20) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `kode_supplier_item` varchar(20) NOT NULL,
  `kategori_item` varchar(20) NOT NULL,
  `satuan_item` varchar(10) NOT NULL,
  `harga_beli_terakhir_item` varchar(50) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO master_item VALUES
("23","V3","Item mau dijual","AAA Suppli - Namasup","Elektrik","Km","21"),
("24","swqrqw","Item 2","AAA Suppli - Namasup","Elektrik","Cm","21321");
INSERT INTO master_item VALUES
INSERT INTO master_item VALUES
INSERT INTO master_item VALUES
INSERT INTO master_item VALUES
INSERT INTO master_item VALUES
INSERT INTO master_item VALUES




CREATE TABLE `master_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO master_kategori VALUES
("1","SparePart"),
("2","Elektrik");
INSERT INTO master_kategori VALUES




CREATE TABLE `master_member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `kode_member` varchar(20) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `alamat_member` varchar(50) NOT NULL,
  `contactperson_member` varchar(20) NOT NULL,
  `no_telp_member` varchar(20) NOT NULL,
  `no_hp_member` varchar(20) NOT NULL,
  `keterangan_member` varchar(50) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO master_member VALUES
("1","member 1","21321","213","2","112","2131","fae");
INSERT INTO master_member VALUES
INSERT INTO master_member VALUES
INSERT INTO master_member VALUES
INSERT INTO master_member VALUES
INSERT INTO master_member VALUES
INSERT INTO master_member VALUES
INSERT INTO master_member VALUES




CREATE TABLE `master_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO master_satuan VALUES
("1","Km"),
("2","Cm");
INSERT INTO master_satuan VALUES




CREATE TABLE `master_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_seller` varchar(55) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO master_seller VALUES
("3","Seller 3","12321","keterangan");
INSERT INTO master_seller VALUES
INSERT INTO master_seller VALUES
INSERT INTO master_seller VALUES




CREATE TABLE `master_supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `contactperson_supplier` varchar(20) NOT NULL,
  `no_telp_supplier` varchar(20) NOT NULL,
  `no_hp_supplier` varchar(20) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO master_supplier VALUES
("13","AAA Suppli","Namasuplier1","sp1","cp1","te1","h1"),
("14","A112","sup2","s2","c2","2","4");
INSERT INTO master_supplier VALUES
INSERT INTO master_supplier VALUES
INSERT INTO master_supplier VALUES
INSERT INTO master_supplier VALUES
INSERT INTO master_supplier VALUES
INSERT INTO master_supplier VALUES




CREATE TABLE `retur_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `tanggalretur` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO retur_pembelian VALUES
INSERT INTO retur_pembelian VALUES
INSERT INTO retur_pembelian VALUES
INSERT INTO retur_pembelian VALUES
INSERT INTO retur_pembelian VALUES




CREATE TABLE `retur_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `tanggalretur` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO retur_penjualan VALUES
INSERT INTO retur_penjualan VALUES
INSERT INTO retur_penjualan VALUES
INSERT INTO retur_penjualan VALUES
INSERT INTO retur_penjualan VALUES




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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO transaksibeli VALUES
("5","2023-05-19","3342","Item 2","AAA Suppli - Namasup","322","23432432.00","Cash","Lunas","0","swqrqw","Cm","Elektrik");
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO transaksijual VALUES
("3","2023-06-16","222","Item mau dijual","21321","23","99999999.99","Cash","Lunas","Seller 3","0","V3","Km","Elektrik");
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES
INSERT INTO transaksijual VALUES


