// Interaktif drag and drop
let draggedItem = null;

document.addEventListener("DOMContentLoaded", function () {
    initDragAndDrop();
});

function initDragAndDrop() {
    const items = document.querySelectorAll(".drag-item");
    const zones = document.querySelectorAll(".drop-zone");

    items.forEach((item) => {
        item.addEventListener("dragstart", function () {
            draggedItem = item;
            setTimeout(() => item.classList.add("d-none"), 0);
        });

        item.addEventListener("dragend", function () {
            item.classList.remove("d-none");
            draggedItem = null;
        });
    });

    zones.forEach((zone) => {
        zone.addEventListener("dragover", function (e) {
            e.preventDefault();
            zone.classList.add("hovered");
        });

        zone.addEventListener("dragleave", function () {
            zone.classList.remove("hovered");
        });

        zone.addEventListener("drop", function (e) {
            e.preventDefault();
            zone.classList.remove("hovered");

            if (!draggedItem) return;

            const slot = zone.querySelector(".drop-slot");

            // Hanya 1 item per zone
            if (slot.children.length > 0) {
                const oldItem = slot.children[0];
                document.querySelector(".drag-bank")?.appendChild(oldItem);
            }

            slot.appendChild(draggedItem);
        });
    });
}

// Interaktif delta x delta y
function cekPasanganDelta() {
    const box = document.getElementById("deltaMatchBox");
    const zones = box.querySelectorAll(".drop-zone");
    const feedback = document.getElementById("feedbackDelta");

    let semuaBenar = true;
    let terisi = 0;

    zones.forEach((zone) => {
        zone.classList.remove("correct", "wrong");
        const item = zone.querySelector(".drag-item");

        if (!item) {
            semuaBenar = false;
            return;
        }

        terisi++;
        if (item.dataset.value === zone.dataset.answer) {
            zone.classList.add("correct");
        } else {
            zone.classList.add("wrong");
            semuaBenar = false;
        }
    });

    if (terisi < 2) {
        feedback.innerHTML = `<div class="alert alert-warning mb-0">Pasangkan semua istilah terlebih dahulu.</div>`;
        return;
    }

    feedback.innerHTML = semuaBenar
        ? `<div class="alert alert-success mb-0">Tepat, Δy menunjukkan perubahan vertikal dan Δx menunjukkan perubahan horizontal.</div>`
        : `<div class="alert alert-warning mb-0">Masih ada pasangan yang belum tepat. Coba perhatikan kembali hubungan sumbu x dan sumbu y.</div>`;
}

function resetPasanganDelta() {
    const box = document.getElementById("deltaMatchBox");
    const bank = box.querySelector(".drag-bank");
    const zones = box.querySelectorAll(".drop-zone");
    const feedback = document.getElementById("feedbackDelta");

    zones.forEach((zone) => {
        zone.classList.remove("correct", "wrong");
        const item = zone.querySelector(".drag-item");
        if (item) bank.appendChild(item);
    });

    feedback.innerHTML = "";
}

// drag and drop klasifikasi gradien
function cekKlasifikasiGradien() {
    const card = document
        .getElementById("feedbackKlasifikasiGradien")
        ?.closest(".card");
    const zones = card ? card.querySelectorAll(".drop-zone") : [];
    const feedback = document.getElementById("feedbackKlasifikasiGradien");

    let semuaBenar = true;
    let countValid = 0;

    zones.forEach((zone) => {
        const slot = zone.querySelector(".drop-slot");
        const item = slot.querySelector(".drag-item");

        zone.classList.remove("correct", "wrong");

        if (!item) {
            semuaBenar = false;
            return;
        }

        countValid++;
        if (item.dataset.value === zone.dataset.answer) {
            zone.classList.add("correct");
        } else {
            zone.classList.add("wrong");
            semuaBenar = false;
        }
    });

    if (countValid < 4) {
        feedback.innerHTML = `<div class="alert alert-warning mb-0">
            Pasangkan semua jenis garis terlebih dahulu.
        </div>`;
        return;
    }

    if (semuaBenar) {
        feedback.innerHTML = `<div class="alert alert-success mb-0">
            Bagus, kamu sudah dapat mengelompokkan jenis gradien dengan tepat.
        </div>`;
    } else {
        feedback.innerHTML = `<div class="alert alert-warning mb-0">
            Masih ada pasangan yang belum tepat. Perhatikan kembali arah garis dari kiri ke kanan.
        </div>`;
    }
}

function resetKlasifikasiGradien() {
    const feedback = document.getElementById("feedbackKlasifikasiGradien");
    const card = feedback?.closest(".card");
    if (!card) return;

    const bank = card.querySelector(".drag-bank");
    const zones = card.querySelectorAll(".drop-zone");

    zones.forEach((zone) => {
        zone.classList.remove("correct", "wrong");
        const slot = zone.querySelector(".drop-slot");
        const item = slot.querySelector(".drag-item");
        if (item) bank.appendChild(item);
    });

    feedback.innerHTML = "";
}

// melengkapi rumus konsep gradien
function cekPerbandinganGradien() {
    const a = document.getElementById("gradienCompare1").value;
    const b = document.getElementById("gradienCompare2").value;
    const fb = document.getElementById("feedbackPerbandinganGradien");

    if (a === "dy" && b === "dx") {
        fb.innerHTML = `<div class="alert alert-success mb-0">
            Benar, gradien merupakan perbandingan Δy terhadap Δx.
        </div>`;
    } else {
        fb.innerHTML = `<div class="alert alert-warning mb-0">
            Belum tepat. Ingat, gradien menunjukkan perubahan nilai y untuk setiap perubahan nilai x.
        </div>`;
    }
}

// Latihan Soal
function renderKatexIfAvailable(el = document.body) {
    if (typeof renderMathInElement === "function") {
        renderMathInElement(el, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
                { left: "\\(", right: "\\)", display: false },
                { left: "\\[", right: "\\]", display: true },
            ],
        });
    }
}

function normalText(str) {
    return String(str).trim().replace(/\s+/g, "").replace(",", ".");
}

function parseNilai(str) {
    const s = normalText(str);
    if (!s) return NaN;

    if (s.includes("/")) {
        const parts = s.split("/");
        if (parts.length !== 2) return NaN;
        const a = parseFloat(parts[0]);
        const b = parseFloat(parts[1]);
        if (!isFinite(a) || !isFinite(b) || b === 0) return NaN;
        return a / b;
    }

    const n = parseFloat(s);
    return isFinite(n) ? n : NaN;
}

function hampirSama(a, b, tol = 0.001) {
    return Math.abs(a - b) <= tol;
}

const kunciGradien = {
    arah: "turun",
    dyAbs: 3,
    dx: 5
};

function bukaStep(id) {
    const el = document.getElementById(id);
    if (el) {
        el.style.display = "block";
        el.scrollIntoView({ behavior: "smooth", block: "start" });
    }
}

function tutupStep(id) {
    const el = document.getElementById(id);
    if (el) el.style.display = "none";
}

function resetInput(id) {
    const el = document.getElementById(id);
    if (el) el.value = "";
}

function cekArahGaris(jawaban) {
    const fb = document.getElementById("fbLangkah1");
    const teksLangkah2 = document.getElementById("teksLangkah2");

    tutupStep("step2Gradien");
    tutupStep("step3Gradien");
    tutupStep("step4Gradien");
    resetDeltaY();
    resetDeltaX();
    resetSubstitusi();

    if (jawaban === kunciGradien.arah) {
        fb.innerHTML = `
            <div class="alert alert-success mb-0" style="border-radius:14px;">
                <b>Benar!</b> Jika garis dilihat dari kiri ke kanan, garis tersebut bergerak <b>turun</b>.
                Oleh karena itu, perubahan vertikalnya bernilai <b>negatif</b>.
            </div>
        `;

        teksLangkah2.innerHTML = `
            Karena garis bergerak <b>turun</b> saat dilihat dari kiri ke kanan, maka perubahan vertikal
            \\(\\Delta y\\) bernilai <b>negatif</b>. Sekarang hitung banyak kotak perubahan vertikalnya.
        `;

        renderKatexIfAvailable(fb);
        renderKatexIfAvailable(teksLangkah2);
        bukaStep("step2Gradien");
    } else if (jawaban === "naik") {
        fb.innerHTML = `
            <div class="alert alert-danger mb-0" style="border-radius:14px;">
                <b>Belum tepat.</b> Coba perhatikan kembali arah garis saat bergerak dari kiri ke kanan.
                Garis tampak <b>turun</b>, bukan naik.
            </div>
        `;
    } else {
        fb.innerHTML = `
            <div class="alert alert-danger mb-0" style="border-radius:14px;">
                <b>Belum tepat.</b> Garis pada gambar tidak datar. Coba perhatikan kembali arah garisnya.
            </div>
        `;
    }
}

function cekDeltaY() {
    const input = normalText(document.getElementById("inputDyBesar").value);
    const fb = document.getElementById("fbLangkah2");

    tutupStep("step3Gradien");
    tutupStep("step4Gradien");
    resetDeltaX();
    resetSubstitusi();

    if (input === "") {
        fb.innerHTML = `
            <div class="alert alert-danger mb-0" style="border-radius:14px;">
                <b>Belum lengkap.</b> Masukkan terlebih dahulu banyak kotak perubahan vertikal.
            </div>
        `;
        return;
    }

    if (input === String(kunciGradien.dyAbs)) {
        fb.innerHTML = `
            <div class="alert alert-success mb-0" style="border-radius:14px;">
                <b>Benar!</b> Perubahan vertikalnya adalah <b>${kunciGradien.dyAbs} kotak</b>.<br>
                Karena garis bergerak <b>turun</b>, maka:
                $$ \\Delta y = -${kunciGradien.dyAbs} $$
            </div>
        `;
        renderKatexIfAvailable(fb);
        bukaStep("step3Gradien");
    } else {
        fb.innerHTML = `
            <div class="alert alert-danger mb-0" style="border-radius:14px;">
                <b>Belum tepat.</b> Hitung kembali banyak kotak perubahan vertikalnya.
            </div>
        `;
    }
}

function resetDeltaY() {
    resetInput("inputDyBesar");
    document.getElementById("fbLangkah2").innerHTML = "";
}

function cekDeltaX() {
    const input = normalText(document.getElementById("inputDxBesar").value);
    const fb = document.getElementById("fbLangkah3");

    tutupStep("step4Gradien");
    resetSubstitusi();

    if (input === "") {
        fb.innerHTML = `
            <div class="alert alert-danger mb-0" style="border-radius:14px;">
                <b>Belum lengkap.</b> Masukkan terlebih dahulu banyak kotak perubahan mendatar.
            </div>
        `;
        return;
    }

    if (input === String(kunciGradien.dx)) {
        fb.innerHTML = `
            <div class="alert alert-success mb-0" style="border-radius:14px;">
                <b>Benar!</b> Perubahan mendatarnya adalah <b>${kunciGradien.dx} kotak</b>.<br>
                Jadi:
                $$ \\Delta x = ${kunciGradien.dx} $$
            </div>
        `;
        renderKatexIfAvailable(fb);
        bukaStep("step4Gradien");
    } else {
        fb.innerHTML = `
            <div class="alert alert-danger mb-0" style="border-radius:14px;">
                <b>Belum tepat.</b> Hitung kembali banyak kotak perubahan mendatarnya.
            </div>
        `;
    }
}

function resetDeltaX() {
    resetInput("inputDxBesar");
    document.getElementById("fbLangkah3").innerHTML = "";
}

function cekSubstitusi() {
    const pembilang = parseNilai(document.getElementById("inputPembilang").value);
    const penyebut = parseNilai(document.getElementById("inputPenyebut").value);
    const fb = document.getElementById("fbLangkah4");

    const benarPembilang = hampirSama(pembilang, -kunciGradien.dyAbs);
    const benarPenyebut = hampirSama(penyebut, kunciGradien.dx);

    if (isNaN(pembilang) || isNaN(penyebut)) {
        fb.innerHTML = `
            <div class="alert alert-danger mb-0" style="border-radius:14px;">
                <b>Belum lengkap.</b> Isi terlebih dahulu pembilang dan penyebut pada bentuk pecahan gradien.
            </div>
        `;
        return;
    }

    if (benarPembilang && benarPenyebut) {
        fb.innerHTML = `
            <div class="alert alert-success mb-0" style="border-radius:14px;">
                <b>Benar!</b> Substitusi ke rumus sudah tepat.
                $$ m = \\frac{\\Delta y}{\\Delta x} = \\frac{-${kunciGradien.dyAbs}}{${kunciGradien.dx}} $$
                Jadi, gradien garis tersebut adalah <b>\\(-\\frac{${kunciGradien.dyAbs}}{${kunciGradien.dx}}\\)</b>.
            </div>
        `;
        renderKatexIfAvailable(fb);
    } else {
        let pesan = `
            <div class="alert alert-danger mb-0" style="border-radius:14px;">
                <b>Belum tepat.</b><br>
        `;

        if (!benarPembilang) {
            pesan += `Perhatikan kembali nilai <b>\\(\\Delta y\\)</b>. Karena garis turun, nilainya harus negatif.<br>`;
        }

        if (!benarPenyebut) {
            pesan += `Perhatikan kembali nilai <b>\\(\\Delta x\\)</b>.`;
        }

        pesan += `</div>`;
        fb.innerHTML = pesan;
        renderKatexIfAvailable(fb);
    }
}

function resetSubstitusi() {
    resetInput("inputPembilang");
    resetInput("inputPenyebut");
    document.getElementById("fbLangkah4").innerHTML = "";
}

document.addEventListener("DOMContentLoaded", function () {
    renderKatexIfAvailable();
});
