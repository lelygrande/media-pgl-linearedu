// Eksplorasi
function normEksplorasi(teks) {
    return (teks || "")
        .toString()
        .trim()
        .toLowerCase()
        .replace(/\s+/g, "");
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
