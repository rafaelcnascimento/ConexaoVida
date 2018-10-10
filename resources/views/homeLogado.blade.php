@extends('master')

@section('content')
<div class="container">
    <center>
       <a href="/doar"><img src={{ asset('img/doar.png') }}></a>
        <h3>A sua última foi em {{Auth::user()->ultima_doacao->format('d/m/Y')}}</h3>
        <h3>Você poderá doar novamente em: {{Auth::user()->getData()->format('d/m/Y')}}</h3>
    </center>
</div>    

@endsection
