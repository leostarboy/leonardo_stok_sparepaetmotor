
-- SQL dump for sparepart-app
-- Buat database dan tabel beserta relasinya

CREATE DATABASE IF NOT EXISTS db_sparepart;
USE db_sparepart;

-- Tabel sparepart
CREATE TABLE IF NOT EXISTS sparepart (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  merk VARCHAR(100) NOT NULL,
  harga INT NOT NULL,
  stok INT NOT NULL
);

-- Tabel transaksi
CREATE TABLE IF NOT EXISTS transaksi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sparepart_id INT NOT NULL,
  tipe ENUM('masuk','keluar') NOT NULL,
  jumlah INT NOT NULL,
  tanggal DATE NOT NULL,
  FOREIGN KEY (sparepart_id) REFERENCES sparepart(id)
);

-- Contoh data awal (optional)
INSERT INTO sparepart (nama, merk, harga, stok) VALUES
('Busi NGK Iridium', 'NGK', 85000, 20),
('Filter Oli', 'Yamaha Genuine', 30000, 15);

