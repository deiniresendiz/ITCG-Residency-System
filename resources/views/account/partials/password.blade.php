
<form action="{{ route('password.update') }}" method="post" role="form" class="">
    {{csrf_field()}}
    <div class="form-group row  {{  $errors->has('old') ? 'has-error':'' }}">
        {!! Form::label('old','Contaseña Actual',[
        'class' => "col-sm-3 col-form-label"
        ]) !!}
        <div class="col-sm-9">
            <input id="password" type="password" class="form-control" name="old">
            @if ($errors->has('old'))
                <span class="help-block">
                    <strong>{{ $errors->first('old') }}</strong>
                </span>
            @endif
        </div>

    </div>
    <div class="form-group row {{ $errors->has('password') ? 'has-error':'' }}">
        {!! Form::label('password','Nueva Contaseña',[
            'class' => "col-sm-3 col-form-label"
        ]) !!}
        <div class="col-sm-9">
            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
            @endif

        </div>
    </div>
    <div class="form-group row {{ $errors->has('password_confirmation')? 'has-error':'' }}">
        {!! Form::label('password-confirm','Repetir Actual',[
            'class' => "col-sm-3 col-form-label"
        ]) !!}
        <div class="col-sm-9">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
            @endif
        </div>
    </div>
    <div class="col-sm-10 text-center">
        <button id="btnPass" type="submit" class="btn btn-danger">
            Actualizar Contaseña
        </button>
    </div>
</form>
