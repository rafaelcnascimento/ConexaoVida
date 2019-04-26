@extends('master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="/registrar">
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

                      {{--   <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Gênero') }}</label>

                            <div class="col-md-6">
                                <select class="form-control{{ $errors->has('genero') ? ' is-invalid' : '' }}" id="genero"  name="genero" required>
                                    <option selected="" disabled="">Selecione</option>
                                    <option value="Feminino" {{ (old('genero') == "feminimo" ? "selected":"") }}>Feminino</option>
                                    <option value="Masculino" {{ (old('genero') == "masculino" ? "selected":"") }}>Masculino</option>
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
                                <input id="telefone" type="text" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" id="telefone" value="{{ old('telefone') }}" required>

                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
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

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary custom-btn">
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

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    
    <script type="text/javascript">
    $(window).load(function()
    {
       var phones = [{ "mask": "(##) ####-####"}, { "mask": "(##) #####-####"}];
        $('#telefone').inputmask({ 
            mask: phones, 
            greedy: false, 
            definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
    });
    </script>
@endsection
