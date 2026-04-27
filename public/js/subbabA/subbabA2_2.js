// Skrip contoh perhitungan titik potong
function openStep(id, btn) {
    const next = document.getElementById(id);
    if (!next) return;

    next.style.display = "block";
    btn.style.display = "none";
}

// visualisasi geogebra titik potong
function ggbOnLoad_22(api) {
    // garis 2x + y = 6
    api.evalCommand("g: 2x + y = 6");

    // titik potong dengan sumbu (pakai persamaan sumbu)
    api.evalCommand("A = Intersect(g, y=0)");
    api.evalCommand("B = Intersect(g, x=0)");

    api.setLabelVisible("A", true);
    api.setLabelVisible("B", true);
    api.setCaption("A", "Titik potong sumbu x");
    api.setCaption("B", "Titik potong sumbu y");
    api.setLabelStyle("A", 1);
    api.setLabelStyle("B", 1);

    // fokus tampilan
    api.setCoordSystem(-2, 8, -2, 8);
}

window.addEventListener("load", function () {
    var params = {
        appName: "classic",
        id: "ggbApplet22",
        width: 720,
        height: 480,
        showToolBar: false,
        showAlgebraInput: false,
        showMenuBar: false,
        enableRightClick: false,
        showResetIcon: true,
        appletOnLoad: ggbOnLoad_22,
    };

    var applet = new GGBApplet(params, true);
    applet.inject("ggb-22");
});

// Eksplorasi Titik potong
function ggbOnLoadEks(api) {
    api.setPerspective("G");

    api.setAxesVisible(true, true);
    api.setGridVisible(true);

    api.setGraphicsOptions(1, {
        gridDistance: [1, 1], // jarak grid utama (1 satuan)
        minorGrid: false, // MATIKAN minor grid
    });

    api.setGraphicsOptions(1, {
        gridType: 0,
    });

    api.setCoordSystem(-10, 10, -10, 10);
    api.setAxisSteps(1, 1, 1, 1);

    // slider p dan q (step 1)
    api.evalCommand("p = Slider(-8, 8, 1)");
    api.evalCommand("q = Slider(-8, 8, 1)");
    api.evalCommand("p = 3");
    api.evalCommand("q = 6");

    // titik potong dan garis
    api.evalCommand("A = (p, 0)");
    api.evalCommand("B = (0, q)");
    api.evalCommand("g = Line(A, B)");

    api.setLabelVisible("A", true);
    api.setLabelVisible("B", true);
    api.setLabelStyle("A", 1);
    api.setLabelStyle("B", 1);

    // --- pindahkan slider ke bawah (posisi pixel) ---
    // catatan: ini posisi relatif ke kiri-atas canvas
    api.setAbsoluteScreenLoc("p", 30, 420);
    api.setAbsoluteScreenLoc("q", 30, 450);

    // opsional: tampilkan nilai p dan q di dekat slider
    api.setLabelVisible("p", true);
    api.setLabelVisible("q", true);
    api.setLabelStyle("p", 1);
    api.setLabelStyle("q", 1);
}

window.addEventListener("load", function () {
    var paramsEks = {
        appName: "classic",
        id: "ggbAppletEks",
        width: 700,
        height: 400,
        showToolBar: false,
        showAlgebraInput: false,
        showMenuBar: false,
        enableRightClick: false,
        showResetIcon: true,
        appletOnLoad: ggbOnLoadEks,
    };

    var appletEks = new GGBApplet(paramsEks, true);
    appletEks.inject("ggb-eksplorasi");
});

// refleksi titik potong
function cekRefleksi() {
    let benar1 =
        document.querySelector('input[name="q1"]:checked')?.value === "b";
    let benar2 =
        document.querySelector('input[name="q2"]:checked')?.value === "b";
    let benar3 =
        document.querySelector('input[name="q3"]:checked')?.value === "b";

    document.getElementById("feedback1").innerHTML = benar1
        ? "✔ Benar"
        : "✘ Perhatikan kembali pergerakan titik.";

    document.getElementById("feedback2").innerHTML = benar2
        ? "✔ Benar"
        : "✘ Perhatikan posisi di bawah 0.";

    document.getElementById("feedback3").innerHTML = benar3
        ? "✔ Benar"
        : "✘ Coba ingat kembali konsep dua titik.";

    if (benar1 && benar2 && benar3) {
        document.getElementById("kesimpulanRefleksi").style.display = "block";
    }
}

// =========================
// LATIHAN SOAL A2.2
// =========================

let latihan1BenarA22 = false;
let latihan2BenarA22 = false;

let sketchLatihan1Instance = null;
let sketchLatihan2Instance = null;

// titik potong yang benar untuk y = 2x + 4
const expectedA1 = { x: -2, y: 0 };
const expectedB1 = { x: 0, y: 4 };

// titik potong benar untuk 3x + 4y - 24 = 0
const expectedA2 = { x: 8, y: 0 };
const expectedB2 = { x: 0, y: 6 };

// =========================
// HELPER
// =========================
function renderMathSafe(target) {
    if (!target || !window.renderMathInElement) return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "$", right: "$", display: false },
            { left: "\\(", right: "\\)", display: false },
            { left: "\\[", right: "\\]", display: true },
        ],
    });
}

function normJawaban(v) {
    return String(v || "")
        .trim()
        .replace(/\s+/g, "")
        .replace(",", ".");
}

function cekIsian(id, jawabanBenar) {
    const el = document.getElementById(id);
    if (!el) return false;

    const nilai = normJawaban(el.value);
    const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
    const cocok = daftar.map(normJawaban).includes(nilai);

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(cocok ? "is-valid" : "is-invalid");

    return cocok;
}

function setFeedback(id, ok, pesan) {
    const el = document.getElementById(id);
    if (!el) return;

    el.innerHTML = pesan;
    el.className = ok
        ? "feedback-box feedback-ok mt-3"
        : "feedback-box feedback-bad mt-3";
    el.style.display = "block";
}

function resetFeedback(id) {
    const el = document.getElementById(id);
    if (!el) return;

    el.innerHTML = "";
    el.className = "mt-3";
    el.style.display = "none";
}

function scrollKeStep(stepId) {
    const content = document.querySelector(".content-wrapper");
    const step = document.getElementById(stepId);

    if (!step) return;

    if (!content) {
        step.scrollIntoView({
            behavior: "smooth",
            block: "start",
        });
        return;
    }

    const contentRect = content.getBoundingClientRect();
    const stepRect = step.getBoundingClientRect();

    const targetTop = content.scrollTop + (stepRect.top - contentRect.top) - 20;

    content.scrollTo({
        top: targetTop,
        behavior: "smooth",
    });
}

function nextLatihan(stepNumber) {
    const step = document.getElementById(`latihanStep${stepNumber}`);
    if (!step) return;

    step.style.display = "block";
    renderMathSafe(step);
    scrollKeStep(`latihanStep${stepNumber}`);
}

function prevLatihan(stepNumber) {
    scrollKeStep(`latihanStep${stepNumber}`);
}

function resetStepSetelah(stepMulai) {
    for (let i = stepMulai; i <= 2; i++) {
        const step = document.getElementById(`latihanStep${i}`);
        if (step) step.style.display = "none";
    }
}

// =========================
// SAVE PROGRESS
// =========================
async function saveProgressMateri() {
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content");

    if (!window.completeMateriUrl || !csrfToken) return false;

    try {
        const response = await fetch(window.completeMateriUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
                "X-Requested-With": "XMLHttpRequest",
                Accept: "application/json",
            },
            body: JSON.stringify({}),
        });

        return response.ok;
    } catch (error) {
        console.error(error);
        return false;
    }
}

function bukaQuizButton() {
    const quizBtn = document.getElementById("quizBabBtn");
    if (!quizBtn) return;

    const url = quizBtn.dataset.quizUrl;
    if (!url) return;

    const link = document.createElement("a");
    link.href = url;
    link.id = "quizBabBtn";
    link.className = "btn btn-next px-4 rounded-pill fw-semibold";
    link.textContent = "Kuis →";

    quizBtn.replaceWith(link);
}

// =========================
// LATIHAN 1 A2.2
// y = 2x + 4
// titik potong x = (-2, 0)
// titik potong y = (0, 4)
// =========================
function cekLatihan1A22() {
    const benar1 = cekIsian("l1_x_value", "-2");
    const benar2 = cekIsian("l1_x_point_x", "-2");
    const benar3 = cekIsian("l1_x_point_y", "0");

    const benar4 = cekIsian("l1_y_value", "4");
    const benar5 = cekIsian("l1_y_point_x", "0");
    const benar6 = cekIsian("l1_y_point_y", "4");

    const semuaBenar = benar1 && benar2 && benar3 && benar4 && benar5 && benar6;
    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (semuaBenar) {
        latihan1BenarA22 = true;

        setFeedback(
            "feedbackLatihan1A22",
            true,
            "Benar! Sekarang klik titik <b>(-2,0)</b> dan <b>(0,4)</b> pada bidang koordinat untuk membentuk garis.",
        );

        tampilkanCanvasLatihan1();
    } else {
        latihan1BenarA22 = false;

        setFeedback(
            "feedbackLatihan1A22",
            false,
            "Masih ada jawaban yang belum tepat. Coba periksa lagi titik potong dengan sumbu x dan sumbu y.",
        );

        resetCanvasLatihan1();

        if (nextBtn) nextBtn.disabled = true;

        resetStepSetelah(2);
    }
}

function resetLatihan1A22() {
    [
        "l1_x_value",
        "l1_x_point_x",
        "l1_x_point_y",
        "l1_y_value",
        "l1_y_point_x",
        "l1_y_point_y",
    ].forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    const nextBtn = document.getElementById("nextBtnLatihan1");

    resetFeedback("feedbackLatihan1A22");

    if (nextBtn) nextBtn.disabled = true;

    latihan1BenarA22 = false;
    resetCanvasLatihan1();
    resetStepSetelah(2);
}

function tampilkanCanvasLatihan1() {
    const wrap = document.getElementById("canvas-latihan1-wrap");
    if (wrap) wrap.style.display = "block";

    if (sketchLatihan1Instance) {
        sketchLatihan1Instance.remove();
        sketchLatihan1Instance = null;
    }

    const holder = document.getElementById("canvas-latihan1");
    if (holder) holder.innerHTML = "";

    sketchLatihan1Instance = new p5(sketchLatihan1, "canvas-latihan1");

    setTimeout(() => {
        scrollKeStep("canvas-latihan1-wrap");
    }, 100);
}

function resetCanvasLatihan1() {
    if (sketchLatihan1Instance) {
        sketchLatihan1Instance.remove();
        sketchLatihan1Instance = null;
    }

    const holder = document.getElementById("canvas-latihan1");
    if (holder) holder.innerHTML = "";

    const wrap = document.getElementById("canvas-latihan1-wrap");
    if (wrap) wrap.style.display = "none";
}

// =========================
// LATIHAN 2 A2.2
// 3x + 4y - 24 = 0
// titik potong x = (8, 0)
// titik potong y = (0, 6)
// =========================
function cekLatihan2A22() {
    const benar1 = cekIsian("l2_x_value", "8");
    const benar2 = cekIsian("l2_x_point_x", "8");
    const benar3 = cekIsian("l2_x_point_y", "0");

    const benar4 = cekIsian("l2_y_value", "6");
    const benar5 = cekIsian("l2_y_point_x", "0");
    const benar6 = cekIsian("l2_y_point_y", "6");

    const semuaBenar = benar1 && benar2 && benar3 && benar4 && benar5 && benar6;

    if (semuaBenar) {
        latihan2BenarA22 = true;

        setFeedback(
            "feedbackLatihan2A22",
            true,
            "Benar! Sekarang klik titik <b>(8,0)</b> dan <b>(0,6)</b> pada bidang koordinat.",
        );

        tampilkanCanvasLatihan2();
    } else {
        latihan2BenarA22 = false;

        setFeedback(
            "feedbackLatihan2A22",
            false,
            "Masih ada jawaban yang belum tepat. Coba periksa lagi titik potong dengan sumbu x dan sumbu y.",
        );

        resetCanvasLatihan2();

        const kesimpulan = document.getElementById("kesimpulanLatihan2A22");
        if (kesimpulan) kesimpulan.style.display = "none";
    }
}

function resetLatihan2A22() {
    [
        "l2_x_value",
        "l2_x_point_x",
        "l2_x_point_y",
        "l2_y_value",
        "l2_y_point_x",
        "l2_y_point_y",
    ].forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    resetFeedback("feedbackLatihan2A22");

    latihan2BenarA22 = false;
    resetCanvasLatihan2();

    const kesimpulan = document.getElementById("kesimpulanLatihan2A22");
    if (kesimpulan) kesimpulan.style.display = "none";
}

function tampilkanCanvasLatihan2() {
    const wrap = document.getElementById("canvas-latihan2-wrap");
    if (wrap) wrap.style.display = "block";

    if (sketchLatihan2Instance) {
        sketchLatihan2Instance.remove();
        sketchLatihan2Instance = null;
    }

    const holder = document.getElementById("canvas-latihan2");
    if (holder) holder.innerHTML = "";

    sketchLatihan2Instance = new p5(sketchLatihan2, "canvas-latihan2");

    setTimeout(() => {
        scrollKeStep("canvas-latihan2-wrap");
    }, 100);
}

function resetCanvasLatihan2() {
    if (sketchLatihan2Instance) {
        sketchLatihan2Instance.remove();
        sketchLatihan2Instance = null;
    }

    const holder = document.getElementById("canvas-latihan2");
    if (holder) holder.innerHTML = "";

    const wrap = document.getElementById("canvas-latihan2-wrap");
    if (wrap) wrap.style.display = "none";
}

// =========================
// P5 SKETCH LATIHAN 1
// =========================
const sketchLatihan1 = (p) => {
    const gridSize = 500;
    const leftMargin = 40;
    const topMargin = 40;

    let originX, originY, scaleUnit;
    let titikA = null;
    let titikB = null;

    let plottingSelesai = false;
    let plottingBenar = false;
    let waktuReset = null;

    let feedbackPlot =
        "Klik dua titik potong yang benar pada bidang koordinat.";

    p.setup = function () {
        p.createCanvas(760, 600);

        scaleUnit = gridSize / 20;
        originX = leftMargin + gridSize / 2;
        originY = topMargin + gridSize / 2;
    };

    p.draw = function () {
        p.background(255);

        drawGrid();
        drawPanelKanan();

        if (titikA) drawPoint(titikA.x, titikA.y, "A");
        if (titikB) drawPoint(titikB.x, titikB.y, "B");

        if (titikA && titikB) {
            drawLineThroughPoints(titikA, titikB);
        }

        if (waktuReset !== null && p.millis() >= waktuReset) {
            resetPlot();
            waktuReset = null;
        }
    };

    p.mousePressed = function () {
        if (!latihan1BenarA22) return;

        const pt = pixelToCoord(p.mouseX, p.mouseY);
        if (!pt) return;

        if (waktuReset !== null) return;

        if (!titikA) {
            titikA = pt;
            feedbackPlot = `Titik A dipilih di ${formatPoint(pt)}. Sekarang klik titik kedua.`;
            return;
        }

        if (!titikB) {
            if (isSamePoint(pt, titikA)) {
                feedbackPlot =
                    "Titik kedua tidak boleh sama dengan titik pertama.";
                return;
            }

            titikB = pt;
            plottingSelesai = true;

            if (isCorrectPair(titikA, titikB, expectedA1, expectedB1)) {
                plottingBenar = true;
                feedbackPlot =
                    "Bagus! Garis yang kamu buat sudah melalui dua titik potong yang benar.";

                const nextBtn = document.getElementById("nextBtnLatihan1");
                if (nextBtn) {
                    nextBtn.disabled = false;
                    nextBtn.style.display = "inline-block";
                }

                setTimeout(() => {
                    scrollKeStep("nextBtnLatihan1");
                }, 300);
            } else {
                plottingBenar = false;
                feedbackPlot = "Garis belum sesuai. Coba lagi sampai benar.";
                waktuReset = p.millis() + 1200;
            }
        }
    };

    function resetPlot() {
        titikA = null;
        titikB = null;
        plottingSelesai = false;
        plottingBenar = false;
        feedbackPlot =
            "Klik dua titik potong yang benar pada bidang koordinat.";
    }

    function isSamePoint(p1, p2) {
        return p1 && p2 && p1.x === p2.x && p1.y === p2.y;
    }

    function isPointEqual(p1, p2) {
        return p1.x === p2.x && p1.y === p2.y;
    }

    function isCorrectPair(a, b, expected1, expected2) {
        return (
            (isPointEqual(a, expected1) && isPointEqual(b, expected2)) ||
            (isPointEqual(a, expected2) && isPointEqual(b, expected1))
        );
    }

    function formatPoint(pt) {
        return `(${pt.x},${pt.y})`;
    }

    function drawGrid() {
        p.stroke(230);
        p.strokeWeight(1);

        for (let x = -10; x <= 10; x++) {
            const px = originX + x * scaleUnit;
            p.line(px, topMargin, px, topMargin + gridSize);
        }

        for (let y = -10; y <= 10; y++) {
            const py = originY - y * scaleUnit;
            p.line(leftMargin, py, leftMargin + gridSize, py);
        }

        p.stroke(0);
        p.strokeWeight(2);
        p.line(leftMargin, originY, leftMargin + gridSize, originY);
        p.line(originX, topMargin, originX, topMargin + gridSize);

        p.noStroke();
        p.fill(0);
        p.textAlign(p.CENTER, p.CENTER);
        p.textSize(12);

        for (let i = -10; i <= 10; i++) {
            const px = originX + i * scaleUnit;
            if (i !== 0) p.text(i, px, originY + 16);
        }

        for (let j = -10; j <= 10; j++) {
            const py = originY - j * scaleUnit;
            if (j !== 0) p.text(j, originX - 16, py);
        }

        p.text("0", originX - 10, originY + 16);

        p.textSize(16);
        p.text("X", leftMargin + gridSize + 15, originY);
        p.text("Y", originX, topMargin - 15);
    }

    function drawPanelKanan() {
        const panelX = 565;
        const panelW = 170;

        p.noStroke();
        p.fill(0);
        p.textAlign(p.LEFT, p.TOP);

        p.textSize(16);
        p.text("Petunjuk", panelX, 40);

        p.textSize(14);
        const petunjuk =
            "1. Klik titik potong pertama.\n" +
            "2. Klik titik potong kedua.\n" +
            "3. Setelah dua titik dipilih, garis akan terbentuk.\n" +
            "4. Sistem akan memeriksa apakah garis sudah benar.";
        p.text(petunjuk, panelX, 70, panelW, 150);

        p.text(feedbackPlot, panelX, 250, panelW, 120);
    }

    function drawPoint(x, y, label) {
        const px = toPixelX(x);
        const py = toPixelY(y);

        p.fill(220, 0, 0);
        p.noStroke();
        p.circle(px, py, 10);

        p.fill(0);
        p.textAlign(p.LEFT, p.BOTTOM);
        p.textSize(13);
        p.text(label, px + 8, py - 4);
    }

    function drawLineThroughPoints(p1, p2) {
        if (p1.x === p2.x && p1.y === p2.y) return;

        const seg = getClippedLineSegmentInBox(p1.x, p1.y, p2.x, p2.y);
        if (!seg) return;

        p.stroke(
            plottingSelesai
                ? plottingBenar
                    ? p.color(30, 150, 70)
                    : p.color(220, 80, 80)
                : p.color(30, 120, 255),
        );
        p.strokeWeight(3);

        p.line(
            toPixelX(seg.p1.x),
            toPixelY(seg.p1.y),
            toPixelX(seg.p2.x),
            toPixelY(seg.p2.y),
        );
    }

    function getClippedLineSegmentInBox(x1, y1, x2, y2) {
        if (x1 === x2) {
            if (x1 < -10 || x1 > 10) return null;
            return {
                p1: { x: x1, y: -10 },
                p2: { x: x1, y: 10 },
            };
        }

        const m = (y2 - y1) / (x2 - x1);
        const c = y1 - m * x1;

        const candidates = [
            { x: -10, y: m * -10 + c },
            { x: 10, y: m * 10 + c },
        ];

        if (m !== 0) {
            candidates.push({ x: (-10 - c) / m, y: -10 });
            candidates.push({ x: (10 - c) / m, y: 10 });
        } else {
            if (c < -10 || c > 10) return null;
            return {
                p1: { x: -10, y: c },
                p2: { x: 10, y: c },
            };
        }

        const inside = candidates.filter(
            (pt) => pt.x >= -10 && pt.x <= 10 && pt.y >= -10 && pt.y <= 10,
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

        return {
            p1: bestPair[0],
            p2: bestPair[1],
        };
    }

    function pixelToCoord(px, py) {
        if (
            px < leftMargin ||
            px > leftMargin + gridSize ||
            py < topMargin ||
            py > topMargin + gridSize
        ) {
            return null;
        }

        let x = Math.round((px - originX) / scaleUnit);
        let y = Math.round((originY - py) / scaleUnit);

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
// P5 SKETCH LATIHAN 2
// =========================
const sketchLatihan2 = (p) => {
    const gridSize = 500;
    const leftMargin = 40;
    const topMargin = 40;

    let originX, originY, scaleUnit;
    let titikA = null;
    let titikB = null;

    let plottingSelesai = false;
    let plottingBenar = false;
    let waktuReset = null;

    let feedbackPlot =
        "Klik dua titik potong yang benar pada bidang koordinat.";

    p.setup = function () {
        p.createCanvas(760, 600);

        scaleUnit = gridSize / 20;
        originX = leftMargin + gridSize / 2;
        originY = topMargin + gridSize / 2;
    };

    p.draw = function () {
        p.background(255);

        drawGrid();
        drawPanelKanan();

        if (titikA) drawPoint(titikA.x, titikA.y, "A");
        if (titikB) drawPoint(titikB.x, titikB.y, "B");

        if (titikA && titikB) {
            drawLineThroughPoints(titikA, titikB);
        }

        if (waktuReset !== null && p.millis() >= waktuReset) {
            resetPlot();
            waktuReset = null;
        }
    };

    p.mousePressed = async function () {
        if (!latihan2BenarA22) return;

        const pt = pixelToCoord(p.mouseX, p.mouseY);
        if (!pt) return;

        if (waktuReset !== null) return;

        if (!titikA) {
            titikA = pt;
            feedbackPlot = `Titik A dipilih di ${formatPoint(pt)}. Sekarang klik titik kedua.`;
            return;
        }

        if (!titikB) {
            if (isSamePoint(pt, titikA)) {
                feedbackPlot =
                    "Titik kedua tidak boleh sama dengan titik pertama.";
                return;
            }

            titikB = pt;
            plottingSelesai = true;

            if (isCorrectPair(titikA, titikB, expectedA2, expectedB2)) {
                plottingBenar = true;
                feedbackPlot =
                    "Bagus! Garis yang kamu buat sudah melalui dua titik potong yang benar.";

                const kesimpulan = document.getElementById(
                    "kesimpulanLatihan2A22",
                );
                if (kesimpulan) kesimpulan.style.display = "block";

                const saved = await saveProgressMateri();

                if (saved) {
                    bukaNextButton();
                } else {
                    setFeedback(
                        "feedbackLatihan2A22",
                        true,
                        "Grafik benar, tetapi progres belum tersimpan. Coba refresh atau cek koneksi.",
                    );
                }
            } else {
                plottingBenar = false;
                feedbackPlot = "Garis belum sesuai. Coba lagi sampai benar.";
                waktuReset = p.millis() + 1200;
            }
        }
    };

    function resetPlot() {
        titikA = null;
        titikB = null;
        plottingSelesai = false;
        plottingBenar = false;
        feedbackPlot =
            "Klik dua titik potong yang benar pada bidang koordinat.";
    }

    function isSamePoint(p1, p2) {
        return p1 && p2 && p1.x === p2.x && p1.y === p2.y;
    }

    function isPointEqual(p1, p2) {
        return p1.x === p2.x && p1.y === p2.y;
    }

    function isCorrectPair(a, b, expected1, expected2) {
        return (
            (isPointEqual(a, expected1) && isPointEqual(b, expected2)) ||
            (isPointEqual(a, expected2) && isPointEqual(b, expected1))
        );
    }

    function formatPoint(pt) {
        return `(${pt.x},${pt.y})`;
    }

    function drawGrid() {
        p.stroke(230);
        p.strokeWeight(1);

        for (let x = -10; x <= 10; x++) {
            const px = originX + x * scaleUnit;
            p.line(px, topMargin, px, topMargin + gridSize);
        }

        for (let y = -10; y <= 10; y++) {
            const py = originY - y * scaleUnit;
            p.line(leftMargin, py, leftMargin + gridSize, py);
        }

        p.stroke(0);
        p.strokeWeight(2);
        p.line(leftMargin, originY, leftMargin + gridSize, originY);
        p.line(originX, topMargin, originX, topMargin + gridSize);

        p.noStroke();
        p.fill(0);
        p.textAlign(p.CENTER, p.CENTER);
        p.textSize(12);

        for (let i = -10; i <= 10; i++) {
            const px = originX + i * scaleUnit;
            if (i !== 0) p.text(i, px, originY + 16);
        }

        for (let j = -10; j <= 10; j++) {
            const py = originY - j * scaleUnit;
            if (j !== 0) p.text(j, originX - 16, py);
        }

        p.text("0", originX - 10, originY + 16);

        p.textSize(16);
        p.text("X", leftMargin + gridSize + 15, originY);
        p.text("Y", originX, topMargin - 15);
    }

    function drawPanelKanan() {
        const panelX = 565;
        const panelW = 170;

        p.noStroke();
        p.fill(0);
        p.textAlign(p.LEFT, p.TOP);

        p.textSize(16);
        p.text("Petunjuk", panelX, 40);

        p.textSize(14);
        const petunjuk =
            "1. Klik titik potong pertama.\n" +
            "2. Klik titik potong kedua.\n" +
            "3. Setelah dua titik dipilih, garis akan terbentuk.\n" +
            "4. Sistem akan memeriksa apakah garis sudah benar.";
        p.text(petunjuk, panelX, 70, panelW, 150);

        p.text(feedbackPlot, panelX, 250, panelW, 120);
    }

    function drawPoint(x, y, label) {
        const px = toPixelX(x);
        const py = toPixelY(y);

        p.fill(220, 0, 0);
        p.noStroke();
        p.circle(px, py, 10);

        p.fill(0);
        p.textAlign(p.LEFT, p.BOTTOM);
        p.textSize(13);
        p.text(label, px + 8, py - 4);
    }

    function drawLineThroughPoints(p1, p2) {
        if (p1.x === p2.x && p1.y === p2.y) return;

        const seg = getClippedLineSegmentInBox(p1.x, p1.y, p2.x, p2.y);
        if (!seg) return;

        p.stroke(
            plottingSelesai
                ? plottingBenar
                    ? p.color(30, 150, 70)
                    : p.color(220, 80, 80)
                : p.color(30, 120, 255),
        );
        p.strokeWeight(3);

        p.line(
            toPixelX(seg.p1.x),
            toPixelY(seg.p1.y),
            toPixelX(seg.p2.x),
            toPixelY(seg.p2.y),
        );
    }

    function getClippedLineSegmentInBox(x1, y1, x2, y2) {
        if (x1 === x2) {
            if (x1 < -10 || x1 > 10) return null;
            return {
                p1: { x: x1, y: -10 },
                p2: { x: x1, y: 10 },
            };
        }

        const m = (y2 - y1) / (x2 - x1);
        const c = y1 - m * x1;

        const candidates = [
            { x: -10, y: m * -10 + c },
            { x: 10, y: m * 10 + c },
        ];

        if (m !== 0) {
            candidates.push({ x: (-10 - c) / m, y: -10 });
            candidates.push({ x: (10 - c) / m, y: 10 });
        } else {
            if (c < -10 || c > 10) return null;
            return {
                p1: { x: -10, y: c },
                p2: { x: 10, y: c },
            };
        }

        const inside = candidates.filter(
            (pt) => pt.x >= -10 && pt.x <= 10 && pt.y >= -10 && pt.y <= 10,
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

        return {
            p1: bestPair[0],
            p2: bestPair[1],
        };
    }

    function pixelToCoord(px, py) {
        if (
            px < leftMargin ||
            px > leftMargin + gridSize ||
            py < topMargin ||
            py > topMargin + gridSize
        ) {
            return null;
        }

        let x = Math.round((px - originX) / scaleUnit);
        let y = Math.round((originY - py) / scaleUnit);

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
