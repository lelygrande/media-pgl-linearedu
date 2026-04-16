// Eksplorasi
function normJawaban(teks) {
    return (teks || "")
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[()]/g, "");
}

function cekIsianLokal(id, jawabanBenar) {
    const el = document.getElementById(id);
    if (!el) return false;

    const nilai = normJawaban(el.value);
    const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
    const cocok = daftar.map(normJawaban).includes(nilai);

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(cocok ? "is-valid" : "is-invalid");

    return cocok;
}

function isiPesanLokal(id, pesan, tipe = "info") {
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

function kosongkanLokal(id) {
    const el = document.getElementById(id);
    if (el) el.innerHTML = "";
}

function cekTabelEksplorasi() {
    const benarXAB = cekIsianLokal("xAB", ["1"]);
    const benarXBC = cekIsianLokal("xBC", ["2"]);
    const benarYAB = cekIsianLokal("yAB", ["-1"]);
    const benarYBC = cekIsianLokal("yBC", ["-2"]);
    const benarMAB = cekIsianLokal("mAB", ["-1", "-1/1"]);
    const benarMBC = cekIsianLokal("mBC", ["-1", "-2/2"]);

    let pesan = [];

    if (!benarXAB || !benarXBC) {
        pesan.push("Komponen x masih ada yang belum tepat.");
    }

    if (!benarYAB || !benarYBC) {
        pesan.push("Komponen y masih ada yang belum tepat.");
    }

    if (!benarMAB || !benarMBC) {
        pesan.push(
            "Nilai perbandingan Δy terhadap Δx masih ada yang belum tepat.",
        );
    }

    if (benarXAB && benarXBC && benarYAB && benarYBC && benarMAB && benarMBC) {
        isiPesanLokal(
            "feedbackTabelEksplorasi",
            "Bagus, seluruh isian pada tabel sudah benar.",
            "success",
        );
        return;
    }

    isiPesanLokal("feedbackTabelEksplorasi", pesan.join("<br>"), "warning");
}

function cekPertanyaanEksplorasi() {
    const q1 = document.getElementById("q1");
    const benarQ2 = cekIsianLokal("q2", ["m"]);
    const kesimpulan = document.getElementById("kesimpulanEksplorasiPersamaan");

    let benarQ1 = false;

    if (q1) {
        q1.classList.remove("is-valid", "is-invalid");
        benarQ1 = q1.value === "sama";
        q1.classList.add(benarQ1 ? "is-valid" : "is-invalid");
    }

    if (benarQ1 && benarQ2) {
        isiPesanLokal(
            "feedbackPertanyaanEksplorasi",
            "Bagus, jawaban pertanyaan kesimpulanmu sudah benar.",
            "success",
        );
        if (kesimpulan) kesimpulan.classList.remove("d-none");
        return;
    }

    isiPesanLokal(
        "feedbackPertanyaanEksplorasi",
        "Masih ada jawaban pertanyaan yang belum tepat. Bandingkan nilai gradien pada ruas AB dan BC, lalu perhatikan bentuk umum persamaan y = mx + c.",
        "warning",
    );

    if (kesimpulan) kesimpulan.classList.add("d-none");
}

function resetEksplorasiPersamaan() {
    ["xAB", "xBC", "yAB", "yBC", "mAB", "mBC", "q2"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });

    const q1 = document.getElementById("q1");
    if (q1) {
        q1.value = "";
        q1.classList.remove("is-valid", "is-invalid");
    }

    kosongkanLokal("feedbackTabelEksplorasi");
    kosongkanLokal("feedbackPertanyaanEksplorasi");

    const kesimpulan = document.getElementById("kesimpulanEksplorasiPersamaan");
    if (kesimpulan) kesimpulan.classList.add("d-none");
}

//
function alertSuccess(text) {
    return `<div class="alert alert-success mb-0" style="border-radius:14px;">${text}</div>`;
}

function alertDanger(text) {
    return `<div class="alert alert-danger mb-0" style="border-radius:14px;">${text}</div>`;
}

function cekEksplorasiTabel() {
    let xAB = document.getElementById("xAB").value.trim().replace(/\s+/g, "");
    let xBC = document.getElementById("xBC").value.trim().replace(/\s+/g, "");
    let yAB = document.getElementById("yAB").value.trim().replace(/\s+/g, "");
    let yBC = document.getElementById("yBC").value.trim().replace(/\s+/g, "");
    let mAB = document.getElementById("mAB").value.trim().replace(/\s+/g, "");
    let mBC = document.getElementById("mBC").value.trim().replace(/\s+/g, "");
    let q1 = document.getElementById("q1").value;
    let q2 = document.getElementById("q2").value.trim().toLowerCase();

    let benar = 0;
    let pesan = [];

    if (xAB === "1") {
        benar++;
    } else {
        pesan.push("Komponen x pada ruas AB belum tepat.");
    }

    if (yAB === "-1") {
        benar++;
    } else {
        pesan.push("Komponen y pada ruas AB belum tepat.");
    }

    if (mAB === "-1" || mAB === "-1/1") {
        benar++;
    } else {
        pesan.push("Nilai Δy/Δx pada ruas AB belum tepat.");
    }

    if (xBC === "2") {
        benar++;
    } else {
        pesan.push("Komponen x pada ruas BC belum tepat.");
    }

    if (yBC === "-2") {
        benar++;
    } else {
        pesan.push("Komponen y pada ruas BC belum tepat.");
    }

    if (mBC === "-1" || mBC === "-2/2") {
        benar++;
    } else {
        pesan.push("Nilai Δy/Δx pada ruas BC belum tepat.");
    }

    if (q1 === "sama") {
        benar++;
    } else {
        pesan.push("Jawaban pada pertanyaan nomor 1 belum tepat.");
    }

    if (q2 === "m") {
        benar++;
    } else {
        pesan.push("Jawaban pada pertanyaan nomor 2 belum tepat.");
    }

    if (benar === 8) {
        document.getElementById("fbTabel").innerHTML = alertSuccess(
            "Benar. Berdasarkan tabel, perbandingan komponen y terhadap komponen x mempunyai nilai gradien yang sama pada setiap ruas garis. Jadi, gradien garis dengan persamaan y = mx + c adalah m.",
        );
    } else {
        document.getElementById("fbTabel").innerHTML = alertDanger(
            "Masih ada jawaban yang belum tepat.<br>" + pesan.join("<br>"),
        );
    }
}

function resetEksplorasiTabel() {
    ["xAB", "xBC", "yAB", "yBC", "mAB", "mBC", "q2"].forEach((id) => {
        document.getElementById(id).value = "";
    });

    document.getElementById("q1").value = "";
    document.getElementById("fbTabel").innerHTML = "";
}

//

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

// Eksplorasi Ax + By + C = 0
function bersihHuruf(teks) {
    return (teks || "")
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[(){}[\]]/g, "");
}

function cekEksplorasiGradienUmum() {
    const eks1 = bersihHuruf(document.getElementById("eks1").value);
    const eks2 = bersihHuruf(document.getElementById("eks2").value);

    const eks3atas1 = bersihHuruf(document.getElementById("eks3atas1").value);
    const eks3bawah1 = bersihHuruf(document.getElementById("eks3bawah1").value);
    const eks3atas2 = bersihHuruf(document.getElementById("eks3atas2").value);
    const eks3bawah2 = bersihHuruf(document.getElementById("eks3bawah2").value);

    const eks4atas = bersihHuruf(document.getElementById("eks4atas").value);
    const eks4bawah = bersihHuruf(document.getElementById("eks4bawah").value);

    const feedback = document.getElementById("fbEksplorasiGradienUmum");
    const kesimpulan = document.getElementById(
        "kesimpulanEksplorasiGradienUmum",
    );

    const benar1 = eks1 === "-ax";
    const benar2 = eks2 === "-ax-c" || eks2 === "-c-ax";

    const benar3 =
        eks3atas1 === "a" &&
        eks3bawah1 === "b" &&
        eks3atas2 === "c" &&
        eks3bawah2 === "b";

    const benar4 = eks4atas === "a" && eks4bawah === "b";

    if (benar1 && benar2 && benar3 && benar4) {
        feedback.innerHTML = "";
        kesimpulan.classList.remove("d-none");
    } else {
        let pesan = `<div class="alert alert-warning"><b>Masih ada yang perlu diperbaiki.</b><ul class="mb-0 mt-2">`;

        if (!benar1) {
            pesan += `<li>Langkah 1: perhatikan suku mana yang dipindahkan ke ruas kanan. Tanda suku itu berubah.</li>`;
        }

        if (!benar2) {
            pesan += `<li>Langkah 2: setelah konstanta dipindahkan, ruas kanan memuat dua suku. Coba cek kembali tanda masing-masing suku.</li>`;
        }

        if (!benar3) {
            pesan += `<li>Langkah 3: bagi setiap suku di ruas kanan dengan \(B\). Koefisien \(x\) berasal dari suku yang memuat \(A\), sedangkan konstanta berasal dari suku yang memuat \(C\).</li>`;
        }

        if (!benar4) {
            pesan += `<li>Langkah 4: gradien adalah koefisien yang menempel pada \(x\) di bentuk \(y = mx + c\). Perhatikan pembilang dan penyebutnya.</li>`;
        }

        pesan += `</ul></div>`;
        feedback.innerHTML = pesan;
        kesimpulan.classList.add("d-none");
    }

    if (window.renderMathInElement) {
        renderMathInElement(document.body, {
            delimiters: [
                { left: "\\(", right: "\\)", display: false },
                { left: "\\[", right: "\\]", display: true },
            ],
        });
    }
}

function resetEksplorasiGradienUmum() {
    document.getElementById("eks1").value = "";
    document.getElementById("eks2").value = "";

    document.getElementById("eks3atas1").value = "";
    document.getElementById("eks3bawah1").value = "";
    document.getElementById("eks3atas2").value = "";
    document.getElementById("eks3bawah2").value = "";

    document.getElementById("eks4atas").value = "";
    document.getElementById("eks4bawah").value = "";

    document.getElementById("fbEksplorasiGradienUmum").innerHTML = "";
    document
        .getElementById("kesimpulanEksplorasiGradienUmum")
        .classList.add("d-none");
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

// Latihan Soal

let currentLatihanGradien = 0;

function goToLatihanGradien(index) {
    const track = document.getElementById("latihanTrackGradien");
    const slider = document.getElementById("latihanSliderGradien");
    const slides = document.querySelectorAll(
        "#latihanTrackGradien .latihan-slide",
    );

    if (!track || !slider || !slides.length) return;

    currentLatihanGradien = index;
    track.style.transform = `translateX(-${index * 100}%)`;

    setTimeout(() => {
        slider.style.height = slides[index].offsetHeight + "px";
    }, 50);
}

function updateTinggiLatihanGradien() {
    const slider = document.getElementById("latihanSliderGradien");
    const slides = document.querySelectorAll(
        "#latihanTrackGradien .latihan-slide",
    );

    if (!slider || !slides.length) return;
    slider.style.height = slides[currentLatihanGradien].offsetHeight + "px";
}

document.addEventListener("DOMContentLoaded", function () {
    goToLatihanGradien(0);
    window.addEventListener("resize", updateTinggiLatihanGradien);
});

function normGradien(teks) {
    return (teks || "")
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[(){}[\]]/g, "");
}

function renderKatexUlang(el) {
    if (window.renderMathInElement && el) {
        renderMathInElement(el, {
            delimiters: [
                { left: "\\(", right: "\\)", display: false },
                { left: "\\[", right: "\\]", display: true },
            ],
        });
    }
}

function cekLatihan1Gradien() {
    const a = normGradien(document.getElementById("lat1a").value);
    const b = normGradien(document.getElementById("lat1b").value);
    const fb = document.getElementById("feedbackLatihan1Gradien");

    const benarA = a === "-5" || a === "-5/1";
    const benarB = b === "5/2";

    if (benarA && benarB) {
        fb.innerHTML = `<div class="alert alert-success">Bagus. Jawabanmu benar.</div>`;
        renderKatexUlang(fb);

        setTimeout(() => {
            goToLatihanGradien(1);
        }, 800);
    } else {
        let pesan = `<div class="alert alert-warning"><b>Masih ada yang perlu diperbaiki.</b><ul class="mb-0 mt-2">`;
        if (!benarA)
            pesan += `<li>Soal a: gradien pada bentuk \\(y=mx+c\\) adalah koefisien di depan \\(x\\).</li>`;
        if (!benarB)
            pesan += `<li>Soal b: ubah dulu ke bentuk \\(y=mx+c\\), lalu sederhanakan koefisien \\(x\\).</li>`;
        pesan += `</ul></div>`;
        fb.innerHTML = pesan;
        renderKatexUlang(fb);
        updateTinggiLatihanGradien();
    }
}

function cekLatihan2Gradien() {
    const a = normGradien(document.getElementById("lat2a").value);
    const b = normGradien(document.getElementById("lat2b").value);
    const fb = document.getElementById("feedbackLatihan2Gradien");

    const benarA = a === "-2" || a === "-2/1";
    const benarB = b === "3/2";

    if (benarA && benarB) {
        fb.innerHTML = `<div class="alert alert-success">Bagus. Jawabanmu benar.</div>`;
        renderKatexUlang(fb);

        setTimeout(() => {
            goToLatihanGradien(2);
        }, 800);
    } else {
        let pesan = `<div class="alert alert-warning"><b>Masih ada yang perlu diperbaiki.</b><ul class="mb-0 mt-2">`;
        if (!benarA)
            pesan += `<li>Soal a: gunakan hubungan gradien pada bentuk umum atau ubah dulu ke bentuk \\(y=mx+c\\).</li>`;
        if (!benarB)
            pesan += `<li>Soal b: perhatikan tanda koefisien \\(y\\), lalu sederhanakan hasil pecahannya.</li>`;
        pesan += `</ul></div>`;
        fb.innerHTML = pesan;
        renderKatexUlang(fb);
        updateTinggiLatihanGradien();
    }
}

function cekLatihan3Gradien() {
    const a = normGradien(document.getElementById("lat3a").value);
    const b = normGradien(document.getElementById("lat3b").value);
    const c = normGradien(document.getElementById("lat3c").value);
    const fb = document.getElementById("feedbackLatihan3Gradien");

    const benarA = a === "3" || a === "3/1";
    const benarB = b === "-2" || b === "-2/1";
    const benarC = c === "jalana" || c === "jalan a" || c === "a";

    if (benarA && benarB && benarC) {
        fb.innerHTML = `<div class="alert alert-success">Bagus. Kamu sudah menyelesaikan semua latihan.</div>`;
    } else {
        let pesan = `<div class="alert alert-warning"><b>Masih ada yang perlu diperbaiki.</b><ul class="mb-0 mt-2">`;
        if (!benarA)
            pesan += `<li>Jalan A: ubah dulu persamaan sehingga \\(y\\) berada sendiri di ruas kiri.</li>`;
        if (!benarB)
            pesan += `<li>Jalan B: tentukan gradien dari bentuk umum dengan memperhatikan koefisien \\(x\\) dan \\(y\\).</li>`;
        if (!benarC)
            pesan += `<li>Bandingkan nilai mutlak gradien kedua jalan untuk menentukan jalan yang lebih curam.</li>`;
        pesan += `</ul></div>`;
        fb.innerHTML = pesan;
    }

    renderKatexUlang(fb);
    updateTinggiLatihanGradien();
}
