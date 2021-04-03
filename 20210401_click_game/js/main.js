
// 關卡參數
var gameLevel = 0;
// 格數參數
var blockCount = 2;
// 難度參數
var difficulty = 0.5

function insertBlock(count) {
    // 在game插入block
    var blockStart = document.querySelector('.game');
    var block = '';
    for (let index = 0; index < count ** 2; index++) {
        block += '<div class="game-block"></div>'
    }
    blockStart.innerHTML = block;

    // gameBlock樣式
    var gameBlock = document.getElementsByClassName('game-block');
    // 調整顏色，色碼拉出for
    var colorR = Math.round(Math.random() * 255);
    var colorG = Math.round(Math.random() * 255);
    var colorB = Math.round(Math.random() * 255);
    var colorRGB = 'rgb(' + colorR + ',' + colorG + ',' + colorB + ')'
    // 隨機調整
    var chosenOne = Math.round((gameBlock.length - 1) * Math.random());
    // todo 在for 裡面 index 等於 chosenOne 的話 就不同的樣式
    for (let index = 0; index < gameBlock.length; index++) {
        var calculatedSize = Math.round((100 / count) * 10000) / 10000;
        var size = 'calc(' + calculatedSize + '% - 10px)';
        gameBlock[index].style.width = size;
        gameBlock[index].style.height = size;
        gameBlock[index].style.margin = '5px';
        gameBlock[index].style.borderRadius = '5px';
        if (index == chosenOne) {
            // 不同的樣式
            gameBlock[index].style.backgroundColor = colorRGB;
            gameBlock[index].style.opacity = difficulty;
            gameBlock[index].setAttribute("onclick", `insertBlock(${Math.round(blockCount)});`)
            gameLevel += 1;
            blockCount += 0.34;
            difficulty = Math.min(0.90, (difficulty + gameLevel / 30))
        } else {
            // 調整顏色
            gameBlock[index].style.backgroundColor = colorRGB;
        }
    }
}

function start() {
    document.querySelector('.score').style.display = 'none';
    document.querySelector('.re-start').style.display = 'none';
    // timer
    var countDownDate = new Date().getTime();
    countDownDate += 60 * 1000;
    var x = setInterval(function () {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.querySelector('.timer').innerHTML = seconds + 's ';
        if (distance < 0) {
            clearInterval(x);
            document.querySelector('.timer').style.display = 'none';
            document.querySelector('.game-container').style.display = 'none';
            document.querySelector('.score').style.display = 'block';
            document.querySelector('.re-start').style.display = 'block';
            document.querySelector('.re-start').setAttribute("onclick", 'start();')
            document.querySelector('.score').innerHTML = `Score : ${gameLevel}`;
            // 初始化
            gameLevel = 0;
            blockCount = 2;
            difficulty = 0.5
        }
    }, 1000);

    document.querySelector('.init').style.display = 'none';
    document.querySelector('.game-container').style.display = 'block';
    document.querySelector('.timer').style.display = 'block';

    // parament控制格數，填入總格數開根號
    insertBlock(2);

}