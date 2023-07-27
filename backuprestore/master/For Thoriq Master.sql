

CREATE TABLE `master_item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `kode_item` varchar(20) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `kode_supplier_item` varchar(20) NOT NULL,
  `kategori_item` varchar(20) NOT NULL,
  `satuan_item` varchar(10) NOT NULL,
  `harga_beli_terakhir_item` varchar(50) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB AUTO_INCREMENT=286 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_item VALUES ("34","SC 80209","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","3650");
INSERT INTO master_item VALUES ("35","SC 50423","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","2100");
INSERT INTO master_item VALUES ("36","SC 50433","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","2100");
INSERT INTO master_item VALUES ("37","SC 4514","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","1600");
INSERT INTO master_item VALUES ("38","SC 4526","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","1600");
INSERT INTO master_item VALUES ("39","SC 30213","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","1600");
INSERT INTO master_item VALUES ("40","SC 80093","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","2100");
INSERT INTO master_item VALUES ("41","SC 80193","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","1850");
INSERT INTO master_item VALUES ("42","SC 30253","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","1850");
INSERT INTO master_item VALUES ("43","SC 30263","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","1850");
INSERT INTO master_item VALUES ("44","SC 80353","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","1850");
INSERT INTO master_item VALUES ("45","SC 40493","Karet Rem (seiken)","S01 - Putra Mandiri","Sparepart","PCS","1850");
INSERT INTO master_item VALUES ("46","6906","Bearing NTN","S01 - Putra Mandiri","Sparepart","PCS","42000");
INSERT INTO master_item VALUES ("47","6305","Bearing koyo","S01 - Putra Mandiri","Sparepart","PCS","35800");
INSERT INTO master_item VALUES ("48","6203","Bearing DJH","S01 - Putra Mandiri","Sparepart","PCS","5750");
INSERT INTO master_item VALUES ("49","628","Bearing NTL","S01 - Putra Mandiri","Sparepart","PCS","3500");
INSERT INTO master_item VALUES ("50","627","Bearing NTL","S01 - Putra Mandiri","Sparepart","PCS","3500");
INSERT INTO master_item VALUES ("51","PC 307","Oil Filter Canter","S01 - Putra Mandiri","Sparepart","PCS","55000");
INSERT INTO master_item VALUES ("52","RE 8210","Oil Filter L300 Diesel","S01 - Putra Mandiri","Sparepart","PCS","48000");
INSERT INTO master_item VALUES ("53","RE 5","Fuel Filter Triton","S01 - Putra Mandiri","Sparepart","PCS","47000");
INSERT INTO master_item VALUES ("54","DP Futura","Discpad Futura","S01 - Putra Mandiri","Sparepart","PCS","43500");
INSERT INTO master_item VALUES ("55","DP Grand","Discpad Grandmax","S01 - Putra Mandiri","Sparepart","PCS","58500");
INSERT INTO master_item VALUES ("56","SJ CD Turbo","Sarung Jok CD Turbo Domino Hitam-Merah KK","S01 - Putra Mandiri","Sparepart","PCS","290000");
INSERT INTO master_item VALUES ("57","SJ Granmax","Sarung Jok Granmax Pu Domino Hitam-Merah KK","S01 - Putra Mandiri","Sparepart","PCS","290000");
INSERT INTO master_item VALUES ("58","SJ Traga","Sarung Jok Traga Domino Hitam-Merah KK","S01 - Putra Mandiri","Sparepart","PCS","290000");
INSERT INTO master_item VALUES ("59","SJ Carry","Sarung Jok Carry 1.5 Pu Domino Hitam-Merah KK","S05 - Rand Star","Variasi","PCS","290000");
INSERT INTO master_item VALUES ("60","SJ L300","Sarung Jok L300 Pu Domino Hitam-Merah KK","S05 - Rand Star","Variasi","PCS","290000");
INSERT INTO master_item VALUES ("61","SJ APV","Sarung Jok APV Pu Domino Hitam-Merah KK","S05 - Rand Star","Variasi","PCS","290000");
INSERT INTO master_item VALUES ("62","SJ Carry 19","Sarung Jok Carry 19 Pu Domino Hitam-Merah KK","S01 - Putra Mandiri","Sparepart","PCS","290000");
INSERT INTO master_item VALUES ("63","SJ CD Ragasa","Sarung Jok CD Ragasa Domino Hitam-Merah KK","S05 - Rand Star","Variasi","PCS","290000");
INSERT INTO master_item VALUES ("64","8-97209-168","Gear Set 6X39 IS NKR71 OKYM Gold","S06 - JRM","Sparepart","SET","2335193");
INSERT INTO master_item VALUES ("65","MC 075131S","Gear Set 6X40 MT PS135/FE74 OKYM Gold","S06 - JRM","Sparepart","SET","2568720");
INSERT INTO master_item VALUES ("66","MC 863589S","Gear Set 6X40 MT PS120 OKYM Gold","S06 - JRM","Sparepart","SET","1944624");
INSERT INTO master_item VALUES ("67","300CM-GBL-LM/09","Kabel  Aki 24V 300CM Global List MRH","S01 - Putra Mandiri","Sparepart","PCS","120000");
INSERT INTO master_item VALUES ("68","150CM-GBL-LM/09","Kabel Aki 24V 150CM Global List MRH","S07 - SJM","Sparepart","PCS","60000");
INSERT INTO master_item VALUES ("69","250CM-GBL-LM/09","Kabel Aki 24V 250CM Global List MRH","S07 - SJM","Sparepart","PCS","100000");
INSERT INTO master_item VALUES ("70","40CM-GBL-LM/09","Kabel Aki 24V 40CM Global List MRH","S07 - SJM","Sparepart","PCS","18000");
INSERT INTO master_item VALUES ("71","50CM-GBL-LM/09","Kabel Aki 24V 50CM Global List MRH","S07 - SJM","Sparepart","PCS","20000");
INSERT INTO master_item VALUES ("72","75CM-GBL-LM/09","Kabel  Aki 24V 75CM Global List MRH","S01 - Putra Mandiri","Sparepart","PCS","30000");
INSERT INTO master_item VALUES ("73","MAS-GBL-LM/10","Kabel Massa Global List MRH","S07 - SJM","Sparepart","PCS","27000");
INSERT INTO master_item VALUES ("74","Kuning NS40/10","Klem Aki Kuningan NS40","S01 - Putra Mandiri","Sparepart","SET","7250");
INSERT INTO master_item VALUES ("75","STR-GBL-LM/10","Kabel Starter Global PS List MRH","S07 - SJM","Sparepart","PCS","52500");
INSERT INTO master_item VALUES ("76","KBL PRL TTP/29","Kabel Pararel Pakai Tutup","S07 - SJM","Sparepart","PCS","27500");
INSERT INTO master_item VALUES ("77","Kuning Jumbo/25","Klem Aki Kuningan Jumbo","S07 - SJM","Sparepart","PCS","11000");
INSERT INTO master_item VALUES ("78","Timah NS40/10","Klem Aki Timah NS40","S07 - SJM","Sparepart","PCS","13000");
INSERT INTO master_item VALUES ("79","Timah N200/10","Klem Aki Timah N200","S07 - SJM","Sparepart","PCS","15000");
INSERT INTO master_item VALUES ("80","001084","Fuel Tank 065-9","S08 - IMP","Sparepart","PCS","1677000");
INSERT INTO master_item VALUES ("81","SJN7-087JK","NOZ/LA160P50FE347","S09 - HSA","Sparepart","PCS","101500");
INSERT INTO master_item VALUES ("82","SJN7-047JK","NOZ/DLLA160P3PS89","S09 - HSA","Sparepart","PCS","101500");
INSERT INTO master_item VALUES ("83","SJP6-026JK","Spider White PS120","S09 - HSA","Sparepart","PCS","106000");
INSERT INTO master_item VALUES ("84","SJT7-005JK","Case Diff Only PS135","S09 - HSA","Sparepart","PCS","1320000");
INSERT INTO master_item VALUES ("85","MK-471750","Drag Link Assy PS125","S10 - AMP","Sparepart","PCS","205000");
INSERT INTO master_item VALUES ("86","MK-997508/09","Tie Rod End PS125","S10 - AMP","Sparepart","SET","115000");
INSERT INTO master_item VALUES ("87","EFJ10-06100/10","Tie Rod End HT","S10 - AMP","Sparepart","SET","115000");
INSERT INTO master_item VALUES ("88","OK-22H-67-350","Motor Wiper KIA Timor","S11 - JWJ","Sparepart","PCS","115000");
INSERT INTO master_item VALUES ("89","ML09-09","Motor Wiper Isuzu NKR126","S11 - JWJ","Sparepart","PCS","115000");
INSERT INTO master_item VALUES ("90","38101-79050","Motor Wiper Suzuki ST100 Carry","S01 - Putra Mandiri","Sparepart","PCS","115000");
INSERT INTO master_item VALUES ("91","MC 859852","Motor Wiper Mitsubishi PS-190, Fuso","S11 - JWJ","Sparepart","PCS","115000");
INSERT INTO master_item VALUES ("92","ME 011807","Front Engine Mounting Mitsubishi PS120","S11 - JWJ","Sparepart","PCS","46875");
INSERT INTO master_item VALUES ("93","MB 000083 G","Centre Bearing Mitsubishi PS100 Galvanis","S11 - JWJ","Sparepart","PCS","40000");
INSERT INTO master_item VALUES ("94","38102-77500","Wiper Link Suzuki Futura","S11 - JWJ","Sparepart","PCS","120000");
INSERT INTO master_item VALUES ("95","SM-100 B R","P Coating Bears RH","S11 - JWJ","Sparepart","PCS","51000");
INSERT INTO master_item VALUES ("96","SM-100 B L","P Coating Bears LH","S11 - JWJ","Sparepart","PCS","54000");
INSERT INTO master_item VALUES ("97","MB 141843","Motor Wiper Mitsubishi L300","S01 - Putra Mandiri","Sparepart","PCS","115000");
INSERT INTO master_item VALUES ("98","34910-70010","Fuel Gauge S. Carry ST100 ","S11 - JWJ","Sparepart","PCS","56250");
INSERT INTO master_item VALUES ("99","85120-87516","Motor Wiper Daihatsu S88/S89","S11 - JWJ","Sparepart","PCS","115000");
INSERT INTO master_item VALUES ("100","SM-135 B R (OLD)","SM-135 B R (OLD)","S11 - JWJ","Sparepart","PCS","54000");
INSERT INTO master_item VALUES ("101","SM-135 B R (OLD)","SM-135 B L (OLD)","S11 - JWJ","Sparepart","PCS","61200");
INSERT INTO master_item VALUES ("102","28840-Z5012","Wiper Link Assy Mitsubishi CK12","S11 - JWJ","Sparepart","PCS","287500");
INSERT INTO master_item VALUES ("103","MB-302328","Wiper Link Assy Mitsubishi PS135","S11 - JWJ","Sparepart","PCS","189375");
INSERT INTO master_item VALUES ("104","MB-302227","Wiper Link Assy Mitsubishi PS120","S11 - JWJ","Sparepart","PCS","181500");
INSERT INTO master_item VALUES ("105","MK-404322","Wiper Link Assy Mitsubishi FE70","S11 - JWJ","Sparepart","PCS","230500");
INSERT INTO master_item VALUES ("106","85190-90P00","Wiper Arm To 5K","S11 - JWJ","Sparepart","PCS","62500");
INSERT INTO master_item VALUES ("107","WA-T01","Wiper Arm To 4K","S11 - JWJ","Sparepart","PCS","39375");
INSERT INTO master_item VALUES ("108","38310-79001","Wiper Arm SU T100","S11 - JWJ","Sparepart","PCS","30625");
INSERT INTO master_item VALUES ("109","MB-141139","Wiper Arm Mitsubishi L300 OLD","S11 - JWJ","Sparepart","PCS","39375");
INSERT INTO master_item VALUES ("110","85110-08010","Motor Wiper Toyota 7K","S11 - JWJ","Sparepart","PCS","162000");
INSERT INTO master_item VALUES ("111","MG-Avanza Front DNY","Mud Guard Grand Avanza Front DNY","S12 - YS Auto Acceso","Variasi","SET","48000");
INSERT INTO master_item VALUES ("112","MG-Avanza Rear DNY","Mud Guard Grand Avanza Rear DNY","S12 - YS Auto Acceso","Variasi","SET","48000");
INSERT INTO master_item VALUES ("113","KR-Sparco Silver","karpet Roda STL Sparco Silver","S12 - YS Auto Acceso","Sparepart","SET","24500");
INSERT INTO master_item VALUES ("114","SSFRAPVK","Futura/Apv/Carry 8T K","S13 - Hoya Auto Part","Sparepart","PCS","726000");
INSERT INTO master_item VALUES ("115","POWS-062","Oil Ws Cover Isuzu Diesel 8-94144","S13 - Hoya Auto Part","Sparepart","PCS","165000");
INSERT INTO master_item VALUES ("116","PK-091","Kepala 6015/Fuso Fighter","S13 - Hoya Auto Part","Sparepart","PCS","338800");
INSERT INTO master_item VALUES ("117","PK-092","Kepala 6017/Ganzo","S13 - Hoya Auto Part","Sparepart","PCS","385000");
INSERT INTO master_item VALUES ("118","PGB-245","Bendix Fuso Figher/6015/PS190","S13 - Hoya Auto Part","Sparepart","PCS","242000");
INSERT INTO master_item VALUES ("119","PCS-007","Yoke PS135/PS125/4D33 24V","S13 - Hoya Auto Part","Sparepart","PCS","385000");
INSERT INTO master_item VALUES ("120","PASLH5","Angker Dino Louhan 500 24V","S13 - Hoya Auto Part","Sparepart","PCS","627000");
INSERT INTO master_item VALUES ("121","PASNRD5","Angker Dino Jumbo/CK12/Nisaan","S13 - Hoya Auto Part","Sparepart","PCS","726000");
INSERT INTO master_item VALUES ("122","PBRNME","Bearing ALT Canter/PS135","S13 - Hoya Auto Part","Sparepart","PCS","99000");
INSERT INTO master_item VALUES ("123","PCA-003","Stator PS135","S13 - Hoya Auto Part","Sparepart","PCS","181000");
INSERT INTO master_item VALUES ("124","PICND-009","IC Rinosaurus 115ET/130HT 28,3V","S13 - Hoya Auto Part","Sparepart","PCS","264000");
INSERT INTO master_item VALUES ("125","PSW7K","Switch Innova/Hilux Reborn","S13 - Hoya Auto Part","Sparepart","PCS","312000");
INSERT INTO master_item VALUES ("126","PICH-005","IC NKR 71 28,5","S13 - Hoya Auto Part","Sparepart","PCS","242000");
INSERT INTO master_item VALUES ("127","PICM-009","IC PS100/PS120 24V 35A","S13 - Hoya Auto Part","Sparepart","PCS","198000");
INSERT INTO master_item VALUES ("128","PHCBPS135","Holder Carbon PS135/PS125","S13 - Hoya Auto Part","Sparepart","PCS","72600");
INSERT INTO master_item VALUES ("129","PASM4D33A","Angker PS135/PS125/4D33 24V New","S13 - Hoya Auto Part","Sparepart","PCS","385000");
INSERT INTO master_item VALUES ("130","PG-036","Gear Kit 9T PS135","S13 - Hoya Auto Part","Sparepart","PCS","44000");
INSERT INTO master_item VALUES ("131","SDEP16P9","Espass/S91/S92/Classy/Feroza","S13 - Hoya Auto Part","Sparepart","PCS","1210000");
INSERT INTO master_item VALUES ("132","SSKTK","Katana/Jimmy 8T K","S13 - Hoya Auto Part","Sparepart","PCS","726000");
INSERT INTO master_item VALUES ("133","SHCRVTE","CRV 2.01 4WD 07 KE5 III TH.07/Civic","S13 - Hoya Auto Part","Sparepart","PCS","1474000");
INSERT INTO master_item VALUES ("134","AMT12DIN","T12055 INJ/P-5 ","S13 - Hoya Auto Part","Sparepart","PCS","1760000");
INSERT INTO master_item VALUES ("135","SML3DD2.3N","L300 2,3 Diesel","S13 - Hoya Auto Part","Sparepart","PCS","2178000");
INSERT INTO master_item VALUES ("136","PSWH300","Switch Assy Aluminium Hino 300","S13 - Hoya Auto Part","Sparepart","PCS","552000");
INSERT INTO master_item VALUES ("137","PASNKR66","Angker NKR 66/NKR 71/135PS/4HF1","S13 - Hoya Auto Part","Sparepart","PCS","484000");
INSERT INTO master_item VALUES ("138","PCA-009","Stator Ganzo/6D17/Canter/PS125","S13 - Hoya Auto Part","Sparepart","PCS","550000");
INSERT INTO master_item VALUES ("139","PCA-003 ASLI","Stator PS135","S13 - Hoya Auto Part","Sparepart","PCS","484000");
INSERT INTO master_item VALUES ("140","IC Hino Louham/Hino ","PICD-001","S13 - Hoya Auto Part","Sparepart","PCS","220000");
INSERT INTO master_item VALUES ("141","IC 24V 4HF1/NPR71/NK","PICH-017","S13 - Hoya Auto Part","Sparepart","PCS","308000");
INSERT INTO master_item VALUES ("142","STDN138N","Rino 138/148/12V V83 BU-30","S13 - Hoya Auto Part","Sparepart","PCS","2310000");
INSERT INTO master_item VALUES ("143","ST2FJPG","ZF Jeep (G) Big","S13 - Hoya Auto Part","Sparepart","PCS","880000");
INSERT INTO master_item VALUES ("144","AT2FN","ZF 65A (NEW)","S13 - Hoya Auto Part","Sparepart","PCS","968000");
INSERT INTO master_item VALUES ("145","CPT2FJN","ZF Jeep Platina","S13 - Hoya Auto Part","Sparepart","PCS","814000");
INSERT INTO master_item VALUES ("146","PSWP100N","Switch PS100/PS135/PS120 24V New","S13 - Hoya Auto Part","Sparepart","PCS","277200");
INSERT INTO master_item VALUES ("147","PSWNM","Switch NM T120S INJ/Lancer 12V","S13 - Hoya Auto Part","Sparepart","PCS","231000");
INSERT INTO master_item VALUES ("148","SML200AT","L200 Strada/Triton 2.5/Pajero","S13 - Hoya Auto Part","Sparepart","PCS","2057000");
INSERT INTO master_item VALUES ("149","SMKDDN","STR Kuda Diesel/L300 2.5 New","S13 - Hoya Auto Part","Sparepart","PCS","1870000");
INSERT INTO master_item VALUES ("150","PG-025","Gear Kit PS135","S13 - Hoya Auto Part","Sparepart","PCS","44000");
INSERT INTO master_item VALUES ("151","PGB-226","OM BT L300","S13 - Hoya Auto Part","Sparepart","PCS","110000");
INSERT INTO master_item VALUES ("152","PSWK","Switch Futura","S13 - Hoya Auto Part","Sparepart","PCS","198000");
INSERT INTO master_item VALUES ("153","SMT120SKS","T120SS/L300 8T K","S13 - Hoya Auto Part","Sparepart","PCS","660000");
INSERT INTO master_item VALUES ("154","PRT-S702","Flasher Relay 12V K3 Toyota Camry","S13 - Hoya Auto Part","Sparepart","PCS","110000");
INSERT INTO master_item VALUES ("155","PAWNKR66","Switch NKR 71","S13 - Hoya Auto Part","Sparepart","PCS","352000");
INSERT INTO master_item VALUES ("156","PASNKR66","Angker STR NKR71","S13 - Hoya Auto Part","Sparepart","PCS","440000");
INSERT INTO master_item VALUES ("157","PASWLH","Switch Lauhan","S13 - Hoya Auto Part","Sparepart","PCS","352000");
INSERT INTO master_item VALUES ("158","PCBS-017","Carbon Brush STR Dyna 24V","S13 - Hoya Auto Part","Sparepart","PCS","66000");
INSERT INTO master_item VALUES ("159","AH13DO-1","Alt Hino 13DHT 24V","S13 - Hoya Auto Part","Sparepart","PCS","2200000");
INSERT INTO master_item VALUES ("160","SML200N","Trinton 2.5","S13 - Hoya Auto Part","Sparepart","PCS","1870000");
INSERT INTO master_item VALUES ("161","OBC Radiator Hijau","OBC Radiator Coolant Hijau 4x5 LTR","S14 - MM","Sparepart","DOS","77000");
INSERT INTO master_item VALUES ("162","OBC Radiator Merah","OBC Radiator Coolant Merah 4x5 LTR","S14 - MM","Sparepart","DOS","77000");
INSERT INTO master_item VALUES ("163","KY 68 18 LTR","Kyoso Oli Hidraulic 68 Coklat 18 LTR","S14 - MM","Sparepart","PCS","352000");
INSERT INTO master_item VALUES ("164","KY 68 4x5 LTR","Kyoso Hidraulic 68 Coklat 4x5 LTR","S14 - MM","Sparepart","DOS","380050");
INSERT INTO master_item VALUES ("165","FF Fuso FC1003","Fuel Filter Fuso FC1003","S15 - LM","Sparepart","PCS","35050");
INSERT INTO master_item VALUES ("166","OF T120SS","Oil Filter T120SS","S15 - LM","Sparepart","PCS","20401");
INSERT INTO master_item VALUES ("167","AF Avanza A3312","Air Filter Avanza","S15 - LM","Sparepart","PCS","86500");
INSERT INTO master_item VALUES ("168","AF R3 A14490","Air Filter R3","S15 - LM","Sparepart","PCS","84620");
INSERT INTO master_item VALUES ("169","AF Inova A5903","Air Filter Inova","S15 - LM","Sparepart","SET","94350");
INSERT INTO master_item VALUES ("170","OF FM 01005","Oil Filter FM 01005","S15 - LM","Sparepart","PCS","44880");
INSERT INTO master_item VALUES ("171","OF C1318","Oil Filter C1318","S15 - LM","Sparepart","PCS","56915");
INSERT INTO master_item VALUES ("172","FF FC1301","Fuel Filter FC1301","S15 - LM","Sparepart","PCS","23635");
INSERT INTO master_item VALUES ("173","FF FE F1002","Fuel Filter FE F1002","S15 - LM","Sparepart","PCS","15185");
INSERT INTO master_item VALUES ("174","FF FC1005","Fuel Filter FC1005","S15 - LM","Sparepart","PCS","58800");
INSERT INTO master_item VALUES ("175","FF FC1001","Fuel Filter L300D  FC1001","S15 - LM","Sparepart","PCS","48900");
INSERT INTO master_item VALUES ("176","OF C1008","Oil FIlter L300D","S15 - LM","Sparepart","PCS","50030");
INSERT INTO master_item VALUES ("177","FF FC5601","Fuel Filter RD33 ","S15 - LM","Sparepart","PCS","52400");
INSERT INTO master_item VALUES ("178","AF A1007","Air Filter PS A1007","S15 - LM","Sparepart","PCS","44150");
INSERT INTO master_item VALUES ("179","OF C1012","Oil Filter Canter ","S15 - LM","Sparepart","PCS","64050");
INSERT INTO master_item VALUES ("180","FF FE1804","Fuel Filter Nissan","S15 - LM","Sparepart","PCS","38100");
INSERT INTO master_item VALUES ("181","3301-1028 AT","Radiator Ford Ranger","S15 - LM","Sparepart","PCS","1495000");
INSERT INTO master_item VALUES ("182","3321-1054","Radiator LO39","S15 - LM","Sparepart","PCS","756000");
INSERT INTO master_item VALUES ("183","SC 7059","Karet Rem (seiken)","S15 - LM","Sparepart","PCS","7493");
INSERT INTO master_item VALUES ("184","SC 80133","Karet Rem (seiken)","S15 - LM","Sparepart","PCS","9633");
INSERT INTO master_item VALUES ("185","SC 20233","Karet Rem (seiken)","S15 - LM","Sparepart","PCS","7919");
INSERT INTO master_item VALUES ("186","SC 41563","Karet Rem (seiken)","S15 - LM","Sparepart","PCS","7493");
INSERT INTO master_item VALUES ("187","2323-1004","Radiator PO Turbo","S15 - LM","Sparepart","PCS","2155315");
INSERT INTO master_item VALUES ("188","6304 ","Bearing koyo","S16 - SLS","Sparepart","PCS","34000");
INSERT INTO master_item VALUES ("189","204 D1","Bearing NIS","S16 - SLS","Sparepart","PCS","18000");
INSERT INTO master_item VALUES ("190","6308","Bearing koyo","S16 - SLS","Sparepart","PCS","117000");
INSERT INTO master_item VALUES ("191","6202","Bearing NIS","S16 - SLS","Sparepart","PCS","4400");
INSERT INTO master_item VALUES ("192","6207","Bearing NIS","S16 - SLS","Sparepart","PCS","17400");
INSERT INTO master_item VALUES ("193","6208","Bearing NIS","S16 - SLS","Sparepart","PCS","22700");
INSERT INTO master_item VALUES ("194","626 ","Bearing NIS","S16 - SLS","Sparepart","PCS","3100");
INSERT INTO master_item VALUES ("195","6204 ZZ","Bearing NIS","S16 - SLS","Sparepart","PCS","8000");
INSERT INTO master_item VALUES ("196","RECMF-8500","Raw Edge Belt","S17 - Makmur Raya","Sparepart","PCS","49765");
INSERT INTO master_item VALUES ("197","RECMF-8870","Raw Edge Belt","S17 - Makmur Raya","Sparepart","PCS","86591");
INSERT INTO master_item VALUES ("198","B-065","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","35632");
INSERT INTO master_item VALUES ("199","B-066","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","36180");
INSERT INTO master_item VALUES ("200","B-067","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","36728");
INSERT INTO master_item VALUES ("201","B-068","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","37276");
INSERT INTO master_item VALUES ("202","B-069","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","37825");
INSERT INTO master_item VALUES ("203","B-070","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","38373");
INSERT INTO master_item VALUES ("204","B-071","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","38921");
INSERT INTO master_item VALUES ("205","B-072","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","39469");
INSERT INTO master_item VALUES ("206","B-073","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","40017");
INSERT INTO master_item VALUES ("208","B-075","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","41114");
INSERT INTO master_item VALUES ("209","B-076","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","41662");
INSERT INTO master_item VALUES ("210","B-079","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","43307");
INSERT INTO master_item VALUES ("211","B-080","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","0");
INSERT INTO master_item VALUES ("212","B-082","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","0");
INSERT INTO master_item VALUES ("213","B-083","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","0");
INSERT INTO master_item VALUES ("214","B-084","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","0");
INSERT INTO master_item VALUES ("215","B-085","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","0");
INSERT INTO master_item VALUES ("216","B-086","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","0");
INSERT INTO master_item VALUES ("217","B-087","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","0");
INSERT INTO master_item VALUES ("218","B-088","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","0");
INSERT INTO master_item VALUES ("219","B-089","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","48788");
INSERT INTO master_item VALUES ("220","B-090","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","49337");
INSERT INTO master_item VALUES ("221","B-091","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","49885");
INSERT INTO master_item VALUES ("222","B-092","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","50433");
INSERT INTO master_item VALUES ("223","B-093","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","50981");
INSERT INTO master_item VALUES ("224","B-094","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","51529");
INSERT INTO master_item VALUES ("225","B-095","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","52078");
INSERT INTO master_item VALUES ("226","B-096","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","52626");
INSERT INTO master_item VALUES ("227","B-097","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","53174");
INSERT INTO master_item VALUES ("228","B-098","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","53722");
INSERT INTO master_item VALUES ("229","B-099","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","54270");
INSERT INTO master_item VALUES ("230","B-100","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","54819");
INSERT INTO master_item VALUES ("231","B-101","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","55367");
INSERT INTO master_item VALUES ("232","B-102","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","55915");
INSERT INTO master_item VALUES ("233","B-041","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","20796");
INSERT INTO master_item VALUES ("234","B-045","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","22825");
INSERT INTO master_item VALUES ("235","B-051","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","22869");
INSERT INTO master_item VALUES ("236","B-056","Wrapped Belt","S17 - Makmur Raya","Sparepart","DOS","28405");
INSERT INTO master_item VALUES ("237","B-060","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","30434");
INSERT INTO master_item VALUES ("238","B-066","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","33477");
INSERT INTO master_item VALUES ("239","B-074","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","37535");
INSERT INTO master_item VALUES ("240","B-032","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","19826");
INSERT INTO master_item VALUES ("241","B-057","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","31246");
INSERT INTO master_item VALUES ("242","B-058","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","31795");
INSERT INTO master_item VALUES ("243","B-059","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","32343");
INSERT INTO master_item VALUES ("244","B-064","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","35084");
INSERT INTO master_item VALUES ("245","A-049","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","17907");
INSERT INTO master_item VALUES ("246","B-047","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","25764");
INSERT INTO master_item VALUES ("247","B-054","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","29602");
INSERT INTO master_item VALUES ("248","B-055","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","30150");
INSERT INTO master_item VALUES ("249","B-108","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","59204");
INSERT INTO master_item VALUES ("250","B-110","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","60300");
INSERT INTO master_item VALUES ("251","B-038","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","13887");
INSERT INTO master_item VALUES ("252","B-043","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","15714");
INSERT INTO master_item VALUES ("253","B-050","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","18273");
INSERT INTO master_item VALUES ("254","B-052","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","28505");
INSERT INTO master_item VALUES ("255","B-040","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","21927");
INSERT INTO master_item VALUES ("257","B-053","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","29054");
INSERT INTO master_item VALUES ("258","B-062","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","33987");
INSERT INTO master_item VALUES ("259","B-061","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","33439");
INSERT INTO master_item VALUES ("260","B-127","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","69620");
INSERT INTO master_item VALUES ("261","B-155","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","84969");
INSERT INTO master_item VALUES ("262","M-028","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","10202");
INSERT INTO master_item VALUES ("263","A-035","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","13095");
INSERT INTO master_item VALUES ("264","A-036","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","13156");
INSERT INTO master_item VALUES ("265","A-037","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","13522");
INSERT INTO master_item VALUES ("266","A-038","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","13887");
INSERT INTO master_item VALUES ("267","A-039","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","14252");
INSERT INTO master_item VALUES ("268","A-041","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","14983");
INSERT INTO master_item VALUES ("269","A-042","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","15349");
INSERT INTO master_item VALUES ("270","A-043","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","15714");
INSERT INTO master_item VALUES ("271","A-044","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","16080");
INSERT INTO master_item VALUES ("272","A-045","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","16445");
INSERT INTO master_item VALUES ("273","A-058","Wrapped Belt","S17 - Makmur Raya","Sparepart","DOS","21196");
INSERT INTO master_item VALUES ("274","A-033","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","13096");
INSERT INTO master_item VALUES ("275","RECMF-8530","Raw Edge Belt","S17 - Makmur Raya","Sparepart","PCS","52751");
INSERT INTO master_item VALUES ("276","IBME 208-24","Bearing UCP","S17 - Makmur Raya","Sparepart","PCS","68208");
INSERT INTO master_item VALUES ("277","B-036","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","19734");
INSERT INTO master_item VALUES ("278","B-046","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","25216");
INSERT INTO master_item VALUES ("279","A-050","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","18273");
INSERT INTO master_item VALUES ("280","A-054","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","19734");
INSERT INTO master_item VALUES ("281","A-059","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","32343");
INSERT INTO master_item VALUES ("282","A-057","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","20831");
INSERT INTO master_item VALUES ("283","A-032","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","13095");
INSERT INTO master_item VALUES ("284","A-052","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","19003");
INSERT INTO master_item VALUES ("285","A-067","Wrapped Belt","S17 - Makmur Raya","Sparepart","PCS","24485");




CREATE TABLE `master_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_kategori VALUES ("4","Sparepart");
INSERT INTO master_kategori VALUES ("5","Variasi");




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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_member VALUES ("4","M01","Bintang Terang","-","-","-","-","-");




CREATE TABLE `master_satuan` (
  `id_satuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_satuan VALUES ("8","PCS");
INSERT INTO master_satuan VALUES ("9","SET");
INSERT INTO master_satuan VALUES ("10","DOS");
INSERT INTO master_satuan VALUES ("11","JRG");




CREATE TABLE `master_seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_seller` varchar(55) NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_seller VALUES ("6","rudy","-","-");




CREATE TABLE `master_supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `contactperson_supplier` varchar(20) NOT NULL,
  `no_telp_supplier` varchar(20) NOT NULL,
  `no_hp_supplier` varchar(20) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO master_supplier VALUES ("16","S01","Putra Mandiri","Sidoarjo","-","-","-");
INSERT INTO master_supplier VALUES ("17","S02","TTP","-","-","-","-");
INSERT INTO master_supplier VALUES ("18","S03","PT. Bina Prima Karya Mandiri","-","-","-","-");
INSERT INTO master_supplier VALUES ("19","S04","CV. Kwobra Jaya Sentosa","-","-","-","-");
INSERT INTO master_supplier VALUES ("20","S05","Rand Star","-","-","-","-");
INSERT INTO master_supplier VALUES ("21","S06","JRM","Surabaya","-","-","-");
INSERT INTO master_supplier VALUES ("22","S07","SJM","-","-","-","-");
INSERT INTO master_supplier VALUES ("24","S08","IMP","Surabaya","-","-","-");
INSERT INTO master_supplier VALUES ("25","S09","HSA","-","-","-","-");
INSERT INTO master_supplier VALUES ("26","S10","AMP","-","-","-","-");
INSERT INTO master_supplier VALUES ("27","S11","JWJ","-","-","-","-");
INSERT INTO master_supplier VALUES ("28","S12","YS Auto Accesories","-","-","-","-");
INSERT INTO master_supplier VALUES ("29","S13","Hoya Auto Part","-","-","-","-");
INSERT INTO master_supplier VALUES ("30","S14","MM","-","-","-","-");
INSERT INTO master_supplier VALUES ("31","S15","LM","-","-","-","-");
INSERT INTO master_supplier VALUES ("32","S16","SLS","-","-","-","-");
INSERT INTO master_supplier VALUES ("33","S17","Makmur Raya","-","-","-","-");


