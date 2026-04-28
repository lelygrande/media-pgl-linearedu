// Eksplorasi
document.addEventListener("DOMContentLoaded", function () {
    const opsiKotak = document.querySelectorAll(".opsi-kotak");

    opsiKotak.forEach((btn) => {
        btn.addEventListener("click", function () {
            const soal = this.dataset.soal;
            const value = this.dataset.value;

            document
                .querySelectorAll(`.opsi-kotak[data-soal="${soal}"]`)
                .forEach((el) => {
                    el.classList.remove("active");
                });

            this.classList.add("active");
            document.getElementById(soal).value = value;
        });
    });
});

// Kunci Materi
// cek jawaban (3 pertanyaan)
document.addEventListener("DOMContentLoaded", function () {
    const opsiKotak = document.querySelectorAll(".opsi-kotak");

    opsiKotak.forEach((btn) => {
        btn.addEventListener("click", function () {
            const soal = this.dataset.soal;
            const value = this.dataset.value;

            document
                .querySelectorAll(`.opsi-kotak[data-soal="${soal}"]`)
                .forEach((el) => {
                    el.classList.remove("active");
                });

            this.classList.add("active");
            document.getElementById(soal).value = value;
        });
    });
});

function cekJawabanPapan() {
    const q1 = document.getElementById("q1").value;
    const q2 = document.getElementById("q2").value;
    const q3a = document.getElementById("q3a").value;
    const q3b = document.getElementById("q3b").value;

    const feedback = document.getElementById("feedbackPapan");
    const lanjutan = document.getElementById("lanjutanGradien");

    // reset style dropdown
    document.getElementById("q3a").classList.remove("is-valid", "is-invalid");
    document.getElementById("q3b").classList.remove("is-valid", "is-invalid");

    // reset style opsi kotak
    document.querySelectorAll('.opsi-kotak[data-soal="q1"]').forEach((el) => {
        el.classList.remove("benar", "salah");
    });
    document.querySelectorAll('.opsi-kotak[data-soal="q2"]').forEach((el) => {
        el.classList.remove("benar", "salah");
    });

    // validasi kosong
    if (!q1 || !q2 || !q3a || !q3b) {
        feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Semua jawaban harus diisi terlebih dahulu.
            </div>
        `;
        if (lanjutan) lanjutan.style.display = "none";
        return;
    }

    // kunci jawaban
    const benarQ1 = "tegak";
    const benarQ2 = "landai";

    // untuk q3, urutan boleh fleksibel: naik dan maju
    const benarQ3 = q3a === "naik" && q3b === "maju";
    let semuaBenar = true;

    // cek q1
    const q1Aktif = document.querySelector(
        `.opsi-kotak[data-soal="q1"][data-value="${q1}"]`,
    );
    if (q1 === benarQ1) {
        q1Aktif.classList.add("benar");
    } else {
        q1Aktif.classList.add("salah");
        semuaBenar = false;
    }

    // cek q2
    const q2Aktif = document.querySelector(
        `.opsi-kotak[data-soal="q2"][data-value="${q2}"]`,
    );
    if (q2 === benarQ2) {
        q2Aktif.classList.add("benar");
    } else {
        q2Aktif.classList.add("salah");
        semuaBenar = false;
    }

    // cek q3
    if (benarQ3) {
        document.getElementById("q3a").classList.add("is-valid");
        document.getElementById("q3b").classList.add("is-valid");
    } else {
        document.getElementById("q3a").classList.add("is-invalid");
        document.getElementById("q3b").classList.add("is-invalid");
        semuaBenar = false;
    }

    // feedback
    if (semuaBenar) {
        feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Bagus! Jawabanmu benar. Kamu bisa melanjutkan ke bagian berikutnya.
            </div>
        `;
        if (lanjutan) lanjutan.style.display = "block";
    } else {
        feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Masih ada jawaban yang belum tepat. Coba perhatikan lagi hubungan antara naik dan maju.
            </div>
        `;
        if (lanjutan) lanjutan.style.display = "none";
    }
}

// Slider Latihan
let currentLatihanGradien = 0;

function goToLatihanGradien(index) {
    const track = document.getElementById("latihanTrackGradien");
    if (!track) return;

    currentLatihanGradien = index;
    track.style.transform = `translateX(-${index * 100}%)`;
}

// Render Katex
function renderMath(target) {
    if (typeof renderMathInElement !== "function" || !target) return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "\\[", right: "\\]", display: true },
            { left: "\\(", right: "\\)", display: false },
            { left: "$", right: "$", display: false },
        ],
        throwOnError: false,
    });
}

// =========================
// LATIHAN SOAL SUBBAB B
// =========================

let draggedItemGradien = null;

document.addEventListener("DOMContentLoaded", function () {
    initKlasifikasiGradien();
    initOpsiLatihan2Gradien();
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

function renderMath(target) {
    renderMathSafe(target);
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
    for (let i = stepMulai; i <= 3; i++) {
        const step = document.getElementById(`latihanStep${i}`);
        if (step) step.style.display = "none";
    }
}

function normalisasiInputNilai(nilai) {
    return String(nilai || "")
        .replace(/\s+/g, "")
        .toLowerCase()
        .replace(/−/g, "-")
        .trim();
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
// LATIHAN 1
// Drag and Drop Klasifikasi Gradien
// =========================
function initKlasifikasiGradien() {
    const dragItems = document.querySelectorAll(".drag-item");
    const dropZones = document.querySelectorAll(".drop-zone");
    const dragBank = document.querySelector(".drag-bank");

    if (!dragItems.length || !dropZones.length || !dragBank) return;

    dragItems.forEach((item) => {
        item.addEventListener("dragstart", function () {
            draggedItemGradien = this;

            setTimeout(() => {
                this.style.opacity = "0.5";
            }, 0);
        });

        item.addEventListener("dragend", function () {
            this.style.opacity = "1";
            draggedItemGradien = null;
        });
    });

    dropZones.forEach((zone) => {
        zone.addEventListener("dragover", function (e) {
            e.preventDefault();
            this.classList.add("hovered");
        });

        zone.addEventListener("dragleave", function () {
            this.classList.remove("hovered");
        });

        zone.addEventListener("drop", function (e) {
            e.preventDefault();
            this.classList.remove("hovered");

            if (!draggedItemGradien) return;

            const slot = this.querySelector(".drop-slot");
            if (!slot) return;

            if (slot.children.length > 0) {
                const existingItem = slot.children[0];
                dragBank.appendChild(existingItem);
            }

            slot.appendChild(draggedItemGradien);
        });
    });

    dragBank.addEventListener("dragover", function (e) {
        e.preventDefault();
    });

    dragBank.addEventListener("drop", function (e) {
        e.preventDefault();

        if (draggedItemGradien) {
            dragBank.appendChild(draggedItemGradien);
        }
    });
}

function cekKlasifikasiGradien() {
    const dropZones = document.querySelectorAll(".drop-zone");
    const feedback = document.getElementById("feedbackKlasifikasiGradien");
    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (!feedback) return;

    let semuaBenar = true;
    let zonaKosong = [];

    dropZones.forEach((zone) => {
        const jawabanBenar = zone.dataset.answer;
        const slot = zone.querySelector(".drop-slot");
        const item = slot?.querySelector(".drag-item");
        const judul = zone.querySelector("strong")?.innerText || "Zona";

        zone.classList.remove("correct", "wrong");

        if (!item) {
            semuaBenar = false;
            zonaKosong.push(judul);
            return;
        }

        const jawabanUser = item.dataset.value;

        if (jawabanUser === jawabanBenar) {
            zone.classList.add("correct");
        } else {
            zone.classList.add("wrong");
            semuaBenar = false;
        }
    });

    if (zonaKosong.length > 0) {
        feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Masih ada pasangan yang belum diisi pada: <b>${zonaKosong.join(", ")}</b>.
            </div>
        `;

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(2);
        return;
    }

    if (semuaBenar) {
        feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Bagus! Semua pasangan sudah tepat. Silakan lanjut ke latihan berikutnya.
            </div>
        `;

        if (nextBtn) nextBtn.disabled = false;
    } else {
        feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Masih ada pasangan yang belum tepat. Coba periksa lagi.
            </div>
        `;

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(2);
    }
}

function resetKlasifikasiGradien() {
    const dragBank = document.querySelector(".drag-bank");
    const dropZones = document.querySelectorAll(".drop-zone");
    const feedback = document.getElementById("feedbackKlasifikasiGradien");
    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (!dragBank) return;

    dropZones.forEach((zone) => {
        zone.classList.remove("correct", "wrong", "hovered");

        const slot = zone.querySelector(".drop-slot");
        const items = slot?.querySelectorAll(".drag-item") || [];

        items.forEach((item) => {
            dragBank.appendChild(item);
        });
    });

    if (feedback) feedback.innerHTML = "";
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(2);
}

// =========================
// LATIHAN 2
// Pilihan tanda Delta x dan Delta y
// =========================
function initOpsiLatihan2Gradien() {
    const opsi = document.querySelectorAll('.opsi-kotak[data-soal="lat2"]');
    const input = document.getElementById("lat2");

    if (!opsi.length || !input) return;

    opsi.forEach((btn) => {
        btn.addEventListener("click", function () {
            input.value = this.dataset.value;

            opsi.forEach((item) => {
                item.classList.remove("active", "benar", "salah");
            });

            this.classList.add("active");
        });
    });
}

function cekLatihan2Gradien() {
    const input = document.getElementById("lat2");
    const feedback = document.getElementById("feedbackLatihan2Gradien");
    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (!input || !feedback) return;

    const jawaban = input.value;

    document.querySelectorAll('.opsi-kotak[data-soal="lat2"]').forEach((el) => {
        el.classList.remove("benar", "salah");
    });

    if (!jawaban) {
        feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Pilih salah satu jawaban terlebih dahulu.
            </div>
        `;

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(3);
        return;
    }

    const benar = "a";
    const tombolAktif = document.querySelector(
        `.opsi-kotak[data-soal="lat2"][data-value="${jawaban}"]`
    );

    if (jawaban === benar) {
        if (tombolAktif) tombolAktif.classList.add("benar");

        feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Benar! Karena garis bergerak ke kanan dan ke atas, maka \\(\\Delta x\\) positif dan \\(\\Delta y\\) positif.
                Silakan lanjut ke latihan berikutnya.
            </div>
        `;

        renderMath(feedback);

        if (nextBtn) nextBtn.disabled = false;
    } else {
        if (tombolAktif) tombolAktif.classList.add("salah");

        feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Belum tepat. Perhatikan lagi arah garis dari A ke B: bergerak ke kanan dan ke atas.
            </div>
        `;

        renderMath(feedback);

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(3);
    }
}

function resetLatihan2Gradien() {
    const input = document.getElementById("lat2");
    const feedback = document.getElementById("feedbackLatihan2Gradien");
    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (input) input.value = "";

    document.querySelectorAll('.opsi-kotak[data-soal="lat2"]').forEach((el) => {
        el.classList.remove("active", "benar", "salah");
    });

    if (feedback) feedback.innerHTML = "";
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(3);
}

// =========================
// LATIHAN 3
// Input Delta y, Delta x, dan Gradien
// =========================
async function cekLatihan3Gradien() {
    const dyEl = document.getElementById("lat3_dy");
    const dxEl = document.getElementById("lat3_dx");
    const mEl = document.getElementById("lat3_m");
    const feedback = document.getElementById("feedbackLatihan3Gradien");

    if (!dyEl || !dxEl || !mEl || !feedback) return;

    const dy = normalisasiInputNilai(dyEl.value);
    const dx = normalisasiInputNilai(dxEl.value);
    const m = normalisasiInputNilai(mEl.value);

    [dyEl, dxEl, mEl].forEach((el) => {
        el.classList.remove("is-valid", "is-invalid");
    });

    if (!dy || !dx || !m) {
        feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Semua isian harus diisi terlebih dahulu.
            </div>
        `;
        return;
    }

    let semuaBenar = true;

    const benarDy = ["-3"];
    const benarDx = ["6"];
    const benarM = ["-1/2", "-3/6"];

    if (benarDy.includes(dy)) {
        dyEl.classList.add("is-valid");
    } else {
        dyEl.classList.add("is-invalid");
        semuaBenar = false;
    }

    if (benarDx.includes(dx)) {
        dxEl.classList.add("is-valid");
    } else {
        dxEl.classList.add("is-invalid");
        semuaBenar = false;
    }

    if (benarM.includes(m)) {
        mEl.classList.add("is-valid");
    } else {
        mEl.classList.add("is-invalid");
        semuaBenar = false;
    }

    if (semuaBenar) {
        feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Benar! Dari A ke B, garis bergerak ke kanan sebanyak 6 satuan dan ke bawah sebanyak 3 satuan, sehingga
                \\[
                    \\Delta x = 6, \\quad \\Delta y = -3, \\quad m = \\frac{-3}{6} = -\\frac{1}{2}
                \\]
                Silakan lanjut ke materi berikutnya.
            </div>
        `;

        renderMath(feedback);

        const saved = await saveProgressMateri();

        if (saved) {
            bukaNextButton();
        } else {
            feedback.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
        }
    } else {
        feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Masih ada jawaban yang belum tepat. Hitung kembali banyak kotak ke kanan dan ke bawah dari titik A ke titik B.
            </div>
        `;

        renderMath(feedback);
    }
}

function resetLatihan3Gradien() {
    ["lat3_dy", "lat3_dx", "lat3_m"].forEach((id) => {
        const el = document.getElementById(id);

        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    const feedback = document.getElementById("feedbackLatihan3Gradien");
    if (feedback) feedback.innerHTML = "";
}
