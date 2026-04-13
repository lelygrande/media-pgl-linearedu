// Eksplorasi
function normEksplorasi(teks) {
    return (teks || "").toString().trim().toLowerCase().replace(/\s+/g, "");
}

function cekIsianEksplorasi(id, jawabanBenar) {
    const el = document.getElementById(id);
    if (!el) return false;

    const nilai = normEksplorasi(el.value);
    const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
    const cocok = daftar.map(normEksplorasi).includes(nilai);

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(cocok ? "is-valid" : "is-invalid");

    return cocok;
}

function cekEksplorasiSejajar() {
    const benar1 = cekIsianEksplorasi("eks_sejajar1", ["mq", "m_q"]);
    const benar2 = cekIsianEksplorasi("eks_sejajar2", ["m"]);
    const benar3 = cekIsianEksplorasi("eks_sejajar3", ["y1", "y_1"]);
    const benar4 = cekIsianEksplorasi("eks_sejajar4", ["m"]);
    const benar5 = cekIsianEksplorasi("eks_sejajar5", ["x1", "x_1"]);

    const feedback = document.getElementById("feedbackEksplorasiSejajar");
    const kesimpulan = document.getElementById("kesimpulanEksplorasiSejajar");

    if (benar1 && benar2 && benar3 && benar4 && benar5) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, kamu sudah menemukan bahwa garis sejajar memiliki gradien yang sama, sehingga persamaan garisnya dapat disusun dengan bentuk titik-gradien.</div>';
        kesimpulan.classList.remove("d-none");
    } else {
        feedback.innerHTML =
            '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba perhatikan lagi hubungan gradien dua garis yang sejajar.</div>';
        kesimpulan.classList.add("d-none");
    }
}

// Contoh
function normContohSejajar(teks) {
    return (teks || "")
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[()]/g, "");
}

function cekIsianContohSejajar(id, jawabanBenar) {
    const el = document.getElementById(id);
    if (!el) return false;

    const nilai = normContohSejajar(el.value);
    const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
    const cocok = daftar.map(normContohSejajar).includes(nilai);

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(cocok ? "is-valid" : "is-invalid");

    return cocok;
}

function tampilkanPetunjukContohSoalSejajar(pesan) {
    document.getElementById("petunjukContohSoalSejajar").innerHTML =
        '<div class="alert alert-info py-2 mb-0">' + pesan + "</div>";
}

function cekContohSoalSejajar() {
    const benarM1 = cekIsianContohSejajar("cs_sejajar_m1", ["2"]);
    const benarM2 = cekIsianContohSejajar("cs_sejajar_m2", ["2"]);
    const benarY1 = cekIsianContohSejajar("cs_sejajar_y1", ["3"]);
    const benarM3 = cekIsianContohSejajar("cs_sejajar_m3", ["2"]);
    const benarX1 = cekIsianContohSejajar("cs_sejajar_x1", ["2"]);
    const benarAkhir = cekIsianContohSejajar("cs_sejajar_akhir", [
        "2x-1",
        "2x - 1",
    ]);

    const semuaBenar =
        benarM1 && benarM2 && benarY1 && benarM3 && benarX1 && benarAkhir;

    const feedback = document.getElementById("feedbackContohSoalSejajar");
    const petunjuk = document.getElementById("petunjukContohSoalSejajar");
    const pembahasan = document.getElementById("pembahasanContohSoalSejajar");

    if (semuaBenar) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, langkah-langkahmu sudah benar.</div>';
        petunjuk.innerHTML = "";
        pembahasan.classList.remove("d-none");
        return;
    }

    feedback.innerHTML =
        '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa lagi.</div>';
    pembahasan.classList.add("d-none");

    if (!benarM1 || !benarM2) {
        tampilkanPetunjukContohSoalSejajar(
            "Petunjuk: gradien garis y = mx + c adalah koefisien x.",
        );
        return;
    }

    if (!benarY1 || !benarM3 || !benarX1) {
        tampilkanPetunjukContohSoalSejajar(
            "Petunjuk: gunakan titik (2,3) dan gradien 2 ke bentuk y - y1 = m(x - x1).",
        );
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjukContohSoalSejajar(
            "Petunjuk: sederhanakan y - 3 = 2(x - 2).",
        );
    }
}

// Latihan
function pindahLatihan(index) {
    const track = document.getElementById("latihanTrack");
    if (!track) return;
    track.style.transform = `translateX(-${index * 100}%)`;
}

function normLatihanSejajar(teks) {
    return (teks || "")
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[()]/g, "");
}

function cekIsianLatihanSejajar(id, jawabanBenar) {
    const el = document.getElementById(id);
    if (!el) return false;

    const nilai = normLatihanSejajar(el.value);
    const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
    const cocok = daftar.map(normLatihanSejajar).includes(nilai);

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(cocok ? "is-valid" : "is-invalid");

    return cocok;
}

function tampilkanPetunjukLatihan1(pesan) {
    const el = document.getElementById("petunjukLatihan1");
    if (el) {
        el.innerHTML =
            '<div class="alert alert-info py-2 mb-0">' + pesan + "</div>";
    }
}

function tampilkanPetunjukLatihan2(pesan) {
    const el = document.getElementById("petunjukLatihan2");
    if (el) {
        el.innerHTML =
            '<div class="alert alert-info py-2 mb-0">' + pesan + "</div>";
    }
}

function cekLatihan1Sejajar() {
    const benarX1 = cekIsianLatihanSejajar("lat1_x1", ["4"]);
    const benarY1 = cekIsianLatihanSejajar("lat1_y1", ["1"]);
    const benarM = cekIsianLatihanSejajar("lat1_m", ["2"]);

    const benarSubY1 = cekIsianLatihanSejajar("lat1_sub_y1", ["1"]);
    const benarSubM = cekIsianLatihanSejajar("lat1_sub_m", ["2"]);
    const benarSubX1 = cekIsianLatihanSejajar("lat1_sub_x1", ["4"]);

    const benarAkhir = cekIsianLatihanSejajar("lat1_akhir", ["2x-7", "2x - 7"]);

    const benarUmum = cekIsianLatihanSejajar("lat1_umum", [
        "2x-y-7",
        "2x - y - 7",
        "-2x+y+7",
    ]);

    const semuaBenar =
        benarX1 &&
        benarY1 &&
        benarM &&
        benarSubY1 &&
        benarSubM &&
        benarSubX1 &&
        benarAkhir &&
        benarUmum;

    const feedback = document.getElementById("feedbackLatihan1");
    const petunjuk = document.getElementById("petunjukLatihan1");

    if (semuaBenar) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, jawabanmu sudah benar. Lanjut ke soal berikutnya.</div>';
        if (petunjuk) petunjuk.innerHTML = "";

        setTimeout(() => {
            pindahLatihan(1);
        }, 700);
        return;
    }

    feedback.innerHTML =
        '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.</div>';

    if (!benarX1 || !benarY1) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: baca titik A(4,1), lalu tentukan x₁ dan y₁.",
        );
        return;
    }

    if (!benarM) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: karena garis sejajar, gradien garis yang dicari sama dengan gradien yang diketahui.",
        );
        return;
    }

    if (!benarSubY1 || !benarSubM || !benarSubX1) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: masukkan titik (4,1) dan gradien 2 ke bentuk y - y₁ = m(x - x₁).",
        );
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjukLatihan1("Petunjuk: sederhanakan y - 1 = 2(x - 4).");
        return;
    }

    if (!benarUmum) {
        tampilkanPetunjukLatihan1(
            "Petunjuk: ubah y = 2x - 7 ke bentuk umum ax + by + c = 0.",
        );
    }
}

function cekLatihan2Sejajar() {
    const benarMAtas1 = cekIsianLatihanSejajar("lat2_m_atas1", ["1"]);
    const benarMAtas2 = cekIsianLatihanSejajar("lat2_m_atas2", ["4"]);
    const benarMBawah1 = cekIsianLatihanSejajar("lat2_m_bawah1", ["5"]);
    const benarMBawah2 = cekIsianLatihanSejajar("lat2_m_bawah2", ["3"]);

    const benarMSederhanaAtas = cekIsianLatihanSejajar(
        "lat2_m_sederhana_atas",
        ["-3", "3"],
    );
    const benarMSederhanaBawah = cekIsianLatihanSejajar(
        "lat2_m_sederhana_bawah",
        ["2", "-2"],
    );

    const benarSubY1 = cekIsianLatihanSejajar("lat2_sub_y1", ["6"]);
    const benarSubMAtas = cekIsianLatihanSejajar("lat2_sub_m_atas", [
        "-3",
        "3",
    ]);
    const benarSubMBawah = cekIsianLatihanSejajar("lat2_sub_m_bawah", [
        "2",
        "-2",
    ]);
    const benarSubX1 = cekIsianLatihanSejajar("lat2_sub_x1", ["4"]);

    const benarAkhir = cekIsianLatihanSejajar("lat2_akhir", [
        "-3/2x+12",
        "-3/2x + 12",
        "-3x-2y+24",
        "-1.5x+12",
        "-1.5x + 12",
    ]);

    const benarUmum = cekIsianLatihanSejajar("lat2_umum", [
        "3x+2y-24",
        "3x + 2y - 24",
        "-3/2x-y+12",
    ]);

    const semuaBenar =
        benarMAtas1 &&
        benarMAtas2 &&
        benarMBawah1 &&
        benarMBawah2 &&
        benarMSederhanaAtas &&
        benarMSederhanaBawah &&
        benarSubY1 &&
        benarSubMAtas &&
        benarSubMBawah &&
        benarSubX1 &&
        benarAkhir &&
        benarUmum;

    const feedback = document.getElementById("feedbackLatihan2");
    const petunjuk = document.getElementById("petunjukLatihan2");

    if (semuaBenar) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, jawabanmu sudah benar. Kamu sudah menyelesaikan semua latihan.</div>';
        if (petunjuk) petunjuk.innerHTML = "";
        return;
    }

    feedback.innerHTML =
        '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.</div>';

    if (!benarMAtas1 || !benarMAtas2 || !benarMBawah1 || !benarMBawah2) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: gunakan rumus gradien dari dua titik, yaitu selisih y dibagi selisih x.",
        );
        return;
    }

    if (!benarMSederhanaAtas || !benarMSederhanaBawah) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: sederhanakan 1 - 4 dan 5 - 3 terlebih dahulu.",
        );
        return;
    }

    if (!benarSubY1 || !benarSubMAtas || !benarSubMBawah || !benarSubX1) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: gunakan titik (4,6) dan gradien yang sama karena kedua garis sejajar.",
        );
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: sederhanakan y - 6 = -3/2 (x - 4).",
        );
        return;
    }

    if (!benarUmum) {
        tampilkanPetunjukLatihan2(
            "Petunjuk: hilangkan dulu pecahan pada y = -3/2 x + 12 dengan mengalikan semua ruas dengan 2, lalu pindahkan semua suku ke satu ruas hingga berbentuk ax + by + c = 0.",
        );
    }
}
