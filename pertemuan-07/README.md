# Pertemuan 7 - Pemrosesan Formulir dengan PHP, Validasi Sisi Peladen, dan PRG

Mata Kuliah : Pemrograman Web Dasar (IS205)
Nama / NIM  : Serin Ariestia Rafka / 2622500051
Repositori  : https://github.com/2622500051-a11y/2622500051-PWD-SI1J-2526O

> Hasil pada dokumen ini dicatat sesuai pengujian yang benar-benar dilakukan.

## Cara Menjalankan

1. Buka Laragon, klik **Start All**, pastikan Apache berjalan.
2. Document Root Laragon diarahkan ke `C:\Users\Hype AMD\Documents`.
3. Buka `http://localhost/2622500051-PWD-SI1J-2526O/pertemuan-07/`

## Struktur Berkas

```
pertemuan-07/
├── index.php
├── indexGet.php
├── style.css
├── script.js
├── README.md
└── img/foto-profil.jpg
```

---

## B.1 - B.2 Baseline P6 dan Lingkungan PHP

- Artefak P6 (`index.php`, `style.css`, `script.js`, `img/`) disalin ke `pertemuan-07/`.
- Proyek dijalankan lewat Laragon. Karena proyek berada di folder Documents, Document Root Laragon diubah ke `C:\Users\Hype AMD\Documents`, sehingga URL tidak memakai awalan `pwd/`.
- Hasil: halaman Profil Mahasiswa tampil di `http://localhost/2622500051-PWD-SI1J-2526O/pertemuan-07/` dengan tampilan, navigasi, dan foto profil berfungsi.
- Kendala: awalnya muncul 404 Not Found karena folder proyek berada di luar `C:\laragon\www`. Diperbaiki dengan mengubah Document Root Laragon.

## B.3 Persiapan Formulir

- Formulir awal memakai `id="contactForm" action="index.php" method="get" novalidate`.
- `script.js` menangani event `submit` dengan `event.preventDefault()`.

## C.3 Menerima Data GET (`$_GET`)

Perubahan: menambahkan blok `isset($_GET['nama'])` di bagian atas `index.php`, dengan keluaran diamankan `htmlspecialchars()`.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | `?nama=Andi` | (isi hasil uji) |
| 2 | `?nama=Budi%20Anduk` | (isi hasil uji) |
| 3 | Tanpa parameter `nama` | (isi hasil uji) |

## C.4 Pengiriman Formulir dengan GET

Perubahan: menambahkan `contactForm.submit();` di dalam handler `submit` pada `script.js`, setelah validasi berhasil.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Isi seluruh kolom dengan data valid lalu klik Kirim | URL berisi parameter (`?nama=Serin+Ariestia+Rafka&email=...&semester=1&tanggal=...`) dan halaman menampilkan "Nama yang diterima: Serin Ariestia Rafka" |
| 2 | Kosongkan atau isi tidak valid salah satu kolom wajib | (isi hasil uji) |

Catatan: pesan "Form berhasil divalidasi." tidak sempat terlihat karena halaman langsung dimuat ulang setelah formulir dikirim. Hanya parameter `nama` yang dibaca PHP pada tahap ini.

## E.1 Artefak Demonstrasi GET (`indexGet.php`)

(belum dikerjakan)

## E.2 Formulir Utama Menjadi POST

(belum dikerjakan)

## E.3 Menerima Data POST (`$_POST`)

(belum dikerjakan)

## E.4 Membaca Berbagai Jenis Input

(belum dikerjakan)

## F. Validasi, Normalisasi, dan Sanitasi Sisi Peladen

(belum dikerjakan)

## G. Session dan Pola PRG

(belum dikerjakan)

## Kendala dan Perbaikan

- 404 Not Found pada localhost: lokasi proyek tidak berada di Document Root Laragon. Diperbaiki dengan mengubah Document Root.
- Folder `mysql-8` sempat muncul di dalam `pertemuan-07` karena Direktori Data Laragon sempat menunjuk ke folder proyek. Folder dihapus dan Direktori Data dikembalikan ke `C:\laragon\data`.
- `git push` ditolak (non-fast-forward). Diselesaikan dengan `git pull --rebase origin main`.

## Kesimpulan

(isi di akhir setelah seluruh tahap selesai)