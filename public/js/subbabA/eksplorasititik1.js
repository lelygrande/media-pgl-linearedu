let titikX = 0;
let titikY = 0;

function setup() {
  let canvas = createCanvas(400, 400);
  canvas.parent("canvas-container");
}

function draw() {
  background(240);
  translate(width/2, height/2);

  // Grid
  stroke(220);
  for (let i = -200; i <= 200; i += 20) {
    line(i, -200, i, 200);
    line(-200, i, 200, i);
  }

  // Sumbu utama
  stroke(0);
  strokeWeight(2);
  line(-200, 0, 200, 0);
  line(0, -200, 0, 200);

  strokeWeight(1);

  // Ambil input
  titikX = Number(document.getElementById("inputX").value) || 0;
  titikY = Number(document.getElementById("inputY").value) || 0;

  // Gambar titik
  fill(255, 0, 0);
  noStroke();
  circle(titikX * 20, -titikY * 20, 10);

  // Label
  fill(0);
  text("(" + titikX + ", " + titikY + ")", titikX * 20 + 5, -titikY * 20 - 5);
}
