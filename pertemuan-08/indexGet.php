<?php
/**
 * indexGet.php - Beranda "Rafka Laut" dengan pencarian memakai metode GET
 * UTS Pemrograman Web Dasar - Pertemuan 8
 *
 * Isi halaman sama dengan index.php, ditambah formulir (method="get")
 * untuk mencari dan mengurutkan tabel "Ikan Bakar yang Pernah Saya Coba".
 * Nilai pencarian dikirim lewat URL, contoh:
 *   indexGet.php?cari=kakap&urut=termurah&maks=70000
 */

// ---------- DATA ----------
$namaBlog    = "Rafka Laut";
$namaPemilik = "Serin Ariestia Rafka";
$tagline     = "Berbagi cerita dan pengalaman seputar kuliner favorit";
$halamanAktif = "indexGet.php";

$footer = "©2622500051_Serin Ariestia Rafka_SI1J_ UTS Pemrograman Web Dasar";

$menu = [
    ["label" => "Beranda",          "url" => "index.php"],
    ["label" => "Cari Ikan (GET)",  "url" => "indexGet.php"],
    ["label" => "Profile",          "url" => "profile.html"],
    ["label" => "Pendaftaran",      "url" => "pendaftaran.html"],
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

$pilihanUrut = [
    "default"  => "Urutan awal",
    "termurah" => "Harga termurah",
    "termahal" => "Harga termahal",
    "nama"     => "Nama A-Z",
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

// Ambil nilai $_GET sebagai teks; kalau tidak ada atau berupa array, dianggap kosong.
function ambilGet(string $kunci): string
{
    $nilai = $_GET[$kunci] ?? "";
    return is_string($nilai) ? trim($nilai) : "";
}

// ---------- PROSES INPUT GET ----------
$galat = [];

$cari = mb_substr(ambilGet("cari"), 0, 50);

$urut = ambilGet("urut");
if (!array_key_exists($urut, $pilihanUrut)) {
    $urut = "default";
}

$maksTeks = ambilGet("maks");
$maks = null;
if ($maksTeks !== "") {
    if (ctype_digit($maksTeks) && strlen($maksTeks) <= 9) {
        $maks = (int) $maksTeks;
    } else {
        $galat[] = "Harga maksimal harus berupa angka (tanpa titik atau huruf).";
    }
}

// ---------- FILTER & URUTKAN ----------
$hasil = array_values(array_filter($daftarIkan, function (array $ikan) use ($cari, $maks): bool {
    if ($maks !== null && $ikan["harga"] > $maks) {
        return false;
    }
    if ($cari === "") {
        return true;
    }
    foreach (["jenis", "bumbu", "sambal"] as $kolom) {
        if (mb_stripos($ikan[$kolom], $cari) !== false) {
            return true;
        }
    }
    return false;
}));

if ($urut === "termurah") {
    usort($hasil, fn($a, $b) => $a["harga"] <=> $b["harga"]);
} elseif ($urut === "termahal") {
    usort($hasil, fn($a, $b) => $b["harga"] <=> $a["harga"]);
} elseif ($urut === "nama") {
    usort($hasil, fn($a, $b) => strcasecmp($a["jenis"], $b["jenis"]));
}

$sedangFilter = ($cari !== "" || $maks !== null || $urut !== "default");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda (GET) | <?= e($namaBlog) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@600;700&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    /* Tambahan khusus halaman ini (style.css tidak diubah) */
    .cari{max-width:none;margin:8px 0 12px}
    .cari .kolom{display:flex;flex-wrap:wrap;gap:12px;align-items:flex-end}
    .cari .baris{margin-bottom:0;flex:1;min-width:150px}
    .cari .aksi{display:flex;gap:8px}
    a.btn-reset{display:inline-block;font-weight:700;padding:10px 22px;border:2px solid var(--garis);background:var(--putih);color:var(--arang);text-decoration:none}
    .info-hasil{font-size:.9rem;color:#556;margin-bottom:6px}
    td.kosong{text-align:center;color:#556}
  </style>
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

        <form class="cari" method="get" action="indexGet.php">
          <div class="kolom">
            <div class="baris">
              <label for="cari">Cari (jenis, bumbu, atau sambal)</label>
              <input type="text" id="cari" name="cari" maxlength="50" value="<?= e($cari) ?>" placeholder="Contoh: kakap atau matah">
            </div>
            <div class="baris">
              <label for="maks">Harga maksimal (Rp)</label>
              <input type="text" id="maks" name="maks" inputmode="numeric" value="<?= e($maksTeks) ?>" placeholder="Contoh: 50000">
            </div>
            <div class="baris">
              <label for="urut">Urutkan</label>
              <select id="urut" name="urut">
                <?php foreach ($pilihanUrut as $nilai => $label): ?>
                <option value="<?= e($nilai) ?>"<?= $nilai === $urut ? " selected" : "" ?>><?= e($label) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="aksi">
              <button type="submit">Cari</button>
              <a class="btn-reset" href="indexGet.php">Reset</a>
            </div>
          </div>
          <?php foreach ($galat as $pesan): ?>
          <div class="galat"><?= e($pesan) ?></div>
          <?php endforeach; ?>
        </form>

        <p class="info-hasil">
          Menampilkan <?= count($hasil) ?> dari <?= count($daftarIkan) ?> ikan<?= $sedangFilter ? " sesuai pencarian" : "" ?>.
        </p>

        <table>
          <thead>
            <tr><th>Jenis Ikan</th><th>Bumbu</th><th>Sambal Pasangan</th><th>Kisaran Harga</th></tr>
          </thead>
          <tbody>
            <?php if (count($hasil) === 0): ?>
            <tr><td class="kosong" colspan="4">Tidak ada ikan yang cocok dengan pencarian kamu.</td></tr>
            <?php endif; ?>
            <?php foreach ($hasil as $ikan): ?>
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