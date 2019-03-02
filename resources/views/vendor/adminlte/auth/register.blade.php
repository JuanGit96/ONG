@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app">
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>Admin</b>LTE</a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body">
                <p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>
                <form action="{{ url('/register') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">





                    <div class="form-group has-feedback">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autofocus>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input id="usr_apellido" type="text" class="form-control{{ $errors->has('usr_apellido') ? ' is-invalid' : '' }}" name="usr_apellido" value="{{ old('usr_apellido') }}" required placeholder="{{ __('Lastname') }}">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <select class="form-control" id="tdo_id" name="tdo_id">
                          <option selected disabled>{{ __('Identification Type') }}</option>
                          <option value="1">NIT.</option>
                          <option value="2">C.C</option>
                          <option value="3">C.E</option>
                          <option value="4">P.A</option>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                            <input id="usr_numero_documento" type="text" class="form-control{{ $errors->has('usr_numero_documento') ? ' is-invalid' : '' }}" name="usr_numero_documento" value="{{ old('usr_numero_documento') }}" required placeholder="{{ __('Identification Number') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <select class="form-control" id="tpe_id" name="tpe_id">
                          <option selected disabled>{{ __('Person Type') }}</option>
                          <option value="1">Natural</option>
                          <option value="2">Juridica</option>
                        </select>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                            <input id="usr_telefono" type="text" class="form-control{{ $errors->has('usr_telefono') ? ' is-invalid' : '' }}" name="usr_telefono" value="{{ old('usr_telefono') }}" required placeholder="{{ __('Phone') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                            <input id="usr_ciudad" type="text" class="form-control{{ $errors->has('usr_ciudad') ? ' is-invalid' : '' }}" name="usr_ciudad" value="{{ old('usr_ciudad') }}" required placeholder="{{ __('City') }}">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    </div>

                    <div class="form-group has-feedback">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="{{ __('E-Mail Address') }}">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.retrypepassword') }}" name="password_confirmation"/>
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>



















                    <div class="row">
                        <div class="col-xs-1">
                            <label>
                                <div class="checkbox_register icheck">
                                    <label>
                                        <input type="checkbox" name="terms">
                                    </label>
                                </div>
                            </label>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">{{ trans('adminlte_lang::message.terms') }}</button>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4 col-xs-push-1">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.register') }}</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                @include('adminlte::auth.partials.social_login')

                <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

</body>

@endsection
