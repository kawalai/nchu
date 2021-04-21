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
    data() {
        return {
            count: 0
        }
    }
});




// 子元件
// vm.component('shop-header', {
//     template: `<div class="container">
//     <div class="header-content">
//         <nav class="navbar navbar-expand-lg navbar-light">
//             <div class="logo-div">
//                 <a href="https://lesson-bootstrap.dev-hub.io/">
//                     <img src="./img/logo.svg" alt="" class="logo-img">
//                 </a>
//             </div>
//                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
//                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
//                     <span class="navbar-toggler-icon"></span>
//                 </button>

//                 <div class="collapse navbar-collapse" id="navbarSupportedContent">
//                     <ul class="navbar-nav ml-auto">
//                         <li class="nav-item active">
//                             <a class="nav-link" href="#">Blog</a>
//                         </li>
//                         <li class="nav-item active">
//                             <a class="nav-link" href="#">Portfolio</a>
//                         </li>
//                         <li class="nav-item active">
//                             <a class="nav-link" href="#">About</a>
//                         </li>
//                         <li class="nav-item active">
//                             <a class="nav-link" href="#">Contact</a>
//                         </li>
//                         <li class="nav-item active dropdown">
//                             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
//                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
//                                 Dropdown
//                     </a>
//                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
//                                 <a class="dropdown-item" href="#">Action</a>
//                                 <a class="dropdown-item" href="#">Another action</a>
//                                 <div class="dropdown-divider"></div>
//                                 <a class="dropdown-item" href="#">Something else here</a>
//                             </div>
//                         </li>
//                         <li class="nav-item active">
//                             <a class="nav-link" href="./checkout1.html">
//                                 <i class="fas fa-shopping-cart"></i>
//                             </a>
//                         </li>
//                         <li class="nav-item active">
//                             <a class="nav-link" href="#">
//                                 <i class="fas fa-user"></i>
//                             </a>
//                         </li>
//                     </ul>
//                 </div>
//             </nav>
//     </div>
// </div>`
// });

import Logo from '../component/shop-header.Vue'

// 子元件
vm.component('shop-header', {
    template: Logo
}).mount('header');

// vm.mount('header');
