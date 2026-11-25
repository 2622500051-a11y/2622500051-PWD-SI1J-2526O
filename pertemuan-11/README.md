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

## F. Operasi READ
- Kueri: SELECT * FROM tbl_kontak_2622500051, dijalankan dengan mysqli_query(), hasil diambil dengan mysqli_fetch_assoc() ke larik $dataKontak.
- Uji kueri gagal: nama tabel diubah sementara menjadi tbl_tabel_tidak_tersedia; tampil "Kueri SELECT gagal dijalankan." Nama tabel sudah dikembalikan.
- Pengamatan var_dump($dataKontak): (tulis jumlah baris dan indeks kolom yang Anda lihat).

### F.5-F.6 Pengambilan dan pemeriksaan data
- Hasil mysqli_fetch_assoc() disimpan ke larik $dataKontak.
- Hasil var_dump: (jumlah) elemen, setiap elemen memiliki 9 indeks sesuai nama kolom.
- var_dump dikembalikan menjadi komentar setelah pemeriksaan.

## H. Ekspor Basis Data
- Database db_pwd_2622500051 diekspor melalui phpMyAdmin (Quick, SQL).
- Hasil ekspor menimpa pertemuan-11/db_pwd_2622500051.sql dan berisi CREATE TABLE serta INSERT INTO (5 baris data).

### D.7 Penutup tahap koneksi
- uji_koneksi.php dihapus; koneksi.php berisi kode akhir yang benar.

## G. Menampilkan Data dari Basis Data
- Uji tabel kosong: tabel dikosongkan dengan TRUNCATE; tampil "Belum ada data kontak yang tersimpan."
- Data dikembalikan lewat perintah INSERT di tab SQL; kelima data tampil kembali.