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
                <form method="POST" action="{{ route('register') }}" id="form" action="#" class="wizard-big"> {{--   --}}
                    <h1>Cuenta</h1>
                     <section>
                        <div class="ibox-content">
                        <h2>Información de la cuenta</h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Nombre de usuario *</label>
                                    <input id="userName" name="userName" type="text" class="form-control required" autocomplete="userName" autofocus value="diego">
                                </div>
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input id="email" name="email" type="email" class="form-control required" value="123456@1234sdf.com">
                                </div>
                                <div class="form-group">
                                    <label>Contraseña *</label>
                                    <input id="password" name="password" type="text" class="form-control required" value="12345">
                                </div>
                                <div class="form-group">
                                    <label>Confirmar contraseña *</label>
                                    <input id="confirm" name="confirm" type="text" class="form-control required" value="12345">
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
                                    <input type="text" placeholder="Nombre" name="name"
                                        class="form-control" value="{{old('name')}}" >
                                </div>
                            </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input type="text" placeholder="Apellido" name="surname"
                                        class="form-control" value="{{old('surname')}}" >
                                </div>
                            </div>
                        
                            <input  type="hidden" name="nameComplete"  class="form-control" value="" >
                        
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input type="text" placeholder="DNI" name="dni"
                                        class="form-control" value="{{ old('dni')}}" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>CUIL</label>
                                    <input type="text" placeholder="CUIL" name="cuil"
                                        class="form-control" value="{{old('cuil')}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Fecha de nacimiento</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input placeholder="Fecha de nacimiento" id="burndate" name="burndate" type="text" class="form-control" value="{{old('burndate')}}" >
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
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span><input placeholder="Email" id="email" name="email" type="text" class="form-control" value="{{ old('email')}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span><input placeholder="Teléfono" id="telphone" name="telphone" type="text" class="form-control" value="{{old('telphone')}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span><input placeholder="Celular" id="celphone" name="celphone" type="text" class="form-control" value="{{ old('celphone')}}" >
                                    </div>
                                
                                </div>
                             
                            </div>
                           
                        </div>
                        <h2>Datos de dirección</h2>
                        <address-component></address-component>
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
                                        class="form-control" value="" >
                                </div>
                            </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Cuit</label>
                                    <input type="text" placeholder="Cuit" name="cuit"
                                        class="form-control" value="{{old('cuit')}}" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>CUIL</label>
                                    <input type="text" placeholder="CUIL" name="cuil"
                                        class="form-control" value="{{old('cuil')}}" >
                                </div>
                            </div>
                        </div>

                        <h2>Datos de contacto de la empresa</h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span><input placeholder="Email" id="emailCompany" name="emailCompany" type="text" class="form-control" value="{{old('emailCompany')}}" >
                                    </div>
                                
                                </div>
                             
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Sitio web</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-feed"></i></span><input placeholder="Sitio web" id="web" name="web" type="text" class="form-control" value="{{isset($person->contact) ? $person->contact->web : old('web')}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Celular</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-mobile"></i></span><input placeholder="Celular" id="celphoneCompany" name="celphoneCompany" type="text" class="form-control" value="{{old('celphone')}}" >
                                    </div>
                                
                                </div>
                             
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span><input placeholder="Teléfono" id="telphoneCompany" name="telphoneCompany" type="text" class="form-control" value="{{ old('telphone')}}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Datos de dirección de la empresa</h2>
                        <address-component  :named="'company'"></address-component>
                        </div>
                    </section>

                    <h1>Finish</h1>
                    <section>
                        <h2>Terms and Conditions</h2>
                        <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                    </section> 
                </form>
            </div>
        </div>
        </div>

    </div>
</div>


@endsection
@push('scripts')
  <!-- Steps -->
  <script src="{{asset('admin/js/plugins/steps/jquery.steps.min.js')}}"></script>

  <!-- Jquery Validate -->
  <script src="{{asset('admin/js/plugins/validate/jquery.validate.min.js')}}"></script>
  <script>
    $(document).ready(function(){
        $("#wizard").steps();
        $("#form").steps({
            bodyTag: "section",
            onStepChanging: function (event, currentIndex, newIndex)
            {
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