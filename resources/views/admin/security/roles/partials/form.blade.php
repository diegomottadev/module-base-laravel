<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" placeholder="Nombre" name="name"
                class="form-control" value="{{isset($role) ? $role->name : old('name')}}" >
        </div>
    </div>
</div>
<div class="form-group">
    <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><i
            class="fa fa-save"></i> Guardar</button>
</div>