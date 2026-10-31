# Pertemuan 7 - Pemrosesan Formulir dengan PHP, Validasi Sisi Peladen, dan PRG

- Mata Kuliah : Pemrograman Web Dasar (IS205)
- Nama / NIM  : Serin Ariestia Rafka / 2622500051
- Repositori  : https://github.com/2622500051-a11y/2622500051-PWD-SI1J-2526O

> Hasil pada dokumen ini dicatat sesuai pengujian yang dilakukan.

## Cara Menjalankan

1. Buka Laragon, klik **Start All**, pastikan Apache berjalan.
2. Document Root Laragon diarahkan ke `C:\Users\Hype AMD\Documents`.
3. Buka `http://localhost/2622500051-PWD-SI1J-2526O/pertemuan-07/`
4. Demonstrasi GET: `http://localhost/2622500051-PWD-SI1J-2526O/pertemuan-07/indexGet.php`

## Struktur Berkas

```
pertemuan-07/
├── index.php        (formulir utama: POST, validasi, keluaran aman)
├── indexGet.php     (artefak demonstrasi GET)
├── style.css
├── script.js
├── README.md
└── img/foto-profil.jpg
```

---

## B. Persiapan Pengembangan

### B.1 - B.2 Baseline P6 dan Lingkungan PHP

- Artefak P6 (`index.php`, `style.css`, `script.js`, `img/`) disalin ke `pertemuan-07/`.
- Proyek dijalankan lewat Laragon. Karena proyek berada di folder Documents, Document Root Laragon diubah ke `C:\Users\Hype AMD\Documents`, sehingga URL tidak memakai awalan `pwd/`.
- Hasil: halaman Profil Mahasiswa tampil di `http://localhost/2622500051-PWD-SI1J-2526O/pertemuan-07/` dengan tampilan, navigasi, dan foto profil berfungsi.

### B.3 Persiapan Formulir

- Formulir awal: `id="contactForm" action="index.php" method="get" novalidate`.
- `script.js` menangani event `submit` dengan `event.preventDefault()`.

## C.3 Menerima Data GET (`$_GET`)

Perubahan: menambahkan blok `isset($_GET['nama'])` di bagian atas `index.php`, dengan keluaran diamankan `htmlspecialchars()`.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | `?nama=Andi` | (isi hasil uji) |
| 2 | `?nama=Budi%20Anduk` | (isi hasil uji) |
| 3 | Tanpa parameter `nama` | (isi hasil uji) |
| 4 | Parameter `nama` dari formulir terbaca | Halaman menampilkan "Nama yang diterima: Serin Ariestia Rafka" |

## C.4 Pengiriman Formulir dengan GET

Perubahan: menambahkan `contactForm.submit();` di dalam handler `submit` pada `script.js`, setelah validasi berhasil.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Isi seluruh kolom dengan data valid lalu klik Kirim | URL berisi parameter (`?nama=Serin+Ariestia+Rafka&email=...&semester=1&tanggal=...`) dan halaman menampilkan "Nama yang diterima: Serin Ariestia Rafka" |
| 2 | Kosongkan atau isi tidak valid salah satu kolom wajib | (isi hasil uji) |

Catatan: pesan "Form berhasil divalidasi." tidak sempat terlihat karena halaman langsung dimuat ulang setelah formulir dikirim. Pada tahap ini PHP hanya membaca parameter `nama`.

## E.1 Artefak Demonstrasi GET (`indexGet.php`)

- Perubahan: `index.php` disalin menjadi `indexGet.php`, atribut diubah menjadi `action="indexGet.php" method="get"`, kode `$_GET` dipertahankan.
- Pengujian `.../pertemuan-07/indexGet.php` (kirim formulir, parameter muncul di URL): (isi hasil uji)

## E.2 Formulir Utama Menjadi POST

- Perubahan: `method="get"` diubah menjadi `method="post"` pada `index.php`.
- Pengujian: kode sumber (CTRL+U) menunjukkan `<form id="contactForm" action="index.php" method="post" novalidate>`.
- Catatan: setelah perubahan, tulisan "Nama yang diterima" belum muncul karena kode PHP masih membaca `$_GET`. Diperbaiki pada E.3.

## E.3 Menerima Data POST (`$_POST`)

- Perubahan: `$_GET['nama']` diganti `$_POST['nama']` pada blok PHP di atas `index.php`.
- Pengujian: formulir dikirim dengan data valid, halaman menampilkan "Nama yang diterima: Serin Ariestia Rafka" dan URL tidak berisi parameter.

## E.4 Membaca Berbagai Jenis Input

- Perubahan:
  - Membaca `email`, `semester`, `tanggal`, `jenis_pesan`, `prodi`, `pesan` dengan `?? ''`, dan `minat` dengan `?? []`. Pembacaan diletakkan di luar blok `if` agar variabel selalu terbentuk.
  - Checkbox pada `index.php` diubah menjadi `name="minat[]"`. `indexGet.php` tetap `name="minat"`.
  - Selector `script.js` diperbarui menjadi `input[name="minat"]:checked, input[name="minat[]"]:checked`.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Pilih kedua minat (HTML dan CSS) | (isi hasil uji) |
| 2 | Pilih satu minat saja | (isi hasil uji) |
| 3 | Tanpa minat, pesan validasi muncul | (isi hasil uji) |
| 4 | `indexGet.php` dengan dan tanpa minat | (isi hasil uji) |

## F. Validasi, Normalisasi, dan Sanitasi Sisi Peladen

Perubahan pada `index.php`:

- Normalisasi dengan `trim((string) ($_POST[...] ?? ''))`, diletakkan sebelum validasi.
- Validasi kelengkapan (nama, email, semester, tanggal, jenis pesan, program studi, pesan, minat).
- Validasi format: semester dengan `filter_var(..., FILTER_VALIDATE_INT)` dan rentang 1-14, email dengan `FILTER_VALIDATE_EMAIL`.
- Validasi nilai pilihan dengan `in_array(..., true)` untuk `jenis_pesan`, `prodi`, dan `minat`.
- Keluaran diamankan dengan `htmlspecialchars($x, ENT_QUOTES, 'UTF-8')`.

### F.6 Tahap 1 - Pesan Kesalahan Validasi

Pengujian dilakukan dengan `script.js` dinonaktifkan sementara (dikomentari), lalu diaktifkan kembali.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Kirim formulir kosong | Pesan kesalahan berwarna merah muncul di bawah judul Kontak, diawali "Nama lengkap wajib diisi." |
| 2 | Semua kolom valid, email `bukan-email` | Muncul pesan "Format email tidak valid." |
| 3 | Semua kolom valid, tanpa memilih minat | Muncul pesan "Minat wajib dipilih minimal satu." |
| 4 | `script.js` diaktifkan kembali | (isi hasil uji) |

### F.6 Tahap 2 - Data yang Diterima Peladen

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Kirim data valid, bagian "Data yang Diterima Peladen" tampil di bawah formulir | (isi hasil uji) |
| 2 | Isi kolom pesan dengan `<b>Mahasiswa</b>`, tampil sebagai teks biasa (bukan huruf tebal) | (isi hasil uji) |

## G. Session dan Pola PRG

(belum dikerjakan)

## Kendala dan Perbaikan

- 404 Not Found pada localhost: folder proyek berada di luar Document Root Laragon. Diperbaiki dengan mengubah Document Root.
- Folder `mysql-8` sempat muncul di `pertemuan-07` karena Direktori Data Laragon sempat menunjuk ke folder proyek. Folder dihapus dan Direktori Data dikembalikan ke `C:\laragon\data`.
- `git push` sempat ditolak (non-fast-forward). Diselesaikan dengan `git pull --rebase origin main`.
- Perubahan `method="post"` dan `$_POST` belum terbaca di browser pada percobaan awal karena file belum tersimpan dan halaman masih memakai tampilan lama. Diperbaiki dengan menyimpan file (Ctrl+S) dan hard reload (Ctrl+Shift+R).
- Pembacaan input pada E.4 sempat berada di dalam blok `if (isset($_POST['nama']))`. Dipindahkan ke luar blok agar variabel selalu tersedia.
- Blok pesan kesalahan sempat menghapus tag `<p>` pembuka pada paragraf "Kunjungi profil GitHub saya". Diperbaiki dengan menambahkan kembali `<p>`.

## Kesimpulan

(isi di akhir setelah seluruh tahap selesai)