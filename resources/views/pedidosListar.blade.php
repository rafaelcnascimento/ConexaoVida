@extends('master')
@section('content')
<div class="container">
    @if(session()->has('message.level'))
        <div class="alert alert-{{ session('message.level') }}"> 
        {!! session('message.content') !!}
        </div>
    @endif

    @if(count($pedidos) == 0)
        <center>
            <p>Nenhum pedido de doação encontrado</p>
        </center>
    @else
    <div class="table-responsive">
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Paciente</th>
                    <th>Cidade</th>
                    <th>Tipo Sanguíneo</th>
                    <th>Quem pode doar</th>
                    <th>Detalhes</th>
                    {{-- Overhead a seguir --}}
                    @foreach ($pedidos as $pedido)
                        @if($pedido->requerente->isAdmin() || $pedido->criadoPor())
                            <th>Editar</th>
                            @break     
                        @endif   
                    @endforeach
                </tr>
            </thead>
            <tbody>
            @foreach ($pedidos as $pedido)       
                  <tr>
                        <td>{{$pedido->paciente}}</td>
                        <td>{{$pedido->cidade}}</td>
                        <td>{{$pedido->sangue->nome}}</td> 
                        <td nowrap="">
                           @if ($pedido->exclusivo)
                            <p>Apenas {{$pedido->sangue->nome}}</p>
                           @else
                                @foreach ($pedido->sangue->doadores($pedido->sangue->id) as $doador)
                                    {{$doador->sangue->nome }}
                                @endforeach
                           @endif
                        </td> 
                        <td>
                            <a href="doacao/{{$pedido->id}}">
                                <button type="submit" class="btn btn-primary custom-btn">
                                    {{ __('Detalhes') }}
                                </button>
                            </a>
                        </td>     
                        @if($pedido->requerente->isAdmin() || $pedido->criadoPor())
                            <td>
                                <a href="/editar-doacao/{{$pedido->id}}">
                                    <button type="submit" class="btn btn-success custom-btn">
                                        {{ __('Editar') }}
                                    </button>
                                </a>
                            </td>  
                        @endif   
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>    

        <div style="margin-left: 40%; color:red;">
            {{ $pedidos->links() }}
        </div>    
    @endif  
</div>    
@endsection
