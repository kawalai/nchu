<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Layout Work</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
</head>

<body>

    <header>
        <div class="container">
            <div class="header-content">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="logo-div">
                        <a href="{{url('')}}">
                            <img src="{{asset('img/logo.svg')}}" alt="" class="logo-img">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('news')}}">News</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('products')}}">Products</a>
                            </li>
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
                                <a class="nav-link" href="/checkout1">
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
        </div>
    </header>

    <main class="main">
        @yield('main')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{asset('img/logo.svg')}}" alt="">
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
        </div>
    </footer>


    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
        </script>
    <script src="{{ asset('js/main.js') }}"></script>
    @yield('js')
</body>

</html>
