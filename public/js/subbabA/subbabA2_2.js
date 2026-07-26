const sketchLatihan1 = (p) => {
            const gridSize = 420;
            const leftMargin = 40;
            const topMargin = 40;

            const xMin = -4;
            const xMax = 4;
            const yMin = -2;
            const yMax = 6;

            let originX, originY, scaleUnit;
            let titikA = null;
            let titikB = null;

            let plottingSelesai = false;
            let plottingBenar = false;
            let waktuReset = null;

            let feedbackPlot =
                "Klik dua titik potong yang benar pada bidang koordinat.";

            p.setup = function() {
                p.createCanvas(500, 500);

                scaleUnit = gridSize / Math.max(xMax - xMin, yMax - yMin);
                originX = leftMargin + (-xMin * scaleUnit);
                originY = topMargin + (yMax * scaleUnit);
            };

            p.draw = function() {
                p.background(255);

                drawGrid();

                if (titikA) drawPoint(titikA.x, titikA.y, "A");
                if (titikB) drawPoint(titikB.x, titikB.y, "B");

                if (titikA && titikB) {
                    drawLineThroughPoints(titikA, titikB);
                }

                if (waktuReset !== null && p.millis() >= waktuReset) {
                    resetPlot();
                    waktuReset = null;
                }
            };

            p.mousePressed = async function() {
                if (!latihan1BenarA22) return;

                const pt = pixelToCoord(p.mouseX, p.mouseY);
                if (!pt) return;

                if (waktuReset !== null) return;

                if (!titikA) {
                    titikA = pt;
                    feedbackPlot = `Titik A dipilih di ${formatPoint(pt)}. Sekarang klik titik kedua.`;
                    setStatusPlotLatihan(
                        "statusPlotLatihan1A22",
                        `Titik A dipilih di <b>${formatPoint(pt)}</b>. Sekarang klik titik kedua.`
                    );
                    return;
                }

                if (!titikB) {
                    if (isSamePoint(pt, titikA)) {
                        feedbackPlot =
                            "Titik kedua tidak boleh sama dengan titik pertama.";
                        return;
                    }

                    titikB = pt;
                    plottingSelesai = true;

                    if (isCorrectPair(titikA, titikB, expectedA1, expectedB1)) {
                        plottingBenar = true;
                        feedbackPlot =
                            "Bagus! Garis yang kamu buat sudah melalui dua titik potong yang benar.";
                        setStatusPlotLatihan(
                            "statusPlotLatihan1A22",
                            "Bagus! Garis yang kamu buat sudah melalui titik <b>(-2, 0)</b> dan <b>(0, 4)</b>."
                        );

                        const nextBtn = document.getElementById("nextBtnLatihan1");
                        if (nextBtn) {
                            nextBtn.disabled = false;
                            nextBtn.style.display = "inline-block";
                        }

                        await simpanProgressLatihan(
                            `${MATERI_SLUG}_L1`,
                            "grafik", {
                                ...ambilJawabanLatihan1A22(),
                                titikA: titikA,
                                titikB: titikB,
                                plottingBenar: true,
                            },
                            true
                        );

                        setTimeout(() => {
                            scrollKeStep("nextBtnLatihan1");
                        }, 300);
                    } else {
                        plottingBenar = false;
                        feedbackPlot = "Garis belum sesuai. Coba lagi sampai benar.";
                        setStatusPlotLatihan(
                            "statusPlotLatihan1A22",
                            "Garis belum sesuai. Coba klik titik <b>(-2, 0)</b> dan <b>(0, 4)</b>."
                        );
                        waktuReset = p.millis() + 1200;
                    }
                }
            };

            function resetPlot() {
                titikA = null;
                titikB = null;
                plottingSelesai = false;
                plottingBenar = false;
                feedbackPlot =
                    "Klik dua titik potong yang benar pada bidang koordinat.";
            }

            // Restore Plot
            window.restorePlotLatihan1A22 = function(saved) {
                if (!saved || !saved.titikA || !saved.titikB) return;

                titikA = saved.titikA;
                titikB = saved.titikB;
                plottingSelesai = true;
                plottingBenar = true;
                waktuReset = null;

                feedbackPlot =
                    "Jawaban grafik Latihan 1 sudah tersimpan. Garis sudah melalui dua titik potong yang benar.";

                const nextBtn = document.getElementById("nextBtnLatihan1");
                if (nextBtn) {
                    nextBtn.disabled = false;
                    nextBtn.style.display = "inline-block";
                }
            };

            function isSamePoint(p1, p2) {
                return p1 && p2 && p1.x === p2.x && p1.y === p2.y;
            }

            function isPointEqual(p1, p2) {
                return p1.x === p2.x && p1.y === p2.y;
            }

            function isCorrectPair(a, b, expected1, expected2) {
                return (
                    (isPointEqual(a, expected1) && isPointEqual(b, expected2)) ||
                    (isPointEqual(a, expected2) && isPointEqual(b, expected1))
                );
            }

            function formatPoint(pt) {
                return `(${pt.x},${pt.y})`;
            }

            function drawGrid() {
                p.stroke(230);
                p.strokeWeight(1);

                for (let x = xMin; x <= xMax; x++) {
                    const px = toPixelX(x);
                    p.line(px, topMargin, px, topMargin + gridSize);
                }

                for (let y = yMin; y <= yMax; y++) {
                    const py = toPixelY(y);
                    p.line(leftMargin, py, leftMargin + gridSize, py);
                }

                // sumbu x
                if (yMin <= 0 && yMax >= 0) {
                    p.stroke(0);
                    p.strokeWeight(2);
                    p.line(leftMargin, toPixelY(0), leftMargin + gridSize, toPixelY(0));
                }

                // sumbu y
                if (xMin <= 0 && xMax >= 0) {
                    p.stroke(0);
                    p.strokeWeight(2);
                    p.line(toPixelX(0), topMargin, toPixelX(0), topMargin + gridSize);
                }

                p.noStroke();
                p.fill(0);
                p.textAlign(p.CENTER, p.CENTER);
                p.textSize(12);

                for (let x = xMin; x <= xMax; x++) {
                    const px = toPixelX(x);
                    if (x !== 0) p.text(x, px, toPixelY(0) + 18);
                }

                for (let y = yMin; y <= yMax; y++) {
                    const py = toPixelY(y);
                    if (y !== 0) p.text(y, toPixelX(0) - 18, py);
                }

                p.text("0", toPixelX(0) - 10, toPixelY(0) + 18);

                p.textSize(16);
                p.text("X", leftMargin + gridSize + 16, toPixelY(0));
                p.text("Y", toPixelX(0), topMargin - 16);
            }

            function drawPoint(x, y, label) {
                const px = toPixelX(x);
                const py = toPixelY(y);

                p.fill(220, 0, 0);
                p.noStroke();
                p.circle(px, py, 10);

                p.fill(0);
                p.textAlign(p.LEFT, p.BOTTOM);
                p.textSize(13);
                p.text(label, px + 8, py - 4);
            }

            function drawLineThroughPoints(p1, p2) {
                if (p1.x === p2.x && p1.y === p2.y) return;

                const seg = getClippedLineSegmentInBox(p1.x, p1.y, p2.x, p2.y);
                if (!seg) return;

                p.stroke(
                    plottingSelesai ?
                    plottingBenar ?
                    p.color(30, 150, 70) :
                    p.color(220, 80, 80) :
                    p.color(30, 120, 255),
                );
                p.strokeWeight(3);

                p.line(
                    toPixelX(seg.p1.x),
                    toPixelY(seg.p1.y),
                    toPixelX(seg.p2.x),
                    toPixelY(seg.p2.y),
                );
            }

            function getClippedLineSegmentInBox(x1, y1, x2, y2) {
                if (x1 === x2) {
                    if (x1 < xMin || x1 > xMax) return null;

                    return {
                        p1: {
                            x: x1,
                            y: yMin
                        },
                        p2: {
                            x: x1,
                            y: yMax
                        },
                    };
                }

                const m = (y2 - y1) / (x2 - x1);
                const c = y1 - m * x1;

                const candidates = [{
                        x: xMin,
                        y: m * xMin + c
                    },
                    {
                        x: xMax,
                        y: m * xMax + c
                    },
                ];

                if (m !== 0) {
                    candidates.push({
                        x: (yMin - c) / m,
                        y: yMin
                    });
                    candidates.push({
                        x: (yMax - c) / m,
                        y: yMax
                    });
                } else {
                    if (c < yMin || c > yMax) return null;

                    return {
                        p1: {
                            x: xMin,
                            y: c
                        },
                        p2: {
                            x: xMax,
                            y: c
                        },
                    };
                }

                const inside = candidates.filter(
                    (pt) =>
                    pt.x >= xMin &&
                    pt.x <= xMax &&
                    pt.y >= yMin &&
                    pt.y <= yMax
                );

                if (inside.length < 2) return null;

                let bestPair = [inside[0], inside[1]];
                let bestDist = -1;

                for (let i = 0; i < inside.length; i++) {
                    for (let j = i + 1; j < inside.length; j++) {
                        const dx = inside[i].x - inside[j].x;
                        const dy = inside[i].y - inside[j].y;
                        const d2 = dx * dx + dy * dy;

                        if (d2 > bestDist) {
                            bestDist = d2;
                            bestPair = [inside[i], inside[j]];
                        }
                    }
                }

                return {
                    p1: bestPair[0],
                    p2: bestPair[1],
                };
            }

            function pixelToCoord(px, py) {
                if (
                    px < leftMargin ||
                    px > leftMargin + gridSize ||
                    py < topMargin ||
                    py > topMargin + gridSize
                ) {
                    return null;
                }

                let x = Math.round((px - originX) / scaleUnit);
                let y = Math.round((originY - py) / scaleUnit);

                x = p.constrain(x, xMin, xMax);
                y = p.constrain(y, yMin, yMax);

                return {
                    x,
                    y
                };
            }

            function toPixelX(x) {
                return originX + x * scaleUnit;
            }

            function toPixelY(y) {
                return originY - y * scaleUnit;
            }
        };
