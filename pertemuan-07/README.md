# pertemuan-07# Pertemuan 7 - Pemrosesan Formulir dengan PHP, Validasi Sisi Peladen, dan PRG

Mata Kuliah : Pemrograman Web Dasar (IS205)
Repositori  : https://github.com/2622500051-a11y/2622500051-PWD-SI1J-2526O
Direktori   : `pertemuan-07/`

> Catatan: kolom **Hasil** diisi sesuai pengujian yang benar-benar dilakukan.
> Jangan menulis "berhasil" jika belum diuji.

## Cara Menjalankan

1. Buka Laragon, klik **Start All**, pastikan Apache berjalan.
2. Pastikan folder proyek berada di `C:\laragon\www\`.
3. Buka `http://localhost/pwd/2622500051-PWD-SI1J-2526O/pertemuan-07/`
   (sesuaikan dengan nama folder pada komputer sendiri).

## Struktur Berkas

```
pertemuan-07/
├── index.php        (formulir utama, POST + validasi + session + PRG)
├── indexGet.php     (artefak demonstrasi GET)
├── style.css
├── script.js
├── README.md
└── img/
    └── foto-profil.jpg
```

---

## B.1 Verifikasi Baseline P6

- Kondisi awal: artefak P6 (`index.php`, `style.css`, `script.js`, `img/`) disalin ke `pertemuan-07/`.
- Pemeriksaan: (isi hasil pemeriksaan, mis. berkas lengkap, halaman tampil, navigasi dan gambar profil berfungsi)
- Hasil: ...
- Commit: `menyalin artefak pertemuan-06 ke pertemuan-07 untuk digunakan sebagai baseline`

## B.2 Persiapan Lingkungan PHP

- Lokasi proyek: `C:\laragon\www\pwd\2622500051-PWD-SI1J-2526O\pertemuan-07`
- URL pengujian: `http://localhost/pwd/2622500051-PWD-SI1J-2526O/pertemuan-07/`
- Hasil dibandingkan dengan pertemuan-06: ...
- Commit: `menguji ...pertemuan-07/ dengan hasil sama dengan ...pertemuan-06/`

## B.3 Persiapan Formulir

- Atribut formulir awal: `id="contactForm" action="index.php" method="get" novalidate`
- Penanganan event `submit` di `script.js` memakai `event.preventDefault()`: (ya/tidak, sesuai temuan)
- Hasil: ...

## C.3 Menerima Data GET (`$_GET`)

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | `?nama=Andi` | ... |
| 2 | `?nama=Budi%20Anduk` | ... |
| 3 | Tanpa parameter `nama` (tidak ada peringatan) | ... |

- Commit: `mempelajari penggunaan parameter GET`

## C.4 Pengiriman Formulir dengan GET

- Perubahan: menambahkan `contactForm.submit();` pada `script.js` setelah validasi berhasil.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Isi data valid lalu klik Kirim, parameter muncul di URL | ... |
| 2 | Kosongkan kolom wajib, pesan validasi muncul dan formulir tidak terkirim | ... |

- Commit: `mempraktikkan pengiriman formulir GET`

## E.1 Artefak Demonstrasi GET (`indexGet.php`)

- Perubahan: salinan `index.php` disimpan sebagai `indexGet.php`, `action="indexGet.php"`, `method="get"`.
- Pengujian `.../pertemuan-07/indexGet.php`: ...
- Commit: `menyimpan demonstrasi formulir GET`

## E.2 Formulir Utama Menjadi POST

- Perubahan: `method="get"` diubah menjadi `method="post"` pada `index.php`.
- Pengujian (CTRL+U menunjukkan `method="post"`, tampilan tetap normal): ...
- Commit: `mengubah formulir utama menjadi POST`

## E.3 Menerima Data POST (`$_POST`)

- Perubahan: `$_GET['nama']` diganti `$_POST['nama']`.
- Pengujian (nama tampil, tidak ada parameter di URL): ...
- Commit: `menerima data formulir menggunakan POST`

## E.4 Membaca Berbagai Jenis Input

- Perubahan:
  - Membaca `email`, `semester`, `tanggal`, `jenis_pesan`, `prodi`, `pesan` dengan `?? ''`.
  - Checkbox diubah menjadi `name="minat[]"`, dibaca dengan `$_POST['minat'] ?? []`.
  - Selector `script.js` diperbarui agar mendukung `minat` dan `minat[]`.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Pilih kedua minat (HTML dan CSS) | ... |
| 2 | Pilih satu minat saja | ... |
| 3 | Tanpa minat, pesan validasi muncul | ... |
| 4 | `indexGet.php` dengan dan tanpa minat | ... |

- Commit: `menyesuaikan pembacaan input dan validasi formulir`

## F. Validasi, Normalisasi, dan Sanitasi Sisi Peladen

- Perubahan:
  - Normalisasi dengan `trim((string) ...)` (diletakkan sebelum validasi).
  - Validasi kelengkapan (F.2), format semester 1-14 dan email (F.3), serta nilai pilihan `jenis_pesan`, `prodi`, `minat` (F.4).
  - Output diamankan dengan `htmlspecialchars($x, ENT_QUOTES, 'UTF-8')` (F.6).

### F.6 Tahap 1 - Pesan Kesalahan Validasi

- Pengujian dilakukan dengan `script.js` dinonaktifkan sementara, lalu diaktifkan kembali.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Kirim formulir kosong | ... |
| 2 | Email `bukan-email` | ... |
| 3 | Tanpa memilih minat | ... |
| 4 | `script.js` sudah diaktifkan kembali | ... |

- Commit: `menampilkan pesan kesalahan validasi PHP`

### F.6 Tahap 2 - Data yang Diterima Peladen

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Kirim data valid, bagian "Data yang Diterima Peladen" tampil | ... |
| 2 | Masukkan `<b>Mahasiswa</b>` pada pesan, tampil sebagai teks biasa | ... |

- Commit: `mengamankan keluaran data formulir`

## G. Session dan Pola PRG

- Perubahan:
  - `session_start();` di bagian paling atas `index.php`.
  - Saat POST: data dan `pesanKesalahan` disimpan ke `$_SESSION`, lalu `header('Location: index.php'); exit;`.
  - Setelah redirect: data diambil dari `$_SESSION`, `pesanKesalahan` dihapus dengan `unset()`.
  - Kondisi tampilan hasil diubah menjadi `if (!empty($nama))`.

| No | Pengujian | Hasil |
|----|-----------|-------|
| 1 | Isi data valid lalu Kirim, halaman kembali dan data tampil | ... |
| 2 | Hard reload (CTRL+SHIFT+R), tidak ada permintaan kirim ulang formulir | ... |

- Commit: `menerapkan session dan pola PRG`

## Kendala dan Perbaikan

- (Tuliskan galat yang ditemui, penyebab, dan perbaikannya. Hapus bagian ini jika tidak ada.)

## Kesimpulan

(Ringkas hal yang dipelajari pada P7 dengan kalimat sendiri.)