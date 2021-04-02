
var gameLevel = 0;

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
        console.log(chosenOne);
        if (index == chosenOne) {
            // 不同的樣式
            gameBlock[index].style.backgroundColor = colorRGB;
            gameBlock[index].style.opacity = '0.5';
            gameBlock[index].setAttribute("onclick", `insertBlock(${gameLevel + 2});`)
            gameLevel += 1;
        } else {
            // 調整顏色
            gameBlock[index].style.backgroundColor = colorRGB;
        }
    }
}

function start() {
    document.querySelector('.init').style.display = 'none';
    document.querySelector('.game-container').style.display = 'block';

    // parament控制格數，填入總格數開根號
    insertBlock(2);

}