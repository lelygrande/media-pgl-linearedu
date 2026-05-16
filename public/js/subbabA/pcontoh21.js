let titikMuncul21 = [];       // titik yang sudah ditampilkan
let garisMuncul21 = false;    // apakah garis ditampilkan

// Titik untuk persamaan y = 3x + 2
const target21 = [
  { nama: "A", x: 1, y: 5 },
  { nama: "B", x: 2, y: 8 },
  { nama: "C", x: 3, y: 11 },
  { nama: "D", x: 4, y: 14 }
];

function getTitikByNama(nama) {
  return target21.find(t => t.nama === nama);
}

let sketch21 = function(p) {
  const step = 20;   // diperkecil
  const batas = 15;  // sumbu dari 0 sampai 15

  p.setup = function() {
    let canvas = p.createCanvas(400, 400); // canvas diperkecil
    canvas.parent("canvas-contoh-21");
  };

  p.draw = function() {
    p.background(245);

    // Geser titik (0,0) ke kiri bawah
    p.translate(45, p.height - 45);

    // Grid dari 0 sampai 15
    p.stroke(220);
    p.strokeWeight(1);

    for (let i = 0; i <= batas; i++) {
      // garis vertikal
      p.line(i * step, 0, i * step, -batas * step);

      // garis horizontal
      p.line(0, -i * step, batas * step, -i * step);
    }

    // Sumbu X dan Y
    p.stroke(0);
    p.strokeWeight(2);

    // sumbu X
    p.line(0, 0, batas * step, 0);

    // sumbu Y
    p.line(0, 0, 0, -batas * step);

    p.strokeWeight(1);

    // Ticks kecil pada sumbu
    p.stroke(0);

    for (let i = 0; i <= batas; i++) {
      // ticks sumbu X
      p.line(i * step, -4, i * step, 4);

      // ticks sumbu Y
      p.line(-4, -i * step, 4, -i * step);
    }

    // Angka skala
    p.fill(0);
    p.noStroke();
    p.textSize(10);

    for (let i = 0; i <= batas; i++) {
      // angka sumbu X
      p.text(i, i * step - 3, 15);

      // angka sumbu Y
      if (i !== 0) {
        p.text(i, -18, -i * step + 4);
      }
    }

    // Label sumbu
    p.textSize(12);
    p.text("x", batas * step + 10, 4);
    p.text("y", 6, -batas * step - 10);

    // Garis kalau diminta
    if (garisMuncul21 && titikMuncul21.length >= 2) {
      const urut = [...titikMuncul21].sort((a, b) => a.x - b.x);

      p.stroke(30);
      p.strokeWeight(2);

      for (let i = 0; i < urut.length - 1; i++) {
        const a = urut[i];
        const b = urut[i + 1];

        p.line(
          a.x * step,
          -a.y * step,
          b.x * step,
          -b.y * step
        );
      }

      p.strokeWeight(1);
    }

    // Titik + label
    titikMuncul21.forEach(t => {
      p.fill("red");
      p.noStroke();
      p.circle(t.x * step, -t.y * step, 8);

      p.fill(0);
      p.textSize(11);
      p.text(
        `${t.nama} (${t.x}, ${t.y})`,
        t.x * step + 6,
        -t.y * step - 6
      );
    });

    // Petunjuk
    p.fill(0);
    p.noStroke();
    p.textSize(11);
    p.text(
      "Tekan tombol untuk menampilkan titik A-D, lalu garis.",
      0,
      30
    );
  };
};

new p5(sketch21);


// ====== Tombol kontrol ======
function tampilTitik21(nama) {
  const t = getTitikByNama(nama);
  if (!t) return;

  const sudahAda = titikMuncul21.some(s => s.nama === nama);

  if (sudahAda) {
    document.getElementById("infoContoh21").innerHTML =
      `<div class="alert alert-warning mb-0">Titik ${nama} sudah ditampilkan.</div>`;
    return;
  }

  titikMuncul21.push({
    nama: t.nama,
    x: t.x,
    y: t.y
  });

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
