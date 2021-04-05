// 首頁
const pageIndex = document.querySelector('.page-index');
// 首頁-元素
const startButton = document.querySelector('button.start');

// 遊戲頁面
const pageGame = document.querySelector('.page-game');
// 遊戲頁面-元素
const gameContainer = document.querySelector('.game-container');
const timer = document.querySelector('.timer');
const pauseStart = document.querySelector('.pause-start');

// 暫停頁面
const pagePause = document.querySelector('button.page-pause');

// 結算頁面
const pageResult = document.querySelector('.page-result');
// 結算頁面-元素
const score = document.querySelector('.score');
const restartButton = document.querySelector('button.re-start');

// 紀錄用參數
let initBlocks = 2;
let gameScore = 0;
let gameTime = 60;
let pauseSwitch = true;

function pageOpen(page) {
    pageIndex.style.display = page == pageIndex ? 'block' : 'none';
    pageGame.style.display = page == pageGame ? 'block' : 'none';
    pagePause.style.display = page == pagePause ? 'block' : 'none';
    pageResult.style.display = page == pageResult ? 'block' : 'none';
}

function startButtonFunction() {
    pageOpen(pageGame);
    creatBlock(initBlocks);
    timerFunction();
}

function pauseStartFunction() {
    pageOpen(pagePause);
    pauseSwitch = !pauseSwitch;
}

function pauseEndFunction() {
    pageOpen(pageGame);
    pauseSwitch = !pauseSwitch;
}

function keyBlockFunction() {
    initBlocks += 0.3334
    gameScore++;
    creatBlock(Math.floor(initBlocks));
}

function creatBlock(blocks) {
    // gameBlock = Array();
    gameBlock = '';
    for (let index = 0; index < blocks ** 2; index++) {
        gameBlock += '<div class="game"></div>';
    }
    gameContainer.innerHTML = gameBlock;

    var gameBlockStyle = document.getElementsByClassName('game');

    // 天選方塊
    var chosenOne = Math.floor(Math.random() * gameBlockStyle.length);

    // 隨機色碼
    var colorR = Math.round(Math.random() * 255);
    var colorG = Math.round(Math.random() * 255);
    var colorB = Math.round(Math.random() * 255);

    // 難度系數
    var difficult = Math.min(90, (50 + gameScore * 3));

    for (let index = 0; index < gameBlockStyle.length; index++) {
        gameBlockStyle[index].style.width = `calc((100% / ${blocks}) - 10px)`;
        gameBlockStyle[index].style.height = `calc((100% / ${blocks}) - 10px)`;
        gameBlockStyle[index].style.backgroundColor = `rgb(${colorR}, ${colorG}, ${colorB})`;
        gameBlockStyle[index].style.margin = '5px';
        gameBlockStyle[index].style.borderRadius = '3px';
        if (index == chosenOne) {
            gameBlockStyle[index].style.opacity = `${difficult}%`;
            gameBlockStyle[index].setAttribute('onclick', 'keyBlockFunction();');
        }
    }
}

function timerFunction() {
    var t = setInterval(function () {
        if (pauseSwitch) {
            timer.innerHTML = `${gameTime} 秒`
            gameTime--;
            if (gameTime < 0) {
                clearInterval(t);
                score.innerHTML = `分數 : ${gameScore}`
                pageOpen(pageResult);
                initBlocks = 2;
                gameScore = 0;
                gameTime = 60;
            }
        }
    }, 1000);
}

// 首頁
pageOpen(pageIndex);
// 按下開始按鈕
startButton.setAttribute('onclick', 'startButtonFunction();');

// 按下暫停按鈕
pauseStart.setAttribute('onclick', 'pauseStartFunction();');

// 按下繼續按鈕
pagePause.setAttribute('onclick', 'pauseEndFunction();');

// 按下重玩按鈕
restartButton.setAttribute('onclick', 'startButtonFunction();');