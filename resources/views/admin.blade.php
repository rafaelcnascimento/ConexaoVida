<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <!-- Fonte -->
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- rodapé -->
        <link href="{{ asset('css/sticky-footer-navbar.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body style="background-image: url({{ asset('img/novo-fundo.jpg')}});">
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="/adminDoacoes"><img style="height: 60px;" src="{{ asset('img/logo.png') }}"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        
                        <ul class="nav nav-pills d-flex flex-column flex-md-row" >
                            <li class="nav-item mb-2 mt-2 mt-md-0 mb-md-0 mr-3">
                                <a class="nav-link active" href="/usuarios">Usuários</a>
                            </li>
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="/adminDoacoes">Pedidos de Doações</a>
                            </li>
                            {{-- <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="registro">Baixe o aplicativo</a>
                            </li> --}}
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="/lixeira">Lixeira</a>
                            </li>
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="/doacao-cadastrar">Pedir doação</a>
                            </li>
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="/meus-pedidos">Meus pedidos</a>
                            </li>
                        </ul>

                        <div class="navbar-nav ml-auto mt-2 mt-md-0">
                                <ul class="nav nav-pills d-flex flex-column flex-md-row" style="color: #FFFFFF">
                                    <li class="nav-item mb-2 mb-md-0 mr-3">
                                        <a class="nav-link" style="color: black" href="/meus-dados">Meus dados</a>
                                    </li>
                                    <li class="nav-item mb-2 mb-md-0 mr-3">
                                       <a class="nav-link" style="color: black;" href="/logout">Sair</a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

           <div class="container" style="margin-top: 100px; padding-bottom: 50px; background-color: white">
               @yield('content')
           </div>    
           
           <footer class="footer">
                <div class="container">
                    <center>
                        <span>Desenvolvido por acadêmicos do curso de <a href="http://cnecsan.cnec.br/curso/analise-e-desenvolvimento-de-sistemas/"> <img style="height: 40px;" src="{{ asset('img/logo-ads.png') }}"> </a>  da  <a href="http://cnecsan.cnec.br/" style="font-weight: bold;"><img style="height: 40px;" src="{{asset('img/cnec.png') }}"></a>
                        </span>
                     </center>
                </div>
            </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
