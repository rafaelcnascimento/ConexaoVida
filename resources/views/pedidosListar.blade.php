@extends('master')
@section('content')
<div class="container">
    @if(session()->has('message.level'))
        <div class="alert alert-{{ session('message.level') }}"> 
        {!! session('message.content') !!}
        </div>
    @endif

    <table class="ui celled table">
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Cidade</th>
                <th>Tipo Sanguíneo</th>
                <th>Quem pode doar</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pedidos as $pedido)       
              <tr>
                    <td>{{$pedido->paciente}}</td>
                    <td>{{$pedido->cidade}}</td>
                    <td>{{$pedido->sangue->nome}}</td> 
                    <td>
                       @if ($pedido->exclusivo)
                        <p>Apenas {{$pedido->sangue->nome}}</p>
                       @else
                            @foreach ($pedido->sangue->doadores($pedido->sangue->id) as $doador)
                                {{$doador->sangue->nome }}
                            @endforeach
                       @endif
                    </td>   
                    <td><a href="doacao/{{$pedido->id}}">
                        <button type="submit" class="btn btn-primary custom-btn">
                            {{ __('Detalhes') }}
                        </button>
                    </a></td>     
            </tr>
            @endforeach 
        </tbody>
    </table>

    {{ $pedidos->links() }}

</div>    
@endsection
