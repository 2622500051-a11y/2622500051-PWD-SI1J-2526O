<?php
/**
 * index.php - Halaman Beranda "Rafka Laut"
 * UTS Pemrograman Web Dasar - Pertemuan 8
 *
 * Isi dan tampilan sama dengan index.html, hanya saja data
 * (identitas blog, tabel ikan bakar, tips) disimpan di array PHP
 * lalu dirender dengan perulangan. Memakai style.css dan folder img/ yang sama.
 */

// ---------- DATA ----------
$namaBlog   = "Rafka Laut";
$namaPemilik = "Serin Ariestia Rafka";
$tagline    = "Berbagi cerita dan pengalaman seputar kuliner favorit";
$halamanAktif = "index.php";

$footer = "©2622500051_Serin Ariestia Rafka_SI1J_ UTS Pemrograman Web Dasar";

$menu = [
    ["label" => "Beranda",     "url" => "index.php"],
    ["label" => "Profile",     "url" => "profile.html"],
    ["label" => "Pendaftaran", "url" => "pendaftaran.html"],
];

$judulHobi = "Hobi Saya: menikmati kulineran dan jalan jalan";
$gambar    = [
    "src"     => "img/ikan-bakar.jpg",
    "alt"     => "Ikan bakar dengan sambal dan lalapan",
    "caption" => "Ikan bakar dengan sambal dabu-dabu, tahu, tempe, dan lalapan, favorit saya akhir pekan lalu.",
];

$paragraf = [
    "Setiap akhir pekan saya keliling mencari warung ikan bakar yang baru. Bagi saya, ikan bakar yang enak ditentukan tiga hal: ikannya segar, arangnya pas, dan sambalnya berani.",
    "Di blog ini saya mencatat tempat yang sudah saya coba, bumbu yang cocok, dan tips memilih ikan agar tidak salah beli.",
];

$daftarIkan = [
    ["jenis" => "Kakap",   "bumbu" => "Kecap manis, bawang putih", "sambal" => "Dabu-dabu",    "harga" => 60000],
    ["jenis" => "Bawal",   "bumbu" => "Bumbu kuning",              "sambal" => "Sambal terasi", "harga" => 45000],
    ["jenis" => "Kembung", "bumbu" => "Garam, jeruk nipis",        "sambal" => "Sambal matah",  "harga" => 25000],
    ["jenis" => "Gurame",  "bumbu" => "Kecap pedas",               "sambal" => "Sambal kecap",  "harga" => 80000],
];

$tips = [
    "Mata jernih dan menonjol.",
    "Insang berwarna merah cerah.",
    "Daging kenyal saat ditekan dan tidak berbau amis tajam.",
];

// ---------- HELPER ----------
function e(string $teks): string
{
    return htmlspecialchars($teks, ENT_QUOTES, "UTF-8");
}

function rupiah(int $angka): string
{
    return "Rp" . number_format($angka, 0, ",", ".");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda | <?= e($namaBlog) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@600;700&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrap">
    <header>
      <img class="logo" src="img/foto-profil.jpg" alt="Foto <?= e($namaPemilik) ?>">
      <div>
        <h1><?= e($namaBlog) ?></h1>
        <p><?= e($tagline) ?></p>
      </div>
    </header>
    <div class="tengah">
      <nav>
        <ul>
          <?php foreach ($menu as $item): ?>
          <li><a href="<?= e($item["url"]) ?>"<?= $item["url"] === $halamanAktif ? ' class="aktif"' : "" ?>><?= e($item["label"]) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <main>
        <h2><?= e($judulHobi) ?></h2>
        <figure>
          <img src="<?= e($gambar["src"]) ?>" alt="<?= e($gambar["alt"]) ?>">
          <figcaption><?= e($gambar["caption"]) ?></figcaption>
        </figure>
        <?php foreach ($paragraf as $p): ?>
        <p><?= e($p) ?></p>
        <?php endforeach; ?>

        <h3>Ikan Bakar yang Pernah Saya Coba</h3>
        <table>
          <thead>
            <tr><th>Jenis Ikan</th><th>Bumbu</th><th>Sambal Pasangan</th><th>Kisaran Harga</th></tr>
          </thead>
          <tbody>
            <?php foreach ($daftarIkan as $ikan): ?>
            <tr>
              <td><?= e($ikan["jenis"]) ?></td>
              <td><?= e($ikan["bumbu"]) ?></td>
              <td><?= e($ikan["sambal"]) ?></td>
              <td><?= rupiah($ikan["harga"]) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <h3>Tips Memilih Ikan yang Segar</h3>
        <ul class="isi">
          <?php foreach ($tips as $tip): ?>
          <li><?= e($tip) ?></li>
          <?php endforeach; ?>
        </ul>
      </main>
    </div>
    <footer><?= e($footer) ?></footer>
  </div>
</body>
</html>