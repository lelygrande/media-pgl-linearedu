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

function cekIsian(id, jawabanBenar) {
    const el = document.getElementById(id);
    if (!el) return false;

    const userValue = norm(el.value);
    const daftarJawaban = Array.isArray(jawabanBenar)
        ? jawabanBenar.map(norm)
        : [norm(jawabanBenar)];

    const benar = daftarJawaban.includes(userValue);

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(benar ? "is-valid" : "is-invalid");

    return benar;
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
    for (let i = stepMulai; i <= 2; i++) {
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
// LATIHAN 1 A2.1
// =========================
function cekLatihan1A21() {
    const hasil = [
        cekIsian("lat1_y1", "-5"),
        cekIsian("lat1_y2", "-3"),
        cekIsian("lat1_y3", "-1"),
        cekIsian("lat1_y4", "1"),

        cekIsian("lat1_pair1", ["(-2,-5)", "-2,-5"]),
        cekIsian("lat1_pair2", ["(0,-3)", "0,-3"]),
        cekIsian("lat1_pair3", ["(2,-1)", "2,-1"]),
        cekIsian("lat1_pair4", ["(4,1)", "4,1"]),
    ];

    const nextBtn = document.getElementById("nextBtnLat1");
    const feedback = document.getElementById("feedbackLatihan1");
    const boxKesimpulan = document.getElementById("kesimpulanLat1");

    if (!feedback) return;

    if (hasil.every(Boolean)) {
        feedback.innerHTML = `<span style="color:#15803d;">Bagus! Semua jawaban benar.</span>`;

        if (boxKesimpulan) boxKesimpulan.style.display = "block";
        if (nextBtn) nextBtn.disabled = false;
    } else {
        feedback.innerHTML = `<span style="color:#b91c1c;">Masih ada yang salah.</span>`;

        if (boxKesimpulan) boxKesimpulan.style.display = "none";
        if (nextBtn) nextBtn.disabled = true;

        resetStepSetelah(2);
    }
}

function resetLatihan1A21() {
    [
        "lat1_y1",
        "lat1_y2",
        "lat1_y3",
        "lat1_y4",
        "lat1_pair1",
        "lat1_pair2",
        "lat1_pair3",
        "lat1_pair4",
    ].forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    const feedback = document.getElementById("feedbackLatihan1");
    const boxKesimpulan = document.getElementById("kesimpulanLat1");
    const nextBtn = document.getElementById("nextBtnLat1");

    if (feedback) feedback.innerHTML = "";
    if (boxKesimpulan) boxKesimpulan.style.display = "none";
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(2);
}

// =========================
// LATIHAN 2 A2.1
// =========================
function cekTabelA21() {
    const inputIds = ["y1", "y2", "y3", "y4"];

    const kosong = inputIds.some((id) => {
        const el = document.getElementById(id);
        return !el || el.value.trim() === "";
    });

    const feedbackTabel = document.getElementById("feedbackTabel");
    const grafikSection = document.getElementById("grafikSection");
    const boxKesimpulan = document.getElementById("kesimpulanLat2");

    if (kosong) {
        if (feedbackTabel) {
            feedbackTabel.innerHTML =
                `<span style="color:#b45309;">Isi semua nilai y dulu ya.</span>`;
        }

        if (grafikSection) grafikSection.style.display = "none";
        if (boxKesimpulan) boxKesimpulan.style.display = "none";
        return;
    }

    const benar1 = cekIsian("y1", "-3");
    const benar2 = cekIsian("y2", "1");
    const benar3 = cekIsian("y3", "5");
    const benar4 = cekIsian("y4", "9");

    const y1 = document.getElementById("y1")?.value.trim() ?? "";
    const y2 = document.getElementById("y2")?.value.trim() ?? "";
    const y3 = document.getElementById("y3")?.value.trim() ?? "";
    const y4 = document.getElementById("y4")?.value.trim() ?? "";

    const pair1 = document.getElementById("pair1");
    const pair2 = document.getElementById("pair2");
    const pair3 = document.getElementById("pair3");
    const pair4 = document.getElementById("pair4");

    if (pair1) pair1.innerHTML = `$(-4, ${y1})$`;
    if (pair2) pair2.innerHTML = `$(-2, ${y2})$`;
    if (pair3) pair3.innerHTML = `$(0, ${y3})$`;
    if (pair4) pair4.innerHTML = `$(2, ${y4})$`;

    renderMathSafe(document.getElementById("latihanStep2"));

    const ok = benar1 && benar2 && benar3 && benar4;

    if (ok) {
        window.tablePairs = [
            { label: "A", x: -4, y: Number(y1) },
            { label: "B", x: -2, y: Number(y2) },
            { label: "C", x: 0, y: Number(y3) },
            { label: "D", x: 2, y: Number(y4) },
        ];

        if (window.loadTargetsFromTable) {
            window.loadTargetsFromTable(window.tablePairs);
        }

        if (feedbackTabel) {
            feedbackTabel.innerHTML =
                `<span style="color:#15803d;">Tabel benar! Sekarang seret titik A–D pada grafik.</span>`;
        }

        if (grafikSection) {
            grafikSection.style.display = "block";
            scrollKeStep("grafikSection");
        }

        if (boxKesimpulan) {
            boxKesimpulan.style.display = "none";
        }

        if (window.resetPointsToStart) {
            window.resetPointsToStart();
        }
    } else {
        if (feedbackTabel) {
            feedbackTabel.innerHTML =
                `<span style="color:#b91c1c;">Masih ada yang salah. Coba cek lagi pakai y = 2x + 5.</span>`;
        }

        if (grafikSection) grafikSection.style.display = "none";
        if (boxKesimpulan) boxKesimpulan.style.display = "none";
    }
}

function resetLatihan2A21() {
    ["y1", "y2", "y3", "y4"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    const pair1 = document.getElementById("pair1");
    const pair2 = document.getElementById("pair2");
    const pair3 = document.getElementById("pair3");
    const pair4 = document.getElementById("pair4");

    if (pair1) pair1.innerHTML = "$(-4, \\dots)$";
    if (pair2) pair2.innerHTML = "$(-2, \\dots)$";
    if (pair3) pair3.innerHTML = "$(0, \\dots)$";
    if (pair4) pair4.innerHTML = "$(2, \\dots)$";

    const feedbackTabel = document.getElementById("feedbackTabel");
    const feedbackGrafik = document.getElementById("feedbackGrafik");
    const grafikSection = document.getElementById("grafikSection");
    const boxKesimpulan = document.getElementById("kesimpulanLat2");

    if (feedbackTabel) feedbackTabel.innerHTML = "";
    if (feedbackGrafik) feedbackGrafik.innerHTML = "";
    if (grafikSection) grafikSection.style.display = "none";
    if (boxKesimpulan) boxKesimpulan.style.display = "none";

    renderMathSafe(document.getElementById("latihanStep2"));

    if (window.resetPointsToStart) {
        window.resetPointsToStart();
    }
}

async function checkAnswersA21() {
    if (typeof window.checkAnswers === "function") {
        window.checkAnswers();
    }

    const boxKesimpulan = document.getElementById("kesimpulanLat2");
    const feedbackGrafik = document.getElementById("feedbackGrafik");

    /*
        Catatan:
        Kalau fungsi checkAnswers grafik kamu sudah punya logika benar/salah sendiri,
        bagian ini bisa kamu sesuaikan dengan variabel status dari grafik.
    */

    const saved = await saveProgressMateri();

    if (saved) {
        if (boxKesimpulan) boxKesimpulan.style.display = "block";
        bukaNextButton();
    } else if (feedbackGrafik) {
        feedbackGrafik.innerHTML =
            `<span style="color:#b45309;">Grafik sudah dicek, tapi progres belum tersimpan.</span>`;
    }
}

function resetGrafikA21() {
    const feedbackGrafik = document.getElementById("feedbackGrafik");
    const boxKesimpulan = document.getElementById("kesimpulanLat2");

    if (feedbackGrafik) feedbackGrafik.innerHTML = "";
    if (boxKesimpulan) boxKesimpulan.style.display = "none";

    if (window.resetPointsToStart) {
        window.resetPointsToStart();
    }
}
