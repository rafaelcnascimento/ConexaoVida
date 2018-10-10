@extends('master')
@section('content')
<div class="container">
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
                        @foreach ($pedido->sangue->doadores(1) as $doador)
                            {{$doador->sangue->nome }}
                        @endforeach
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
