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

// Latihan
function norm(v) {
    return (v || "").toString().trim().replace(/\s+/g, "").toLowerCase();
}

function cekField(id, jawabanBenar, labelTampil) {
    const el = document.getElementById(id);

    if (!el) {
        return { benar: false, label: `Field ${id} tidak ditemukan.` };
    }

    const nilaiUser = norm(el.value);
    const nilaiKunci = norm(jawabanBenar);

    if (!isNaN(nilaiUser) && !isNaN(nilaiKunci)) {
        if (Number(nilaiUser) === Number(nilaiKunci)) {
            el.classList.remove("is-invalid");
            el.classList.add("is-valid");
            return { benar: true, label: labelTampil };
        }
    }

    if (nilaiUser === nilaiKunci) {
        el.classList.remove("is-invalid");
        el.classList.add("is-valid");
        return { benar: true, label: labelTampil };
    }

    el.classList.remove("is-valid");
    el.classList.add("is-invalid");
    return { benar: false, label: labelTampil };
}

function renderMathTarget(el) {
    if (typeof renderMathInElement === "function") {
        renderMathInElement(el, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function cekSemuaLatihan() {
    let totalBenar = 0;
    let totalSoal = 15;
    let hasilHTML = "";

    // LATIHAN 1
    let pesan1 = [];
    let benar1 = 0;

    let c1 = cekField("l1_A", "20", "l1_A");
    if (c1.benar) benar1++;
    else pesan1.push("Koefisien $x$ pada persamaan belum tepat.");

    let c2 = cekField("l1_B", "-2", "l1_B");
    if (c2.benar) benar1++;
    else pesan1.push("Koefisien $y$ pada persamaan belum tepat.");

    let c3a = cekField("l1_subAtas", "-20", "l1_subAtas");
    let c3b = cekField("l1_subBawah", "-2", "l1_subBawah");
    if (c3a.benar && c3b.benar) benar1++;
    else {
        pesan1.push(
            "Gunakan rumus $m = -\\frac{A}{B}$ dengan tanda yang benar.",
        );
    }

    let c4 = cekField("l1_hasil", "10", "l1_hasil");
    if (c4.benar) benar1++;
    else pesan1.push("Sederhanakan hasil gradien garis yang diketahui lagi.");

    let c5 = cekField("l1_final", "10", "l1_final");
    if (c5.benar) benar1++;
    else
        pesan1.push(
            "Karena sejajar, gradien garis $p$ sama dengan gradien garis yang diketahui.",
        );

    totalBenar += benar1;

    hasilHTML += `
    <div class="alert ${benar1 === 5 ? "alert-success" : "alert-warning"}">
        <b>Latihan 1:</b> ${benar1}/5 benar
        ${pesan1.length ? `<br><br>${pesan1.join("<br>")}` : "<br><br>Semua jawaban benar."}
    </div>
    `;
    
    // LATIHAN 2
    let l2_a = document.getElementById("l2_a").checked;
    let l2_b = document.getElementById("l2_b").checked;
    let l2_c = document.getElementById("l2_c").checked;
    let l2_d = document.getElementById("l2_d").checked;

    let benar2 = 0;
    let pesan2 = "";

    if (l2_a && l2_c && !l2_b && !l2_d) {
        benar2 = 4;
        pesan2 = "Semua pilihan sudah tepat.";
    } else {
        pesan2 = "Masih ada pilihan yang belum tepat.";
    }

    totalBenar += benar2;

    hasilHTML += `
        <div class="alert ${benar2 === 4 ? "alert-success" : "alert-warning"}">
            <b>Latihan 2:</b> ${benar2}/4 benar
            <br><br>${pesan2}
        </div>
    `;

    // LATIHAN 3
    let pesan3 = [];
    let benar3 = 0;

    let d1a = cekField("l3_m1_atas", "-4", "l3_m1_atas");
    let d1b = cekField("l3_m1_bawah", "c", "l3_m1_bawah");
    if (d1a.benar && d1b.benar) benar3++;
    else pesan3.push("Gunakan rumus gradien dari bentuk Ax + By + C = 0.");

    let d2 = cekField("l3_m2", "-1", "l3_m2");
    if (d2.benar) benar3++;
    else pesan3.push("Ubah dulu persamaan ke bentuk y = mx + c.");

    let d3 = cekField("l3_relasi", "m1=m2", "l3_relasi");
    if (d3.benar) benar3++;
    else pesan3.push("Apa hubungan gradien dua garis yang sejajar?");

    let d4a = cekField("l3_kiri_atas", "-4", "l3_kiri_atas");
    let d4b = cekField("l3_kiri_bawah", "c", "l3_kiri_bawah");
    if (d4a.benar && d4b.benar) benar3++;
    else pesan3.push("Masukkan nilai gradien ke dalam persamaan perbandingan.");

    let d5 = cekField("l3_kanan", "-1", "l3_kanan");
    if (d5.benar) benar3++;
    else pesan3.push("Gunakan nilai gradien dari garis kedua.");

    let d6 = cekField("l3_c", "4", "l3_c");
    if (d6.benar) benar3++;
    else
        pesan3.push(
            "Selesaikan persamaan sederhana dari hasil perbandingan gradien.",
        );

    totalBenar += benar3;

    hasilHTML += `
        <div class="alert ${benar3 === 6 ? "alert-success" : "alert-warning"}">
            <b>Latihan 3:</b> ${benar3}/6 benar
            ${pesan3.length ? `<br><br>${pesan3.join("<br>")}` : "<br><br>Semua jawaban benar."}
        </div>
    `;

    let fb = document.getElementById("fbSemuaLatihan");
    if (!fb) return;

    let summaryClass =
        totalBenar === totalSoal ? "alert-success" : "alert-info";
    let summaryText =
        totalBenar === totalSoal
            ? `Hebat! Semua jawaban benar. Skor kamu <b>${totalBenar}/${totalSoal}</b>.`
            : `Skor kamu <b>${totalBenar}/${totalSoal}</b>. Coba perbaiki bagian yang masih salah ya.`;

    fb.innerHTML = `
        <div class="alert ${summaryClass}">
            ${summaryText}
        </div>
        ${hasilHTML}
    `;

    renderMathTarget(fb);
}
