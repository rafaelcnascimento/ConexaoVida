@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Registrar') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome Completo') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Gênero') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('genero') ? ' is-invalid' : '' }}" id="genero"  name="genero" required>
                                    <option selected="" disabled="">Selecione</option>
                                    <option value="feminimo" {{ (old('genero') == "feminimo" ? "selected":"") }}>Feminino</option>
                                    <option value="masculino" {{ (old('genero') == "masculino" ? "selected":"") }}>Masculino</option>
                                </select>

                                @if ($errors->has('genero'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('genero') }}</strong>
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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone com DDD') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{ old('telefone') }}" required>

                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
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

                        <div class="form-group row">
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
                        </div>

                        <div class="form-group row">
                            <label for="ultima_doacao" class="col-md-4 col-form-label text-md-right">{{ __('Quando foi a sua úiltima doação') }}</label>

                            <div class="col-md-6">
                                <input id="ultima_doacao" type="text" class="form-control{{ $errors->has('ultima_doacao') ? ' is-invalid' : '' }}" name="ultima_doacao" value="{{ old('ultima_doacao') }}" required>

                                @if ($errors->has('ultima_doacao'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ultima_doacao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="senha" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="senha" type="password" class="form-control{{ $errors->has('senha') ? ' is-invalid' : '' }}" name="senha" required>

                                @if ($errors->has('senha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="senha-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="senha-confirm" type="password" class="form-control" name="senha_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
