let titikSiswa = [];
let daftarNama = ["B", "C", "D"];

const sketch = (p) => {
    const gridSize = 400;

    let originX;
    let originY;
    let scaleUnit;

    let lastClickTime = 0;

    p.setup = function () {
        let canvas = p.createCanvas(450, 500);

        canvas.parent("canvas-latihan-buat");

        scaleUnit = gridSize / 20;

        originX = p.width / 2;
        originY = p.height / 2;
    };

    p.draw = function () {
        p.background(245);

        drawGrid();
        drawTitik();
        drawInfo();
    };

    // =========================
    // CLICK INPUT
    // =========================
    function handleInput() {
        // cegah double trigger mobile
        if (p.millis() - lastClickTime < 300) {
            return false;
        }

        lastClickTime = p.millis();

        // maksimal 3 titik
        if (titikSiswa.length >= 3) {
            return false;
        }

        const titik = pixelToCoord(p.mouseX, p.mouseY);

        if (!titik) {
            return false;
        }

        titikSiswa.push({
            nama: daftarNama[titikSiswa.length],
            x: titik.x,
            y: titik.y,
        });

        return false;
    }

    // desktop
    p.mousePressed = function () {
        return handleInput();
    };

    // mobile
    p.touchStarted = function () {
        return handleInput();
    };
    // =========================
    // GRID
    // =========================
    function drawGrid() {
        p.push();

        p.translate(originX, originY);

        // grid
        p.stroke(220);

        for (let i = -10; i <= 10; i++) {
            p.line(i * scaleUnit, -200, i * scaleUnit, 200);

            p.line(-200, i * scaleUnit, 200, i * scaleUnit);
        }

        // axis
        p.stroke(0);

        p.strokeWeight(2);

        p.line(-200, 0, 200, 0);

        p.line(0, -200, 0, 200);

        p.strokeWeight(1);

        // ticks
        for (let i = -10; i <= 10; i++) {
            p.line(i * scaleUnit, -5, i * scaleUnit, 5);

            p.line(-5, i * scaleUnit, 5, i * scaleUnit);
        }

        // numbers
        p.noStroke();

        p.fill(0);

        p.textSize(12);

        for (let i = -10; i <= 10; i++) {
            if (i !== 0) {
                p.text(i, i * scaleUnit - 4, 18);

                p.text(i, -18, -i * scaleUnit + 4);
            }
        }

        p.text("0", 6, 15);

        p.pop();
    }

    // =========================
    // DRAW TITIK
    // =========================
    function drawTitik() {
        p.push();

        p.translate(originX, originY);

        titikSiswa.forEach((t) => {
            p.fill("red");

            p.noStroke();

            p.circle(t.x * scaleUnit, -t.y * scaleUnit, 10);

            p.fill(0);

            p.textSize(14);

            p.text(t.nama, t.x * scaleUnit + 8, -t.y * scaleUnit - 8);
        });

        p.pop();
    }

    // =========================
    // INFO
    // =========================
    function drawInfo() {
        p.fill(0);

        p.noStroke();

        p.textSize(13);

        if (titikSiswa.length < 3) {
            p.text(
                `Klik untuk menempatkan titik ${daftarNama[titikSiswa.length]}`,
                20,
                480,
            );
        } else {
            p.text(
                `Semua titik sudah ditempatkan. Klik "Cek Jawaban".`,
                20,
                480,
            );
        }
    }

    // =========================
    // PIXEL TO COORD
    // =========================
    function pixelToCoord(px, py) {
        let x = Math.round((px - originX) / scaleUnit);

        let y = Math.round((originY - py) / scaleUnit);

        x = p.constrain(x, -10, 10);

        y = p.constrain(y, -10, 10);

        return { x, y };
    }
};

new p5(sketch);

// =========================
// CEK JAWABAN
// =========================
function cekTitikBuat() {
    const target = [
        { nama: "B", x: 2, y: 3 },
        { nama: "C", x: -7, y: 3 },
        { nama: "D", x: 5, y: -4 },
    ];

    let benar = target.every((t) =>
        titikSiswa.some((s) => s.nama === t.nama && s.x === t.x && s.y === t.y),
    );

    if (benar) {
        document.getElementById("hasilLatihanBuat").innerHTML =
            "<div class='alert alert-success'>Semua titik (B, C, D) sudah benar</div>";
    } else {
        document.getElementById("hasilLatihanBuat").innerHTML =
            "<div class='alert alert-danger'>Masih ada titik yang belum tepat</div>";
    }
}

// =========================
// RESET
// =========================
function resetTitik() {
    titikSiswa = [];

    document.getElementById("hasilLatihanBuat").innerHTML = "";
}
