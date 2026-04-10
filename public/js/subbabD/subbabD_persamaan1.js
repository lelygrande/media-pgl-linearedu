// Eksplorasi
function cekEksplorasi() {
    const subX1 = document.getElementById("sub_x1").value.trim().toLowerCase();
    const c1 = document.getElementById("c1").value.trim().toLowerCase();
    const c2 = document.getElementById("c2").value.trim().toLowerCase();
    const subC2 = document.getElementById("sub_c2").value.trim().toLowerCase();
    const y1Val = document.getElementById("y1_val").value.trim().toLowerCase();
    const x1Val = document.getElementById("x1_val").value.trim().toLowerCase();

    const fb = document.getElementById("feedbackEksplorasi");
    const kesimpulan = document.getElementById("kesimpulanEksplorasi");

    const normal = (teks) => {
        return teks
            .replace(/\s+/g, "")
            .replace(/₁/g, "1")
            .replace(/−/g, "-")
            .replace(/–/g, "-");
    };

    const vSubX1 = normal(subX1);
    const vC1 = normal(c1);
    const vC2 = normal(c2);
    const vSubC2 = normal(subC2);
    const vY1 = normal(y1Val);
    const vX1 = normal(x1Val);

    const benarSubX1 = vSubX1 === "x1";
    const benarC = vC1 === "y1" && (vC2 === "mx1" || vC2 === "m(x1)");
    const benarSubC2 = vSubC2 === "y1-mx1" || vSubC2 === "y1-m(x1)";
    const benarAkhir = vY1 === "y1" && vX1 === "x1";

    let pesan = [];

    if (!benarSubX1) {
        pesan.push(
            "Pada langkah substitusi, nilai pengganti untuk $x$ adalah $x_1$.",
        );
    }

    if (!benarC) {
        pesan.push(
            "Perhatikan kembali bentuk nilai $c$, yaitu $c = y_1 - mx_1$.",
        );
    }

    if (!benarSubC2) {
        pesan.push(
            "Nilai $c$ yang disubstitusikan kembali adalah $y_1 - mx_1$.",
        );
    }

    if (!benarAkhir) {
        pesan.push(
            "Pada bentuk akhir, ruas kiri berisi $y - y_1$ dan di dalam kurung tertulis $(x - x_1)$.",
        );
    }

    if (benarSubX1 && benarC && benarSubC2 && benarAkhir) {
        fb.innerHTML =
            "<span class='text-success fw-bold'>Bagus! Kamu berhasil menemukan bentuk persamaan garis.</span>";
        kesimpulan.classList.remove("d-none");
    } else {
        fb.innerHTML =
            "<span class='text-danger'>" + pesan.join("<br>") + "</span>";
        kesimpulan.classList.add("d-none");
    }

    if (window.renderMathInElement) {
        renderMathInElement(fb, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

// Contoh Soal
function normalizeInput(text) {
    return text
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/₁/g, "1")
        .replace(/−/g, "-")
        .replace(/–/g, "-");
}

function toggleSolusi(id) {
    const el = document.getElementById(id);
    el.classList.toggle("d-none");

    if (window.renderMathInElement) {
        renderMathInElement(el, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function cekContoh1() {
    const y1 = normalizeInput(document.getElementById("c1_y1").value);
    const m = normalizeInput(document.getElementById("c1_m").value);
    const x1 = normalizeInput(document.getElementById("c1_x1").value);
    const fb = document.getElementById("feedbackContoh1");

    const benarY1 = y1 === "-1";
    const benarM = m === "3";
    const benarX1 = x1 === "2";

    if (benarY1 && benarM && benarX1) {
        fb.innerHTML =
            "<span class='text-success fw-bold'>Benar. Sekarang perhatikan langkah penyelesaiannya.</span>";
    } else {
        let pesan = [];
        if (!benarY1) pesan.push("Nilai $y_1$ adalah $-1$.");
        if (!benarM) pesan.push("Nilai gradien $m$ adalah $3$.");
        if (!benarX1) pesan.push("Nilai $x_1$ adalah $2$.");
        fb.innerHTML =
            "<span class='text-danger'>" + pesan.join("<br>") + "</span>";
    }

    if (window.renderMathInElement) {
        renderMathInElement(fb, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function cekContoh2() {
    const m = normalizeInput(document.getElementById("c2_m").value);
    const fb = document.getElementById("feedbackContoh2");

    const benar =
        m === "-1/2" ||
        m === "-\\dfrac{1}{2}" ||
        m === "-\\frac{1}{2}" ||
        m === "-(1/2)";

    if (benar) {
        fb.innerHTML =
            "<span class='text-success fw-bold'>Benar. Lanjutkan dengan melihat penyelesaiannya.</span>";
    } else {
        fb.innerHTML =
            "<span class='text-danger'>Gradien yang digunakan adalah $-\\dfrac{1}{2}$.</span>";
    }

    if (window.renderMathInElement) {
        renderMathInElement(fb, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

// Latihan Soal
// No 1
function normalize(val) {
    return val
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .replace(/–/g, "-");
}

function cekLatihan1() {
    const x1 = normalize(document.getElementById("x1_1").value);
    const y1 = normalize(document.getElementById("y1_1").value);
    const m = normalize(document.getElementById("m_1").value);

    const sub_y1 = normalize(document.getElementById("sub_y1_1").value);
    const sub_m = normalize(document.getElementById("sub_m_1").value);
    const sub_x1 = normalize(document.getElementById("sub_x1_1").value);

    const h1 = normalize(document.getElementById("hasil1_1").value);
    const h2 = normalize(document.getElementById("hasil2_1").value);
    const h3 = normalize(document.getElementById("hasil3_1").value);

    const a1 = normalize(document.getElementById("akhir1_1").value);
    const a2 = normalize(document.getElementById("akhir2_1").value);

    const fb = document.getElementById("feedbackLatihan1");

    // cek langkah
    const benar1 = x1 === "3" && y1 === "-2" && m === "2";
    const benar2 = sub_y1 === "-2" && sub_m === "2" && sub_x1 === "3";
    const benar3 = h1 === "2" && h2 === "2" && h3 === "-6";
    const benar4 = a1 === "2" && a2 === "-8";

    if (benar1 && benar2 && benar3 && benar4) {
        fb.innerHTML =
            "<span class='text-success fw-bold'>Benar! Persamaan garisnya adalah y = 2x - 8</span>";
    } else {
        let pesan = [];

        if (!benar1) pesan.push("Periksa nilai x₁, y₁, dan m.");
        if (benar1 && !benar2) pesan.push("Perhatikan langkah substitusi.");
        if (benar2 && !benar3) pesan.push("Periksa hasil penyederhanaan.");
        if (benar3 && !benar4) pesan.push("Periksa jawaban akhir.");

        fb.innerHTML =
            "<span class='text-danger'>" + pesan.join("<br>") + "</span>";
    }
}

// No 2
function cekLatihan2() {
    const val = (id) => document.getElementById(id).value.trim().toLowerCase();
    const fb = document.getElementById("feedbackLatihan2");

    let pesan = [];

    // =====================
    // STEP 1: diketahui
    // =====================
    const x1 = val("l2_x1");
    const y1 = val("l2_y1");
    const m = val("l2_m");

    if (x1 !== "3" || y1 !== "-2") {
        pesan.push("💡 Hint: Ambil titik dari kalimat 'suhu -2 saat x = 3'.");
    }

    if (m !== "-2") {
        pesan.push("💡 Hint: Gradien adalah laju perubahan suhu.");
    }

    // =====================
    // STEP 2: substitusi
    // =====================
    const sub_y1 = val("l2_sub_y1");
    const sub_m = val("l2_sub_m");
    const sub_x1 = val("l2_sub_x1");

    if (x1 === "3" && y1 === "-2" && m === "-2") {
        if (sub_y1 !== "-2" || sub_m !== "-2" || sub_x1 !== "3") {
            pesan.push("💡 Hint: Substitusi ke rumus y - y₁ = m(x - x₁).");
        }
    }

    // =====================
    // STEP 3: bentuk persamaan
    // =====================
    const h1 = val("l2_h1");
    const h2 = val("l2_h2");

    if (sub_y1 === "-2" && sub_m === "-2" && sub_x1 === "3") {
        if (!(h1 === "-2" && (h2 === "+4" || h2 === "4"))) {
            pesan.push(
                "💡 Hint: Sederhanakan persamaan sampai bentuk y = mx + c.",
            );
        }
    }

    // =====================
    // STEP 4: substitusi x = -5
    // =====================
    const s1 = val("l2_s1");
    const s2 = val("l2_s2");
    const s3 = val("l2_s3");

    if (h1 === "-2") {
        if (s2 !== "-5") {
            pesan.push("Petunjuk : Nilai x yang diminta adalah -5.");
        }

        if (s1 !== "-2") {
            pesan.push("Petunjuk : Gunakan gradien sebagai koefisien x.");
        }
    }

    // =====================
    // STEP 5: hasil akhir
    // =====================
    const final = val("l2_final");

    if (final !== "14") {
        pesan.push("Petunjuk : Hitung -2 × (-5) + 4.");
    }

    // =====================
    // HASIL
    // =====================
    if (pesan.length === 0) {
        fb.innerHTML =
            "<span class='text-success fw-bold'>Benar! Kamu berhasil menemukan nilai y = 14</span>";
    } else {
        fb.innerHTML =
            "<span class='text-warning'>" + pesan.join("<br>") + "</span>";
    }
}

// No 3
function cekLatihan3() {
    const val = (id) => document.getElementById(id).value.trim().toLowerCase();
    const fb = document.getElementById("feedbackLatihan3");

    const benar =
        val("l3_x1") === "0" &&
        val("l3_y1") === "0" &&
        (val("l3_m") === "-3/5" || val("l3_m") === "-0.6") &&
        val("l3_sub_y1") === "0" &&
        val("l3_sub_x1") === "0" &&
        val("l3_h1") === "-3/5" &&
        val("l3_kiri") === "5" &&
        val("l3_kanan") === "-3" &&
        val("l3_final1") === "3" &&
        val("l3_final2") === "5";

    if (benar) {
        fb.innerHTML =
            "<span class='text-success fw-bold'>Benar! Persamaan garis: 3x + 5y = 0</span>";
    } else {
        fb.innerHTML =
            "<span class='text-warning'>Petunjuk : Ingat titik awal adalah (0,0) dan kalikan agar pecahan hilang.</span>";
    }
}
