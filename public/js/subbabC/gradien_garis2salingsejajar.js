// =========================
// GeoGebra Eksplorasi
// =========================
let appletEks = null;
let sudahLoad = false;

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

    api.setCoordSystem(-7, 7, -7, 7);
    api.setAxisSteps(1, 1, 1, 1);

    // Titik-titik
    api.evalCommand("A=(-5,-1)");
    api.evalCommand("B=(-3,5)");
    api.evalCommand("C=(-3,-3)");
    api.evalCommand("D=(-1,3)");
    api.evalCommand("E=(0,-1)");
    api.evalCommand("F=(2,5)");
    api.evalCommand("G=(2,-2)");
    api.evalCommand("H=(3,1)");

    // Ruas garis
    api.evalCommand("s1=Segment(A,B)");
    api.evalCommand("s2=Segment(C,D)");
    api.evalCommand("s3=Segment(E,F)");
    api.evalCommand("s4=Segment(G,H)");

    // Atur titik
    ["A", "B", "C", "D", "E", "F", "G", "H"].forEach(function (obj) {
        api.setLabelVisible(obj, true);
        api.setFixed(obj, true, false);
        api.setPointSize(obj, 5);
        api.setColor(obj, 0, 0, 0);
    });

    // Atur ruas garis
    ["s1", "s2", "s3", "s4"].forEach(function (obj) {
        api.setLabelVisible(obj, false);
        api.setLineThickness(obj, 5);
        api.setColor(obj, 220, 60, 35);
    });

    // Tampilkan sumbu dan grid
    api.setAxesVisible(true, true);
    api.setGridVisible(true);

    // Atur tampilan koordinat
    api.setCoordSystem(-6, 6, -5.5, 6);
}

function tampilkanGrafik() {
    if (sudahLoad) return;

    const paramsEks = {
        appName: "classic",
        id: "ggbAppletEks",
        width: 500,
        height: 500,
        showToolBar: false,
        showAlgebraInput: false,
        showMenuBar: false,
        enableRightClick: false,
        showResetIcon: true,
        appletOnLoad: ggbOnLoadEks,
    };

    appletEks = new GGBApplet(paramsEks, true);
    appletEks.inject("ggb-eksplorasi");

    sudahLoad = true;
}

function tampilkanStep(id) {
    const el = document.getElementById(id);
    if (el) el.classList.remove("d-none");
}

function disableMany(ids) {
    ids.forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.disabled = true;
    });
}

function resetOpsiKotak(containerSelector) {
    const opsi = document.querySelectorAll(`${containerSelector} .opsi-kotak`);
    opsi.forEach((item) => {
        item.classList.remove("active", "benar", "salah");
    });
}

function tandaiOpsi(element, status) {
    if (!element) return;
    element.classList.add("active");
    if (status === "benar") {
        element.classList.add("benar");
    } else if (status === "salah") {
        element.classList.add("salah");
    }
}

function disableOpsiKotak(containerSelector) {
    const opsi = document.querySelectorAll(`${containerSelector} .opsi-kotak`);
    opsi.forEach((item) => {
        item.disabled = true;
        item.style.pointerEvents = "none";
    });
}

// =========================
// Eksplorasi
// =========================
function cekStep1() {
    const m1 = document.getElementById("m1").value.trim();
    const m2 = document.getElementById("m2").value.trim();
    const m3 = document.getElementById("m3").value.trim();
    const m4 = document.getElementById("m4").value.trim();
    const fb = document.getElementById("fb1");

    let pesan = [];

    if (m1 !== "3") pesan.push("Gradien garis <b>AB</b> belum tepat.");
    if (m2 !== "3") pesan.push("Gradien garis <b>CD</b> belum tepat.");
    if (m3 !== "3") pesan.push("Gradien garis <b>EF</b> belum tepat.");
    if (m4 !== "3") pesan.push("Gradien garis <b>GH</b> belum tepat.");

    if (pesan.length === 0) {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Bagus! Semua gradien sudah benar. Sekarang bandingkan hasilnya.
            </div>
        `;
        disableMany(["m1", "m2", "m3", "m4"]);
        tampilkanStep("step2");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                <b>Masih ada jawaban yang belum tepat:</b><br><br>
                ${pesan.join("<br>")}
                <br><br>
                <b>Petunjuk:</b> Gunakan rumus gradien
                <b>m = (y₂ - y₁)/(x₂ - x₁)</b>.
            </div>
        `;
        renderKatexById("fb1");
    }
}

function cekStep2(jawaban, el) {
    const fb = document.getElementById("fb2");
    const container = "#step2";

    resetOpsiKotak(container);

    if (jawaban === "sama") {
        tandaiOpsi(el, "benar");
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Tepat. Keempat garis memiliki gradien yang sama.
            </div>
        `;
        disableOpsiKotak(container);
        tampilkanStep("step3");
    } else {
        tandaiOpsi(el, "salah");
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba perhatikan kembali hasil gradien pada tabel. Apakah semuanya menunjukkan nilai yang sama?
            </div>
        `;
    }
}

function cekStep3(jawaban, el) {
    const fb = document.getElementById("fb3");
    const container = "#step3";

    resetOpsiKotak(container);

    if (jawaban === "sejajar") {
        tandaiOpsi(el, "benar");
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Benar. Jika gradiennya sama, garis-garis tersebut saling sejajar.
            </div>
        `;
        disableOpsiKotak(container);
        tampilkanStep("step4");
    } else {
        tandaiOpsi(el, "salah");
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba bayangkan: jika beberapa garis memiliki kemiringan yang sama, apakah mereka akan saling berpotongan?
            </div>
        `;
    }
}

function cekStep4() {
    const fb = document.getElementById("fb4");

    fb.innerHTML = `
        <div class="alert alert-success mt-2">
            Kesimpulanmu benar! Sekarang perhatikan grafik dan kesimpulannya.
        </div>
    `;

    document.getElementById("kesimpulan").classList.remove("d-none");
    document.getElementById("ggb-wrapper-sejajar").classList.remove("d-none");

    setTimeout(function () {
        tampilkanGrafik();
    }, 200);

    renderKatexById("fb4");
    renderKatexById("kesimpulan");
}

// Contoh Soal
function cekContoh1() {
    let val = document.getElementById("ck1").value;
    if (val == 1) {
        document.getElementById("cf1").innerHTML = "Benar!";
        document.getElementById("contohStep2").classList.remove("d-none");
    } else {
        document.getElementById("cf1").innerHTML = "Coba lagi.";
    }
}

function cekContoh2() {
    let val = document.getElementById("ck2").value;
    if (val == 1) {
        document.getElementById("cf2").innerHTML = "Benar!";
        document.getElementById("contohStep3").classList.remove("d-none");
    } else {
        document.getElementById("cf2").innerHTML = "Coba lagi.";
    }
}

function cekContoh3() {
    let val = document.getElementById("ck3").value;
    if (val == "sejajar") {
        document.getElementById("cf3").innerHTML = "Tepat!";
        document.getElementById("pembahasan").classList.remove("d-none");
    } else {
        document.getElementById("cf3").innerHTML =
            "Perhatikan kembali gradiennya.";
    }
}

// =========================
// LATIHAN SOAL SUBBAB C2
// Sistem turun ke bawah
// =========================

// =========================
// HELPER
// =========================
function norm(v) {
    return String(v || "")
        .trim()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .toLowerCase();
}

function renderMathTarget(el) {
    if (!window.renderMathInElement || !el) return;

    renderMathInElement(el, {
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
    renderMathTarget(document.getElementById("latihanC2Box") || document.body);
});

// =========================
// NAVIGASI LATIHAN
// =========================
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
    renderMathTarget(step);
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
// VALIDASI UMUM
// =========================
function cekField(id, jawabanBenar) {
    const el = document.getElementById(id);

    if (!el) {
        return false;
    }

    const nilaiUser = norm(el.value);
    const daftarJawaban = Array.isArray(jawabanBenar)
        ? jawabanBenar.map(norm)
        : [norm(jawabanBenar)];

    const cocok = daftarJawaban.includes(nilaiUser);

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(cocok ? "is-valid" : "is-invalid");

    return cocok;
}

function clearFields(ids) {
    ids.forEach((id) => {
        const el = document.getElementById(id);

        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });
}

function isiFeedback(id, tipe, pesan) {
    const el = document.getElementById(id);
    if (!el) return;

    const kelas = tipe === "success" ? "alert-success" : "alert-warning";

    el.innerHTML = `
        <div class="alert ${kelas} mb-0">
            ${pesan}
        </div>
    `;

    renderMathTarget(el);
}

// =========================
// LATIHAN 1
// =========================
function cekLatihan1() {
    const benarA = cekField("l1_A", "20");
    const benarB = cekField("l1_B", "-2");
    const benarSubAtas = cekField("l1_subAtas", "-20");
    const benarSubBawah = cekField("l1_subBawah", "-2");
    const benarHasil = cekField("l1_hasil", "10");
    const benarFinal = cekField("l1_final", "10");

    const semuaBenar =
        benarA &&
        benarB &&
        benarSubAtas &&
        benarSubBawah &&
        benarHasil &&
        benarFinal;

    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (semuaBenar) {
        isiFeedback(
            "fbLatihan1",
            "success",
            "Benar. Gradien garis $20x - 2y + 5 = 0$ adalah $10$, sehingga gradien garis $p$ juga $10$ karena kedua garis sejajar. Silakan lanjut ke latihan berikutnya."
        );

        if (nextBtn) nextBtn.disabled = false;
    } else {
        isiFeedback(
            "fbLatihan1",
            "warning",
            "Masih ada jawaban yang belum tepat. Gunakan rumus $m = -\\frac{A}{B}$, lalu ingat bahwa garis sejajar memiliki gradien yang sama."
        );

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(2);
    }
}

function resetLatihan1() {
    clearFields([
        "l1_A",
        "l1_B",
        "l1_subAtas",
        "l1_subBawah",
        "l1_hasil",
        "l1_final",
    ]);

    const fb = document.getElementById("fbLatihan1");
    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (fb) fb.innerHTML = "";
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(2);
}

// =========================
// LATIHAN 2
// =========================
function cekLatihan2() {
    const a = document.getElementById("l2_a")?.checked;
    const b = document.getElementById("l2_b")?.checked;
    const c = document.getElementById("l2_c")?.checked;
    const d = document.getElementById("l2_d")?.checked;

    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (a && c && !b && !d) {
        isiFeedback(
            "fbLatihan2",
            "success",
            "Benar. Garis a dan c sejajar dengan $y = 4x + 2$ karena memiliki gradien yang sama, yaitu $4$. Silakan lanjut ke latihan berikutnya."
        );

        if (nextBtn) nextBtn.disabled = false;
    } else {
        isiFeedback(
            "fbLatihan2",
            "warning",
            "Masih ada pilihan yang belum tepat. Ubah setiap persamaan ke bentuk $y = mx + c$, lalu bandingkan nilai gradiennya."
        );

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(3);
    }
}

function resetLatihan2() {
    ["l2_a", "l2_b", "l2_c", "l2_d"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.checked = false;
    });

    const fb = document.getElementById("fbLatihan2");
    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (fb) fb.innerHTML = "";
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(3);
}

// =========================
// LATIHAN 3
// =========================
async function cekLatihan3() {
    const benarM1Atas = cekField("l3_m1_atas", "-4");
    const benarM1Bawah = cekField("l3_m1_bawah", "c");
    const benarM2 = cekField("l3_m2", "-1");

    const benarRelasi = cekField("l3_relasi", [
        "m1=m2",
        "m_1=m_2",
        "m₁=m₂",
    ]);

    const benarKiriAtas = cekField("l3_kiri_atas", "-4");
    const benarKiriBawah = cekField("l3_kiri_bawah", "c");
    const benarKanan = cekField("l3_kanan", "-1");
    const benarC = cekField("l3_c", "4");

    const semuaBenar =
        benarM1Atas &&
        benarM1Bawah &&
        benarM2 &&
        benarRelasi &&
        benarKiriAtas &&
        benarKiriBawah &&
        benarKanan &&
        benarC;

    const akhir = document.getElementById("pesanAkhirLatihan");

    if (semuaBenar) {
        isiFeedback(
            "fbLatihan3",
            "success",
            "Benar. Karena kedua garis sejajar, maka $m_1 = m_2$. Dari $-\\frac{4}{c} = -1$, diperoleh $c = 4$."
        );

        if (akhir) {
            akhir.innerHTML = `
                <div class="alert alert-success fw-semibold text-center mt-3">
                    Bagus, kamu sudah memahami gradien dua garis yang sejajar.
                    Silakan lanjut ke materi berikutnya.
                </div>
            `;
            renderMathTarget(akhir);
        }

        const saved = await saveProgressMateri();

        if (saved) {
            bukaNextButton();
        } else if (akhir) {
            akhir.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
        }
    } else {
        isiFeedback(
            "fbLatihan3",
            "warning",
            "Masih ada jawaban yang belum tepat. Gunakan rumus gradien bentuk umum $Ax + By + C = 0$, yaitu $m = -\\frac{A}{B}$, lalu samakan kedua gradien karena garisnya sejajar."
        );

        if (akhir) akhir.innerHTML = "";
    }
}

function resetLatihan3() {
    clearFields([
        "l3_m1_atas",
        "l3_m1_bawah",
        "l3_m2",
        "l3_relasi",
        "l3_kiri_atas",
        "l3_kiri_bawah",
        "l3_kanan",
        "l3_c",
    ]);

    const fb = document.getElementById("fbLatihan3");
    const akhir = document.getElementById("pesanAkhirLatihan");

    if (fb) fb.innerHTML = "";
    if (akhir) akhir.innerHTML = "";
}
