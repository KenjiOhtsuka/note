---
layout: page
---

# Simple Breakout

<canvas id="gameArea" width="320" height="400" style="border: solid 1px black;"></canvas>

<script>
var canvas = document.getElementById('gameArea');
var ctx    = canvas.getContext('2d');

var paddleVelocity = 0.7;
var ballVelocity = 0.2;
var updateSpan = 10;

var ballRadius = 10;
var x = canvas.width / 2;
var y = canvas.height - 30;
var dx = ballVelocity * updateSpan;
var dy = - ballVelocity * updateSpan;
var dp = paddleVelocity * updateSpan;

var paddleHeight = 10;
var paddleWidth = 75;
var paddleX = canvas.width / 2;

var rightPressed = false;
var leftPressed = false;

var brickRowCount = 3;
var brickColumnCount = 4;
var brickWidth = 60;
var brickHeight = 20;
var brickPadding = 8;
var brickOffsetTop = 30;
var brickOffsetLeft = 30;

var bricks = [];
for (var c = 0; c < brickColumnCount; ++c) {
    bricks[c] = [];
    for (var r = 0; r < brickRowCount; ++r)
        bricks[c][r] = {x: 0, y: 0, status: 1};
}

var score = 0;

function drawScore() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#0095DD";
    ctx.fillText("Score: " + score.toString(), 8, 20);
}

function updateBlockStatuses() {
    for (var c = 0; c < brickColumnCount; ++c) {
        for (var r = 0; r < brickRowCount; ++r) {
            var b = bricks[c][r];
            if (b.status == 1) {
                if (x > b.x && x < b.x + brickWidth + ballRadius && y > b.y - ballRadius && y < b.y + brickHeight + ballRadius) {
                    b.status = 0;
                    dy = - dy;
                    score += 10;
                    if (score == brickColumnCount * brickRowCount * 10) {
                        // win
                    }
                }
            }
        }
    }
}

function drawBricks() {
    for (var c = 0; c < brickColumnCount; ++c) {
        for (var r = 0; r < brickRowCount; ++r) {
            if (bricks[c][r].status == 1) {
                bricks[c][r].x = c * (brickWidth + brickPadding)  + brickOffsetLeft;
                bricks[c][r].y = r * (brickHeight + brickPadding) + brickOffsetTop;
                ctx.beginPath();
                ctx.rect(bricks[c][r].x, bricks[c][r].y, brickWidth, brickHeight);
                ctx.fillStyle = 'gray';
                ctx.fill();
                ctx.closePath();
            }
        }
    }
}


function keyDownHandler(e) {
    if (e.keyCode == 39) rightPressed = true;
    if (e.keyCode == 37) leftPressed = true;
}

function keyUpHandler(e) {
    if (e.keyCode == 39) rightPressed = false;
    if (e.keyCode == 37) leftPressed = false;
}

function mouseMoveHandler(e) {
    var relativeX = e.clientX - canvas.offsetLeft;
    if (relativeX > 0 && relativeX < canvas.width) {
        paddleX = relativeX - paddleWidth / 2;
    }
}

document.addEventListener('keydown', keyDownHandler, false);
document.addEventListener('keyup', keyUpHandler, false);
document.addEventListener('mousemove', mouseMoveHandler, false);

function drawBall() {
    ctx.beginPath();
    ctx.arc(x, y, ballRadius, 0, Math.PI * 2);
    ctx.fillStyle = "#009500";
    ctx.fill();
    ctx.closePath();
}

function drawPaddle() {
    ctx.beginPath();
    ctx.rect(paddleX, canvas.height - paddleHeight, paddleWidth, paddleHeight);
    ctx.fillStle = "blue";
    ctx.fill();
    ctx.closePath();
}

function movePaddle() {
    if (rightPressed && paddleX < canvas.width - paddleWidth) {
        paddleX += dp;
        return;
    }
    if (leftPressed && paddleX > 0) paddleX -= dp;
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    updateBlockStatuses();
    drawBricks();
    drawBall();
    //checkGameOver();
    updateBallDirection();
    movePaddle();
    drawPaddle();
    drawScore();
    x += dx;
    y += dy;
requestAnimationFrame(draw);
}

function checkGameOver() {
    if (y + dy > canvas.height - ballRadius) alert("GAME OVER");
}

function updateBallDirection() {
    if (y + dy < ballRadius) {
        dy = - dy;
    } else {
        if (y + dy > canvas.height - ballRadius) 
            if (x > paddleX && x < paddleX + paddleWidth)
                dy = - dy;
    }
    if (x + dx < ballRadius || x + dx > canvas.width - ballRadius) dx = - dx;
}
draw();
</script>

