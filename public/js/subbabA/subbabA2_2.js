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
};

p.mousePressed = function() {
    const pt = pixelToCoord(p.mouseX, p.mouseY);
    if (!pt) return;

    if (!titikA) {
        titikA = pt;
        return;
    }

    if (!titikB) {
        titikB = pt;
        plottingSelesai = true;
        plottingBenar =
            isCorrectPair(titikA, titikB, expectedA1, expectedB1);
    }
};

function drawPoint(x, y, label) {
    const px = toPixelX(x);
    const py = toPixelY(y);
    p.circle(px, py, 10);
    p.text(label, px + 8, py - 4);
}

function drawLineThroughPoints(p1, p2) {
    const seg = getClippedLineSegmentInBox(
        p1.x, p1.y, p2.x, p2.y
    );
    if (!seg) return;

    p.line(
        toPixelX(seg.p1.x), toPixelY(seg.p1.y),
        toPixelX(seg.p2.x), toPixelY(seg.p2.y)
    );
}


