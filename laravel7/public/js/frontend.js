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
            return response.json()
        }).then(function (result) {
            let resultString = ''
            result.forEach((e) => {
                // console.log(e.name,e.price,e.img,e.description,e.created_at);
                resultString += `<article>
                                    <a href="/products/content/${e['id']}">
                                        <h3>${e.product_type.name}</h3>
                                        <div>${e.name}</div>
                                        <div>${e.price}</div>
                                        <div>
                                            <div class="div-img" style="background-image: url(${e.img})"></div>
                                        </div>
                                        <div>${e.description}</div>
                                        <div>${e.created_at}</div>
                                    </a>
                                </article>`
            })
            container.innerHTML = resultString
        })
        .catch(function (err) {
            // 錯誤處理
        });

}

window.onload = () => {
    var btns = document.querySelectorAll('.btn-type')
    // console.log(btns);
    btns.forEach((e) => {
        e.addEventListener('click', (ev) => {
            resetProduct(e.getAttribute('data-id'))
        })
    })
}

