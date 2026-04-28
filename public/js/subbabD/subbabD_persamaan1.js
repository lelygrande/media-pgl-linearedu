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

// =========================
// LATIHAN SOAL SUBBAB D
// =========================

// =========================
// HELPER
// =========================
function normalize(val) {
    return String(val || "")
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/−/g, "-")
        .replace(/–/g, "-")
        .replace(/₁/g, "1");
}

function renderMathSafe(target) {
    if (!window.renderMathInElement || !target) return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "$", right: "$", display: false },
            { left: "\\(", right: "\\)", display: false },
            { left: "\\[", right: "\\]", display: true },
        ],
        throwOnError: false,
    });
}

document.addEventListener("DOMContentLoaded", function () {
    renderMathSafe(document.body);
});

// =========================
// NAVIGASI LATIHAN
// =========================
function scrollKeLatihan(idLatihan) {
    const content = document.querySelector(".content-wrapper");
    const target = document.getElementById(idLatihan);

    if (!target) return;

    if (!content) {
        target.scrollIntoView({
            behavior: "smooth",
            block: "start",
        });
        return;
    }

    const contentRect = content.getBoundingClientRect();
    const targetRect = target.getBoundingClientRect();

    const targetTop = content.scrollTop + (targetRect.top - contentRect.top) - 20;

    content.scrollTo({
        top: targetTop,
        behavior: "smooth",
    });
}

function nextLatihan(stepNumber) {
    const target = document.getElementById(`latihan${stepNumber}`);
    if (!target) return;

    target.classList.remove("d-none");
    renderMathSafe(target);
    scrollKeLatihan(`latihan${stepNumber}`);
}

function prevLatihan(stepNumber) {
    scrollKeLatihan(`latihan${stepNumber}`);
}

function resetStepSetelah(stepMulai) {
    for (let i = stepMulai; i <= 3; i++) {
        const target = document.getElementById(`latihan${i}`);
        if (target) target.classList.add("d-none");
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
// VALIDASI UMUM
// =========================
function setValid(id, benar) {
    const el = document.getElementById(id);
    if (!el) return;

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(benar ? "is-valid" : "is-invalid");
}

function resetInput(ids) {
    ids.forEach((id) => {
        const el = document.getElementById(id);

        if (el) {
            el.value = "";
            el.classList.remove("is-valid", "is-invalid");
        }
    });
}

function isiFeedback(id, tipe, pesan) {
    const el = document.getElementById(id);
    if (!el) return;

    const kelas = tipe === "success" ? "alert-success" : "alert-warning";

    el.innerHTML = `
        <div class="alert ${kelas} mb-0">
            ${pesan}
        </div>
    `;

    renderMathSafe(el);
}

// =========================
// LATIHAN 1
// =========================
function cekLatihan1() {
    const x1 = normalize(document.getElementById("x1_1")?.value);
    const y1 = normalize(document.getElementById("y1_1")?.value);
    const m = normalize(document.getElementById("m_1")?.value);

    const subY1 = normalize(document.getElementById("sub_y1_1")?.value);
    const subM = normalize(document.getElementById("sub_m_1")?.value);
    const subX1 = normalize(document.getElementById("sub_x1_1")?.value);

    const h1 = normalize(document.getElementById("hasil1_1")?.value);
    const h2 = normalize(document.getElementById("hasil2_1")?.value);
    const h3 = normalize(document.getElementById("hasil3_1")?.value);

    const a1 = normalize(document.getElementById("akhir1_1")?.value);
    const a2 = normalize(document.getElementById("akhir2_1")?.value);

    const benarX1 = x1 === "3";
    const benarY1 = y1 === "-2";
    const benarM = m === "2";

    const benarSubY1 = subY1 === "-2";
    const benarSubM = subM === "2";
    const benarSubX1 = subX1 === "3";

    const benarH1 = h1 === "2";
    const benarH2 = h2 === "2";
    const benarH3 = h3 === "-6";

    const benarA1 = a1 === "2";
    const benarA2 = a2 === "-8";

    [
        ["x1_1", benarX1],
        ["y1_1", benarY1],
        ["m_1", benarM],
        ["sub_y1_1", benarSubY1],
        ["sub_m_1", benarSubM],
        ["sub_x1_1", benarSubX1],
        ["hasil1_1", benarH1],
        ["hasil2_1", benarH2],
        ["hasil3_1", benarH3],
        ["akhir1_1", benarA1],
        ["akhir2_1", benarA2],
    ].forEach(([id, benar]) => setValid(id, benar));

    const semuaBenar =
        benarX1 &&
        benarY1 &&
        benarM &&
        benarSubY1 &&
        benarSubM &&
        benarSubX1 &&
        benarH1 &&
        benarH2 &&
        benarH3 &&
        benarA1 &&
        benarA2;

    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (semuaBenar) {
        isiFeedback(
            "feedbackLatihan1",
            "success",
            "Benar! Persamaan garisnya adalah $y = 2x - 8$. Silakan lanjut ke latihan berikutnya."
        );

        if (nextBtn) nextBtn.disabled = false;
    } else {
        let pesan = [];

        if (!benarX1 || !benarY1 || !benarM) {
            pesan.push("Periksa nilai $x_1$, $y_1$, dan $m$.");
        }

        if (benarX1 && benarY1 && benarM && (!benarSubY1 || !benarSubM || !benarSubX1)) {
            pesan.push("Perhatikan langkah substitusi ke rumus $y-y_1=m(x-x_1)$.");
        }

        if (benarSubY1 && benarSubM && benarSubX1 && (!benarH1 || !benarH2 || !benarH3)) {
            pesan.push("Periksa hasil penyederhanaan.");
        }

        if (benarH1 && benarH2 && benarH3 && (!benarA1 || !benarA2)) {
            pesan.push("Periksa jawaban akhir.");
        }

        isiFeedback(
            "feedbackLatihan1",
            "warning",
            pesan.join("<br>") || "Masih ada jawaban yang belum tepat."
        );

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(2);
    }
}

function resetLatihan1() {
    resetInput([
        "x1_1",
        "y1_1",
        "m_1",
        "sub_y1_1",
        "sub_m_1",
        "sub_x1_1",
        "hasil1_1",
        "hasil2_1",
        "hasil3_1",
        "akhir1_1",
        "akhir2_1",
    ]);

    const fb = document.getElementById("feedbackLatihan1");
    const nextBtn = document.getElementById("nextBtnLatihan1");

    if (fb) fb.innerHTML = "";
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(2);
}

// =========================
// LATIHAN 2
// =========================
function cekLatihan2() {
    const val = (id) => normalize(document.getElementById(id)?.value);

    const x1 = val("l2_x1");
    const y1 = val("l2_y1");
    const m = val("l2_m");

    const subY1 = val("l2_sub_y1");
    const subM = val("l2_sub_m");
    const subX1 = val("l2_sub_x1");

    const h1 = val("l2_h1");
    const h2 = val("l2_h2");

    const s1 = val("l2_s1");
    const s2 = val("l2_s2");
    const s3 = val("l2_s3");

    const final = val("l2_final");

    const benarX1 = x1 === "3";
    const benarY1 = y1 === "-2";
    const benarM = m === "-2";

    const benarSubY1 = subY1 === "-2";
    const benarSubM = subM === "-2";
    const benarSubX1 = subX1 === "3";

    const benarH1 = h1 === "-2";
    const benarH2 = h2 === "+4" || h2 === "4";

    const benarS1 = s1 === "-2";
    const benarS2 = s2 === "-5";
    const benarS3 = s3 === "+4" || s3 === "4";

    const benarFinal = final === "14";

    [
        ["l2_x1", benarX1],
        ["l2_y1", benarY1],
        ["l2_m", benarM],
        ["l2_sub_y1", benarSubY1],
        ["l2_sub_m", benarSubM],
        ["l2_sub_x1", benarSubX1],
        ["l2_h1", benarH1],
        ["l2_h2", benarH2],
        ["l2_s1", benarS1],
        ["l2_s2", benarS2],
        ["l2_s3", benarS3],
        ["l2_final", benarFinal],
    ].forEach(([id, benar]) => setValid(id, benar));

    const semuaBenar =
        benarX1 &&
        benarY1 &&
        benarM &&
        benarSubY1 &&
        benarSubM &&
        benarSubX1 &&
        benarH1 &&
        benarH2 &&
        benarS1 &&
        benarS2 &&
        benarS3 &&
        benarFinal;

    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (semuaBenar) {
        isiFeedback(
            "feedbackLatihan2",
            "success",
            "Benar! Persamaan suhu adalah $y = -2x + 4$, sehingga saat $x=-5$, diperoleh $y=14$. Silakan lanjut ke latihan berikutnya."
        );

        if (nextBtn) nextBtn.disabled = false;
    } else {
        let pesan = [];

        if (!benarX1 || !benarY1) {
            pesan.push("Ambil titik dari informasi suhu $-2$ ketika $x=3$.");
        }

        if (!benarM) {
            pesan.push("Gradien adalah laju perubahan suhu.");
        }

        if (benarX1 && benarY1 && benarM && (!benarSubY1 || !benarSubM || !benarSubX1)) {
            pesan.push("Substitusikan ke rumus $y-y_1=m(x-x_1)$.");
        }

        if (benarSubY1 && benarSubM && benarSubX1 && (!benarH1 || !benarH2)) {
            pesan.push("Sederhanakan sampai bentuk $y = mx + c$.");
        }

        if (benarH1 && benarH2 && (!benarS1 || !benarS2 || !benarS3)) {
            pesan.push("Substitusikan $x=-5$ ke persamaan yang sudah diperoleh.");
        }

        if (!benarFinal) {
            pesan.push("Hitung kembali $-2 \\times (-5) + 4$.");
        }

        isiFeedback(
            "feedbackLatihan2",
            "warning",
            pesan.join("<br>") || "Masih ada jawaban yang belum tepat."
        );

        if (nextBtn) nextBtn.disabled = true;
        resetStepSetelah(3);
    }
}

function resetLatihan2() {
    resetInput([
        "l2_x1",
        "l2_y1",
        "l2_m",
        "l2_sub_y1",
        "l2_sub_m",
        "l2_sub_x1",
        "l2_h1",
        "l2_h2",
        "l2_s1",
        "l2_s2",
        "l2_s3",
        "l2_final",
    ]);

    const fb = document.getElementById("feedbackLatihan2");
    const nextBtn = document.getElementById("nextBtnLatihan2");

    if (fb) fb.innerHTML = "";
    if (nextBtn) nextBtn.disabled = true;

    resetStepSetelah(3);
}

// =========================
// LATIHAN 3
// =========================
async function cekLatihan3() {
    const val = (id) => normalize(document.getElementById(id)?.value);

    const benarX1 = val("l3_x1") === "0";
    const benarY1 = val("l3_y1") === "0";
    const benarM = val("l3_m") === "-3/5" || val("l3_m") === "-0.6";

    const benarSubY1 = val("l3_sub_y1") === "0";
    const benarSubM = val("l3_sub_m") === "-3/5" || val("l3_sub_m") === "-0.6";
    const benarSubX1 = val("l3_sub_x1") === "0";

    const benarH1 = val("l3_h1") === "-3/5" || val("l3_h1") === "-0.6";

    const benarKiri = val("l3_kiri") === "5";
    const benarKanan = val("l3_kanan") === "-3";

    const benarFinal1 = val("l3_final1") === "3";
    const benarFinal2 = val("l3_final2") === "5";

    [
        ["l3_x1", benarX1],
        ["l3_y1", benarY1],
        ["l3_m", benarM],
        ["l3_sub_y1", benarSubY1],
        ["l3_sub_m", benarSubM],
        ["l3_sub_x1", benarSubX1],
        ["l3_h1", benarH1],
        ["l3_kiri", benarKiri],
        ["l3_kanan", benarKanan],
        ["l3_final1", benarFinal1],
        ["l3_final2", benarFinal2],
    ].forEach(([id, benar]) => setValid(id, benar));

    const semuaBenar =
        benarX1 &&
        benarY1 &&
        benarM &&
        benarSubY1 &&
        benarSubM &&
        benarSubX1 &&
        benarH1 &&
        benarKiri &&
        benarKanan &&
        benarFinal1 &&
        benarFinal2;

    const fb = document.getElementById("feedbackLatihan3");

    if (semuaBenar) {
        fb.innerHTML = `
            <div class="alert alert-success mb-0">
                Hebat, semua latihan sudah selesai. Persamaan garisnya adalah $3x + 5y = 0$.
                Silakan lanjut ke materi berikutnya.
            </div>
        `;

        renderMathSafe(fb);

        const saved = await saveProgressMateri();

        if (saved) {
            bukaNextButton();
        } else {
            fb.innerHTML += `
                <div class="alert alert-warning mt-2 mb-0">
                    Jawaban benar, tetapi progres belum tersimpan. Coba cek koneksi atau refresh halaman.
                </div>
            `;
        }
    } else {
        fb.innerHTML = `
            <div class="alert alert-warning mb-0">
                Hint: Titik awal koordinat adalah $(0,0)$, lalu hilangkan pecahan dengan mengalikan 5.
            </div>
        `;

        renderMathSafe(fb);
    }
}

function resetLatihan3() {
    resetInput([
        "l3_x1",
        "l3_y1",
        "l3_m",
        "l3_sub_y1",
        "l3_sub_m",
        "l3_sub_x1",
        "l3_h1",
        "l3_kiri",
        "l3_kanan",
        "l3_final1",
        "l3_final2",
    ]);

    const fb = document.getElementById("feedbackLatihan3");
    if (fb) fb.innerHTML = "";
}
