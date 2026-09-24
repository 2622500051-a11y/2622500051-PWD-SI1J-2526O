# Panduan Git & GitHub — Data Sudah Terisi

**Nama:** Serin Ariestia Rafka
**NIM:** 2622500051
**Kelompok:** SI1J
**Repository Name:** `2622500051-PWD-SI1J-2526O`

Semua nilai di bawah ini mengikuti **persis** format dan ketentuan pada modul (tidak ditambah/dikurangi). Ikuti setiap panduan modul sesuai urutannya sambil menyalin nilai berikut ke tempat yang sesuai.

---

## 1. Panduan Login Akun GitHub
Ikuti langkah 1–11 pada modul menggunakan email:
`2622500051@mahasiswa.atmaluhur.ac.id`

Tidak ada nilai lain yang perlu diisi pada bagian ini.

---

## 2. Panduan Membuat Repository di GitHub

Isi form **Create a new repository** dengan:

| Field | Isi |
|---|---|
| Repository name | `2622500051-PWD-SI1J-2526O` |
| Description | `Repository Latihan Pertemuan-1 sampai dengan Pertemuan-16 Matakuliah Pemrograman Web Dasar Kelompok SI1J Tahun Ajaran 2025/2026 Semester Gasal` |
| Choose visibility | `Public` |
| Add README | `On` |
| Add .gitignore | `No .gitignore` |
| Add license | `MIT License` |

Klik **Create repository**.

URL repository (untuk clone git, tanpa `/tree/main`):
`https://GitHub.com/{username-github-kalian}/2622500051-PWD-SI1J-2526O`

---

## 3. Panduan Instalasi Git di Windows 11
Ikuti seluruh langkah modul apa adanya (tidak ada nilai yang perlu diganti pada bagian ini).

---

## 4. Panduan Clone Repository GitHub dengan VS Code
1. Salin URL repository (dari bagian 2 di atas).
2. Di VS Code: `Ctrl+Shift+P` → ketik **Git: Clone** → paste URL → Enter.
3. Pilih folder lokal tujuan clone (sesuaikan dengan lokasi laptop Anda, contoh pada modul: `C:\laragon\www\PWD\2526o\si1j`).
4. Klik **Add to Workspace** → **Yes**.

---

## 5. Panduan Membuat Directory Pertemuan serta Push Git dengan VS Code

**Langkah 1** — buka terminal VS Code (`CTRL + \``), lalu masuk ke folder repo lokal Anda, contoh:
```
cd C:\laragon\www\PWD\2526o\si1j\2622500051-PWD-SI1J-2526O
```

**Langkah 2** — buat 16 folder pertemuan otomatis:
```powershell
1..16 | ForEach-Object { New-Item -ItemType Directory -Name ("pertemuan-{0:D2}" -f $_) }
```

**Langkah 3** — tambahkan `README.md` di tiap folder pertemuan:
```powershell
1..16 | ForEach-Object {
  $folder = "pertemuan-{0:D2}" -f $_
  New-Item -Path "$folder\README.md" -ItemType File -Value "# $folder"
}
```

Tambahkan juga `.gitkeep` di tiap folder pertemuan:
```powershell
1..16 | ForEach-Object {
  $directory = "pertemuan-{0:D2}" -f $_
  New-Item -Path "$directory\.gitkeep" -ItemType File
}
```

**Langkah 4** — cek status, lalu add, commit, push:
```
git status
git add .
git commit -m "Menambahkan directory pertemuan-01 sampai pertemuan-16"
```

Jika muncul error *"Please tell me who you are"*, jalankan (ganti dengan nama & email GitHub Anda sendiri):
```
git config --global user.name "Serin Ariestia Rafka"
git config --global user.email "2622500051@mahasiswa.atmaluhur.ac.id"
```
Lalu ulangi perintah `git commit -m "..."` di atas.

Terakhir:
```
git push origin main
```
Ikuti proses login browser (Sign in with your browser → Authorize → Verify via email) sesuai modul.

---

## 6. Panduan Upload File Gambar (Push Git) & Menggunakan Gambar di README.md

1. Copy file `logoisbal.png` dari folder Bahan Ajar ke root directory repo lokal Anda.
2. Terminal:
```
git add logoisbal.png
```
3. Edit `README.md` di root repo menjadi:

```markdown
# 2622500051-PWD-SI1J-2526O
Repository Latihan Pertemuan-1 sampai dengan Pertemuan-16<br>
Matakuliah Pemrograman Web Dasar<br>
Kelompok SI1J<br>
Tahun Ajaran 2025/2026
Semester Gasal<br><br>
![Logo ISBAL](logoisbal.png)
```

4. Simpan (`CTRL+S`), lalu di terminal:
```
git add .
git commit -m "upload logo, modifikasi file README.md dan markdown gambar"
git push origin main
```

---

## 7. Panduan Build dan Deploy (Page)

**Langkah A — buat `index.html` di setiap directory** (root dan tiap `pertemuan-01` s.d. `pertemuan-16`), wajib lewat terminal VS Code sesuai catatan modul. Contoh isi minimal `index.html` sesuai modul (langkah Pull, bagian 3):

```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dasar HTML5</title>
</head>
<body>
  <h1>Hello World</h1>
  <p>Ini contoh penulisan halaman HTML5 minimalis tanpa header/main/footer.</p>
</body>
</html>
```

Setelah dibuat, lakukan `git add .` → `git commit -m "..."` → `git push origin main` seperti biasa.

**Langkah B — aktifkan GitHub Pages:**
1. Buka halaman repository → **Settings** → **Pages**.
2. Branch: ganti dari `None` ke `main`.
3. Directory: `/ (root)` → **Save**.
4. Custom domain (isi "seadanya" sesuai catatan modul): `2622500051-si1j`
5. Klik **Save**.
6. Klik **Visit site** untuk melihat hasil publish.

URL yang akan muncul (formatnya):
`https://{username-github-kalian}.github.io/2622500051-PWD-SI1J-2526O/`

**Langkah C — submit ke e-learning:**
1. Copy URL di atas.
2. Buka `elearning.atmaluhur.ac.id` → tugas **Publish GitHub Pages**.
3. **Add Submission** → paste URL → **Save changes**.

---

## 8. Panduan Pull

Dipakai saat Anda mengedit file langsung di GitHub (web) dan perlu menariknya ke repo lokal.

1. Buka repo di GitHub → klik `index.html` → klik ikon pensil (**Edit this file**).
2. Edit isi sesuai kebutuhan → **Commit changes...** → isi Commit message & Extended description → **Commit changes**.
3. Di VS Code, terminal:
```
git branch --show-current
```
Pastikan hasilnya `main`.

4. Tarik perubahan dari GitHub ke lokal:
```
git pull origin main
```

---

*Semua nilai di atas mengikuti format dan ketentuan pada "Modul GitHub untuk Pemrograman Web Dasar v.1.1" tanpa penambahan atau pengurangan.*
