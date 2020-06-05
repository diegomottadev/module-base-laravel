<div class="row">

    <div class="col-sm-6">
        <div class="form-group">
            <label>Nombre de usuario</label>
            <input type="text" placeholder="Nombre de usuario" name="name" class="form-control"
                value="{{isset($user) ? $user->name : old('name')}}">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Email</label>
            <input type="text" placeholder="Email" name="email" class="form-control"
                value="{{isset($user) ? $user->email : old('email')}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Contraseña</label>
            <input type="text" placeholder="Contraseña" name="password" class="form-control"
                value="{{isset($user) ? $user->password : old('password')}}">
        </div>
    </div>

    <div class="col-sm-6">
        <label>Roles</label>
        <select class="form-control m-b" id="roles" name="roles[]" multiple="" placeholder="Roles">
            @foreach ($roles as $rol)
            <option {{isset($user) && $user->roles()->get()->contains($rol) ? 'selected' : ""}} value="{{$rol->name}}">
                {{$rol->name}}</option>
            @endforeach
        </select>
    </div>

</div>
<div class="row">
    <div class="col-sm-6">
        <label>Persona</label>
        <select class="form-control m-b" id="person" name="person" placeholder="Persona">
            <option type="text" value="">-- Seleccionar Persona --</option>
        </select>
    </div>
</div>
<div class="form-group">
    <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><i class="fa fa-save"></i>
        Guardar</button>
</div>