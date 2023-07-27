

CREATE TABLE `master_item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `kode_item` varchar(20) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `kode_supplier_item` varchar(20) NOT NULL,
  `kategori_item` varchar(20) NOT NULL,
  `satuan_item` varchar(10) NOT NULL,
  `harga_beli_terakhir_item` varchar(50) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_item VALUES ("27","sad","asd","aW - w","Aw","B","as");
INSERT INTO master_item VALUES ("28","FF32","Item 2","aW - w","Aw","B","2");




CREATE TABLE `master_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_kategori VALUES ("3","Aw");




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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_member VALUES ("2","w","w","w","w","w","w","w");




CREATE TABLE `master_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_satuan VALUES ("6","B");




CREATE TABLE `master_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_seller` varchar(55) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_seller VALUES ("4","asd","as","sa");




CREATE TABLE `master_supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `contactperson_supplier` varchar(20) NOT NULL,
  `no_telp_supplier` varchar(20) NOT NULL,
  `no_hp_supplier` varchar(20) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_supplier VALUES ("15","aW","w","w","w","w","w");


