# Pertemuan 10 - Analisis Kebutuhan Data dan Dasar MySQL Satu Tabel

## Identitas
- Nama: Serin Ariestia Rafka
- NIM: 2622500051
- Mata kuliah: Pemrograman Web Dasar (IS205)
- Repositori: https://github.com/2622500051-a11y/2622500051-PWD-SI1J-2526O

## Cara Menjalankan
1. Jalankan Laragon dan klik Start All, pastikan Apache dan MySQL aktif.
2. Buka http://localhost/phpmyadmin/ (username root, password kosong).
3. Untuk memulihkan basis data, impor berkas `db_pwd_2622500051.sql`.
4. Buka Terminal Laragon, masuk ke folder `pertemuan-10`, lalu jalankan
   `php -S localhost:8000`.
5. Buka http://localhost:8000/index.php di browser.

## Analisis Kebutuhan Data
Formulir Kontak memiliki 8 data: nama, email, semester, tanggal, jenis_pesan,
minat[], prodi, dan pesan. Informasi profil (NIM, nama mahasiswa) tidak
termasuk data formulir Kontak.

Field minat berupa checkbox yang dapat dipilih lebih dari satu. Karena
P10 memakai satu tabel, pilihan disimpan dalam satu kolom sebagai teks
dipisah koma, contohnya `HTML, CSS`. Ini penyederhanaan untuk
pembelajaran, bukan bentuk normalisasi basis data yang ideal.

## Rancangan Tabel
- Basis data: `db_pwd_2622500051`
- Tabel: `tbl_kontak_2622500051`

| No | Atribut | Tipe Data | Ketentuan |
|---|---|---|---|
| 1 | id | INT | PRIMARY KEY, AUTO_INCREMENT |
| 2 | nama | VARCHAR(50) | - |
| 3 | email | VARCHAR(255) | - |
| 4 | semester | TINYINT | - |
| 5 | tanggal | DATE | - |
| 6 | jenis_pesan | VARCHAR(20) | - |
| 7 | minat | VARCHAR(50) | - |
| 8 | prodi | VARCHAR(2) | - |
| 9 | pesan | VARCHAR(300) | - |

## Hasil Pengujian Aktual
| Tahap | Hasil |
|---|---|
| phpMyAdmin dapat dibuka | Berhasil, login sebagai root tanpa password |
| Basis data dan tabel dibuat | Berhasil, tabel memiliki 9 kolom |
| Struktur tabel (tab Structure) | Sesuai rancangan, id PRIMARY dan AUTO_INCREMENT |
| Data awal (tab Browse) | 5 baris data tersimpan |
| Ekspor SQL (Quick, format SQL) | Berhasil, berkas `db_pwd_2622500051.sql` ada di folder pertemuan-10 |
| Pemeriksaan berkas SQL | CREATE TABLE dan INSERT INTO tercantum, sesuai dengan tampilan Browse |
| Aplikasi dibuka di localhost | Berhasil, halaman tampil di http://localhost:8000/index.php lengkap dengan foto, gaya CSS, dan script.js (PHP 8.1.10) |

## Temuan dan Perbaikan
- Nama tabel sempat salah ketik (`tbl_kotak`), diperbaiki menjadi `tbl_kontak`.
- Kolom `name` diganti menjadi `nama` agar sesuai atribut formulir.
- Nilai `minat` diperbaiki menjadi `HTML, CSS`.
- Email pada baris id 5 sempat tidak valid, lalu diperbaiki.
- Perbaikan dilakukan di phpMyAdmin, kemudian basis data diekspor ulang dan
  berkas SQL lama ditimpa.
- Folder `mysql-8` milik Laragon sempat ikut ter-commit. Commit dibatalkan
  dengan `git reset`, lalu ditambahkan `.gitignore` agar folder itu tidak
  dikirim ke GitHub.

## Kendala
- Halaman aplikasi sempat menampilkan 404 Not Found karena folder proyek
  berada di luar folder www Laragon.
- Perintah `php` tidak dikenali di terminal VS Code. Diatasi dengan
  menjalankan server bawaan PHP (`php -S localhost:8000`) dari terminal
  Laragon di dalam folder pertemuan-10.

## Catatan
P10 hanya membahas pembuatan tabel dan ekspor SQL. Integrasi PHP dengan
MySQL belum dibahas, sehingga formulir belum menyimpan data ke basis data.
Pengambilan dan penyimpanan data lewat PHP dibahas di pertemuan berikutnya.