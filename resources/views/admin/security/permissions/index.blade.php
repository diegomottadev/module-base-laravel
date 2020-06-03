@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Permisos</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Permisos</a>
            </li>
            {{-- <li class="breadcrumb-item active">
                <strong>Basic Form</strong>
            </li> --}}
        </ol>
       
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Rol <small>{{$role->name}}</small></h5>
                    <div class="ibox-tools">
                        <a type="button"  href="{{ url()->previous() }}" class="btn btn-sm btn-default"> <i class="fa fa-arrow-left"></i> Atras</a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        {{-- <div class="col-sm-5 m-b-xs"><select class="form-control-sm form-control input-s-sm inline">
                                <option value="0">Option 1</option>
                                <option value="1">Option 2</option>
                                <option value="2">Option 3</option>
                                <option value="3">Option 4</option>
                            </select>
                        </div>
                        <div class="col-sm-4 m-b-xs">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-sm btn-white ">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Day
                                </label>
                                <label class="btn btn-sm btn-white active">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> Week
                                </label>
                                <label class="btn btn-sm btn-white">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> Month
                                </label>
                            </div>
                        </div> --}}
                        {{-- <div class="col-sm-3">
                            <div class="input-group"><input placeholder="Nombre" type="text"
                                    class="form-control form-control-sm"> <span class="input-group-append"> <button
                                        type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i>

                        </div> --}}
                    </div>
                    <div class="table-responsive">
                        <form role="form" method="POST" action="{{ route('permissions.update',$role->id) }}">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>Grupo</th>
                                        <th>Nombre </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @csrf
                                    @method('PUT')
                                    @foreach ($controllers as $controller)
                                    <tr>
                                        <td>{{$controller}}</td>
                                        <td>
                                            @foreach ($permissions as $permission)
                                                @if($permission->controller == $controller)
                                                <div class="col-sm-3">
                                                    <div class="form-check abc-checkbox abc-checkbox-primary">
                                                        <input class="form-check-input" id="checkbox2" type="checkbox"
                                                            {{$hasPermissions->contains($permission) ? 'checked' : ""}}
                                                            name="permissions[]" value={{$permission->name}}>
                                                            <label class="form-check-label" for="checkbox2">
                                                                {{$permission->name}}   
                                                            </label>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="form-group">
                                <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit"><i
                                        class="fa fa-save"></i> Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')

@routes
<script>
    $(document).ready(function () {

        $('.btn-danger').on('click', function () {
            var id = $(this).data('id');
            var url = route('roles.destroy', {id: id});

            Swal.fire({
                title: 'Confirmar',
                text: "¿Eliminar categoría?",
                type: 'info',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar'
            }).then(function (result) {
                if (result.value) {
                    axios.delete(url)
                        .then(function (res) {

                            if (res.status === 204) {

                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })

                                Toast.fire({
                                    icon: 'success',
                                    title: 'Categoría elimininada'
                                })

                                $('.row-'+id).remove();
                            } 

                        }).catch(function (res) {
                            swal("No tiene los privilegios para realizar esta acción!", '', 'error');
                        });
                }
            });
        });
    });
</script>
@endpush