# P5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien

## Deskripsi

Dokumentasi pengembangan halaman web pada P5, meliputi JavaScript, DOM, event listener, interaksi navigasi, dan validasi formulir sisi klien.

Pengembangan dilanjutkan dari artefak P4 (baseline) pada direktori `pertemuan-05/`. Cara menjalankan: buka `pertemuan-05/index.html` menggunakan peramban.

Struktur berkas:

```
pertemuan-05/
├── img/
│   └── foto-profil.jpg
├── index.html
├── script.js
├── style.css
└── README.md
```

## Fitur dan Pengembangan

- **Penyiapan baseline P5**: Menyalin `index.html`, `style.css`, dan `img/foto-profil.jpg` dari artefak P4 ke `pertemuan-05/` tanpa mengubah artefak P4. Belum ada JavaScript pada tahap ini.
- **Penghubungan JavaScript eksternal**: Membuat `script.js` dan menghubungkannya ke `index.html` dengan `<script src="script.js"></script>` di akhir `<body>`.
- **Tombol navigasi responsif**: Menambahkan tombol `#navToggle` (ikon hamburger) dengan atribut `aria-label`, `aria-controls`, dan `aria-expanded` pada `index.html`, serta aturan CSS `#navMenu`, `.nav-open`, dan `.nav-toggle` pada `style.css`.
- **Event listener navigasi**: Event `click` pada `navToggle` memanggil `navMenu.classList.toggle("nav-open")`, lalu memperbarui `aria-expanded` dan `aria-label` ("Buka navigasi" / "Tutup navigasi") sesuai status menu.
- **Penanganan event submit**: Event `submit` pada `contactForm` dengan `event.preventDefault()` agar pengiriman bawaan peramban dicegah dan validasi JavaScript dijalankan lebih dulu.
- **Validasi formulir sisi klien**: Memeriksa berurutan nama (3–50 karakter), email (pola regex), semester (angka 1–14), tanggal kunjungan, jenis pesan (radio), topik (minimal satu checkbox), program studi (select), dan pesan (tidak kosong, maksimal 300 karakter).
- **Umpan balik pengguna**: Pesan ditampilkan pada `#formFeedback` dengan class `form-feedback-error` (gagal) atau `form-feedback-success` (berhasil: "Form berhasil divalidasi.").
- **Penghapusan umpan balik**: Event `input` dan `reset` pada formulir mengosongkan `formFeedback.textContent`.
- **Batasan hasil**: Pesan "Form berhasil divalidasi." hanya menunjukkan seluruh aturan validasi JavaScript terpenuhi; data belum dikirim ke peladen atau disimpan ke basis data (menjadi materi P6).

## Pengujian

Catatan: kolom hasil aktual dan status diisi setelah pengujian benar-benar dijalankan di peramban dan DevTools.

### Interaksi navigasi (lebar layar kecil / mode perangkat DevTools)

- **Keadaan awal**: Buka `index.html`, perkecil lebar peramban. Diharapkan: tombol navigasi tampil dan menu tertutup. Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Buka menu**: Klik tombol navigasi sekali. Diharapkan: menu muncul, `aria-expanded="true"`, `aria-label="Tutup navigasi"`. Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Tutup menu**: Klik tombol navigasi lagi. Diharapkan: menu tertutup, `aria-expanded="false"`, `aria-label="Buka navigasi"`. Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Tampilan desktop (≥ 768px)**: Diharapkan: menu tampil horizontal dan tombol navigasi tersembunyi sesuai CSS. Hasil aktual: [isi]. Status: [Berhasil/Gagal].

### Validasi formulir (masukan lain diisi valid, hanya satu kondisi diubah)

- **Nama terlalu pendek** (`Al`): Diharapkan pesan "Nama lengkap harus diisi 3 sampai 50 karakter." Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Format email tidak sesuai** (`a@s`): Diharapkan pesan "Masukkan alamat email yang valid." Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Semester kosong**: Diharapkan pesan "Semester harus diisi dengan angka 1 sampai 14." Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Semester di luar rentang** (`0` dan `15`): Diharapkan pesan validasi semester yang sama. Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Tanggal kosong**: Diharapkan pesan "Tanggal kunjungan harus diisi." Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Jenis pesan belum dipilih**: Diharapkan pesan "Pilih jenis pesan." Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Topik belum dipilih**: Diharapkan pesan "Pilih minimal satu topik yang diminati." Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Program studi belum dipilih**: Diharapkan pesan "Pilih program studi." Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Pesan kosong**: Diharapkan pesan "Pesan harus diisi." Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Batas panjang pesan**: Isi 300 karakter lalu kirim, kemudian ketik karakter tambahan. Diharapkan: antarmuka membatasi masukan pada 300 karakter karena `maxlength="300"`. Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Seluruh data valid**: Diharapkan pesan "Form berhasil divalidasi." Hasil aktual: [isi]. Status: [Berhasil/Gagal].

### Umpan balik

- **Pesan gagal hilang saat input berubah**: Kirim dengan satu masukan tidak valid, lalu ubah satu masukan. Diharapkan: pesan lama terhapus. Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Pesan hilang saat reset**: Munculkan pesan gagal, klik "Batal". Diharapkan: pesan terhapus. Hasil aktual: [isi]. Status: [Berhasil/Gagal].
- **Pesan sukses**: Isi semua data valid lalu kirim. Diharapkan: "Form berhasil divalidasi." tampil dan tidak ada klaim data tersimpan di peladen/basis data. Hasil aktual: [isi]. Status: [Berhasil/Gagal].

### Debugging dan regresi (DevTools)

- **Console**: Periksa panel Console selama pengujian. Diharapkan: tidak ada galat JavaScript. Hasil aktual: [isi].
- **Masalah yang ditemukan dan perbaikan** (jika ada): [gejala, panel DevTools yang dipakai, penyebab terverifikasi, perubahan kode, hasil pengujian ulang]. Jika tidak ada masalah: tulis "Tidak ditemukan masalah".

## Riwayat Pengembangan

Catat perkembangan melalui commit Git yang bermakna.

- **Siapkan baseline P5 dari artefak P4**: Menyalin `index.html`, `style.css`, dan `img/foto-profil.jpg` ke `pertemuan-05/` dan memverifikasi baseline; halaman tampil sesuai P4.
- **Hubungkan JavaScript eksternal ke HTML**: Menambahkan `script.js` dan tag `<script src="script.js">`; hubungan berkas diperiksa melalui peramban dan Console.
- **Tambah tombol navigasi responsif**: Menambahkan tombol `navToggle` dan aturan CSS menu responsif; tampilan diperiksa pada lebar layar kecil dan desktop.
- **Tambahkan event listener pada tombol navigasi**: Menambahkan event `click` dan `classList.toggle` pada menu; menu dapat dibuka dan ditutup.
- **Tambahkan penanganan event submit**: Menambahkan listener `submit` pada formulir; diuji dengan mengirim formulir.
- **Tambahkan penanganan event input**: Menambahkan listener `input` untuk menghapus umpan balik saat masukan berubah.
- **Tambahkan penanganan event reset**: Menambahkan listener `reset` untuk menghapus umpan balik saat formulir di-reset.
- **Terapkan pengendalian submit formulir**: Menambahkan `event.preventDefault()` serta validasi nama, email, semester, tanggal, jenis pesan, topik, program studi, dan pesan beserta umpan balik.
- **Uji dan perbaiki interaksi navigasi**: Pengujian navigasi (aria-expanded, aria-label, tampilan responsif) dan perbaikan bila ditemukan galat.
- **Perbaiki validasi formulir**: Perbaikan aturan atau pesan validasi berdasarkan hasil pengujian.
- **Selesaikan pengujian dan perbaikan P5**: Pengujian ulang dan regresi navigasi, validasi, dan umpan balik; README diperbarui sesuai hasil aktual.