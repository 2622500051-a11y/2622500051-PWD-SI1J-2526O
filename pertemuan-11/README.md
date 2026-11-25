# Pertemuan 11

## B.1 Kondisi Awal dan Verifikasi Baseline
- Artefak pertemuan-10 disalin ke pertemuan-11 sebagai baseline.
- Alamat uji: http://localhost/pwd/2622500051-PWD-SI1J-2526O/pertemuan-11/index.php
- Hasil pemeriksaan: (tulis yang benar-benar tampil: profil, navigasi, formulir Kontak).

## B.2 Persiapan Lingkungan
- Laragon dijalankan (Start All); Apache dan MySQL berjalan.
- Lokasi proyek: C:\Users\Hype AMD\OneDrive\Documents\2622500051-PWD-SI1J-2526O\pertemuan-11
- Proyek dihubungkan ke C:\laragon\www\PWD dengan junction (mklink /J) sehingga dapat diakses melalui localhost/pwd/2622500051-PWD-SI1J-2526O/pertemuan-11/index.php
- Berkas lengkap: index.php, fungsi.php, koneksi.php, script.js, style.css, README.md, db_pwd_2622500051.sql, img/

## B.3 Pemeriksaan Basis Data
- Database: db_pwd_2622500051
- Tabel: tbl_kontak_2622500051
- Struktur: 9 kolom (id, nama, email, semester, tanggal, jenis_pesan, minat, prodi, pesan).
- Tab Browse menampilkan (jumlah) baris data.
- Catatan: impor pertama gagal (#1046 No database selected) karena dijalankan dari tingkat server. Impor berhasil setelah dijalankan dari dalam database db_pwd_2622500051.

## D. Berkas Koneksi PHP-MySQL
- Dibuat koneksi.php berisi parameter (host localhost, user root, password kosong, database db_pwd_2622500051), mysqli_report(MYSQLI_REPORT_OFF), mysqli_connect(), dan pemeriksaan if (!$koneksi) dengan die().

### D.5 Uji keberhasilan koneksi
- Dibuat berkas sementara uji_koneksi.php.
- Alamat uji: http://localhost/pwd/2622500051-PWD-SI1J-2526O/pertemuan-11/uji_koneksi.php
- Hasil: halaman menampilkan "Koneksi ke basis data berhasil."

### D.6 Uji kegagalan koneksi
- $database diubah sementara menjadi db_tidak_tersedia.
- Hasil: tampil Warning "Unknown database" dan pesan "Koneksi ke basis data gagal."
- $database dikembalikan ke db_pwd_2622500051; pesan berhasil muncul kembali.

### D.7 Penutup tahap koneksi
- Berkas sementara uji_koneksi.php dihapus.
- koneksi.php diperiksa: parameter database kembali ke db_pwd_2622500051 dan kode akhir sudah benar.
- Berkas index.html yang tidak termasuk struktur P11 dihapus agar alamat pertemuan-11 menampilkan index.php.

## E. Integrasi Koneksi ke Halaman Utama
- index.php memuat fungsi.php dan koneksi.php menggunakan require_once().
- session_start() dimatikan (diberi komentar) pada P11.

## E. Integrasi Koneksi ke Halaman Utama
- index.php memuat fungsi.php dan koneksi.php dengan require_once(); session_start() dimatikan.
- Hasil uji: halaman utama tampil tanpa pesan "Koneksi ke basis data gagal."