const riseSlider = document.getElementById("riseSlider");
const runSlider = document.getElementById("runSlider");

const riseVal = document.getElementById("riseVal");
const runVal = document.getElementById("runVal");

const papan = document.getElementById("papan");
const alas = document.getElementById("alas");
const tinggi = document.getElementById("tinggi");

function updatePapan() {

    const rise = parseInt(riseSlider.value);
    const run = parseInt(runSlider.value);

    // update angka
    riseVal.textContent = rise;
    runVal.textContent = run;

    // skala visual
    const scale = 20;

    const tinggiPx = rise * scale;
    const alasPx = run * scale;

    // panjang papan
    const panjang = Math.sqrt(
        alasPx * alasPx +
        tinggiPx * tinggiPx
    );

    // sudut papan
    const sudut = Math.atan2(tinggiPx, alasPx) * (180 / Math.PI);

    // alas
    alas.style.width = `${alasPx}px`;

    // tinggi
    tinggi.style.height = `${tinggiPx}px`;

    // posisi tinggi
    tinggi.style.bottom = `60px`;

    // papan
    papan.style.width = `${panjang}px`;
    papan.style.transform = `rotate(-${sudut}deg)`;
}

riseSlider.addEventListener("input", updatePapan);
runSlider.addEventListener("input", updatePapan);

updatePapan();
