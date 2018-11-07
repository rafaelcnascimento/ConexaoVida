@extends('master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Meus dados') }}</div>

                    <div class="card-body">
                        <form method="post" action="/user/{{$user->id}}">
                            @method('patch')
                            @csrf
                            
                            @if(session()->has('message.level'))
                                <div class="alert alert-{{ session('message.level') }}"> 
                                {!! session('message.content') !!}
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome Completo') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{$user->nome}}" required autofocus>

                                    @if ($errors->has('nome'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
{{-- 
                            <div class="form-group row">
                                <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Gênero') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control{{ $errors->has('genero') ? ' is-invalid' : '' }}" id="genero"  name="genero" required>
                                        <option selected value="{{$user->genero}}">{{$user->genero}}</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select>

                                    @if ($errors->has('genero'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('genero') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="tipo_sanguineo_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo Sanguíneo') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control{{ $errors->has('tipo_sanguineo_id') ? ' is-invalid' : '' }}" id="tipo_sanguineo_id"  name="tipo_sanguineo_id" required>
                                        <option selected="" value="{{$user->tipo_sanguineo_id}}">{{$user->sangue->nome}}</option>
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
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="recebe_email" class="col-md-4 col-form-label text-md-right">{{ __('Receber emails?') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recebe_email" id="inlineRadio1" value="1" @if(Auth::user()->recebe_email == 1) checked @endif>
                                        <label class="form-check-label" for="inlineRadio1">Sim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="recebe_email" id="inlineRadio2" value="0" @if(Auth::user()->recebe_email == 0) checked @endif>
                                        <label class="form-check-label" for="inlineRadio2">Não</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone com DDD') }}</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{$user->telefone}}" required>

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
                                    <input id="cidade" type="text" class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" name="cidade" value="{{$user->cidade}}" required>

                                    @if ($errors->has('cidade'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cidade') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

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
                                        {{ __('Editar') }}
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
