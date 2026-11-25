# Pertemuan 11 - Analisis Kebutuhan Data dan Dasar MySQL Satu Tabel

Mata Kuliah: Pemrograman Web Dasar (IS205)
NIM: 2622500051
Alamat uji: `http://localhost/pwd/2622500051-PWD-SI1J-2526O/pertemuan-11/index.php`

Ringkasan: aplikasi profil dari P10 dihubungkan ke MySQL menggunakan MySQLi. Data kontak diambil dari tabel `tbl_kontak_2622500051` dengan operasi READ (`SELECT`) dan ditampilkan di halaman web.

## Struktur Berkas

```
pertemuan-11/
├── index.php      (dimodifikasi pada P11)
├── fungsi.php
├── koneksi.php    (baru pada P11)
├── script.js
├── style.css
├── README.md
├── db_pwd_2622500051.sql
└── img/
    └── foto-profil.jpg
```

## B. Persiapan

### B.1 Baseline
- Artefak `pertemuan-10` disalin ke `pertemuan-11`.
- Hasil pemeriksaan: tampilan profil, navigasi, dan formulir Kontak tampil seperti P10.
- Kendala: saat alamat dibuka tanpa `index.php`, yang tampil halaman "Hello World". Penyebabnya berkas `index.html` yang tidak termasuk struktur P11. Alamat yang dipakai untuk pengujian adalah yang berakhir dengan `index.php`, dan `index.html` dihapus.

### B.2 Lingkungan
- Laragon dijalankan (Start All); Apache dan MySQL berjalan.
- Repositori berada di `C:\Users\Hype AMD\OneDrive\Documents\2622500051-PWD-SI1J-2526O`, di luar `C:\laragon\www`. Agar dapat diakses melalui `localhost/pwd/...`, dibuat junction:
  `mklink /J "C:\laragon\www\PWD\2622500051-PWD-SI1J-2526O" "C:\Users\Hype AMD\OneDrive\Documents\2622500051-PWD-SI1J-2526O"`
- Folder lama dengan nama yang sama diganti nama menjadi `...-lama` sebelum junction dibuat.

### B.3 Basis Data dan Tabel
- Database: `db_pwd_2622500051`; tabel: `tbl_kontak_2622500051`.
- Struktur: 9 kolom (id, nama, email, semester, tanggal, jenis_pesan, minat, prodi, pesan).
- Kendala: impor pertama gagal dengan galat `#1046 - No database selected` karena dijalankan dari tingkat server.
- Solusi: database dibuat terlebih dahulu, dipilih, lalu berkas `db_pwd_2622500051.sql` diimpor dari tab Import di dalam database. Impor berhasil dan tabel muncul.

## D. Berkas Koneksi PHP-MySQL

### D.1-D.4 Pembuatan koneksi.php
- Berkas `koneksi.php` dibuat sejajar dengan `index.php`.
- Parameter: host `localhost`, user `root`, password kosong, database `db_pwd_2622500051`.
- Menggunakan `mysqli_report(MYSQLI_REPORT_OFF)`, `mysqli_connect()`, dan pemeriksaan `if (!$koneksi)` dengan `die("Koneksi ke basis data gagal.")`.

### D.5 Uji keberhasilan koneksi
- Dibuat berkas sementara `uji_koneksi.php`.
- Hasil: halaman menampilkan "Koneksi ke basis data berhasil."

### D.6 Uji kegagalan koneksi
- `$database` diubah sementara menjadi `db_tidak_tersedia`.
- Hasil: tampil Warning "Unknown database" dan pesan "Koneksi ke basis data gagal."
- `$database` dikembalikan ke `db_pwd_2622500051`; pesan berhasil muncul kembali.

### D.7 Penutup tahap koneksi
- `uji_koneksi.php` dihapus; `koneksi.php` berisi kode akhir yang benar.

## E. Integrasi Koneksi ke Halaman Utama
- `index.php` memuat `fungsi.php` dan `koneksi.php` menggunakan `require_once()`.
- `session_start()` dimatikan (diberi komentar) pada P11.
- Hasil uji: halaman utama tampil tanpa pesan "Koneksi ke basis data gagal."

## F. Operasi READ

- Kueri: `SELECT * FROM tbl_kontak_2622500051`, dijalankan dengan `mysqli_query()`.
- Pemeriksaan: jika kueri gagal, `die("Kueri SELECT gagal dijalankan.")`.
- Hasil diambil dengan `mysqli_fetch_assoc()` dalam perulangan `while` dan disimpan ke larik `$dataKontak`.
- Uji kueri gagal: nama tabel diubah sementara menjadi `tbl_tabel_tidak_tersedia`; tampil "Kueri SELECT gagal dijalankan." Nama tabel kemudian dikembalikan dan data tampil kembali.
- Pemeriksaan `var_dump($dataKontak)`: jumlah elemen dan nilai sesuai dengan data di phpMyAdmin (5 baris), setiap elemen memiliki indeks sesuai nama kolom. Kode `var_dump` dikembalikan menjadi komentar setelah pemeriksaan.

## G. Menampilkan Data dari Basis Data

- Bagian hasil kontak pada P10 (data session) diganti dengan data dari `$dataKontak`, ditampilkan dengan `foreach` di dalam `<article id="hasilKontak">`.
- Keluaran diamankan dengan `bersihkan()` (`htmlspecialchars()`); atribut `pesan` memakai `nl2br(bersihkan(...))`.
- Kondisi data kosong ditangani dengan `if (count($dataKontak) > 0)` dan `else`.
- Uji data ada: seluruh data kontak tampil sesuai isi tabel.
- Uji tabel kosong: tabel dikosongkan dengan `TRUNCATE`; tampil "Belum ada data kontak yang tersimpan."
- Data dikembalikan dengan perintah `INSERT` melalui tab SQL ("5 rows inserted"); kelima data tampil kembali setelah halaman direfresh.

## H. Ekspor Basis Data
- Database `db_pwd_2622500051` diekspor melalui phpMyAdmin (metode Quick, format SQL).
- Hasil ekspor menimpa `pertemuan-11/db_pwd_2622500051.sql`; berkas berisi `CREATE TABLE` dan `INSERT INTO` (5 baris data).

## Catatan
- P11 hanya mencakup operasi READ. Formulir Kontak belum menyimpan data ke basis data; penyimpanan data (INSERT) dibahas pada pertemuan berikutnya.

## Riwayat Commit

| Tahap | Pesan commit |
|---|---|
| B.1 | menyalin artefak pertemuan-10 ke pertemuan-11 sebagai baseline |
| B.2 | menyiapkan direktori dan lingkungan pengembangan pertemuan-11 |
| B.3 | memeriksa kesiapan basis data dan tabel kontak P11 |
| D.5 | menguji koneksi dari PHP ke MySQL dengan file sementara Bernama uji_koneksi.php |
| D.6 | menguji penanganan kegagalan koneksi PHP-MySQL |
| D.7 | menyelesaikan dan mendokumentasikan tahap koneksi PHP-MySQL |
| E | mengintegrasikan berkas koneksi pada index P11 |
| F.4 | menambahkan pemeriksaan kegagalan kueri SELECT |
| F.6 | memeriksa hasil pengambilan data kontak |
| G | Menampilkan data kontak dari basis data |
| H | Menambahkan ekspor basis data praktikum |