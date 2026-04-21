function normJawaban(teks) {
    return String(teks ?? "")
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .trim();
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

// =========================
// SLIDER LATIHAN
// =========================
let currentLatihan = 0;

document.addEventListener("DOMContentLoaded", function () {
    updateLatihanSlide();
});

function updateLatihanSlide() {
    const track = document.getElementById("latihanTrack");
    if (!track) return;
    track.style.transform = `translateX(-${currentLatihan * 100}%)`;
}

function nextLatihan(index) {
    currentLatihan = index;
    updateLatihanSlide();
}

function prevLatihan(index) {
    currentLatihan = index;
    updateLatihanSlide();
}

// =========================
// LATIHAN 1
// =========================
function cekLatihan1() {
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

    if (hasil.every(Boolean)) {
        feedback.innerHTML = `<span style="color:#15803d;">Bagus! Semua jawaban benar.</span>`;
        if (boxKesimpulan) boxKesimpulan.style.display = "block";
        if (nextBtn) nextBtn.disabled = false;
    } else {
        feedback.innerHTML = `<span style="color:#b91c1c;">Masih ada yang salah.</span>`;
        if (boxKesimpulan) boxKesimpulan.style.display = "none";
        if (nextBtn) nextBtn.disabled = true;
    }
}

function resetLatihan1() {
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
}

// =========================
// LATIHAN 2
// =========================
function cekTabel() {
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

    if (window.renderMathInElement) {
        const target =
            document.getElementById("latihan-garis-2") ||
            document.getElementById("grafikSection") ||
            document.body;

        renderMathInElement(target, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }

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

        if (grafikSection) {
            grafikSection.style.display = "none";
        }

        if (boxKesimpulan) {
            boxKesimpulan.style.display = "none";
        }
    }
}

function resetLatihan() {
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

    if (window.renderMathInElement) {
        const target =
            document.getElementById("latihan-garis-2") ||
            document.body;

        renderMathInElement(target, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }

    if (window.resetPointsToStart) {
        window.resetPointsToStart();
    }
}
