@extends('admin.home')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Informe Vehiculo por fecha de registro</h3>
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
                    {!!Form::open(array('url'=>'generarinformevehiculo','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                            <span> Desde </span>                            <div class="form-group">
                                <input type='date' class="form-control" name="fechainicio"
                                    placeholder="Fecha inicio Semestre" required="required" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                            <span> Hasta </span>                            <div class="form-group">
                                <input type='date' class="form-control" name="fechafin"
                                    placeholder="Fecha finalización Semestre" required="required" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3" style="text-align:center;">
                            <button id="send" type="submit" class="btn btn-success">Generar</button>
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
