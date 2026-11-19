# pertemuan-10# Pertemuan 10 - Analisis Kebutuhan Data dan Dasar MySQL Satu Tabel

## Identitas
- NIM: 2622500051
- Mata kuliah: Pemrograman Web Dasar (IS205)

## Cara Menjalankan
1. Jalankan Laragon (Start All), pastikan Apache dan MySQL aktif.
2. Buka http://localhost/phpmyadmin/ (user root, password kosong).
3. Impor db_pwd_2622500051.sql bila ingin memulihkan basis data.
4. Buka aplikasi melalui localhost.

## Analisis Kebutuhan Data
Formulir Kontak P9 memiliki 8 data: nama, email, semester, tanggal,
jenis_pesan, minat[], prodi, pesan. Field minat disimpan sebagai teks
dipisah koma (contoh: HTML, CSS).

## Rancangan Tabel
- Basis data: db_pwd_2622500051
- Tabel: tbl_kontak_2622500051
(tabel 9 kolom: id, nama, email, semester, tanggal, jenis_pesan, minat, prodi, pesan)

## Hasil Pengujian Aktual
| Tahap | Hasil |
|---|---|
| phpMyAdmin dapat dibuka | (isi hasil Anda) |
| Struktur tabel 9 kolom | (isi hasil Anda) |
| Data awal 5 baris di Browse | (isi hasil Anda) |
| Ekspor SQL Quick/SQL | (isi hasil Anda) |
| Pemeriksaan berkas SQL | (isi hasil Anda) |
| Aplikasi P9 tetap berjalan | (isi hasil Anda) |

## Temuan dan Perbaikan
- Nama tabel sempat salah ketik (tbl_kotak) lalu diperbaiki menjadi tbl_kontak.
- Kolom name diganti menjadi nama.
- Nilai minat diperbaiki menjadi "HTML, CSS".
- Email pada id 5 diperbaiki.
- Berkas SQL diekspor ulang setelah perbaikan.