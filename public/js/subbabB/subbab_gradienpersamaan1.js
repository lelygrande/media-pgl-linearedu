document.addEventListener("DOMContentLoaded", function () {
    initKlikKoefisien();
    initUrutanLangkah();
    initMatching();
});

function alertSuccess(text) {
    return `<div class="alert alert-success mb-0" style="border-radius:14px;">${text}</div>`;
}

function alertDanger(text) {
    return `<div class="alert alert-danger mb-0" style="border-radius:14px;">${text}</div>`;
}

function alertInfo(text) {
    return `<div class="alert alert-info mb-0" style="border-radius:14px;">${text}</div>`;
}

function resetExprState(items) {
    items.forEach((item) =>
        item.classList.remove("expr-correct", "expr-wrong"),
    );
}

// Contoh Persamaan Ax + By + C = 0
function cekGradien() {
    let atas = document.getElementById("gradAtas").value.trim();
    let bawah = document.getElementById("gradBawah").value.trim();

    if (atas == "1" && bawah == "2") {
        document.getElementById("fbGradien").innerHTML =
            "Benar! Gradiennya adalah 1/2.";

        document.getElementById("pembahasanGradien").classList.remove("d-none");
    } else {
        document.getElementById("fbGradien").innerHTML =
            "Coba lagi. Ingat rumus m = -A/B dan sederhanakan pecahannya<br>Perhatikan tanda negatif pada rumus gradien";
    }
}

/* =========================
   CONTOH 1: KLIK KOEFISIEN
========================= */
function initKlikKoefisien() {
    const coef = document.getElementById("coefA");
    const konst = document.getElementById("constA");
    const fb = document.getElementById("fbKlikKoef");

    if (!coef || !konst) return;

    coef.addEventListener("click", function () {
        resetExprState([coef, konst]);
        coef.classList.add("expr-correct");
        fb.innerHTML = alertSuccess(
            "Benar. Angka 4 adalah koefisien di depan x, sehingga gradien persamaan tersebut adalah 4.",
        );
    });

    konst.addEventListener("click", function () {
        resetExprState([coef, konst]);
        konst.classList.add("expr-wrong");
        fb.innerHTML = alertDanger(
            "Belum tepat. Angka 2 adalah konstanta, bukan gradien.",
        );
    });
}

/* =========================
   CONTOH 2: SUSUN LANGKAH
========================= */
function initUrutanLangkah() {
    const items = document.querySelectorAll(".sort-item");
    const slots = document.querySelectorAll(".sort-slot");

    items.forEach((item) => {
        item.addEventListener("dragstart", function (e) {
            e.dataTransfer.setData(
                "text/plain",
                this.dataset.step + "|" + this.innerHTML,
            );
        });
    });

    slots.forEach((slot) => {
        slot.addEventListener("dragover", function (e) {
            e.preventDefault();
            this.classList.add("hovered");
        });

        slot.addEventListener("dragleave", function () {
            this.classList.remove("hovered");
        });

        slot.addEventListener("drop", function (e) {
            e.preventDefault();
            this.classList.remove("hovered");
            const raw = e.dataTransfer.getData("text/plain");
            const [step, html] = raw.split("|");
            this.dataset.filled = step;
            this.innerHTML = html;
        });
    });
}

function cekUrutanLangkah() {
    const slots = document.querySelectorAll(".sort-slot");
    const fb = document.getElementById("fbUrutanLangkah");
    let benar = 0;

    slots.forEach((slot) => {
        slot.classList.remove("correct", "wrong");
        if (slot.dataset.filled === slot.dataset.answer) {
            slot.classList.add("correct");
            benar++;
        } else {
            slot.classList.add("wrong");
        }
    });

    if (benar === 4) {
        fb.innerHTML = alertSuccess(
            "Urutanmu sudah benar. Dari persamaan 4y = 2x - 8 diperoleh y = 1/2 x - 2, sehingga gradiennya adalah 1/2.",
        );
    } else {
        fb.innerHTML = alertInfo(
            "Masih ada urutan yang belum tepat. Ingat, persamaan harus diubah dulu ke bentuk y = mx + c sebelum gradien ditentukan.",
        );
    }
}

function resetUrutanLangkah() {
    const slots = document.querySelectorAll(".sort-slot");
    const fb = document.getElementById("fbUrutanLangkah");
    const defaults = [
        "Letakkan langkah pertama di sini",
        "Letakkan langkah berikutnya di sini",
        "Letakkan langkah berikutnya di sini",
        "Letakkan kesimpulan di sini",
    ];

    slots.forEach((slot, i) => {
        slot.classList.remove("correct", "wrong", "hovered");
        delete slot.dataset.filled;
        slot.innerHTML = defaults[i];
    });

    fb.innerHTML = "";
}

/* =========================
   LATIHAN 1
========================= */
function initMatching() {
    const items = document.querySelectorAll(".match-item");
    const targets = document.querySelectorAll(".match-target");

    items.forEach((item) => {
        item.addEventListener("dragstart", function (e) {
            e.dataTransfer.setData("text/plain", this.dataset.label);
        });
    });

    targets.forEach((zone) => {
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
            const value = e.dataTransfer.getData("text/plain");
            this.dataset.filled = value;
            this.textContent = value;
        });
    });
}

function cekMatchingOnly() {
    const targets = document.querySelectorAll(".match-target");
    let benar = 0;

    targets.forEach((zone) => {
        zone.classList.remove("correct", "wrong");
        if (zone.dataset.filled === zone.dataset.answer) {
            zone.classList.add("correct");
            benar++;
        } else {
            zone.classList.add("wrong");
        }
    });

    return benar;
}

/* =========================
   LATIHAN 2
========================= */
function cekAnalisisOnly() {
    const checked = document.querySelector(
        'input[name="pilihAnalisis"]:checked',
    );
    const grad = document
        .getElementById("analisisGradien")
        .value.trim()
        .replace(/\s+/g, "");
    let benar = 0;
    let pesan = [];

    if (checked && checked.value === "b") {
        benar++;
        pesan.push("Pilihan persamaanmu sudah tepat.");
    } else {
        pesan.push(
            "Pilihan persamaan yang memiliki gradien paling besar belum tepat.",
        );
    }

    if (grad === "5") {
        benar++;
        pesan.push("Nilai gradien yang kamu tulis juga sudah benar.");
    } else {
        pesan.push("Nilai gradien yang kamu tulis belum tepat.");
    }

    return { benar, pesan };
}

/* =========================
   LATIHAN 3
========================= */
function cekLatsol3() {
    const checked = document.querySelector(
        'input[name="pilihLatsol3"]:checked',
    );
    const bentuk1 = document
        .getElementById("latsol3_bentuk1")
        .value.toLowerCase()
        .replace(/\s+/g, "");
    const bentuk2 = document
        .getElementById("latsol3_bentuk2")
        .value.toLowerCase()
        .replace(/\s+/g, "");
    const grad1 = document.getElementById("latsol3_grad1").value.trim();
    const grad2 = document.getElementById("latsol3_grad2").value.trim();

    let benar = 0;
    let pesan = [];

    if (bentuk1 === "y=2x+1") {
        benar++;
        pesan.push("Bentuk persamaan pertama sudah benar.");
    } else {
        pesan.push("Bentuk persamaan pertama belum tepat.");
    }

    if (bentuk2 === "y=4x+1") {
        benar++;
        pesan.push("Bentuk persamaan kedua sudah benar.");
    } else {
        pesan.push("Bentuk persamaan kedua belum tepat.");
    }

    if (grad1 === "2") {
        benar++;
        pesan.push("Gradien pertama sudah benar.");
    } else {
        pesan.push("Gradien pertama belum tepat.");
    }

    if (grad2 === "4") {
        benar++;
        pesan.push("Gradien kedua sudah benar.");
    } else {
        pesan.push("Gradien kedua belum tepat.");
    }

    if (checked && checked.value === "b") {
        benar++;
        pesan.push("Pilihan jalan yang lebih curam sudah tepat.");
    } else {
        pesan.push("Pilihan jalan yang lebih curam belum tepat.");
    }

    return { benar, pesan };
}

/* =========================
   LATIHAN 4
========================= */
function cekLatihan4() {
    const atas = document.getElementById("lat4_atas").value;
    const bawah = document.getElementById("lat4_bawah").value;

    let benar = 0;
    let pesan = [];

    if (atas == "-5" && bawah == "2") {
        benar++;
        pesan.push("Gradien sudah benar.");
    } else {
        pesan.push("Gradien belum tepat. Gunakan rumus m = -A/B.");
    }

    return { benar, pesan };
}

/* =========================
   CEK SEMUA LATIHAN
========================= */
function cekSemuaLatihan() {
    const fbAkhir = document.getElementById("fbHasilAkhir");

    const daftarFeedback = [];
    let semuaBenar = true;

    // LATIHAN 1
    const benarMatch = cekMatchingOnly();
    if (benarMatch !== 3) {
        semuaBenar = false;
        daftarFeedback.push(
            "<b>Nomor 1:</b> Masih ada pasangan gradien yang belum tepat. Ingat, persamaan <b>3y = 6x - 9</b> harus diubah dulu ke bentuk y=mx+c.",
        );
    }

    // LATIHAN 2
    const analisis = cekAnalisisOnly();
    if (analisis.benar !== 2) {
        semuaBenar = false;
        daftarFeedback.push(
            "<b>Nomor 2:</b><br>" + analisis.pesan.join("<br>"),
        );
    }

    // LATIHAN 3
    const latsol3 = cekLatsol3();
    if (latsol3.benar !== 5) {
        semuaBenar = false;
        daftarFeedback.push("<b>Nomor 3:</b><br>" + latsol3.pesan.join("<br>"));
    }

    // LATIHAN 4
    const lat4 = cekLatihan4();
    if (lat4.benar !== 1) {
        semuaBenar = false;
        daftarFeedback.push("<b>Nomor 4:</b><br>" + lat4.pesan.join("<br>"));
    }

    if (semuaBenar) {
        fbAkhir.innerHTML = `
            <div class="alert alert-success">
                Bagus! Semua jawaban kamu sudah benar. Kamu sudah memahami cara menentukan gradien dari persamaan garis lurus dengan baik.
            </div>
        `;
    } else {
        fbAkhir.innerHTML = `
            <div class="alert alert-danger">
                <b>Masih ada jawaban yang belum tepat:</b><br><br>
                ${daftarFeedback.join("<br><br>")}
                <br><br>
                Coba perhatikan kembali bahwa semakin besar gradien, semakin curam garisnya.
            </div>
        `;
    }

    fbAkhir.scrollIntoView({ behavior: "smooth" });
}

function resetSemuaLatihan() {
    const targets = document.querySelectorAll(".match-target");
    targets.forEach((zone) => {
        zone.classList.remove("correct", "wrong", "hovered");
        delete zone.dataset.filled;
        zone.textContent = "Letakkan gradien di sini";
    });

    const pilihAnalisis = document.querySelector(
        'input[name="pilihAnalisis"]:checked',
    );
    if (pilihAnalisis) pilihAnalisis.checked = false;

    const pilihLatsol3 = document.querySelector(
        'input[name="pilihLatsol3"]:checked',
    );
    if (pilihLatsol3) pilihLatsol3.checked = false;

    document.getElementById("analisisGradien").value = "";
    document.getElementById("latsol3_bentuk1").value = "";
    document.getElementById("latsol3_bentuk2").value = "";
    document.getElementById("latsol3_grad1").value = "";
    document.getElementById("latsol3_grad2").value = "";
    document.getElementById("lat4_atas").value = "";
    document.getElementById("lat4_bawah").value = "";
    document.getElementById("fbHasilAkhir").innerHTML = "";
}
