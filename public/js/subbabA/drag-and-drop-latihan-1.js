window.addEventListener("DOMContentLoaded", () => {
    new p5((p) => {
        const CARD_W = 220;
        const CARD_H = 42;

        let cards = [];
        let slots = [];
        let checkBtn;

        let feedback = "";
        let ok = false;

        const linearAnswers = new Set([
            "2x - y = 3",
            "3y + 3x = 3²",
            "y/3 + 3x = 12",
        ]);

        p.setup = () => {
            const cnv = p.createCanvas(920, 410);
            cnv.parent("p5-linear-drop");

            p.textFont("Arial");

            const equations = [
                "2x - y = 3",
                "x² - y = 4",
                "3y + 3x = 3²",
                "y/3 + 3x = 12",
                "√(4y) + 3x - 6 = 0",
                "y² + x² = 12",
            ];

            let startX = 40;
            let startY = 80;
            let gapY = 12;

            for (let i = 0; i < equations.length; i++) {
                let y = startY + i * (CARD_H + gapY);
                cards.push(
                    new DraggableCard(equations[i], startX, y, CARD_W, CARD_H),
                );
            }

            const boxX = 600;
            const boxY = 120;
            const boxW = 260;
            const boxH = 72;
            const boxGap = 26;

            for (let i = 0; i < 3; i++) {
                slots.push(
                    new Slot(boxX, boxY + i * (boxH + boxGap), boxW, boxH),
                );
            }

            checkBtn = p.createButton("Periksa Jawaban");
            checkBtn.parent("p5-linear-actions");
            checkBtn.addClass("btn-palet");
            checkBtn.addClass("btn-sm"); //
            checkBtn.style("margin-top", "0px");
            checkBtn.mousePressed(checkAnswers);
        };

        p.draw = () => {
            p.background(255);

            p.noStroke();
            p.fill(20);
            p.textSize(16);
            p.text(
                "Seret 3 persamaan GARIS LURUS ke 3 kotak di kanan.",
                40,
                35,
            );

            p.stroke(230);
            p.line(540, 120, 540, 390);
            for (let s of slots) s.draw();
            let dragging = cards.filter((c) => c.dragging);
            let notDragging = cards.filter((c) => !c.dragging);

            for (let c of notDragging) c.draw();
            for (let c of dragging) c.draw();
        };

        p.mousePressed = () => {
            for (let i = cards.length - 1; i >= 0; i--) {
                if (cards[i].hitTest(p.mouseX, p.mouseY)) {
                    const picked = cards.splice(i, 1)[0];
                    cards.push(picked);
                    picked.startDrag(p.mouseX, p.mouseY);
                    break;
                }
            }
        };

        p.mouseDragged = () => {
            for (let c of cards) c.drag(p.mouseX, p.mouseY);
        };

        p.mouseReleased = () => {
            for (let c of cards) {
                if (!c.dragging) continue;

                c.stopDrag();

                let target = null;
                for (let si = 0; si < slots.length; si++) {
                    if (slots[si].contains(p.mouseX, p.mouseY)) {
                        target = si;
                        break;
                    }
                }

                if (target === null) {
                    releaseFromSlot(c);
                    c.returnHome();
                    continue;
                }

                if (slots[target].card && slots[target].card !== c) {
                    const other = slots[target].card;
                    releaseFromSlot(other);
                    other.returnHome();
                }

                placeIntoSlot(c, target);
            }
        };

        function placeIntoSlot(card, slotIndex) {
            releaseFromSlot(card);
            slots[slotIndex].card = card;
            card.assignedSlot = slotIndex;

            const pos = slots[slotIndex].getSnapPosition(card.w, card.h);
            card.x = pos.x;
            card.y = pos.y;
        }

        function releaseFromSlot(card) {
            if (card.assignedSlot === null) return;
            const s = slots[card.assignedSlot];
            if (s && s.card === card) s.card = null;
            card.assignedSlot = null;
        }

        function checkAnswers() {
            const placed = slots.filter((s) => s.card).map((s) => s.card.label);

            const fb = document.getElementById("p5-linear-feedback");

            if (placed.length < 3) {
                ok = false;
                feedback = `Masih kurang: isi semua 3 kotak dulu (baru terisi ${placed.length}).`;
                if (fb) {
                    fb.className = "mt-2 fw-semibold text-danger";
                    fb.textContent = feedback;
                }
                return;
            }

            let correct = 0;
            for (let lbl of placed) if (linearAnswers.has(lbl)) correct++;

            ok = correct === 3;
            feedback = ok
                ? "Benar! 3 persamaan yang kamu pilih adalah garis lurus."
                : `Belum tepat. Yang benar dari pilihanmu: ${correct}/3.`;

            if (fb) {
                fb.className =
                    "mt-2 fw-semibold " + (ok ? "text-success" : "text-danger");
                fb.textContent = feedback;
            }
        }

        class DraggableCard {
            constructor(label, x, y, w, h) {
                this.label = label;
                this.x = x;
                this.y = y;
                this.w = w;
                this.h = h;
                this.homeX = x;
                this.homeY = y;
                this.dragging = false;
                this.offX = 0;
                this.offY = 0;
                this.assignedSlot = null;
            }

            draw() {
                p.stroke(160);
                p.strokeWeight(1);
                p.fill(250);
                p.rect(this.x, this.y, this.w, this.h, 8);

                p.noStroke();
                p.fill(30);
                p.textSize(14);
                p.textAlign(p.LEFT, p.CENTER);
                p.text(this.label, this.x + 12, this.y + this.h / 2);
            }

            hitTest(px, py) {
                return (
                    px >= this.x &&
                    px <= this.x + this.w &&
                    py >= this.y &&
                    py <= this.y + this.h
                );
            }

            startDrag(mx, my) {
                this.dragging = true;
                this.offX = mx - this.x;
                this.offY = my - this.y;
                releaseFromSlot(this);
            }

            drag(mx, my) {
                if (!this.dragging) return;
                this.x = mx - this.offX;
                this.y = my - this.offY;
            }

            stopDrag() {
                this.dragging = false;
            }
            returnHome() {
                this.x = this.homeX;
                this.y = this.homeY;
            }
        }

        class Slot {
            constructor(x, y, w, h) {
                this.x = x;
                this.y = y;
                this.w = w;
                this.h = h;
                this.card = null;
            }

            draw() {
                p.stroke(140);
                p.strokeWeight(2);
                p.fill(245);
                p.rect(this.x, this.y, this.w, this.h, 10);
            }

            contains(px, py) {
                return (
                    px >= this.x &&
                    px <= this.x + this.w &&
                    py >= this.y &&
                    py <= this.y + this.h
                );
            }

            getSnapPosition(cardW, cardH) {
                return {
                    x: this.x + (this.w - cardW) / 2,
                    y: this.y + (this.h - cardH) / 2,
                };
            }
        }
    }, "p5-linear-drop");
});
