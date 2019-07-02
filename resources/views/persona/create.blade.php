@extends('admin.home')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Registro de Persona</h3>
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
                        <h2>Nueva<small> Persona</small></h2>
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
                    {!!Form::open(array('url'=>'persona','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    <div class="x_content">
                        <div class="row calendar-exibit">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="primernombre"
                                    name="primernombre" placeholder="Primer Nombre" required
                                    value="{{old('primernombre')}}">
                                <span class="fa fa-user form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="segundonombre"
                                    name="segundonombre" placeholder="Segundo Nombre" required
                                    value="{{old('segundonombre')}}">
                                <span class="fa fa-user form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="apellidos"
                                    name="apellidos" placeholder="Apellidos" required value="{{old('apellidos')}}">
                                <span class="fa fa-ils form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="direccion"
                                    name="direccion" placeholder="Dirección" required value="{{old('direccion')}}">
                                <span class="fa fa-arrows form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="tipodocumento" id="tipodocumento" class="form-control selectpicker"
                                    data-live-search="true">
                                    @foreach ($ListaDocumentos as $items)
                                    <option value="{{$items->id}}">{{$items->nombre}}</option>
                                    @endforeach
                                    <option value="" selected> Seleccione El tipo de documento</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="number" class="form-control has-feedback-left" id="numerodocumento"
                                    name="numerodocumento" placeholder="Número De Documento" required
                                    value="{{old('numerodocumento')}}">
                                <span class="fa fa-sort-numeric-asc form-control-feedback left "
                                    aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                    <input type="number" class="form-control has-feedback-left" id="telefono"
                                        name="telefono" placeholder="Telefono" required
                                        value="{{old('telefono')}}">
                                    <span class="fa fa-phone form-control-feedback left "
                                        aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <select name="ciudad" id="ciudad" class="form-control selectpicker"
                                            data-live-search="true">
                                            @foreach ($ListaCiudades as $items)
                                            <option value="{{$items->id}}">{{$items->nombre}}</option>
                                            @endforeach
                                            <option value="" selected> Seleccione La Ciudad</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <select name="tipopersona" id="tipopersona" class="form-control selectpicker"
                                                data-live-search="true">
                                                @foreach ($ListaTiposPersona as $items)
                                                <option value="{{$items->id}}">{{$items->nombre}}</option>
                                                @endforeach
                                                <option value="" selected> Seleccione el tipo de persona</option>
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