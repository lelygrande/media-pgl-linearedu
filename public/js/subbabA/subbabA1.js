// Geogebra
var params2 = {
    appName: "graphing",
    width: 700,
    height: 500,
    showToolBar: false,
    showAlgebraInput: false,
    showMenuBar: false,
    enableShiftDragZoom: true,
    enableRightClick: false,
    showResetIcon: true,
};

var applet2 = new GGBApplet(params2, true);

window.addEventListener("load", function () {
    applet2.inject("ggb-garis");

    setTimeout(function () {
        var ggb = applet2.getAppletObject();
        ggb.evalCommand("A=(0,1)");
        ggb.evalCommand("B=(3,2)");
        ggb.evalCommand("g=Line(A,B)");
        ggb.setLabelVisible("A", true);
        ggb.setLabelVisible("B", true);
    }, 1000);
});

// Eksplorasi
function cekEksplorasiGaris() {
    const kunci = {
        g1: "b",
        g2: "a",
        g3: "b",
    };

    let benarSemua = true;

    for (let key in kunci) {
        const jawaban = document.querySelector(`input[name="${key}"]:checked`);
        const hasil = document.getElementById("hasil" + key);

        if (!jawaban) {
            hasil.innerHTML =
                "<span class='text-warning'>Pilih salah satu jawaban</span>";
            benarSemua = false;
        } else if (jawaban.value === kunci[key]) {
            hasil.innerHTML = "<span class='text-success'>✓ Benar</span>";
        } else {
            hasil.innerHTML = "<span class='text-danger'>✗ Salah</span>";
            benarSemua = false;
        }
    }

    if (benarSemua) {
        document.getElementById("kesimpulanGaris").style.display = "block";
    } else {
        document.getElementById("kesimpulanGaris").style.display = "none";
    }
}

// Memahami bentuk implisit
function cekJawabanABC() {
    const inputA = document.getElementById("inputA").value.trim();
    const inputB = document.getElementById("inputB").value.trim();
    const inputC = document.getElementById("inputC").value.trim();
    const hasil = document.getElementById("hasilABC");

    const benarA = "3";
    const benarB = "2";
    const benarC = "-6";

    let feedback = `
        <div class="alert alert-info">
            <p><strong>Penyelesaian:</strong></p>
            <p>Pada persamaan $3x + 2y - 6 = 0$:</p>
            <ul>
                <li>$a = 3$</li>
                <li>$b = 2$</li>
                <li>$c = -6$</li>
            </ul>
    `;

    if (inputA === benarA && inputB === benarB && inputC === benarC) {
        feedback += `<p class="mb-0 text-success"><strong>Jawaban kamu benar.</strong></p>`;
    } else {
        feedback += `<p class="mb-0 text-danger"><strong>Jawaban kamu belum tepat. Perhatikan kembali koefisien dan konstantanya.</strong></p>`;
    }

    feedback += `</div>`;

    hasil.innerHTML = feedback;
    hasil.style.display = "block";

    if (window.renderMathInElement) {
        renderMathInElement(hasil, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function resetKotakABC() {
    document.getElementById("inputA").value = "";
    document.getElementById("inputB").value = "";
    document.getElementById("inputC").value = "";

    const hasil = document.getElementById("hasilABC");
    hasil.innerHTML = "";
    hasil.style.display = "none";
}
// Contoh menentukan persamaan garis lurus atau tidak
function toggleSolution(id, btn) {
    const el = document.getElementById(id);
    const isHidden = el.style.display === "none";

    el.style.display = isHidden ? "block" : "none";
    btn.textContent = isHidden
        ? "Sembunyikan Penyelesaian"
        : "Lihat Penyelesaian";
}

// Contoh impliasit klik kotak abc
function tampilABC(huruf) {
    const hasil = document.getElementById("hasilABC");

    if (huruf === "a") hasil.innerHTML = "$a = 3$";
    if (huruf === "b") hasil.innerHTML = "$b = 2$";
    if (huruf === "c") hasil.innerHTML = "$c = -6$";

    // Re-render KaTeX untuk konten yang baru dimasukkan
    if (window.renderMathInElement) {
        renderMathInElement(hasil, {
            delimiters: [
                {
                    left: "$$",
                    right: "$$",
                    display: true,
                },
                {
                    left: "$",
                    right: "$",
                    display: false,
                },
            ],
        });
    }
}

// contoh cara mengubah persamaan ke eksplisit
function openStepS(id, btn) {
    const next = document.getElementById(id);
    if (!next) return;

    next.style.display = "block";
    btn.style.display = "none";
}

// contoh menentukan 2y + 4 = x merupakan persamaan lurus
function openStep(n, btn) {
    const next = document.getElementById("step" + n);
    if (!next) return;

    next.style.display = "block";
    btn.style.display = "none";
}

// Latihan Soal
// no 1
function renderKatex(el) {
    if (window.renderMathInElement) {
        renderMathInElement(el, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function cekPasanganBerurutan() {
    const y1 = Number(document.getElementById("t1-y").value);
    const y2 = Number(document.getElementById("t2-y").value);
    const y3 = Number(document.getElementById("t3-y").value);

    // update pasangan
    const pair1 = document.getElementById("pair-t1");
    const pair2 = document.getElementById("pair-t2");
    const pair3 = document.getElementById("pair-t3");

    pair1.innerHTML = `$(-2, ${y1})$`;
    pair2.innerHTML = `$(0, ${y2})$`;
    pair3.innerHTML = `$(2, ${y3})$`;

    // render ulang hanya bagian ini (lebih efisien)
    renderKatex(pair1);
    renderKatex(pair2);
    renderKatex(pair3);

    const fb = document.getElementById("fb-pasangan");

    if (y1 === 4 && y2 === 2 && y3 === 0) {
        fb.innerHTML = "Benar! Titiknya adalah $(-2,4)$, $(0,2)$, dan $(2,0)$.";
    } else {
        fb.innerHTML = "Masih ada yang salah. Gunakan $y = -x + 2$.";
    }

    // render feedback juga
    renderKatex(fb);
}

// no3
function clean(v) {
    return (v || "")
        .toString()
        .trim()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .replace(/,/g, ".");
}

function toNum(v) {
    const n = parseFloat(clean(v));
    return Number.isFinite(n) ? n : null;
}

function approx(a, b, eps = 1e-3) {
    return Math.abs(a - b) <= eps;
}

function setFb(id, ok, msg) {
    const el = document.getElementById(id);
    el.className = "fb " + (ok ? "text-success" : "text-danger");
    el.textContent = msg;
}

document.getElementById("btn-cek-no2").addEventListener("click", () => {
    let score = 0;

    // A: y = -4x + 12
    const aM = toNum(document.getElementById("a-m").value);
    const aC = toNum(document.getElementById("a-c").value);

    if (aM !== null && aC !== null && approx(aM, -4) && approx(aC, 12)) {
        setFb("fb-a", true, "Benar");
        score++;
    } else {
        setFb("fb-a", false, "Belum tepat.");
    }

    // B: y = -4x + 5/3
    const bM = toNum(document.getElementById("b-m").value);
    const bTop = toNum(document.getElementById("b-c-top").value);
    const bBot = toNum(document.getElementById("b-c-bot").value);

    if (bM !== null && bTop !== null && bBot !== null && bBot !== 0) {
        const cVal = bTop / bBot;

        if (approx(bM, -4) && approx(cVal, 5 / 3)) {
            setFb("fb-b", true, "Benar");
            score++;
        } else {
            setFb("fb-b", false, "Belum tepat.");
        }
    } else {
        setFb("fb-b", false, "Isi semua kotak dengan benar.");
    }

    // C: y = (7/3)x - 7
    const cTop = toNum(document.getElementById("c-m-top").value);
    const cBot = toNum(document.getElementById("c-m-bot").value);
    const cC = toNum(document.getElementById("c-c").value);

    if (cTop !== null && cBot !== null && cBot !== 0 && cC !== null) {
        const mVal = cTop / cBot;

        if (approx(mVal, 7 / 3) && approx(cC, 7)) {
            setFb("fb-c", true, "Benar");
            score++;
        } else {
            setFb("fb-c", false, "Belum tepat.");
        }
    } else {
        setFb("fb-c", false, "Isi semua kotak dengan benar.");
    }

    const total = document.getElementById("fb-total");
    if (score === 3) {
        total.className = "mt-3 fw-semibold text-success";
        total.textContent = "Mantap! Semua benar (3/3).";
    } else {
        total.className = "mt-3 fw-semibold text-danger";
        total.textContent = `Skor: ${score}/3.`;
    }
});
