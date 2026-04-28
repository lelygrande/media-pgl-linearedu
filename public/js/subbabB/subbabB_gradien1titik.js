// =========================
// LATIHAN SOAL SUBBAB B2
// Gradien garis melalui O(0,0) dan (x,y)
// =========================

window.addEventListener("load", function () {
    renderMathSafe(document.body);
});

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

function norm(nilai) {
    return String(nilai || "")
        .trim()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .toLowerCase();
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
    const step = document.getElementById(`latihan${stepNumber}`);
    if (!step) return;

    step.classList.remove("d-none");
    renderMathSafe(step);
    scrollKeStep(`latihan${stepNumber}`);
}

function prevLatihan(stepNumber) {
    scrollKeStep(`latihan${stepNumber}`);
}

function resetStepSetelah(stepMulai) {
    for (let i = stepMulai; i <= 3; i++) {
        const step = document.getElementById(`latihan${i}`);
        if (step) step.classList.add("d-none");
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

function bukaNextButton() {
    const nextBtn = document.getElementById("nextMateriBtn");
    if (!nextBtn) return;

    const url = nextBtn.dataset.nextUrl;
    if (!url) return;

    const link = document.createElement("a");
    link.href = url;
    link.id = "nextMateriBtn";
    link.className = "btn btn-next px-4 rounded-pill fw-semibold";
    link.textContent = "Next →";

    nextBtn.replaceWith(link);
}

// =========================
// VALIDASI FIELD
// =========================
function setValid(id, benar) {
    const el = document.getElementById(id);
    if (!el) return;

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(benar ? "is-valid" : "is-invalid");
}

function clearValid(ids) {
    ids.forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.classList.remove("is-valid", "is-invalid");
    });
}

// =========================
// LATIHAN 1
// =========================
function cekLatihan1() {
    const ids = [
        "subAtas_a",
        "subBawah_a",
        "hasilAtas_a",
        "hasilBawah_a",
        "subAtas_b",
        "subBawah_b",
        "hasilAtas_b",
        "hasilBawah_b",
        "pilihJalur",
    ];

    clearValid(ids);

    const subAtasA = norm(document.getElementById("subAtas_a")?.value);
    const subBawahA = norm(document.getElementById("subBawah_a")?.value);
    const hasilAtasA = norm(document.getElementById("hasilAtas_a")?.value);
    const hasilBawahA = norm(document.getElementById("hasilBawah_a")?.value);

    const subAtasB = norm(document.getElementById("subAtas_b")?.value);
    const subBawahB = norm(document.getElementById("subBawah_b")?.value);
    const hasilAtasB = norm(document.getElementById("hasilAtas_b")?.value);
    const hasilBawahB = norm(document.getElementById("hasilBawah_b")?.value);

    const pilihJalur = norm(document.getElementById("pilihJalur")?.value).toUpperCase();

    const fb = document.getElementById("feedbackLatihan1");
    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (!fb) return;

    const benarA1 = subAtasA === "400" && subBawahA === "800";
    const benarA2 =
        (hasilAtasA === "1" && hasilBawahA === "2") ||
        (hasilAtasA === "400" && hasilBawahA === "800");

    const benarB1 = subAtasB === "450" && subBawahB === "600";
    const benarB2 =
        (hasilAtasB === "3" && hasilBawahB === "4") ||
        (hasilAtasB === "450" && hasilBawahB === "600");

    const benarJalur = pilihJalur === "A";

    setValid("subAtas_a", subAtasA === "400");
    setValid("subBawah_a", subBawahA === "800");
    setValid("hasilAtas_a", benarA2);
    setValid("hasilBawah_a", benarA2);

    setValid("subAtas_b", subAtasB === "450");
    setValid("subBawah_b", subBawahB === "600");
    setValid("hasilAtas_b", benarB2);
    setValid("hasilBawah_b", benarB2);

    setValid("pilihJalur", benarJalur);

    if (benarA1 && benarA2 && benarB1 && benarB2 && benarJalur) {
        fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Benar. Gradien jalur A adalah $\\frac{1}{2}$, sedangkan gradien jalur B adalah $\\frac{3}{4}$.
                Karena $\\frac{1}{2} < \\frac{3}{4}$, jalur A lebih landai.
                Silakan lanjut ke latihan berikutnya.
            </div>
        `;

        if (nextBtn) nextBtn.disabled = false;
    } else {
        let hints = [];

        if (!benarA1) hints.push("Periksa lagi substitusi untuk jalur A.");
        if (benarA1 && !benarA2) hints.push("Sederhanakan hasil gradien jalur A.");
        if (!benarB1) hints.push("Periksa lagi substitusi untuk jalur B.");
        if (benarB1 && !benarB2) hints.push("Sederhanakan hasil gradien jalur B.");
        if (benarA1 && benarA2 && benarB1 && benarB2 && !benarJalur) {
            hints.push("Jalur lebih landai memiliki gradien yang lebih kecil.");
        }

        fb.innerHTML = `
            <div class="alert alert-danger mb-0">
                ${hints.join("<br>")}
            </div>
        `;

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(2);
    }

    renderMathSafe(fb);
}

// =========================
// LATIHAN 2
// =========================
function cekLatihan2() {
    const ids = [
        "moaAtas",
        "moaBawah",
        "mobAtas",
        "mobBawah",
        "mocAtas",
        "mocBawah",
    ];

    clearValid(ids);

    const moaAtas = norm(document.getElementById("moaAtas")?.value);
    const moaBawah = norm(document.getElementById("moaBawah")?.value);

    const mobAtas = norm(document.getElementById("mobAtas")?.value);
    const mobBawah = norm(document.getElementById("mobBawah")?.value);

    const mocAtas = norm(document.getElementById("mocAtas")?.value);
    const mocBawah = norm(document.getElementById("mocBawah")?.value);

    const fb = document.getElementById("feedbackLatihan2");
    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (!fb) return;

    const benarOA = moaAtas === "5" && moaBawah === "3";

    const benarOB =
        (mobAtas === "-2" && mobBawah === "3") ||
        (mobAtas === "2" && mobBawah === "-3");

    const benarOC =
        (mocAtas === "3" && mocBawah === "4") ||
        (mocAtas === "-3" && mocBawah === "-4");

    setValid("moaAtas", benarOA);
    setValid("moaBawah", benarOA);
    setValid("mobAtas", benarOB);
    setValid("mobBawah", benarOB);
    setValid("mocAtas", benarOC);
    setValid("mocBawah", benarOC);

    if (benarOA && benarOB && benarOC) {
        fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Benar. Gradien $OA = \\frac{5}{3}$, gradien $OB = -\\frac{2}{3}$,
                dan gradien $OC = \\frac{3}{4}$.
                Silakan lanjut ke latihan berikutnya.
            </div>
        `;

        if (nextBtn) nextBtn.disabled = false;
    } else {
        let hints = [];

        if (!benarOA) hints.push("Periksa lagi gradien $OA$.");
        if (!benarOB) hints.push("Periksa lagi gradien $OB$. Ingat tandanya bisa negatif.");
        if (!benarOC) hints.push("Periksa lagi gradien $OC$.");

        fb.innerHTML = `
            <div class="alert alert-danger mb-0">
                ${hints.join("<br>")}
            </div>
        `;

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(3);
    }

    renderMathSafe(fb);
}

// =========================
// LATIHAN 3
// =========================
async function cekLatihan3() {
    const ids = [
        "nilaiX_3",
        "nilaiP_3",
        "subM_3",
        "subP_3",
        "subX_3",
        "kali1_3",
        "kali2_3",
        "hasilP_3",
        "koordX_3",
        "koordY_3",
    ];

    clearValid(ids);

    const nilaiX = norm(document.getElementById("nilaiX_3")?.value);
    const nilaiP = norm(document.getElementById("nilaiP_3")?.value);

    const subM = norm(document.getElementById("subM_3")?.value);
    const subP = norm(document.getElementById("subP_3")?.value);
    const subX = norm(document.getElementById("subX_3")?.value);

    const kali1 = norm(document.getElementById("kali1_3")?.value);
    const kali2 = norm(document.getElementById("kali2_3")?.value);

    const hasilP = norm(document.getElementById("hasilP_3")?.value);
    const koordX = norm(document.getElementById("koordX_3")?.value);
    const koordY = norm(document.getElementById("koordY_3")?.value);

    const fb = document.getElementById("feedbackLatihan3");

    if (!fb) return;

    const benarNilai = nilaiX === "6" && nilaiP === "p";
    const benarSubstitusi = subM === "4" && subP === "p" && subX === "6";

    const benarKali =
        (kali1 === "4" && kali2 === "6") ||
        (kali1 === "6" && kali2 === "4");

    const benarHasil = hasilP === "24";
    const benarKoord = koordX === "6" && koordY === "24";

    setValid("nilaiX_3", nilaiX === "6");
    setValid("nilaiP_3", nilaiP === "p");

    setValid("subM_3", subM === "4");
    setValid("subP_3", subP === "p");
    setValid("subX_3", subX === "6");

    setValid("kali1_3", benarKali);
    setValid("kali2_3", benarKali);

    setValid("hasilP_3", benarHasil);
    setValid("koordX_3", koordX === "6");
    setValid("koordY_3", koordY === "24");

    if (benarNilai && benarSubstitusi && benarKali && benarHasil && benarKoord) {
        fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Hebat, semua latihan sudah selesai. Karena $m = \\frac{y}{x}$,
                maka $4 = \\frac{p}{6}$ sehingga $p = 4 \\times 6 = 24$.
                Silakan lanjut ke materi berikutnya.
            </div>
        `;

        renderMathSafe(fb);

        const saved = await saveProgressMateri();

        if (saved) {
            bukaNextButton();
        } else {
            fb.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
        }
    } else {
        let hints = [];

        if (!benarNilai) hints.push("Periksa lagi nilai $x$ dan $y$ dari titik $A(6,p)$.");
        if (benarNilai && !benarSubstitusi) hints.push("Periksa lagi substitusi ke rumus gradien.");
        if (benarNilai && benarSubstitusi && !benarKali) hints.push("Periksa lagi bentuk perkalian untuk mencari $p$.");
        if (benarNilai && benarSubstitusi && benarKali && !benarHasil) hints.push("Hitung lagi hasil akhirnya.");
        if (benarNilai && benarSubstitusi && benarKali && benarHasil && !benarKoord) {
            hints.push("Masukkan kembali koordinat titik $A$ dengan benar.");
        }

        fb.innerHTML = `
            <div class="alert alert-danger mb-0">
                ${hints.join("<br>")}
            </div>
        `;

        renderMathSafe(fb);
    }
}
