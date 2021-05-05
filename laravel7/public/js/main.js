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


const vm = Vue.createApp({
    delimiters: ['${', '}$'],
    data() {
        return {

            arr: [
                { title: '品項1', hashId: '_' + Math.floor(Math.random() * 1000000) },
                { title: '品項2', hashId: '_' + Math.floor(Math.random() * 1000000) },
                { title: '品項3', hashId: '_' + Math.floor(Math.random() * 1000000) },
                { title: '品項4', hashId: '_' + Math.floor(Math.random() * 1000000) },
                { title: '品項5', hashId: '_' + Math.floor(Math.random() * 1000000) }
            ]

        }
    }
}).mount('#app');