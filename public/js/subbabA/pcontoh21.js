// =========================
// Contoh 2.1 - Plotting Titik Interaktif
// =========================

let targetContoh21 = [
    { nama: "A", x: 1, y: 5 },
    { nama: "B", x: 2, y: 8 },
    { nama: "C", x: 3, y: 11 },
    { nama: "D", x: 4, y: 14 },
];

let indeksContoh21 = 0;
let titikContoh21Benar = [];
let titikContoh21Percobaan = null;
let garisContoh21Terbentuk = false;

function updateInfoContoh21() {
    const infoBox = document.getElementById("infoContoh21");

    if (!infoBox) return;

    if (indeksContoh21 >= targetContoh21.length) {
        infoBox.innerHTML = `Bagus! Semua titik sudah tepat. Titik-titik tersebut membentuk grafik garis lurus dari persamaan <b>$y = 3x + 2$</b>.`;

        renderMathContoh21(infoBox);
        return;
    }

    const titik = targetContoh21[indeksContoh21];

    infoBox.innerHTML = `Klik titik <b>${titik.nama}(${titik.x},${titik.y})</b> pada bidang koordinat.`;
}

function renderMathContoh21(target) {
    if (!target || typeof renderMathInElement !== "function") return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "$", right: "$", display: false },
        ],
    });
}

const sketchContoh21 = (p) => {
    const canvasW = 520;
    const canvasH = 520;
    const gridSize = 390;

    const leftMargin = 62;
    const topMargin = 55;

    const minX = 0;
    const maxX = 15;
    const minY = 0;
    const maxY = 15;

    let scaleUnit;
    let originX;
    let originY;
    let lastClickTime = 0;

    p.setup = function () {
        const canvas = p.createCanvas(canvasW, canvasH);
        canvas.parent("canvas-contoh-21");

        scaleUnit = gridSize / 15;
        originX = leftMargin;
        originY = topMargin + gridSize;

        canvas.mousePressed(function () {
            handleKlikContoh21();
            return false;
        });

        updateInfoContoh21();
    };

    p.draw = function () {
        p.background(250);

        drawGrid();

        if (garisContoh21Terbentuk) {
            drawGaris();
        }

        drawTitikBenar();

        if (titikContoh21Percobaan) {
            drawTitikPercobaan();
        }
    };

    function handleKlikContoh21() {
        if (p.millis() - lastClickTime < 300) return;

        lastClickTime = p.millis();

        if (indeksContoh21 >= targetContoh21.length) return;

        const koordinat = pixelToCoord(p.mouseX, p.mouseY);

        if (!koordinat) return;

        const target = targetContoh21[indeksContoh21];

        if (koordinat.x === target.x && koordinat.y === target.y) {
            titikContoh21Benar.push({
                nama: target.nama,
                x: target.x,
                y: target.y,
            });

            titikContoh21Percobaan = null;
            indeksContoh21++;

            if (indeksContoh21 >= targetContoh21.length) {
                garisContoh21Terbentuk = true;
            }

            updateInfoContoh21();
        } else {
            titikContoh21Percobaan = {
                x: koordinat.x,
                y: koordinat.y,
            };

            const infoBox = document.getElementById("infoContoh21");

            if (infoBox) {
                infoBox.innerHTML = `Titik yang kamu klik belum tepat. Coba perhatikan kembali koordinat titik yang diminta.`;
            }
        }
    }

    function drawGrid() {
        p.push();

        p.stroke(225);
        p.strokeWeight(1);

        for (let i = minX; i <= maxX; i++) {
            const x = originX + i * scaleUnit;
            p.line(x, topMargin, x, originY);
        }

        for (let j = minY; j <= maxY; j++) {
            const y = originY - j * scaleUnit;
            p.line(originX, y, originX + gridSize, y);
        }

        p.stroke(0);
        p.strokeWeight(2);

        p.line(originX, originY, originX + gridSize + 20, originY);
        p.line(originX, originY, originX, topMargin - 20);

        p.noStroke();
        p.fill(0);
        p.textSize(12);
        p.textAlign(p.CENTER, p.CENTER);

        for (let i = minX; i <= maxX; i++) {
            const x = originX + i * scaleUnit;
            p.text(i, x, originY + 18);
        }

        for (let j = minY; j <= maxY; j++) {
            const y = originY - j * scaleUnit;
            p.text(j, originX - 20, y);
        }

        p.textSize(16);
        p.text("x", originX + gridSize + 34, originY);
        p.text("y", originX, topMargin - 32);

        p.pop();
    }

    function drawTitikBenar() {
        p.push();

        titikContoh21Benar.forEach((t) => {
            const px = toPixelX(t.x);
            const py = toPixelY(t.y);

            p.fill(0, 102, 204);
            p.noStroke();
            p.circle(px, py, 12);

            p.fill(0);
            p.textSize(14);
            p.textAlign(p.LEFT, p.BOTTOM);
            p.text(`${t.nama}(${t.x},${t.y})`, px + 8, py - 6);
        });

        p.pop();
    }

    function drawTitikPercobaan() {
        const px = toPixelX(titikContoh21Percobaan.x);
        const py = toPixelY(titikContoh21Percobaan.y);

        p.push();

        p.stroke(220, 0, 0);
        p.strokeWeight(3);
        p.line(px - 7, py - 7, px + 7, py + 7);
        p.line(px + 7, py - 7, px - 7, py + 7);

        p.pop();
    }

    function drawGaris() {
        if (titikContoh21Benar.length < 2) return;

        const titikAwal = titikContoh21Benar[0];
        const titikAkhir = titikContoh21Benar[titikContoh21Benar.length - 1];

        p.push();

        p.stroke(30, 150, 70);
        p.strokeWeight(3);

        p.line(
            toPixelX(titikAwal.x),
            toPixelY(titikAwal.y),
            toPixelX(titikAkhir.x),
            toPixelY(titikAkhir.y),
        );

        p.pop();
    }

    function pixelToCoord(px, py) {
        const batasKiri = originX;
        const batasKanan = originX + gridSize;
        const batasAtas = topMargin;
        const batasBawah = originY;

        if (
            px < batasKiri ||
            px > batasKanan ||
            py < batasAtas ||
            py > batasBawah
        ) {
            return null;
        }

        const x = Math.round((px - originX) / scaleUnit);
        const y = Math.round((originY - py) / scaleUnit);

        return { x, y };
    }

    function toPixelX(x) {
        return originX + x * scaleUnit;
    }

    function toPixelY(y) {
        return originY - y * scaleUnit;
    }
};

document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("canvas-contoh-21")) {
        new p5(sketchContoh21);
    }
});

function resetContoh21() {
    indeksContoh21 = 0;
    titikContoh21Benar = [];
    titikContoh21Percobaan = null;
    garisContoh21Terbentuk = false;

    updateInfoContoh21();
}
