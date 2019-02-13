
    <div class="form-group row  {{ $errors->has('name')? 'has-error':'' }}">
        {!! Form::label('pass','Contaseña Actual',[
            'class' => "col-sm-2 col-form-label"
        ]) !!}
        <div class="col-sm-10">
            {!!
            Form::password('pass', [
                'required',
                'class' => 'form-control',
                'placeholder' => '********',
            ])
         !!}

            @if($errors->has('pass'))
                <span class="help-block">
                <strong>{{ $errors->first('pass') }}</strong>
            </span>
            @endif
        </div>

    </div>

    <div class="form-group row {{ $errors->has('nPass')? 'has-error':'' }}">
        {!! Form::label('nPass','Nueva Contaseña',[
            'class' => "col-sm-2 col-form-label"
        ]) !!}
        <div class="col-sm-10">
            {!!
            Form::password('nPass', [
                'required',
                'class' => 'form-control',
                'placeholder' => '********',
            ])
         !!}

            @if($errors->has('nPass'))
                <span class="help-block">
                <strong>{{ $errors->first('nPass') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row {{ $errors->has('rPass')? 'has-error':'' }}">
        {!! Form::label('rPass','Repetir Actual',[
            'class' => "col-sm-2 col-form-label"
        ]) !!}
        <div class="col-sm-10">
            {!!
            Form::password('rPass', [
                'required',
                'class' => 'form-control',
                'placeholder' => '********',
            ])
         !!}

            @if($errors->has('rPass'))
                <span class="help-block">
                <strong>{{ $errors->first('rPass') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="form-group row }}">

        <div class="col-sm-10">
            <button id="btnPass" type="button" class="btn btn-danger">
                Actualizar Contaseña
            </button>
        </div>
    </div>
    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <script type="text/javascript" >
            jQuery(function ($) {
                $('#btnPass').click( () =>{
                    let newPass = $('#nPass').val();
                    let rPass = $('#rPass').val();
                    if(newPass == rPass){
                        $.post(`account/pass?id=${rPass}`,function (res, state) {
                            console.log(res[0]);
                            });
                        console.log("siiiii");
                        /*Swal.fire({
                            title: 'Esta Seguro de Cambiar La Contaseña?',
                            text: "Esta Opcion No Es Reversible!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, Cambiar!'
                        }).then((result) => {
                            if (result.value) {
                                Swal.fire(
                                    'Contaseña Cambiada',
                                    'Se Cambio Correctamente.',
                                    'success'
                                );
                                let rPass = $('#rPass').val();
                                $.get(`npass/${rPass}`, () =>{});
                            }
                        });*/

                    }else{
                        Swal.fire(
                            'Error de Contaseña',
                            'Las Contaseñas No Coinciden',
                            'error'
                        );
                    }
                    $('#nPass').val(null);
                    $('#rPass').val(null);
                    $('#pass').val(null);

                });
            });

        </script>
    @endsection

    <br>

    <div class="container border w-50 ml-0">
        <h2>Cambio de Contaseña</h2>
        <hr>

        @include('account.partials.password')

    </div>

