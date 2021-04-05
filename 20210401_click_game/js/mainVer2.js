// 首頁
const pageIndex = document.querySelector('.page-index');

const startButton = document.querySelector('button.start');

// 遊戲頁面
const pageGame = document.querySelector('.page-game');

const gameContainer = document.querySelector('.game-container');
const timer = document.querySelector('.timer');
const pauseStart = document.querySelector('.pause-start');

// 暫停頁面
const pagePause = document.querySelector('button.page-pause');

// 結算頁面
const pageResult = document.querySelector('.page-result');

const score = document.querySelector('.score');
const restartButton = document.querySelector('button.re-start');

function pageOpen(page) {
    pageIndex.style.display = page == pageIndex ? 'block' : 'none';
    pageGame.style.display = page == pageGame ? 'block' : 'none';
    pagePause.style.display = page == pagePause ? 'block' : 'none';
    pageResult.style.display = page == pageResult ? 'block' : 'none';
}

pageOpen(pageIndex);

function startButtonFunction() {
    pageOpen(pageGame);
}

startButton.setAttribute('onclick', 'startButtonFunction();');

function creatBlock() {
    gameBlock = Array();
    '<div class="game"></div>'

}