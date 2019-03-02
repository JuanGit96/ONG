@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="usr_apellido" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="usr_apellido" type="text" class="form-control{{ $errors->has('usr_apellido') ? ' is-invalid' : '' }}" name="usr_apellido" value="{{ old('usr_apellido') }}" required autofocus>

                                @if ($errors->has('usr_apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usr_apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="tdo_idtdo_id" class="col-md-4 col-form-label text-md-right">{{ __('Identification Type') }}</label>
                          <div class="col-md-6">
                            <select class="form-control" id="tdo_id" name="tdo_id">
                              <option selected disabled>Seleccone</option>
                              <option value="1">NIT.</option>
                              <option value="2">C.C</option>
                              <option value="3">C.E</option>
                              <option value="4">P.A</option>
                            </select>

                            @if ($errors->has('tdo_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tdo_id') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="usr_numero_documento" class="col-md-4 col-form-label text-md-right">{{ __('Identification Number') }}</label>

                            <div class="col-md-6">
                                <input id="usr_numero_documento" type="text" class="form-control{{ $errors->has('usr_numero_documento') ? ' is-invalid' : '' }}" name="usr_numero_documento" value="{{ old('usr_numero_documento') }}" required autofocus>

                                @if ($errors->has('usr_numero_documento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usr_numero_documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="tpe_id" class="col-md-4 col-form-label text-md-right">{{ __('Person Type') }}</label>
                          <div class="col-md-6">
                            <select class="form-control" id="tpe_id" name="tpe_id">
                              <option selected disabled>Seleccione</option>
                              <option value="1">Natural</option>
                              <option value="2">Juridica</option>

                            </select>

                            @if ($errors->has('tpe_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tpe_id') }}</strong>
                                </span>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="usr_telefono" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="usr_telefono" type="text" class="form-control{{ $errors->has('usr_telefono') ? ' is-invalid' : '' }}" name="usr_telefono" value="{{ old('usr_telefono') }}" required>

                                @if ($errors->has('usr_telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usr_telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="usr_ciudad" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="usr_ciudad" type="text" class="form-control{{ $errors->has('usr_ciudad') ? ' is-invalid' : '' }}" name="usr_ciudad" value="{{ old('usr_ciudad') }}" required>

                                @if ($errors->has('usr_ciudad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('usr_ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
