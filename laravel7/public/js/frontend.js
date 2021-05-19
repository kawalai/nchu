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
            // 在前台處理資料，遇到關連資料大寫被變換成_小寫的問題
            let resultString = result.reduce((pre, cur) => {
                processed = `<article>
                                    <a href="/products/content/${cur.id}">
                                        <h3>${cur.product_type.name}</h3>
                                        <div>${cur.name}</div>
                                        <div>${cur.price}</div>
                                        <div>
                                            <div class="div-img" style="background-image: url(${cur.img})"></div>
                                        </div>
                                        <div>${cur.description}</div>
                                        <div>${cur.created_at}</div>
                                    </a>
                                </article>`
                return pre + processed
            }, '')
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

