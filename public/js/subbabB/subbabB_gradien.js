// Eksplorasi
document.addEventListener("DOMContentLoaded", function () {
    const opsiKotak = document.querySelectorAll(".opsi-kotak");

    opsiKotak.forEach((btn) => {
        btn.addEventListener("click", function () {
            const soal = this.dataset.soal;
            const value = this.dataset.value;

            document
                .querySelectorAll(`.opsi-kotak[data-soal="${soal}"]`)
                .forEach((el) => {
                    el.classList.remove("active");
                });

            this.classList.add("active");
            document.getElementById(soal).value = value;
        });
    });
});

// Kunci Materi
// cek jawaban (3 pertanyaan)
document.addEventListener("DOMContentLoaded", function () {
    const opsiKotak = document.querySelectorAll(".opsi-kotak");

    opsiKotak.forEach((btn) => {
        btn.addEventListener("click", function () {
            const soal = this.dataset.soal;
            const value = this.dataset.value;

            document
                .querySelectorAll(`.opsi-kotak[data-soal="${soal}"]`)
                .forEach((el) => {
                    el.classList.remove("active");
                });

            this.classList.add("active");
            document.getElementById(soal).value = value;
        });
    });
});

function cekJawabanPapan() {
    const q1 = document.getElementById("q1").value;
    const q2 = document.getElementById("q2").value;
    const q3a = document.getElementById("q3a").value;
    const q3b = document.getElementById("q3b").value;

    const feedback = document.getElementById("feedbackPapan");
    const lanjutan = document.getElementById("lanjutanGradien");

    // reset style dropdown
    document.getElementById("q3a").classList.remove("is-valid", "is-invalid");
    document.getElementById("q3b").classList.remove("is-valid", "is-invalid");

    // reset style opsi kotak
    document.querySelectorAll('.opsi-kotak[data-soal="q1"]').forEach((el) => {
        el.classList.remove("benar", "salah");
    });
    document.querySelectorAll('.opsi-kotak[data-soal="q2"]').forEach((el) => {
        el.classList.remove("benar", "salah");
    });

    // validasi kosong
    if (!q1 || !q2 || !q3a || !q3b) {
        feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Semua jawaban harus diisi terlebih dahulu.
            </div>
        `;
        if (lanjutan) lanjutan.style.display = "none";
        return;
    }

    // kunci jawaban
    const benarQ1 = "tegak";
    const benarQ2 = "landai";

    // untuk q3, urutan boleh fleksibel: naik dan maju
    const benarQ3 = q3a === "naik" && q3b === "maju";
    let semuaBenar = true;

    // cek q1
    const q1Aktif = document.querySelector(
        `.opsi-kotak[data-soal="q1"][data-value="${q1}"]`,
    );
    if (q1 === benarQ1) {
        q1Aktif.classList.add("benar");
    } else {
        q1Aktif.classList.add("salah");
        semuaBenar = false;
    }

    // cek q2
    const q2Aktif = document.querySelector(
        `.opsi-kotak[data-soal="q2"][data-value="${q2}"]`,
    );
    if (q2 === benarQ2) {
        q2Aktif.classList.add("benar");
    } else {
        q2Aktif.classList.add("salah");
        semuaBenar = false;
    }

    // cek q3
    if (benarQ3) {
        document.getElementById("q3a").classList.add("is-valid");
        document.getElementById("q3b").classList.add("is-valid");
    } else {
        document.getElementById("q3a").classList.add("is-invalid");
        document.getElementById("q3b").classList.add("is-invalid");
        semuaBenar = false;
    }

    // feedback
    if (semuaBenar) {
        feedback.innerHTML = `
            <div class="alert alert-success mb-0">
                Bagus! Jawabanmu benar. Kamu bisa melanjutkan ke bagian berikutnya.
            </div>
        `;
        if (lanjutan) lanjutan.style.display = "block";
    } else {
        feedback.innerHTML = `
            <div class="alert alert-danger mb-0">
                Masih ada jawaban yang belum tepat. Coba perhatikan lagi hubungan antara naik dan maju.
            </div>
        `;
        if (lanjutan) lanjutan.style.display = "none";
    }
}

// Slider Latihan
let currentLatihanGradien = 0;

function goToLatihanGradien(index) {
    const track = document.getElementById("latihanTrackGradien");
    if (!track) return;

    currentLatihanGradien = index;
    track.style.transform = `translateX(-${index * 100}%)`;
}

// Render Katex
function renderMath(target) {
    if (typeof renderMathInElement !== "function" || !target) return;

    renderMathInElement(target, {
        delimiters: [
            { left: "$$", right: "$$", display: true },
            { left: "\\[", right: "\\]", display: true },
            { left: "\\(", right: "\\)", display: false },
            { left: "$", right: "$", display: false },
        ],
        throwOnError: false,
    });
}

// Latihan Soal
// No 1 Drag and Drop
document.addEventListener("DOMContentLoaded", function () {
    initKlasifikasiGradien();
});

function initKlasifikasiGradien() {
    const dragItems = document.querySelectorAll(".drag-item");
    const dropZones = document.querySelectorAll(".drop-zone");
    const dragBank = document.querySelector(".drag-bank");

    let draggedItem = null;

    dragItems.forEach((item) => {
        item.addEventListener("dragstart", function () {
            draggedItem = this;
            setTimeout(() => {
                this.style.opacity = "0.5";
            }, 0);
        });

        item.addEventListener("dragend", function () {
            this.style.opacity = "1";
            draggedItem = null;
        });
    });

    dropZones.forEach((zone) => {
        zone.addEventListener("dragover", function (e) {
            e.preventDefault();
            this.classList.add("hovered");
        });

        zone.addEventListener("dragleave", function () {
            this.classList.remove("hovered");
        });

        zone.addEventListener("drop", function (e) {
            e.preventDefault();
            this.classList.remove("hovered");

            if (!draggedItem) return;

            const slot = this.querySelector(".drop-slot");

            if (slot.children.length > 0) {
                const existingItem = slot.children[0];
                dragBank.appendChild(existingItem);
            }

            slot.appendChild(draggedItem);
        });
    });

    dragBank.addEventListener("dragover", function (e) {
        e.preventDefault();
    });

    dragBank.addEventListener("drop", function (e) {
        e.preventDefault();
        if (draggedItem) {
            dragBank.appendChild(draggedItem);
        }
    });
}

function cekKlasifikasiGradien() {
    const dropZones = document.querySelectorAll(".drop-zone");
    const feedback = document.getElementById("feedbackKlasifikasiGradien");

    let semuaBenar = true;
    let zonaKosong = [];

    dropZones.forEach((zone) => {
        const jawabanBenar = zone.dataset.answer;
        const slot = zone.querySelector(".drop-slot");
        const item = slot.querySelector(".drag-item");
        const judul = zone.querySelector("strong")?.innerText || "Zona";

        zone.classList.remove("correct", "wrong");

        if (!item) {
            semuaBenar = false;
            zonaKosong.push(judul);
            return;
        }

        const jawabanUser = item.dataset.value;

        if (jawabanUser === jawabanBenar) {
            zone.classList.add("correct");
        } else {
            zone.classList.add("wrong");
            semuaBenar = false;
        }
    });

    if (zonaKosong.length > 0) {
        feedback.innerHTML = `
        <div class="alert alert-warning mb-0">
            Masih ada pasangan yang belum diisi pada: <b>${zonaKosong.join(", ")}</b>.
        </div>
    `;
        return;
    }

    if (semuaBenar) {
        feedback.innerHTML = `
        <div class="alert alert-success mb-0">
            Bagus! Semua pasangan sudah tepat. Lanjut ke latihan berikutnya.
        </div>
    `;
        setTimeout(() => {
            goToLatihanGradien(1);
        }, 900);
    } else {
        feedback.innerHTML = `
        <div class="alert alert-danger mb-0">
            Masih ada pasangan yang belum tepat. Coba periksa lagi.
        </div>
    `;
    }
}

function resetKlasifikasiGradien() {
    const dragBank = document.querySelector(".drag-bank");
    const dropZones = document.querySelectorAll(".drop-zone");
    const feedback = document.getElementById("feedbackKlasifikasiGradien");

    dropZones.forEach((zone) => {
        zone.classList.remove("correct", "wrong", "hovered");

        const slot = zone.querySelector(".drop-slot");
        const items = slot.querySelectorAll(".drag-item");

        items.forEach((item) => {
            dragBank.appendChild(item);
        });
    });

    feedback.innerHTML = "";
}

// Latihan 2
function cekLatihan2Gradien() {
    const jawaban = document.getElementById("lat2").value;
    const feedback = document.getElementById("feedbackLatihan2Gradien");

    document.querySelectorAll('.opsi-kotak[data-soal="lat2"]').forEach((el) => {
        el.classList.remove("benar", "salah");
    });

    if (!jawaban) {
        feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Pilih salah satu jawaban terlebih dahulu.
            </div>
        `;
        return;
    }

    const benar = "a";
    const tombolAktif = document.querySelector(
        `.opsi-kotak[data-soal="lat2"][data-value="${jawaban}"]`,
    );

    if (jawaban === benar) {
        tombolAktif.classList.add("benar");
        feedback.innerHTML = `
        <div class="alert alert-success mb-0">
            Benar! Karena garis bergerak ke kanan dan ke atas, maka \\(\\Delta x\\) positif dan \\(\\Delta y\\) positif.
            Lanjut ke latihan berikutnya.
        </div>
    `;
        renderMath(feedback);

        setTimeout(() => {
            goToLatihanGradien(2);
        }, 900);
    } else {
        tombolAktif.classList.add("salah");
        feedback.innerHTML = `
        <div class="alert alert-danger mb-0">
            Belum tepat. Perhatikan lagi arah garis dari A ke B: bergerak ke kanan dan ke atas.
        </div>
    `;
        renderMath(feedback);
    }
}

function resetLatihan2Gradien() {
    document.getElementById("lat2").value = "";
    document.querySelectorAll('.opsi-kotak[data-soal="lat2"]').forEach((el) => {
        el.classList.remove("active", "benar", "salah");
    });
    document.getElementById("feedbackLatihan2Gradien").innerHTML = "";
}

// Latihan 3
function normalisasiInputNilai(nilai) {
    return nilai.replace(/\s+/g, "").toLowerCase();
}

function cekLatihan3Gradien() {
    const dy = normalisasiInputNilai(document.getElementById("lat3_dy").value);
    const dx = normalisasiInputNilai(document.getElementById("lat3_dx").value);
    const m = normalisasiInputNilai(document.getElementById("lat3_m").value);

    const feedback = document.getElementById("feedbackLatihan3Gradien");

    document
        .getElementById("lat3_dy")
        .classList.remove("is-valid", "is-invalid");
    document
        .getElementById("lat3_dx")
        .classList.remove("is-valid", "is-invalid");
    document
        .getElementById("lat3_m")
        .classList.remove("is-valid", "is-invalid");

    if (!dy || !dx || !m) {
        feedback.innerHTML = `
            <div class="alert alert-warning mb-0">
                Semua isian harus diisi terlebih dahulu.
            </div>
        `;
        return;
    }

    let semuaBenar = true;

    // Kunci jawaban
    const benarDy = ["-3"];
    const benarDx = ["6"];
    const benarM = ["-1/2", "-3/6"];

    if (benarDy.includes(dy)) {
        document.getElementById("lat3_dy").classList.add("is-valid");
    } else {
        document.getElementById("lat3_dy").classList.add("is-invalid");
        semuaBenar = false;
    }

    if (benarDx.includes(dx)) {
        document.getElementById("lat3_dx").classList.add("is-valid");
    } else {
        document.getElementById("lat3_dx").classList.add("is-invalid");
        semuaBenar = false;
    }

    if (benarM.includes(m)) {
        document.getElementById("lat3_m").classList.add("is-valid");
    } else {
        document.getElementById("lat3_m").classList.add("is-invalid");
        semuaBenar = false;
    }

    if (semuaBenar) {
        feedback.innerHTML = `
        <div class="alert alert-success mb-0">
            Benar! Dari A ke B, garis bergerak ke kanan sebanyak 6 satuan dan ke bawah sebanyak 3 satuan, sehingga
            \\[
            \\Delta x = 6, \\quad \\Delta y = -3, \\quad m = \\frac{-3}{6} = -\\frac{1}{2}
            \\]
        </div>
    `;
        renderMath(feedback);
    } else {
        feedback.innerHTML = `
        <div class="alert alert-danger mb-0">
            Masih ada jawaban yang belum tepat. Hitung kembali banyak kotak ke kanan dan ke bawah dari titik A ke titik B.
        </div>
    `;
        renderMath(feedback);
    }
}

function resetLatihan3Gradien() {
    document.getElementById("lat3_dy").value = "";
    document.getElementById("lat3_dx").value = "";
    document.getElementById("lat3_m").value = "";

    document
        .getElementById("lat3_dy")
        .classList.remove("is-valid", "is-invalid");
    document
        .getElementById("lat3_dx")
        .classList.remove("is-valid", "is-invalid");
    document
        .getElementById("lat3_m")
        .classList.remove("is-valid", "is-invalid");

    document.getElementById("feedbackLatihan3Gradien").innerHTML = "";
}
