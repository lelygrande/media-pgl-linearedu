// Geogebra
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
    applet2.inject("ggb-garis");

    setTimeout(function () {
        var ggb = applet2.getAppletObject();
        ggb.evalCommand("A=(0,1)");
        ggb.evalCommand("B=(3,2)");
        ggb.evalCommand("g=Line(A,B)");
        ggb.setLabelVisible("A", true);
        ggb.setLabelVisible("B", true);
    }, 1000);
});

// Eksplorasi
function cekEksplorasiGaris() {
    const kunci = {
        g1: "b",
        g2: "a",
        g3: "b",
    };

    let benarSemua = true;

    for (let key in kunci) {
        const jawaban = document.querySelector(`input[name="${key}"]:checked`);
        const hasil = document.getElementById("hasil" + key);

        if (!jawaban) {
            hasil.innerHTML =
                "<span class='text-warning'>Pilih salah satu jawaban</span>";
            benarSemua = false;
        } else if (jawaban.value === kunci[key]) {
            hasil.innerHTML = "<span class='text-success'>✓ Benar</span>";
        } else {
            hasil.innerHTML = "<span class='text-danger'>✗ Salah</span>";
            benarSemua = false;
        }
    }

    if (benarSemua) {
        document.getElementById("kesimpulanGaris").style.display = "block";
    } else {
        document.getElementById("kesimpulanGaris").style.display = "none";
    }
}

// Memahami bentuk implisit
function cekJawabanABC() {
    const inputA = document.getElementById("inputA").value.trim();
    const inputB = document.getElementById("inputB").value.trim();
    const inputC = document.getElementById("inputC").value.trim();
    const hasil = document.getElementById("hasilABC");

    const benarA = "3";
    const benarB = "2";
    const benarC = "-6";

    let feedback = `
        <div class="alert alert-info">
            <p><strong>Penyelesaian:</strong></p>
            <p>Pada persamaan $3x + 2y - 6 = 0$:</p>
            <ul>
                <li>$a = 3$</li>
                <li>$b = 2$</li>
                <li>$c = -6$</li>
            </ul>
    `;

    if (inputA === benarA && inputB === benarB && inputC === benarC) {
        feedback += `<p class="mb-0 text-success"><strong>Jawaban kamu benar.</strong></p>`;
    } else {
        feedback += `<p class="mb-0 text-danger"><strong>Jawaban kamu belum tepat. Perhatikan kembali koefisien dan konstantanya.</strong></p>`;
    }

    feedback += `</div>`;

    hasil.innerHTML = feedback;
    hasil.style.display = "block";

    if (window.renderMathInElement) {
        renderMathInElement(hasil, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function resetKotakABC() {
    document.getElementById("inputA").value = "";
    document.getElementById("inputB").value = "";
    document.getElementById("inputC").value = "";

    const hasil = document.getElementById("hasilABC");
    hasil.innerHTML = "";
    hasil.style.display = "none";
}

// Contoh menentukan persamaan garis lurus atau tidak
function toggleSolution(id, btn) {
    const el = document.getElementById(id);
    const isHidden = el.style.display === "none";

    el.style.display = isHidden ? "block" : "none";
    btn.textContent = isHidden
        ? "Sembunyikan Penyelesaian"
        : "Lihat Penyelesaian";
}

// Contoh implisit klik kotak abc
function tampilABC(huruf) {
    const hasil = document.getElementById("hasilABC");

    if (huruf === "a") hasil.innerHTML = "$a = 3$";
    if (huruf === "b") hasil.innerHTML = "$b = 2$";
    if (huruf === "c") hasil.innerHTML = "$c = -6$";

    // Re-render KaTeX untuk konten yang baru dimasukkan
    if (window.renderMathInElement) {
        renderMathInElement(hasil, {
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
}

// Contoh mengubah persamaan eksplisit ke implisit
// Contoh 1
function openStepUmum(id, btn) {
    document.getElementById(id).style.display = "block";
    btn.style.display = "none";
}

// contoh cara mengubah persamaan ke eksplisit
function openStepS(id, btn) {
    const next = document.getElementById(id);
    if (!next) return;

    next.style.display = "block";
    btn.style.display = "none";
}

// contoh menentukan 2y + 4 = x merupakan persamaan lurus
function openStep(n, btn) {
    const next = document.getElementById("step" + n);
    if (!next) return;

    next.style.display = "block";
    btn.style.display = "none";
}

// Latihan Soal
let currentLatihan = 0;
let draggedItem = null;

document.addEventListener("DOMContentLoaded", function () {
    initDragDropA1();
    updateLatihanSlide();
});

function updateLatihanSlide() {
    const track = document.getElementById("latihanTrack");
    track.style.transform = `translateX(-${currentLatihan * 100}%)`;
}

function nextLatihan(index) {
    currentLatihan = index;
    updateLatihanSlide();
}

function prevLatihan(index) {
    currentLatihan = index;
    updateLatihanSlide();
}

function norm(expr) {
    return expr.toLowerCase().replace(/\s+/g, "").replace(/−/g, "-");
}

// =========================
// LATIHAN 1
// =========================
function initDragDropA1() {
    const items = document.querySelectorAll(".opsi-item");
    const dropzone = document.getElementById("dropLinear");
    const opsiWrap = document.getElementById("opsiLinear");

    items.forEach((item) => {
        item.addEventListener("dragstart", function () {
            draggedItem = this;
        });
    });

    [dropzone, opsiWrap].forEach((area) => {
        area.addEventListener("dragover", function (e) {
            e.preventDefault();
            if (this.id === "dropLinear") this.classList.add("over");
        });

        area.addEventListener("dragleave", function () {
            if (this.id === "dropLinear") this.classList.remove("over");
        });

        area.addEventListener("drop", function (e) {
            e.preventDefault();
            this.classList.remove("over");
            if (draggedItem) {
                this.appendChild(draggedItem);
                draggedItem = null;
            }
        });
    });
}

function cekLatihan1A1() {
    const dropzone = document.getElementById("dropLinear");
    const items = dropzone.querySelectorAll(".opsi-item");
    const fb = document.getElementById("feedbackLatihan1A1");
    const nextBtn = document.getElementById("nextBtn1");

    if (items.length === 0) {
        fb.innerHTML = "Belum ada jawaban yang diseret ke kotak.";
        fb.style.color = "red";
        nextBtn.disabled = true;
        return;
    }

    let semuaBenar = true;
    let jumlahBenar = 0;
    items.forEach((item) => {
        if (item.dataset.linear === "true") {
            jumlahBenar++;
        } else {
            semuaBenar = false;
        }
    });

    const totalLinear = document.querySelectorAll(
        '.opsi-item[data-linear="true"]',
    ).length;

    if (semuaBenar && jumlahBenar === totalLinear) {
        fb.innerHTML =
            "Benar. Semua pilihanmu merupakan persamaan garis lurus.";
        fb.style.color = "green";
        nextBtn.disabled = false;
    } else {
        fb.innerHTML =
            "Masih ada jawaban yang belum tepat. Persamaan garis lurus hanya memuat variabel berpangkat satu dan tidak mengandung akar, pangkat lebih dari satu, atau hasil kali variabel.";
        fb.style.color = "red";
        nextBtn.disabled = true;
    }

    if (window.renderMathInElement) {
        renderMathInElement(document.body, {
            delimiters: [
                { left: "$$", right: "$$", display: true },
                { left: "$", right: "$", display: false },
            ],
        });
    }
}

function resetLatihan1A1() {
    const opsiWrap = document.getElementById("opsiLinear");
    const dropzone = document.getElementById("dropLinear");
    const items = Array.from(dropzone.querySelectorAll(".opsi-item"));
    items.forEach((item) => opsiWrap.appendChild(item));

    document.getElementById("feedbackLatihan1A1").innerHTML = "";
    document.getElementById("nextBtn1").disabled = true;
}

// =========================
// LATIHAN 2
// =========================
function cekLatihan2A1() {
    let skor = 0;

    const a = norm(document.getElementById("lat2a").value);
    const b = norm(document.getElementById("lat2b").value);
    const c = norm(document.getElementById("lat2c").value);

    if (["2x-y-5", "-2x+y+5"].includes(a)) {
        document.getElementById("fb-lat2a").innerHTML = "Benar.";
        document.getElementById("fb-lat2a").style.color = "green";
        skor++;
    } else {
        document.getElementById("fb-lat2a").innerHTML = "Belum tepat.";
        document.getElementById("fb-lat2a").style.color = "red";
    }

    if (["3x+y-4", "-3x-y+4"].includes(b)) {
        document.getElementById("fb-lat2b").innerHTML = "Benar.";
        document.getElementById("fb-lat2b").style.color = "green";
        skor++;
    } else {
        document.getElementById("fb-lat2b").innerHTML = "Belum tepat.";
        document.getElementById("fb-lat2b").style.color = "red";
    }

    if (["x-2y+6", "-x+2y-6"].includes(c)) {
        document.getElementById("fb-lat2c").innerHTML = "Benar.";
        document.getElementById("fb-lat2c").style.color = "green";
        skor++;
    } else {
        document.getElementById("fb-lat2c").innerHTML = "Belum tepat.";
        document.getElementById("fb-lat2c").style.color = "red";
    }

    const fb = document.getElementById("feedbackLatihan2A1");
    const nextBtn = document.getElementById("nextBtn2");

    if (skor === 3) {
        fb.innerHTML = "Bagus. Semua jawabanmu benar.";
        fb.style.color = "green";
        nextBtn.disabled = false;
    } else {
        fb.innerHTML = `Kamu menjawab ${skor} dari 3 soal dengan benar.`;
        fb.style.color = "black";
        nextBtn.disabled = true;
    }
}

// =========================
// LATIHAN 3
// =========================
function cekLatihan3A1() {
    let skor = 0;

    const a = norm(document.getElementById("lat3a").value);
    const b = norm(document.getElementById("lat3b").value);
    const c = norm(document.getElementById("lat3c").value);

    if (["-3x+7"].includes(a)) {
        document.getElementById("fb-lat3a").innerHTML = "Benar.";
        document.getElementById("fb-lat3a").style.color = "green";
        skor++;
    } else {
        document.getElementById("fb-lat3a").innerHTML = "Belum tepat.";
        document.getElementById("fb-lat3a").style.color = "red";
    }

    if (["1/2x+2", "0.5x+2"].includes(b)) {
        document.getElementById("fb-lat3b").innerHTML = "Benar.";
        document.getElementById("fb-lat3b").style.color = "green";
        skor++;
    } else {
        document.getElementById("fb-lat3b").innerHTML = "Belum tepat.";
        document.getElementById("fb-lat3b").style.color = "red";
    }

    if (["-5/2x+3", "-2.5x+3"].includes(c)) {
        document.getElementById("fb-lat3c").innerHTML = "Benar.";
        document.getElementById("fb-lat3c").style.color = "green";
        skor++;
    } else {
        document.getElementById("fb-lat3c").innerHTML = "Belum tepat.";
        document.getElementById("fb-lat3c").style.color = "red";
    }

    const fb = document.getElementById("feedbackLatihan3A1");
    if (skor === 3) {
        fb.innerHTML = "Bagus. Semua jawabanmu benar.";
        fb.style.color = "green";
    } else {
        fb.innerHTML = `Kamu menjawab ${skor} dari 3 soal dengan benar.`;
        fb.style.color = "black";
    }
}
