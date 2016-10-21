<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trans('common.page.login.title') }}</title>
        
        @include('partial.styles')

    </head>
    <body class="login">
        <div class="login-container">
            <div class="col-md-12 animate form login_form">
                <section class="login_content">
                    <div class="row">
                        <div class="panel panel-default">

                            <div class="panel-heading align-left"><h3>{{ trans('common.page.login.header') }}</h3></div>

                            <div class="panel-body">
                                @if ($messages = Session::get('messages'))
                                    <div class="alert alert-warning">
                                        {{ $messages }}
                                    </div>
                                @endif
                                {!! Form::open(['url' => 'login', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                                    {{ csrf_field() }}
                                    <div class="form-group{{ $errors->has('login_id') ? ' has-error' : '' }}">
                                        <h2>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2 align-right">
                                                {{ Form::label('name', trans('common.page.login.login_id'), ['class' => 'control-label']) }}
                                            </div>
                                            <div class="col-md-8">
                                                {{ Form::text('login_id', old('login_id'), ['id' => 'login-id', 'class' => 'form-control']) }}

                                                @if ($errors->has('login_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('login_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-1"></div>
                                        </h2>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <h2>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-2 align-right">
                                                {{ Form::label('password', trans('common.page.login.password'), ['class' => 'control-label']) }}
                                            </div>

                                            <div class="col-md-8">
                                                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-1"></div>
                                        </h2>
                                    </div>

                                    <div class="col-md-12 spacer"></div>

                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-4">
                                            {{ Form::button(
                                                trans('common.button.login'),
                                                ['type' => 'submit', 'class' => 'btn btn-round btn-primary btn-login']
                                            )}}
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>
</html>
