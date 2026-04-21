// Materi awal
// =========================
// GeoGebra Eksplorasi Sumbu-X
// =========================
let appletEksSumbuX = null;
let sudahLoadSumbuX = false;

function ggbOnLoadEksSumbuX(api) {
    api.setPerspective("G");

    api.setAxesVisible(true, true);
    api.setGridVisible(true);

    api.setGraphicsOptions(1, {
        gridDistance: [1, 1],
        minorGrid: false,
    });

    api.setGraphicsOptions(1, {
        gridType: 0,
    });

    api.setCoordSystem(-6, 8, -4, 7);
    api.setAxisSteps(1, 1, 1, 1);

    // Titik-titik
    api.evalCommand("A=(-2,2)");
    api.evalCommand("B=(4,2)");
    api.evalCommand("C=(1,5)");
    api.evalCommand("D=(6,5)");
    api.evalCommand("E=(-3,-1)");
    api.evalCommand("F=(2,-1)");

    // Ruas garis
    api.evalCommand("a=Segment(A,B)");
    api.evalCommand("b=Segment(C,D)");
    api.evalCommand("c=Segment(E,F)");

    // Titik
    ["A", "B", "C", "D", "E", "F"].forEach(function (obj) {
        api.setLabelVisible(obj, true);
        api.setFixed(obj, true, false);
        api.setPointSize(obj, 5);
        api.setColor(obj, 30, 110, 200);
    });

    // Ruas garis a, b, c
    api.setLineThickness("a", 5);
    api.setLineThickness("b", 5);
    api.setLineThickness("c", 5);

    api.setColor("a", 46, 117, 182); // biru
    api.setColor("b", 34, 185, 105); // hijau
    api.setColor("c", 220, 53, 69); // merah

    api.evalCommand('ta=Text("a", (1.2, 2.3))');
    api.evalCommand('tb=Text("b", (3.5, 5.3))');
    api.evalCommand('tc=Text("c", (0.4,-1.5))');

    api.setFixed("ta", true, false);
    api.setFixed("tb", true, false);
    api.setFixed("tc", true, false);

    api.setColor("ta", 46, 117, 182);
    api.setColor("tb", 34, 185, 105);
    api.setColor("tc", 220, 53, 69);

    // Sembunyikan label ruas kalau mau bersih
    api.setLabelVisible("a", false);
    api.setLabelVisible("b", false);
    api.setLabelVisible("c", false);

    api.setAxesVisible(true, true);
    api.setGridVisible(true);
    api.setCoordSystem(-6, 8, -4, 7);
}

function tampilkanGrafikSumbuX() {
    if (sudahLoadSumbuX) return;

    const paramsEksSumbuX = {
        appName: "classic",
        id: "ggbAppletEksSumbuX",
        width: 700,
        height: 420,
        showToolBar: false,
        showAlgebraInput: false,
        showMenuBar: false,
        enableRightClick: false,
        showResetIcon: true,
        appletOnLoad: ggbOnLoadEksSumbuX,
    };

    appletEksSumbuX = new GGBApplet(paramsEksSumbuX, true);
    appletEksSumbuX.inject("ggb-sumbu-x");

    sudahLoadSumbuX = true;
}

window.addEventListener("load", function () {
    tampilkanGrafikSumbuX();
});

// =========================
// GeoGebra Eksplorasi Sumbu-Y
// =========================
let appletEksSumbuY = null;
let sudahLoadSumbuY = false;

function ggbOnLoadEksSumbuY(api) {
    api.setPerspective("G");

    api.setAxesVisible(true, true);
    api.setGridVisible(true);

    api.setGraphicsOptions(1, {
        gridDistance: [1, 1],
        minorGrid: false,
    });

    api.setGraphicsOptions(1, {
        gridType: 0,
    });

    api.setCoordSystem(-5, 7, -5, 7);
    api.setAxisSteps(1, 1, 1, 1);

    // Titik-titik
    api.evalCommand("P=(2,3)");
    api.evalCommand("Q=(2,-4)");
    api.evalCommand("R=(-1,5)");
    api.evalCommand("S=(-1,-2)");
    api.evalCommand("T=(4,1)");
    api.evalCommand("U=(4,6)");

    // Ruas garis
    api.evalCommand("p=Segment(P,Q)");
    api.evalCommand("q=Segment(R,S)");
    api.evalCommand("r=Segment(T,U)");

    // Sembunyikan label default ruas
    api.setLabelVisible("p", false);
    api.setLabelVisible("q", false);
    api.setLabelVisible("r", false);

    // Label manual
    api.evalCommand('tp=Text("p",(2.2, 0.5))');
    api.evalCommand('tq=Text("q",(-1.3, 0.4))');
    api.evalCommand('tr=Text("r",(4.2,4))');

    // Warna label manual
    api.setColor("tp", 46, 117, 182);
    api.setColor("tq", 34, 185, 105);
    api.setColor("tr", 220, 53, 69);

    // Supaya teks tidak bisa digeser
    ["tp", "tq", "tr"].forEach(function (obj) {
        api.setFixed(obj, true, false);
    });

    // Titik
    ["P", "Q", "R", "S", "T", "U"].forEach(function (pt) {
        api.setLabelVisible(pt, true);
        api.setFixed(pt, true, false);
        api.setPointSize(pt, 5);
        api.setColor(pt, 30, 110, 200);
    });

    // Ruas garis
    api.setLineThickness("p", 5);
    api.setLineThickness("q", 5);
    api.setLineThickness("r", 5);

    api.setColor("p", 46, 117, 182); // biru
    api.setColor("q", 34, 185, 105); // hijau
    api.setColor("r", 220, 53, 69); // merah

    api.setAxesVisible(true, true);
    api.setGridVisible(true);
    api.setCoordSystem(-5, 7, -5, 7);
}

function tampilkanGrafikSumbuY() {
    if (sudahLoadSumbuY) return;

    const paramsEksSumbuY = {
        appName: "classic",
        id: "ggbAppletEksSumbuY",
        width: 700,
        height: 420,
        showToolBar: false,
        showAlgebraInput: false,
        showMenuBar: false,
        enableRightClick: false,
        showResetIcon: true,
        appletOnLoad: ggbOnLoadEksSumbuY,
    };

    appletEksSumbuY = new GGBApplet(paramsEksSumbuY, true);
    appletEksSumbuY.inject("ggb-sumbu-y");

    sudahLoadSumbuY = true;
}

window.addEventListener("load", function () {
    tampilkanGrafikSumbuY();
});

function tampilkanFeedback(id, tipe, pesan) {
    let kelas = "feedback-box feedback-info";
    if (tipe === "benar") kelas = "feedback-box feedback-benar";
    if (tipe === "salah") kelas = "feedback-box feedback-salah";
    document.getElementById(id).innerHTML =
        `<div class="${kelas}">${pesan}</div>`;
}

function showEl(id) {
    document.getElementById(id).classList.remove("d-none");
}

function renderKatexById(id) {
    const el = document.getElementById(id);
    if (el && window.renderMathInElement) {
        renderMathInElement(el, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function tampilkanStep(id) {
    const el = document.getElementById(id);
    if (el) el.classList.remove("d-none");
}

function sembunyikanTombol(id) {
    const el = document.getElementById(id);
    if (el) el.classList.add("d-none");
}

function disableElement(id) {
    const el = document.getElementById(id);
    if (el) el.disabled = true;
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

/* =========================
   EKSPLORASI SUMBU-X
========================= */

function cekTabelX() {
    const mx1 = document.getElementById("mx1").value.trim();
    const mx2 = document.getElementById("mx2").value.trim();
    const mx3 = document.getElementById("mx3").value.trim();
    const fb = document.getElementById("feedback-x1");

    let pesan = [];

    if (mx1 !== "0") {
        pesan.push(
            "Gradien garis <b>a</b> belum tepat. Pada titik A(-2,2) dan B(4,2), nilai <b>y</b> sama sehingga <b>y₂ - y₁ = 0</b>.",
        );
    }

    if (mx2 !== "0") {
        pesan.push(
            "Gradien garis <b>b</b> belum tepat. Pada titik C(1,5) dan D(6,5), nilai <b>y</b> juga sama.",
        );
    }

    if (mx3 !== "0") {
        pesan.push(
            "Gradien garis <b>c</b> belum tepat. Pada titik E(-3,-1) dan F(2,-1), selisih nilai <b>y</b> adalah <b>0</b>.",
        );
    }

    if (pesan.length === 0) {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Bagus! Semua gradien sudah benar. Sekarang perhatikan hasilnya, lalu bandingkan ketiga gradien tersebut.
            </div>
        `;
        disableMany(["mx1", "mx2", "mx3"]);
        sembunyikanTombol("btn-tabel-x");
        tampilkanStep("step-x-2");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                <b>Masih ada jawaban yang belum tepat:</b><br><br>
                ${pesan.join("<br><br>")}
                <br><br>
                <b>Petunjuk:</b> Gunakan rumus <b>m = (y₂ - y₁)/(x₂ - x₁)</b>. Jika nilai <b>y</b> kedua titik sama, maka pembilangnya berapa?
            </div>
        `;
        renderKatexById("feedback-x1");
    }
}

function cekBandingX(jawaban, el) {
    const fb = document.getElementById("feedback-x2");
    const container = "#step-x-2";

    resetOpsiKotak(container);

    if (jawaban === "sama") {
        tandaiOpsi(el, "benar");
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Tepat. Ketiga garis memiliki gradien yang sama.
            </div>
        `;
        disableOpsiKotak(container);
        tampilkanStep("step-x-3");
    } else {
        tandaiOpsi(el, "salah");
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba lihat kembali hasil gradien pada tabel. Apakah ketiganya menunjukkan pola yang sama?
            </div>
        `;
    }
}

function cekBentukX(jawaban, el) {
    const fb = document.getElementById("feedback-x3");
    const container = "#step-x-3";

    resetOpsiKotak(container);

    if (jawaban === "mendatar") {
        tandaiOpsi(el, "benar");
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Benar. Karena nilai <b>y</b> tetap, garis yang terbentuk adalah garis mendatar.
            </div>
        `;
        disableOpsiKotak(container);
        tampilkanStep("step-x-4");
    } else {
        tandaiOpsi(el, "salah");
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba perhatikan lagi. Jika nilai <b>y</b> sama, garisnya tidak naik dan tidak turun.
            </div>
        `;
    }
}

function cekSimpulanX() {
    const fb = document.getElementById("feedback-x4");

    fb.innerHTML = `
        <div class="alert alert-success mt-2">
            Bagus! Sekarang perhatikan kesimpulan yang terbentuk dari hasil eksplorasimu.
        </div>
    `;

    tampilkanStep("kesimpulan-x");
    tampilkanStep("ggb-wrapper-x");
    renderKatexById("kesimpulan-x");
}

/* =========================
   EKSPLORASI SUMBU-Y
========================= */

function cekTabelY() {
    const py1Atas = document.getElementById("py1-atas").value.trim();
    const py1Bawah = document.getElementById("py1-bawah").value.trim();
    const py2Atas = document.getElementById("py2-atas").value.trim();
    const py2Bawah = document.getElementById("py2-bawah").value.trim();
    const py3Atas = document.getElementById("py3-atas").value.trim();
    const py3Bawah = document.getElementById("py3-bawah").value.trim();
    const fb = document.getElementById("feedback-y1");

    let pesan = [];

    if (!(py1Atas === "-7" && py1Bawah === "0")) {
        pesan.push(
            "Gradien garis <b>p</b> belum tepat. Dari titik P(2,3) dan Q(2,-4), diperoleh <b>y₂ - y₁ = -7</b> dan <b>x₂ - x₁ = 0</b>.",
        );
    }

    if (!(py2Atas === "-7" && py2Bawah === "0")) {
        pesan.push(
            "Gradien garis <b>q</b> belum tepat. Dari titik R(-1,5) dan S(-1,-2), diperoleh <b>y₂ - y₁ = -7</b> dan <b>x₂ - x₁ = 0</b>.",
        );
    }

    if (!(py3Atas === "5" && py3Bawah === "0")) {
        pesan.push(
            "Gradien garis <b>r</b> belum tepat. Dari titik T(4,1) dan U(4,6), diperoleh <b>y₂ - y₁ = 5</b> dan <b>x₂ - x₁ = 0</b>.",
        );
    }

    if (pesan.length === 0) {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Bagus! Bentuk gradien yang kamu isi sudah benar. Sekarang amati apa yang sama dari ketiga garis tersebut.
            </div>
        `;
        disableMany([
            "py1-atas",
            "py1-bawah",
            "py2-atas",
            "py2-bawah",
            "py3-atas",
            "py3-bawah",
        ]);
        sembunyikanTombol("btn-tabel-y");
        tampilkanStep("step-y-2");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                <b>Masih ada jawaban yang belum tepat:</b><br><br>
                ${pesan.join("<br><br>")}
                <br><br>
                <b>Petunjuk:</b> Gunakan rumus <b>m = (y₂ - y₁)/(x₂ - x₁)</b>, lalu perhatikan selisih nilai <b>x</b>.
            </div>
        `;
        renderKatexById("feedback-y1");
    }
}

function cekBandingY(jawaban, el) {
    const fb = document.getElementById("feedback-y2");
    const container = "#step-y-2";

    resetOpsiKotak(container);

    if (jawaban === "x-sama") {
        tandaiOpsi(el, "benar");
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Tepat. Pada setiap pasangan titik, nilai <b>x</b> selalu sama. Karena itu, <b>x₂ - x₁ = 0</b>.
            </div>
        `;
        disableOpsiKotak(container);
        tampilkanStep("step-y-3");
    } else {
        tandaiOpsi(el, "salah");
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba perhatikan lagi koordinat titik pada setiap garis. Nilai mana yang tetap, <b>x</b> atau <b>y</b>?
            </div>
        `;
    }

    renderKatexById("feedback-y2");
}

function cekKeadaanY(jawaban, el) {
    const fb = document.getElementById("feedback-y3");
    const container = "#step-y-3";

    resetOpsiKotak(container);

    if (jawaban === "tdk") {
        tandaiOpsi(el, "benar");
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Benar. Karena penyebut pada gradien bernilai <b>0</b>, pembagian tidak dapat dilakukan, sehingga gradiennya <b>tidak terdefinisi</b>.
            </div>
        `;
        disableOpsiKotak(container);
        tampilkanStep("step-y-4");
    } else {
        tandaiOpsi(el, "salah");
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba ingat kembali: apakah pembagian dengan <b>0</b> dapat dilakukan?
            </div>
        `;
    }

    renderKatexById("feedback-y3");
}

function cekBentukY(jawaban, el) {
    const fb = document.getElementById("feedback-y4");
    const container = "#step-y-4";

    resetOpsiKotak(container);

    if (jawaban === "tegak") {
        tandaiOpsi(el, "benar");
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Tepat. Jika nilai <b>x</b> pada pasangan titik sama, garis yang terbentuk berbentuk <b>tegak</b> atau vertikal.
            </div>
        `;
        disableOpsiKotak(container);
        tampilkanStep("step-y-5");
    } else {
        tandaiOpsi(el, "salah");
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba bayangkan titik-titik yang memiliki nilai <b>x</b> sama pada bidang koordinat. Garisnya akan bergerak ke arah mana?
            </div>
        `;
    }

    renderKatexById("feedback-y4");
}

function cekSimpulanY() {
    const fb = document.getElementById("feedback-y5");

    fb.innerHTML = `
        <div class="alert alert-success mt-2">
            Bagus! Sekarang perhatikan kesimpulan yang terbentuk dari hasil eksplorasimu.
        </div>
    `;

    tampilkanStep("kesimpulan-y");
    tampilkanStep("ggb-wrapper-y");
    renderKatexById("feedback-y5");
    renderKatexById("kesimpulan-y");
}

// Contoh Sumbu x
function renderKatexById(id) {
    const el = document.getElementById(id);
    if (el && window.renderMathInElement) {
        renderMathInElement(el, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function tampilkan(id) {
    const el = document.getElementById(id);
    if (el) {
        el.classList.remove("d-none");
    }
}

function sembunyikanBanyak(ids) {
    ids.forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.classList.add("d-none");
        }
    });
}

function disableBanyak(ids) {
    ids.forEach((id) => {
        const el = document.getElementById(id);
        if (el) {
            el.disabled = true;
        }
    });
}

function cekContoh1Step1(pilihan) {
    const fb = document.getElementById("fb-contoh1-step1");

    if (pilihan === "datar") {
        fb.innerHTML = "";
        sembunyikanBanyak([
            "btn-c1-s1-naik",
            "btn-c1-s1-turun",
            "btn-c1-s1-datar",
        ]);
        tampilkan("contoh1-step2");
        renderKatexById("contoh1-step2");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba perhatikan lagi. Pada soal disebutkan bahwa jalan tidak menanjak dan tidak menurun.
            </div>
        `;
    }
}

function cekContoh1Step2(pilihan) {
    const fb = document.getElementById("fb-contoh1-step2");

    if (pilihan === "y") {
        fb.innerHTML = "";
        sembunyikanBanyak(["btn-c1-s2-x", "btn-c1-s2-y"]);
        tampilkan("contoh1-step3");
        renderKatexById("contoh1-step3");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba perhatikan kembali koordinat titik $A(-2,3)$ dan $B(4,3)$.
            </div>
        `;
        renderKatexById("fb-contoh1-step2");
    }
}

function cekContoh1Step3() {
    const atas = document.getElementById("c1-atas").value.trim();
    const bawah = document.getElementById("c1-bawah").value.trim();
    const fb = document.getElementById("fb-contoh1-step3");

    if (atas === "0" && bawah === "6") {
        fb.innerHTML = "";
        disableBanyak(["c1-atas", "c1-bawah"]);
        document.getElementById("btn-c1-step3").classList.add("d-none");
        tampilkan("contoh1-step4");
        renderKatexById("contoh1-step4");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba hitung lagi. Selisih nilai $y$ adalah $3 - 3$, sedangkan selisih nilai $x$ adalah $4 - (-2)$.
            </div>
        `;
        renderKatexById("fb-contoh1-step3");
    }
}

function cekContoh1Step4(pilihan) {
    const fb = document.getElementById("fb-contoh1-step4");

    if (pilihan === "x") {
        fb.innerHTML = "";
        sembunyikanBanyak(["btn-c1-s4-x", "btn-c1-s4-y"]);
        tampilkan("contoh1-kesimpulan");
        renderKatexById("contoh1-kesimpulan");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba ingat kembali. Garis dengan gradien $0$ berbentuk mendatar dan sejajar dengan $sumbu\text{-}x$.
            </div>
        `;
        renderKatexById("fb-contoh1-step4");
    }
}

//
// Latihan Soal
//

// Helper Umum
function normJawaban(teks) {
    return String(teks || "")
        .toLowerCase()
        .replace(/\s+/g, "")
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
}

function tampilkanPetunjukLatihan3(pesan) {
    isiPesan("petunjukLatihan3", pesan, "info");
}

function kosongkanPetunjukLatihan3() {
    const el = document.getElementById("petunjukLatihan3");
    if (el) el.innerHTML = "";
}

function cekLatihan1() {
    const k = document.getElementById("lat1-k").checked;
    const l = document.getElementById("lat1-l").checked;
    const m = document.getElementById("lat1-m").checked;
    const n = document.getElementById("lat1-n").checked;
    const fb = document.getElementById("fb-lat1");

    // Jawaban benar: k dan l
    if (k && l && !m && !n) {
        fb.innerHTML = `
            <div class="alert alert-success">
                Benar! Garis <b>k</b> dan <b>l</b> sejajar dengan sumbu-x karena keduanya berbentuk <b>mendatar</b>.
            </div>
        `;
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning">
                Jawaban belum tepat. Coba perhatikan lagi garis yang berbentuk <b>mendatar</b>, karena garis seperti itulah yang sejajar dengan <b>sumbu-x</b>.
            </div>
        `;
    }
}

function cekLatihan2() {
    const pilihan = document.querySelector('input[name="latihan2"]:checked');
    const fb = document.getElementById("fb-lat2");

    if (!pilihan) {
        fb.innerHTML = `
            <div class="alert alert-warning">
                Pilih salah satu jawaban terlebih dahulu.
            </div>
        `;
        return;
    }

    if (pilihan.value === "a") {
        fb.innerHTML = `
            <div class="alert alert-success">
                Tepat! Garis melalui titik <b>(2,3)</b> dan <b>(2,8)</b> sejajar dengan <b>sumbu-y</b> karena kedua titik memiliki nilai <b>x</b> yang sama.
            </div>
        `;
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning">
                Jawaban belum tepat. Ingat, garis yang sejajar dengan <b>sumbu-y</b> memiliki nilai <b>x</b> yang sama pada kedua titiknya.
            </div>
        `;
    }
}

function cekLatihan3() {
    const benarX1 = cekIsian("x1_3", ["3a"]);
    const benarY1 = cekIsian("y1_3", ["8a"]);
    const benarX2 = cekIsian("x2_3", ["2a"]);
    const benarY2 = cekIsian("y2_3", ["4"]);

    const benarM = cekIsian("m_3", ["0"]);

    const benarKiri1 = cekIsian("kiri1_3", ["0"]);
    const benarSubY2 = cekIsian("subY2_3", ["4"]);
    const benarSubY1 = cekIsian("subY1_3", ["8a"]);
    const benarSubX2 = cekIsian("subX2_3", ["2a"]);
    const benarSubX1 = cekIsian("subX1_3", ["3a"]);

    const benarKiri2 = cekIsian("kiri2_3", ["0"]);
    const benarHasilAtas = cekIsian("hasilAtas_3", ["4-8a", "-8a+4"]);
    const benarHasilBawah = cekIsian("hasilBawah_3", ["-a", "2a-3a"]);

    const benarPers1Kiri = cekIsian("pers1Kiri_3", ["0", "0(-a)", "-0a"]);
    const benarPers1Kanan = cekIsian("pers1Kanan_3", ["4-8a", "-8a+4"]);

    const benarHasilA = cekIsian("hasilA_3", ["1/2", "0.5", "½"]);

    const semuaBenar =
        benarX1 &&
        benarY1 &&
        benarX2 &&
        benarY2 &&
        benarM &&
        benarKiri1 &&
        benarSubY2 &&
        benarSubY1 &&
        benarSubX2 &&
        benarSubX1 &&
        benarKiri2 &&
        benarHasilAtas &&
        benarHasilBawah &&
        benarPers1Kiri &&
        benarPers1Kanan &&
        benarHasilA;

    if (semuaBenar) {
        isiPesan(
            "fbLatihan3",
            "Bagus! Langkah-langkah penyelesaianmu sudah benar.<br>Diperoleh $8a = 4$, sehingga $a = \\frac{1}{2}$.",
            "success",
        );
        kosongkanPetunjukLatihan3();
        renderKatexById("fbLatihan3");
        return;
    }

    isiPesan(
        "fbLatihan3",
        "Masih ada jawaban yang belum tepat. Coba periksa kembali isian yang berwarna merah.",
        "warning",
    );
    renderKatexById("fbLatihan3");

    if (!benarX1 || !benarY1 || !benarX2 || !benarY2) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: tentukan dulu koordinat tiap titik. Dari $A(3a,8a)$ diperoleh $x_1=3a$ dan $y_1=8a$, sedangkan dari $B(2a,4)$ diperoleh $x_2=2a$ dan $y_2=4$.",
        );
        renderKatexById("petunjukLatihan3");
        return;
    }

    if (!benarM) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: karena garis sejajar dengan $sumbu\\text{-}x$, maka gradiennya adalah $0$.",
        );
        renderKatexById("petunjukLatihan3");
        return;
    }

    if (
        !benarKiri1 ||
        !benarSubY2 ||
        !benarSubY1 ||
        !benarSubX2 ||
        !benarSubX1
    ) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: substitusikan $m=0$, $y_2=4$, $y_1=8a$, $x_2=2a$, dan $x_1=3a$ ke rumus $m=\\frac{y_2-y_1}{x_2-x_1}$.",
        );
        renderKatexById("petunjukLatihan3");
        return;
    }

    if (!benarKiri2 || !benarHasilAtas || !benarHasilBawah) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: sederhanakan hasil substitusi. Pembilang berasal dari $4-8a$, sedangkan penyebut berasal dari $2a-3a$.",
        );
        renderKatexById("petunjukLatihan3");
        return;
    }

    if (!benarPers1Kiri || !benarPers1Kanan) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: hilangkan pecahan dengan mengalikan kedua ruas dengan penyebutnya.",
        );
        renderKatexById("petunjukLatihan3");
        return;
    }

    if (!benarHasilA) {
        tampilkanPetunjukLatihan3(
            "Petunjuk: dari $4-8a=0$, pindahkan $8a$ ke ruas kanan atau $4$ ke ruas kiri, lalu cari nilai $a$.",
        );
        renderKatexById("petunjukLatihan3");
        return;
    }
}

function cekLat4() {
    const m = document.getElementById("lat4-m").value.trim();
    const posisi = document.getElementById("lat4-posisi").value;
    const alasan = document.getElementById("lat4-alasan").value.toLowerCase();
    const fb = document.getElementById("fb-lat4");

    let pesan = [];

    // gradien
    if (m !== "0") {
        pesan.push("Gradien belum tepat.");
    }

    // posisi
    if (posisi !== "x") {
        pesan.push("Kedudukan garis belum tepat.");
    }

    // alasan
    const adaY = alasan.includes("y");
    const adaTetap = alasan.includes("tetap") || alasan.includes("sama");

    if (!(adaY && adaTetap)) {
        pesan.push(
            "Alasanmu masih belum tepat. Perhatikan apakah ada komponen koordinat yang nilainya selalu sama.",
        );
    }

    if (pesan.length === 0) {
        fb.innerHTML = `
            <div class="alert alert-success">
                Benar! Persamaan $y = -4$ menunjukkan bahwa nilai $y$ selalu tetap.
                Maka garisnya mendatar, gradiennya $0$, dan sejajar dengan sumbu-x.
            </div>
        `;
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning">
                ${pesan.join("<br><br>")}
            </div>
        `;
        renderKatexById("fb-lat4");
    }
}
