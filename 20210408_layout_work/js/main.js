function calcPlusMinusFunction(element, para = 'plus') {
    let thisInputValue = document.querySelector(`input[name=${element.name}]`);
    if (thisInputValue.value == '') {
        thisInputValue.value = 0;
    }
    if (para == 'minus') {
        thisInputValue.value--;
    } else {
        thisInputValue.value++;
    }
    thisInputValue.innerHTML = thisInputValue.value;

    let thisSum = document.querySelector(`div.product-one-sum[name=${element.name}]`);
    let price = 10;
    thisSum.innerHTML = `$ ${thisInputValue.value * price}`;
}

