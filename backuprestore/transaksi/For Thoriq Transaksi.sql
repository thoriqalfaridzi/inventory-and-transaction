

CREATE TABLE `biaya_lain` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `biayalain` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





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

INSERT INTO inventory VALUES ("34","Karet Rem (seiken)","S01","SC 80209","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("35","Karet Rem (seiken)","S01","SC 50423","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("36","Karet Rem (seiken)","S01","SC 50433","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("37","Karet Rem (seiken)","S01","SC 4514","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("38","Karet Rem (seiken)","S01","SC 4526","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("39","Karet Rem (seiken)","S01","SC 30213","400","PCS","Sparepart");
INSERT INTO inventory VALUES ("40","Karet Rem (seiken)","S01","SC 80093","300","PCS","Sparepart");
INSERT INTO inventory VALUES ("41","Karet Rem (seiken)","S01","SC 80193","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("42","Karet Rem (seiken)","S01","SC 30253","2200","PCS","Sparepart");
INSERT INTO inventory VALUES ("43","Karet Rem (seiken)","S01","SC 30263","500","PCS","Sparepart");
INSERT INTO inventory VALUES ("44","Karet Rem (seiken)","S01","SC 80353","1000","PCS","Sparepart");
INSERT INTO inventory VALUES ("45","Karet Rem (seiken)","S01","SC 40493","1200","PCS","Sparepart");
INSERT INTO inventory VALUES ("46","Bearing NTN","S02","6906","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("47","Bearing koyo","S02","6305","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("48","Bearing DJH","S02","6203","100","PCS","Sparepart");
INSERT INTO inventory VALUES ("49","Bearing NTL","S02","628","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("50","Bearing NTL","S02","627","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("51","Oil Filter Canter","","PC 307","240","PCS","Sparepart");
INSERT INTO inventory VALUES ("52","Oil Filter L300 Diesel","","RE 8210","250","PCS","Sparepart");
INSERT INTO inventory VALUES ("53","Fuel Filter Triton","","RE 5","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("54","Discpad Futura","","DP Futura","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("55","Discpad Grandmax","","DP Grand","340","PCS","Sparepart");
INSERT INTO inventory VALUES ("56","Sarung Jok CD Turbo Domino Hitam-Merah KK","","SJ CD Turbo","3","PCS","Sparepart");
INSERT INTO inventory VALUES ("57","Sarung Jok Granmax Pu Domino Hitam-Merah KK","","SJ Granmax","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("58","Sarung Jok Traga Domino Hitam-Merah KK","","SJ Traga","3","PCS","Sparepart");
INSERT INTO inventory VALUES ("59","Sarung Jok Carry 1.5 Pu Domino Hitam-Merah KK","","SJ Carry","5","PCS","Variasi");
INSERT INTO inventory VALUES ("60","Sarung Jok L300 Pu Domino Hitam-Merah KK","","SJ L300","5","PCS","Variasi");
INSERT INTO inventory VALUES ("61","Sarung Jok APV Pu Domino Hitam-Merah KK","","SJ APV","5","PCS","Variasi");
INSERT INTO inventory VALUES ("62","Sarung Jok Carry 19 Pu Domino Hitam-Merah KK","","SJ Carry 19","3","PCS","Sparepart");
INSERT INTO inventory VALUES ("63","Sarung Jok CD Ragasa Domino Hitam-Merah KK","","SJ CD Ragasa","3","PCS","Variasi");
INSERT INTO inventory VALUES ("64","Gear Set 6X39 IS NKR71 OKYM Gold","","8-97209-168","1","SET","Sparepart");
INSERT INTO inventory VALUES ("65","Gear Set 6X40 MT PS135/FE74 OKYM Gold","","MC 075131S","1","SET","Sparepart");
INSERT INTO inventory VALUES ("66","Gear Set 6X40 MT PS120 OKYM Gold","","MC 863589S","1","SET","Sparepart");
INSERT INTO inventory VALUES ("67","Kabel  Aki 24V 300CM Global List MRH","","300CM-GBL-LM/09","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("68","Kabel Aki 24V 150CM Global List MRH","","150CM-GBL-LM/09","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("69","Kabel Aki 24V 250CM Global List MRH","","250CM-GBL-LM/09","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("70","Kabel Aki 24V 40CM Global List MRH","","40CM-GBL-LM/09","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("71","Kabel Aki 24V 50CM Global List MRH","","50CM-GBL-LM/09","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("72","Kabel  Aki 24V 75CM Global List MRH","","75CM-GBL-LM/09","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("73","Kabel Massa Global List MRH","","MAS-GBL-LM/10","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("74","Klem Aki Kuningan NS40","","Kuning NS40/10","100","PCS","Sparepart");
INSERT INTO inventory VALUES ("75","Kabel Starter Global PS List MRH","","STR-GBL-LM/10","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("76","Kabel Pararel Pakai Tutup","","KBL PRL TTP/29","70","PCS","Sparepart");
INSERT INTO inventory VALUES ("77","Klem Aki Kuningan Jumbo","","Kuning Jumbo/25","50","PCS","Sparepart");
INSERT INTO inventory VALUES ("78","Klem Aki Timah NS40","","Timah NS40/10","50","PCS","Sparepart");
INSERT INTO inventory VALUES ("79","Klem Aki Timah N200","","Timah N200/10","50","PCS","Sparepart");
INSERT INTO inventory VALUES ("80","Fuel Tank 065-9","","001084","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("81","NOZ/LA160P50FE347","","SJN7-087JK","50","PCS","Sparepart");
INSERT INTO inventory VALUES ("82","NOZ/DLLA160P3PS89","","SJN7-047JK","40","PCS","Sparepart");
INSERT INTO inventory VALUES ("83","Spider White PS120","","SJP6-026JK","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("84","Case Diff Only PS135","","SJT7-005JK","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("85","Drag Link Assy PS125","","MK-471750","24","PCS","Sparepart");
INSERT INTO inventory VALUES ("86","Tie Rod End PS125","","MK-997508/09","50","SET","Sparepart");
INSERT INTO inventory VALUES ("87","Tie Rod End HT","","EFJ10-06100/10","40","SET","Sparepart");
INSERT INTO inventory VALUES ("88","Motor Wiper KIA Timor","","OK-22H-67-350","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("89","Motor Wiper Isuzu NKR126","","ML09-09","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("90","Motor Wiper Suzuki ST100 Carry","","38101-79050","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("91","Motor Wiper Mitsubishi PS-190, Fuso","","MC 859852","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("92","Front Engine Mounting Mitsubishi PS120","","ME 011807","4","PCS","Sparepart");
INSERT INTO inventory VALUES ("93","Centre Bearing Mitsubishi PS100 Galvanis","","MB 000083 G","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("94","Wiper Link Suzuki Futura","","38102-77500","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("95","P Coating Bears RH","","SM-100 B R","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("96","P Coating Bears LH","","SM-100 B L","4","PCS","Sparepart");
INSERT INTO inventory VALUES ("97","Motor Wiper Mitsubishi L300","","MB 141843","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("98","Fuel Gauge S. Carry ST100 ","","34910-70010","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("99","Motor Wiper Daihatsu S88/S89","","85120-87516","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("100","SM-135 B R (OLD)","","SM-135 B R (OLD)","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("102","Wiper Link Assy Mitsubishi CK12","","28840-Z5012","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("103","Wiper Link Assy Mitsubishi PS135","","MB-302328","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("104","Wiper Link Assy Mitsubishi PS120","","MB-302227","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("105","Wiper Link Assy Mitsubishi FE70","","MK-404322","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("106","Wiper Arm To 5K","","85190-90P00","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("107","Wiper Arm To 4K","","WA-T01","4","PCS","Sparepart");
INSERT INTO inventory VALUES ("108","Wiper Arm SU T100","","38310-79001","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("109","Wiper Arm Mitsubishi L300 OLD","","MB-141139","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("110","Motor Wiper Toyota 7K","","85110-08010","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("111","Mud Guard Grand Avanza Front DNY","","MG-Avanza Front DNY","5","SET","Variasi");
INSERT INTO inventory VALUES ("112","Mud Guard Grand Avanza Rear DNY","","MG-Avanza Rear DNY","6","SET","Variasi");
INSERT INTO inventory VALUES ("113","karpet Roda STL Sparco Silver","","KR-Sparco Silver","80","SET","Sparepart");
INSERT INTO inventory VALUES ("114","Futura/Apv/Carry 8T K","","SSFRAPVK","7","PCS","Sparepart");
INSERT INTO inventory VALUES ("115","Oil Ws Cover Isuzu Diesel 8-94144","","POWS-062","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("116","Kepala 6015/Fuso Fighter","","PK-091","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("117","Kepala 6017/Ganzo","","PK-092","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("118","Bendix Fuso Figher/6015/PS190","","PGB-245","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("119","Yoke PS135/PS125/4D33 24V","","PCS-007","40","PCS","Sparepart");
INSERT INTO inventory VALUES ("120","Angker Dino Louhan 500 24V","","PASLH5","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("121","Angker Dino Jumbo/CK12/Nisaan","","PASNRD5","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("122","Bearing ALT Canter/PS135","","PBRNME","60","PCS","Sparepart");
INSERT INTO inventory VALUES ("123","Stator PS135","","PCA-003","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("124","IC Rinosaurus 115ET/130HT 28,3V","","PICND-009","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("125","Switch Innova/Hilux Reborn","","PSW7K","7","PCS","Sparepart");
INSERT INTO inventory VALUES ("126","IC NKR 71 28,5","","PICH-005","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("127","IC PS100/PS120 24V 35A","","PICM-009","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("128","Holder Carbon PS135/PS125","","PHCBPS135","8","PCS","Sparepart");
INSERT INTO inventory VALUES ("129","Angker PS135/PS125/4D33 24V New","","PASM4D33A","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("130","Gear Kit 9T PS135","","PG-036","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("131","Espass/S91/S92/Classy/Feroza","","SDEP16P9","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("132","Katana/Jimmy 8T K","","SSKTK","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("133","CRV 2.01 4WD 07 KE5 III TH.07/Civic","","SHCRVTE","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("134","T12055 INJ/P-5 ","","AMT12DIN","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("135","L300 2,3 Diesel","","SML3DD2.3N","7","PCS","Sparepart");
INSERT INTO inventory VALUES ("136","Switch Assy Aluminium Hino 300","","PSWH300","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("137","Angker NKR 66/NKR 71/135PS/4HF1","","PASNKR66","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("138","Stator Ganzo/6D17/Canter/PS125","","PCA-009","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("139","Stator PS135","","PCA-003 ASLI","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("140","PICD-001","","IC Hino Louham/Hino ","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("141","PICH-017","","IC 24V 4HF1/NPR71/NK","7","PCS","Sparepart");
INSERT INTO inventory VALUES ("142","Rino 138/148/12V V83 BU-30","","STDN138N","4","PCS","Sparepart");
INSERT INTO inventory VALUES ("143","ZF Jeep (G) Big","","ST2FJPG","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("144","ZF 65A (NEW)","","AT2FN","4","PCS","Sparepart");
INSERT INTO inventory VALUES ("145","ZF Jeep Platina","","CPT2FJN","3","PCS","Sparepart");
INSERT INTO inventory VALUES ("146","Switch PS100/PS135/PS120 24V New","","PSWP100N","35","PCS","Sparepart");
INSERT INTO inventory VALUES ("147","Switch NM T120S INJ/Lancer 12V","","PSWNM","7","PCS","Sparepart");
INSERT INTO inventory VALUES ("148","L200 Strada/Triton 2.5/Pajero","","SML200AT","7","PCS","Sparepart");
INSERT INTO inventory VALUES ("149","STR Kuda Diesel/L300 2.5 New","","SMKDDN","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("150","Gear Kit PS135","","PG-025","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("151","OM BT L300","","PGB-226","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("152","Switch Futura","","PSWK","7","PCS","Sparepart");
INSERT INTO inventory VALUES ("153","T120SS/L300 8T K","","SMT120SKS","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("154","Flasher Relay 12V K3 Toyota Camry","","PRT-S702","25","PCS","Sparepart");
INSERT INTO inventory VALUES ("155","Switch NKR 71","","PAWNKR66","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("157","Switch Lauhan","","PASWLH","9","PCS","Sparepart");
INSERT INTO inventory VALUES ("158","Carbon Brush STR Dyna 24V","","PCBS-017","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("159","Alt Hino 13DHT 24V","","AH13DO-1","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("160","Trinton 2.5","","SML200N","7","PCS","Sparepart");
INSERT INTO inventory VALUES ("161","OBC Radiator Coolant Hijau 4x5 LTR","","OBC Radiator Hijau","61","DOS","Sparepart");
INSERT INTO inventory VALUES ("162","OBC Radiator Coolant Merah 4x5 LTR","","OBC Radiator Merah","9","DOS","Sparepart");
INSERT INTO inventory VALUES ("163","Kyoso Oli Hidraulic 68 Coklat 18 LTR","","KY 68 18 LTR","30","PCS","Sparepart");
INSERT INTO inventory VALUES ("164","Kyoso Hidraulic 68 Coklat 4x5 LTR","","KY 68 4x5 LTR","10","DOS","Sparepart");
INSERT INTO inventory VALUES ("165","Fuel Filter Fuso FC1003","","FF Fuso FC1003","75","PCS","Sparepart");
INSERT INTO inventory VALUES ("166","Oil Filter T120SS","","OF T120SS","50","PCS","Sparepart");
INSERT INTO inventory VALUES ("167","Air Filter Avanza","","AF Avanza A3312","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("168","Air Filter R3","","AF R3 A14490","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("169","Air Filter Inova","","AF Inova A5903","8","SET","Sparepart");
INSERT INTO inventory VALUES ("170","Oil Filter FM 01005","","OF FM 01005","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("171","Oil Filter C1318","","OF C1318","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("172","Fuel Filter FC1301","","FF FC1301","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("173","Fuel Filter FE F1002","","FF FE F1002","50","PCS","Sparepart");
INSERT INTO inventory VALUES ("174","Fuel Filter FC1005","","FF FC1005","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("175","Fuel Filter L300D  FC1001","","FF FC1001","25","PCS","Sparepart");
INSERT INTO inventory VALUES ("176","Oil FIlter L300D","","OF C1008","25","PCS","Sparepart");
INSERT INTO inventory VALUES ("177","Fuel Filter RD33 ","","FF FC5601","25","PCS","Sparepart");
INSERT INTO inventory VALUES ("178","Air Filter PS A1007","","AF A1007","12","PCS","Sparepart");
INSERT INTO inventory VALUES ("179","Oil Filter Canter ","","OF C1012","25","PCS","Sparepart");
INSERT INTO inventory VALUES ("180","Fuel Filter Nissan","","FF FE1804","50","PCS","Sparepart");
INSERT INTO inventory VALUES ("181","Radiator Ford Ranger","","3301-1028 AT","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("182","Radiator LO39","","3321-1054","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("183","Karet Rem (seiken)","","SC 7059","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("184","Karet Rem (seiken)","","SC 80133","100","PCS","Sparepart");
INSERT INTO inventory VALUES ("185","Karet Rem (seiken)","","SC 20233","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("186","Karet Rem (seiken)","","SC 41563","200","PCS","Sparepart");
INSERT INTO inventory VALUES ("187","Radiator PO Turbo","","2323-1004","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("188","Bearing koyo","","6304 ","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("189","Bearing NIS","","204 D1","4","PCS","Sparepart");
INSERT INTO inventory VALUES ("190","Bearing koyo","","6308","25","PCS","Sparepart");
INSERT INTO inventory VALUES ("191","Bearing NIS","","6202","50","PCS","Sparepart");
INSERT INTO inventory VALUES ("192","Bearing NIS","","6207","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("193","Bearing NIS","","6208","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("194","Bearing NIS","","626 ","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("195","Bearing NIS","","6204 ZZ","100","PCS","Sparepart");
INSERT INTO inventory VALUES ("198","Wrapped Belt","","B-065","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("199","Wrapped Belt","","B-066","15","PCS","Sparepart");
INSERT INTO inventory VALUES ("202","Wrapped Belt","","B-069","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("204","Wrapped Belt","","B-071","30","PCS","Sparepart");
INSERT INTO inventory VALUES ("210","Wrapped Belt","","B-079","210","PCS","Sparepart");
INSERT INTO inventory VALUES ("211","Wrapped Belt","","B-080","30","PCS","Sparepart");
INSERT INTO inventory VALUES ("222","Wrapped Belt","","B-092","15","PCS","Sparepart");
INSERT INTO inventory VALUES ("225","Wrapped Belt","","B-095","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("227","Wrapped Belt","","B-097","3","PCS","Sparepart");
INSERT INTO inventory VALUES ("233","Wrapped Belt","","B-041","15","PCS","Sparepart");
INSERT INTO inventory VALUES ("234","Wrapped Belt","","B-045","15","PCS","Sparepart");
INSERT INTO inventory VALUES ("235","Wrapped Belt","","B-051","15","PCS","Sparepart");
INSERT INTO inventory VALUES ("236","Wrapped Belt","","B-056","41","DOS","Sparepart");
INSERT INTO inventory VALUES ("237","Wrapped Belt","","B-060","25","PCS","Sparepart");
INSERT INTO inventory VALUES ("239","Wrapped Belt","","B-074","65","PCS","Sparepart");
INSERT INTO inventory VALUES ("240","Wrapped Belt","","B-032","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("241","Wrapped Belt","","B-057","30","PCS","Sparepart");
INSERT INTO inventory VALUES ("242","Wrapped Belt","","B-058","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("243","Wrapped Belt","","B-059","20","PCS","Sparepart");
INSERT INTO inventory VALUES ("244","Wrapped Belt","","B-064","16","PCS","Sparepart");
INSERT INTO inventory VALUES ("245","Wrapped Belt","","A-049","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("246","Wrapped Belt","","B-047","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("247","Wrapped Belt","","B-054","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("248","Wrapped Belt","","B-055","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("249","Wrapped Belt","","B-108","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("250","Wrapped Belt","","B-110","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("259","Wrapped Belt","","B-061","10","PCS","Sparepart");
INSERT INTO inventory VALUES ("260","Wrapped Belt","","B-127","3","PCS","Sparepart");
INSERT INTO inventory VALUES ("261","Wrapped Belt","","B-155","1","PCS","Sparepart");
INSERT INTO inventory VALUES ("262","Wrapped Belt","","M-028","2","PCS","Sparepart");
INSERT INTO inventory VALUES ("263","Wrapped Belt","","A-035","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("264","Wrapped Belt","","A-036","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("265","Wrapped Belt","","A-037","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("266","Wrapped Belt","","A-038","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("267","Wrapped Belt","","A-039","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("268","Wrapped Belt","","A-041","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("269","Wrapped Belt","","A-042","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("270","Wrapped Belt","","A-043","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("271","Wrapped Belt","","A-044","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("272","Wrapped Belt","","A-045","11","PCS","Sparepart");
INSERT INTO inventory VALUES ("273","Wrapped Belt","","A-058","6","DOS","Sparepart");
INSERT INTO inventory VALUES ("274","Wrapped Belt","","A-033","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("275","Raw Edge Belt","","RECMF-8530","5","PCS","Sparepart");
INSERT INTO inventory VALUES ("276","Bearing UCP","","IBME 208-24","140","PCS","Sparepart");
INSERT INTO inventory VALUES ("277","Wrapped Belt","","B-036","15","PCS","Sparepart");
INSERT INTO inventory VALUES ("278","Wrapped Belt","","B-046","15","PCS","Sparepart");
INSERT INTO inventory VALUES ("279","Wrapped Belt","","A-050","15","PCS","Sparepart");
INSERT INTO inventory VALUES ("280","Wrapped Belt","","A-054","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("282","Wrapped Belt","","A-057","6","PCS","Sparepart");
INSERT INTO inventory VALUES ("283","Wrapped Belt","","A-032","0","PCS","Sparepart");




CREATE TABLE `retur_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `tanggalretur` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `diganti` varchar(5) NOT NULL,
  `supplier` varchar(25) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





CREATE TABLE `retur_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang` varchar(50) NOT NULL,
  `tanggalretur` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `diganti` varchar(5) NOT NULL,
  `member` varchar(25) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





CREATE TABLE `transaksibeli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
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
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=421 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO transaksibeli VALUES ("123","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","200","3650.00","730000","Cash","Lunas","0","","SC 80209","PCS","Sparepart","34");
INSERT INTO transaksibeli VALUES ("124","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","200","2100.00","420000","Cash","Lunas","0","","SC 50423","PCS","Sparepart","35");
INSERT INTO transaksibeli VALUES ("125","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","200","2100.00","420000","Cash","Lunas","0","","SC 50433","PCS","Sparepart","36");
INSERT INTO transaksibeli VALUES ("126","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","200","1600.00","320000","Cash","Lunas","0","","SC 4514","PCS","Sparepart","37");
INSERT INTO transaksibeli VALUES ("127","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","200","1600.00","320000","Cash","Lunas","0","","SC 4526","PCS","Sparepart","38");
INSERT INTO transaksibeli VALUES ("128","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","200","1600.00","320000","Cash","Lunas","0","","SC 30213","PCS","Sparepart","39");
INSERT INTO transaksibeli VALUES ("129","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","200","2100.00","420000","Cash","Lunas","0","","SC 80093","PCS","Sparepart","40");
INSERT INTO transaksibeli VALUES ("130","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","200","1850.00","370000","Cash","Lunas","0","","SC 80193","PCS","Sparepart","41");
INSERT INTO transaksibeli VALUES ("131","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","2000","1850.00","3700000","Cash","Lunas","0","","SC 30253","PCS","Sparepart","42");
INSERT INTO transaksibeli VALUES ("132","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","500","1850.00","925000","Cash","Lunas","0","","SC 30263","PCS","Sparepart","43");
INSERT INTO transaksibeli VALUES ("133","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","1000","1850.00","1850000","Cash","Lunas","0","","SC 80353","PCS","Sparepart","44");
INSERT INTO transaksibeli VALUES ("134","2022-01-29","0000-00-00","F0120220129","Karet Rem (seiken)","S01","1000","1850.00","1850000","Cash","Lunas","0","","SC 40493","PCS","Sparepart","45");
INSERT INTO transaksibeli VALUES ("137","2022-01-27","0000-00-00","F0220220127","Bearing NTN","S02","10","42000.00","420000","Cash","Lunas","0","","6906","PCS","Sparepart","46");
INSERT INTO transaksibeli VALUES ("138","2022-01-27","0000-00-00","F0220220127","Bearing koyo","S02","10","35800.00","358000","Cash","Lunas","0","","6305","PCS","Sparepart","47");
INSERT INTO transaksibeli VALUES ("139","2022-01-27","0000-00-00","F0320220127","Bearing DJH","S02","100","5750.00","575000","Cash","Lunas","0","","6203","PCS","Sparepart","48");
INSERT INTO transaksibeli VALUES ("140","2022-01-27","0000-00-00","F0320220127","Bearing NTL","S02","20","3500.00","70000","Cash","Lunas","0","","628","PCS","Sparepart","49");
INSERT INTO transaksibeli VALUES ("141","2022-01-27","0000-00-00","F0320220127","Bearing NTL","S02","20","3500.00","70000","Cash","Lunas","0","","627","PCS","Sparepart","50");
INSERT INTO transaksibeli VALUES ("142","2022-01-29","0000-00-00","F0420220129","Oil Filter Canter","S03","240","55000.00","13200000","Cash","Lunas","0","","PC 307","PCS","Sparepart","51");
INSERT INTO transaksibeli VALUES ("143","2022-01-29","0000-00-00","F0420220129","Oil Filter L300 Diesel","S03","250","48000.00","12000000","Cash","Lunas","0","","RE 8210","PCS","Sparepart","52");
INSERT INTO transaksibeli VALUES ("144","2022-01-29","0000-00-00","F0420220129","Fuel Filter Triton","S03","200","47000.00","9400000","Cash","Lunas","0","","RE 5","PCS","Sparepart","53");
INSERT INTO transaksibeli VALUES ("145","2022-01-14","0000-00-00","F0520220114","Discpad Futura","S04","200","43500.00","8700000","Cash","Lunas","0","","DP Futura","PCS","Sparepart","54");
INSERT INTO transaksibeli VALUES ("146","2022-01-14","0000-00-00","F0520220114","Discpad Grandmax","S04","200","58500.00","11700000","Cash","Lunas","0","","DP Grand","PCS","Sparepart","55");
INSERT INTO transaksibeli VALUES ("147","2022-01-14","0000-00-00","F0520220114","Discpad Grandmax","S04","140","58500.00","8190000","Cash","Lunas","0","","DP Grand","PCS","Sparepart","55");
INSERT INTO transaksibeli VALUES ("157","2022-01-27","0000-00-00","F0620220127","Sarung Jok CD Turbo Domino Hitam-Merah KK","S05","3","290000.00","870000","Cash","Lunas","0","","SJ CD Turbo","PCS","Sparepart","56");
INSERT INTO transaksibeli VALUES ("158","2022-01-27","0000-00-00","F0620220127","Sarung Jok Granmax Pu Domino Hitam-Merah KK","S05","5","290000.00","1450000","Cash","Lunas","0","","SJ Granmax","PCS","Sparepart","57");
INSERT INTO transaksibeli VALUES ("159","2022-01-27","0000-00-00","F0620220127","Sarung Jok Traga Domino Hitam-Merah KK","S05","3","290000.00","870000","Cash","Lunas","0","","SJ Traga","PCS","Sparepart","58");
INSERT INTO transaksibeli VALUES ("160","2022-01-27","0000-00-00","F0620220127","Sarung Jok Carry 1.5 Pu Domino Hitam-Merah KK","S05","5","290000.00","1450000","Cash","Lunas","0","","SJ Carry","PCS","Variasi","59");
INSERT INTO transaksibeli VALUES ("161","2022-01-27","0000-00-00","F0620220127","Sarung Jok L300 Pu Domino Hitam-Merah KK","S05","5","290000.00","1450000","Cash","Lunas","0","","SJ L300","PCS","Variasi","60");
INSERT INTO transaksibeli VALUES ("162","2022-01-27","0000-00-00","F0620220127","Sarung Jok APV Pu Domino Hitam-Merah KK","S05","5","290000.00","1450000","Cash","Lunas","0","","SJ APV","PCS","Variasi","61");
INSERT INTO transaksibeli VALUES ("163","2022-01-27","0000-00-00","F0620220127","Sarung Jok Carry 19 Pu Domino Hitam-Merah KK","S05","3","290000.00","870000","Cash","Lunas","0","","SJ Carry 19","PCS","Sparepart","62");
INSERT INTO transaksibeli VALUES ("164","2022-01-27","0000-00-00","F0620220127","Sarung Jok CD Ragasa Domino Hitam-Merah KK","S05","3","290000.00","870000","Cash","Lunas","0","","SJ CD Ragasa","PCS","Variasi","63");
INSERT INTO transaksibeli VALUES ("165","2022-01-18","0000-00-00","F0720220118","Gear Set 6X39 IS NKR71 OKYM Gold","S06","1","2335193.00","2335193","Cash","Lunas","0","","8-97209-168","SET","Sparepart","64");
INSERT INTO transaksibeli VALUES ("166","2022-01-18","0000-00-00","F0720220118","Gear Set 6X40 MT PS135/FE74 OKYM Gold","S06","1","2568720.00","2568720","Cash","Lunas","0","","MC 075131S","SET","Sparepart","65");
INSERT INTO transaksibeli VALUES ("167","2022-01-18","0000-00-00","F0720220118","Gear Set 6X40 MT PS120 OKYM Gold","S06","1","1944624.00","1944624","Cash","Lunas","0","","MC 863589S","SET","Sparepart","66");
INSERT INTO transaksibeli VALUES ("168","2022-01-05","0000-00-00","F0820220105","Kabel  Aki 24V 300CM Global List MRH","S07","20","120000.00","2400000","Cash","Lunas","0","","300CM-GBL-LM/09","PCS","Sparepart","67");
INSERT INTO transaksibeli VALUES ("169","2022-01-05","0000-00-00","F0820220105","Kabel Aki 24V 150CM Global List MRH","S07","20","60000.00","1200000","Cash","Lunas","0","","150CM-GBL-LM/09","PCS","Sparepart","68");
INSERT INTO transaksibeli VALUES ("170","2022-01-05","0000-00-00","F0820220105","Kabel Aki 24V 250CM Global List MRH","S07","20","100000.00","2000000","Cash","Lunas","0","","250CM-GBL-LM/09","PCS","Sparepart","69");
INSERT INTO transaksibeli VALUES ("171","2022-01-05","0000-00-00","F0820220105","Kabel Aki 24V 40CM Global List MRH","S07","10","18000.00","180000","Cash","Lunas","0","","40CM-GBL-LM/09","PCS","Sparepart","70");
INSERT INTO transaksibeli VALUES ("172","2022-01-05","0000-00-00","F0820220105","Kabel Aki 24V 50CM Global List MRH","S07","10","20000.00","200000","Cash","Lunas","0","","50CM-GBL-LM/09","PCS","Sparepart","71");
INSERT INTO transaksibeli VALUES ("173","2022-01-05","0000-00-00","F0820220105","Kabel  Aki 24V 75CM Global List MRH","S07","10","30000.00","300000","Cash","Lunas","0","","75CM-GBL-LM/09","PCS","Sparepart","72");
INSERT INTO transaksibeli VALUES ("174","2022-01-05","0000-00-00","F0820220105","Kabel Massa Global List MRH","S07","5","27000.00","135000","Cash","Lunas","0","","MAS-GBL-LM/10","PCS","Sparepart","73");
INSERT INTO transaksibeli VALUES ("175","2022-01-05","0000-00-00","F0820220105","Klem Aki Kuningan NS40","S07","100","7250.00","725000","Cash","Lunas","0","","Kuning NS40/10","PCS","Sparepart","74");
INSERT INTO transaksibeli VALUES ("176","2022-01-05","0000-00-00","F0820220105","Kabel Starter Global PS List MRH","S07","10","52500.00","525000","Cash","Lunas","0","","STR-GBL-LM/10","PCS","Sparepart","75");
INSERT INTO transaksibeli VALUES ("177","2022-01-05","0000-00-00","F0820220105","Kabel Pararel Pakai Tutup","S07","70","27500.00","1925000","Cash","Lunas","0","","KBL PRL TTP/29","PCS","Sparepart","76");
INSERT INTO transaksibeli VALUES ("178","2022-01-05","0000-00-00","F0820220105","Klem Aki Kuningan Jumbo","S07","50","11000.00","550000","Cash","Lunas","0","","Kuning Jumbo/25","PCS","Sparepart","77");
INSERT INTO transaksibeli VALUES ("179","2022-01-05","0000-00-00","F0820220105","Klem Aki Timah NS40","S07","50","13000.00","650000","Cash","Lunas","0","","Timah NS40/10","PCS","Sparepart","78");
INSERT INTO transaksibeli VALUES ("180","2022-01-05","0000-00-00","F0820220105","Klem Aki Timah N200","S07","50","15000.00","750000","Cash","Lunas","0","","Timah N200/10","PCS","Sparepart","79");
INSERT INTO transaksibeli VALUES ("181","2022-01-19","0000-00-00","F0920220119","Fuel Tank 065-9","S08","2","1677000.00","3354000","Cash","Lunas","0","","001084","PCS","Sparepart","80");
INSERT INTO transaksibeli VALUES ("182","2022-01-20","0000-00-00","F1020220120","NOZ/LA160P50FE347","S09","50","101500.00","5075000","Cash","Lunas","0","","SJN7-087JK","PCS","Sparepart","81");
INSERT INTO transaksibeli VALUES ("183","2022-01-20","0000-00-00","F1020220120","NOZ/DLLA160P3PS89","S09","40","101500.00","4060000","Cash","Lunas","0","","SJN7-047JK","PCS","Sparepart","82");
INSERT INTO transaksibeli VALUES ("184","2022-01-07","0000-00-00","F1120220107","Spider White PS120","S09","2","106000.00","212000","Cash","Lunas","0","","SJP6-026JK","PCS","Sparepart","83");
INSERT INTO transaksibeli VALUES ("185","2022-01-07","0000-00-00","F1120220107","Case Diff Only PS135","S09","1","1320000.00","1320000","Cash","Lunas","0","","SJT7-005JK","PCS","Sparepart","84");
INSERT INTO transaksibeli VALUES ("186","2022-01-28","0000-00-00","F1220220128","Drag Link Assy PS125","S10","24","205000.00","4920000","Cash","Lunas","0","","MK-471750","PCS","Sparepart","85");
INSERT INTO transaksibeli VALUES ("187","2022-01-24","0000-00-00","F1320220124","Tie Rod End PS125","S10","50","115000.00","5750000","Cash","Lunas","0","","MK-997508/09","SET","Sparepart","86");
INSERT INTO transaksibeli VALUES ("188","2022-01-21","0000-00-00","F1420220121","Tie Rod End HT","S10","40","115000.00","4600000","Cash","Lunas","0","","EFJ10-06100/10","SET","Sparepart","87");
INSERT INTO transaksibeli VALUES ("189","2022-01-21","0000-00-00","F1520220121","Motor Wiper KIA Timor","S11","5","115000.00","575000","Cash","Lunas","0","","OK-22H-67-350","PCS","Sparepart","88");
INSERT INTO transaksibeli VALUES ("190","2022-01-21","0000-00-00","F1520220121","Motor Wiper Isuzu NKR126","S11","5","115000.00","575000","Cash","Lunas","0","","ML09-09","PCS","Sparepart","89");
INSERT INTO transaksibeli VALUES ("191","2022-01-21","0000-00-00","F1520220121","Motor Wiper Suzuki ST100 Carry","S11","5","115000.00","575000","Cash","Lunas","0","","38101-79050","PCS","Sparepart","90");
INSERT INTO transaksibeli VALUES ("192","2022-01-21","0000-00-00","F1520220121","Motor Wiper Mitsubishi PS-190, Fuso","S11","5","115000.00","575000","Cash","Lunas","0","","MC 859852","PCS","Sparepart","91");
INSERT INTO transaksibeli VALUES ("193","2022-01-21","0000-00-00","F1520220121","Front Engine Mounting Mitsubishi PS120","S11","4","46875.00","187500","Cash","Lunas","0","","ME 011807","PCS","Sparepart","92");
INSERT INTO transaksibeli VALUES ("194","2022-01-21","0000-00-00","F1520220121","Centre Bearing Mitsubishi PS100 Galvanis","S11","5","40000.00","200000","Cash","Lunas","0","","MB 000083 G","PCS","Sparepart","93");
INSERT INTO transaksibeli VALUES ("195","2022-01-21","0000-00-00","F1520220121","Wiper Link Suzuki Futura","S11","2","120000.00","240000","Cash","Lunas","0","","38102-77500","PCS","Sparepart","94");
INSERT INTO transaksibeli VALUES ("196","2022-01-21","0000-00-00","F1520220121","P Coating Bears RH","S11","2","51000.00","102000","Cash","Lunas","0","","SM-100 B R","PCS","Sparepart","95");
INSERT INTO transaksibeli VALUES ("197","2022-01-21","0000-00-00","F1520220121","P Coating Bears LH","S11","2","54000.00","108000","Cash","Lunas","0","","SM-100 B L","PCS","Sparepart","96");
INSERT INTO transaksibeli VALUES ("198","2022-01-21","0000-00-00","F1520220121","Motor Wiper Mitsubishi L300","S11","5","115000.00","575000","Cash","Lunas","0","","MB 141843","PCS","Sparepart","97");
INSERT INTO transaksibeli VALUES ("199","2022-01-21","0000-00-00","F1520220121","Fuel Gauge S. Carry ST100 ","S11","2","56250.00","112500","Cash","Lunas","0","","34910-70010","PCS","Sparepart","98");
INSERT INTO transaksibeli VALUES ("200","2022-01-21","0000-00-00","F1520220121","Motor Wiper Daihatsu S88/S89","S11","5","115000.00","575000","Cash","Lunas","0","","85120-87516","PCS","Sparepart","99");
INSERT INTO transaksibeli VALUES ("201","2022-01-21","0000-00-00","F1520220121","SM-135 B R (OLD)","S11","2","54000.00","108000","Cash","Lunas","0","","SM-135 B R (OLD)","PCS","Sparepart","101");
INSERT INTO transaksibeli VALUES ("202","2022-01-21","0000-00-00","F1520220121","P Coating Bears LH","S11","2","61200.00","122400","Cash","Lunas","0","","SM-100 B L","PCS","Sparepart","96");
INSERT INTO transaksibeli VALUES ("203","2022-01-21","0000-00-00","F1520220121","Wiper Link Assy Mitsubishi CK12","S11","2","287500.00","575000","Cash","Lunas","0","","28840-Z5012","PCS","Sparepart","102");
INSERT INTO transaksibeli VALUES ("204","2022-01-21","0000-00-00","F1520220121","Wiper Link Assy Mitsubishi PS135","S11","2","189375.00","378750","Cash","Lunas","0","","MB-302328","PCS","Sparepart","103");
INSERT INTO transaksibeli VALUES ("205","2022-01-21","0000-00-00","F1520220121","Wiper Link Assy Mitsubishi PS120","S11","2","181500.00","363000","Cash","Lunas","0","","MB-302227","PCS","Sparepart","104");
INSERT INTO transaksibeli VALUES ("206","2022-01-21","0000-00-00","F1520220121","Wiper Link Assy Mitsubishi FE70","S11","2","230500.00","461000","Cash","Lunas","0","","MK-404322","PCS","Sparepart","105");
INSERT INTO transaksibeli VALUES ("207","2022-01-17","0000-00-00","F1620220117","Wiper Arm To 5K","S11","6","62500.00","375000","Cash","Lunas","0","","85190-90P00","PCS","Sparepart","106");
INSERT INTO transaksibeli VALUES ("208","2022-01-17","0000-00-00","F1620220117","Wiper Arm To 4K","S11","4","39375.00","157500","Cash","Lunas","0","","WA-T01","PCS","Sparepart","107");
INSERT INTO transaksibeli VALUES ("209","2022-01-17","0000-00-00","F1620220117","Wiper Arm SU T100","S11","6","30625.00","183750","Cash","Lunas","0","","38310-79001","PCS","Sparepart","108");
INSERT INTO transaksibeli VALUES ("210","2022-01-17","0000-00-00","F1620220117","Wiper Arm Mitsubishi L300 OLD","S11","6","39375.00","236250","Cash","Lunas","0","","MB-141139","PCS","Sparepart","109");
INSERT INTO transaksibeli VALUES ("211","2022-01-17","0000-00-00","F1620220117","Motor Wiper Toyota 7K","S11","2","162500.00","325000","Cash","Lunas","0","","85110-08010","PCS","Sparepart","110");
INSERT INTO transaksibeli VALUES ("214","2022-01-25","0000-00-00","F1720220125","Mud Guard Grand Avanza Front DNY","S12","5","48000.00","240000","Cash","Lunas","0","","MG-Avanza Front DNY","SET","Variasi","111");
INSERT INTO transaksibeli VALUES ("215","2022-01-25","0000-00-00","F1720220125","Mud Guard Grand Avanza Rear DNY","S12","6","48000.00","288000","Cash","Lunas","0","","MG-Avanza Rear DNY","SET","Variasi","112");
INSERT INTO transaksibeli VALUES ("216","2022-01-18","0000-00-00","F1820220118","karpet Roda STL Sparco Silver","S12","80","24500.00","1960000","Cash","Lunas","0","","KR-Sparco Silver","SET","Sparepart","113");
INSERT INTO transaksibeli VALUES ("217","2022-01-27","0000-00-00","F1920220127","Futura/Apv/Carry 8T K","S13","6","384780.00","2308680","Cash","Lunas","0","","SSFRAPVK","PCS","Sparepart","114");
INSERT INTO transaksibeli VALUES ("218","2022-01-27","0000-00-00","F1920220127","Futura/Apv/Carry 8T K","S13","1","0.00","0","Cash","Lunas","0","","SSFRAPVK","PCS","Sparepart","114");
INSERT INTO transaksibeli VALUES ("219","2022-01-24","0000-00-00","F2020220124","Oil Ws Cover Isuzu Diesel 8-94144","S13","10","87450.00","874500","Cash","Lunas","0","","POWS-062","PCS","Sparepart","115");
INSERT INTO transaksibeli VALUES ("220","2022-01-24","0000-00-00","F2020220124","Kepala 6015/Fuso Fighter","S13","5","179564.00","897820","Cash","Lunas","0","","PK-091","PCS","Sparepart","116");
INSERT INTO transaksibeli VALUES ("221","2022-01-24","0000-00-00","F2020220124","Kepala 6017/Ganzo","S13","5","204050.00","1020250","Cash","Lunas","0","","PK-092","PCS","Sparepart","117");
INSERT INTO transaksibeli VALUES ("222","2022-01-24","0000-00-00","F2020220124","Bendix Fuso Figher/6015/PS190","S13","10","128260.00","1282600","Cash","Lunas","0","","PGB-245","PCS","Sparepart","118");
INSERT INTO transaksibeli VALUES ("223","2022-01-24","0000-00-00","F2020220124","Yoke PS135/PS125/4D33 24V","S13","20","204050.00","4081000","Cash","Lunas","0","","PCS-007","PCS","Sparepart","119");
INSERT INTO transaksibeli VALUES ("224","2022-01-24","0000-00-00","F2020220124","Angker Dino Louhan 500 24V","S13","5","332310.00","1661550","Cash","Lunas","0","","PASLH5","PCS","Sparepart","120");
INSERT INTO transaksibeli VALUES ("225","2022-01-24","0000-00-00","F2020220124","Angker Dino Jumbo/CK12/Nisaan","S13","5","384780.00","1923900","Cash","Lunas","0","","PASNRD5","PCS","Sparepart","121");
INSERT INTO transaksibeli VALUES ("226","2022-01-24","0000-00-00","F2020220124","Bearing ALT Canter/PS135","S13","30","52470.00","1574100","Cash","Lunas","0","","PBRNME","PCS","Sparepart","122");
INSERT INTO transaksibeli VALUES ("227","2022-01-24","0000-00-00","F2020220124","Stator PS135","S13","10","95930.00","959300","Cash","Lunas","0","","PCA-003","PCS","Sparepart","123");
INSERT INTO transaksibeli VALUES ("228","2022-01-24","0000-00-00","F2020220124","IC Rinosaurus 115ET/130HT 28,3V","S13","10","134620.00","1346200","Cash","Lunas","0","","PICND-009","PCS","Sparepart","124");
INSERT INTO transaksibeli VALUES ("229","2022-01-24","0000-00-00","F2120220124","Oil Ws Cover Isuzu Diesel 8-94144","S13","10","87450.00","874500","Cash","Lunas","0","","POWS-062","PCS","Sparepart","115");
INSERT INTO transaksibeli VALUES ("230","2022-01-24","0000-00-00","F2120220124","Kepala 6015/Fuso Fighter","S13","5","179564.00","897820","Cash","Lunas","0","","PK-091","PCS","Sparepart","116");
INSERT INTO transaksibeli VALUES ("231","2022-01-24","0000-00-00","F2120220124","Kepala 6017/Ganzo","S13","5","204050.00","1020250","Cash","Lunas","0","","PK-092","PCS","Sparepart","117");
INSERT INTO transaksibeli VALUES ("232","2022-01-24","0000-00-00","F2120220124","Bendix Fuso Figher/6015/PS190","S13","10","128260.00","1282600","Cash","Lunas","0","","PGB-245","PCS","Sparepart","118");
INSERT INTO transaksibeli VALUES ("233","2022-01-24","0000-00-00","F2120220124","Yoke PS135/PS125/4D33 24V","S13","20","204050.00","4081000","Cash","Lunas","0","","PCS-007","PCS","Sparepart","119");
INSERT INTO transaksibeli VALUES ("234","2022-01-24","0000-00-00","F2120220124","Angker Dino Louhan 500 24V","S13","5","332310.00","1661550","Cash","Lunas","0","","PASLH5","PCS","Sparepart","120");
INSERT INTO transaksibeli VALUES ("235","2022-01-24","0000-00-00","F2120220124","Angker Dino Jumbo/CK12/Nisaan","S13","5","384780.00","1923900","Cash","Lunas","0","","PASNRD5","PCS","Sparepart","121");
INSERT INTO transaksibeli VALUES ("236","2022-01-24","0000-00-00","F2120220124","Bearing ALT Canter/PS135","S13","30","52470.00","1574100","Cash","Lunas","0","","PBRNME","PCS","Sparepart","122");
INSERT INTO transaksibeli VALUES ("237","2022-01-24","0000-00-00","F2120220124","Stator PS135","S13","10","95930.00","959300","Cash","Lunas","0","","PCA-003","PCS","Sparepart","123");
INSERT INTO transaksibeli VALUES ("238","2022-01-24","0000-00-00","F2120220124","IC Rinosaurus 115ET/130HT 28,3V","S13","10","139920.00","1399200","Cash","Lunas","0","","PICND-009","PCS","Sparepart","124");
INSERT INTO transaksibeli VALUES ("239","2022-01-20","0000-00-00","F2220220120","Switch Innova/Hilux Reborn","S13","7","165360.00","1157520","Cash","Lunas","0","","PSW7K","PCS","Sparepart","125");
INSERT INTO transaksibeli VALUES ("240","2022-01-20","0000-00-00","F2220220120","IC NKR 71 28,5","S13","10","128260.00","1282600","Cash","Lunas","0","","PICH-005","PCS","Sparepart","126");
INSERT INTO transaksibeli VALUES ("241","2022-01-20","0000-00-00","F2220220120","IC PS100/PS120 24V 35A","S13","1","104940.00","104940","Cash","Lunas","0","","PICM-009","PCS","Sparepart","127");
INSERT INTO transaksibeli VALUES ("242","2022-01-20","0000-00-00","F2220220120","Holder Carbon PS135/PS125","S13","8","38478.00","307824","Cash","Lunas","0","","PHCBPS135","PCS","Sparepart","128");
INSERT INTO transaksibeli VALUES ("243","2022-01-20","0000-00-00","F2220220120","Angker PS135/PS125/4D33 24V New","S13","2","204050.00","408100","Cash","Lunas","0","","PASM4D33A","PCS","Sparepart","129");
INSERT INTO transaksibeli VALUES ("244","2022-01-20","0000-00-00","F2220220120","Gear Kit 9T PS135","S13","5","23320.00","116600","Cash","Lunas","0","","PG-036","PCS","Sparepart","130");
INSERT INTO transaksibeli VALUES ("245","2022-01-20","0000-00-00","F2320220120","Espass/S91/S92/Classy/Feroza","S13","1","641300.00","641300","Cash","Lunas","0","","SDEP16P9","PCS","Sparepart","131");
INSERT INTO transaksibeli VALUES ("246","2022-01-20","0000-00-00","F2320220120","Katana/Jimmy 8T K","S13","1","384780.00","384780","Cash","Lunas","0","","SSKTK","PCS","Sparepart","132");
INSERT INTO transaksibeli VALUES ("247","2022-01-20","0000-00-00","F2320220120","CRV 2.01 4WD 07 KE5 III TH.07/Civic","S13","1","781220.00","781220","Cash","Lunas","0","","SHCRVTE","PCS","Sparepart","133");
INSERT INTO transaksibeli VALUES ("248","2022-01-20","0000-00-00","F2320220120","T12055 INJ/P-5 ","S13","1","932800.00","932800","Cash","Lunas","0","","AMT12DIN","PCS","Sparepart","134");
INSERT INTO transaksibeli VALUES ("249","2022-01-19","0000-00-00","F2420220119","L300 2,3 Diesel","S13","6","1154340.00","6926040","Cash","Lunas","0","","SML3DD2.3N","PCS","Sparepart","135");
INSERT INTO transaksibeli VALUES ("250","2022-01-19","0000-00-00","F2420220119","L300 2,3 Diesel","S13","1","0.00","0","Cash","Lunas","0","","SML3DD2.3N","PCS","Sparepart","135");
INSERT INTO transaksibeli VALUES ("251","2022-01-19","0000-00-00","F2420220119","Switch Assy Aluminium Hino 300","S13","2","292560.00","585120","Cash","Lunas","0","","PSWH300","PCS","Sparepart","136");
INSERT INTO transaksibeli VALUES ("252","2022-01-19","0000-00-00","F2420220119","Angker NKR 66/NKR 71/135PS/4HF1","S13","10","256520.00","2565200","Cash","Lunas","0","","PASNKR66","PCS","Sparepart","156");
INSERT INTO transaksibeli VALUES ("253","2022-01-19","0000-00-00","F2420220119","Stator Ganzo/6D17/Canter/PS125","S13","5","291500.00","1457500","Cash","Lunas","0","","PCA-009","PCS","Sparepart","138");
INSERT INTO transaksibeli VALUES ("254","2022-01-19","0000-00-00","F2420220119","Stator PS135","S13","10","256520.00","2565200","Cash","Lunas","0","","PCA-003 ASLI","PCS","Sparepart","139");
INSERT INTO transaksibeli VALUES ("255","2022-01-19","0000-00-00","F2420220119","PICD-001","S13","2","116600.00","233200","Cash","Lunas","0","","IC Hino Louham/Hino ","PCS","Sparepart","140");
INSERT INTO transaksibeli VALUES ("256","2022-01-19","0000-00-00","F2420220119","PICH-017","S13","7","163240.00","1142680","Cash","Lunas","0","","IC 24V 4HF1/NPR71/NK","PCS","Sparepart","141");
INSERT INTO transaksibeli VALUES ("257","2022-01-13","0000-00-00","F2520220113","Rino 138/148/12V V83 BU-30","S13","4","1224300.00","4897200","Cash","Lunas","0","","STDN138N","PCS","Sparepart","142");
INSERT INTO transaksibeli VALUES ("258","2022-01-13","0000-00-00","F2520220113","ZF Jeep (G) Big","S13","2","466400.00","932800","Cash","Lunas","0","","ST2FJPG","PCS","Sparepart","143");
INSERT INTO transaksibeli VALUES ("259","2022-01-13","0000-00-00","F2520220113","ZF 65A (NEW)","S13","4","513040.00","2052160","Cash","Lunas","0","","AT2FN","PCS","Sparepart","144");
INSERT INTO transaksibeli VALUES ("260","2022-01-13","0000-00-00","F2520220113","ZF Jeep Platina","S13","3","431420.00","1294260","Cash","Lunas","0","","CPT2FJN","PCS","Sparepart","145");
INSERT INTO transaksibeli VALUES ("261","2022-01-13","0000-00-00","F2520220113","Switch PS100/PS135/PS120 24V New","S13","24","146916.00","3525984","Cash","Lunas","0","","PSWP100N","PCS","Sparepart","146");
INSERT INTO transaksibeli VALUES ("262","2022-01-13","0000-00-00","F2520220113","Switch PS100/PS135/PS120 24V New","S13","4","0.00","0","Cash","Lunas","0","","PSWP100N","PCS","Sparepart","146");
INSERT INTO transaksibeli VALUES ("263","2022-01-13","0000-00-00","F2520220113","Switch NM T120S INJ/Lancer 12V","S13","6","122430.00","734580","Cash","Lunas","0","","PSWNM","PCS","Sparepart","147");
INSERT INTO transaksibeli VALUES ("264","2022-01-13","0000-00-00","F2520220113","Switch NM T120S INJ/Lancer 12V","S13","1","0.00","0","Cash","Lunas","0","","PSWNM","PCS","Sparepart","147");
INSERT INTO transaksibeli VALUES ("265","2022-01-13","0000-00-00","F2520220113","L200 Strada/Triton 2.5/Pajero","S13","6","1090210.00","6541260","Cash","Lunas","0","","SML200AT","PCS","Sparepart","148");
INSERT INTO transaksibeli VALUES ("266","2022-01-13","0000-00-00","F2520220113","L200 Strada/Triton 2.5/Pajero","S13","1","0.00","0","Cash","Lunas","0","","SML200AT","PCS","Sparepart","148");
INSERT INTO transaksibeli VALUES ("267","2022-01-11","0000-00-00","F2620220111","STR Kuda Diesel/L300 2.5 New","S13","6","991100.00","5946600","Cash","Lunas","0","","SMKDDN","PCS","Sparepart","149");
INSERT INTO transaksibeli VALUES ("268","2022-01-11","0000-00-00","F2620220111","Gear Kit PS135","S13","10","23320.00","233200","Cash","Lunas","0","","PG-025","PCS","Sparepart","150");
INSERT INTO transaksibeli VALUES ("269","2022-01-11","0000-00-00","F2620220111","OM BT L300","S13","5","58300.00","291500","Cash","Lunas","0","","PGB-226","PCS","Sparepart","151");
INSERT INTO transaksibeli VALUES ("270","2022-01-05","0000-00-00","F2720220105","Switch Futura","S13","6","104940.00","629640","Cash","Lunas","0","","PSWK","PCS","Sparepart","152");
INSERT INTO transaksibeli VALUES ("271","2022-01-05","0000-00-00","F2720220105","Switch Futura","S13","1","0.00","0","Cash","Lunas","0","","PSWK","PCS","Sparepart","152");
INSERT INTO transaksibeli VALUES ("272","2022-01-05","0000-00-00","F2720220105","Switch PS100/PS135/PS120 24V New","S13","6","139920.00","839520","Cash","Lunas","0","","PSWP100N","PCS","Sparepart","146");
INSERT INTO transaksibeli VALUES ("273","2022-01-05","0000-00-00","F2720220105","Switch PS100/PS135/PS120 24V New","S13","1","0.00","0","Cash","Lunas","0","","PSWP100N","PCS","Sparepart","146");
INSERT INTO transaksibeli VALUES ("274","2022-01-05","0000-00-00","F2720220105","T120SS/L300 8T K","S13","2","349800.00","699600","Cash","Lunas","0","","SMT120SKS","PCS","Sparepart","153");
INSERT INTO transaksibeli VALUES ("275","2022-01-05","0000-00-00","F2720220105","Flasher Relay 12V K3 Toyota Camry","S13","25","58300.00","1457500","Cash","Lunas","0","","PRT-S702","PCS","Sparepart","154");
INSERT INTO transaksibeli VALUES ("281","2022-01-03","0000-00-00","F2820220103","Switch NKR 71","S13","10","186560.00","1865600","Cash","Lunas","0","","PAWNKR66","PCS","Sparepart","155");
INSERT INTO transaksibeli VALUES ("282","2022-01-03","0000-00-00","F2820220103","Angker NKR 66/NKR 71/135PS/4HF1","S13","10","233200.00","2332000","Cash","Lunas","0","","PASNKR66","PCS","Sparepart","156");
INSERT INTO transaksibeli VALUES ("283","2022-01-03","0000-00-00","F2820220103","Switch Lauhan","S13","9","186560.00","1679040","Cash","Lunas","0","","PASWLH","PCS","Sparepart","157");
INSERT INTO transaksibeli VALUES ("284","2022-01-03","0000-00-00","F2820220103","Carbon Brush STR Dyna 24V","S13","20","34980.00","699600","Cash","Lunas","0","","PCBS-017","PCS","Sparepart","158");
INSERT INTO transaksibeli VALUES ("285","2022-01-03","0000-00-00","F2820220103","Alt Hino 13DHT 24V","S13","1","1166000.00","1166000","Cash","Lunas","0","","AH13DO-1","PCS","Sparepart","159");
INSERT INTO transaksibeli VALUES ("286","2022-01-03","0000-00-00","F2920220103","Trinton 2.5","S13","6","991100.00","5946600","Cash","Lunas","0","","SML200N","PCS","Sparepart","160");
INSERT INTO transaksibeli VALUES ("287","2022-01-03","0000-00-00","F2920220103","Trinton 2.5","S13","1","0.00","0","Cash","Lunas","0","","SML200N","PCS","Sparepart","160");
INSERT INTO transaksibeli VALUES ("288","2022-01-28","0000-00-00","F3020220128","OBC Radiator Coolant Hijau 4x5 LTR","S14","5","77000.00","385000","Cash","Lunas","0","","OBC Radiator Hijau","DOS","Sparepart","161");
INSERT INTO transaksibeli VALUES ("289","2022-01-28","0000-00-00","F3020220128","OBC Radiator Coolant Merah 4x5 LTR","S14","5","77000.00","385000","Cash","Lunas","0","","OBC Radiator Merah","DOS","Sparepart","162");
INSERT INTO transaksibeli VALUES ("290","2022-01-28","0000-00-00","F3020220128","OBC Radiator Coolant Hijau 4x5 LTR","S14","1","0.00","0","Cash","Lunas","0","","OBC Radiator Hijau","DOS","Sparepart","161");
INSERT INTO transaksibeli VALUES ("291","2022-01-22","0000-00-00","F3120220122","OBC Radiator Coolant Hijau 4x5 LTR","S14","14","77000.00","1078000","Cash","Lunas","0","","OBC Radiator Hijau","DOS","Sparepart","161");
INSERT INTO transaksibeli VALUES ("292","2022-01-22","0000-00-00","F3120220122","OBC Radiator Coolant Hijau 4x5 LTR","S14","1","0.00","0","Cash","Lunas","0","","OBC Radiator Hijau","DOS","Sparepart","161");
INSERT INTO transaksibeli VALUES ("293","2022-01-10","0000-00-00","F3220220110","OBC Radiator Coolant Hijau 4x5 LTR","S14","40","77000.00","3080000","Cash","Lunas","0","","OBC Radiator Hijau","DOS","Sparepart","161");
INSERT INTO transaksibeli VALUES ("294","2022-01-10","0000-00-00","F3220220110","OBC Radiator Coolant Merah 4x5 LTR","S14","4","0.00","0","Cash","Lunas","0","","OBC Radiator Merah","DOS","Sparepart","162");
INSERT INTO transaksibeli VALUES ("295","2022-01-04","0000-00-00","F3320220104","Kyoso Oli Hidraulic 68 Coklat 18 LTR","S14","30","352000.00","10560000","Cash","Lunas","0","","KY 68 18 LTR","PCS","Sparepart","163");
INSERT INTO transaksibeli VALUES ("296","2022-01-04","0000-00-00","F3320220104","Kyoso Hidraulic 68 Coklat 4x5 LTR","S14","10","380000.00","3800000","Cash","Lunas","0","","KY 68 4x5 LTR","DOS","Sparepart","164");
INSERT INTO transaksibeli VALUES ("297","2022-01-20","0000-00-00","F3420220120","Fuel Filter Fuso FC1003","S15","25","35050.00","876250","Cash","Lunas","0","","FF Fuso FC1003","PCS","Sparepart","165");
INSERT INTO transaksibeli VALUES ("298","2022-01-20","0000-00-00","F3420220120","Oil Filter T120SS","S15","50","20410.00","1020500","Cash","Lunas","0","","OF T120SS","PCS","Sparepart","166");
INSERT INTO transaksibeli VALUES ("299","2022-01-20","0000-00-00","F3420220120","Air Filter Avanza","S15","2","86500.00","173000","Cash","Lunas","0","","AF Avanza A3312","PCS","Sparepart","167");
INSERT INTO transaksibeli VALUES ("300","2022-01-20","0000-00-00","F3420220120","Air Filter R3","S15","2","84620.00","169240","Cash","Lunas","0","","AF R3 A14490","PCS","Sparepart","168");
INSERT INTO transaksibeli VALUES ("301","2022-01-20","0000-00-00","F3420220120","Air Filter Inova","S15","8","94350.00","754800","Cash","Lunas","0","","AF Inova A5903","SET","Sparepart","169");
INSERT INTO transaksibeli VALUES ("302","2022-01-20","0000-00-00","F3420220120","Oil Filter FM 01005","S15","5","44880.00","224400","Cash","Lunas","0","","OF FM 01005","PCS","Sparepart","170");
INSERT INTO transaksibeli VALUES ("303","2022-01-20","0000-00-00","F3420220120","Oil Filter C1318","S15","5","56915.00","284575","Cash","Lunas","0","","OF C1318","PCS","Sparepart","171");
INSERT INTO transaksibeli VALUES ("304","2022-01-20","0000-00-00","F3420220120","Fuel Filter FC1301","S15","5","23635.00","118175","Cash","Lunas","0","","FF FC1301","PCS","Sparepart","172");
INSERT INTO transaksibeli VALUES ("305","2022-01-20","0000-00-00","F3520220120","Fuel Filter FE F1002","S15","50","15185.00","759250","Cash","Lunas","0","","FF FE F1002","PCS","Sparepart","173");
INSERT INTO transaksibeli VALUES ("306","2022-01-20","0000-00-00","F3520220120","Fuel Filter FC1005","S15","5","58800.00","294000","Cash","Lunas","0","","FF FC1005","PCS","Sparepart","174");
INSERT INTO transaksibeli VALUES ("307","2022-01-19","0000-00-00","F3620220119","Fuel Filter Fuso FC1003","S15","50","35050.00","1752500","Cash","Lunas","0","","FF Fuso FC1003","PCS","Sparepart","165");
INSERT INTO transaksibeli VALUES ("308","2022-01-19","0000-00-00","F3620220119","Fuel Filter L300D  FC1001","S15","25","48900.00","1222500","Cash","Lunas","0","","FF FC1001","PCS","Sparepart","175");
INSERT INTO transaksibeli VALUES ("309","2022-01-19","0000-00-00","F3620220119","Oil FIlter L300D","S15","25","50030.00","1250750","Cash","Lunas","0","","OF C1008","PCS","Sparepart","176");
INSERT INTO transaksibeli VALUES ("310","2022-01-19","0000-00-00","F3620220119","Fuel Filter RD33 ","S15","25","52400.00","1310000","Cash","Lunas","0","","FF FC5601","PCS","Sparepart","177");
INSERT INTO transaksibeli VALUES ("311","2022-01-19","0000-00-00","F3620220119","Air Filter PS A1007","S15","12","44150.00","529800","Cash","Lunas","0","","AF A1007","PCS","Sparepart","178");
INSERT INTO transaksibeli VALUES ("312","2022-01-19","0000-00-00","F3620220119","Oil Filter Canter ","S15","25","64050.00","1601250","Cash","Lunas","0","","OF C1012","PCS","Sparepart","179");
INSERT INTO transaksibeli VALUES ("313","2022-01-14","0000-00-00","F3720220114","Fuel Filter Nissan","S15","50","38100.00","1905000","Cash","Lunas","0","","FF FE1804","PCS","Sparepart","180");
INSERT INTO transaksibeli VALUES ("314","2022-01-14","0000-00-00","F3820220114","Radiator Ford Ranger","S15","2","149500.00","299000","Cash","Lunas","0","","3301-1028 AT","PCS","Sparepart","181");
INSERT INTO transaksibeli VALUES ("315","2022-01-14","0000-00-00","F3820220114","Radiator LO39","S15","5","756000.00","3780000","Cash","Lunas","0","","3321-1054","PCS","Sparepart","182");
INSERT INTO transaksibeli VALUES ("316","2022-01-08","0000-00-00","F3920220108","Karet Rem (seiken)","S15","200","8990.00","1798000","Cash","Lunas","0","","SC 30253","PCS","Sparepart","42");
INSERT INTO transaksibeli VALUES ("317","2022-01-08","0000-00-00","F3920220108","Karet Rem (seiken)","S15","200","9205.00","1841000","Cash","Lunas","0","","SC 40493","PCS","Sparepart","45");
INSERT INTO transaksibeli VALUES ("318","2022-01-08","0000-00-00","F3920220108","Karet Rem (seiken)","S15","200","7493.00","1498600","Cash","Lunas","0","","SC 7059","PCS","Sparepart","183");
INSERT INTO transaksibeli VALUES ("319","2022-01-08","0000-00-00","F3920220108","Karet Rem (seiken)","S15","100","9633.00","963300","Cash","Lunas","0","","SC 80093","PCS","Sparepart","40");
INSERT INTO transaksibeli VALUES ("320","2022-01-08","0000-00-00","F3920220108","Karet Rem (seiken)","S15","100","9633.00","963300","Cash","Lunas","0","","SC 80133","PCS","Sparepart","184");
INSERT INTO transaksibeli VALUES ("321","2022-01-08","0000-00-00","F3920220108","Karet Rem (seiken)","S15","200","7919.00","1583800","Cash","Lunas","0","","SC 20233","PCS","Sparepart","185");
INSERT INTO transaksibeli VALUES ("322","2022-01-08","0000-00-00","F3920220108","Karet Rem (seiken)","S15","200","7493.00","1498600","Cash","Lunas","0","","SC 41563","PCS","Sparepart","186");
INSERT INTO transaksibeli VALUES ("323","2022-01-08","0000-00-00","F3920220108","Karet Rem (seiken)","S15","200","7707.00","1541400","Cash","Lunas","0","","SC 30213","PCS","Sparepart","39");
INSERT INTO transaksibeli VALUES ("324","2022-01-03","0000-00-00","F4020220103","Radiator PO Turbo","S15","6","2155315.00","12931890","Cash","Lunas","0","","2323-1004","PCS","Sparepart","187");
INSERT INTO transaksibeli VALUES ("325","2022-01-03","0000-00-00","F4120220103","Bearing koyo","S16","20","34000.00","680000","Cash","Lunas","0","","6304 ","PCS","Sparepart","188");
INSERT INTO transaksibeli VALUES ("326","2022-01-03","0000-00-00","F4120220103","Bearing NIS","S16","4","18000.00","72000","Cash","Lunas","0","","204 D1","PCS","Sparepart","189");
INSERT INTO transaksibeli VALUES ("327","2022-01-03","0000-00-00","F4120220103","Bearing koyo","S16","25","117000.00","2925000","Cash","Lunas","0","","6308","PCS","Sparepart","190");
INSERT INTO transaksibeli VALUES ("328","2022-01-05","0000-00-00","F4220220105","Bearing NIS","S16","50","4400.00","220000","Cash","Lunas","0","","6202","PCS","Sparepart","191");
INSERT INTO transaksibeli VALUES ("329","2022-01-05","0000-00-00","F4220220105","Bearing NIS","S16","5","17400.00","87000","Cash","Lunas","0","","6207","PCS","Sparepart","192");
INSERT INTO transaksibeli VALUES ("330","2022-01-05","0000-00-00","F4220220105","Bearing NIS","S16","5","22700.00","113500","Cash","Lunas","0","","6208","PCS","Sparepart","193");
INSERT INTO transaksibeli VALUES ("331","2022-01-05","0000-00-00","F4220220105","Bearing NIS","S16","20","3100.00","62000","Cash","Lunas","0","","626 ","PCS","Sparepart","194");
INSERT INTO transaksibeli VALUES ("332","2022-01-05","0000-00-00","F4220220105","Bearing NIS","S16","100","8000.00","800000","Cash","Lunas","0","","6204 ZZ","PCS","Sparepart","195");
INSERT INTO transaksibeli VALUES ("333","2022-01-27","0000-00-00","F4320220127","Wrapped Belt","S17","5","37825.00","189125","Cash","Lunas","0","","B-069","PCS","Sparepart","202");
INSERT INTO transaksibeli VALUES ("334","2022-01-27","0000-00-00","F4320220127","Wrapped Belt","S17","10","43307.00","433070","Cash","Lunas","0","","B-079","PCS","Sparepart","210");
INSERT INTO transaksibeli VALUES ("335","2022-01-27","0000-00-00","F4320220127","Wrapped Belt","S17","30","43855.00","1315650","Cash","Lunas","0","","B-080","PCS","Sparepart","211");
INSERT INTO transaksibeli VALUES ("336","2022-01-27","0000-00-00","F4420220127","Raw Edge Belt","S17","5","52751.00","263755","Cash","Lunas","0","","RECMF-8530","PCS","Sparepart","275");
INSERT INTO transaksibeli VALUES ("337","2022-01-27","0000-00-00","F4420220127","Wrapped Belt","S17","5","13095.00","65475","Cash","Lunas","0","","A-033","PCS","Sparepart","274");
INSERT INTO transaksibeli VALUES ("338","2022-01-27","0000-00-00","F4420220127","Wrapped Belt","S17","5","15714.00","78570","Cash","Lunas","0","","A-043","PCS","Sparepart","270");
INSERT INTO transaksibeli VALUES ("339","2022-01-27","0000-00-00","F4420220127","Wrapped Belt","S17","5","16445.00","82225","Cash","Lunas","0","","A-045","PCS","Sparepart","272");
INSERT INTO transaksibeli VALUES ("340","2022-01-20","0000-00-00","F4520220120","Wrapped Belt","S17","100","43307.00","4330700","Cash","Lunas","0","","B-079","PCS","Sparepart","210");
INSERT INTO transaksibeli VALUES ("341","2022-01-19","0000-00-00","F4620220119","Wrapped Belt","S17","100","43307.00","4330700","Cash","Lunas","0","","B-079","PCS","Sparepart","210");
INSERT INTO transaksibeli VALUES ("342","2022-01-19","0000-00-00","F4720220119","Wrapped Belt","S17","50","37535.00","1876750","Cash","Lunas","0","","B-074","PCS","Sparepart","239");
INSERT INTO transaksibeli VALUES ("343","2022-01-17","0000-00-00","F4820220117","Wrapped Belt","S17","30","38921.00","1167630","Cash","Lunas","0","","B-071","PCS","Sparepart","204");
INSERT INTO transaksibeli VALUES ("344","2022-01-07","0000-00-00","F4920220107","Bearing UCP","S17","140","68208.00","9549120","Cash","Lunas","0","","IBME 208-24","PCS","Sparepart","276");
INSERT INTO transaksibeli VALUES ("345","2022-01-03","0000-00-00","F5020220103","Wrapped Belt","S17","15","18273.00","274095","Cash","Lunas","0","","A-050","PCS","Sparepart","279");
INSERT INTO transaksibeli VALUES ("346","2022-01-03","0000-00-00","F5020220103","Wrapped Belt","S17","6","19734.00","118404","Cash","Lunas","0","","A-054","PCS","Sparepart","280");
INSERT INTO transaksibeli VALUES ("347","2022-01-03","0000-00-00","F5020220103","Wrapped Belt","S17","10","32343.00","323430","Cash","Lunas","0","","B-059","PCS","Sparepart","243");
INSERT INTO transaksibeli VALUES ("348","2022-01-03","0000-00-00","F5120220103","Wrapped Belt","S17","15","19734.00","296010","Cash","Lunas","0","","B-036","PCS","Sparepart","277");
INSERT INTO transaksibeli VALUES ("349","2022-01-03","0000-00-00","F5120220103","Wrapped Belt","S17","15","25216.00","378240","Cash","Lunas","0","","B-046","PCS","Sparepart","278");
INSERT INTO transaksibeli VALUES ("351","2022-01-03","0000-00-00","F5220220103","Wrapped Belt","S17","15","20796.00","311940","Cash","Lunas","0","","B-041","PCS","Sparepart","233");
INSERT INTO transaksibeli VALUES ("352","2022-01-03","0000-00-00","F5220220103","Wrapped Belt","S17","15","22825.00","342375","Cash","Lunas","0","","B-045","PCS","Sparepart","234");
INSERT INTO transaksibeli VALUES ("353","2022-01-03","0000-00-00","F5220220103","Wrapped Belt","S17","15","25869.00","388035","Cash","Lunas","0","","B-051","PCS","Sparepart","235");
INSERT INTO transaksibeli VALUES ("354","2022-01-03","0000-00-00","F5220220103","Wrapped Belt","S17","15","28405.00","426075","Cash","Lunas","0","","B-056","DOS","Sparepart","236");
INSERT INTO transaksibeli VALUES ("355","2022-01-03","0000-00-00","F5220220103","Wrapped Belt","S17","15","30434.00","456510","Cash","Lunas","0","","B-060","PCS","Sparepart","237");
INSERT INTO transaksibeli VALUES ("356","2022-01-03","0000-00-00","F5220220103","Wrapped Belt","S17","15","33477.00","502155","Cash","Lunas","0","","B-066","PCS","Sparepart","238");
INSERT INTO transaksibeli VALUES ("357","2022-01-03","0000-00-00","F5220220103","Wrapped Belt","S17","15","37535.00","563025","Cash","Lunas","0","","B-074","PCS","Sparepart","239");
INSERT INTO transaksibeli VALUES ("358","2022-01-03","0000-00-00","F5220220103","Wrapped Belt","S17","15","46666.00","699990","Cash","Lunas","0","","B-092","PCS","Sparepart","222");
INSERT INTO transaksibeli VALUES ("359","2022-01-10","0000-00-00","F5320220110","Wrapped Belt","S17","10","19826.00","198260","Cash","Lunas","0","","B-032","PCS","Sparepart","240");
INSERT INTO transaksibeli VALUES ("360","2022-01-10","0000-00-00","F5320220110","Wrapped Belt","S17","20","30698.00","613960","Cash","Lunas","0","","B-056","DOS","Sparepart","236");
INSERT INTO transaksibeli VALUES ("361","2022-01-10","0000-00-00","F5320220110","Wrapped Belt","S17","20","31246.00","624920","Cash","Lunas","0","","B-057","PCS","Sparepart","241");
INSERT INTO transaksibeli VALUES ("362","2022-01-10","0000-00-00","F5320220110","Wrapped Belt","S17","10","31795.00","317950","Cash","Lunas","0","","B-058","PCS","Sparepart","242");
INSERT INTO transaksibeli VALUES ("363","2022-01-10","0000-00-00","F5320220110","Wrapped Belt","S17","10","32343.00","323430","Cash","Lunas","0","","B-059","PCS","Sparepart","243");
INSERT INTO transaksibeli VALUES ("364","2022-01-10","0000-00-00","F5320220110","Wrapped Belt","S17","10","35084.00","350840","Cash","Lunas","0","","B-064","PCS","Sparepart","244");
INSERT INTO transaksibeli VALUES ("365","2022-01-10","0000-00-00","F5320220110","Wrapped Belt","S17","10","35632.00","356320","Cash","Lunas","0","","B-065","PCS","Sparepart","198");
INSERT INTO transaksibeli VALUES ("375","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","6","17907.00","107442","Cash","Lunas","0","","A-049","PCS","Sparepart","245");
INSERT INTO transaksibeli VALUES ("376","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","6","20831.00","124986","Cash","Lunas","0","","A-057","PCS","Sparepart","282");
INSERT INTO transaksibeli VALUES ("377","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","6","25764.00","154584","Cash","Lunas","0","","B-047","PCS","Sparepart","246");
INSERT INTO transaksibeli VALUES ("378","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","6","29602.00","177612","Cash","Lunas","0","","B-054","PCS","Sparepart","247");
INSERT INTO transaksibeli VALUES ("379","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","6","30150.00","180900","Cash","Lunas","0","","B-055","PCS","Sparepart","248");
INSERT INTO transaksibeli VALUES ("380","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","6","30698.00","184188","Cash","Lunas","0","","B-056","DOS","Sparepart","236");
INSERT INTO transaksibeli VALUES ("381","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","6","35084.00","210504","Cash","Lunas","0","","B-064","PCS","Sparepart","244");
INSERT INTO transaksibeli VALUES ("382","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","6","59204.00","355224","Cash","Lunas","0","","B-108","PCS","Sparepart","249");
INSERT INTO transaksibeli VALUES ("383","2022-01-18","0000-00-00","F5420220118","Wrapped Belt","S17","1","60300.00","60300","Cash","Lunas","0","","B-110","PCS","Sparepart","250");
INSERT INTO transaksibeli VALUES ("390","2022-01-19","0000-00-00","F5520220119","Wrapped Belt","S17","10","31236.00","312360","Cash","Lunas","0","","B-057","PCS","Sparepart","241");
INSERT INTO transaksibeli VALUES ("391","2022-01-19","0000-00-00","F5520220119","Wrapped Belt","S17","10","32891.00","328910","Cash","Lunas","0","","B-060","PCS","Sparepart","237");
INSERT INTO transaksibeli VALUES ("392","2022-01-19","0000-00-00","F5520220119","Wrapped Belt","S17","10","33439.00","334390","Cash","Lunas","0","","B-061","PCS","Sparepart","259");
INSERT INTO transaksibeli VALUES ("393","2022-01-19","0000-00-00","F5520220119","Wrapped Belt","S17","20","52078.00","1041560","Cash","Lunas","0","","B-095","PCS","Sparepart","225");
INSERT INTO transaksibeli VALUES ("394","2022-01-19","0000-00-00","F5520220119","Wrapped Belt","S17","3","53174.00","159522","Cash","Lunas","0","","B-097","PCS","Sparepart","227");
INSERT INTO transaksibeli VALUES ("395","2022-01-19","0000-00-00","F5520220119","Wrapped Belt","S17","3","69620.00","208860","Cash","Lunas","0","","B-127","PCS","Sparepart","260");
INSERT INTO transaksibeli VALUES ("396","2022-01-19","0000-00-00","F5520220119","Wrapped Belt","S17","1","84969.00","84969","Cash","Lunas","0","","B-155","PCS","Sparepart","261");
INSERT INTO transaksibeli VALUES ("397","2022-01-19","0000-00-00","F5520220119","Wrapped Belt","S17","2","10202.00","20404","Cash","Lunas","0","","M-028","PCS","Sparepart","262");
INSERT INTO transaksibeli VALUES ("404","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","13095.00","78570","Cash","Lunas","0","","A-035","PCS","Sparepart","263");
INSERT INTO transaksibeli VALUES ("405","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","13156.00","78936","Cash","Lunas","0","","A-036","PCS","Sparepart","264");
INSERT INTO transaksibeli VALUES ("406","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","13522.00","81132","Cash","Lunas","0","","A-037","PCS","Sparepart","265");
INSERT INTO transaksibeli VALUES ("407","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","13887.00","83322","Cash","Lunas","0","","A-038","PCS","Sparepart","266");
INSERT INTO transaksibeli VALUES ("408","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","14252.00","85512","Cash","Lunas","0","","A-039","PCS","Sparepart","267");
INSERT INTO transaksibeli VALUES ("409","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","14983.00","89898","Cash","Lunas","0","","A-041","PCS","Sparepart","268");
INSERT INTO transaksibeli VALUES ("410","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","15349.00","92094","Cash","Lunas","0","","A-042","PCS","Sparepart","269");
INSERT INTO transaksibeli VALUES ("411","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","15714.00","94284","Cash","Lunas","0","","A-043","PCS","Sparepart","270");
INSERT INTO transaksibeli VALUES ("412","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","16080.00","96480","Cash","Lunas","0","","A-044","PCS","Sparepart","271");
INSERT INTO transaksibeli VALUES ("413","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","16445.00","98670","Cash","Lunas","0","","A-045","PCS","Sparepart","272");
INSERT INTO transaksibeli VALUES ("414","2022-01-27","0000-00-00","F5620220127","Wrapped Belt","S17","6","21196.00","127176","Cash","Lunas","0","","A-058","DOS","Sparepart","273");




CREATE TABLE `transaksijual` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
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
  `total_harga_jual_barang` int(11) DEFAULT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



