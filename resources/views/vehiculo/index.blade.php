@extends('admin.home')
@section('contenido')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Listado Vehiculos</h3>
            </div>
            @include('vehiculo.search')
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
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

                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Placa</th>
                                        <th class="column-title">Color </th>
                                        <th class="column-title">Marca </th>
                                        <th class="column-title">Tipo Vehiculo </th>
                                        <th class="column-title">Conductor </th>
                                        <th class="column-title">Propietario </th>
                                        <th class="column-title no-link last"><span class="nobr">Opciones</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($vehiculo as $items)
                                    <tr class="even pointer">
                                        <td>{{$items->placa}}</td>
                                        <td>{{$items->color}}</td>
                                        <td>{{$items->nombremarca}}</td>
                                        <td>{{$items->nombretipovehiculo}}</td>
                                        <td>{{$items->nombreconductor}}</td>
                                        <td>{{$items->nombrepropietario}}</td>
                                        <td>
                                            <a href="{{URL::action('VehiculoController@edit',$items->id)}}"><button
                                                    type="button" class="btn btn-round btn-success"><i
                                                        class="fa fa-edit"></i></button></a>
                                          
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$vehiculo->render()}}
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /page content -->



@endsection