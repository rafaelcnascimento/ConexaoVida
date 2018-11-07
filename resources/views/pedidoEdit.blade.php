@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form method="post" action="/doacao/{{$pedido->id}}">
                    @method('patch')
                    @csrf

                    <div class="form-group row">
                        <label for="paciente" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Paciente') }}</label>
                        <div class="col-md-6">
                            <input id="paciente" type="text" class="form-control" name="paciente" value="{{$pedido->paciente }}" >

                            @if ($errors->has('paciente'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('paciente') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="hospital" class="col-md-4 col-form-label text-md-right">{{ __('Hospital') }}</label>
                        <div class="col-md-6">
                            <input id="hospital" type="text" class="form-control" name="hospital" value="{{$pedido->hospital }}"  >

                            @if ($errors->has('hospital'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('hospital') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="endereco_hospital" class="col-md-4 col-form-label text-md-right">{{ __('Endereço Hospital') }}</label>
                        <div class="col-md-6">
                            <input id="endereco_hospital" type="text" class="form-control" name="endereco_hospital" value="{{$pedido->endereco_hospital }}"  >

                            @if ($errors->has('endereco_hospital'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('endereco_hospital') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quarto" class="col-md-4 col-form-label text-md-right">{{ __('Quarto') }}</label>
                        <div class="col-md-6">
                            <input id="quarto" type="text" class="form-control" name="quarto" value="{{$pedido->quarto }}"  >

                            @if ($errors->has('quarto'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('quarto') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo_sanguineo_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Sanguíneo') }}</label>
                        <div class="col-md-6">
                            <input id="tipo_sanguineo_id" type="text" class="form-control" name="tipo_sanguineo_id" value="{{$pedido->sangue->nome }}"  >

                            @if ($errors->has('tipo_sanguineo_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipo_sanguineo_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                        <div class="col-md-6">
                            <input id="cidade" type="text" class="form-control" name="cidade" value="{{$pedido->cidade}}"  >

                            @if ($errors->has('cidade'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('cidade') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary custom-btn">
                                {{ __('Editar') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>                
        </div>
    </div>    
@endsection
