// Eksplorasi
function normalisasi(teks) {
    return (teks || "").toLowerCase().replace(/\s+/g, "").replace(/[()]/g, "");
}

function cekInput(id, daftarJawaban) {
    const input = document.getElementById(id);
    const nilai = normalisasi(input.value);
    const benar = daftarJawaban.some((j) => normalisasi(j) === nilai);

    input.classList.remove("is-valid", "is-invalid");
    input.classList.add(benar ? "is-valid" : "is-invalid");

    return benar;
}

function cekEksplorasiDuaTitik() {
    let semuaBenar = true;

    const kunci = {
        m_atas1: ["y2", "y_2"],
        m_atas2: ["y1", "y_1"],
        m_bawah1: ["x2", "x_2"],
        m_bawah2: ["x1", "x_1"],

        sub_atas1: ["y2", "y_2"],
        sub_atas2: ["y1", "y_1"],
        sub_bawah1: ["x2", "x_2"],
        sub_bawah2: ["x1", "x_1"],

        akhir1: ["y2", "y_2"],
        akhir2: ["y1", "y_1"],
        akhir3: ["x2", "x_2"],
        akhir4: ["x1", "x_1"],
    };

    Object.keys(kunci).forEach(function (id) {
        const benar = cekInput(id, kunci[id]);
        if (!benar) semuaBenar = false;
    });

    const feedback = document.getElementById("feedbackEksplorasiDuaTitik");
    const kesimpulan = document.getElementById("kesimpulanEksplorasiDuaTitik");

    if (semuaBenar) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, semua jawabanmu benar. Sekarang kamu sudah menemukan bentuk persamaan garis melalui dua titik.</div>';
        kesimpulan.classList.remove("d-none");
    } else {
        feedback.innerHTML =
            '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa lagi bentuk gradien, hasil substitusi, dan bentuk akhirnya.</div>';
        kesimpulan.classList.add("d-none");
    }
}

// Contoh Soal
function normContoh(teks) {
    return (teks || "")
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[()]/g, "");
}

function cekIsianContoh(id, jawabanBenar) {
    const el = document.getElementById(id);
    if (!el) return false;

    const nilai = normContoh(el.value);
    const daftar = Array.isArray(jawabanBenar) ? jawabanBenar : [jawabanBenar];
    const cocok = daftar.map(normContoh).includes(nilai);

    el.classList.remove("is-valid", "is-invalid");
    el.classList.add(cocok ? "is-valid" : "is-invalid");

    return cocok;
}

function tampilkanPetunjukContoh1(pesan) {
    document.getElementById("petunjukContohSoal1").innerHTML =
        '<div class="alert alert-info py-2 mb-0">' + pesan + "</div>";
}

function cekContohSoal1() {
    const benarSederhana1 = cekIsianContoh("cs_sd_1", "8");
    const benarSederhana2 = cekIsianContoh("cs_sd_2", "4");

    const benarKali1 = cekIsianContoh("cs_ks_1", "4");
    const benarKali2 = cekIsianContoh("cs_ks_2", "8");

    const benarUrai1 = cekIsianContoh("cs_urai_1", "4");
    const benarUrai2 = cekIsianContoh("cs_urai_2", "-12");
    const benarUrai3 = cekIsianContoh("cs_urai_3", "8");
    const benarUrai4 = cekIsianContoh("cs_urai_4", "-8");

    const benarPindah1 = cekIsianContoh("cs_pindah_1", "4");
    const benarPindah2 = cekIsianContoh("cs_pindah_2", "8");
    const benarPindah3 = cekIsianContoh("cs_pindah_3", ["+4", "4"]);

    const benarAkhir1 = cekIsianContoh("cs_akhir_1", "2");
    const benarAkhir2 = cekIsianContoh("cs_akhir_2", "1");

    const semuaBenar =
        benarSederhana1 &&
        benarSederhana2 &&
        benarKali1 &&
        benarKali2 &&
        benarUrai1 &&
        benarUrai2 &&
        benarUrai3 &&
        benarUrai4 &&
        benarPindah1 &&
        benarPindah2 &&
        benarPindah3 &&
        benarAkhir1 &&
        benarAkhir2;

    const feedback = document.getElementById("feedbackContohSoal1");
    const pembahasan = document.getElementById("pembahasanContohSoal1");
    const petunjuk = document.getElementById("petunjukContohSoal1");

    if (semuaBenar) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, langkah-langkah penyelesaianmu sudah benar.</div>';
        petunjuk.innerHTML = "";
        pembahasan.classList.remove("d-none");
        return;
    }

    feedback.innerHTML =
        '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa lagi langkah-langkahnya.</div>';
    pembahasan.classList.add("d-none");

    if (!benarSederhana1 || !benarSederhana2) {
        tampilkanPetunjukContoh1("Petunjuk: hitung dulu 11 - 3 dan 5 - 1.");
        return;
    }

    if (!benarKali1 || !benarKali2) {
        tampilkanPetunjukContoh1(
            "Petunjuk: lakukan kali silang. Penyebut kanan dikalikan ke pembilang kiri, dan penyebut kiri dikalikan ke pembilang kanan.",
        );
        return;
    }

    if (!benarUrai1 || !benarUrai2 || !benarUrai3 || !benarUrai4) {
        tampilkanPetunjukContoh1(
            "Petunjuk: uraikan 4(y - 3) dan 8(x - 1) dengan sifat distributif.",
        );
        return;
    }

    if (!benarPindah1 || !benarPindah2 || !benarPindah3) {
        tampilkanPetunjukContoh1(
            "Petunjuk: pindahkan -12 ke ruas kanan dengan menambahkan 12 pada kedua ruas.",
        );
        return;
    }

    if (!benarAkhir1 || !benarAkhir2) {
        tampilkanPetunjukContoh1(
            "Petunjuk: dari 4y = 8x + 4, bagi semua suku dengan 4.",
        );
        return;
    }
}

// =========================
// Helper umum
// =========================
function normJawaban(teks) {
    return (teks || "")
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "")
        .replace(/[()]/g, "");
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

function tampilkanPetunjuk(idElemen, pesan) {
    const el = document.getElementById(idElemen);
    if (!el) return;
    el.innerHTML =
        '<div class="alert alert-info py-2 mb-0">' + pesan + "</div>";
}

function pindahLatihan(index) {
    const track = document.getElementById("latihanTrack");
    if (!track) return;
    track.style.transform = `translateX(-${index * 100}%)`;
}

// =========================
// Latihan 1
// =========================
function cekLatihan1() {
    const benarTitik1x = cekIsian("lat_x1", ["1"]);
    const benarTitik1y = cekIsian("lat_y1", ["4"]);
    const benarTitik2x = cekIsian("lat_x2", ["4"]);
    const benarTitik2y = cekIsian("lat_y2", ["10"]);

    const benarRumus1 = cekIsian("lat_rumus1", ["y1", "y_1"]);
    const benarRumus2 = cekIsian("lat_rumus2", ["y2", "y_2"]);
    const benarRumus3 = cekIsian("lat_rumus3", ["y1", "y_1"]);
    const benarRumus4 = cekIsian("lat_rumus4", ["x1", "x_1"]);
    const benarRumus5 = cekIsian("lat_rumus5", ["x2", "x_2"]);
    const benarRumus6 = cekIsian("lat_rumus6", ["x1", "x_1"]);

    const benarSub1 = cekIsian("lat_sub1", ["4"]);
    const benarSub2 = cekIsian("lat_sub2", ["10"]);
    const benarSub3 = cekIsian("lat_sub3", ["4"]);
    const benarSub4 = cekIsian("lat_sub4", ["1"]);
    const benarSub5 = cekIsian("lat_sub5", ["4"]);
    const benarSub6 = cekIsian("lat_sub6", ["1"]);

    const benarKali1 = cekIsian("lat_kali1", ["3"]);
    const benarKali2 = cekIsian("lat_kali2", ["4"]);
    const benarKali3 = cekIsian("lat_kali3", ["6"]);
    const benarKali4 = cekIsian("lat_kali4", ["1"]);

    const benarAkhir = cekIsian("lat_akhir", ["2x+2", "2x + 2"]);

    const semuaBenar =
        benarTitik1x &&
        benarTitik1y &&
        benarTitik2x &&
        benarTitik2y &&
        benarRumus1 &&
        benarRumus2 &&
        benarRumus3 &&
        benarRumus4 &&
        benarRumus5 &&
        benarRumus6 &&
        benarSub1 &&
        benarSub2 &&
        benarSub3 &&
        benarSub4 &&
        benarSub5 &&
        benarSub6 &&
        benarKali1 &&
        benarKali2 &&
        benarKali3 &&
        benarKali4 &&
        benarAkhir;

    const feedback = document.getElementById("feedbackLatihan1");
    const petunjukId = "petunjukLatihan1";

    if (semuaBenar) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, jawabanmu sudah benar. Lanjut ke soal berikutnya.</div>';
        document.getElementById(petunjukId).innerHTML = "";

        setTimeout(() => {
            pindahLatihan(1);
        }, 700);
        return;
    }

    feedback.innerHTML =
        '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.</div>';

    if (!benarTitik1x || !benarTitik1y || !benarTitik2x || !benarTitik2y) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: hari pertama berarti x = 1. Setelah 3 hari dari hari pertama berarti hari ke-4.",
        );
        return;
    }

    if (
        !benarRumus1 ||
        !benarRumus2 ||
        !benarRumus3 ||
        !benarRumus4 ||
        !benarRumus5 ||
        !benarRumus6
    ) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: tuliskan rumus persamaan garis lurus melalui dua titik yang diperoleh pada bagian eksplorasi.",
        );
        return;
    }

    if (
        !benarSub1 ||
        !benarSub2 ||
        !benarSub3 ||
        !benarSub4 ||
        !benarSub5 ||
        !benarSub6
    ) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: gunakan titik (1,4) dan (4,10) untuk menggantikan x1, y1, x2, dan y2.",
        );
        return;
    }

    if (!benarKali1 || !benarKali2 || !benarKali3 || !benarKali4) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: sederhanakan dulu 10 - 4 dan 4 - 1, lalu lakukan kali silang.",
        );
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: dari 3(y - 4) = 6(x - 1), uraikan lalu sederhanakan ke bentuk y = mx + c.",
        );
    }
}

// =========================
// Latihan 2
// =========================
function cekLatihan2() {
    const benarSub1 = cekIsian("lat2_sub1", ["5"]);
    const benarSub2 = cekIsian("lat2_sub2", ["1"]);
    const benarSub3 = cekIsian("lat2_sub3", ["5"]);
    const benarSub4 = cekIsian("lat2_sub4", ["2"]);
    const benarSub5 = cekIsian("lat2_sub5", ["6"]);
    const benarSub6 = cekIsian("lat2_sub6", ["2"]);

    const benarKali1 = cekIsian("lat2_kali1", ["4"]);
    const benarKali2 = cekIsian("lat2_kali2", ["5"]);
    const benarKali3 = cekIsian("lat2_kali3", ["-4"]);
    const benarKali4 = cekIsian("lat2_kali4", ["2"]);

    const benarAkhir = cekIsian("lat2_akhir", ["-x+7", "-x + 7", "7-x"]);

    const semuaBenar =
        benarSub1 &&
        benarSub2 &&
        benarSub3 &&
        benarSub4 &&
        benarSub5 &&
        benarSub6 &&
        benarKali1 &&
        benarKali2 &&
        benarKali3 &&
        benarKali4 &&
        benarAkhir;

    const feedback = document.getElementById("feedbackLatihan2");
    const petunjukId = "petunjukLatihan2";

    if (semuaBenar) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, jawabanmu sudah benar. Lanjut ke soal berikutnya.</div>';
        document.getElementById(petunjukId).innerHTML = "";

        setTimeout(() => {
            pindahLatihan(2);
        }, 700);
        return;
    }

    feedback.innerHTML =
        '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.</div>';

    if (
        !benarSub1 ||
        !benarSub2 ||
        !benarSub3 ||
        !benarSub4 ||
        !benarSub5 ||
        !benarSub6
    ) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: baca koordinat titik A dan C dari gambar, lalu substitusikan ke rumus dua titik.",
        );
        return;
    }

    if (!benarKali1 || !benarKali2 || !benarKali3 || !benarKali4) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: sederhanakan dulu 1 - 5 dan 6 - 2, lalu lakukan kali silang.",
        );
        return;
    }

    if (!benarAkhir) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: dari 4(y - 5) = -4(x - 2), uraikan lalu sederhanakan.",
        );
    }
}

// =========================
// Latihan 3
// =========================
function cekLatihan3() {
    const benarSub1 = cekIsian("lat3_sub1", ["5"]);
    const benarSub2 = cekIsian("lat3_sub2", ["13"]);
    const benarSub3 = cekIsian("lat3_sub3", ["5"]);
    const benarSub4 = cekIsian("lat3_sub4", ["1"]);
    const benarSub5 = cekIsian("lat3_sub5", ["5"]);
    const benarSub6 = cekIsian("lat3_sub6", ["1"]);

    const benarKali1 = cekIsian("lat3_kali1", ["4"]);
    const benarKali2 = cekIsian("lat3_kali2", ["5"]);
    const benarKali3 = cekIsian("lat3_kali3", ["8"]);
    const benarKali4 = cekIsian("lat3_kali4", ["1"]);

    const benarPersamaan = cekIsian("lat3_persamaan", ["2x+3", "2x + 3"]);
    const benarA = cekIsian("lat3_a", ["9"]);

    const semuaBenar =
        benarSub1 &&
        benarSub2 &&
        benarSub3 &&
        benarSub4 &&
        benarSub5 &&
        benarSub6 &&
        benarKali1 &&
        benarKali2 &&
        benarKali3 &&
        benarKali4 &&
        benarPersamaan &&
        benarA;

    const feedback = document.getElementById("feedbackLatihan3");
    const petunjukId = "petunjukLatihan3";

    if (semuaBenar) {
        feedback.innerHTML =
            '<div class="alert alert-success py-2 mb-0">Bagus, jawabanmu sudah benar.</div>';
        document.getElementById(petunjukId).innerHTML = "";
        return;
    }

    feedback.innerHTML =
        '<div class="alert alert-warning py-2 mb-0">Masih ada jawaban yang belum tepat. Coba periksa kembali jawabanmu.</div>';

    if (
        !benarSub1 ||
        !benarSub2 ||
        !benarSub3 ||
        !benarSub4 ||
        !benarSub5 ||
        !benarSub6
    ) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: gunakan titik A(1,5) dan B(5,13) untuk menggantikan x1, y1, x2, dan y2.",
        );
        return;
    }

    if (!benarKali1 || !benarKali2 || !benarKali3 || !benarKali4) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: sederhanakan dulu 13 - 5 dan 5 - 1, lalu lakukan kali silang.",
        );
        return;
    }

    if (!benarPersamaan) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: dari 4(y - 5) = 8(x - 1), uraikan lalu sederhanakan.",
        );
        return;
    }

    if (!benarA) {
        tampilkanPetunjuk(
            petunjukId,
            "Petunjuk: substitusikan x = 3 ke persamaan garis yang sudah kamu peroleh.",
        );
    }
}
