// =========================
// LATIHAN A2.1 - GRAFIK TITIK
// =========================

const sketchLatihanA21 = (p) => {

    // =========================
    // UKURAN
    // =========================
    const gridSize = 500;
    const leftMargin = 40;
    const topMargin = 40;

    let originX, originY, scaleUnit;

    // =========================
    // TARGET DARI TABEL
    // =========================
    let targetPoints = [];

    // =========================
    // TITIK SISWA
    // =========================
    let titikSiswa = [];

    let feedback =
        "Klik titik A, B, C, dan D pada bidang koordinat.";

    let showLine = false;

    // =========================
    // SETUP
    // =========================
    p.setup = function () {

        const canvas = p.createCanvas(840, 560);

        canvas.parent("canvas-holder");

        scaleUnit = gridSize / 20;

        originX = leftMargin + gridSize / 2;

        originY = topMargin + gridSize / 2;
    };

    // =========================
    // DRAW
    // =========================
    p.draw = function () {

        p.background(255);

        drawGrid();

        drawPanel();

        drawStudentPoints();

        if (showLine) {
            drawLine();
        }
    };

    // =========================
    // LOAD TARGET DARI TABEL
    // =========================
    window.loadTargetsFromTable = function (pairs) {

        targetPoints = pairs || [];

        titikSiswa = [];

        showLine = false;

        feedback =
            "Klik titik A, B, C, dan D pada bidang koordinat.";
    };

    // =========================
    // RESET TITIK
    // =========================
    window.resetPointsToStart = function () {

        titikSiswa = [];

        showLine = false;

        feedback =
            "Klik titik A, B, C, dan D pada bidang koordinat.";
    };

    // =========================
    // CEK JAWABAN
    // =========================
    window.checkAnswers = async function () {

        if (titikSiswa.length !== 4) {

            const feedbackGrafik =
                document.getElementById("feedbackGrafik");

            if (feedbackGrafik) {

                feedbackGrafik.innerHTML = `
                    <span style="color:#b45309;">
                        Klik semua titik dulu ya.
                    </span>
                `;
            }

            return false;
        }

        let semuaBenar = true;

        for (let i = 0; i < 4; i++) {

            const siswa = titikSiswa[i];

            const target = targetPoints[i];

            if (
                siswa.x !== target.x ||
                siswa.y !== target.y
            ) {
                semuaBenar = false;
                break;
            }
        }

        const feedbackGrafik =
            document.getElementById("feedbackGrafik");

        if (semuaBenar) {

            showLine = true;

            feedback =
                "Mantap! Semua titik sudah benar.";

            if (feedbackGrafik) {

                feedbackGrafik.innerHTML = `
                    <span style="color:#15803d;">
                        Semua titik benar!
                    </span>
                `;
            }

            return true;

        } else {

            showLine = false;

            feedback =
                "Masih ada titik yang salah.";

            if (feedbackGrafik) {

                feedbackGrafik.innerHTML = `
                    <span style="color:#b91c1c;">
                        Masih ada titik yang salah.
                    </span>
                `;
            }

            return false;
        }
    };

    // =========================
    // KLIK TITIK
    // =========================
    p.mousePressed = function () {

        if (targetPoints.length === 0) return;

        if (titikSiswa.length >= 4) return;

        const titik = pixelToCoord(
            p.mouseX,
            p.mouseY
        );

        if (!titik) return;

        const nama =
            targetPoints[titikSiswa.length].label;

        titikSiswa.push({
            nama: nama,
            x: titik.x,
            y: titik.y,
        });

        feedback =
            `Titik ${nama} dipilih di (${titik.x}, ${titik.y}).`;
    };

    // =========================
    // GRID
    // =========================
    function drawGrid() {

        p.stroke(230);

        p.strokeWeight(1);

        for (let x = -10; x <= 10; x++) {

            const px =
                originX + x * scaleUnit;

            p.line(
                px,
                topMargin,
                px,
                topMargin + gridSize
            );
        }

        for (let y = -10; y <= 10; y++) {

            const py =
                originY - y * scaleUnit;

            p.line(
                leftMargin,
                py,
                leftMargin + gridSize,
                py
            );
        }

        p.stroke(0);

        p.strokeWeight(2);

        p.line(
            leftMargin,
            originY,
            leftMargin + gridSize,
            originY
        );

        p.line(
            originX,
            topMargin,
            originX,
            topMargin + gridSize
        );

        p.noStroke();

        p.fill(0);

        p.textAlign(p.CENTER, p.CENTER);

        p.textSize(12);

        for (let i = -10; i <= 10; i++) {

            const px =
                originX + i * scaleUnit;

            if (i !== 0) {
                p.text(i, px, originY + 16);
            }
        }

        for (let j = -10; j <= 10; j++) {

            const py =
                originY - j * scaleUnit;

            if (j !== 0) {
                p.text(j, originX - 16, py);
            }
        }

        p.text(
            "0",
            originX - 10,
            originY + 16
        );

        p.textSize(16);

        p.text(
            "X",
            leftMargin + gridSize + 15,
            originY
        );

        p.text(
            "Y",
            originX,
            topMargin - 15
        );
    }

    // =========================
    // PANEL
    // =========================
    function drawPanel() {

        const panelX = 600;
        const panelW = 210;

        p.noStroke();

        p.fill(0);

        p.textAlign(p.LEFT, p.TOP);

        p.textSize(16);

        p.text("Petunjuk", panelX, 40);

        p.textSize(14);

        const petunjuk =
            "1. Klik titik A.\n" +
            "2. Klik titik B.\n" +
            "3. Klik titik C.\n" +
            "4. Klik titik D.";

        p.text(
            petunjuk,
            panelX,
            70,
            panelW,
            150
        );

        p.text(
            feedback,
            panelX,
            250,
            panelW,
            120
        );
    }

    // =========================
    // TITIK SISWA
    // =========================
    function drawStudentPoints() {

        titikSiswa.forEach((titik) => {

            const px =
                toPixelX(titik.x);

            const py =
                toPixelY(titik.y);

            p.fill(220, 0, 0);

            p.noStroke();

            p.circle(px, py, 10);

            p.fill(0);

            p.textAlign(p.LEFT, p.BOTTOM);

            p.textSize(13);

            p.text(
                titik.nama,
                px + 8,
                py - 4
            );
        });
    }

    // =========================
    // GARIS
    // =========================
    function drawLine() {

        if (titikSiswa.length < 2) return;

        const A = titikSiswa[0];
        const B = titikSiswa[1];

        p.stroke(30, 120, 255);

        p.strokeWeight(4);

        p.line(
            toPixelX(A.x),
            toPixelY(A.y),
            toPixelX(B.x),
            toPixelY(B.y)
        );
    }

    // =========================
    // PIXEL → KOORDINAT
    // =========================
    function pixelToCoord(px, py) {

        if (
            px < leftMargin ||
            px > leftMargin + gridSize ||
            py < topMargin ||
            py > topMargin + gridSize
        ) {
            return null;
        }

        let x = Math.round(
            (px - originX) / scaleUnit
        );

        let y = Math.round(
            (originY - py) / scaleUnit
        );

        x = p.constrain(x, -10, 10);

        y = p.constrain(y, -10, 10);

        return { x, y };
    }

    function toPixelX(x) {
        return originX + x * scaleUnit;
    }

    function toPixelY(y) {
        return originY - y * scaleUnit;
    }
};

// =========================
// INIT
// =========================
new p5(
    sketchLatihanA21,
    "canvas-holder"
);
