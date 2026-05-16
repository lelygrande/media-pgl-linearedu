let titikX = 0;
let titikY = 0;

function setup() {
  let canvas = createCanvas(450, 450);
  canvas.parent("canvas-container");
}

function draw() {
  background(240);
  translate(width / 2, height / 2);

  // Grid
  stroke(220);
  strokeWeight(1);
  for (let i = -10; i <= 10; i++) {
    line(i * 20, -200, i * 20, 200);
    line(-200, i * 20, 200, i * 20);
  }

  // Sumbu X dan Y
  stroke(0);
  strokeWeight(2);
  line(-200, 0, 200, 0);
  line(0, -200, 0, 200);
  strokeWeight(1);

  // Ticks kecil pada sumbu
  stroke(0);
  for (let i = -10; i <= 10; i++) {
    line(i * 20, -5, i * 20, 5);
    line(-5, i * 20, 5, i * 20);
  }

  // Angka pada sumbu
  fill(0);
  noStroke();
  textSize(12);
  textAlign(LEFT, BASELINE);

  for (let i = -10; i <= 10; i++) {
    if (i !== 0) {
      text(i, i * 20 - 4, 18);
      text(-i, -18, i * 20 + 4);
    }
  }

  // Titik asal
  text("0", 6, 15);

  // Ambil input
  titikX = Number(document.getElementById("inputX").value) || 0;
  titikY = Number(document.getElementById("inputY").value) || 0;

  // Batasi titik agar tetap dalam bidang koordinat
  titikX = constrain(titikX, -10, 10);
  titikY = constrain(titikY, -10, 10);

  // Gambar titik
  fill(255, 0, 0);
  noStroke();
  circle(titikX * 20, -titikY * 20, 10);

  // Label titik
  fill(0);
  textSize(14);
  textAlign(LEFT, BASELINE);

  if (titikX === 0 && titikY === 0) {
    text("(" + titikX + ", " + titikY + ")", 10, -8);
  } else {
    text("(" + titikX + ", " + titikY + ")", titikX * 20 + 8, -titikY * 20 - 8);
  }
}
