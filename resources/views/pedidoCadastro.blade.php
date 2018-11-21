@extends('master')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Novo pedido') }}</div>
                <div class="card-body">
                    <form method="POST" action="/doacao">
                        @csrf

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                        <div class="form-group row">
                            <label for="paciente" class="col-md-4 col-form-label text-md-right">{{ __('Nome do Paciente') }}</label>

                            <div class="col-md-6">
                                <input id="paciente" type="text" class="form-control{{ $errors->has('paciente') ? ' is-invalid' : '' }}" name="paciente" value="{{ old('paciente') }}" required autofocus>

                                @if ($errors->has('paciente'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('paciente') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo_sanguineo_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Sanguíneo') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('tipo_sanguineo_id') ? ' is-invalid' : '' }}" id="tipo_sanguineo_id"  name="tipo_sanguineo_id" required>
                                    <option selected="" disabled="">Selecione</option>
                                    @foreach ($tipos_sanguineos as $tipo)
                                        <option value="{{$tipo->id}}" {{ (old('tipo_sanguineo_id') == $tipo->id ? "selected":"") }}>{{$tipo->nome}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('tipo_sanguineo_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tipo_sanguineo_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="exclusivo" id="exclusivo" {{ old('exclusivo') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="exclusivo">
                                        {{ __('Receber apenas doações do mesmo tipo¹') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="hospital" class="col-md-4 col-form-label text-md-right">{{ __('Hospital') }}</label>

                            <div class="col-md-6">
                                <input id="hospital" type="hospital" class="form-control{{ $errors->has('hospital') ? ' is-invalid' : '' }}" name="hospital" value="{{ old('hospital') }}" required>

                                @if ($errors->has('hospital'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hospital') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quarto" class="col-md-4 col-form-label text-md-right">{{ __('Quarto') }}</label>

                            <div class="col-md-6">
                                <input id="quarto" type="quarto" class="form-control{{ $errors->has('quarto') ? ' is-invalid' : '' }}" name="quarto" value="{{ old('quarto') }}" required>

                                @if ($errors->has('quarto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('quarto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="endereco_hospital" class="col-md-4 col-form-label text-md-right">{{ __('Endereço do Hospital') }}</label>

                            <div class="col-md-6">
                                <input id="endereco_hospital" type="endereco_hospital" class="form-control{{ $errors->has('endereco_hospital') ? ' is-invalid' : '' }}" name="endereco_hospital" value="{{ old('endereco_hospital') }}" required>

                                @if ($errors->has('endereco_hospital'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Endereço do Hospital') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="regiao_id" class="col-md-4 col-form-label text-md-right">{{ __('Região') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('regiao_id') ? ' is-invalid' : '' }}" id="regiao_id"  name="regiao_id" required>
                                    <option selected="" disabled="">Selecione</option>
                                    @foreach ($regioes as $regiao)
                                        <option value="{{$regiao->id}}" {{ (old('regiao_id') == $regiao->id ? "selected":"") }}>{{$regiao->nome}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('regiao_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('regiao_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cidade" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" name="cidade" value="{{ old('cidade') }}" required>

                                @if ($errors->has('cidade'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <center>
                            <p>¹ Caso essa opção seja marcada apenas doadores do mesmo tipo sanguíneo serão notificados</p>
                        </center>

                        {{-- <div class="form-group row">
                            <label for="estado_id" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('estado_id') ? ' is-invalid' : '' }}" id="estado_id"  name="estado_id" required>
                                    <option selected="" disabled="">Selecione</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{$estado->id}}" {{ (old('estado_id') == $estado->id ? "selected":"") }}>{{$estado->sigla}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('estado_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('estado_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary custom-btn">
                                        {{ __('Enviar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>                
        </div>
    </div>    
@endsection

