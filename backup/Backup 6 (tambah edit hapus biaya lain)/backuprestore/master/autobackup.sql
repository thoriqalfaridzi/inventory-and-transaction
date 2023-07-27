

CREATE TABLE `master_item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `kode_item` varchar(20) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `kode_supplier_item` varchar(20) NOT NULL,
  `kategori_item` varchar(20) NOT NULL,
  `satuan_item` varchar(10) NOT NULL,
  `harga_beli_terakhir_item` varchar(50) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_item VALUES ("23","V3","Item mau dijual","AAA Suppli - Namasup","Elektrik","Km","21");
INSERT INTO master_item VALUES ("24","swqrqw","Item 2","AAA Suppli - Namasup","Elektrik","Cm","21321");
INSERT INTO master_item VALUES ("25","R-01","Resistor","001 - Logi","SparePart","Cmd","19000");
INSERT INTO master_item VALUES ("26","BG-01","mouse","001 - Logi","Elektrik","Cmd","19000");




CREATE TABLE `master_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_kategori VALUES ("1","SparePart");
INSERT INTO master_kategori VALUES ("2","Elektrik");




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

INSERT INTO master_member VALUES ("1","member 1","21321","213","2","112","2131","fae");




CREATE TABLE `master_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_satuan VALUES ("2","Cm");
INSERT INTO master_satuan VALUES ("3","Roll");




CREATE TABLE `master_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_seller` varchar(55) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_seller VALUES ("3","Seller 3","12321","keterangan");




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

INSERT INTO master_supplier VALUES ("13","AAA Suppli","Namasuplier1","sp1","cp1","te1","h1");
INSERT INTO master_supplier VALUES ("14","A112","sup2","s2","c2","2","4");


