@extends('admin.home')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Actualizar de Persona</h3>
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
                        <h2>NuevModificara datos de la Persona</h2>
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
                    {!!Form::open(array('method'=>'PATCH','route'=>['persona.update',$persona->id]))!!}
                    {{Form::token()}}
                    <div class="x_content">
                        <div class="row calendar-exibit">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="primernombre"
                                    name="primernombre" placeholder="Primer Nombre" required
                                    value="{{$persona->primer_nombre}}">
                                <span class="fa fa-user form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="segundonombre"
                                    name="segundonombre" placeholder="Segundo Nombre" required
                                    value="{{$persona->segundo_nombre}}">
                                <span class="fa fa-user form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="apellidos"
                                    name="apellidos" placeholder="Apellidos" required value="{{$persona->apellidos}}">
                                <span class="fa fa-ils form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="direccion"
                                    name="direccion" placeholder="Dirección" required value="{{$persona->direccion}}">
                                <span class="fa fa-arrows form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="tipodocumento" id="tipodocumento" class="form-control selectpicker"
                                    data-live-search="true">
                                    @foreach ($ListaDocumentos as $items)
                                    @if($items->id == $persona->id_tipo_documento)
                                    <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                    @else
                                    <option value="{{$items->id}}">{{$items->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="number" class="form-control has-feedback-left" id="numerodocumento"
                                    name="numerodocumento" placeholder="Número De Documento" required
                                    value="{{$persona->numero_documento}}">
                                <span class="fa fa-sort-numeric-asc form-control-feedback left "
                                    aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="number" class="form-control has-feedback-left" id="telefono"
                                    name="telefono" placeholder="Telefono" required value="{{$persona->telefono}}">
                                <span class="fa fa-phone form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="ciudad" id="ciudad" class="form-control selectpicker"
                                    data-live-search="true">
                                    @foreach ($ListaCiudades as $items)
                                    @if($items->id == $persona->id_ciudad)
                                    <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                    @else
                                    <option value="{{$items->id}}">{{$items->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="tipopersona" id="tipopersona" class="form-control selectpicker"
                                    data-live-search="true">
                                    @foreach ($ListaTiposPersona as $items)
                                    @if($items->id == $persona->id_tipo_persona)
                                    <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                    @else
                                    <option value="{{$items->id}}">{{$items->nombre}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <select name="estado" id="estado" class="form-control ">
                                    @foreach ($Arrayestado as $items)
                                    @if($items == $persona->estado)
                                    <option value="{{$items}}" selected> @if($items == 1) ACTIVO @else INACTIVO
                                        @endif </option>
                                    @else
                                    <option value="{{$items}}"> @if($items == 1) ACTIVO @else INACTIVO @endif
                                    </option>
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