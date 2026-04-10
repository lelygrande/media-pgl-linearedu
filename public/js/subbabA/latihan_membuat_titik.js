let titikSiswa = [];
let daftarNama = ["B", "C", "D"];

let sketch = function(p) {

  p.setup = function() {
    let canvas = p.createCanvas(450, 450);
    canvas.parent("canvas-latihan-buat");
  };

  p.draw = function() {
    p.background(245);
    p.translate(p.width / 2, p.height / 2);

    // Grid
    p.stroke(220);
    for (let i = -10; i <= 10; i++) {
      p.line(i * 20, -200, i * 20, 200);
      p.line(-200, i * 20, 200, i * 20);
    }

    // Sumbu X dan Y
    p.stroke(0);
    p.strokeWeight(2);
    p.line(-200, 0, 200, 0);
    p.line(0, -200, 0, 200);
    p.strokeWeight(1);

    // Ticks kecil pada sumbu
    for (let i = -10; i <= 10; i++) {
      // ticks sumbu X
      p.line(i * 20, -5, i * 20, 5);

      // ticks sumbu Y
      p.line(-5, i * 20, 5, i * 20);
    }

    // Angka pada sumbu
    p.fill(0);
    p.noStroke();
    p.textSize(12);

    for (let i = -10; i <= 10; i++) {
      if (i !== 0) {
        // angka sumbu X
        p.text(i, i * 20 - 4, 18);

        // angka sumbu Y
        p.text(i, -18, -i * 20 + 4);
      }
    }

    // Titik asal
    p.text("0", 6, 15);

    // Titik siswa + label
    titikSiswa.forEach(t => {
      p.fill("red");
      p.noStroke();
      p.circle(t.x * 20, -t.y * 20, 10);

      p.fill(0);
      p.textSize(14);
      p.text(t.nama, t.x * 20 + 8, -t.y * 20 - 8);
    });

    // Info sisa titik
    p.fill(0);
    p.noStroke();
    p.textSize(12);
    if (titikSiswa.length < 3) {
      p.text(`Klik untuk menempatkan titik ${daftarNama[titikSiswa.length]}`, -200, 220);
    } else {
      p.text(`Semua titik (B, C, D) sudah ditempatkan`, -200, 220);
    }
  };

  p.mousePressed = function() {
    if (titikSiswa.length >= 3) return;

    let x = Math.round((p.mouseX - p.width / 2) / 20);
    let y = Math.round(-(p.mouseY - p.height / 2) / 20);

    if (x >= -10 && x <= 10 && y >= -10 && y <= 10) {
      titikSiswa.push({
        nama: daftarNama[titikSiswa.length],
        x: x,
        y: y
      });
    }
  };
};

new p5(sketch);


// ===== CEK JAWABAN =====
function cekTitikBuat() {
  const target = [
    {nama: "B", x: 2,  y: 3},
    {nama: "C", x: -7, y: 3},
    {nama: "D", x: 5, y: -4}
  ];

  let benar = target.every(t =>
    titikSiswa.some(s => s.nama === t.nama && s.x === t.x && s.y === t.y)
  );

  if (benar) {
    document.getElementById("hasilLatihanBuat").innerHTML =
      "<div class='alert alert-success'>Semua titik (B, C, D) sudah benar</div>";
  } else {
    document.getElementById("hasilLatihanBuat").innerHTML =
      "<div class='alert alert-danger'>Masih ada titik yang belum tepat</div>";
  }
}


// ===== RESET =====
function resetTitik() {
  titikSiswa = [];
  document.getElementById("hasilLatihanBuat").innerHTML = "";
}
