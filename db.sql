CREATE DATABASE umsdb;
USE umsdb;


CREATE TABLE pelanggans (id_pelanggan INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nama VARCHAR(32) DEFAULT NULL, domisili VARCHAR (100) DEFAULT NULL, jenis_kelamin VARCHAR(16) DEFAULT NULL, password VARCHAR(32), created_at TIMESTAMP, updated_at TIMESTAMP);


CREATE TABLE penjualans (id_nota INT NOT NULL , tgl VARCHAR(32) DEFAULT NULL, kode_pelanggan INT, subtotal INT DEFAULT NULL, created_at TIMESTAMP, updated_at TIMESTAMP, KEY fk_penjualans (kode_pelanggan), CONSTRAINT fk_penjualans FOREIGN KEY (kode_pelanggan) REFERENCES pelanggans (id_pelanggan) ON DELETE CASCADE);


CREATE TABLE barangs (kode_barang INT NOT NULL AUTO_INCREMENT, nama VARCHAR(100) DEFAULT NULL, kategori VARCHAR(64) DEFAULT NULL, harga INT DEFAULT NULL, picture VARCHAR(500), created_at TIMESTAMP, updated_at TIMESTAMP, PRIMARY KEY (kode_barang));


CREATE TABLE item_penjualans (nota INT NOT NULL, kode_barang INT DEFAULT NULL, qty INT DEFAULT NULL, created_at TIMESTAMP, updated_at TIMESTAMP);




INSERT INTO pelanggans (nama, domisili, jenis_kelamin, password) VALUES ('Andi', 'Jakarta Utara', 'Pria', 'Andi'), ('Budi', 'Jakarta Barat', 'Pria', 'Budi'), ('Johan', 'Jakarta Selatan', 'Pria', 'Johan');

INSERT INTO pelanggans (nama, password) VALUES ("admin", "admin");

INSERT INTO penjualans (id_nota, tgl, kode_pelanggan, subtotal) VALUES (1, '01/01/18', 1, 50000),(2, '05/01/18', 1, 150000),(3, '01/01/18', 2, 200000);

INSERT INTO barangs (nama, kategori, harga, picture) VALUES ('Pulpen','ATK',15000, "https://images.tokopedia.net/img/cache/500-square/VqbcmM/2020/9/13/5b884243-1ddb-440d-b64b-de5b81ad5397.jpg"),('Piring','Rumah Tangga',35000, "https://d2xjmi1k71iy2m.cloudfront.net/dairyfarm/id/images/135/0713530_PE729595_S5.jpg"),('Pensil','ATK',10000, "https://static.bmdstatic.com/gk/production/6fdf381af986c4717ffddc3e71099e82.jpg"),('Payung','Rumah Tangga',70000, "https://d2xjmi1k71iy2m.cloudfront.net/dairyfarm/id/images/118/0711833_PE728511_S5.jpg"),('Panci','Masak',110000, "https://logamjawa.id/wp-content/uploads/Panci-Nikimura-01-Website.jpg"),('Sapu','Rumah Tangga',40000, "https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//91/MTA-2844081/dragon_dragon-sapu-ijuk-hitam_full03.jpg"),('Kipas','Elektronik',200000, "https://static.bmdstatic.com/pk/product/large/5a3340e70e9e1.jpg"),('Kuali','Masak',120000, "https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//91/MTA-1655370/kiwi_kiwi-aluminium-kuali-wajan---silver--32-cm-_full03.jpg"),('Sikat','Rumah Tangga',30000, "https://id-test-11.slatic.net/p/5fff23c698727a0ad59541af7e8ff0d5.jpg"),('Gelas','Rumah Tangga',25000, "https://f1-styx.imgix.net/catalogue/HSW-219.jpg");

INSERT INTO item_penjualans (nota, kode_barang, qty) VALUES (1, 1, 2),(1, 2, 2),(2 ,6, 1),(3, 7, 1),(3, 8 ,1);