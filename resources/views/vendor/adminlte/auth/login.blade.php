@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page" style=" overflow-y: hidden; background-image: url('../img/fondo_login.jpg'); background-size:cover;">
    <div id="app" >
        <div class="login-box">
            <div class="login-logo">
              <img src="{{ asset('/img/prueba.png') }}" alt="" style="height:100px; width:100px;">
              <h1>Findesin</h1>
            </div><!-- /.login-logo -->

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

        <div class="login-box-body" style="border-radius:20px; background-color:#FFFFFF99">
        <p class="login-box-msg"> {{ trans('adminlte_lang::message.siginsession') }} </p>
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email" style="border:1px solid black; background-color: transparent;"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password" style="border:1px solid black; background-color: transparent;"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <button type="submit" style=" height: 32px; width: 120px; border: 1px solid black; background-color: #FFFFFF00; color: black; border-radius:5px;"><a href="{{ url('/register') }}" class="text-center" style="color:black; text-decoration:none;">Register</a></button>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" style="border: 1px solid black; background-color: #FFFFFF00; color: black; border-radius:5px;">{{ trans('adminlte_lang::message.buttonsign') }}</button>
                </div><!-- /.col -->
            </div>
            <div class="col-xs-12" style="left:-30px;">
                    <div class="checkbox icheck" style="padding-left:0px important!;">
                        <label>
                            <input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}
                        </label>
                    </div>
            </div><!-- /.col -->
        </form>



        <a href="{{ url('/password/reset') }}">{{ trans('adminlte_lang::message.forgotpassword') }}</a><br>

    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

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
