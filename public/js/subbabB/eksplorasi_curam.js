// === KUNCI JAWABAN ===
// Ganti sesuai gambar kamu:
// Soal 1: yang lebih curam A atau B?
// Soal 2: yang lebih curam A atau B?
const KUNCI = {
    curam1: "B", // misal garis2.png lebih curam
    curam2: "B", // misal garis2neg.png lebih curam
};

function picked(name) {
    return document.querySelector(`input[name="${name}"]:checked`);
}

function cekLatihanCuram() {
    let total = 2;
    let benar = 0;

    // SOAL 1
    const fb1 = document.getElementById("fbCuram1");
    const p1 = picked("curam1");
    if (!p1) {
        fb1.innerHTML = `<div class="text-danger">Pilih dulu jawaban untuk Soal 1</div>`;
    } else if (p1.value === KUNCI.curam1) {
        benar++;
        fb1.innerHTML = `
        <div class="text-success fw-semibold">Benar.</div>
        <div class="text-muted small">
          Garis ini lebih curam karena tampak lebih tegak.
        </div>`;
    } else {
        fb1.innerHTML = `
        <div class="text-warning fw-semibold">Belum tepat.</div>
        <div class="text-muted small">
          Coba perhatikan: saat bergerak ke kanan, garis mana yang naik lebih cepat?
        </div>`;
    }

    // SOAL 2
    const fb2 = document.getElementById("fbCuram2");
    const p2 = picked("curam2");
    if (!p2) {
        fb2.innerHTML = `<div class="text-danger">Pilih dulu jawaban untuk Soal 2</div>`;
    } else if (p2.value === KUNCI.curam2) {
        benar++;
        fb2.innerHTML = `
        <div class="text-success fw-semibold">Benar.</div>
        <div class="text-muted small">
          Walaupun garis menurun, garis yang lebih curam tetap yang paling tegak.
        </div>`;
    } else {
        fb2.innerHTML = `
        <div class="text-warning fw-semibold">Belum tepat.</div>
        <div class="text-muted small">
          Perhatikan mana yang turun lebih cepat saat bergerak ke kanan.
        </div>`;
    }

    // KESIMPULAN
    const fbK = document.getElementById("fbCuramKesimpulan");
    if (benar === total) {
        fbK.innerHTML = `
        <div class="alert alert-success mb-0">
          <div class="fw-semibold">Kesimpulan</div>
          <div>
            Garis yang lebih curam adalah garis yang tampak lebih tegak,
            yaitu garis yang naik atau turun lebih cepat saat bergerak ke kanan.
          </div>
          <div class="small text-muted mt-1">
            Nanti, tingkat kecuraman ini akan dihubungkan dengan nilai gradien.
          </div>
        </div>`;
    } else {
        fbK.innerHTML = `
        <div class="alert alert-light border mb-0">
          Skor kamu: <b>${benar}/${total}</b>. Coba ulangi dan perhatikan mana yang lebih tegak.
        </div>`;
    }
}

function resetLatihanCuram() {
    ["curam1", "curam2"].forEach((name) => {
        document
            .querySelectorAll(`input[name="${name}"]`)
            .forEach((r) => (r.checked = false));
    });
    ["fbCuram1", "fbCuram2", "fbCuramKesimpulan"].forEach((id) => {
        const el = document.getElementById(id);
        if (el) el.innerHTML = "";
    });
}
