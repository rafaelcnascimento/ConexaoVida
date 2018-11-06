@extends('master')

@section('content')
<div>

<h1 class="font-weight-bold">Como funciona</h1>
<p class="font-weight-bold" font-size=30 >Para doadores:<p>
<p>Você se cadastra e informa o seu tipo sanguineo. Quando alguém precisar do seu sangue você receberá um email e uma nofiticação caso tenha o aplicativo instalado. A mensagem inclui o nome de quem receberá a doação e o hospital onde será realizada.</p>
<p class="font-weight-bold" >Para receptores:<p>
<p>Crie o seu cadastro e depois clique em <a href="doar">Doações</a> e <a href="new-donation"> Cadastrar um novo pedido</a>. Informe o nome do paciente,tipo sanguineo e o hospital onde a pessoa se encontra. O sistema informará todas as pessoas desses grupo automaticamente via email e notificações no aplicativo</p>
</div>
<h1 class="font-weight-bold">Compatibilidade sanguínea</h1>
<center>
    <img src="{{asset('img/tabela.jpg') }}">
</center>

@endsection
