
const pongBoard = document.getElementById("gameCanvas");
const ctx = pongBoard.getContext("2d");
pongBoard.width = 670;
pongBoard.height = 400;
let startButton = document.getElementById("start-button");
let cancelGame = false;
let keys = {};
// get a random color in rgb
function getRandomColor(){
    let myRed = Math.floor(Math.random() * 256);
    let myGreen = Math.floor(Math.random() * 256);
    let myBlue = Math.floor(Math.random() * 256);
    return [myRed, myGreen, myBlue];
}
// bricks
let brickRowCount = 5;
let brickColumnCount = 10;
let brickHeight = 20;
let brickWidth = 60;
let brickPadding = 5;
let brickTopOffset = 10;
let brickLeftOffset = 10;
let bricks = {};
// create the bricks objects

// draw the bricks
function drawBricks(){
    for (let colI = 0; colI < brickColumnCount; colI++) {
        for (let rowI = 0; rowI < brickRowCount; rowI++) {
            let brick = bricks[colI][rowI];
            if (brick.status === 1){
                let brickX = (colI * (brickWidth + brickPadding)) + brickLeftOffset;
                let brickY = (rowI * (brickHeight + brickPadding)) + brickTopOffset;
                brick.x = brickX;
                brick.y = brickY;
                ctx.beginPath();
                ctx.rect(brickX, brickY, brickWidth, brickHeight);
                ctx.fillStyle = 'rgb(' + brick.color.red + ',' + brick.color.green + ',' + brick.color.blue + ')';
                ctx.fill();
                ctx.closePath();
            }
        }
    }
}
// handle the bricks collisions
function bricksCollisionDetection(){
    for (let colI = 0; colI < brickColumnCount; colI++) {
        for (let rowI = 0; rowI < brickRowCount; rowI++) {
            let brick = bricks[colI][rowI];
            if (brick.status === 1){
                if ((ball.x > brick.x && ball.x < brick.x + brickWidth) && (ball.y > brick.y && ball.y < brick.y + brickHeight)){
                    ball.gravity = ball.gravity * -1;
                    brick.status = 0;
                }
            }
        }
    }
}
// constructor
function Box(option){
    this.x = option.x || 10;
    this.y = option.y || 10;
    this.width = option.width || 40;
    this.height = option.height || 50;
    this.color = option.color || '#000000';
    this.speed = option.speed || 2;
    this.gravity = option.gravity || 2;
    this.reset = option.reset;
}

// paddle object
let paddle = new Box({
    x: (pongBoard.width / 2),
    y: (pongBoard.height - 20),
    width: 100,
    height: 20,
    color: '#000000',
    speed: 8,
    reset: function (){
        this.x = (pongBoard.width / 2);
        this.y = (pongBoard.height - 20);
        this.width = 100;
        this.height = 20;
        this.color = '#000000';
        this.speed = 8;
    }
});
// ball object
let ball = new Box({
    x: (pongBoard.width / 2),
    y: (pongBoard.height / 2),
    width: 25,
    height: 25,
    color: '#FF0000',
    speed: 1,
    gravity: -1,
    reset: function (){
        this.x = (pongBoard.width / 2);
        this.y = (pongBoard.height / 2);
        this.width = 25;
        this.height = 25;
        this.color = '#FF0000';
        this.speed = 1;
        this.gravity = -1;
    }
});
// collisions on x axis
function ballBounce(){
    if (((ball.x+ball.speed) <= 0) || ((ball.x+ball.speed+ball.width) >= pongBoard.width)){
        ball.speed = ball.speed * -1;
        ball.y += ball.gravity;
        ball.x += ball.speed;
    } else {
        ball.x += ball.speed;
        ball.y += ball.gravity
    }
    ballCollision();
}
// collisions and lose test on the y axis
function ballCollision(){
    if (((ball.y+ball.gravity) <= 0) || ((ball.y + ball.gravity >= paddle.y) && ((ball.x + ball.speed > paddle.x) && (ball.x + ball.speed <= paddle.x + paddle.width)))){
        // il the ball touches the paddle then just bounce
        ball.gravity = ball.gravity*-1;
    }else if (ball.y + ball.gravity > paddle.y){
        // if the ball is under the paddle then cancel the game
        cancelGame = true;
    }else{
        ball.x += ball.speed;
        ball.y += ball.gravity;
    }
    draw();
}
function paddleMovement(){
    if ('q' in keys){
        if (paddle.x - paddle.speed > 0){
            paddle.x -= paddle.speed;
        }
    }else if ('d' in keys){
        if(paddle.x + paddle.width + paddle.speed < pongBoard.width){
            paddle.x += paddle.speed;
        }
    }
    if('ArrowLeft' in keys){
        if (paddle.x - paddle.speed > 0){
            paddle.x -= paddle.speed;
        }
    }else if ('ArrowRight' in keys){
        if(paddle.x + paddle.width + paddle.speed < pongBoard.width){
            paddle.x += paddle.speed;
        }
    }

}
// function to draw the shapes
function drawBox(box, type) {
    if (type === 'rect'){
        ctx.fillStyle = box.color;
        ctx.fillRect(box.x, box.y, box.width, box.height);
    }else if (type === 'arc'){
        let circle = new Path2D();
        ctx.fillStyle = box.color;
        circle.arc(box.x, box.y, (box.width / 2), 0, 2 * Math.PI);
        ctx.fill(circle);
    }
}
// function re-draw the board with the right values when updated
function draw(){
    ctx.clearRect(0, 0, pongBoard.width, pongBoard.height);
    drawBox(paddle, 'rect');
    drawBox(ball, 'arc');
}
// start the game
function startGame(){
    for (let colI = 0; colI < brickColumnCount; colI++) {
        bricks[colI] = {};
        for (let rowI = 0; rowI < brickRowCount; rowI++) {
            bricks[colI][rowI] = {
                x: 0,
                y: 0,
                status: 1,
                color: {red: getRandomColor()[0], green: getRandomColor()[1], blue: getRandomColor()[2]}
            };
        }
    }
    // loop until the game is cancelled
    function loop(){
        if (cancelGame === true){
            window.cancelAnimationFrame(loop);
            alert('you lost');
            ctx.clearRect(0, 0, pongBoard.width, pongBoard.height);
            paddle.reset();
            ball.reset();
            cancelGame = false;
        }else{
            ballBounce();
            paddleMovement();
            drawBricks();
            bricksCollisionDetection();
            window.requestAnimationFrame(loop);
        }
    }
    loop();
}

// event listeners
window.addEventListener('keydown', function (e) {
    keys[e.key] = true;
    e.preventDefault();
});
window.addEventListener('keyup', function (e) {
    delete keys[e.key];
});
startButton.addEventListener("click", startGame);
