/**
 * Eksplorasi Opsi B:
 * - Tampilkan beberapa titik kandidat pada bidang koordinat.
 * - Siswa klik untuk memilih (maks 3).
 * - "Cek" = benar jika 3 titik segaris dan garisnya melewati O(0,0).
 * - Lalu tampilkan rasio y/x untuk memunculkan pola m = y/x.
 */

(function () {
  // ====== Konfigurasi bidang ======
  const W = 640;
  const H = 420;
  const margin = 40;

  // rentang koordinat (grid)
  const xMin = -6, xMax = 6;
  const yMin = -5, yMax = 5;

  // titik kandidat:
  // Kita siapkan beberapa "kelompok segaris dengan O" lewat rasio sama:
  // m = 1/2: (2,1),(4,2),(6,3)
  // m = -1: (1,-1),(3,-3),(5,-5)
  // m = 2: (1,2),(2,4),(3,6) -> batasi yMax 5 jadi pakai (1,2),(2,4)
  // plus titik pengganggu
  const points = [
    { x: 2, y: 1 }, { x: 4, y: 2 }, { x: 6, y: 3 },         // m=1/2
    { x: 1, y: -1 }, { x: 3, y: -3 }, { x: 5, y: -5 },      // m=-1
    { x: 1, y: 2 }, { x: 2, y: 4 },                          // m=2
    { x: -2, y: 1 }, { x: -4, y: 3 },                         // pengganggu
    { x: 4, y: -1 }, { x: -3, y: -2 },                        // pengganggu
  ];

  // pilihan siswa
  let picked = []; // array index points

  // DOM output
  const pickedListEl = document.getElementById("pickedList");
  const ratioListEl = document.getElementById("ratioList");
  const fbEl = document.getElementById("fbSegarisOrigin");

  // ====== Helper math ======
  function gcd(a, b) {
    a = Math.abs(a); b = Math.abs(b);
    while (b) { const t = b; b = a % b; a = t; }
    return a || 1;
  }

  function simplifyFraction(n, d) {
    if (d === 0) return { text: "tidak terdefinisi", n, d };
    if (n === 0) return { text: "0", n: 0, d: 1 };
    const g = gcd(n, d);
    n /= g; d /= g;
    if (d < 0) { d *= -1; n *= -1; }
    const text = (d === 1) ? String(n) : `${n}/${d}`;
    return { text, n, d };
  }

  function ratioText(pt) {
    // y/x
    return simplifyFraction(pt.y, pt.x).text;
  }

  function toScreenX(x) {
    const t = (x - xMin) / (xMax - xMin);
    return margin + t * (W - 2 * margin);
  }

  function toScreenY(y) {
    const t = (y - yMin) / (yMax - yMin);
    // y layar kebalik
    return H - margin - t * (H - 2 * margin);
  }

  function dist2(ax, ay, bx, by) {
    const dx = ax - bx, dy = ay - by;
    return dx * dx + dy * dy;
  }

  // Cek segaris dan lewat origin:
  // Untuk tiga titik A,B,C: segaris jika luas segitiga = 0
  // lewat O berarti A, B, (0,0) segaris -> det(A,B)=0, dan titik-titiknya satu garis yang sama dengan O.
  function isCollinearThroughOrigin(pA, pB, pC) {
    // collinear A,B,C:
    const area2 = pA.x * (pB.y - pC.y) + pB.x * (pC.y - pA.y) + pC.x * (pA.y - pB.y);
    if (area2 !== 0) return false;

    // through origin: det(A,B)=0 and det(A,C)=0
    // det([x1,y1],[x2,y2]) = x1*y2 - y1*x2
    const detAB = pA.x * pB.y - pA.y * pB.x;
    const detAC = pA.x * pC.y - pA.y * pC.x;
    return detAB === 0 && detAC === 0;
  }

  function updatePickedUI() {
    if (picked.length === 0) {
      pickedListEl.textContent = "Belum ada titik dipilih.";
      ratioListEl.innerHTML = "";
      return;
    }

    const pts = picked.map(i => points[i]);
    const labels = pts.map(p => `A(${p.x}, ${p.y})`).join(", ");
    pickedListEl.textContent = labels;

    const ratios = pts.map(p => `<div>y/x untuk (${p.x},${p.y}) = <b>${ratioText(p)}</b></div>`).join("");
    ratioListEl.innerHTML = ratios;
  }

  // expose ke global untuk tombol
  window.resetSegarisOrigin = function () {
    picked = [];
    fbEl.innerHTML = "";
    updatePickedUI();
  };

  window.cekSegarisOrigin = function () {
    fbEl.innerHTML = "";

    if (picked.length !== 3) {
      fbEl.innerHTML = `<div class="alert alert-warning" style="border-radius:14px;">
        Pilih tepat <b>3 titik</b> dulu ya. Sekarang baru <b>${picked.length}</b>.
      </div>`;
      return;
    }

    const pA = points[picked[0]];
    const pB = points[picked[1]];
    const pC = points[picked[2]];

    const ok = isCollinearThroughOrigin(pA, pB, pC);

    if (!ok) {
      fbEl.innerHTML = `<div class="alert alert-danger" style="border-radius:14px;">
        Belum tepat. Tiga titikmu <b>tidak segaris lewat O(0,0)</b>.
        Coba cari tiga titik yang punya <b>nilai y/x sama</b>.
      </div>`;
      return;
    }

    // Jika segaris lewat origin, tunjukkan pola rasio sama
    const rA = simplifyFraction(pA.y, pA.x);
    const rB = simplifyFraction(pB.y, pB.x);
    const rC = simplifyFraction(pC.y, pC.x);

    // ambil satu representasi
    const m = rA.text;

    fbEl.innerHTML = `<div class="alert alert-success" style="border-radius:14px;">
      <b>Benar!</b> Ketiga titik berada pada <b>satu garis</b> dan garisnya melewati <b>O(0,0)</b>.<br>
      Perhatikan: nilai <b>y/x</b> ketiganya sama, yaitu <b>${m}</b>.<br>
      Jadi gradien garis dari O ke A dapat ditulis sebagai <b>m = y/x</b>.
    </div>`;
  };

  // ====== p5 sketch ======
  new p5((p) => {
    p.setup = function () {
      const canvas = p.createCanvas(W, H);
      canvas.parent("segaris-origin-canvas");
      updatePickedUI();
    };

    function drawAxes() {
      p.background(255);

      // grid tipis
      p.stroke(235);
      p.strokeWeight(1);
      for (let x = xMin; x <= xMax; x++) {
        const sx = toScreenX(x);
        p.line(sx, margin, sx, H - margin);
      }
      for (let y = yMin; y <= yMax; y++) {
        const sy = toScreenY(y);
        p.line(margin, sy, W - margin, sy);
      }

      // axis tebal
      p.stroke(80);
      p.strokeWeight(2);
      // sumbu x (y=0)
      p.line(margin, toScreenY(0), W - margin, toScreenY(0));
      // sumbu y (x=0)
      p.line(toScreenX(0), margin, toScreenX(0), H - margin);

      // label origin
      p.noStroke();
      p.fill(60);
      p.textSize(12);
      p.text("O(0,0)", toScreenX(0) + 6, toScreenY(0) - 6);
    }

    function drawSelectedLines() {
      // gambar garis dari origin ke titik terpilih (biar pola kelihatan)
      const ox = toScreenX(0);
      const oy = toScreenY(0);

      picked.forEach((idx) => {
        const pt = points[idx];
        const sx = toScreenX(pt.x);
        const sy = toScreenY(pt.y);
        p.strokeWeight(2);
        p.stroke(46, 117, 182); // sama tone biru, aman
        p.line(ox, oy, sx, sy);
      });
    }

    function drawPoints() {
      points.forEach((pt, i) => {
        const sx = toScreenX(pt.x);
        const sy = toScreenY(pt.y);

        const isPicked = picked.includes(i);

        // titik
        p.stroke(50);
        p.strokeWeight(1);
        if (isPicked) {
          p.fill(34, 185, 105); // hijau dipilih
          p.ellipse(sx, sy, 14, 14);
        } else {
          p.fill(255);
          p.ellipse(sx, sy, 12, 12);
        }

        // label kecil
        p.noStroke();
        p.fill(60);
        p.textSize(11);
        p.text(`(${pt.x},${pt.y})`, sx + 6, sy - 6);
      });
    }

    p.draw = function () {
      drawAxes();
      drawSelectedLines();
      drawPoints();
    };

    p.mousePressed = function () {
      // cek klik dekat titik mana
      let clickedIndex = -1;
      for (let i = 0; i < points.length; i++) {
        const pt = points[i];
        const sx = toScreenX(pt.x);
        const sy = toScreenY(pt.y);
        if (dist2(p.mouseX, p.mouseY, sx, sy) < 14 * 14) {
          clickedIndex = i;
          break;
        }
      }
      if (clickedIndex === -1) return;

      // toggle pilih
      if (picked.includes(clickedIndex)) {
        picked = picked.filter((x) => x !== clickedIndex);
      } else {
        // maks 3 titik
        if (picked.length >= 3) return;
        picked.push(clickedIndex);
      }

      fbEl.innerHTML = "";
      updatePickedUI();
    };
  });
})();
