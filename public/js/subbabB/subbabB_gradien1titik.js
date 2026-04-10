// Hitung gradien
// Latihan soal
function renderMathSafe(target) {
    if (window.renderMathInElement && target) {
        renderMathInElement(target, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function initLatihan1() {
    renderMathSafe(document.body);
}

function tampilkanLatihan(idLatihan) {
    const semuaLatihan = document.querySelectorAll(".latihan-step");

    semuaLatihan.forEach((latihan) => {
        latihan.classList.add("d-none");
    });

    const latihanAktif = document.getElementById(idLatihan);
    if (latihanAktif) {
        latihanAktif.classList.remove("d-none");
        latihanAktif.scrollIntoView({ behavior: "smooth", block: "start" });
        renderMathSafe(latihanAktif);
    }
}

function cekLatihan1() {
    const subAtasA = document.getElementById("subAtas_a").value.trim();
    const subBawahA = document.getElementById("subBawah_a").value.trim();
    const hasilAtasA = document.getElementById("hasilAtas_a").value.trim();
    const hasilBawahA = document.getElementById("hasilBawah_a").value.trim();

    const subAtasB = document.getElementById("subAtas_b").value.trim();
    const subBawahB = document.getElementById("subBawah_b").value.trim();
    const hasilAtasB = document.getElementById("hasilAtas_b").value.trim();
    const hasilBawahB = document.getElementById("hasilBawah_b").value.trim();

    const pilihJalur = document.getElementById("pilihJalur").value.trim().toUpperCase();
    const fb = document.getElementById("feedbackLatihan1");

    const benarA1 = (subAtasA === "400" && subBawahA === "800");
    const benarA2 = (
        (hasilAtasA === "1" && hasilBawahA === "2") ||
        (hasilAtasA === "400" && hasilBawahA === "800")
    );

    const benarB1 = (subAtasB === "450" && subBawahB === "600");
    const benarB2 = (
        (hasilAtasB === "3" && hasilBawahB === "4") ||
        (hasilAtasB === "450" && hasilBawahB === "600")
    );

    const benarJalur = (pilihJalur === "A");

    if (benarA1 && benarA2 && benarB1 && benarB2 && benarJalur) {
        fb.innerHTML = "<span class='text-success fw-bold'>Benar. Lanjut ke latihan berikutnya.</span>";

        setTimeout(() => {
            tampilkanLatihan("latihan2");
        }, 800);
    } else {
        let hints = [];

        if (!benarA1) hints.push("Periksa lagi substitusi untuk jalur A.");
        if (benarA1 && !benarA2) hints.push("Sederhanakan hasil gradien jalur A.");
        if (!benarB1) hints.push("Periksa lagi substitusi untuk jalur B.");
        if (benarB1 && !benarB2) hints.push("Sederhanakan hasil gradien jalur B.");
        if (benarA1 && benarA2 && benarB1 && benarB2 && !benarJalur) {
            hints.push("Jalur lebih landai memiliki gradien yang lebih kecil.");
        }

        fb.innerHTML = "<span class='text-danger'>" + hints.join("<br>") + "</span>";
    }

    renderMathSafe(fb);
}

window.addEventListener("load", initLatihan1);

function cekLatihan2() {
    const moaAtas = document.getElementById("moaAtas").value.trim();
    const moaBawah = document.getElementById("moaBawah").value.trim();

    const mobAtas = document.getElementById("mobAtas").value.trim();
    const mobBawah = document.getElementById("mobBawah").value.trim();

    const mocAtas = document.getElementById("mocAtas").value.trim();
    const mocBawah = document.getElementById("mocBawah").value.trim();

    const fb = document.getElementById("feedbackLatihan2");

    const benarOA = (moaAtas === "5" && moaBawah === "3");
    const benarOB = (
        (mobAtas === "-2" && mobBawah === "3") ||
        (mobAtas === "2" && mobBawah === "-3")
    );
    const benarOC = (
        (mocAtas === "3" && mocBawah === "4") ||
        (mocAtas === "-3" && mocBawah === "-4")
    );

    if (benarOA && benarOB && benarOC) {
        fb.innerHTML = "<span class='text-success fw-bold'>Benar. Lanjut ke latihan berikutnya.</span>";

        setTimeout(() => {
            tampilkanLatihan("latihan3");
        }, 800);
    } else {
        let hints = [];

        if (!benarOA) hints.push("Periksa lagi gradien $OA$.");
        if (!benarOB) hints.push("Periksa lagi gradien $OB$. Ingat tandanya bisa negatif.");
        if (!benarOC) hints.push("Periksa lagi gradien $OC$.");

        fb.innerHTML = "<span class='text-danger'>" + hints.join("<br>") + "</span>";
    }

    renderMathSafe(fb);
}

function cekLatihan3() {
    const nilaiX = document.getElementById("nilaiX_3").value.trim();
    const nilaiP = document.getElementById("nilaiP_3").value.trim();

    const subM = document.getElementById("subM_3").value.trim();
    const subP = document.getElementById("subP_3").value.trim();
    const subX = document.getElementById("subX_3").value.trim();

    const kali1 = document.getElementById("kali1_3").value.trim();
    const kali2 = document.getElementById("kali2_3").value.trim();

    const hasilP = document.getElementById("hasilP_3").value.trim();
    const koordX = document.getElementById("koordX_3").value.trim();
    const koordY = document.getElementById("koordY_3").value.trim();

    const fb = document.getElementById("feedbackLatihan3");

    const benarNilai = (nilaiX === "6" && nilaiP.toLowerCase() === "p");
    const benarSubstitusi = (subM === "4" && subP.toLowerCase() === "p" && subX === "6");
    const benarKali = (
        (kali1 === "4" && kali2 === "6") ||
        (kali1 === "6" && kali2 === "4")
    );
    const benarHasil = (hasilP === "24");
    const benarKoord = (koordX === "6" && koordY === "24");

    if (benarNilai && benarSubstitusi && benarKali && benarHasil && benarKoord) {
        fb.innerHTML = "<span class='text-success fw-bold'>Hebat, semua latihan sudah selesai.</span>";
    } else {
        let hints = [];

        if (!benarNilai) hints.push("Periksa lagi nilai $x$ dan $y$ dari titik $A(6,p)$.");
        if (benarNilai && !benarSubstitusi) hints.push("Periksa lagi substitusi ke rumus gradien.");
        if (benarNilai && benarSubstitusi && !benarKali) hints.push("Periksa lagi bentuk perkalian untuk mencari $p$.");
        if (benarNilai && benarSubstitusi && benarKali && !benarHasil) hints.push("Hitung lagi hasil akhirnya.");
        if (benarNilai && benarSubstitusi && benarKali && benarHasil && !benarKoord) {
            hints.push("Masukkan kembali koordinat titik $A$ dengan benar.");
        }

        fb.innerHTML = "<span class='text-danger'>" + hints.join("<br>") + "</span>";
    }

    renderMathSafe(fb);
}
