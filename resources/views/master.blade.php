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
        {{-- Icones --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- rodapé -->
        <link href="{{ asset('css/sticky-footer-navbar.css') }}" rel="stylesheet" type="text/css">
        <!-- Matomo -->
        <script type="text/javascript">
          var _paq = _paq || [];
          /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u="//kraft.ads.cnecsan.edu.br/piwik/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '6']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <!-- End Matomo Code -->

    </head>
    <body style="background-image: url({{ asset('img/novo-fundo.jpg')}});">
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
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="/doacao-cadastrar">Pedir doação</a>
                            </li>
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="/doacoes">Pedidos de Doações</a>
                            </li>
                            <li class="nav-item mb-2 mt-2 mt-md-0 mb-md-0 mr-3">
                                <a class="nav-link active" href="/ajuda">Como funciona</a>
                            </li>
                            {{-- <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="registro">Baixe o aplicativo</a>
                            </li> --}}
                            <li class="nav-item mb-2 mb-md-0 mr-3">
                                <a class="nav-link active" href="/sobre">Sobre</a>
                            </li>
                            
                            @if (Auth::check())
                                <li class="nav-item mb-2 mb-md-0 mr-3">
                                    <a class="nav-link active" href="/meus-pedidos">Meus pedidos</a>
                                </li>
                            @endif
                        </ul>

                        <div class="navbar-nav ml-auto mt-2 mt-md-0">
                            @if (Auth::check())
                                <ul class="nav nav-pills d-flex flex-column flex-md-row" style="color: #FFFFFF">
                                    <li class="nav-item mb-2 mb-md-0 mr-3">
                                        <a class="nav-link" style="color: black" href="/meus-dados">Olá, {{strtok(Auth::user()->nome, " ")}}</a>
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

           <div class="container" style="margin-top: 100px; padding-bottom: 50px; background-color: white">
               @yield('content')
           </div>    
           
           <footer class="footer">
                <div class="container">
                    <center>
                        <span>Desenvolvido por acadêmicos do curso de <a href="http://educacaosuperior.cnec.br/santoangelo/cursos/graduacao/tecnologo/47/info"> <img style="height: 40px;" src="{{ asset('img/logo-ads.png') }}"> </a>  da  <a href="http://educacaosuperior.cnec.br/santoangelo" style="font-weight: bold;"><img style="height: 40px;" src="{{asset('img/cnec.png') }}"></a>
                        </span>
                        <span style="margin-left: 200px;">
                            Compartilhe: <a href="https://api.whatsapp.com/send?text=Conheça o Conexão Vida: http://www.conexaovidars.com.br" target="_blank"><i class="fab fa-whatsapp fa-2x"  style="color:#25D366"></i></a>
                            <a href="https://www.facebook.com/sharer.php?u=http://www.conexaovidars.com.br" target="_blank"><i class="fab fa-facebook-square fa-2x"  style="color:#3B5998"></i></a>
                        </span>
                     </center>
                </div>
            </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        @yield('js')
    </body>
</html>
