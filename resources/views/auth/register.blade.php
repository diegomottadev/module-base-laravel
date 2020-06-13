@extends('layouts.authoritation')

@push('styles')
<link href="{{asset ('admin/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
@endpush
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox">

            <div class="ibox-content">
                <h2>
                    Registro
                </h2>
                <p>
                </p>
                <form method="POST" action="{{ route('register') }}" id="register" role="form" class="wizard-big">
                    {{--   --}}
                    @csrf
                    <h1>Cuenta</h1>
                    <section>
                        <div class="ibox-content">
                            <h2>Información de la cuenta</h2>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label>Nombre de usuario *</label>
                                        <input id="name" name="nameUser" type="text" class="form-control required"
                                            autocomplete="userName" autofocus value="diego">
                                    </div>
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input id="email" name="email" type="email" class="form-control required"
                                            value="123456@1234sdf.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña *</label>
                                        <input id="password" name="password" type="text" class="form-control required"
                                            value="12345">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirmar contraseña *</label>
                                        <input id="confirm" name="password_confirmation" type="text"
                                            class="form-control required" value="12345">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="text-center">
                                        <div style="margin-top: 20px">
                                            <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h1>Perfil</h1>

                    <section>
                        <div class="ibox-content">
                            <h2>Información de perfil</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" placeholder="Nombre" name="name" class="form-control"
                                            value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input type="text" placeholder="Apellido" name="surname" class="form-control"
                                            value="{{old('surname')}}">
                                    </div>
                                </div>

                                <input type="hidden" name="nameComplete" class="form-control" value="">

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>DNI</label>
                                        <input type="text" placeholder="DNI" name="dni" class="form-control"
                                            value="{{ old('dni')}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>CUIL</label>
                                        <input type="text" placeholder="CUIL" name="cuil" class="form-control"
                                            value="{{old('cuil')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha de nacimiento</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                                placeholder="Fecha de nacimiento" id="burndate" name="burndate"
                                                type="text" class="form-control" value="{{old('burndate')}}">
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <h2>Datos de contacto</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span><input
                                                placeholder="Email" id="emailContact" name="emailContact" type="text"
                                                class="form-control" value="{{ old('email')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span><input
                                                placeholder="Teléfono" id="telphone" name="telphone" type="text"
                                                class="form-control" value="{{old('telphone')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span><input
                                                placeholder="Celular" id="celphone" name="celphone" type="text"
                                                class="form-control" value="{{ old('celphone')}}">
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <h2>Datos de dirección</h2>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Paise</label>
                                        <select class="form-control" name="country" id="country">
                                            <option value=""> -- Seleccionar país --</option>
                                            @foreach ($countries as $country)
                                            <option value="{{$country->id}}">
                                                {{$country->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Provincia</label>
                                        <select class="form-control" name="province" id="province">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Departamento</label>

                                    <div class="form-group">
                                        <select class="form-control" name="city" id="city">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Localidad</label>

                                    <div class="form-group">
                                        <select class="form-control" name="town" id="town">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <h1>Empresa</h1>
                    <section>
                        <div class="ibox-content">
                            <h2>Información de empresa</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" placeholder="Nombre" name="nameCompany" id="nameCompany"
                                            class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cuit</label>
                                        <input type="text" placeholder="Cuit" name="cuit" class="form-control"
                                            value="{{old('cuit')}}">
                                    </div>
                                </div>
                            </div>
                            <h2>Datos de contacto de la empresa</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span><input
                                                placeholder="Email" id="emailCompany" name="emailCompany" type="text"
                                                class="form-control" value="{{old('emailCompany')}}">
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sitio web</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-feed"></i></span><input
                                                placeholder="Sitio web" id="web" name="web" type="text"
                                                class="form-control"
                                                value="{{isset($person->contact) ? $person->contact->web : old('web')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-mobile"></i></span><input
                                                placeholder="Celular" id="celphoneCompany" name="celphoneCompany"
                                                type="text" class="form-control" value="{{old('celphone')}}">
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span><input
                                                placeholder="Teléfono" id="telphoneCompany" name="telphoneCompany"
                                                type="text" class="form-control" value="{{ old('telphone')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2>Datos de dirección de la empresa</h2>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Paise</label>
                                        <select class="form-control" name="countryCompany" id="countryCompany">
                                            <option value=""> -- Seleccionar país --</option>
                                            @foreach ($countries as $country)
                                            <option value="{{$country->id}}">
                                                {{$country->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Provincia</label>
                                        <select class="form-control" name="provinceCompany" id="provinceCompany">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Departamento</label>

                                    <div class="form-group">
                                        <select class="form-control" name="cityCompany" id="cityCompany">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label">Localidad</label>

                                    <div class="form-group">
                                        <select class="form-control" name="townCompany" id="townCompany">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <h1>Finish</h1>
                    <section>
                        <h2>Terms and Conditions</h2>
                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label
                            for="acceptTerms">Acepto los términos y condiciones</label>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>

</div>
</div>


@endsection
@push('scripts')
@route

<!-- Steps -->
<script src="{{asset('admin/js/plugins/steps/jquery.steps.min.js')}}"></script>

<!-- Jquery Validate -->
<script src="{{asset('admin/js/plugins/validate/jquery.validate.min.js')}}"></script>
<script>
    $(document).ready(function(){

        $("#register").steps({
            bodyTag: "section",
            onStepChanging: function (event, currentIndex, newIndex)
            {
                $('#country').on('change',function(){
                    var id = $(this).val();
                    console.log(id);
                    if(id){
                    $.ajax({
                        type:"get",
                        url: route('provinces', {id: id}),
                        success:function(res)
                        {       console.log(res)
                                if(res)
                                {
                                    $("#province").empty();
                                    $("#city").empty();
                                    $("#town").empty();
                                    $("#province").append('<option> -- Seleccionar provincia --</option>');
                                    $.each(res,function(key,value){
                                        $("#province").append('<option value="'+value.id+'">'+value.name+'</option>');
                                    });
                                }
                        }
                    
                        });
                    }
                });
                $('#province').change(function(){
                    var id = $(this).val();
                    if(id){
                    $.ajax({
                    type:"get",
                    url:route('cities', {id: id}),
                    success:function(res)
                    {       
                            if(res)
                            {
                                $("#city").empty();
                                $("#town").empty();
                                $("#city").append('<option> -- Seleccionar departamento --</option>');
                                $.each(res,function(value){
                                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                                });
                            }
                    }
                
                    });
                    }
                }); 
                $('#cities').change(function(){
                    var id = $(this).val();
                    if(id){
                    $.ajax({
                    type:"get",
                    url:route('towns', {id: id}),
                    success:function(res)
                    {       
                            if(res)
                            {
                                
                                $("#towns").append('<option> -- Seleccionar localidad --</option>');
                                $.each(res,function(value){
                                    $("#town").append('<option value="'+key+'">'+value+'</option>');
                                });
                            }
                    }
                
                    });
                    }
                }); 
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex)
                {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18)
                {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex)
                {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function (event, currentIndex, priorIndex)
            {

                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18)
                {
                    $(this).steps("next");
                }

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3)
                {
                    $(this).steps("previous");
                }
            },
            onFinishing: function (event, currentIndex)
            {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function (event, currentIndex)
            {
                var form = $(this);

                // Submit form input
                form.submit();
            }
        }).validate({
                    errorPlacement: function (error, element)
                    {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password"
                        }
                    }
        });

        
   });
</script>
@endpush