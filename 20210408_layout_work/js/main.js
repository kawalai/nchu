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

const header = Vue.createApp({
    data() {
        return {
            count: 0
        }
    }
});

const footer = Vue.createApp({
    data() {
        return {
            count: 0
        }
    }
});

// 子元件
header.component('shop-header', {
    template: `
    <div class="container">
        <div class="header-content">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="logo-div">
                    <a href="https://lesson-bootstrap.dev-hub.io/">
                        <img src="./img/logo.svg" alt="" class="logo-img">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Portfolio</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="./checkout1.html">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="./login.html">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>`
});

footer.component('shop-footer', {
    template: `
    <div class="container">
        <div class="footer-content">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="row">
                        <div class="col-3">
                            <img src="./img/logo.svg" alt="">
                        </div>
                        <div class="col-9 text-md-left">
                            數位方塊
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-md-left">
                            Air plant banjo lyft occupy retro adaptogen indego
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-9">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 text-lg-left text-md-left">
                            <ul>
                                <li>CATEGORIES</li>
                                <li>First Link</li>
                                <li>Second Link</li>
                                <li>Third Link</li>
                                <li>Fourth Link</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 text-lg-left text-md-left">
                            <ul>
                                <li>CATEGORIES</li>
                                <li>First Link</li>
                                <li>Second Link</li>
                                <li>Third Link</li>
                                <li>Fourth Link</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 text-lg-left text-md-left">
                            <ul>
                                <li>CATEGORIES</li>
                                <li>First Link</li>
                                <li>Second Link</li>
                                <li>Third Link</li>
                                <li>Fourth Link</li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 text-lg-left text-md-left">
                            <ul>
                                <li>CATEGORIES</li>
                                <li>First Link</li>
                                <li>Second Link</li>
                                <li>Third Link</li>
                                <li>Fourth Link</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-sm-6 text-sm-left">
                copyright
            </div>
            <div class="col-sm-6 text-sm-right">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>`
});

header.mount('header');
footer.mount('footer');
const vm = Vue.createApp({
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