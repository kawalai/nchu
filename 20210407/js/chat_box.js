let content = document.querySelector('.chat-target-box-content');
let text = '';
const anotherClass = 'chat-target-box-content-another';
const meClass = 'chat-target-box-content-me';

function messageContent(dareNoClass, content) {
    let mess = '';
    if (dareNoClass == anotherClass) {
        mess += `
        <div class="${dareNoClass}">
            <div class="chat-target-box-content-block">
                <img class="chat-target-box-content-avatar" src="./img/avatar.png" alt="">
                ${content}
            </div>
            <div class="chat-target-box-content-time">時間</div>
        </div>`
    } else {
        mess += `
        <div class="${dareNoClass}">
            <div class="chat-target-box-content-block" style="flex-direction: row-reverse;">
                <img class="chat-target-box-content-avatar" src="./img/avatar.png" alt="">
                ${content}
            </div>
            <div class="chat-target-box-content-time">時間</div>
        </div>`

    }
    return mess;
}

for (let index = 0; index < 100; index++) {
    let percent = Math.floor(Math.random() * 100) + 1;
    if (percent > 50) {
        text += messageContent(meClass, '這是我的文字');
    } else {
        text += messageContent(anotherClass, '這是內容文字');
    }
}
content.innerHTML = text;