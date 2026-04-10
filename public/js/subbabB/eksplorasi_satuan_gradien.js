/**
 * Interaktif: Hitung gradien dari kotak satuan.
 * - Klik 2 titik (grid integer).
 * - Hitung Δx, Δy dengan tanda.
 * - Tampilkan m = Δy/Δx (sederhana).
 */

(function () {
    const W = 640,
        H = 420,
        margin = 40;
    const xMin = -6,
        xMax = 6;
    const yMin = -5,
        yMax = 5;

    let p1 = null;
    let p2 = null;
    let sudahInit = false;

    const elPt1 = document.getElementById("pt1");
    const elPt2 = document.getElementById("pt2");
    const elDx = document.getElementById("dxVal");
    const elDy = document.getElementById("dyVal");
    const elM = document.getElementById("mVal");
    const elType = document.getElementById("mType");
    const elNote = document.getElementById("noteUndef");
    const elFb = document.getElementById("fbSatuan");

    function toScreenX(x) {
        const t = (x - xMin) / (xMax - xMin);
        return margin + t * (W - 2 * margin);
    }

    function toScreenY(y) {
        const t = (y - yMin) / (yMax - yMin);
        return H - margin - t * (H - 2 * margin);
    }

    function fromScreenToGrid(px, py) {
        const tx = (px - margin) / (W - 2 * margin);
        const ty = (H - margin - py) / (H - 2 * margin);
        const x = xMin + tx * (xMax - xMin);
        const y = yMin + ty * (yMax - yMin);
        return { x: Math.round(x), y: Math.round(y) };
    }

    function gcd(a, b) {
        a = Math.abs(a);
        b = Math.abs(b);
        while (b) {
            const t = b;
            b = a % b;
            a = t;
        }
        return a || 1;
    }

    function formatFrac(n, d) {
        if (d === 0) return "tidak terdefinisi";
        if (n === 0) return "0";
        let g = gcd(n, d);
        n /= g;
        d /= g;
        if (d < 0) {
            d *= -1;
            n *= -1;
        }
        if (d === 1) return String(n);
        return `${n}/${d}`;
    }

    function slopeType(dy, dx) {
        if (dx === 0) return { txt: "tak terdefinisi", cls: "bg-dark" };
        const val = dy / dx;
        if (val > 0) return { txt: "positif", cls: "bg-primary" };
        if (val < 0) return { txt: "negatif", cls: "bg-danger" };
        return { txt: "nol", cls: "bg-secondary" };
    }

    function updateUI() {
        elFb.innerHTML = "";

        elPt1.textContent = p1 ? `(${p1.x}, ${p1.y})` : "-";
        elPt2.textContent = p2 ? `(${p2.x}, ${p2.y})` : "-";

        if (!p1 || !p2) {
            elDx.textContent = "-";
            elDy.textContent = "-";
            elM.textContent = "-";
            elType.textContent = "-";
            elType.className = "badge bg-secondary";
            elNote.style.display = "none";
            return;
        }

        const dx = p2.x - p1.x;
        const dy = p2.y - p1.y;

        elDx.textContent = dx;
        elDy.textContent = dy;
        elM.textContent = formatFrac(dy, dx);

        const t = slopeType(dy, dx);
        elType.textContent = t.txt;
        elType.className = `badge ${t.cls}`;

        elNote.style.display = dx === 0 ? "block" : "none";
    }

    window.resetSatuanGradien = function () {
        p1 = null;
        p2 = null;
        updateUI();
    };

    window.initSatuanGradien = function () {
        if (sudahInit) return;
        sudahInit = true;

        new p5((p) => {
            p.setup = function () {
                const canvas = p.createCanvas(W, H);
                canvas.parent("satuan-gradien-canvas");
                updateUI();
            };

            function drawGrid() {
                p.background(255);

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

                p.stroke(80);
                p.strokeWeight(2);
                p.line(margin, toScreenY(0), W - margin, toScreenY(0));
                p.line(toScreenX(0), margin, toScreenX(0), H - margin);

                p.noStroke();
                p.fill(60);
                p.textSize(12);
                p.text("x", W - margin + 10, toScreenY(0) + 4);
                p.text("y", toScreenX(0) + 6, margin - 10);
                p.text("O(0,0)", toScreenX(0) + 6, toScreenY(0) - 6);
            }

            function drawPoint(pt, label) {
                const sx = toScreenX(pt.x);
                const sy = toScreenY(pt.y);
                p.stroke(50);
                p.strokeWeight(1);
                p.fill(34, 185, 105);
                p.ellipse(sx, sy, 14, 14);

                p.noStroke();
                p.fill(60);
                p.textSize(12);
                p.text(`${label}(${pt.x},${pt.y})`, sx + 8, sy - 8);
            }

            function drawLineAndSteps() {
                if (!p1 || !p2) return;

                const x1 = toScreenX(p1.x),
                    y1 = toScreenY(p1.y);
                const x2 = toScreenX(p2.x),
                    y2 = toScreenY(p2.y);

                p.stroke(46, 117, 182);
                p.strokeWeight(3);
                p.line(x1, y1, x2, y2);

                p.stroke(120);
                p.strokeWeight(2);
                p.line(x1, y1, x2, y1);
                p.line(x2, y1, x2, y2);

                p.noStroke();
                p.fill(80);
                p.textSize(12);
                p.text(`Δx = ${p2.x - p1.x}`, (x1 + x2) / 2, y1 - 6);
                p.text(`Δy = ${p2.y - p1.y}`, x2 + 6, (y1 + y2) / 2);
            }

            p.draw = function () {
                drawGrid();
                drawLineAndSteps();
                if (p1) drawPoint(p1, "P1");
                if (p2) drawPoint(p2, "P2");

                p.noStroke();
                p.fill(100);
                p.textSize(12);
                p.text("Klik 2 titik pada grid.", margin, H - 12);
            };

            p.mousePressed = function () {
                if (
                    p.mouseX < margin ||
                    p.mouseX > W - margin ||
                    p.mouseY < margin ||
                    p.mouseY > H - margin
                )
                    return;

                const g = fromScreenToGrid(p.mouseX, p.mouseY);

                if (!p1) p1 = g;
                else if (!p2) p2 = g;
                else {
                    p1 = g;
                    p2 = null;
                }

                updateUI();
            };
        });
    };
})();
