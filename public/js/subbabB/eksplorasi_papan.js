// public/js/subbabB/eksplorasi_papan.js

let papanSketch = (p) => {
    let riseSlider, runSlider;
    let rise = 3,
        run = 6;

    // ukuran canvas (bisa kamu sesuaikan)
    const W = 720;
    const H = 360;

    // area gambar (padding)
    const pad = 40;

    p.setup = () => {
        const cnv = p.createCanvas(W, H);
        cnv.parent("papan-canvas");

        // Slider naik & maju (1..10)
        riseSlider = p.createSlider(1, 10, rise, 1);
        runSlider = p.createSlider(1, 10, run, 1);

        // Styling kecil biar rapi
        riseSlider.parent("papan-canvas");
        runSlider.parent("papan-canvas");
        riseSlider.style("width", "260px");
        runSlider.style("width", "260px");

        // Label slider (pakai DOM)
        const lblWrap = document.createElement("div");
        lblWrap.style.display = "flex";
        lblWrap.style.gap = "18px";
        lblWrap.style.alignItems = "center";
        lblWrap.style.margin = "6px 0 10px 0";
        lblWrap.id = "sliderLabelsPapan";
        document.getElementById("papan-canvas").prepend(lblWrap);

        const l1 = document.createElement("div");
        l1.innerHTML = `Naik: <b id="riseVal">${rise}</b>`;
        const l2 = document.createElement("div");
        l2.innerHTML = `Maju: <b id="runVal">${run}</b>`;
        lblWrap.appendChild(l1);
        lblWrap.appendChild(l2);

        // taruh slider di bawah label
        const sWrap = document.createElement("div");
        sWrap.style.display = "flex";
        sWrap.style.gap = "18px";
        sWrap.style.alignItems = "center";
        sWrap.style.flexWrap = "wrap";
        sWrap.id = "sliderWrapPapan";
        document.getElementById("papan-canvas").insertBefore(sWrap, cnv.elt);

        // pindahkan slider element ke wrapper
        sWrap.appendChild(riseSlider.elt);
        sWrap.appendChild(runSlider.elt);
    };

    p.draw = () => {
        rise = riseSlider.value();
        run = runSlider.value();

        // update label angka
        const rv = document.getElementById("riseVal");
        const uv = document.getElementById("runVal");
        if (rv) rv.textContent = rise;
        if (uv) uv.textContent = run;

        p.background(255);

        // judul kecil
        p.noStroke();
        p.fill(40);
        p.textSize(14);
        p.text("Papan: bandingkan Naik vs Maju", pad, 22);

        // tentukan skala supaya muat canvas
        const maxUnits = Math.max(rise, run);
        const usableW = W - pad * 2;
        const usableH = H - pad * 2;

        // kita pakai skala unit yang sama untuk x dan y agar proporsional
        const unit = Math.min(usableW / (run + 1), usableH / (rise + 1));

        // origin bawah-kiri untuk gambar
        const ox = pad;
        const oy = H - pad;

        // gambar sumbu sederhana
        p.stroke(180);
        p.line(ox, oy, ox + usableW, oy); // x
        p.line(ox, oy, ox, oy - usableH); // y

        // grid ringan
        p.stroke(235);
        for (let i = 0; i <= run; i++) {
            p.line(ox + i * unit, oy, ox + i * unit, oy - rise * unit);
        }
        for (let j = 0; j <= rise; j++) {
            p.line(ox, oy - j * unit, ox + run * unit, oy - j * unit);
        }

        // gambar segitiga (naik & maju)
        const xEnd = ox + run * unit;
        const yEnd = oy - rise * unit;

        // garis miring (jalan / ramp)
        p.stroke(50);
        p.strokeWeight(3);
        p.line(ox, oy, xEnd, yEnd);

        // label Naik dan Maju
        p.noStroke();
        p.fill(30, 90, 140);
        p.textSize(13);

        // label maju
        p.text(`Maju = ${run}`, ox + (run * unit) / 2 - 24, oy + 18);

        // label naik
        p.push();
        p.translate(ox - 28, oy - (rise * unit) / 2);
        p.rotate(-p.HALF_PI);
        p.text(`Naik = ${rise}`, 0, 0);
        p.pop();
    };
};

// jalankan sketch
new p5(papanSketch);

// cek jawaban (3 pertanyaan)
window.cekJawabanPapan = function () {
    const q1 = document.getElementById("q1")?.value;
    const q2 = document.getElementById("q2")?.value;
    const q3a = document.getElementById("q3a")?.value;
    const q3b = document.getElementById("q3b")?.value;
    const fb = document.getElementById("feedbackPapan");

    let benar = 0;
    let pesan = [];

    if (q1 === "tegak") {
        benar++;
        pesan.push(
            "Jawaban nomor 1 sudah tepat: jika nilai naik diperbesar, papan menjadi lebih tegak.",
        );
    } else {
        pesan.push(
            "Nomor 1 belum tepat. Jika nilai naik diperbesar dan maju tetap, papan tampak semakin tegak.",
        );
    }

    if (q2 === "landai") {
        benar++;
        pesan.push(
            "Jawaban nomor 2 sudah tepat: jika nilai maju diperbesar, papan menjadi lebih landai.",
        );
    } else {
        pesan.push(
            "Nomor 2 belum tepat. Jika nilai maju diperbesar dan naik tetap, papan tampak lebih landai.",
        );
    }

    const pasanganBenar =
        (q3a === "naik" && q3b === "maju") ||
        (q3a === "maju" && q3b === "naik");

    if (pasanganBenar) {
        benar++;
        pesan.push(
            "Jawaban nomor 3 sudah tepat: kemiringan papan ditentukan oleh perbandingan naik dan maju.",
        );
    } else {
        pesan.push(
            "Nomor 3 belum tepat. Kemiringan papan ditentukan oleh perbandingan naik dan maju.",
        );
    }

    if (benar === 3) {
        fb.innerHTML = `<div class="alert alert-success mb-0">
            <strong>Bagus!</strong><br>${pesan.join("<br>")}
        </div>`;

        const lanjutan = document.getElementById("lanjutanGradien");
        if (lanjutan) {
            lanjutan.style.display = "block";
            lanjutan.scrollIntoView({ behavior: "smooth", block: "start" });
        }
    } else {
        fb.innerHTML = `<div class="alert alert-warning mb-0">
            <strong>Coba lagi ya.</strong><br>${pesan.join("<br>")}
        </div>`;
    }
};
