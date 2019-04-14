@extends( Auth::user()->role_id == 1  ?  'admin' : 'master' )
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
                    <th>Editar</th>
                    <th>Deletar</th>
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
                        <td>
                            <a href="/editar-doacao/{{$pedido->id}}">
                                <button type="submit" class="btn btn-success custom-btn">
                                    {{ __('Editar') }}
                                </button>
                            </a>
                        </td>  
                        <td>
                            <form method="post" action="doacao/{{$pedido->id}}" >
                                @method('delete')
                                @csrf
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Deletar') }}
                                    </button>
                            </form>   
                        </td>       
                    </tr>
                @endforeach 
            </tbody>
        </table>
    </div>    

        <div style="margin-left: 40%; color:red;">
            {{ $pedidos->links() }}
        </div>    
    @endif  

    <center style="margin-bottom: 10px;">
        <a href="lixeira" >
            <button type="submit" class="btn btn-primary custom-btn">
                {{ __('Lixeira') }}
            </button>
        </a>
    </center>

</div>    
@endsection
