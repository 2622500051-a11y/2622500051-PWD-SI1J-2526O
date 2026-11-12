const form = document.getElementById("formDaftar");
const hasil = document.getElementById("hasil");

function setGalat(id, pesan) {
  document.getElementById("galat-" + id).textContent = pesan;
  return pesan === "";
}

form.addEventListener("submit", function (e) {
  e.preventDefault();

  const nama = form.nama.value.trim();
  const email = form.email.value.trim();
  const hp = form.hp.value.trim();
  const jk = form.jk.value;
  const ikan = form.ikan.value;

  const cek = [
    setGalat("nama", nama.length < 3 ? "Nama minimal 3 huruf." : ""),
    setGalat("email", /^\S+@\S+\.\S+$/.test(email) ? "" : "Format email belum benar."),
    setGalat("hp", /^08\d{8,11}$/.test(hp) ? "" : "Nomor HP harus diawali 08 dan 10-13 digit."),
    setGalat("jk", jk ? "" : "Pilih jenis kelamin."),
    setGalat("ikan", ikan ? "" : "Pilih ikan favorit."),
  ];
  if (cek.includes(false)) { hasil.hidden = true; return; }

  const sambal = [...form.querySelectorAll("input[name=sambal]:checked")]
    .map((c) => c.value).join(", ") || "-";

  hasil.hidden = false;
  hasil.innerHTML =
    "<h3>Pendaftaran berhasil</h3>" +
    "<p>Terima kasih, <strong></strong>! Data kamu sudah kami catat.</p>" +
    "<ul class='isi'><li>Email: " + "</li><li>No. HP: " + "</li><li>Jenis kelamin: " +
    "</li><li>Ikan favorit: " + "</li><li>Sambal: " + "</li></ul>";
  // isi memakai textContent agar aman dari karakter HTML
  hasil.querySelector("strong").textContent = nama;
  const li = hasil.querySelectorAll("li");
  [email, hp, jk, ikan, sambal].forEach((v, i) => {
    li[i].textContent = li[i].textContent + v;
  });
  form.reset();
});

document.getElementById("btnReset").addEventListener("click", function () {
  hasil.hidden = true;
  document.querySelectorAll(".galat").forEach((g) => (g.textContent = ""));
});
