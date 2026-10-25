# Pertemuan 6 (P6) - PHP Dasar dan Pemrograman Sisi Peladen

Mata Kuliah: Pemrograman Web Dasar (IS205) | Semester Gasal 2026/2027
Nama / NIM: Serin Ariestia Rafka / 2622500051

## Cara Menjalankan
1. Buka Laragon, klik **Mulai Semua** (Start All), pastikan Apache dan MySQL berstatus "mulai".
2. Proyek berada di document root: `C:\laragon\www\2622500051-PWD-SI1J-2526O\`
3. Buka `http://localhost/2622500051-PWD-SI1J-2526O/pertemuan-06/`

## Kondisi Awal (B.1 - B.4)
- Berkas P5 yang disalin: index.html (diubah menjadi index.php), style.css, script.js, img/foto-profil.jpg
- Lokasi proyek: `C:\laragon\www\2622500051-PWD-SI1J-2526O\pertemuan-06`
- Layanan berjalan: Apache httpd-2.4.54 (port 80) dan MySQL 8.0.30 (port 3306), keduanya berstatus "mulai"
- index.html diubah menjadi index.php: sudah (di folder pertemuan-06 hanya ada index.php, tidak ada index.html)
- Alamat akses: `http://localhost/2622500051-PWD-SI1J-2526O/pertemuan-06/`
- Hasil: halaman profil berhasil tampil melalui localhost.

## Log Pengujian per Tahap

| Tahap | Kode / perubahan | Hasil aktual | Commit |
|---|---|---|---|
| C.1-C.4 Tag PHP, komentar, echo/print, HTML statis vs PHP | potongan uji sementara | [ISI: dikerjakan atau tidak; tulis hasil yang benar-benar dilihat] | - |
| D.1 Variabel | $nim = "2622500051", $namaMahasiswa = "Serin Ariestia Rafka", $programStudi = "SI", $tahunAkademik = "2026/2027", $semester = 2, $ipk = 3.75, $statusAktif = true, $catatanTambahan = null | Halaman tampil tanpa galat PHP | [ISI] |
| D.2 Konstanta | NAMA_MATA_KULIAH, PROFIL_GITHUB | Halaman tampil tanpa galat PHP | [ISI] |
| D.4 Tampil variabel/konstanta | paragraf Selamat Datang | Tampil: "Halo, saya Serin Ariestia Rafka. Saya sedang mempelajari mata kuliah Pemrograman Web Dasar pada tahun akademik 2026/2027." Tautan GitHub: [ISI SETELAH DIKLIK] | [ISI] |
| E.1 Aritmetika | $sisaSemester = $batasSemester - $semester | Tampil "Sisa semester hingga batas: 6" | [ISI] |
| E.2-E.3 Perbandingan & logika | $semesterValid, $statusSemester | Dengan semester 2: "Sesuai rentang". Uji semester 9: [ISI SETELAH DIUJI] | [ISI] |
| F.1 if-elseif-else | $keteranganSemester | Semester 2: "Semester: 2 (Semester awal)". Uji 4 dan 7: [ISI SETELAH DIUJI] | [ISI] |
| F.2 Ternary | $namaProdi, status aktif | Tampil "Program Studi: Sistem Informasi (SI)" dan "Status mahasiswa: Aktif". Uji TI/false: [ISI SETELAH DIUJI] | [ISI] |
| F.3 switch | $fokusProgramStudi | Tampil "Fokus program studi: Sistem informasi dan proses bisnis". Uji TI dan MI: [ISI SETELAH DIUJI] | [ISI] |
| G.1 for | 5 target belajar | Tampil 5 butir, dari "Target belajar ke-1: Memahami sintaks dasar PHP." sampai "ke-5: Belum dipetakan" | [ISI] |
| G.2 while | Semester 1-3 | Tampil Semester 1, Semester 2, Semester 3 | [ISI] |
| H.1 number_format | IPK | Tampil "IPK: 3,75" | [ISI] |
| H.2 NULL | `=== null` | Tampil "Catatan tambahan: Belum ada". Uji dengan teks: [ISI SETELAH DIUJI] | [ISI] |
| H.3 date() | footer tahun dinamis | [ISI SETELAH DILIHAT DI FOOTER] | [ISI] |
| H.4 `<?= ?>` | tautan GitHub, footer | [ISI SETELAH DIUJI] | [ISI] |
| I. action formulir | `action="index.php"` | [ISI SETELAH DIPERIKSA] | [ISI] |

## Galat yang Ditemukan dan Perbaikannya
1. **ERR_CONNECTION_REFUSED** di Chrome: Apache belum berjalan. Diperbaiki dengan klik "Mulai Semua" di Laragon; setelah itu halaman dapat dibuka.
2. **Halaman masih tampil versi P5**: alamat memakai `/pwd/` sehingga membuka salinan lama. Diperbaiki dengan memakai alamat `http://localhost/2622500051-PWD-SI1J-2526O/pertemuan-06/`.
3. **Foto profil tidak tampil**: atribut `src` tertulis `img/foto-profil.jpeg` padahal berkas bernama `foto-profil.jpg`. Diperbaiki menjadi `img/foto-profil.jpg`; foto kemudian tampil.

## Pengujian Hasil Akhir
- Seluruh keluaran PHP, percabangan, dan perulangan diperiksa di localhost: [ISI: sudah / belum]
- Hasil: [ISI SETELAH PENGUJIAN AKHIR]

## Repositori GitHub
URL: https://github.com/2622500051-a11y/2622500051-PWD-SI1J-2526O# pertemuan-06
