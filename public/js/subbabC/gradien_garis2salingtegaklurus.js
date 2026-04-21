// =========================
// GeoGebra Eksplorasi Tegak Lurus
// =========================
let appletEksTegak = null;
let sudahLoadTegak = false;

function ggbOnLoadEksTegak(api) {
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

    api.setCoordSystem(-7, 7, -7, 7);
    api.setAxisSteps(1, 1, 1, 1);

    api.evalCommand("A=(-4,-2)");
    api.evalCommand("B=(-2,2)");
    api.evalCommand("C=(-4,2)");
    api.evalCommand("D=(0,0)");
    api.evalCommand("E=(1,-1)");
    api.evalCommand("F=(5,1)");
    api.evalCommand("G=(2,3)");
    api.evalCommand("H=(4,-1)");

    api.evalCommand("s1=Segment(A,B)");
    api.evalCommand("s2=Segment(C,D)");
    api.evalCommand("s3=Segment(E,F)");
    api.evalCommand("s4=Segment(G,H)");

    ["A", "B", "C", "D", "E", "F", "G", "H"].forEach(function (obj) {
        api.setLabelVisible(obj, true);
        api.setFixed(obj, true, false);
        api.setPointSize(obj, 5);
        api.setColor(obj, 0, 0, 0);
    });

    ["s1", "s2"].forEach(function (obj) {
        api.setLabelVisible(obj, false);
        api.setLineThickness(obj, 5);
        api.setColor(obj, 220, 60, 35);
    });

    ["s3", "s4"].forEach(function (obj) {
        api.setLabelVisible(obj, false);
        api.setLineThickness(obj, 5);
        api.setColor(obj, 40, 120, 220);
    });

    api.setAxesVisible(true, true);
    api.setGridVisible(true);
    api.setCoordSystem(-6, 6, -5, 5);
}

function tampilkanGrafikTegak() {
    if (sudahLoadTegak) return;

    const paramsEksTegak = {
        appName: "classic",
        id: "ggbAppletEksTegak",
        width: 500,
        height: 400,
        showToolBar: false,
        showAlgebraInput: false,
        showMenuBar: false,
        enableRightClick: false,
        showResetIcon: true,
        appletOnLoad: ggbOnLoadEksTegak,
    };

    appletEksTegak = new GGBApplet(paramsEksTegak, true);
    appletEksTegak.inject("ggb-eksplorasi-tegak");

    sudahLoadTegak = true;
}

window.addEventListener("load", function () {
    tampilkanGrafikTegak();
});

// =========================
// Helper Umum
// =========================
function parseNilai(v) {
    v = (v || "").toString().trim().replace(",", ".");

    if (v.includes("/")) {
        const parts = v.split("/");
        if (parts.length === 2) {
            const a = Number(parts[0]);
            const b = Number(parts[1]);
            if (!isNaN(a) && !isNaN(b) && b !== 0) {
                return a / b;
            }
        }
    }

    const n = Number(v);
    return isNaN(n) ? null : n;
}

function samaNilai(inputId, kunci, toleransi = 1e-9) {
    const el = document.getElementById(inputId);
    if (!el) return false;

    const nilaiUser = parseNilai(el.value);
    const nilaiKunci = parseNilai(kunci);

    if (nilaiUser === null || nilaiKunci === null) return false;
    return Math.abs(nilaiUser - nilaiKunci) < toleransi;
}

function normalisasiNilai(teks) {
    return (teks || "")
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/,/g, ".");
}

function cocokJawaban(input, daftarBenar) {
    const nilai = normalisasiNilai(input);
    return daftarBenar.some((jawaban) => normalisasiNilai(jawaban) === nilai);
}

function renderUlangKatex(container) {
    if (window.renderMathInElement && container) {
        renderMathInElement(container, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
            throwOnError: false,
        });
    }
}

function nonaktifkanTombolDi(containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;

    const buttons = container.querySelectorAll("button");
    buttons.forEach((btn) => {
        btn.disabled = true;
    });
}

function tandaiTombolPilihan(containerId, jawabanBenar, jawabanDipilih) {
    const container = document.getElementById(containerId);
    if (!container) return;

    const buttons = container.querySelectorAll("button");
    buttons.forEach((btn) => {
        const onclickAttr = btn.getAttribute("onclick") || "";

        btn.classList.remove(
            "btn-outline-primary",
            "btn-success",
            "btn-danger",
            "btn-secondary",
        );

        if (onclickAttr.includes(`'${jawabanBenar}'`)) {
            btn.classList.add("btn-success");
        } else if (onclickAttr.includes(`'${jawabanDipilih}'`)) {
            btn.classList.add("btn-danger");
        } else {
            btn.classList.add("btn-secondary");
        }
    });
}

function tampilkanStep(id) {
    const el = document.getElementById(id);
    if (el) {
        el.classList.remove("d-none");
    }
}
// =========================
// Eksplorasi
// =========================
function cekStepT1() {
    let benar = 0;
    let pesan = [];

    if (samaNilai("tm1", "2")) benar++;
    else pesan.push("Gradien AB belum tepat.");

    if (samaNilai("tm2", "-1/2")) benar++;
    else pesan.push("Gradien CD belum tepat.");

    if (samaNilai("tm3", "1/2")) benar++;
    else pesan.push("Gradien EF belum tepat.");

    if (samaNilai("tm4", "-2")) benar++;
    else pesan.push("Gradien GH belum tepat.");

    const fb = document.getElementById("fbT1");

    if (benar === 4) {
        fb.innerHTML = `<div class="alert alert-success">Semua gradien sudah benar.</div>`;
        document.getElementById("stepT2").classList.remove("d-none");
    } else {
        fb.innerHTML = `<div class="alert alert-warning">${pesan.join("<br>")}</div>`;
    }

    renderUlangKatex(fb);
}

function cekStepT2() {
    let benar = 0;
    let pesan = [];

    if (samaNilai("kali1", "-1")) benar++;
    else pesan.push("Hasil kali gradien pasangan pertama belum tepat.");

    if (samaNilai("kali2", "-1")) benar++;
    else pesan.push("Hasil kali gradien pasangan kedua belum tepat.");

    const fb = document.getElementById("fbT2");

    if (benar === 2) {
        fb.innerHTML = `<div class="alert alert-success">Bagus. Sekarang kamu bisa membuat kesimpulan.</div>`;
        document.getElementById("stepT3").classList.remove("d-none");
    } else {
        fb.innerHTML = `<div class="alert alert-warning">${pesan.join("<br>")}</div>`;
    }

    renderUlangKatex(fb);
}

function cekStepT3() {
    const pilih = document.getElementById("pilihT1").value;
    const fb = document.getElementById("fbT3");

    if (pilih === "-1") {
        fb.innerHTML = `<div class="alert alert-success">Kesimpulanmu benar.</div>`;
        document.getElementById("kesimpulanT").classList.remove("d-none");
    } else {
        fb.innerHTML = `<div class="alert alert-warning">Perhatikan kembali hasil kali gradien pada langkah sebelumnya.</div>`;
    }

    renderUlangKatex(fb);
}

// =========================
// Contoh Soal
// =========================
function cekCepatTegak() {
    const input = document.getElementById("cek-cepat-tegak");
    const fb = document.getElementById("fb-cek-cepat-tegak");
    const jawaban = (input.value || "")
        .trim()
        .replace(/\s+/g, "")
        .replace(",", ".");

    const benar =
        jawaban === "-1/2" || jawaban === "-0.5" || jawaban === "(-1)/2";

    if (benar) {
        fb.innerHTML = `
            <div class="alert alert-success mt-2">
                Benar. Jika dua garis saling tegak lurus, maka hasil kali gradiennya adalah <b>$-1$</b>.
                Jadi gradien yang tegak lurus dengan <b>$2$</b> adalah <b>$-\\frac{1}{2}$</b>.
            </div>
        `;
        input.disabled = true;
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mt-2">
                Coba ingat kembali: jika <b>$m_1 . m_2 = -1$</b> dan salah satu gradiennya <b>$2$</b>,
                maka gradien yang lain adalah <b>$-\\frac{1}{2}$</b>.
            </div>
        `;
    }
    renderUlangKatex(fb);
}

// =========================
// Latihan 1
// =========================
function cekLatihanTegak() {
    const m1 = document.getElementById("l_m1").value;
    const ma = document.getElementById("l_ma").value;
    const mb = document.getElementById("l_mb").value;
    const kaliA = document.getElementById("l_kali_a").value;
    const kaliB = document.getElementById("l_kali_b").value;
    const jawaban = document.getElementById("l_jawaban").value;

    const benarM1 = cocokJawaban(m1, ["3"]);
    const benarMa = cocokJawaban(ma, ["-1/3", "-0.3333", "-0.33"]);
    const benarMb = cocokJawaban(mb, ["2/3", "0.6667", "0.67"]);
    const benarKaliA = cocokJawaban(kaliA, ["-1"]);
    const benarKaliB = cocokJawaban(kaliB, ["2"]);
    const benarJawaban = cocokJawaban(jawaban, ["x+3y-6=0", "a", "y=-2/3x"]);

    const feedback = document.getElementById("fbLatihanTegak");

    if (
        benarM1 &&
        benarMa &&
        benarMb &&
        benarKaliA &&
        benarKaliB &&
        benarJawaban
    ) {
        feedback.innerHTML = `
            <div class="alert alert-success rounded-3">
                Bagus, semua langkah sudah tepat.
            </div>
        `;
    } else {
        let petunjuk = [];

        if (!benarM1) {
            petunjuk.push(
                "Periksa kembali gradien pada persamaan <b>$y = 3x - 2$</b>. Pada bentuk <b>$y = mx + c$</b>, gradien adalah koefisien <b>$x$</b>.",
            );
        }

        if (!benarMa) {
            petunjuk.push(
                "Untuk garis <b>(a)</b>, ubah dulu ke bentuk <b>$y = mx + c$</b>, lalu tentukan gradiennya dari koefisien <b>$x$</b>.",
            );
        }

        if (!benarMb) {
            petunjuk.push(
                "Untuk garis <b>(b)</b>, ubah dulu ke bentuk <b>$y = mx + c$</b>, lalu tentukan gradiennya dari koefisien <b>$x$</b>.",
            );
        }

        if (!benarKaliA) {
            petunjuk.push(
                "Hitung kembali hasil kali <b>$m_1 \\times m_a$</b>. Bandingkan hasilnya dengan syarat dua garis tegak lurus.",
            );
        }

        if (!benarKaliB) {
            petunjuk.push(
                "Hitung kembali hasil kali <b>$m_1 \\times m_b$</b>.",
            );
        }

        if (!benarJawaban) {
            petunjuk.push(
                "Pilih persamaan garis yang menghasilkan hasil kali gradien <b>$-1$</b>, lalu tuliskan persamaan garisnya dengan lengkap.",
            );
        }

        feedback.innerHTML = `
            <div class="alert alert-warning rounded-3">
                <b>Coba perhatikan lagi:</b>
                <ul class="mb-0 mt-2">
                    ${petunjuk.map((item) => `<li>${item}</li>`).join("")}
                </ul>
            </div>
        `;
    }

    renderUlangKatex(feedback);
}

// =========================
// Latihan 2
// =========================
function cekLatihan2() {
    const mabAtas = document.getElementById("l2_mab_atas").value;
    const mabBawah = document.getElementById("l2_mab_bawah").value;
    const hubungan = document.getElementById("l2_hubungan").value;
    const atas = document.getElementById("l2_atas").value;
    const bawah = document.getElementById("l2_bawah").value;
    const hasilSubs = document.getElementById("l2_hasil_subs").value;
    const jawaban = document.getElementById("l2_jawaban").value;

    const benarMabAtas = cocokJawaban(mabAtas, ["-1"]);
    const benarMabBawah = cocokJawaban(mabBawah, ["5"]);
    const benarHubungan = cocokJawaban(hubungan, ["-1"]);
    const benarAtas = cocokJawaban(atas, ["-1"]);
    const benarBawah = cocokJawaban(bawah, ["5"]);
    const benarHasilSubs = cocokJawaban(hasilSubs, ["-1"]);
    const benarJawaban = cocokJawaban(jawaban, ["5"]);

    const feedback = document.getElementById("fbLatihan2");

    if (
        benarMabAtas &&
        benarMabBawah &&
        benarHubungan &&
        benarAtas &&
        benarBawah &&
        benarHasilSubs &&
        benarJawaban
    ) {
        feedback.innerHTML = `
            <div class="alert alert-success rounded-3">
                Bagus, semua langkah sudah tepat.
            </div>
        `;
    } else {
        let petunjuk = [];

        if (!benarMabAtas || !benarMabBawah) {
            petunjuk.push(
                "Perhatikan kembali gradien jalan $AB$. Tuliskan dalam bentuk pecahan yang sudah disederhanakan.",
            );
        }

        if (!benarHubungan) {
            petunjuk.push(
                "Ingat, dua garis yang saling tegak lurus memiliki hasil kali gradien $-1$.",
            );
        }

        if (!benarAtas || !benarBawah) {
            petunjuk.push(
                "Substitusikan kembali nilai gradien $AB$ ke bentuk $m_k \\times m_{AB} = -1$.",
            );
        }

        if (!benarHasilSubs) {
            petunjuk.push(
                "Perhatikan ruas kanan pada hubungan dua garis tegak lurus. Nilainya tetap $-1$.",
            );
        }

        if (!benarJawaban) {
            petunjuk.push(
                "Dari bentuk $m_k \\times \\left(-\\frac{1}{5}\\right) = -1$, cari nilai $m_k$ dengan membagi kedua ruas oleh $-\\frac{1}{5}$.",
            );
        }

        feedback.innerHTML = `
            <div class="alert alert-warning rounded-3">
                <b>Coba perhatikan lagi:</b>
                <ul class="mb-0 mt-2">
                    ${petunjuk.map((item) => `<li>${item}</li>`).join("")}
                </ul>
            </div>
        `;
    }

    renderUlangKatex(feedback);
}
