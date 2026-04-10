// Materi awal
// GeoGebra
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
    applet2.inject("ggb-sumbu-x");

    setTimeout(function () {
        var ggb = applet2.getAppletObject();

        // Titik-titik untuk garis a
        ggb.evalCommand("A=(-2,2)");
        ggb.evalCommand("B=(4,2)");
        ggb.evalCommand("a=Line(A,B)");

        // Titik-titik untuk garis b
        ggb.evalCommand("C=(1,5)");
        ggb.evalCommand("D=(6,5)");
        ggb.evalCommand("b=Line(C,D)");

        // Titik-titik untuk garis c
        ggb.evalCommand("E=(-3,-1)");
        ggb.evalCommand("F=(2,-1)");
        ggb.evalCommand("c=Line(E,F)");

        // Tampilkan label titik
        ggb.setLabelVisible("A", true);
        ggb.setLabelVisible("B", true);
        ggb.setLabelVisible("C", true);
        ggb.setLabelVisible("D", true);
        ggb.setLabelVisible("E", true);
        ggb.setLabelVisible("F", true);

        // Tampilkan label garis
        ggb.setLabelVisible("a", true);
        ggb.setLabelVisible("b", true);
        ggb.setLabelVisible("c", true);

        // Supaya titik tidak bisa digeser
        ggb.setFixed("A", true, false);
        ggb.setFixed("B", true, false);
        ggb.setFixed("C", true, false);
        ggb.setFixed("D", true, false);
        ggb.setFixed("E", true, false);
        ggb.setFixed("F", true, false);

        // Atur warna garis biar mudah dibedakan
        ggb.setColor("a", 46, 117, 182); // biru
        ggb.setColor("b", 34, 185, 105); // hijau
        ggb.setColor("c", 220, 53, 69); // merah

        // Tebalkan garis
        ggb.setLineThickness("a", 6);
        ggb.setLineThickness("b", 6);
        ggb.setLineThickness("c", 6);

        // Ukuran titik
        ggb.setPointSize("A", 5);
        ggb.setPointSize("B", 5);
        ggb.setPointSize("C", 5);
        ggb.setPointSize("D", 5);
        ggb.setPointSize("E", 5);
        ggb.setPointSize("F", 5);

        // Tampilkan sumbu dan grid
        ggb.setAxesVisible(true, true);
        ggb.setGridVisible(true);

        // Atur tampilan agar semua objek kelihatan
        ggb.setCoordSystem(-6, 8, -4, 7);
    }, 1000);
});

// GeoGebra sumbu-y
var params3 = {
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

var applet3 = new GGBApplet(params3, true);

window.addEventListener("load", function () {
    applet3.inject("ggb-sumbu-y");

    setTimeout(function () {
        var ggb = applet3.getAppletObject();

        // Garis p
        ggb.evalCommand("P=(2,3)");
        ggb.evalCommand("Q=(2,-4)");
        ggb.evalCommand("p=Line(P,Q)");

        // Garis q
        ggb.evalCommand("R=(-1,5)");
        ggb.evalCommand("S=(-1,-2)");
        ggb.evalCommand("q=Line(R,S)");

        // Garis r
        ggb.evalCommand("T=(4,1)");
        ggb.evalCommand("U=(4,6)");
        ggb.evalCommand("r=Line(T,U)");

        // Sembunyikan label default garis
        ggb.setLabelVisible("p", false);
        ggb.setLabelVisible("q", false);
        ggb.setLabelVisible("r", false);

        // Label manual
        ggb.evalCommand('tp = Text("p", (2.2,4))');
        ggb.evalCommand('tq = Text("q", (-0.8,4))');
        ggb.evalCommand('tr = Text("r", (4.2,4))');

        // Warna garis
        ggb.setColor("p", 46, 117, 182);
        ggb.setColor("q", 34, 185, 105);
        ggb.setColor("r", 220, 53, 69);

        // Tebal garis
        ggb.setLineThickness("p", 6);
        ggb.setLineThickness("q", 6);
        ggb.setLineThickness("r", 6);

        // Fix titik
        ["P", "Q", "R", "S", "T", "U"].forEach((pt) => {
            ggb.setFixed(pt, true, false);
            ggb.setPointSize(pt, 5);
        });

        // Grid & axis
        ggb.setAxesVisible(true, true);
        ggb.setGridVisible(true);

        ggb.setCoordSystem(-5, 7, -5, 7);
    }, 1000);
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

function cekBandingX() {
    const jawaban = document.getElementById("banding-x").value;
    const fb = document.getElementById("feedback-x2");

    if (jawaban === "sama") {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Tepat. Ketiga garis memiliki gradien yang sama.
            </div>
        `;
        disableElement("banding-x");
        sembunyikanTombol("btn-banding-x");
        tampilkanStep("step-x-3");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Jawaban belum tepat. Coba lihat kembali hasil gradien pada tabel. Apakah semuanya bernilai <b>0</b> atau berbeda-beda?
            </div>
        `;
    }
}

function cekBentukX() {
    const jawaban = document.getElementById("bentuk-x").value;
    const fb = document.getElementById("feedback-x3");

    if (jawaban === "mendatar") {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Benar. Karena nilai <b>y</b> tetap, garis yang terbentuk adalah garis mendatar.
            </div>
        `;
        disableElement("bentuk-x");
        sembunyikanTombol("btn-bentuk-x");
        tampilkanStep("step-x-4");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba perhatikan lagi. Jika pasangan titik memiliki nilai <b>y</b> yang sama, garisnya tidak naik dan tidak turun, sehingga bentuknya <b>mendatar</b>.
            </div>
        `;
    }
}

function cekSimpulanX() {
    const s1 = document.getElementById("simpulan-x1").value;
    const s2 = document.getElementById("simpulan-x2").value;
    const fb = document.getElementById("feedback-x4");

    let pesan = [];

    if (s1 !== "mendatar") {
        pesan.push(
            "Bentuk garisnya belum tepat. Garis dengan nilai <b>y</b> yang sama berbentuk <b>mendatar</b>.",
        );
    }

    if (s2 !== "0") {
        pesan.push(
            "Gradiennya belum tepat. Karena <b>y₂ - y₁ = 0</b>, maka gradien garis tersebut adalah <b>0</b>.",
        );
    }

    if (pesan.length === 0) {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Bagus! Kamu sudah berhasil menyimpulkan hubungan garis sejajar <b>sumbu-x</b> dengan gradiennya.
            </div>
        `;
        disableMany(["simpulan-x1", "simpulan-x2"]);
        sembunyikanTombol("btn-simpulan-x");
        tampilkanStep("kesimpulan-x");
        tampilkanStep("ggb-wrapper-x");
        renderKatexById("kesimpulan-x");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                <b>Simpulanmu belum lengkap dengan tepat:</b><br><br>
                ${pesan.join("<br><br>")}
            </div>
        `;
        renderKatexById("feedback-x4");
    }
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
            "Gradien garis <b>q</b> belum tepat. Pada titik R(-1,5) dan S(-1,-2), nilai <b>x</b> sama sehingga penyebutnya <b>0</b>.",
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
                Bagus! Bentuk gradien yang kamu isi sudah benar. Sekarang amati penyebut dari ketiga gradien itu.
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
                <b>Petunjuk:</b> Jika nilai <b>x</b> kedua titik sama, maka <b>x₂ - x₁ = 0</b>.
            </div>
        `;
        renderKatexById("feedback-y1");
    }
}

function cekBandingY() {
    const jawaban = document.getElementById("banding-y").value;
    const fb = document.getElementById("feedback-y2");

    if (jawaban === "nol") {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Tepat. Semua penyebut pada bentuk gradien tersebut bernilai <b>0</b>.
            </div>
        `;
        disableElement("banding-y");
        sembunyikanTombol("btn-banding-y");
        tampilkanStep("step-y-3");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Jawaban belum tepat. Coba lihat lagi nilai <b>x</b> pada setiap pasangan titik. Karena sama, maka hasil <b>x₂ - x₁</b> selalu <b>0</b>.
            </div>
        `;
    }
}

function cekKeadaanY() {
    const jawaban = document.getElementById("keadaan-y").value;
    const fb = document.getElementById("feedback-y3");

    if (jawaban === "tdk") {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Benar. Karena penyebutnya <b>0</b>, gradien garis tersebut <b>tidak terdefinisi</b>.
            </div>
        `;
        disableElement("keadaan-y");
        sembunyikanTombol("btn-keadaan-y");
        tampilkanStep("step-y-4");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba ingat kembali: pembagian dengan <b>0</b> tidak dapat dilakukan. Karena itu, gradiennya bukan 0 atau 1, tetapi <b>tidak terdefinisi</b>.
            </div>
        `;
    }
}

function cekBentukY() {
    const jawaban = document.getElementById("bentuk-y").value;
    const fb = document.getElementById("feedback-y4");

    if (jawaban === "tegak") {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Tepat. Jika nilai <b>x</b> pada pasangan titik sama, garisnya berbentuk <b>tegak</b>.
            </div>
        `;
        disableElement("bentuk-y");
        sembunyikanTombol("btn-bentuk-y");
        tampilkanStep("step-y-5");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Jawaban belum tepat. Coba bayangkan titik-titik dengan nilai <b>x</b> yang sama pada bidang koordinat. Titik-titik itu membentuk garis <b>tegak</b>.
            </div>
        `;
    }
}

function cekSimpulanY() {
    const s1 = document.getElementById("simpulan-y1").value;
    const s2 = document.getElementById("simpulan-y2").value;
    const fb = document.getElementById("feedback-y5");

    let pesan = [];

    if (s1 !== "tegak") {
        pesan.push(
            "Bentuk garisnya belum tepat. Garis dengan nilai <b>x</b> yang sama berbentuk <b>tegak</b>.",
        );
    }

    if (s2 !== "tdk") {
        pesan.push(
            "Gradiennya belum tepat. Karena penyebut pada rumus gradien bernilai <b>0</b>, gradien garis tersebut <b>tidak terdefinisi</b>.",
        );
    }

    if (pesan.length === 0) {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Bagus! Kamu sudah berhasil menyimpulkan hubungan garis sejajar <b>sumbu-y</b> dengan gradiennya.
            </div>
        `;
        disableMany(["simpulan-y1", "simpulan-y2"]);
        sembunyikanTombol("btn-simpulan-y");
        tampilkanStep("kesimpulan-y");
        tampilkanStep("ggb-wrapper-y");
        renderKatexById("kesimpulan-y");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                <b>Simpulanmu belum lengkap dengan tepat:</b><br><br>
                ${pesan.join("<br><br>")}
            </div>
        `;
        renderKatexById("feedback-y5");
    }
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

function norm(teks) {
    return teks.toLowerCase().replace(/\s+/g, "");
}

function cekLatihan3() {
    const x1 = norm(document.getElementById("x1_3").value);
    const y1 = norm(document.getElementById("y1_3").value);
    const x2 = norm(document.getElementById("x2_3").value);
    const y2 = norm(document.getElementById("y2_3").value);
    const m = norm(document.getElementById("m_3").value);

    const kiri1 = norm(document.getElementById("kiri1_3").value);
    const subY2 = norm(document.getElementById("subY2_3").value);
    const subY1 = norm(document.getElementById("subY1_3").value);
    const subX2 = norm(document.getElementById("subX2_3").value);
    const subX1 = norm(document.getElementById("subX1_3").value);

    const kiri2 = norm(document.getElementById("kiri2_3").value);
    const hasilAtas = norm(document.getElementById("hasilAtas_3").value);
    const hasilBawah = norm(document.getElementById("hasilBawah_3").value);

    const pers1Kiri = norm(document.getElementById("pers1Kiri_3").value);
    const pers1Kanan = norm(document.getElementById("pers1Kanan_3").value);

    const hasilA = norm(document.getElementById("hasilA_3").value);

    const fb = document.getElementById("fbLatihan3");

    let pesan = [];

    if (x1 !== "3a") pesan.push("$x_1$ belum tepat.");
    if (y1 !== "8a") pesan.push("$y_1$ belum tepat.");
    if (x2 !== "2a") pesan.push("$x_2$ belum tepat.");
    if (y2 !== "4") pesan.push("$y_2$ belum tepat.");

    if (m !== "0") {
        pesan.push("Karena garis sejajar sumbu-x, gradiennya harus $0$.");
    }

    if (kiri1 !== "0") pesan.push("Ruas kiri substitusi belum tepat.");
    if (subY2 !== "4") pesan.push("Bagian $y_2$ belum tepat.");
    if (subY1 !== "8a") pesan.push("Bagian $y_1$ belum tepat.");
    if (subX2 !== "2a") pesan.push("Bagian $x_2$ belum tepat.");
    if (subX1 !== "3a") pesan.push("Bagian $x_1$ belum tepat.");

    if (kiri2 !== "0") pesan.push("Ruas kiri bentuk sederhana belum tepat.");
    if (!(hasilAtas === "4-8a" || hasilAtas === "-8a+4")) {
        pesan.push("Pembilang hasil substitusi belum tepat.");
    }
    if (!(hasilBawah === "-a" || hasilBawah === "2a-3a")) {
        pesan.push("Penyebut hasil substitusi belum tepat.");
    }

    if (!(pers1Kiri === "0" || pers1Kiri === "0(-a)" || pers1Kiri === "-0a")) {
        pesan.push("Ruas kiri setelah menghilangkan pecahan belum tepat.");
    }
    if (!(pers1Kanan === "4-8a" || pers1Kanan === "-8a+4")) {
        pesan.push("Ruas kanan setelah menghilangkan pecahan belum tepat.");
    }

    if (!(hasilA === "1/2" || hasilA === "0.5" || hasilA === "½")) {
        pesan.push("Nilai $a$ belum tepat.");
    }

    if (pesan.length === 0) {
        fb.innerHTML = `
            <div class="alert alert-success">
                Bagus! Langkah-langkah penyelesaianmu sudah benar.<br>
                Diperoleh $8a = 4$, sehingga $a = \\frac{1}{2}$.
            </div>
        `;

        renderKatexById("fbLatihan3");
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning">
                <b>Masih ada bagian yang belum tepat:</b><br><br>
                ${pesan.join("<br>")}
                <br><br>
                <b>Petunjuk:</b> Karena garis sejajar sumbu-x, fokus utama ada pada nilai ordinat, yaitu $y_1$ dan $y_2$.
            </div>
        `;
    }

    renderKatexById("fbLatihan3");
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
