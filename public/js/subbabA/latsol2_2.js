let gridSize = 500;
let leftMargin = 40;
let topMargin = 40;
let originX, originY, scaleUnit;

let tokens = [];
let draggingToken = null;
let dragOffsetX = 0;
let dragOffsetY = 0;

let btnSubmit, btnReset;
let resultMessage = "";
let resultColor;
let showLine = false;

let uiRow;
let p5Ready = false;

function setup() {
  const holder = select("#canvas-holder");

  if (!holder) {
    console.warn("Elemen #canvas-holder tidak ditemukan.");
    noCanvas();
    return;
  }

  const c = createCanvas(840, 560);
  c.parent("canvas-holder");

  uiRow = createDiv();
  uiRow.parent("canvas-holder");
  uiRow.style("margin-top", "10px");
  uiRow.style("display", "flex");
  uiRow.style("gap", "10px");
  uiRow.style("align-items", "center");

  btnSubmit = createButton("Submit");
  btnSubmit.parent(uiRow);
  btnSubmit.mousePressed(checkAnswers);

  btnReset = createButton("Reset");
  btnReset.parent(uiRow);
  btnReset.mousePressed(resetAllP5);

  btnSubmit.style("padding", "8px 14px");
  btnReset.style("padding", "8px 14px");

  scaleUnit = gridSize / 20;
  originX = leftMargin + gridSize / 2;
  originY = topMargin + gridSize / 2;

  tokens = [];
  tokens.push(new DraggableToken("A", 0, -4, 640, 220));
  tokens.push(new DraggableToken("B", 2, 0, 640, 320));

  resultColor = color(0);
  p5Ready = true;
}

function draw() {
  if (!p5Ready) return;

  background(255);
  drawProblemText();
  drawCoordinatePlane();

  if (showLine) drawAutoLineIfReady();

  for (let t of tokens) t.display();

  fill(resultColor);
  noStroke();
  textSize(14);
  textAlign(LEFT, TOP);
  text(resultMessage, 600, 480, 220, 80);
}

class DraggableToken {
  constructor(name, targetX, targetY, homeX, homeY) {
    this.name = name;
    this.targetX = targetX;
    this.targetY = targetY;
    this.homeX = homeX;
    this.homeY = homeY;

    this.x = homeX;
    this.y = homeY;
    this.r = 20;

    this.coordX = null;
    this.coordY = null;
    this.isCorrect = null;
  }

  display() {
    if (this.isCorrect === true) fill(0, 170, 0);
    else if (this.isCorrect === false) fill(200, 0, 0);
    else fill(50, 100, 200);

    noStroke();
    ellipse(this.x, this.y, this.r * 2, this.r * 2);

    fill(255);
    textAlign(CENTER, CENTER);
    textSize(16);
    text(this.name, this.x, this.y);

    fill(0);
    textAlign(LEFT, CENTER);
    textSize(12);

    if (this.coordX === null && this.coordY === null) {
      text(`Target: (${this.targetX}, ${this.targetY})`, this.x + 30, this.y);
    } else {
      text(`Posisi: (${this.coordX}, ${this.coordY})`, this.x + 30, this.y);
    }
  }

  isMouseOver() {
    return dist(mouseX, mouseY, this.x, this.y) <= this.r;
  }

  startDrag() {
    dragOffsetX = this.x - mouseX;
    dragOffsetY = this.y - mouseY;
  }

  drag() {
    this.x = mouseX + dragOffsetX;
    this.y = mouseY + dragOffsetY;
  }

  endDrag() {
    showLine = false;

    if (
      this.x >= leftMargin &&
      this.x <= leftMargin + gridSize &&
      this.y >= topMargin &&
      this.y <= topMargin + gridSize
    ) {
      let cx = Math.round((this.x - originX) / scaleUnit);
      let cy = Math.round((originY - this.y) / scaleUnit);

      cx = constrain(cx, -10, 10);
      cy = constrain(cy, -10, 10);

      this.coordX = cx;
      this.coordY = cy;

      this.x = originX + cx * scaleUnit;
      this.y = originY - cy * scaleUnit;

      this.isCorrect = null;
      resultMessage = "";
      resultColor = color(0);
    } else {
      this.resetPosition();
    }
  }

  resetPosition() {
    this.x = this.homeX;
    this.y = this.homeY;
    this.coordX = null;
    this.coordY = null;
    this.isCorrect = null;
  }
}

function drawProblemText() {
  fill(0);
  noStroke();
  textAlign(LEFT, TOP);
  textSize(14);

  const soal =
    "Tugas:\n" +
    "Seret titik A dan B ke posisi yang tepat di bidang Kartesius.\n" +
    "A dan B adalah titik potong sumbu dari garis y = 2x - 4.\n" +
    "Klik Submit untuk memeriksa benar/salah.\n" +
    "Garis lurus hanya muncul jika A dan B benar.";

  text(soal, 600, 20, 220, 140);
}

function drawCoordinatePlane() {
  stroke(230);
  strokeWeight(1);

  for (let x = -10; x <= 10; x++) {
    let px = originX + x * scaleUnit;
    line(px, topMargin, px, topMargin + gridSize);
  }

  for (let y = -10; y <= 10; y++) {
    let py = originY - y * scaleUnit;
    line(leftMargin, py, leftMargin + gridSize, py);
  }

  stroke(0);
  strokeWeight(2);
  line(leftMargin, originY, leftMargin + gridSize, originY);
  line(originX, topMargin, originX, topMargin + gridSize);

  noStroke();
  fill(0);
  textSize(16);
  textAlign(CENTER, CENTER);
  text("X", leftMargin + gridSize + 15, originY + 5);
  text("Y", originX - 10, topMargin - 15);

  textSize(12);
  for (let i = -10; i <= 10; i++) {
    let px = originX + i * scaleUnit;
    if (i !== 0) text(i, px, originY + 18);
    else text("0", originX - 12, originY + 18);
  }

  for (let j = -10; j <= 10; j++) {
    let py = originY - j * scaleUnit;
    if (j !== 0) text(j, originX - 18, py + 3);
  }
}

function allTokensPlaced() {
  return tokens.every((t) => t.coordX !== null && t.coordY !== null);
}

function getToken(name) {
  return tokens.find((t) => t.name === name);
}

function drawAutoLineIfReady() {
  if (!allTokensPlaced()) return;

  const A = getToken("A");
  const B = getToken("B");
  if (!A || !B) return;
  if (A.coordX === B.coordX && A.coordY === B.coordY) return;

  const seg = getClippedLineSegmentInBox(A.coordX, A.coordY, B.coordX, B.coordY);
  if (!seg) return;

  const { p1, p2 } = seg;

  stroke(30, 120, 255);
  strokeWeight(4);
  line(
    originX + p1.x * scaleUnit,
    originY - p1.y * scaleUnit,
    originX + p2.x * scaleUnit,
    originY - p2.y * scaleUnit
  );
}

function getClippedLineSegmentInBox(x1, y1, x2, y2) {
  if (x1 === x2) {
    const x = x1;
    if (x < -10 || x > 10) return null;
    return { p1: { x, y: -10 }, p2: { x, y: 10 } };
  }

  const m = (y2 - y1) / (x2 - x1);
  const c = y1 - m * x1;

  const candidates = [];
  candidates.push({ x: -10, y: m * -10 + c });
  candidates.push({ x: 10, y: m * 10 + c });

  if (m !== 0) {
    candidates.push({ x: (-10 - c) / m, y: -10 });
    candidates.push({ x: (10 - c) / m, y: 10 });
  } else {
    if (c < -10 || c > 10) return null;
    return { p1: { x: -10, y: c }, p2: { x: 10, y: c } };
  }

  const inside = candidates.filter(
    (p) => p.x >= -10 && p.x <= 10 && p.y >= -10 && p.y <= 10
  );

  if (inside.length < 2) return null;

  let bestPair = [inside[0], inside[1]];
  let bestDist = -1;

  for (let i = 0; i < inside.length; i++) {
    for (let j = i + 1; j < inside.length; j++) {
      const dx = inside[i].x - inside[j].x;
      const dy = inside[i].y - inside[j].y;
      const d2 = dx * dx + dy * dy;
      if (d2 > bestDist) {
        bestDist = d2;
        bestPair = [inside[i], inside[j]];
      }
    }
  }

  return { p1: bestPair[0], p2: bestPair[1] };
}

function checkAnswers() {
  if (!allTokensPlaced()) {
    resultMessage = "Masih ada titik yang belum ditempatkan.";
    resultColor = color(200, 120, 0);
    showLine = false;
    return;
  }

  let allCorrect = true;

  for (let t of tokens) {
    if (t.coordX === t.targetX && t.coordY === t.targetY) {
      t.isCorrect = true;
    } else {
      t.isCorrect = false;
      allCorrect = false;
    }
  }

  showLine = allCorrect;

  if (allCorrect) {
    resultMessage = "Mantap! A dan B benar. Garis berhasil digambar!";
    resultColor = color(0, 160, 0);
  } else {
    resultMessage = "Masih ada titik yang salah. Coba periksa lagi posisi A dan B.";
    resultColor = color(200, 0, 0);
  }
}

function resetAllP5() {
  for (let t of tokens) t.resetPosition();
  resultMessage = "";
  resultColor = color(0);
  showLine = false;
}

function mousePressed() {
  if (!p5Ready) return;

  for (let i = tokens.length - 1; i >= 0; i--) {
    if (tokens[i].isMouseOver()) {
      draggingToken = tokens[i];
      draggingToken.startDrag();
      break;
    }
  }
}

function mouseDragged() {
  if (draggingToken) draggingToken.drag();
}

function mouseReleased() {
  if (draggingToken) {
    draggingToken.endDrag();
    draggingToken = null;
  }
}
