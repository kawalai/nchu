function resetProduct(typeId) {
    let container = document.querySelector('div.product-list');
    let formData = new FormData();
    formData.append('id', typeId);
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    fetch('/products/products_type_search',
        {
            method: 'POST',
            body: formData
        })
        .then(function (response) {
            return response.text()
        }).then(function (result) {
            container.innerHTML = result
        })
        .catch(function (err) {
            // 錯誤處理
        });

}

window.onload = () => {
    var btns = document.querySelectorAll('.btn-type')
    // console.log(btns);
    btns.forEach((e)=>{
        e.addEventListener('click', (ev)=>{
            resetProduct(e.getAttribute('data-id'))
        })
    })
}

