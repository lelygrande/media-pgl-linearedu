function normJawaban(teks) {
    return String(teks).toLowerCase().replace(/\s+/g, "").trim();
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

// Latihan

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

    const boxKesimpulan = document.getElementById("kesimpulanLat1");

    if (hasil.every(Boolean)) {
        document.getElementById("feedbackLatihan1").innerHTML =
            `<span style="color:#15803d;">Bagus! Semua jawaban benar.</span>`;

        if (boxKesimpulan) {
            boxKesimpulan.style.display = "block";
        }
    } else {
        document.getElementById("feedbackLatihan1").innerHTML =
            `<span style="color:#b91c1c;">Masih ada yang salah.</span>`;

        if (boxKesimpulan) {
            boxKesimpulan.style.display = "none";
        }
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

    document.getElementById("feedbackLatihan1").innerHTML = "";

    const boxKesimpulan = document.getElementById("kesimpulanLat1");
    if (boxKesimpulan) {
        boxKesimpulan.style.display = "none";
    }
}

// Latihan 2
// Latihan 2
function cekTabel() {
    // cek input kosong
    if (
        document.getElementById("y1").value.trim() === "" ||
        document.getElementById("y2").value.trim() === "" ||
        document.getElementById("y3").value.trim() === "" ||
        document.getElementById("y4").value.trim() === ""
    ) {
        document.getElementById("feedbackTabel").innerHTML =
            `<span style="color:#b45309;">Isi semua nilai y dulu ya.</span>`;
        return;
    }

    const benar1 = cekIsian("y1", "-3");
    const benar2 = cekIsian("y2", "1");
    const benar3 = cekIsian("y3", "5");
    const benar4 = cekIsian("y4", "9");

    const y1 = document.getElementById("y1").value.trim();
    const y2 = document.getElementById("y2").value.trim();
    const y3 = document.getElementById("y3").value.trim();
    const y4 = document.getElementById("y4").value.trim();

    // update pasangan titik (x,y)
    document.getElementById("pair1").innerHTML = `$(-4, ${y1})$`;
    document.getElementById("pair2").innerHTML = `$(-2, ${y2})$`;
    document.getElementById("pair3").innerHTML = `$(0, ${y3})$`;
    document.getElementById("pair4").innerHTML = `$(2, ${y4})$`;

    if (window.renderMathInElement) {
        renderMathInElement(document.getElementById("latihan-garis"), {
            delimiters: [
                {
                    left: "$$",
                    right: "$$",
                    display: true,
                },
                {
                    left: "$",
                    right: "$",
                    display: false,
                },
            ],
        });
    }

    const ok = benar1 && benar2 && benar3 && benar4;

    if (ok) {
        // kirim data titik target dari tabel ke p5
        window.tablePairs = [
            {
                label: "A",
                x: -4,
                y: Number(y1),
            },
            {
                label: "B",
                x: -2,
                y: Number(y2),
            },
            {
                label: "C",
                x: 0,
                y: Number(y3),
            },
            {
                label: "D",
                x: 2,
                y: Number(y4),
            },
        ];

        if (window.loadTargetsFromTable) {
            window.loadTargetsFromTable(window.tablePairs);
        }

        document.getElementById("feedbackTabel").innerHTML =
            `<span style="color:#15803d;">Tabel benar! Sekarang seret titik A–D pada grafik.</span>`;

        document.getElementById("grafikSection").style.display = "block";

        // kesimpulan disembunyikan dulu
        const boxKesimpulan = document.getElementById("kesimpulanLat2");
        if (boxKesimpulan) {
            boxKesimpulan.style.display = "none";
        }

        if (window.resetPointsToStart) window.resetPointsToStart();
    } else {
        document.getElementById("feedbackTabel").innerHTML =
            `<span style="color:#b91c1c;">Masih ada yang salah. Coba cek lagi pakai y = 2x + 5.</span>`;
        document.getElementById("grafikSection").style.display = "none";

        const boxKesimpulan = document.getElementById("kesimpulanLat2");
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

    document.getElementById("pair1").innerHTML = "$(-4, …)$";
    document.getElementById("pair2").innerHTML = "$(-2, …)$";
    document.getElementById("pair3").innerHTML = "$(0, …)$";
    document.getElementById("pair4").innerHTML = "$(2, …)$";

    document.getElementById("feedbackTabel").innerHTML = "";
    document.getElementById("feedbackGrafik").innerHTML = "";
    document.getElementById("grafikSection").style.display = "none";

    const boxKesimpulan = document.getElementById("kesimpulanLat2");
    if (boxKesimpulan) {
        boxKesimpulan.style.display = "none";
    }

    if (window.resetPointsToStart) window.resetPointsToStart();
}
