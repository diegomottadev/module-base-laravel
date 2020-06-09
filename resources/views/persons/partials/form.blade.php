<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" placeholder="Nombre" name="name"
                class="form-control" value="{{isset($person) ? $person->name : old('name')}}" >
        </div>
    </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label>Apellido</label>
            <input type="text" placeholder="Apellido" name="surname"
                class="form-control" value="{{isset($person) ? $person->surname : old('surname')}}" >
        </div>
    </div>

    <input  type="hidden" name="nameComplete"  class="form-control" value="" >

</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>DNI</label>
            <input type="text" placeholder="DNI" name="dni"
                class="form-control" value="{{isset($person) ? $person->dni : old('dni')}}" >
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>CUIL</label>
            <input type="text" placeholder="CUIL" name="cuil"
                class="form-control" value="{{isset($person) ? $person->cuil : old('cuil')}}" >
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Fecha de nacimiento</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input placeholder="Fecha de nacimiento" id="burndate" name="burndate" type="text" class="form-control" value="{{isset($person) ? $person->burndate: old('burndate')}}" >
            </div>
        
        </div>
     
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Email</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span><input placeholder="Email" id="email" name="email" type="text" class="form-control" value="{{isset($person->contact) ? $person->contact->email : old('email')}}" >
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
                <span class="input-group-addon"><i class="fa fa-mobile"></i></span><input placeholder="Celular" id="celphone" name="celphone" type="text" class="form-control" value="{{isset($person->contact) ? $person->contact->celphone : old('celphone')}}" >
            </div>
        
        </div>
     
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Telefono</label>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span><input placeholder="Teléfono" id="telphone" name="telphone" type="text" class="form-control" value="{{isset($person->contact) ? $person->contact->telphone : old('telphone')}}" >
            </div>
        </div>
    </div>
</div>

<address-component></address-component>

<div class="form-group">
    <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><i
            class="fa fa-save"></i> Guardar</button>
</div>
