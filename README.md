# 🚀 Sparepart Ready
Aplikasi web dinamis **manajemen stok sparepart motor** berbasis PHP + MySQL + Bootstrap 5.  
Fitur lengkap: **Login, CRUD, Transaksi Stok, Laporan, Cetak PDF**, dan antarmuka responsif dengan warna gradien‐navbar.

---

## ✨ Fitur Utama
| Area | Deskripsi |
|------|-----------|
| **Autentikasi** | Login sederhana (tabel `users`) – akun awal **admin / admin123**. |
| **Dashboard** | Ringkasan cepat: total jenis sparepart & total stok. |
| **Data Sparepart** | Tambah • Ubah • Hapus & lihat daftar sparepart. |
| **Transaksi Stok** | Catat **Masuk/Keluar** → stok tersinkron otomatis. |
| **Laporan** | Tabel histori transaksi + tombol **Cetak PDF** (via `window.print`). |
| **UI Modern** | Bootstrap 5, navbar gradien biru‑ungu, tabel striped/hover, badge stok berwarna (hijau >10, kuning 6‑10, merah ≤5). |

---

## 🗂 Struktur Folder
```
sparepart-ready/
├─ assets/          # CSS + gambar
│  ├─ custom.css
│  └─ bg-sparepart.jpg
├─ db/
│  ├─ db_sparepart.sql   # dump DB (dengan user default)
│  └─ koneksi.php
├─ pages/          # 4 halaman utama
│  ├─ dashboard.php
│  ├─ sparepart.php
│  ├─ transaksi.php
│  └─ laporan.php
├─ crud/           # helper CRUD sparepart
│  ├─ sparepart-tambah.php
│  ├─ sparepart-edit.php
│  └─ sparepart-hapus.php
├─ login.php  / logout.php
├─ sidebar.php
└─ index.php
```

---

## ⚡ Instalasi Cepat (Laragon / XAMPP)
1. Ekstrak folder `sparepart-ready` ke direktori web (`C:\laragon\www\` atau `htdocs`).
2. Import `db/db_sparepart.sql` via phpMyAdmin.
3. Jalankan Apache & MySQL, lalu buka  
   `http://sparepart-ready.test` *atau* `http://localhost/sparepart-ready`.
4. Login: **admin / admin123** (ubah password di tabel `users` jika perlu).

---

## 🖨️ Cetak PDF
Masuk menu **Laporan** → klik **Cetak PDF** → dialog Print muncul → pilih **Save as PDF** → Simpan.

---

## 🛠 Konfigurasi Cepat
| File | Ubah apa |
|------|----------|
| `db/koneksi.php` | Kredensial DB jika tidak pakai `root` tanpa password. |
| `assets/custom.css` | Warna, font, style tambahan. |
| `assets/bg-sparepart.jpg` | Ganti gambar latar agar lebih personal. |
| `sidebar.php` | Teks brand, logo, atau link menu tambahan. |

---

## 💡 Ide Pengembangan Lanjut
- Level user (Admin vs Staff)
- Ekspor laporan ke Excel
- Chart.js grafik stok tren
- Soft delete / recycle‑bin sparepart

---

MIT License – bebas pakai & modifikasi. Selamat berkarya! 🚀
