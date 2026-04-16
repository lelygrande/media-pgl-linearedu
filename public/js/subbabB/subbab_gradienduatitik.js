// Eksplorasi
function normalizeMathInput(text) {
    return text
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/_/g, "")
        .replace(/[(){}[\]]/g, "")
        .replace(/₁/g, "1")
        .replace(/₂/g, "2")
        .replace(/−/g, "-")
        .trim();
}

function isEquivalent(input, validAnswers) {
    const normalized = normalizeMathInput(input);
    return validAnswers.some((ans) => normalizeMathInput(ans) === normalized);
}

function cekEksplorasiDuaTitik() {
    const ex1 = document.getElementById("ex1_input").value;
    const ex2 = document.getElementById("ex2_input").value;
    const atas = document.getElementById("eks_subY2").value;
    const bawah = document.getElementById("eks_subX2").value;

    const fb1 = document.getElementById("fb_ex1");
    const fb2 = document.getElementById("fb_ex2");
    const fb3 = document.getElementById("fb_ex3");
    const kesimpulan = document.getElementById("kesimpulanEksDuaTitik");

    let skor = 0;

    const benarEx1 = isEquivalent(ex1, ["y2-y1", "y_2-y_1"]);
    const benarEx2 = isEquivalent(ex2, ["x2-x1", "x_2-x_1"]);
    const benarAtas = isEquivalent(atas, ["y2-y1", "y_2-y_1"]);
    const benarBawah = isEquivalent(bawah, ["x2-x1", "x_2-x_1"]);

    if (benarEx1) {
        fb1.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Benar. Selisih nilai $y$ dari titik A ke titik B adalah $y_2 - y_1$.
            </div>
        `;
        skor++;
    } else {
        fb1.innerHTML = `
            <div class="alert alert-warning py-2 mb-0">
                Belum tepat. <b>Hint:</b> selisih diperoleh dari <i>nilai akhir dikurangi nilai awal</i>.
                Perhatikan koordinat $y$ pada titik B dan titik A.
            </div>
        `;
    }

    if (benarEx2) {
        fb2.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Benar. Selisih nilai $x$ dari titik A ke titik B adalah $x_2 - x_1$.
            </div>
        `;
        skor++;
    } else {
        fb2.innerHTML = `
            <div class="alert alert-warning py-2 mb-0">
                Belum tepat. <b>Hint:</b> selisih diperoleh dari <i>nilai akhir dikurangi nilai awal</i>.
                Perhatikan koordinat $x$ pada titik B dan titik A.
            </div>
        `;
    }

    if (benarAtas && benarBawah) {
        fb3.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                Benar. Gradien adalah perbandingan selisih nilai $y$ terhadap selisih nilai $x$.
            </div>
        `;
        skor++;
    } else {
        let hintAtas = !benarAtas
            ? `Bagian <b>atas</b> pecahan berisi selisih nilai $y$. `
            : "";
        let hintBawah = !benarBawah
            ? `Bagian <b>bawah</b> pecahan berisi selisih nilai $x$.`
            : "";

        fb3.innerHTML = `
            <div class="alert alert-warning py-2 mb-0">
                Belum tepat. <b>Hint:</b> ${hintAtas}${hintBawah}
            </div>
        `;
    }

    if (skor === 3) {
        kesimpulan.innerHTML = `
            <div class="alert alert-success mb-0">
                <b>Kesimpulan:</b> Gradien garis yang melalui titik $A(x_1,y_1)$ dan $B(x_2,y_2)$ adalah
                $$m=\\frac{y_2-y_1}{x_2-x_1}$$
            </div>
        `;
    } else {
        kesimpulan.innerHTML = `
            <div class="alert alert-info mb-0">
                Coba perbaiki lagi jawabanmu dengan memperhatikan bahwa kita bergerak dari titik A ke titik B,
                yaitu dari titik awal ke titik akhir.
            </div>
        `;
    }

    if (typeof renderMathInElement === "function") {
        renderMathInElement(document.body, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function resetEksplorasiDuaTitik() {
    document.getElementById("ex1_input").value = "";
    document.getElementById("ex2_input").value = "";
    document.getElementById("subY2").value = "";
    document.getElementById("subX2").value = "";

    document.getElementById("fb_ex1").innerHTML = "";
    document.getElementById("fb_ex2").innerHTML = "";
    document.getElementById("fb_ex3").innerHTML = "";
    document.getElementById("kesimpulanEksDuaTitik").innerHTML = "";
}

// Penjelasan Konsep

function kRender(tex, targetId, displayMode = true) {
    const node = document.getElementById(targetId);
    if (!node) return;
    katex.render(tex, node, {
        throwOnError: false,
        displayMode,
    });
}

function toggleExplain(id) {
    const box = document.getElementById(id);
    const chev = document.getElementById("chev_" + id);

    const isOpen = box.style.display === "block";
    box.style.display = isOpen ? "none" : "block";

    if (chev) {
        chev.classList.toggle("open", !isOpen);
        chev.textContent = isOpen ? "▾" : "▴"; // mirip "Hide explanation"
    }
}

document.addEventListener("DOMContentLoaded", () => {
    // definisi gradien (ingat: KA = dy/dx, bukan dx/dy)
    kRender(
        String.raw`m=\frac{\text{perubahan pada }y}{\text{perubahan pada }x}=\frac{\Delta y}{\Delta x}`,
        "katex_def",
    );

    // Δx & Δy formulas
    kRender(String.raw`\Delta x=x_2-x_1`, "katex_dx");
    kRender(String.raw`\Delta y=y_2-y_1`, "katex_dy");

    // contoh penjelasan Δx (3 ke 7)
    kRender(String.raw`x_2-x_1\\=7-3\\=4`, "katex_dx_ex");

    // contoh penjelasan Δy (2 ke 9)
    kRender(String.raw`y_2-y_1\\=9-2\\=7`, "katex_dy_ex");

    // rumus final
    kRender(
        String.raw`m=\frac{\color{#9c6a00}{\text{Perubahan pada }y}}{\color{#2e7d32}{\text{Perubahan pada }x}}
    =
    \frac{\color{#9c6a00}{y_2-y_1}}{\color{#2e7d32}{x_2-x_1}}`,
        "katex_final",
    );
});

// Eksplorasi
function renderKatexSafe() {
    // re-render KaTeX auto-render untuk konten baru
    if (typeof renderMathInElement === "function") {
        renderMathInElement(document.body, {
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

function picked(name) {
    const el = document.querySelector(`input[name="${name}"]:checked`);
    return el ? el.value : null;
}

function setFeedback(id, ok, msgOk, msgNo) {
    const el = document.getElementById(id);
    el.innerHTML = ok
        ? `<div class="text-success small"><b>Benar ✓</b> ${msgOk || ""}</div>`
        : `<div class="text-danger small"><b>Belum tepat</b> ${msgNo || ""}</div>`;
}

// Step by step
// ==== KUNCI JAWABAN (contoh P(1,3) Q(5,7)) ====
const ANSWER = { x1: 1, y1: 3, x2: 5, y2: 7, m: 1 };

let hintIndex = 0;
const hints = [
    "Ingat rumus gradien: m = (y₂ − y₁) / (x₂ − x₁).",
    "Ambil (x₁,y₁) dari titik pertama dan (x₂,y₂) dari titik kedua.",
    "Hitung y₂ − y₁ dan x₂ − x₁ secara terpisah dulu.",
    "Terakhir, bagi hasilnya untuk dapat m.",
];

// ==== UTIL ====
function el(id) {
    return document.getElementById(id);
}

function setLocked(step, locked) {
    const card = el(`card_s${step}`);
    const badge = el(`lock_s${step}`);
    const body = el(`s${step}_body`);

    if (locked) {
        card.style.opacity = ".55";
        badge.className = "badge bg-secondary";
        badge.textContent = "Locked";
        body.style.display = "none";
    } else {
        card.style.opacity = "1";
        badge.className = "badge bg-success";
        badge.textContent = "Unlocked";
        body.style.display = "block";
    }
}

function normalizeFraction(input) {
    const s = String(input).trim();
    if (!s) return null;

    if (s.includes("/")) {
        const parts = s.split("/");
        if (parts.length !== 2) return null;
        const a = Number(parts[0].trim());
        const b = Number(parts[1].trim());
        if (!Number.isFinite(a) || !Number.isFinite(b) || b === 0) return null;
        return a / b;
    }
    const n = Number(s);
    return Number.isFinite(n) ? n : null;
}

// ==== KATEX RENDER ====
function renderStep2Katex() {
    const x1 = el("x1").value || "?";
    const y1 = el("y1").value || "?";
    const x2 = el("x2").value || "?";
    const y2 = el("y2").value || "?";

    const tex = `m=\\frac{y_2-y_1}{x_2-x_1}=\\frac{${y2}-${y1}}{${x2}-${x1}}`;

    // Pastikan KaTeX sudah ada (katex.min.js)
    katex.render(tex, el("katex_step2"), {
        throwOnError: false,
        displayMode: true,
    });
}

// ==== STEP LOGIC ====
function checkStep1() {
    el("fb_s1").innerHTML = "";

    const x1 = Number(el("x1").value);
    const y1 = Number(el("y1").value);
    const x2 = Number(el("x2").value);
    const y2 = Number(el("y2").value);

    const ok =
        x1 === ANSWER.x1 &&
        y1 === ANSWER.y1 &&
        x2 === ANSWER.x2 &&
        y2 === ANSWER.y2;

    if (!ok) {
        el("fb_s1").innerHTML =
            `<div class="text-danger">Belum tepat. Cek lagi titik P dan Q.</div>`;
        return;
    }

    el("fb_s1").innerHTML =
        `<div class="text-success">Langkah 1 benar. Step berikutnya terbuka.</div>`;
    setLocked(2, false);
    renderStep2Katex();
}

function unlockStep3() {
    setLocked(3, false);
}

function checkStep3() {
    el("fb_s3").innerHTML = "";

    const mVal = normalizeFraction(el("m").value);
    if (mVal === null) {
        el("fb_s3").innerHTML =
            `<div class="text-danger">Format jawaban tidak valid. Pakai 1 atau a/b.</div>`;
        return;
    }

    if (Math.abs(mVal - ANSWER.m) < 1e-9) {
        el("fb_s3").innerHTML =
            `<div class="text-success">Benar! Gradiennya ${ANSWER.m}.</div>`;
    } else {
        el("fb_s3").innerHTML =
            `<div class="text-danger">Belum tepat. Coba hitung (7−3)/(5−1).</div>`;
    }
}

// ==== HINTS + SOLUTION ====
function hintNext() {
    el("hintBox").style.display = "block";
    el("hintBox").innerHTML =
        `Hint ${Math.min(hintIndex + 1, hints.length)}: ${hints[Math.min(hintIndex, hints.length - 1)]}`;
    if (hintIndex < hints.length - 1) hintIndex++;
}

function showSolution() {
    // unlock all
    setLocked(2, false);
    setLocked(3, false);

    // fill answer
    el("x1").value = ANSWER.x1;
    el("y1").value = ANSWER.y1;
    el("x2").value = ANSWER.x2;
    el("y2").value = ANSWER.y2;
    el("m").value = String(ANSWER.m);

    renderStep2Katex();

    el("solutionBox").style.display = "block";
    el("solutionBox").innerHTML = `
    <div><b>Solution</b></div>
    <div>Step 1: (x₁,y₁)=(${ANSWER.x1},${ANSWER.y1}), (x₂,y₂)=(${ANSWER.x2},${ANSWER.y2})</div>
    <div>Step 2: m=(y₂−y₁)/(x₂−x₁)=(7−3)/(5−1)</div>
    <div>Step 3: m=4/4=1</div>
  `;
}

function resetAll() {
    ["x1", "y1", "x2", "y2", "m"].forEach((id) => (el(id).value = ""));
    ["fb_s1", "fb_s3"].forEach((id) => (el(id).innerHTML = ""));
    el("hintBox").style.display = "none";
    el("solutionBox").style.display = "none";
    hintIndex = 0;

    // Step 2 & 3 locked again
    setLocked(2, true);
    setLocked(3, true);

    // kosongkan katex container
    el("katex_step2").innerHTML = "";
}

// init state
document.addEventListener("DOMContentLoaded", () => {
    setLocked(2, true);
    setLocked(3, true);

    // optional: kalau user edit input setelah benar, update substitusi kalau step2 udah kebuka
    ["x1", "y1", "x2", "y2"].forEach((id) => {
        el(id).addEventListener("input", () => {
            if (el("s2_body").style.display === "block") renderStep2Katex();
        });
    });
});

// Latihan Soal
function normalisasiNilai(teks) {
    return (teks || "")
        .trim()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .toLowerCase();
}

function renderMath(target) {
    if (typeof renderMathInElement !== "function" || !target) return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "\\[", right: "\\]", display: true },
            { left: "\\(", right: "\\)", display: false },
            { left: "$", right: "$", display: false }
        ],
        throwOnError: false
    });
}

// =========================
// BUKA CARD BERIKUTNYA
// =========================
function tampilkanCardLatihan(idCard) {
    const card = document.getElementById(idCard);
    if (!card) return;

    card.classList.remove("d-none");
    setTimeout(() => {
        card.scrollIntoView({
            behavior: "smooth",
            block: "start"
        });
    }, 150);

    renderMath(card);
}

document.addEventListener("DOMContentLoaded", function () {
    ["cardLatihan1", "cardLatihan2", "cardLatihan3"].forEach(id => {
        const el = document.getElementById(id);
        if (el) renderMath(el);
    });
});

// =========================
// VALIDASI UMUM
// =========================
function cekField(id, jawabanBenar, labelTampil) {
    const el = document.getElementById(id);
    if (!el) return { benar: false, label: `Field ${id} tidak ditemukan.` };

    const nilaiUser = normalisasiNilai(el.value);
    const nilaiKunci = normalisasiNilai(jawabanBenar);

    if (!isNaN(nilaiUser) && !isNaN(nilaiKunci)) {
        if (Number(nilaiUser) === Number(nilaiKunci)) {
            el.classList.remove("is-invalid");
            el.classList.add("is-valid");
            return { benar: true, label: labelTampil };
        }
    }

    if (nilaiUser === nilaiKunci) {
        el.classList.remove("is-invalid");
        el.classList.add("is-valid");
        return { benar: true, label: labelTampil };
    }

    el.classList.remove("is-valid");
    el.classList.add("is-invalid");
    return { benar: false, label: labelTampil };
}

function prosesPengecekan(data) {
    const salah = [];

    data.forEach((item) => {
        const hasil = cekField(item.id, item.jawaban, item.label);
        if (!hasil.benar) salah.push(item.label);
    });

    return {
        semuaBenar: salah.length === 0,
        salah: salah,
    };
}

function tampilkanFeedback(containerId, hasil, nomor, pesanBenar) {
    const fb = document.getElementById(containerId);
    if (!fb) return hasil.semuaBenar;

    if (hasil.semuaBenar) {
        fb.innerHTML = `
            <div class="alert alert-success py-2 mb-0">
                ${pesanBenar}
            </div>
        `;
    } else {
        const daftarSalah = hasil.salah
            .map((item) => `<li>${item}</li>`)
            .join("");

        fb.innerHTML = `
            <div class="alert alert-danger py-2 mb-0">
                Jawaban nomor ${nomor} masih ada yang salah.
                <ul class="mb-0 mt-2">${daftarSalah}</ul>
            </div>
        `;
    }

    renderMath(fb);
    return hasil.semuaBenar;
}

// =========================
// LATIHAN 1
// =========================
function cekLatihanTitik1() {
    const data = [
        { id: "l1x1", jawaban: "-3", label: "Nilai \\(x_1\\) belum benar." },
        { id: "l1y1", jawaban: "6", label: "Nilai \\(y_1\\) belum benar." },
        { id: "l1x2", jawaban: "5", label: "Nilai \\(x_2\\) belum benar." },
        { id: "l1y2", jawaban: "-4", label: "Nilai \\(y_2\\) belum benar." },

        { id: "l1_subY2", jawaban: "-4", label: "Bagian \\(y_2\\) pada pembilang belum benar." },
        { id: "l1_subY1", jawaban: "6", label: "Bagian \\(y_1\\) pada pembilang belum benar." },
        { id: "l1_subX2", jawaban: "5", label: "Bagian \\(x_2\\) pada penyebut belum benar." },
        { id: "l1_subX1", jawaban: "-3", label: "Bagian \\(x_1\\) pada penyebut belum benar." },

        { id: "l1_hasilAtas", jawaban: "-10", label: "Hasil pembilang belum benar." },
        { id: "l1_hasilBawah", jawaban: "8", label: "Hasil penyebut belum benar." },
        { id: "l1_hasilAkhirAtas", jawaban: "-5", label: "Pembilang hasil akhir belum benar." },
        { id: "l1_hasilAkhirBawah", jawaban: "4", label: "Penyebut hasil akhir belum benar." },
    ];

    const hasil = prosesPengecekan(data);
    const benar = tampilkanFeedback(
        "fbLatihan1",
        hasil,
        1,
        "Jawaban nomor 1 benar. Lanjut ke latihan berikutnya..."
    );

    if (benar) {
        setTimeout(() => {
            tampilkanCardLatihan("cardLatihan2");
        }, 700);
    }

    return benar;
}

function resetLatihanTitik1() {
    [
        "l1x1", "l1y1", "l1x2", "l1y2",
        "l1_subY2", "l1_subY1", "l1_subX2", "l1_subX1",
        "l1_hasilAtas", "l1_hasilBawah", "l1_hasilAkhirAtas", "l1_hasilAkhirBawah"
    ].forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    const fb = document.getElementById("fbLatihan1");
    if (fb) fb.innerHTML = "";
}

// =========================
// LATIHAN 2
// =========================
function cekLatihanTitik2() {
    const data = [
        { id: "x1_2", jawaban: "1", label: "Nilai \\(x_1\\) pada nomor 2 belum benar." },
        { id: "y1_2", jawaban: "2", label: "Nilai \\(y_1\\) pada nomor 2 belum benar." },
        { id: "x2_2", jawaban: "5", label: "Nilai \\(x_2\\) pada nomor 2 belum benar." },
        { id: "y2_2", jawaban: "p", label: "Nilai \\(y_2\\) pada nomor 2 belum benar." },
        { id: "m_2", jawaban: "1", label: "Nilai gradien \\(m\\) pada nomor 2 belum benar." },
        { id: "kiri1_2", jawaban: "1", label: "Ruas kiri pada langkah substitusi belum benar." },
        { id: "subY2_2", jawaban: "p", label: "Bagian \\(y_2\\) pada pembilang nomor 2 belum benar." },
        { id: "subY1_2", jawaban: "2", label: "Bagian \\(y_1\\) pada pembilang nomor 2 belum benar." },
        { id: "subX2_2", jawaban: "5", label: "Bagian \\(x_2\\) pada penyebut nomor 2 belum benar." },
        { id: "subX1_2", jawaban: "1", label: "Bagian \\(x_1\\) pada penyebut nomor 2 belum benar." },
        { id: "kiri2_2", jawaban: "1", label: "Ruas kiri pada langkah penyederhanaan belum benar." },
        { id: "hasilAtas_2", jawaban: "p-2", label: "Pembilang hasil pecahan nomor 2 belum benar." },
        { id: "hasilBawah_2", jawaban: "4", label: "Penyebut hasil pecahan nomor 2 belum benar." },
        { id: "pers1Kiri_2", jawaban: "4", label: "Ruas kiri setelah menghilangkan pecahan belum benar." },
        { id: "pers1Kanan_2", jawaban: "p-2", label: "Ruas kanan setelah menghilangkan pecahan belum benar." },
        { id: "hasilP_2", jawaban: "6", label: "Nilai \\(p\\) pada nomor 2 belum benar." },
    ];

    const hasil = prosesPengecekan(data);
    const benar = tampilkanFeedback(
        "fbLatihan2",
        hasil,
        2,
        "Jawaban nomor 2 benar. Lanjut ke latihan berikutnya..."
    );

    if (benar) {
        setTimeout(() => {
            tampilkanCardLatihan("cardLatihan3");
        }, 700);
    }

    return benar;
}

function resetLatihanTitik2() {
    [
        "x1_2", "y1_2", "x2_2", "y2_2", "m_2", "kiri1_2",
        "subY2_2", "subY1_2", "subX2_2", "subX1_2",
        "kiri2_2", "hasilAtas_2", "hasilBawah_2",
        "pers1Kiri_2", "pers1Kanan_2", "hasilP_2"
    ].forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    const fb = document.getElementById("fbLatihan2");
    if (fb) fb.innerHTML = "";
}

// =========================
// LATIHAN 3
// =========================
function cekLatihanTitik3() {
    const data = [
        { id: "subY2_3", jawaban: "4", label: "Nilai \\(y_2\\) pada nomor 3 belum benar." },
        { id: "subY1_3", jawaban: "1", label: "Nilai \\(y_1\\) pada nomor 3 belum benar." },
        { id: "subX2_3", jawaban: "8", label: "Nilai \\(x_2\\) pada nomor 3 belum benar." },
        { id: "subX1_3", jawaban: "2", label: "Nilai \\(x_1\\) pada nomor 3 belum benar." },
        { id: "hasilAtas_3", jawaban: "3", label: "Hasil pembilang pada nomor 3 belum benar." },
        { id: "hasilBawah_3", jawaban: "6", label: "Hasil penyebut pada nomor 3 belum benar." },
        { id: "hasilAkhirAtas_3", jawaban: "1", label: "Pembilang hasil akhir nomor 3 belum benar." },
        { id: "hasilAkhirBawah_3", jawaban: "2", label: "Penyebut hasil akhir nomor 3 belum benar." },
    ];

    const hasil = prosesPengecekan(data);
    const benar = tampilkanFeedback(
        "fbLatihan3",
        hasil,
        3,
        "Jawaban nomor 3 benar. Bagus, kamu sudah memahami materi gradien."
    );

    if (benar) {
        const akhir = document.getElementById("pesanAkhirLatihan");
        if (akhir) {
            akhir.innerHTML = `
                <div class="alert alert-primary fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami materi gradien.
                </div>
            `;
            renderMath(akhir);
            akhir.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    }

    return benar;
}

function resetLatihanTitik3() {
    [
        "subY2_3", "subY1_3", "subX2_3", "subX1_3",
        "hasilAtas_3", "hasilBawah_3", "hasilAkhirAtas_3", "hasilAkhirBawah_3"
    ].forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    const fb = document.getElementById("fbLatihan3");
    if (fb) fb.innerHTML = "";
}
