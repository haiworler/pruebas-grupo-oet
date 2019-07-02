@extends('admin.home')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edición Vehiculo</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- form date pickers -->
                <div class="x_panel" style="">
                    <div class="x_title">
                        <h2>Modificación Vehiculo</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    {!!Form::open(array('method'=>'PATCH','route'=>['vehiculo.update',$vehiculo->id]))!!}
                    {{Form::token()}}
                    <div class="x_content">
                        <div class="row calendar-exibit">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="placa" name="placa"
                                    placeholder="Placa" required value="{{$vehiculo->placa}}">
                                <span class="fa fa-chain-broken form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="color" name="color"
                                    placeholder="Color" required value="{{$vehiculo->color}}">
                                <span class="fa fa-circle form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <span aria-hidden="true">Marca</span>
                                <select name="marca" id="marca" class="form-control selectpicker"
                                    data-live-search="true">
                                    @foreach ($ListaMarca as $items)
                                    @if($items->id == $vehiculo->id_marca)
                                    <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                    @else
                                    <option value="{{$items->id}}">{{$items->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <span aria-hidden="true">Tipo Vehiculo</span>
                                <select name="tipovehiculo" id="tipovehiculo" class="form-control selectpicker"
                                    data-live-search="true">
                                    @foreach ($ListaTipoVehiculo as $items)
                                    @if($items->id == $vehiculo->id_tipovehiculo)
                                    <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                    @else
                                    <option value="{{$items->id}}">{{$items->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <span aria-hidden="true">Conductor</span>
                                <select name="conductor" id="conductor" class="form-control selectpicker"
                                    data-live-search="true">
                                    @foreach ($ListaPersonaConductor as $items)
                                    @if($items->id == $vehiculo->id_conductor)
                                    <option value="{{$items->id}}" selected>
                                        {{$items->primer_nombre . ' ' .$items->segundo_nombre}}</option>
                                    @else
                                    <option value="{{$items->id}}">
                                        {{$items->primer_nombre . ' ' .$items->segundo_nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <span aria-hidden="true">Propietario</span>
                                <select name="propietario" id="propietario" class="form-control selectpicker"
                                    data-live-search="true">
                                    @foreach ($ListaPersonaPropietario as $items)
                                    @if($items->id == $vehiculo->id_propietario)
                                    <option value="{{$items->id}}" selected>
                                        {{$items->primer_nombre . ' ' .$items->segundo_nombre}}</option>
                                    @else
                                    <option value="{{$items->id}}">
                                        {{$items->primer_nombre .' ' .$items->segundo_nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3" style="text-align:center;">
                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
                <!-- /form datepicker -->
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection