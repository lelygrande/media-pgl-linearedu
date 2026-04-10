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

function cekEksplorasiDuaTitik() {
    const a1 = picked("ex1");
    const a2 = picked("ex2");
    const a3 = picked("ex3");
    const a4 = picked("ex4");

    // validasi belum pilih
    if (!a1 || !a2 || !a3 || !a4) {
        document.getElementById("kesimpulanEksDuaTitik").innerHTML = `
                <div class="alert alert-warning mb-0" style="border-radius:14px;">
                    Masih ada yang belum dijawab. Lengkapi dulu semua pilihan ya 🙂
                </div>`;
        return;
    }

    const ok1 = a1 === "x2-x1";
    const ok2 = a2 === "y2-y1";
    const ok3 = a3 === "dy/dx";
    const ok4 = a4 === "ya";

    setFeedback(
        "fb_ex1",
        ok1,
        "Δx dihitung dari <b>akhir − awal</b>.",
        "Ingat: perubahan = <b>akhir − awal</b>.",
    );
    setFeedback(
        "fb_ex2",
        ok2,
        "Δy juga dihitung dari <b>akhir − awal</b>.",
        "Ingat: perubahan = <b>akhir − awal</b>.",
    );
    setFeedback(
        "fb_ex3",
        ok3,
        "Gradien membandingkan perubahan y terhadap perubahan x.",
        "Gradien itu <b>Δy dibagi Δx</b>.",
    );
    setFeedback(
        "fb_ex4",
        ok4,
        "Jika Δx = 0 maka gradien tidak bisa dihitung.",
        "Coba ingat: pembagian dengan 0 tidak bisa.",
    );

    const semuaBenar = ok1 && ok2 && ok3 && ok4;

    document.getElementById("kesimpulanEksDuaTitik").innerHTML = semuaBenar
        ? `<div class="alert alert-success mb-0" style="border-radius:14px;">
                <b>Kesimpulan:</b><br>
                Perubahan x: $\\Delta x = x_2 - x_1$<br>
                Perubahan y: $\\Delta y = y_2 - y_1$<br>
                Maka gradien: $m = \\frac{\\Delta y}{\\Delta x} = \\frac{y_2-y_1}{x_2-x_1}$
              </div>`
        : `<div class="alert alert-info mb-0" style="border-radius:14px;">
                <b>Kesimpulan sementara:</b> Gradien dihitung dari <b>perubahan y</b> dibanding <b>perubahan x</b>.
                Coba perbaiki jawaban yang masih salah, lalu cek lagi.
              </div>`;

    renderKatexSafe();
}

function resetEksplorasiDuaTitik() {
    ["ex1", "ex2", "ex3", "ex4"].forEach((n) => {
        document
            .querySelectorAll(`input[name="${n}"]`)
            .forEach((r) => (r.checked = false));
    });

    ["fb_ex1", "fb_ex2", "fb_ex3", "fb_ex4"].forEach((id) => {
        document.getElementById(id).innerHTML = "";
    });

    document.getElementById("kesimpulanEksDuaTitik").innerHTML = "";
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
    return teks.trim().replace(/\s+/g, "").replace(/−/g, "-").toLowerCase();
}

function cekField(id, jawabanBenar, labelTampil) {
    const el = document.getElementById(id);
    if (!el) return { benar: false, label: `Field ${id} tidak ditemukan.` };

    const nilaiUser = normalisasiNilai(el.value);
    const nilaiKunci = normalisasiNilai(jawabanBenar);

    // cek angka
    if (!isNaN(nilaiUser) && !isNaN(nilaiKunci)) {
        if (Number(nilaiUser) === Number(nilaiKunci)) {
            el.classList.remove("is-invalid");
            el.classList.add("is-valid");
            return { benar: true, label: labelTampil };
        }
    }

    // cek string
    if (nilaiUser === nilaiKunci) {
        el.classList.remove("is-invalid");
        el.classList.add("is-valid");
        return { benar: true, label: labelTampil };
    }

    el.classList.remove("is-valid");
    el.classList.add("is-invalid");
    return { benar: false, label: labelTampil };
}

function tampilkanFeedback(containerId, hasil, nomor) {
    const fb = document.getElementById(containerId);
    if (!fb) return hasil.semuaBenar;

    if (hasil.semuaBenar) {
        fb.innerHTML = `<div class="alert alert-success py-2 mb-0">Jawaban nomor ${nomor} benar.</div>`;
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

    return hasil.semuaBenar;
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

function cekLatihan1() {
    const data = [
        { id: "l1x1", jawaban: "-3", label: "Nilai x₁ belum benar." },
        { id: "l1y1", jawaban: "6", label: "Nilai y₁ belum benar." },
        { id: "l1x2", jawaban: "5", label: "Nilai x₂ belum benar." },
        { id: "l1y2", jawaban: "-4", label: "Nilai y₂ belum benar." },
        {
            id: "subY2",
            jawaban: "-4",
            label: "Pembilang bagian y₂ pada substitusi belum benar.",
        },
        {
            id: "subY1",
            jawaban: "6",
            label: "Pembilang bagian y₁ pada substitusi belum benar.",
        },
        {
            id: "subX2",
            jawaban: "5",
            label: "Penyebut bagian x₂ pada substitusi belum benar.",
        },
        {
            id: "subX1",
            jawaban: "-3",
            label: "Penyebut bagian x₁ pada substitusi belum benar.",
        },
        {
            id: "hasilAtas",
            jawaban: "-10",
            label: "Hasil pembilang belum benar.",
        },
        {
            id: "hasilBawah",
            jawaban: "8",
            label: "Hasil penyebut belum benar.",
        },
        {
            id: "hasilAkhirAtas",
            jawaban: "-5",
            label: "Pembilang hasil akhir belum benar.",
        },
        {
            id: "hasilAkhirBawah",
            jawaban: "4",
            label: "Penyebut hasil akhir belum benar.",
        },
    ];

    const hasil = prosesPengecekan(data);
    return tampilkanFeedback("fbLatihan1", hasil, 1);
}

function cekLatihan2() {
    const data = [
        {
            id: "x1_2",
            jawaban: "1",
            label: "Nilai x₁ pada nomor 2 belum benar.",
        },
        {
            id: "y1_2",
            jawaban: "2",
            label: "Nilai y₁ pada nomor 2 belum benar.",
        },
        {
            id: "x2_2",
            jawaban: "5",
            label: "Nilai x₂ pada nomor 2 belum benar.",
        },
        {
            id: "y2_2",
            jawaban: "p",
            label: "Nilai y₂ pada nomor 2 belum benar.",
        },
        {
            id: "m_2",
            jawaban: "1",
            label: "Nilai gradien m pada nomor 2 belum benar.",
        },
        {
            id: "kiri1_2",
            jawaban: "1",
            label: "Ruas kiri pada langkah substitusi belum benar.",
        },
        {
            id: "subY2_2",
            jawaban: "p",
            label: "Bagian y₂ pada pembilang nomor 2 belum benar.",
        },
        {
            id: "subY1_2",
            jawaban: "2",
            label: "Bagian y₁ pada pembilang nomor 2 belum benar.",
        },
        {
            id: "subX2_2",
            jawaban: "5",
            label: "Bagian x₂ pada penyebut nomor 2 belum benar.",
        },
        {
            id: "subX1_2",
            jawaban: "1",
            label: "Bagian x₁ pada penyebut nomor 2 belum benar.",
        },
        {
            id: "kiri2_2",
            jawaban: "1",
            label: "Ruas kiri pada langkah penyederhanaan belum benar.",
        },
        {
            id: "hasilAtas_2",
            jawaban: "p-2",
            label: "Pembilang hasil pecahan nomor 2 belum benar.",
        },
        {
            id: "hasilBawah_2",
            jawaban: "4",
            label: "Penyebut hasil pecahan nomor 2 belum benar.",
        },
        {
            id: "pers1Kiri_2",
            jawaban: "4",
            label: "Ruas kiri setelah menghilangkan pecahan belum benar.",
        },
        {
            id: "pers1Kanan_2",
            jawaban: "p-2",
            label: "Ruas kanan setelah menghilangkan pecahan belum benar.",
        },
        {
            id: "hasilP_2",
            jawaban: "6",
            label: "Nilai p pada nomor 2 belum benar.",
        },
    ];

    const hasil = prosesPengecekan(data);
    return tampilkanFeedback("fbLatihan2", hasil, 2);
}

function cekLatihan3() {
    const data = [
        {
            id: "subY2_3",
            jawaban: "4",
            label: "Nilai y₂ pada nomor 3 belum benar.",
        },
        {
            id: "subY1_3",
            jawaban: "1",
            label: "Nilai y₁ pada nomor 3 belum benar.",
        },
        {
            id: "subX2_3",
            jawaban: "8",
            label: "Nilai x₂ pada nomor 3 belum benar.",
        },
        {
            id: "subX1_3",
            jawaban: "2",
            label: "Nilai x₁ pada nomor 3 belum benar.",
        },
        {
            id: "hasilAtas_3",
            jawaban: "3",
            label: "Hasil pembilang pada nomor 3 belum benar.",
        },
        {
            id: "hasilBawah_3",
            jawaban: "6",
            label: "Hasil penyebut pada nomor 3 belum benar.",
        },
        {
            id: "hasilAkhirAtas_3",
            jawaban: "1",
            label: "Pembilang hasil akhir nomor 3 belum benar.",
        },
        {
            id: "hasilAkhirBawah_3",
            jawaban: "2",
            label: "Penyebut hasil akhir nomor 3 belum benar.",
        },
    ];

    const hasil = prosesPengecekan(data);
    return tampilkanFeedback("fbLatihan3", hasil, 3);
}

function cekSemuaLatihan() {
    const benar1 = cekLatihan1();
    const benar2 = cekLatihan2();
    const benar3 = cekLatihan3();

    const pesanAkhir = document.getElementById("pesanAkhirLatihan");
    if (!pesanAkhir) return;

    if (benar1 && benar2 && benar3) {
        pesanAkhir.innerHTML = `
            <div class="alert alert-primary fw-semibold text-center">
                Bagus, kamu sudah memahami materi gradien.
            </div>
        `;
    } else {
        pesanAkhir.innerHTML = "";
    }
}

function resetSemuaLatihan() {
    const wrapper = document
        .getElementById("pesanAkhirLatihan")
        ?.closest(".card-body");
    if (!wrapper) return;

    const semuaInput = wrapper.querySelectorAll("input");

    semuaInput.forEach((input) => {
        input.value = "";
        input.classList.remove("is-valid", "is-invalid");
    });

    ["fbLatihan1", "fbLatihan2", "fbLatihan3", "pesanAkhirLatihan"].forEach(
        (id) => {
            const el = document.getElementById(id);
            if (el) el.innerHTML = "";
        },
    );
}
