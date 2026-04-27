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
        if (!ggb) return;

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
        if (!hasil) continue;

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

    const kesimpulan = document.getElementById("kesimpulanGaris");
    if (kesimpulan) {
        kesimpulan.style.display = benarSemua ? "block" : "none";
    }
}

// Memahami bentuk implisit
function cekJawabanABC() {
    const inputA = document.getElementById("inputA")?.value.trim() || "";
    const inputB = document.getElementById("inputB")?.value.trim() || "";
    const inputC = document.getElementById("inputC")?.value.trim() || "";
    const hasil = document.getElementById("hasilABC");
    if (!hasil) return;

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

    renderMathSafe(hasil);
}

function resetKotakABC() {
    const inputA = document.getElementById("inputA");
    const inputB = document.getElementById("inputB");
    const inputC = document.getElementById("inputC");
    const hasil = document.getElementById("hasilABC");

    if (inputA) inputA.value = "";
    if (inputB) inputB.value = "";
    if (inputC) inputC.value = "";
    if (hasil) {
        hasil.innerHTML = "";
        hasil.style.display = "none";
    }
}

// Contoh menentukan persamaan garis lurus atau tidak
function toggleSolution(id, btn) {
    const el = document.getElementById(id);
    if (!el || !btn) return;

    const isHidden = el.style.display === "none" || el.style.display === "";
    el.style.display = isHidden ? "block" : "none";
    btn.textContent = isHidden
        ? "Sembunyikan Penyelesaian"
        : "Lihat Penyelesaian";
}

// Contoh implisit klik kotak abc
function tampilABC(huruf) {
    const hasil = document.getElementById("hasilABC");
    if (!hasil) return;

    if (huruf === "a") hasil.innerHTML = "$a = 3$";
    if (huruf === "b") hasil.innerHTML = "$b = 2$";
    if (huruf === "c") hasil.innerHTML = "$c = -6$";

    renderMathSafe(hasil);
}

// Contoh mengubah persamaan eksplisit ke implisit
function openStepUmum(id, btn) {
    const el = document.getElementById(id);
    if (!el || !btn) return;

    el.style.display = "block";
    btn.style.display = "none";
}

function openStepS(id, btn) {
    const next = document.getElementById(id);
    if (!next || !btn) return;

    next.style.display = "block";
    btn.style.display = "none";
}

function openStep(n, btn) {
    const next = document.getElementById("step" + n);
    if (!next || !btn) return;

    next.style.display = "block";
    btn.style.display = "none";
}

// =========================
// HELPER
// =========================
function renderMathSafe(target) {
    if (!target || !window.renderMathInElement) return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "$", right: "$", display: false },
        ],
    });
}

function norm(expr) {
    return String(expr || "")
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .trim();
}

// SAVE PROGRESS
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

// BUKA TOMBOL NEXT
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
// LATIHAN SOAL
// =========================
let draggedItem = null;

document.addEventListener("DOMContentLoaded", function () {
    initDragDropA1();
});

function getContentWrapper() {
    return document.querySelector(".content-wrapper");
}

function renderMathSafe(target) {
    if (!target || !window.renderMathInElement) return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "$", right: "$", display: false },
        ],
    });
}

function scrollKeStep(stepId) {
    const content = document.querySelector(".content-wrapper");
    const step = document.getElementById(stepId);
    if (!content || !step) return;

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

function norm(expr) {
    return String(expr || "")
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .trim();
}

// =========================
// LATIHAN 1
// =========================
function initDragDropA1() {
    const items = document.querySelectorAll(".opsi-item");
    const dropzone = document.getElementById("dropLinear");
    const opsiWrap = document.getElementById("opsiLinear");

    if (!items.length || !dropzone || !opsiWrap) return;

    items.forEach((item) => {
        item.addEventListener("dragstart", function () {
            draggedItem = this;
        });
    });

    [dropzone, opsiWrap].forEach((area) => {
        area.addEventListener("dragover", function (e) {
            e.preventDefault();
            if (this.id === "dropLinear") this.classList.add("over");
        });

        area.addEventListener("dragleave", function () {
            if (this.id === "dropLinear") this.classList.remove("over");
        });

        area.addEventListener("drop", function (e) {
            e.preventDefault();
            this.classList.remove("over");

            if (draggedItem) {
                this.appendChild(draggedItem);
                draggedItem = null;
            }
        });
    });
}

function cekLatihan1A1() {
    const dropzone = document.getElementById("dropLinear");
    const fb = document.getElementById("feedbackLatihan1A1");
    const nextBtn = document.getElementById("nextBtn1");

    if (!dropzone || !fb || !nextBtn) return;

    const items = dropzone.querySelectorAll(".opsi-item");

    if (items.length === 0) {
        fb.innerHTML = "Belum ada jawaban yang diseret ke kotak.";
        fb.style.color = "red";
        nextBtn.disabled = true;
        return;
    }

    let semuaBenar = true;
    let jumlahBenar = 0;

    items.forEach((item) => {
        if (item.dataset.linear === "true") {
            jumlahBenar++;
        } else {
            semuaBenar = false;
        }
    });

    const totalLinear = document.querySelectorAll(
        '.opsi-item[data-linear="true"]',
    ).length;

    if (semuaBenar && jumlahBenar === totalLinear) {
        fb.innerHTML =
            "Benar. Semua pilihanmu merupakan persamaan garis lurus.";
        fb.style.color = "green";
        nextBtn.disabled = false;
    } else {
        fb.innerHTML =
            "Masih ada jawaban yang belum tepat. Persamaan garis lurus hanya memuat variabel berpangkat satu dan tidak mengandung akar, pangkat lebih dari satu, atau hasil kali variabel.";
        fb.style.color = "red";
        nextBtn.disabled = true;
    }
}

function resetLatihan1A1() {
    const opsiWrap = document.getElementById("opsiLinear");
    const dropzone = document.getElementById("dropLinear");
    const feedback = document.getElementById("feedbackLatihan1A1");
    const nextBtn = document.getElementById("nextBtn1");

    if (!opsiWrap || !dropzone || !feedback || !nextBtn) return;

    const items = Array.from(dropzone.querySelectorAll(".opsi-item"));
    items.forEach((item) => opsiWrap.appendChild(item));

    feedback.innerHTML = "";
    nextBtn.disabled = true;

    resetStepSetelah(2);
}

// =========================
// LATIHAN 2
// =========================
function cekLatihan2A1() {
    let skor = 0;

    const a = norm(document.getElementById("lat2a")?.value);
    const b = norm(document.getElementById("lat2b")?.value);
    const c = norm(document.getElementById("lat2c")?.value);

    const fba = document.getElementById("fb-lat2a");
    const fbb = document.getElementById("fb-lat2b");
    const fbc = document.getElementById("fb-lat2c");
    const fb = document.getElementById("feedbackLatihan2A1");
    const nextBtn = document.getElementById("nextBtn2");

    if (!fba || !fbb || !fbc || !fb || !nextBtn) return;

    if (["2x-y-5", "-2x+y+5"].includes(a)) {
        fba.innerHTML = "Benar.";
        fba.style.color = "green";
        skor++;
    } else {
        fba.innerHTML = "Belum tepat.";
        fba.style.color = "red";
    }

    if (["3x+y-4", "-3x-y+4"].includes(b)) {
        fbb.innerHTML = "Benar.";
        fbb.style.color = "green";
        skor++;
    } else {
        fbb.innerHTML = "Belum tepat.";
        fbb.style.color = "red";
    }

    if (["x-2y+6", "-x+2y-6"].includes(c)) {
        fbc.innerHTML = "Benar.";
        fbc.style.color = "green";
        skor++;
    } else {
        fbc.innerHTML = "Belum tepat.";
        fbc.style.color = "red";
    }

    if (skor === 3) {
        fb.innerHTML = "Bagus. Semua jawabanmu benar.";
        fb.style.color = "green";
        nextBtn.disabled = false;
    } else {
        fb.innerHTML = `Kamu menjawab ${skor} dari 3 soal dengan benar.`;
        fb.style.color = "black";
        nextBtn.disabled = true;
    }
}

function resetLatihan2A1() {
    ["lat2a", "lat2b", "lat2c"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.value = "";
    });

    ["fb-lat2a", "fb-lat2b", "fb-lat2c", "feedbackLatihan2A1"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.innerHTML = "";
    });

    const nextBtn = document.getElementById("nextBtn2");
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(3);
}

// =========================
// LATIHAN 3
// =========================
async function cekLatihan3A1() {
    let skor = 0;

    const a = norm(document.getElementById("lat3a")?.value);
    const b = norm(document.getElementById("lat3b")?.value);
    const c = norm(document.getElementById("lat3c")?.value);

    const fba = document.getElementById("fb-lat3a");
    const fbb = document.getElementById("fb-lat3b");
    const fbc = document.getElementById("fb-lat3c");
    const fb = document.getElementById("feedbackLatihan3A1");

    if (!fba || !fbb || !fbc || !fb) return;

    if (["-3x+7"].includes(a)) {
        fba.innerHTML = "Benar.";
        fba.style.color = "green";
        skor++;
    } else {
        fba.innerHTML = "Belum tepat.";
        fba.style.color = "red";
    }

    if (["1/2x+2", "0.5x+2"].includes(b)) {
        fbb.innerHTML = "Benar.";
        fbb.style.color = "green";
        skor++;
    } else {
        fbb.innerHTML = "Belum tepat.";
        fbb.style.color = "red";
    }

    if (["-5/2x+3", "-2.5x+3"].includes(c)) {
        fbc.innerHTML = "Benar.";
        fbc.style.color = "green";
        skor++;
    } else {
        fbc.innerHTML = "Belum tepat.";
        fbc.style.color = "red";
    }

    if (skor === 3) {
        const saved = await saveProgressMateri();

        if (saved) {
            fb.innerHTML =
                "Bagus. Semua jawabanmu benar. Silakan lanjut ke materi berikutnya.";
            fb.style.color = "green";

            bukaNextButton();
        } else {
            fb.innerHTML = "Jawaban benar, tapi progres belum tersimpan.";
            fb.style.color = "orange";
        }
    } else {
        fb.innerHTML = `Kamu menjawab ${skor} dari 3 soal dengan benar.`;
        fb.style.color = "black";
    }
}

function resetLatihan3A1() {
    ["lat3a", "lat3b", "lat3c"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.value = "";
    });

    ["fb-lat3a", "fb-lat3b", "fb-lat3c", "feedbackLatihan3A1"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.innerHTML = "";
    });
}
