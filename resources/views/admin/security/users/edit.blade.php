@extends('layouts.app')
@push('styles')
<link href="{{asset('admin/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/plugins/select2/select2-bootstrap4.min.css')}}"rel="stylesheet">
@endpush
@section('content')
<div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Usuarios</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Usuarios</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Editar ({{$user->name}})</strong>
                </li>
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
                        <h5> <small></small></h5>
                        <div class="ibox-tools">
                            <a type="button"  href="{{ url()->previous() }}" class="btn btn-sm btn-default"> <i class="fa fa-arrow-left"></i> Atras</a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form role="form" method="POST" action="{{ route('users.update',$user->id) }}">
                                    @csrf
                                    @method('PUT')
                                    @include('admin.security.users.partials.form')  
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
<script src="{{asset('admin/js/plugins/select2/select2.full.min.js')}}"></script>

<script>
 $("#roles").select2({
  theme: 'bootstrap4',
 });
</script>

@endpush