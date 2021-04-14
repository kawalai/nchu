const sendButton = document.querySelector('#send');
const logButton = document.querySelector('#send');

data = [];

function sendFunction() {
    let inputName = document.querySelector('#name').value;
    let inputAge = document.querySelector('#age').value;
    let inputGender = document.querySelector('#gender').value;
    let dataObj = { "name": inputName, "age": inputAge, "gender": inputGender, "arrayIndex":data.length };
    data.push(dataObj);

    let dataShown = document.querySelector('.main-data>.row');
    dataShown.innerHTML += dataProcess(dataObj);
}

function logFunction() {
    console.log(data);
}

let dataShown = document.querySelector('.main-data>.row');

function delData(index){
    // delete data[index];
    data.splice(index, 1);
    
    let dataShown = document.querySelector('.main-data>.row');
    dataShown.innerHTML = '';

    data.forEach(element => {
        if (element.name) {
            dataShown.innerHTML += dataProcess(element);
        }
        
    });

}

function dataProcess(object) {
    return `
    <div class="col-12">
        <div class="row">
            <div class="col-3">
            姓名 : ${object.name}
            </div>
            <div class="col-3">
            年齡 : ${object.age}
            </div>
            <div class="col-3">
            性別 : ${object.gender}
            </div>
            <div class="col-3">
                <button class="btn btn-danger" onclick="delData(${object.arrayIndex});">刪除</button>
            </div>
        </div> 
    </div>`;
}