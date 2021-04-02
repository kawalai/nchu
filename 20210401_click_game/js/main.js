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
    for (let index = 0; index < gameBlock.length; index++) {
        var calculatedSize = Math.round((100 / count) * 10000) / 10000;
        var size = 'calc(' + calculatedSize + '% - 10px)';
        gameBlock[index].style.width = size;
        gameBlock[index].style.height = size;
        gameBlock[index].style.backgroundColor = 'red';
        gameBlock[index].style.margin = '5px';
        gameBlock[index].style.borderRadius = '5px';
    }
}

function start() {
    document.querySelector('.init').style.display = 'none';
    document.querySelector('.game-container').style.display = 'block';

    // parament控制格數，填入格數開根號
    insertBlock(2);

}