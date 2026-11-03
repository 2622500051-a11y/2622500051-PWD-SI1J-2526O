# pertemuan-08# Pertemuan 08 - UTS Pemrograman Web Dasar

Website blog pribadi **Rafka Laut**, tempat berbagi cerita dan pengalaman seputar kuliner favorit, terutama **ikan bakar**. Proyek ini dibuat sebagai tugas UTS mata kuliah Pemrograman Web Dasar (Pertemuan 8).

## Identitas

| | |
|---|---|
| Nama | Serin Ariestia Rafka |
| NIM | 2622500051 |
| Program Studi | Sistem Informasi |
| Kelas | SI1J |
| Kampus | Institut Sains dan Bisnis Atma Luhur |
| GitHub | [2622500051-a11y](https://github.com/2622500051-a11y/2622500051-PWD-SI1J-2526O) |
| Email | 2622500051@mahasiswa.atmaluhur.ac.id |

## Halaman

| File | Isi |
|---|---|
| `index.html` | Beranda: hobi kuliner, foto ikan bakar, tabel ikan bakar yang pernah dicoba (kakap, bawal, kembung, gurame), dan tips memilih ikan segar. |
| `index.php` | Versi PHP dari Beranda. Tampilan dan isinya sama dengan `index.html`, tetapi data (menu, tabel ikan, tips) disimpan di array PHP dan ditampilkan dengan perulangan `foreach`. Harga diformat otomatis dengan `number_format()`. |
| `profile.html` | Profil pemilik blog: foto, nama, NIM, program studi, kelas, TTL, alamat, GitHub, email, hobi, dan makanan favorit. |
| `pendaftaran.html` | Formulir pendaftaran Komunitas Pecinta Ikan Bakar (hunting ikan bakar bareng tiap akhir pekan). |

## Fitur

- Tata letak satu halaman dengan header, navigasi samping, konten utama, dan footer.
- Navigasi menandai halaman aktif.
- Desain responsif: di layar lebar (maks. 720px) navigasi berpindah ke atas.
- Foto profil di header dengan animasi denyut (dimatikan otomatis untuk pengguna yang memilih `prefers-reduced-motion`).
- Formulir pendaftaran dengan validasi di sisi klien (`script.js`):

  | Kolom | Aturan |
  |---|---|
  | Nama lengkap | Minimal 3 karakter |
  | Email | Format email valid |
  | Nomor HP | Diawali `08` dan terdiri dari 10-13 digit |
  | Jenis kelamin | Wajib dipilih |
  | Ikan favorit | Wajib dipilih |
  | Sambal kesukaan | Opsional (bisa pilih lebih dari satu) |
  | Pesan | Opsional |

- Jika data valid, ringkasan pendaftaran tampil di bawah formulir. Isinya dimasukkan memakai `textContent` agar aman dari karakter HTML.
- Tombol **Reset** mengosongkan formulir beserta pesan galat dan hasil.

## Struktur Folder

```
.
├── img/
│   ├── foto-profil.jpg
│   └── ikan-bakar.jpg
├── index.html
├── index.php
├── pendaftaran.html
├── profile.html
├── script.js
├── style.css
├── .gitkeep
└── README.md
```

## Teknologi

- HTML5
- CSS3 (flexbox, CSS variables, media query, animasi `@keyframes`)
- JavaScript (vanilla, DOM dan event handling)
- PHP (untuk `index.php`)
- Google Fonts: Bitter dan Nunito Sans (butuh koneksi internet, ada font cadangan Georgia dan Arial)

## Cara Menjalankan

**Halaman HTML:** buka `index.html` langsung di browser.

**Halaman PHP:** `index.php` harus dijalankan lewat server PHP, tidak bisa dibuka langsung seperti file HTML.

- Dengan PHP bawaan, jalankan di folder proyek:

  ```bash
  php -S localhost:8000
  ```

  lalu buka `http://localhost:8000/index.php`.
- Atau taruh folder proyek di `htdocs` (XAMPP) / `www` (Laragon), lalu buka `http://localhost/<nama-folder>/index.php`.

## Catatan

- Navigasi di `index.php` mengarah ke `index.php` untuk Beranda, sedangkan halaman lain tetap memakai `profile.html` dan `pendaftaran.html`.
- Formulir pendaftaran belum terhubung ke server atau database; data hanya ditampilkan kembali di halaman.
- Foto dan data pada proyek ini hanya untuk keperluan tugas kuliah.