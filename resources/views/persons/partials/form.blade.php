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
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input placeholder="Fecha de nacimiento" id="burndate" name="burndate" type="text" class="form-control" value="{{isset($person) ? $person->burndate->format('d/m/Y') : old('burndate')}}" >
            </div>
        
        </div>
     
    </div>
</div>
<div class="form-group">
    <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><i
            class="fa fa-save"></i> Guardar</button>
</div>
