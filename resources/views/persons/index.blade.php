@extends('layouts.app')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Personas</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Personas</a>
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
                    <h5> <small></small></h5>
                    <div class="ibox-tools">
                        <a type="button" href="{{ route('persons.new') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-plus"></i>
                            Nuevo
                        </a>
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
                        <div class="col-sm-3">
                            <div class="input-group"><input placeholder="Email/Cuil/Nombre" type="text"
                                    class="form-control form-control-sm"> <span class="input-group-append"> <button
                                        type="button" class="btn btn-sm btn-primary"><i class="fa fa-search"></i>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th>#ID</th>
                                        <th>Nombre completo </th>
                                        <th>DNI </th>
                                        <th>CUIL</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($persons as $person)
                                    <tr>
                                        <td>{{$person->id}}></td>
                                        <td>{{$person->nameComplete}}></td>
                                        <td>{{$person->dni}}></td>
                                        <td>{{$person->cuil}}></td>
                                        <td></td>
                                    </tr>
                                    @endforeach   
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$persons->links()}}
                            </div>
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection