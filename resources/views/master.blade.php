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
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/como-funciona">Como funciona</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="/doacoes">Doações</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="registro">Baixe o aplicativo</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="sobre">Sobre</a>
                            </li>
                            @if (Auth::check())
                            <li class="nav-item active">
                                <a class="nav-link" href="/doacao-cadastrar">Pedir doação</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                        <div class="navbar-nav mt-2 mt-md-0">
                            @if (Auth::check())
                                <li class="nav-item dropdown active" style="left: -100%;">
                                    <div class="nav-link dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá, {{Auth::user()->getNome()}}</div>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="/meus-dados">Meus dados</a>
                                    <a class="dropdown-item" href="#">Sair</a>
                                </div>
                                </li>
                            @else
                                <li class="nav-item active" style="margin-top: 15px;">
                                    <a class="nav-link" href="login">Entre</a>
                                </li>
                                <li class="nav-item active" style="margin-top: 15px;">
                                    <p class="nav-link">ou</p>
                                </li>
                                <li class="nav-item active" style="margin-top: 15px;">
                                    <a class="nav-link" href="registrar">Cadastre-se</a>
                                </li>
                            @endif    
                        </div>
                    </div>
                </nav>
            </header>

           <div class="container" style="margin-top: 100px;">
               @yield('content')
           </div>    

        <footer class="footer">
            <div class="container">
                <center>
                    <span>Idealizado e mantido pelos cursos de Biomedicia e de Análise e Desenvolvimento de Sistemas da <a href="http://cnecsan.cnec.br/" style="color: white; font-weight: bold;">Faculdade CNEC Santo Ângelo</a></span>
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
