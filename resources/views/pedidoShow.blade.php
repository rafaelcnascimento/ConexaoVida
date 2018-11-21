@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="form-group row">
                    <label for="paciente" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Paciente') }}</label>
                    <div class="col-md-6">
                        <input id="paciente" type="text" class="form-control" name="paciente" value="{{$pedido->paciente }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="hospital" class="col-md-4 col-form-label text-md-right">{{ __('Hospital') }}</label>
                    <div class="col-md-6">
                        <input id="hospital" type="text" class="form-control" name="hospital" value="{{$pedido->hospital }}" disabled >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endereco_hospital" class="col-md-4 col-form-label text-md-right">{{ __('Endereço Hospital') }}</label>
                    <div class="col-md-6">
                        <input id="endereco_hospital" type="text" class="form-control" name="endereco_hospital" value="{{$pedido->endereco_hospital }}" disabled >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="quarto" class="col-md-4 col-form-label text-md-right">{{ __('Quarto') }}</label>
                    <div class="col-md-6">
                        <input id="quarto" type="text" class="form-control" name="quarto" value="{{$pedido->quarto }}" disabled >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tipo_sanguineo_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Sanguíneo') }}</label>
                    <div class="col-md-6">
                        <input id="tipo_sanguineo_id" type="text" class="form-control" name="tipo_sanguineo_id" value="{{$pedido->sangue->nome }}" disabled >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="regiao_id" class="col-md-4 col-form-label text-md-right">{{ __('Região') }}</label>
                    <div class="col-md-6">
                        <input id="regiao_id" type="text" class="form-control" name="regiao_id" value="{{$pedido->regiao->nome }}" disabled >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                    <div class="col-md-6">
                        <input id="cidade" type="text" class="form-control" name="cidade" value="{{$pedido->cidade}}" disabled >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Requerente') }}</label>
                    <div class="col-md-6">
                        <input id="user_id" type="text" class="form-control" name="user_id" value="{{$pedido->requerente->nome}}" disabled >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone do requerente') }}</label>
                    <div class="col-md-6">
                        <input id="telefone" type="text" class="form-control" name="telefone" value="{{$pedido->requerente->getFone()}}" disabled >
                    </div>
                </div>

            </div>                
        </div>
    </div>    
@endsection
