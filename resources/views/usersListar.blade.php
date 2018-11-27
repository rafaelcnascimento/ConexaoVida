@extends('admin')
@section('content')
<div class="container">
    @if(session()->has('message.level'))
        <div class="alert alert-{{ session('message.level') }}"> 
        {!! session('message.content') !!}
        </div>
    @endif

    <div class="table-responsive">
        <table class="ui celled table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Tipo Sanguíneo</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)       
                <tr>
                    <td>{{$user->nome}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->getFone()}}</td> 
                    <td>{{$user->sangue->nome}}</td> 
                </tr>
            @endforeach 
            </tbody>
        </table>
    </div>    

        <div style="margin-left: 40%; color:red;">
            {{ $users->links() }}
        </div>    
</div>    
@endsection
