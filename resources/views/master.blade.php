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
        <link href="{{ asset('css/sticky-footer-navbar.css') }}" rel="stylesheet" type="text/css" 
    </head>
    <body>
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="/"><img style="height: 60px;" src="{{ asset('img/logo.png') }}"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        
                        <ul class="nav nav-pills d-flex flex-column flex-md-row" >
                            <li class="nav-item mb-2 mt-2 mt-md-0 mb-md-0 mr-3">
                                <a class="nav-link active" href="/como-funciona">Como funciona</a>
                            </li>
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="/doacoes">Doações</a>
                            </li>
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="registro">Baixe o aplicativo</a>
                            </li>
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="sobre">Sobre</a>
                            </li>
                            @if (Auth::check())
                                <li class="nav-item mb-2 mb-md-0 mr-3">
                                    <a class="nav-link active" href="/doacao-cadastrar">Pedir doação</a>
                                </li>
                                <li class="nav-item mb-2 mb-md-0 mr-3">
                                    <a class="nav-link active" href="/meus-pedidos">Meus pedidos</a>
                                </li>
                            @endif
                        </ul>

                        <div class="navbar-nav ml-auto mt-2 mt-md-0">
                            @if (Auth::check())
                                <ul class="nav nav-pills d-flex flex-column flex-md-row" style="color: #FFFFFF">
                                    <li class="nav-item mb-2 mb-md-0 mr-3">
                                        <a class="nav-link" style="color: black" href="/meus-dados">Meus dados</a>
                                    </li>
                                    <li class="nav-item mb-2 mb-md-0 mr-3">
                                       <a class="nav-link" style="color: black;" href="/logout">Sair</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="nav nav-pills d-flex flex-column flex-md-row" style="color: #FFFFFF">
                                    <li class="nav-item mb-2 mb-md-0 mr-3">
                                        <a class="nav-link active" style="color: #FFFFFF;" href="/login"> Entre</a>
                                    </li>
                                    <li class="nav-item mb-2 mb-md-0 mr-3">
                                        <a class="nav-link active" style="color: #FFFFFF;" href="/registrar"> Cadastra-se</a>
                                    </li>
                                </ul>
                            @endif    
                        </div>
                    </div>
                </div>
            </nav>
        </header>

           <div class="container" style="margin-top: 100px;">
               @yield('content')
           </div>    

           <footer class="footer text-dark">
            
                <center>
                    <span>Idealizado e mantido pelos cursos de Biomedicia e de Análise e Desenvolvimento de Sistemas da <a href="http://cnecsan.cnec.br/" style="font-weight: bold;">Faculdade CNEC Santo Ângelo</a></span>
                </center>
    
                <img style="height: 60px;" src="{{ asset('img/ads.png') }}">

        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
