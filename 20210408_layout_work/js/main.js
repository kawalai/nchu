function oneMinus(element) {
    // let nameValue = this.getAttribute('name').value;
    // this.value;
    console.log(element.name);
    // let gotValue = document.querySelector(`input[name=${nameValue}]`).value;
    // if (gotValue == '') {
    //     gotValue = 0;
    // }
    // console.log(gotValue);
    // gotValue--;
    // console.log(gotValue);
}

function onePlus() {
    let nameValue = this.getAttribute('name').value;
    let gotValue = document.querySelector(`input[name=${nameValue}]`).value;
    if (gotValue == '') {
        gotValue = 0;
    }
    console.log(gotValue);
    gotValue++;
    console.log(gotValue);
}