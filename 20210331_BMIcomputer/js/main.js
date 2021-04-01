// 點擊按鈕
// 計算BMI
// 顯示BMI在result裡面
var calc = document.querySelector('.calc-button');
var resultDiv = document.querySelector('.result');

calc.addEventListener('click', function () {
    var height = Number(document.querySelector('input.height').value);
    var weight = Number(document.querySelector('input.weight').value);
    var result = Math.round((weight / ((height / 100) ** 2)) * 100) / 100;
    resultDiv.innerHTML = result;

    console.log(height);

    var status = document.querySelector('.status');
    if (result < 20) {
        status.innerHTML = '體重過輕';
    } else if (result >= 20 && result < 25) {
        status.innerHTML = '正常範圍';
    } else if (result >= 25 && result < 30) {
        status.innerHTML = '體重過重';
    } else if (result >= 30 && result < 40) {
        status.innerHTML = '肥胖';
    } else if (result >= 40) {
        status.innerHTML = '病態肥胖';
    }
});

// reset 按鈕
var reset = document.querySelector('.reset');
reset.addEventListener('click', function () {
    document.querySelector('input.height').value = '';
    document.querySelector('input.weight').value = '';
    resultDiv.innerHTML = '';

    var status = document.querySelector('.status');
    status.innerHTML = '';
})

// 判斷BMI在哪一區間


