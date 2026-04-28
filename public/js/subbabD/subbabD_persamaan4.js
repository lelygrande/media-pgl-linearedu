// =========================================================
// HELPER UMUM
// =========================================================
function normJawaban(teks) {
    return (teks || "")
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[()]/g, "");
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

function isiPesan(id, pesan, tipe = "info") {
    const el = document.getElementById(id);
    if (!el) return;

    const kelas =
        tipe === "success"
            ? "alert-success"
            : tipe === "warning"
              ? "alert-warning"
              : "alert-info";

    el.innerHTML = `<div class="alert ${kelas} py-2 mb-0">${pesan}</div>`;
}

function kosongkan(id) {
    const el = document.getElementById(id);
    if (el) el.innerHTML = "";
}

function pindahLatihan(index) {
    const track = document.getElementById("latihanTrack");
    if (!track) return;
    track.style.transform = `translateX(-${index * 100}%)`;
}

// =========================================================
// EKSPLORASI
// =========================================================
function cekEksplorasiTegakLurus() {
    const benar1 = cekIsian("eks_tl_1", ["-1"]);
    const benar2atas = cekIsian("eks_tl_2_atas", ["-1"]);
    const benar2bawah = cekIsian("eks_tl_2_bawah", ["mg", "m_g"]);
    const benar3 = cekIsian("eks_tl_3", ["y1", "y_1"]);
    const benar4 = cekIsian("eks_tl_4", ["mh", "m_h"]);
    const benar5 = cekIsian("eks_tl_5", ["x1", "x_1"]);

    const semuaBenar = benar1 && benar2atas && benar2bawah && benar3 && benar4 && benar5;

    const kesimpulan = document.getElementById("kesimpulanEksplorasiTegakLurus");

    if (semuaBenar) {
        isiPesan(
            "feedbackEksplorasiTegakLurus",
            "Bagus, kamu sudah menemukan hubungan gradien dua garis yang saling tegak lurus dan bentuk persamaan garisnya.",
            "success"
        );
        if (kesimpulan) kesimpulan.classList.remove("d-none");
        return;
    }

    isiPesan(
        "feedbackEksplorasiTegakLurus",
        "Masih ada jawaban yang belum tepat. Coba perhatikan lagi hubungan gradien dua garis yang saling tegak lurus.",
        "warning"
    );
    if (kesimpulan) kesimpulan.classList.add("d-none");
}

// =========================================================
// CONTOH SOAL
// Data: garis y = -4x + 9, titik (8,6)
// =========================================================
function tampilkanPetunjukContohSoalTegakLurus(pesan) {
    isiPesan("petunjukContohSoalTegakLurus", pesan, "info");
}

function cekContohSoalTegakLurus() {
    const benarM1 = cekIsian("cs_tl_m1", ["-4"]);

    const benarM2Atas = cekIsian("cs_tl_m2_atas", ["1"]);
    const benarM2Bawah = cekIsian("cs_tl_m2_bawah", ["4"]);

    const benarX1 = cekIsian("cs_tl_x1", ["8"]);
    const benarY1 = cekIsian("cs_tl_y1", ["6"]);

    const benarSubY1 = cekIsian("cs_tl_sub_y1", ["6"]);
    const benarSubMAtas = cekIsian("cs_tl_sub_m_atas", ["1"]);
    const benarSubMBawah = cekIsian("cs_tl_sub_m_bawah", ["4"]);
    const benarSubX1 = cekIsian("cs_tl_sub_x1", ["8"]);

    const benarUrai1 = cekIsian("cs_tl_urai1", ["6"]);
    const benarUrai2 = cekIsian("cs_tl_urai2", [
        "1/4x-2",
        "1/4x - 2",
        "0.25x-2",
        "0.25x + -2",
        "0.25x - 2"
    ]);

    const benarAkhir = cekIsian("cs_tl_akhir", [
        "1/4x+4",
        "1/4x + 4",
        "0.25x+4",
        "0.25x + 4"
    ]);

    const benarUmum = cekIsian("cs_tl_umum", [
        "x-4y+16",
        "x - 4y + 16",
        "-x+4y-16",
        "-x + 4y - 16"
    ]);

    const semuaBenar =
        benarM1 &&
        benarM2Atas &&
        benarM2Bawah &&
        benarX1 &&
        benarY1 &&
        benarSubY1 &&
        benarSubMAtas &&
        benarSubMBawah &&
        benarSubX1 &&
        benarUrai1 &&
        benarUrai2 &&
        benarAkhir &&
        benarUmum;

    const pembahasan = document.getElementById("pembahasanContohSoalTegakLurus");

    if (semuaBenar) {
        isiPesan(
            "feedbackContohSoalTegakLurus",
            "Bagus, langkah-langkah penyelesaianmu sudah benar.",
            "success"
        );
        kosongkan("petunjukContohSoalTegakLurus");
        if (pembahasan) pembahasan.classList.remove("d-none");
        return;
    }

    isiPesan(
        "feedbackContohSoalTegakLurus",
        "Masih ada jawaban yang belum tepat. Coba periksa lagi langkah-langkahnya.",
        "warning"
    );
    if (pembahasan) pembahasan.classList.add("d-none");

    if (!benarM1) {
        tampilkanPetunjukContohSoalTegakLurus("Petunjuk: gradien garis y = mx + c adalah koefisien x.");
        return;
    }

    if (!benarM2Atas || !benarM2Bawah) {
        tampilkanPetunjukContohSoalTegakLurus("Petunjuk: gradien garis yang tegak lurus adalah negatif kebalikan dari gradien semula.");
        return;
    }

    if (!benarX1 || !benarY1) {
        tampilkanPetunjukContohSoalTegakLurus("Petunjuk: titik yang dilalui adalah A(8,6).");
        return;
    }

    if (!benarSubY1 || !benarSubMAtas || !benarSubMBawah || !benarSubX1) {
        tampilkanPetunjukContohSoalTegakLurus("Petunjuk: masukkan titik (8,6) dan gradien 1/4 ke bentuk y - y1 = m(x - x1).");
        return;
    }

    if (!benarUrai1 || !benarUrai2) {
        tampilkanPetunjukContohSoalTegakLurus("Petunjuk: uraikan 1/4 (x - 8) terlebih dahulu.");
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjukContohSoalTegakLurus("Petunjuk: dari y - 6 = 1/4x - 2, pindahkan -6 ke ruas kanan.");
        return;
    }

    if (!benarUmum) {
        tampilkanPetunjukContohSoalTegakLurus("Petunjuk: hilangkan pecahan pada y = 1/4x + 4, lalu susun ke bentuk ax + by + c = 0.");
    }
}

// =========================================================
// LATIHAN MATERI TERAKHIR SUBBAB D
// Sistem turun ke bawah + buka Kuis
// =========================================================

// =========================================================
// HELPER UMUM LATIHAN
// =========================================================
function normJawaban(teks) {
    return String(teks || "")
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[()]/g, "")
        .replace(/−/g, "-");
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

function isiPesan(id, pesan, tipe = "info") {
    const el = document.getElementById(id);
    if (!el) return;

    const kelas =
        tipe === "success"
            ? "alert-success"
            : tipe === "warning"
                ? "alert-warning"
                : "alert-info";

    el.innerHTML = `<div class="alert ${kelas} py-2 mb-0">${pesan}</div>`;
    renderMathSafe(el);
}

function kosongkan(id) {
    const el = document.getElementById(id);
    if (el) el.innerHTML = "";
}

function renderMathSafe(target) {
    if (!window.renderMathInElement || !target) return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "$", right: "$", display: false },
            { left: "\\(", right: "\\)", display: false },
            { left: "\\[", right: "\\]", display: true },
        ],
        throwOnError: false,
    });
}

document.addEventListener("DOMContentLoaded", function () {
    renderMathSafe(document.getElementById("latihanDLastBox") || document.body);
});

// =========================================================
// NAVIGASI LATIHAN
// =========================================================
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

// =========================================================
// SAVE PROGRESS + BUKA KUIS
// =========================================================
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

// =========================================================
// RESET INPUT
// =========================================================
function resetInput(ids) {
    ids.forEach((id) => {
        const el = document.getElementById(id);

        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });
}

// =========================================================
// LATIHAN 1
// Data: titik D(4,2), tegak lurus y = -3x + 7
// Hasil: y = 1/3x + 2/3
// =========================================================
function tampilkanPetunjukLatihan1(pesan) {
    isiPesan("petunjukLatihan1", pesan, "info");
}

function cekLatihan1TegakLurus() {
    const benarM1 = cekIsian("lat1_m1", ["-3"]);

    const benarM2Atas = cekIsian("lat1_m2_atas", ["1"]);
    const benarM2Bawah = cekIsian("lat1_m2_bawah", ["3"]);

    const benarSubY1 = cekIsian("lat1_sub_y1", ["2"]);
    const benarSubMAtas = cekIsian("lat1_sub_m_atas", ["1"]);
    const benarSubMBawah = cekIsian("lat1_sub_m_bawah", ["3"]);
    const benarSubX1 = cekIsian("lat1_sub_x1", ["4"]);

    const benarUrai1 = cekIsian("lat1_urai1", ["2"]);
    const benarUrai2 = cekIsian("lat1_urai2", [
        "1/3x-4/3",
        "1/3x - 4/3",
        "0.333x-1.333",
        "0.333x - 1.333",
        "0.33x-1.33",
        "0.33x - 1.33",
    ]);

    const benarAkhir = cekIsian("lat1_akhir", [
        "1/3x+2/3",
        "1/3x + 2/3",
        "0.333x+0.667",
        "0.333x + 0.667",
        "0.33x+0.67",
        "0.33x + 0.67",
    ]);

    const semuaBenar =
        benarM1 &&
        benarM2Atas &&
        benarM2Bawah &&
        benarSubY1 &&
        benarSubMAtas &&
        benarSubMBawah &&
        benarSubX1 &&
        benarUrai1 &&
        benarUrai2 &&
        benarAkhir;

    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (semuaBenar) {
        isiPesan(
            "feedbackLatihan1",
            "Bagus, jawabanmu sudah benar. Silakan lanjut ke latihan berikutnya.",
            "success"
        );

        kosongkan("petunjukLatihan1");

        if (nextBtn) nextBtn.disabled = false;
        return;
    }

    isiPesan(
        "feedbackLatihan1",
        "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
        "warning"
    );

    if (nextBtn) nextBtn.disabled = true;
    resetStepSetelah(2);

    if (!benarM1) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: gradien garis $y = mx + c$ adalah koefisien $x$."
        );
        return;
    }

    if (!benarM2Atas || !benarM2Bawah) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: gradien garis yang tegak lurus adalah negatif kebalikan dari gradien semula."
        );
        return;
    }

    if (!benarSubY1 || !benarSubMAtas || !benarSubMBawah || !benarSubX1) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: gunakan titik $D(4,2)$ dan gradien yang sudah diperoleh ke bentuk $y-y_1=m(x-x_1)$."
        );
        return;
    }

    if (!benarUrai1 || !benarUrai2) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: uraikan $\\frac{1}{3}(x - 4)$ terlebih dahulu."
        );
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: dari $y - 2 = \\frac{1}{3}x - \\frac{4}{3}$, pindahkan $-2$ ke ruas kanan."
        );
    }
}

function resetLatihan1TegakLurus() {
    resetInput([
        "lat1_m1",
        "lat1_m2_atas",
        "lat1_m2_bawah",
        "lat1_sub_y1",
        "lat1_sub_m_atas",
        "lat1_sub_m_bawah",
        "lat1_sub_x1",
        "lat1_urai1",
        "lat1_urai2",
        "lat1_akhir",
    ]);

    kosongkan("feedbackLatihan1");
    kosongkan("petunjukLatihan1");

    const nextBtn = document.getElementById("nextBtnLatihan1");
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(2);
}

// =========================================================
// LATIHAN 2
// Data: titik E(7,-4), tegak lurus gradien -2/5
// Hasil: y = 5/2x - 43/2
// =========================================================
function tampilkanPetunjukLatihan2(pesan) {
    isiPesan("petunjukLatihan2", pesan, "info");
}

function cekLatihan2TegakLurus() {
    const benarMAtas = cekIsian("lat2_m_atas", ["5"]);
    const benarMBawah = cekIsian("lat2_m_bawah", ["2"]);

    const benarSubY1 = cekIsian("lat2_sub_y1", ["-4"]);
    const benarSubMAtas = cekIsian("lat2_sub_m_atas", ["5"]);
    const benarSubMBawah = cekIsian("lat2_sub_m_bawah", ["2"]);
    const benarSubX1 = cekIsian("lat2_sub_x1", ["7"]);

    const benarUrai1 = cekIsian("lat2_urai1", ["4"]);
    const benarUrai2 = cekIsian("lat2_urai2", [
        "5/2x-35/2",
        "5/2x - 35/2",
        "2.5x-17.5",
        "2.5x - 17.5",
    ]);

    const benarAkhir = cekIsian("lat2_akhir", [
        "5/2x-43/2",
        "5/2x - 43/2",
        "2.5x-21.5",
        "2.5x - 21.5",
    ]);

    const benarUmum = cekIsian("lat2_umum", [
        "5x-2y-43",
        "5x - 2y - 43",
        "-5x+2y+43",
        "-5x + 2y + 43",
    ]);

    const semuaBenar =
        benarMAtas &&
        benarMBawah &&
        benarSubY1 &&
        benarSubMAtas &&
        benarSubMBawah &&
        benarSubX1 &&
        benarUrai1 &&
        benarUrai2 &&
        benarAkhir &&
        benarUmum;

    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (semuaBenar) {
        isiPesan(
            "feedbackLatihan2",
            "Bagus, jawabanmu sudah benar. Silakan lanjut ke latihan berikutnya.",
            "success"
        );

        kosongkan("petunjukLatihan2");

        if (nextBtn) nextBtn.disabled = false;
        return;
    }

    isiPesan(
        "feedbackLatihan2",
        "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
        "warning"
    );

    if (nextBtn) nextBtn.disabled = true;
    resetStepSetelah(3);

    if (!benarMAtas || !benarMBawah) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: gradien garis yang tegak lurus adalah negatif kebalikan dari gradien semula."
        );
        return;
    }

    if (!benarSubY1 || !benarSubMAtas || !benarSubMBawah || !benarSubX1) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: gunakan titik $E(7,-4)$ dan gradien yang sudah diperoleh ke bentuk $y-y_1=m(x-x_1)$."
        );
        return;
    }

    if (!benarUrai1 || !benarUrai2) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: uraikan $\\frac{5}{2}(x - 7)$ terlebih dahulu."
        );
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: dari $y + 4 = \\frac{5}{2}x - \\frac{35}{2}$, pindahkan $4$ ke ruas kanan."
        );
        return;
    }

    if (!benarUmum) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: hilangkan pecahan pada $y = \\frac{5}{2}x - \\frac{43}{2}$, lalu susun ke bentuk $ax + by + c = 0$."
        );
    }
}

function resetLatihan2TegakLurus() {
    resetInput([
        "lat2_m_atas",
        "lat2_m_bawah",
        "lat2_sub_y1",
        "lat2_sub_m_atas",
        "lat2_sub_m_bawah",
        "lat2_sub_x1",
        "lat2_urai1",
        "lat2_urai2",
        "lat2_akhir",
        "lat2_umum",
    ]);

    kosongkan("feedbackLatihan2");
    kosongkan("petunjukLatihan2");

    const nextBtn = document.getElementById("nextBtnLatihan2");
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(3);
}

// =========================================================
// LATIHAN 3
// Data: jalur utama melalui (1,14) dan (9,6), jalur baru melalui (12,-3)
// Hasil: y = x - 15
// Materi terakhir: buka Kuis
// =========================================================
function tampilkanPetunjukLatihan3(pesan) {
    isiPesan("petunjukLatihan3", pesan, "info");
}

async function cekLatihan3TegakLurus() {
    const benarM1Atas1 = cekIsian("lat3_m1_atas1", ["6"]);
    const benarM1Atas2 = cekIsian("lat3_m1_atas2", ["14"]);
    const benarM1Bawah1 = cekIsian("lat3_m1_bawah1", ["9"]);
    const benarM1Bawah2 = cekIsian("lat3_m1_bawah2", ["1"]);
    const benarM1Final = cekIsian("lat3_m1_final", ["-1"]);

    const benarM2Final = cekIsian("lat3_m2_final", ["1"]);

    const benarSubY1 = cekIsian("lat3_sub_y1", ["-3"]);
    const benarSubM = cekIsian("lat3_sub_m", ["1"]);
    const benarSubX1 = cekIsian("lat3_sub_x1", ["12"]);

    const benarUrai1 = cekIsian("lat3_urai1", ["3"]);
    const benarUrai2 = cekIsian("lat3_urai2", ["x-12", "x - 12"]);

    const benarAkhir = cekIsian("lat3_akhir", ["x-15", "x - 15"]);

    const semuaBenar =
        benarM1Atas1 &&
        benarM1Atas2 &&
        benarM1Bawah1 &&
        benarM1Bawah2 &&
        benarM1Final &&
        benarM2Final &&
        benarSubY1 &&
        benarSubM &&
        benarSubX1 &&
        benarUrai1 &&
        benarUrai2 &&
        benarAkhir;

    const feedback = document.getElementById("feedbackLatihan3");
    const akhir = document.getElementById("pesanAkhirLatihan");

    if (semuaBenar) {
        isiPesan(
            "feedbackLatihan3",
            "Bagus, jawabanmu sudah benar. Kamu sudah menyelesaikan semua latihan.",
            "success"
        );

        kosongkan("petunjukLatihan3");

        if (akhir) {
            akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami persamaan garis yang tegak lurus dengan garis lain.
                    Silakan lanjut ke kuis.
                </div>
            `;
            renderMathSafe(akhir);
        }

        const saved = await saveProgressMateri();

        if (saved) {
            bukaQuizButton();
        } else if (feedback) {
            feedback.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
        }

        return;
    }

    isiPesan(
        "feedbackLatihan3",
        "Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.",
        "warning"
    );

    if (akhir) akhir.innerHTML = "";

    if (
        !benarM1Atas1 ||
        !benarM1Atas2 ||
        !benarM1Bawah1 ||
        !benarM1Bawah2 ||
        !benarM1Final
    ) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: tentukan dulu gradien garis yang melalui titik $(1,14)$ dan $(9,6)$."
        );
        return;
    }

    if (!benarM2Final) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: gradien garis yang tegak lurus dengan gradien $-1$ adalah $1$."
        );
        return;
    }

    if (!benarSubY1 || !benarSubM || !benarSubX1) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: karena titiknya $(12,-3)$, maka bentuknya ditulis menjadi $y + 3 = 1(x - 12)$."
        );
        return;
    }

    if (!benarUrai1 || !benarUrai2) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: uraikan $1(x - 12)$ terlebih dahulu."
        );
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: dari $y + 3 = x - 12$, pindahkan $3$ ke ruas kanan."
        );
    }
}

function resetLatihan3TegakLurus() {
    resetInput([
        "lat3_m1_atas1",
        "lat3_m1_atas2",
        "lat3_m1_bawah1",
        "lat3_m1_bawah2",
        "lat3_m1_final",
        "lat3_m2_final",
        "lat3_sub_y1",
        "lat3_sub_m",
        "lat3_sub_x1",
        "lat3_urai1",
        "lat3_urai2",
        "lat3_akhir",
    ]);

    kosongkan("feedbackLatihan3");
    kosongkan("petunjukLatihan3");
    kosongkan("pesanAkhirLatihan");
}
