<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        
        <!-- Fonte de google -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">


        <!-- CSS Bootstrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        
        <!-- CSS da aplicaçao -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"> </script>

    </head>
    <body>
        <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/pagecontato" class="nav-link">Contato</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Entre</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Cadastre-se</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item">
                            <a href="/cadastro/carrinhocompras" class="nav-link">Carrinho</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method='POST'>
                            @csrf
                            <a href="/logout" 
                            class="nav-link" 
                            onclick="event.preventDefault();
                                        this.closest('form').submit()";>Logout</a>
                        </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </nav>
            <nav class="navbar navbar-expand-sm navbar-light">
                <div class="collapse navbar-collapse" id="navbar2">
                    <a href="/" class="navbar-brand">
                        <img src="/img/paoBrand.svg" alt="Padaria pão doce">
                    </a>
                    <ul>
                        <div id="search2-container" class="col-md-12">
                            <form action="/" method="GET" >
                                <input type="text" name="search" id="search" class="form-control" placeholder="Procurar...">
                            </form>
                        </div>
                    </ul>
                    <ul class="navbar-nav">
                    <a href="/"> <ion-icon name="home-sharp"></ion-icon></a>
                    <a href="/login"><ion-icon name="person-circle-outline"></ion-icon></a>
                    <a href="/cadastro/carrinhocompras"><ion-icon name="cart-outline"></ion-icon></a>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg">{{ session('msg') }}</p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>

        {{--  --}}
        <footer>
            <p>Padaria Sonho Bom&copy; 2021 </p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
