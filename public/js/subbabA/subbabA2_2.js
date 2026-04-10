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

// Latihan soal
// titik potong
function normalizeExpr(str) {
    return String(str)
        .toLowerCase()
        .replace(/\s+/g, '')
        .replace(/−/g, '-')
        .trim();
}

function isOneOf(value, answers) {
    const v = normalizeExpr(value);
    return answers.includes(v);
}

function renderKatex(targets) {
    if (typeof renderMathInElement !== 'function') return;

    targets.forEach(function (target) {
        if (!target) return;

        renderMathInElement(target, {
            delimiters: [
                { left: '$$', right: '$$', display: true },
                { left: '\\(', right: '\\)', display: false },
                { left: '$', right: '$', display: false }
            ],
            throwOnError: false
        });
    });
}

function lockSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (!section) return;

    section.classList.add('step-success');
    section.classList.add('step-locked');

    section.querySelectorAll('input').forEach(function (input) {
        input.setAttribute('readonly', true);
    });

    const button = section.querySelector('button');
    if (button) {
        button.disabled = true;
        button.classList.remove('btn-warning');
        button.classList.add('btn-success');
        button.textContent = 'Sudah Benar';
    }
}

function unlockSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (!section) return;

    section.style.display = 'block';
    section.classList.remove('step-locked');
}

function resetFeedback(id) {
    const el = document.getElementById(id);
    if (!el) return;
    el.style.display = 'none';
    el.innerHTML = '';
}

/* =========================
   BAGIAN A
========================= */
const btnA = document.getElementById('btn-cek-a');
if (btnA) {
    btnA.addEventListener('click', function () {
        const L1 = document.getElementById('L1').value;
        const L2 = document.getElementById('L2').value;
        const L3 = document.getElementById('L3').value;

        const feedbackA = document.getElementById('feedback-a');

        let pesan = [];
        let benar = true;

        if (!isOneOf(L1, ['8-4x', '-4x+8'])) {
            benar = false;
            pesan.push('Langkah 1 belum tepat. Perhatikan kembali bentuk \\(-2y = ...\\).');
        }

        if (!isOneOf(L2, ['-4+2x', '2x-4'])) {
            benar = false;
            pesan.push('Langkah 2 belum tepat. Tuliskan nilai \\(y\\) dari bentuk sebelumnya.');
        }

        if (!isOneOf(L3, ['2x-4'])) {
            benar = false;
            pesan.push('Langkah 3 belum tepat. Susun hasilnya ke bentuk \\(y = mx + c\\).');
        }

        feedbackA.style.display = 'block';

        if (benar) {
            feedbackA.innerHTML = `
                <div class="alert alert-success mb-0">
                    <b>Bagus!</b> Kamu sudah memperoleh bentuk persamaan <b>\\(y = 2x - 4\\)</b>.
                </div>
            `;

            lockSection('bagianA');
            unlockSection('bagianB');
        } else {
            feedbackA.innerHTML = `
                <div class="alert alert-warning mb-0">
                    <b>Coba perhatikan kembali bagian A.</b><br><br>
                    ${pesan.join('<br><br>')}
                </div>
            `;
        }

        renderKatex([feedbackA]);
    });
}

/* =========================
   BAGIAN B
========================= */
const btnB = document.getElementById('btn-cek-b');
if (btnB) {
    btnB.addEventListener('click', function () {
        const sx1_left = document.getElementById('sx1_left').value;
        const sx1_right = document.getElementById('sx1_right').value;

        const sx2_left = document.getElementById('sx2_left').value;
        const sx2_right = document.getElementById('sx2_right').value;

        const sx3 = document.getElementById('sx3').value;
        const sx4x = document.getElementById('sx4x').value;
        const sx4y = document.getElementById('sx4y').value;

        const feedbackB = document.getElementById('feedback-b');

        let pesan = [];
        let benar = true;

        const langkah1Benar =
            isOneOf(sx1_left, ['0', '0.0']) &&
            isOneOf(sx1_right, ['2x-4', '-4+2x']);

        if (!langkah1Benar) {
            benar = false;
            pesan.push('Langkah 1 belum tepat. Substitusikan nilai \\(y = 0\\) ke persamaan \\(y = 2x - 4\\).');
        }

        const left2 = normalizeExpr(sx2_left);
        const right2 = normalizeExpr(sx2_right);

        const langkah2Benar =
            (left2 === '2x' && right2 === '4') ||
            (left2 === '-2x' && right2 === '-4');

        if (!langkah2Benar) {
            benar = false;
            pesan.push('Langkah 2 belum tepat. Sederhanakan persamaan yang sudah diperoleh.');
        }

        if (!isOneOf(sx3, ['2', '2.0'])) {
            benar = false;
            pesan.push('Langkah 3 belum tepat. Tentukan nilai \\(x\\) dari persamaan sederhana tersebut.');
        }

        if (!(isOneOf(sx4x, ['2', '2.0']) && isOneOf(sx4y, ['0', '0.0']))) {
            benar = false;
            pesan.push('Langkah 4 belum tepat. Tuliskan titik potong sumbu \\(x\\) dalam bentuk \\((x,y)\\).');
        }

        feedbackB.style.display = 'block';

        if (benar) {
            feedbackB.innerHTML = `
                <div class="alert alert-success mb-0">
                    <b>Bagus!</b> Kamu sudah menemukan titik potong sumbu \\(x\\), yaitu <b>\\((2, 0)\\)</b>.
                </div>
            `;

            lockSection('bagianB');
            unlockSection('bagianC');
        } else {
            feedbackB.innerHTML = `
                <div class="alert alert-warning mb-0">
                    <b>Coba perhatikan kembali bagian B.</b><br><br>
                    ${pesan.join('<br><br>')}
                </div>
            `;
        }

        renderKatex([feedbackB]);
    });
}

/* =========================
   BAGIAN C
========================= */
const btnC = document.getElementById('btn-cek-c');
if (btnC) {
    btnC.addEventListener('click', function () {
        const sy1 = document.getElementById('sy1').value;
        const sy2 = document.getElementById('sy2').value;
        const sy3x = document.getElementById('sy3x').value;
        const sy3y = document.getElementById('sy3y').value;

        const feedbackC = document.getElementById('feedback-c');
        const canvasHolder = document.getElementById('canvas-holder');

        let pesan = [];
        let benar = true;

        if (!isOneOf(sy1, ['0', '0.0'])) {
            benar = false;
            pesan.push('Langkah 1 belum tepat. Masukkan nilai \\(x = 0\\) ke bentuk \\(y = 2(x) - 4\\).');
        }

        if (!isOneOf(sy2, ['-4', '-4.0'])) {
            benar = false;
            pesan.push('Langkah 2 belum tepat. Sederhanakan hasil substitusi untuk memperoleh nilai \\(y\\).');
        }

        if (!(isOneOf(sy3x, ['0', '0.0']) && isOneOf(sy3y, ['-4', '-4.0']))) {
            benar = false;
            pesan.push('Langkah 3 belum tepat. Tuliskan titik potong sumbu \\(y\\) dalam bentuk \\((x,y)\\).');
        }

        feedbackC.style.display = 'block';

        if (benar) {
            feedbackC.innerHTML = `
                <div class="alert alert-success mb-0">
                    <b>Bagus!</b> Kamu sudah menemukan titik potong sumbu \\(y\\), yaitu <b>\\((0, -4)\\)</b>.
                </div>
            `;

            lockSection('bagianC');

            if (canvasHolder) {
                canvasHolder.style.display = 'block';
            }

            if (typeof resetAllP5 === 'function') {
                resetAllP5();
            }

            if (typeof windowResized === 'function') {
                try { windowResized(); } catch (e) {}
            }
        } else {
            feedbackC.innerHTML = `
                <div class="alert alert-warning mb-0">
                    <b>Coba perhatikan kembali bagian C.</b><br><br>
                    ${pesan.join('<br><br>')}
                </div>
            `;

            if (canvasHolder) {
                canvasHolder.style.display = 'none';
            }
        }

        renderKatex([feedbackC]);
    });
}

/* =========================
   RESET SEMUA
========================= */
const btnResetAll = document.getElementById('btn-reset-all');
if (btnResetAll) {
    btnResetAll.addEventListener('click', function () {
        document.querySelectorAll('.input-step').forEach(function (el) {
            el.value = '';
            el.removeAttribute('readonly');
        });

        const bagianA = document.getElementById('bagianA');
        const bagianB = document.getElementById('bagianB');
        const bagianC = document.getElementById('bagianC');

        if (bagianA) bagianA.classList.remove('step-success', 'step-locked');
        if (bagianB) {
            bagianB.classList.remove('step-success', 'step-locked');
            bagianB.style.display = 'none';
        }
        if (bagianC) {
            bagianC.classList.remove('step-success', 'step-locked');
            bagianC.style.display = 'none';
        }

        const btnA = document.getElementById('btn-cek-a');
        const btnB = document.getElementById('btn-cek-b');
        const btnC = document.getElementById('btn-cek-c');

        if (btnA) {
            btnA.disabled = false;
            btnA.classList.remove('btn-success');
            btnA.classList.add('btn-warning');
            btnA.textContent = 'Cek Bagian A';
        }

        if (btnB) {
            btnB.disabled = false;
            btnB.classList.remove('btn-success');
            btnB.classList.add('btn-warning');
            btnB.textContent = 'Cek Bagian B';
        }

        if (btnC) {
            btnC.disabled = false;
            btnC.classList.remove('btn-success');
            btnC.classList.add('btn-warning');
            btnC.textContent = 'Cek Bagian C';
        }

        resetFeedback('feedback-a');
        resetFeedback('feedback-b');
        resetFeedback('feedback-c');

        const canvasHolder = document.getElementById('canvas-holder');
        if (canvasHolder) {
            canvasHolder.style.display = 'none';
        }

        if (typeof resetAllP5 === 'function') {
            resetAllP5();
        }
    });
}
