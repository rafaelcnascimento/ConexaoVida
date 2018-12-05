@extends('master')

@section('content')
<div>

<h1 class="font-weight-bold">Como funciona</h1>
<p class="font-weight-bold" font-size=30 >Para quem quer doar sangue:<p>
<p>Você se cadastra e informa o seu tipo sanguineo e em qual região do estado você mora. Quando alguém precisar do seu sangue você receberá um email com as informações necessárias para realizar a sua doação. Também há uma listagem dos pedidos que foram feitos.</p>
<p class="font-weight-bold" >Para quem precisa de doações:<p> 
<p>Crie o seu cadastro e depois clique em <a href="/doacao-cadastrar">"Pedir Doação"</a>. Faça o pedido informando o nome do paciente, tipo sanguineo e o hospital onde a pessoa se encontra. O sistema informará todas as pessoas que são compátiveis, e que residem na mesma região do estado, automaticamente por email, além disso a sua doação será listada no site. As doações ficam no ar durante uma semana.</p>
</div>

<h1 class="font-weight-bold">Como doar sangue</h1>
<ul>
    <li>Levar documento de identidade</li>
    <li>Estar bem de sáude</li>
    <li>Ter entre 16 e 69 anos</li>
    <li>Pesar mais de 50 kg</li>
    <li>Não estar em jejum</li>
    <li>Evitar alimentos gordurosos três horas antes da doação</li>
    <li>Não ingerir álcool nas últimas 12 horas</li>
</ul>

<h1 class="font-weight-bold">Compatibilidade sanguínea</h1>
<center>
    <img src="{{asset('img/tabela.jpg') }}" class="responsive" >
</center>





@endsection
