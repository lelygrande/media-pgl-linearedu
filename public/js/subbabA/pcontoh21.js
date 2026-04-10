let titikMuncul21 = [];       // titik yang sudah ditampilkan
let garisMuncul21 = false;    // apakah garis ditampilkan

const target21 = [
  { nama: "A", x: -2, y: -8 },
  { nama: "B", x:  0, y: -4 },
  { nama: "C", x:  2, y:  0 },
  { nama: "D", x:  4, y:  4 }
];

function getTitikByNama(nama) {
  return target21.find(t => t.nama === nama);
}

let sketch21 = function(p) {
  const step = 20;   // 1 satuan = 20px
  const batas = 10;

  p.setup = function() {
    let canvas = p.createCanvas(450, 450);
    canvas.parent("canvas-contoh-21");
  };

  p.draw = function() {
    p.background(245);
    p.translate(p.width / 2, p.height / 2);

    // Grid
    p.stroke(220);
    for (let i = -batas; i <= batas; i++) {
      p.line(i * step, -batas * step, i * step, batas * step);
      p.line(-batas * step, i * step, batas * step, i * step);
    }

    // Sumbu
    p.stroke(0);
    p.strokeWeight(2);
    p.line(-batas * step, 0, batas * step, 0);
    p.line(0, -batas * step, 0, batas * step);
    p.strokeWeight(1);

    // (opsional) angka skala
    p.fill(0);
    p.noStroke();
    p.textSize(11);
    for (let i = -batas; i <= batas; i++) {
      if (i !== 0) {
        p.text(i, i * step - 3, 14);
        p.text(-i, 6, i * step + 3);
      }
    }

    // Garis (kalau diminta)
    if (garisMuncul21 && titikMuncul21.length >= 2) {
      const urut = [...titikMuncul21].sort((a, b) => a.x - b.x);

      p.stroke(30);
      p.strokeWeight(2);
      for (let i = 0; i < urut.length - 1; i++) {
        const a = urut[i], b = urut[i + 1];
        p.line(a.x * step, -a.y * step, b.x * step, -b.y * step);
      }
      p.strokeWeight(1);
    }

    // Titik + label
    titikMuncul21.forEach(t => {
      p.fill("red");
      p.noStroke();
      p.circle(t.x * step, -t.y * step, 10);

      p.fill(0);
      p.textSize(14);
      p.text(t.nama, t.x * step + 8, -t.y * step - 8);
    });

    // Petunjuk
    p.fill(0);
    p.textSize(12);
    p.text("Tekan tombol untuk menampilkan titik A–D, lalu garis.", -batas * step, batas * step + 22);
  };
};

new p5(sketch21);


// ====== Tombol kontrol ======
function tampilTitik21(nama) {
  const t = getTitikByNama(nama);
  if (!t) return;

  // jangan duplikat
  const sudahAda = titikMuncul21.some(s => s.nama === nama);
  if (sudahAda) {
    document.getElementById("infoContoh21").innerHTML =
      `<div class="alert alert-warning mb-0">Titik ${nama} sudah ditampilkan.</div>`;
    return;
  }

  titikMuncul21.push({ nama: t.nama, x: t.x, y: t.y });
  document.getElementById("infoContoh21").innerHTML =
    `<div class="alert alert-info mb-0">Menampilkan titik ${nama} (${t.x}, ${t.y}).</div>`;
}

function tampilGaris21() {
  if (titikMuncul21.length < 2) {
    document.getElementById("infoContoh21").innerHTML =
      `<div class="alert alert-warning mb-0">Tampilkan minimal 2 titik dulu sebelum menampilkan garis.</div>`;
    return;
  }
  garisMuncul21 = true;
  document.getElementById("infoContoh21").innerHTML =
    `<div class="alert alert-success mb-0">Garis ditampilkan dengan menghubungkan titik-titik yang sudah muncul.</div>`;
}

function resetContoh21() {
  titikMuncul21 = [];
  garisMuncul21 = false;
  document.getElementById("infoContoh21").innerHTML = "";
}
